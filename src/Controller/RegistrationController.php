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
        //Inyector del formulario de login, maneja el inicio de sesión automático
        #[Autowire(service: 'security.authenticator.form_login.main')] $formLoginAuthenticator
    ): Response {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Lógica de contraseña
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            // Procesar los roles según las casillas marcadas
            $roles = ['ROLE_USER']; // Rol base para todos los usuarios
            if ($form->get('isStudent')->getData()) {
                $roles[] = 'ROLE_STUDENT';
            }
            if ($form->get('isChef')->getData()) {
                $roles[] = 'ROLE_CHEF';
            }
            $user->setRoles($roles);

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