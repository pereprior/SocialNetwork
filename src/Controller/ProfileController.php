<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\UserFormType;
use App\Repository\PostRepository;
use App\Repository\UserRepository;
use App\Service\FileService;
use App\Service\UserService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\{FileType, TextType, DateType, TextareaType, SubmitType};
use Symfony\Component\Security\Core\User\UserInterface;

class ProfileController extends AbstractController
{
    private PostRepository $postRepository;
    private UserInterface $activeUser;

    public function __construct(PostRepository $postRepository, UserService $userService)
    {
        $this->postRepository = $postRepository;
        $this->activeUser = $userService->getActiveUser();
    }

    #[Route('/profile/{id?}', name: 'app_profile')]
    public function profile(?int $id, UserRepository $userRepository, FileService $fileService): Response
    {
        if ($id === null) {
            $user = $this->getUser();

            if (!$user) {
                return $this->redirectToRoute('app_login');
            }
        } else {
            $user = $userRepository->find($id);

            if (!$user) {
                throw $this->createNotFoundException('Usuario no encontrado.');
            }
        }

        $fileService->setImagesUrl($userRepository->findAll());
        $fileService->setImagesUrl($this->postRepository->findAll());
        $posts = $this->postRepository->findBy(['user' => $user]);

        return $this->render('profile/index.html.twig', [
            'user' => $user,
            'form' => null,
            'posts' => $posts,
            'page_title' => $id === null ? 'Mi Perfil' : 'Perfil de ' . $user->getName(),
            'show_form' => $id === null,
            'image_server_url' => $fileService->getImageServerUrl(),
        ]);
    }

    #[Route('/upgrade-to-premium', name: 'app_upgrade_to_premium', methods: ['POST'])]
    public function upgradeToPremium(EntityManagerInterface $entityManager): RedirectResponse
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        if (!in_array('ROLE_PREMIUM', $user->getRoles())) {
            $user->setRoles([...$user->getRoles(), 'ROLE_PREMIUM']);
            $entityManager->flush();
            $this->addFlash('success', '¡Felicidades! Ahora eres un usuario Premium.');
        }

        return $this->redirectToRoute('app_profile');
    }

    #[Route('/downgrade-from-premium', name: 'app_downgrade_from_premium', methods: ['POST'])]
    public function downgradeFromPremium(EntityManagerInterface $entityManager): RedirectResponse
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $user->setRoles(array_diff($user->getRoles(), ['ROLE_PREMIUM']));
        $entityManager->flush();
        $this->addFlash('success', '¡Has cancelado tu suscripción Premium!');

        return $this->redirectToRoute('app_profile');
    }

    #[Route('/edit-profile', name: 'app_edit_profile')]
    public function editProfile(
        Request $request,
        EntityManagerInterface $entityManager,
        PostRepository $postRepository,
        FileService $fileService
    ): Response {
        $user = $this->activeUser;
        $form = $this->createForm(UserFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $image = $form->get('userImage')->getData();
            if ($image) {
                try {
                    $fileName = $fileService->uploadImage($image);
                    $user->setUserImage($fileName);
                } catch (\Exception $e) {
                    return $this->render('page/index.html.twig', [
                        'page_title' => 'Inicio',
                        'form' => $form->createView(),
                        'error' => $e->getMessage(),
                        'posts' => $this->postRepository->findAll()
                    ]);
                }
            }

            $entityManager->flush();
            $this->addFlash('success', 'Tu perfil ha sido actualizado.');
            return $this->redirectToRoute('app_profile');
        }

        // Recuperar los posts creados por el usuario
        $posts = $postRepository->findBy(['user' => $user], ['datetime' => 'DESC']);

        return $this->render('profile/index.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
            'posts' => $posts,
            'show_form' => true,
            'page_title' => 'Editar Perfil',
        ]);
    }
}