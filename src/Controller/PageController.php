<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostFormType;
use App\Repository\PostRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    private ObjectManager $manager;
    private PostRepository $postRepository;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->manager = $doctrine->getManager();
        $this->postRepository = $doctrine->getRepository(Post::class);
    }

    #[Route('/', name: 'app_inicio')]
    public function index(Request $request): Response
    {
        $post = new Post();
        $form = $this->createForm(PostFormType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $post = $form->getData();
            $post->setUser($this->getUser());

            $this->manager->persist($post);
            $this->manager->flush();

            return $this->redirectToRoute('app_inicio');
        }

        return $this->render('page/index.html.twig', [
            'form' => $form->createView(),
            'posts' => $this->postRepository->findAll()
        ]);
    }
}