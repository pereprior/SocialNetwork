<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'app_profile')]
    public function profile(): Response
    {
        // Obtén el usuario actualmente autenticado
        $user = $this->getUser();

        // Asegúrate de que el usuario esté autenticado
        if (!$user) {
            return $this->redirectToRoute('app_profile');
        }

        return $this->render('profile/index.html.twig', [
            'user' => $user,
            'page_title' => 'Perfil del Usuario',
        ]);
    }

    #[Route('/upgrade-to-premium', name: 'app_upgrade_to_premium', methods: ['POST'])]
    public function upgradeToPremium(EntityManagerInterface $entityManager): RedirectResponse
    {
        $user = $this->getUser();

        // Asegúrate de que el usuario esté autenticado
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        // Agrega el rol 'ROLE_PREMIUM' al usuario
        $roles = $user->getRoles();
        if (!in_array('ROLE_PREMIUM', $roles)) {
            $roles[] = 'ROLE_PREMIUM';
            $user->setRoles($roles);
        }

        // Guarda los cambios en la base de datos
        $entityManager->flush();

        // Muestra un mensaje de éxito al usuario
        $this->addFlash('success', '¡Felicidades! Ahora eres un usuario Premium.');

        return $this->redirectToRoute('app_profile');
    }


    #[Route('/downgrade-from-premium', name: 'app_downgrade_from_premium', methods: ['POST'])]
    public function downgradeFromPremium(EntityManagerInterface $entityManager): RedirectResponse
    {
        $user = $this->getUser();

        if (!$user) {
            return $this->redirectToRoute('app_profile');
        }

        // Elimina el rol 'ROLE_PREMIUM'
        $roles = $user->getRoles();
        $roles = array_diff($roles, ['ROLE_PREMIUM']);
        $user->setRoles($roles);

        $entityManager->flush();

        $this->addFlash('success', '¡Has cancelado tu suscripción Premium!');

        return $this->redirectToRoute('app_profile');
    }
}