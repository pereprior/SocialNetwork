<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/post')]
class PostController extends AbstractController
{
    private ObjectManager $manager;
    private PostRepository $repository;

    public function __construct(ManagerRegistry $doctrine)
    {
        $repository = $doctrine->getRepository(Post::class);

        $this->manager = $doctrine->getManager();
        $this->repository = $repository;
    }

    #[Route('/{id}', name: 'post_info')]
    public function post($id): Response
    {
        return $this->render('post/post_info.html.twig', array(
            'post' => $this->repository->find($id)
        ));
    }

}
