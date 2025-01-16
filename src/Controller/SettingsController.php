<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\Service\FileService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class SettingsController extends AbstractController
{
    #[Route('/settings', name: 'app_settings')]
    public function index(Request $request, UserPasswordHasherInterface $passwordHasher, EntityManagerInterface $entityManager, TokenStorageInterface $tokenStorage, FileService $fileService, UserRepository $userRepository): Response
    {
        $user = $this->getUser();

        if (!$user) {
            throw $this->createAccessDeniedException('You must be logged in to change your password.');
        }
        $fileService->setImagesUrl($userRepository->findAll());

        // Formulario de cambio de contraseña
        $changePasswordForm = $this->createFormBuilder()
            ->add('current_password', PasswordType::class, ['label' => 'Current Password'])
            ->add('new_password', PasswordType::class, ['label' => 'New Password'])
            ->add('change', SubmitType::class, ['label' => 'Change Password'])
            ->getForm();

        $changePasswordForm->handleRequest($request);

        $error = null;

        // Procesar formulario de cambio de contraseña
        if ($changePasswordForm->isSubmitted() && $changePasswordForm->isValid()) {
            $data = $changePasswordForm->getData();

            // Verificar contraseña actual
            if (!$passwordHasher->isPasswordValid($user, $data['current_password'])) {
                $error = [
                    'messageKey' => 'Current password is incorrect.',
                    'messageData' => [],
                ];
            } elseif ($data['current_password'] === $data['new_password']) {
                // Validar que la nueva contraseña no sea igual a la actual
                $error = [
                    'messageKey' => 'New password cannot be the same as the current password.',
                    'messageData' => [],
                ];
            } else {
                // Cambiar la contraseña
                $newPassword = $passwordHasher->hashPassword($user, $data['new_password']);
                $user->setPassword($newPassword);
                $entityManager->persist($user);
                $entityManager->flush();

                $this->addFlash('success', 'Password updated successfully.');
                return $this->redirectToRoute('app_settings');
            }
        }

        return $this->render('settings/index.html.twig', [
            'page_title' => 'Settings',
            'changePasswordForm' => $changePasswordForm->createView(),
            'error' => $error, // Pasamos el error a la plantilla
        ]);
    }
}
