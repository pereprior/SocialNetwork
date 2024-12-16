<?php

namespace App\Controller;

use App\Entity\Post;
use App\Entity\SavedPost;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;

class SavedPostController extends AbstractController
{
    // Lista de posts guardados
    #[Route('/saved-posts', name: 'saved_posts_list')]
    public function listSavedPosts(): \Symfony\Component\HttpFoundation\Response
    {
        $user = $this->getUser();

        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        // Recuperar los posts guardados solo del usuario autenticado
        $savedPosts = $user->getSavedPosts();

        return $this->render('saved_posts/list.html.twig', [
            'savedPosts' => $savedPosts,
        ]);
    }

    // Añadir un post a los posts guardados
    #[Route('/saved-posts/add/{id}', name: 'saved_posts_add', methods: ['POST'])]
    public function addToSavedPosts(Post $post, EntityManagerInterface $entityManager): RedirectResponse
    {
        $user = $this->getUser();

        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        // Verificar si el usuario ya guardó este post
        $savedPostRepository = $entityManager->getRepository(SavedPost::class);
        $existingSavedPost = $savedPostRepository->findOneBy([
            'user' => $user,
            'post' => $post,
        ]);

        if ($existingSavedPost) {
            $this->addFlash('warning', 'Ya has guardado este post.');
            return $this->redirectToRoute('app_inicio');
        }

        // Crear una nueva entrada en SavedPost
        $savedPost = new SavedPost();
        $savedPost->setUser($user);
        $savedPost->setPost($post);

        $entityManager->persist($savedPost);
        $entityManager->flush();

        $this->addFlash('success', 'Post guardado correctamente.');
        return $this->redirectToRoute('app_inicio');
    }


    #[Route('/saved-posts/remove/{id}', name: 'saved_posts_remove', methods: ['POST'])]
    public function removeFromSavedPosts(Post $post, EntityManagerInterface $entityManager): RedirectResponse
    {
        $user = $this->getUser();

        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        if ($user->getSavedPosts()->contains($post)) {
            $user->getSavedPosts()->removeElement($post);
            $entityManager->flush();
            $this->addFlash('success', 'Post eliminado de guardados.');
        }

        return $this->redirectToRoute('app_profile');
    }
}