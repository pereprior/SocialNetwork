<?php

namespace App\Controller;

use App\Repository\CommentRepository;
use App\Repository\PostRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api')]
class ApiController extends AbstractController
{
    #[Route('/', name: 'api_index')]
    public function index(): Response
    {
        return $this->render('api/index.html.twig');
    }

    #[Route('/posts', name: 'api_posts')]
    public function getPosts(PostRepository $repository): JsonResponse
    {
        $posts = $repository->findAll();
        $data = [];

        foreach ($posts as $post) {
            $comments = [];
            foreach ($post->getComments() as $comment) {
                $comments[] = $comment->getId();
            }

            $data[] = [
                'id' => $post->getId(),
                'title' => $post->getTitle(),
                'content' => $post->getContent(),
                'datetime' => $post->getDatetimeFormated(),
                'img' => $post->getImg(),
                'numLikes' => $post->getNumLikes(),
                'numViews' => $post->getNumViews(),
                'user' => $post->getUser()->getId(),
                'comments' => $comments,
            ];
        }

        return new JsonResponse($data);
    }

    #[Route('/comments', name: 'api_comments')]
    public function getComments(CommentRepository $repository): JsonResponse
    {
        $comments = $repository->findAll();
        $data = [];

        foreach ($comments as $comment) {
            $data[] = [
                'id' => $comment->getId(),
                'content' => $comment->getContent(),
                'datetime' => $comment->getDatetimeFormated(),
                'user' => $comment->getUser()->getId(),
                'post' => $comment->getPost()->getId(),
            ];
        }

        return new JsonResponse($data);
    }

    #[Route('/users', name: 'api_users')]
    public function getUsers(UserRepository $repository): JsonResponse
    {
        $users = $repository->findAll();
        $data = [];

        foreach ($users as $user) {
            $comments = [];
            foreach ($user->getComments() as $comment) {
                $comments[] = $comment->getId();
            }

            $messages = [];
            foreach ($user->getMessages() as $message) {
                $messages[] = $message->getId();
            }

            $posts = [];
            foreach ($user->getPosts() as $post) {
                $posts[] = $post->getId();
            }

            $likedPosts = [];
            foreach ($user->getLikedPosts() as $likedPost) {
                $likedPosts[] = $likedPost->getId();
            }

            $data[] = [
                'id' => $user->getId(),
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'roles' => $user->getRoles(),
                'isStudent' => $user->getIsStudent(),
                'isChef' => $user->getIsChef(),
                'proofOfChefTitle' => $user->getProofOfChefTitle(),
                'bio' => $user->getBio(),
                'birthdate' => $user->getBirthdateFormated(),
                'username' => $user->getUsername(),
                'password' => $user->getPassword(),
                'posts' => $posts,
                'comments' => $comments,
                'messages' => $messages,
                'likedPosts' => $likedPosts,
            ];
        }

        return new JsonResponse($data);
    }
}
