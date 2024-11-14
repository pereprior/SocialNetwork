<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'app_profile')]
    public function profile(): Response
    {
        // Obtén el usuario actualmente autenticado
        $user = $this->getUser();

        // Asegúrate de que el usuario esté autenticado
        if (!$user) {
            return $this->redirectToRoute('app_billing');
        }

        return $this->render('profile/profile.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route('/upgrade-to-premium', name: 'app_upgrade_to_premium', methods: ['POST'])]
    public function upgradeToPremium(EntityManagerInterface $entityManager): RedirectResponse
    {
        $user = $this->getUser();

        // Cambia la redirección a la página de facturación
        if (!$user) {
            return $this->redirectToRoute('app_billing');
        }

        // Lógica de actualización a Premium
        $user->setRoles(array_merge($user->getRoles(), ['ROLE_PREMIUM']));
        $entityManager->persist($user);
        $entityManager->flush();

        $this->addFlash('success', '¡Has actualizado a Premium con éxito!');

        return $this->redirectToRoute('app_profile');
    }

    #[Route('/downgrade-from-premium', name: 'app_downgrade_from_premium', methods: ['POST'])]
    public function downgradeFromPremium(EntityManagerInterface $entityManager): RedirectResponse
    {
        $user = $this->getUser();

        if (!$user) {
            return $this->redirectToRoute('app_profile');
        }

        // Elimina el rol de 'ROLE_PREMIUM'
        $roles = $user->getRoles();
        $roles = array_diff($roles, ['ROLE_PREMIUM']);
        $user->setRoles($roles);

        $entityManager->persist($user);
        $entityManager->flush();

        $this->addFlash('success', '¡Has cancelado tu suscripción Premium!');

        return $this->redirectToRoute('app_profile');
    }
}