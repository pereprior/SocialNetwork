<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BillingController extends AbstractController
{
    #[Route('/billing', name: 'app_billing')]
    public function billing(): Response
    {
        return $this->render('billing/billing.html.twig');
    }

    #[Route('/billing/submit', name: 'billing_submit', methods: ['POST'])]
    public function submitBilling(Request $request, EntityManagerInterface $entityManager): Response
    {
        // Aquí podrías manejar los datos de facturación que se envían desde el formulario.
        $paymentData = $request->request->all();

        // Obtén el usuario actualmente autenticado
        $user = $this->getUser();

        if ($user) {
            // Añade el rol de 'ROLE_PREMIUM' al usuario
            $user->setRoles(array_merge($user->getRoles(), ['ROLE_PREMIUM']));

            // Persiste y guarda los cambios en la base de datos
            $entityManager->persist($user);
            $entityManager->flush();

            // Agrega un mensaje flash de éxito
            $this->addFlash('success', '¡Tu cuenta ha sido actualizada a Premium!');
        }

        return $this->redirectToRoute('app_profile');
    }
}
