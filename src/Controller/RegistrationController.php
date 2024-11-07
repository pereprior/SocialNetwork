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
            // Asigna el valor del checkbox 'isStudent' a la entidad como booleano
            $isStudent = $form->get('isStudent')->getData(); // Será true o false
            $user->setIsStudent($isStudent); // Se guarda el valor true o false
            $isChef = $form->get('isChef')->getData();
            $user->setIsChef($isChef);

            $proofOfChefTitleFile = $form->get('proofOfChefTitle')->getData();
            if ($proofOfChefTitleFile) {
                $newFilename = uniqid().'.'.$proofOfChefTitleFile->guessExtension();

                try {
                    $proofOfChefTitleFile->move(
                        $this->getParameter('uploads_directory'), // Necesitas configurar este parámetro
                        $newFilename
                    );
                } catch (FileException $e) {
                    // Maneja la excepción si la subida falla
                }

                // Establece el nombre del archivo en la entidad `User`
                $user->setProofOfChefTitle($newFilename);
            }

            // Cifra la contraseña
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            // Persiste la entidad en la base de datos
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('app_inicio');
        }



        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
