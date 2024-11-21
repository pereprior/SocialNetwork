<?php

// src/Controller/BillingController.php

namespace App\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BillingController extends AbstractController
{
    #[Route('/billing', name: 'app_billing')]
    public function billing(): Response  // Asegúrate de que el tipo de retorno sea Response de Symfony
    {
        return $this->render('billing/billing.html.twig');
    }

    #[Route('/billing/submit', name: 'billing_submit', methods: ['POST'])]
    public function submitBilling(Request $request): RedirectResponse
    {
        // Lógica de procesamiento de los datos del formulario
        return $this->redirectToRoute('app_profile');
    }
}
