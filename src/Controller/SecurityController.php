<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{
    #[Route('/logout', name: 'logout', methods: ["GET"])]
    public function logout(): void
    {
        throw new \RuntimeException('Don\'t forget to activate logout in security.yaml');
    }
}