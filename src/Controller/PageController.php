<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        return $this->render('page/index.html.twig', [
            'page_title' => 'Home',
        ]);
    }

    #[Route('/explore', name: 'explore')]
    public function explore(): Response
    {
        return $this->render('page/explore.html.twig', [
            'page_title' => 'Explore',
        ]);
    }

    #[Route('/profile', name: 'profile')]
    public function profile(): Response
    {
        return $this->render('page/profile.html.twig', [
            'page_title' => 'Profile',
        ]);
    }

    #[Route('/chats', name: 'chats')]
    public function chats(): Response
    {
        return $this->render('page/chats.html.twig', [
            'page_title' => 'Chats',
        ]);
    }
}