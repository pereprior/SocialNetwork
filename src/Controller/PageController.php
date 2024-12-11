<?php

namespace App\Controller;

use App\Entity\Hashtag;
use App\Entity\Post;
use App\Form\PostFormType;
use App\Repository\PostRepository;
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
    private $security;
    private PostRepository $postRepository;

    public function __construct(ManagerRegistry $doctrine, Security $security)
    {
        $this->manager = $doctrine->getManager();
        $this->security = $security;
        $this->postRepository = $doctrine->getRepository(Post::class);
    }

    /**
     * @throws JsonException
     * @throws GuzzleException
     */
    #[Route('/', name: 'app_inicio')]
    public function index(Request $request, FileService $fileService): Response
    {
        $post = new Post();
        $user = $this->security->getUser();
        $form = $this->createForm(PostFormType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            if (!$user) {
                throw $this->createAccessDeniedException();
            }

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
                    $fileName = $fileService->uploadImage($image);
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

            $post->setUser($user);

            $this->manager->persist($post);
            $this->manager->flush();

            return $this->redirectToRoute('app_inicio');
        }

        $imageServerUrl = $this->getParameter('image_server_url');
        foreach ($this->postRepository->findAll() as $post) {
            $post->setImgUrl($imageServerUrl);
        }

        return $this->render('page/index.html.twig', [
            'page_title' => 'Inicio',
            'form' => $form->createView(),
            'posts' => $this->postRepository->findAll()
        ]);
    }

    #[Route('/explore', name: 'explore')]
    public function explore(Request $request): Response
    {
        $search = $request->query->get('search');
        $posts = $search ? $this->postRepository->findByHashtag($search) : $this->postRepository->findAll();

        return $this->render('page/explore.html.twig', [
            'page_title' => 'Explore',
            'posts' => $posts,
        ]);
    }
    #[Route('/chats', name: 'chats')]
    public function chats(): Response
    {
        return $this->render('page/chats.html.twig', [
            'page_title' => 'Chats',
        ]);
    }

    #[Route('/like/{id}', name: 'post_like')]
    public function like($id): Response
    {
        $post = $this->postRepository->find($id);
        if ($post) {
            $post->like();
            $this->manager->flush();
        }

        return $this->json(['likes' => $post->getNumLikes()]);
    }
}