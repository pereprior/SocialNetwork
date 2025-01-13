<?php

namespace App\Controller;

use App\Entity\Hashtag;
use App\Entity\Post;
use App\Entity\User;
use App\Form\PostFormType;
use App\Repository\PostRepository;
use App\Repository\UserRepository;
use App\Service\FileService;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use GuzzleHttp\Exception\GuzzleException;
use JsonException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class PageController extends AbstractController
{
    private ObjectManager $manager;
    private Security $security;
    private PostRepository $postRepository;
    private FileService $fileService;

    public function __construct(ManagerRegistry $doctrine, Security $security, FileService $fileService)
    {
        $this->manager = $doctrine->getManager();
        $this->security = $security;
        $this->postRepository = $doctrine->getRepository(Post::class);
        $this->fileService = $fileService;
    }

    /**
     * @throws JsonException
     * @throws GuzzleException
     */
    #[Route('/', name: 'app_inicio')]
    public function index(Request $request, UserRepository $userRepository): Response
    {
        $post = new Post();
        $currentUser = $this->security->getUser();
        $form = $this->createForm(PostFormType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {

            $post = $form->getData();
            $newHashtags = $form->get('hashtags')->getData();
            if ($newHashtags) {
                $hashtagNames = array_map('trim', explode(',', $newHashtags));
                foreach ($hashtagNames as $name) {
                    $hashtag = $this->manager->getRepository(Hashtag::class)->findOneBy(['name' => $name]);
                    if (!$hashtag) {
                        $hashtag = new Hashtag();
                        $hashtag->setName($name);
                        $this->manager->persist($hashtag);
                    }
                    $post->addHashtag($hashtag);
                }
            }

            $image = $form->get('img')->getData();
            if ($image) {
                try {
                    $fileName = $this->fileService->uploadImage($image);
                    $post->setImg($fileName);
                } catch (\Exception $e) {
                    return $this->render('page/index.html.twig', [
                        'page_title' => 'Inicio',
                        'form' => $form->createView(),
                        'error' => $e->getMessage(),
                        'posts' => $this->postRepository->findAll()
                    ]);
                }
            }

            $post->setUser($currentUser);

            $this->manager->persist($post);
            $this->manager->flush();

            return $this->redirectToRoute('app_inicio');
        }

        $this->fileService->setImagesUrl($this->postRepository->findAll());
        $this->fileService->setImagesUrl($userRepository->findAll());

        return $this->render('page/index.html.twig', [
            'page_title' => 'Inicio',
            'form' => $form->createView(),
            'posts' => $this->postRepository->findAll(),
        ]);
    }

    #[Route('/explore', name: 'explore')]
    public function explore(Request $request): Response
    {
        $search = $request->query->get('search');
        $posts = $search ? $this->postRepository->findByHashtag($search) : $this->postRepository->findAll();
        $this->fileService->setImagesUrl($this->postRepository->findAll());

        return $this->render('page/explore.html.twig', [
            'page_title' => 'Explore',
            'posts' => $posts,
        ]);
    }

    #[Route('/like/{id}', name: 'post_like')]
    public function like($id): Response
    {
        $post = $this->postRepository->find($id);
        $currentUser = $this->security->getUser();

        if ($post) {
            if (!$currentUser instanceof User) {
                return $this->json(['likes' => $post->getNumLikes()]);
            }

            if ($post->isLikedByUser($currentUser)) {
                $post->setNumLikes($post->getNumLikes() - 1);
                $currentUser->removeLikedPost($post);
            } else {
                $post->setNumLikes($post->getNumLikes() + 1);
                $currentUser->addLikedPost($post);
            }
            $this->manager->flush();
        }

        return $this->json(['likes' => $post->getNumLikes()]);
    }
}