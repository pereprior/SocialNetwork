<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Post;
use App\Form\CommentFormType;
use App\Repository\CommentRepository;
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
    private CommentRepository $commentRepository;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->manager = $doctrine->getManager();
        $this->commentRepository = $doctrine->getRepository(Comment::class);
        $this->repository = $doctrine->getRepository(Post::class);
    }

    #[Route('/{id}', name: 'post_info')]
    public function post($id, Request $request): Response
    {
        $comment = new Comment();
        $post = $this->repository->find($id);
        if ($post) {
            $post->addView();
            $this->manager->persist($post);
            $this->manager->flush();
        }
        $form = $this->createForm(CommentFormType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $comment = $form->getData();
            $comment->setUser($this->getUser());
            $comment->setPost($post);

            $this->manager->persist($comment);
            $this->manager->flush();
        }

        return $this->render('post/post_info.html.twig', array(
            'commentForm' => $form->createView(),
            'comments' => $this->commentRepository->findBy(array('post' => $id)),
            'post' => $this->repository->find($id)
        ));
    }
}
