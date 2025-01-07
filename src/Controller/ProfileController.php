<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
use App\Repository\UserRepository;
use App\Service\FileService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\{FileType, TextType, DateType, TextareaType, SubmitType};

class ProfileController extends AbstractController
{
    private PostRepository $postRepository;
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    #[Route('/profile/{id?}', name: 'app_profile')]
    public function profile(?int $id, UserRepository $userRepository, PostRepository $postRepository, FileService $fileService): Response
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

        $fileService->setImagesUrl($this->postRepository->findAll());
        $posts = $postRepository->findBy(['user' => $user]);
        $savedPosts = $user->getSavedPosts();

        return $this->render('profile/index.html.twig', [
            'user' => $user,
            'form' => null,
            'posts' => $posts,
            'page_title' => $id === null ? 'Mi Perfil' : 'Perfil de ' . $user->getName(),
            'savedPosts' => $savedPosts,
            'show_form' => $id === null,
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
        PostRepository $postRepository
    ): Response {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $form = $this->createFormBuilder($user)
            ->add('name', TextType::class, ['label' => 'Nombre'])
            ->add('username', TextType::class, ['label' => 'Nombre de usuario'])
            ->add('email', TextType::class, ['label' => 'Correo electrónico'])
            ->add('birthdate', DateType::class, ['label' => 'Fecha de nacimiento', 'widget' => 'single_text'])
            ->add('bio', TextareaType::class, ['label' => 'Biografía', 'required' => false])
            ->add('gender', TextType::class, ['label' => 'Género'])
            ->add('userImage', FileType::class, [
                'label' => 'Imagen de perfil',
                'mapped' => false,
                'required' => false,
            ])
            ->add('submit', SubmitType::class, ['label' => 'Guardar cambios'])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('userImage')->getData();

            if ($imageFile) {
                $newFilename = uniqid() . '.' . $imageFile->guessExtension();

                try {
                    $imageFile->move(
                        $this->getParameter('uploads_directory'),
                        $newFilename
                    );
                    $user->setUserImage($newFilename);
                } catch (FileException $e) {
                    $this->addFlash('error', 'Hubo un error al subir la imagen.');
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