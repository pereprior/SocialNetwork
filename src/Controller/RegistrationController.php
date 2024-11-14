<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Verifica si el usuario seleccionó "estudiante" o "chef"
            $isStudent = $form->get('isStudent')->getData();
            $isChef = $form->get('isChef')->getData();

            if ($isStudent) {
                $user->setRoles(['ROLE_STUDENT']);
            }

            if ($isChef) {
                $user->setRoles(['ROLE_CHEF']);
            }

            // Si se seleccionan ambos roles, puedes combinarlos si es necesario
            if ($isStudent && $isChef) {
                $user->setRoles(['ROLE_STUDENT', 'ROLE_CHEF']);
            }

            // Resto del código para manejar archivos y cifrar la contraseña
            $proofOfChefTitleFile = $form->get('proofOfChefTitle')->getData();
            if ($proofOfChefTitleFile) {
                $newFilename = uniqid() . '.' . $proofOfChefTitleFile->guessExtension();

                try {
                    $proofOfChefTitleFile->move(
                        $this->getParameter('uploads_directory'), // Configura este parámetro en services.yaml
                        $newFilename
                    );
                } catch (FileException $e) {
                    // Maneja la excepción si la subida falla
                }

                $user->setProofOfChefTitle($newFilename);
            }

            $userImage = $form->get('userImage')->getData();
            if ($userImage) {
                $newFilename = uniqid() . '.' . $userImage->guessExtension();

                try {
                    $userImage->move(
                        $this->getParameter('uploads_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // Maneja la excepción si la subida falla
                }

                $user->setUserImage($newFilename);
            }

            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('app_page');
        }




        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
