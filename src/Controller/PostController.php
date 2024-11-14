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

    #[Route('/new', name: 'new_post')]
    public function newPost(Request $request): Response
    {
        /*$post = new Post();
        $form = $this->createForm(PostFormType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $post = $form->getData();
            $post->setUser($this->getUser());

            $this->manager->persist($post);
            $this->manager->flush();

            return $this->redirectToRoute('app_inicio');
        }*/

        return $this->render('page/index.html.twig', array(
            //'form' => $form->createView()
        ));
    }

}
