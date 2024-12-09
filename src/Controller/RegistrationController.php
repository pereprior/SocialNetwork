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
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Http\Attribute\CurrentUser;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;

class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function register(
        Request $request,
        UserPasswordHasherInterface $userPasswordHasher,
        EntityManagerInterface $entityManager,
        UserAuthenticatorInterface $userAuthenticator,
        #[Autowire(service: 'security.authenticator.form_login.main')] $formLoginAuthenticator
    ): Response {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Procesar la imagen del usuario
            $userImage = $form->get('userImage')->getData();
            if ($userImage) {
                $uploadsDirectory = $this->getParameter('uploads_directory'); // Directorio configurado en services.yaml
                $newFilename = uniqid() . '.' . $userImage->guessExtension();

                try {
                    $userImage->move($uploadsDirectory, $newFilename);
                } catch (FileException $e) {
                    // Manejar error al mover el archivo
                    $this->addFlash('error', 'No se pudo cargar la imagen. Inténtalo de nuevo.');
                }

                // Establecer el nombre del archivo en el usuario
                $user->setUserImage($newFilename);
            }

            // Configurar la contraseña
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            // Configurar roles
            $roles = ['ROLE_USER']; // Rol base para todos los usuarios
            if ($form->get('isStudent')->getData()) {
                $roles[] = 'ROLE_STUDENT';
            }
            if ($form->get('isChef')->getData()) {
                $roles[] = 'ROLE_CHEF';
            }
            $user->setRoles($roles);

            // Persistir el usuario
            $entityManager->persist($user);
            $entityManager->flush();

            // Autenticar automáticamente
            return $userAuthenticator->authenticateUser(
                $user,
                $formLoginAuthenticator,
                $request
            );
        }

        return $this->render('registration/register.html.twig', [
            'page_title' => 'Registro',
            'registrationForm' => $form->createView(),
        ]);
    }
}