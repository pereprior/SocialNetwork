<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'app_profile')]
    public function profile(): Response
    {
        // Obtén el usuario actualmente autenticado
        $user = $this->getUser();

        // Asegúrate de que el usuario esté autenticado
        if (!$user) {
            return $this->redirectToRoute('app_profile');
        }

        $form = $this->createFormBuilder()
            ->getForm();

        return $this->render('profile/index.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
            'page_title' => 'Perfil del Usuario',
            'show_form' => false,
        ]);
    }

    #[Route('/upgrade-to-premium', name: 'app_upgrade_to_premium', methods: ['POST'])]
    public function upgradeToPremium(EntityManagerInterface $entityManager): RedirectResponse
    {
        $user = $this->getUser();

        // Asegúrate de que el usuario esté autenticado
        if (!$user) {
            return $this->redirectToRoute('app_profile');
        }

        // Agrega el rol 'ROLE_PREMIUM' al usuario
        $roles = $user->getRoles();
        if (!in_array('ROLE_PREMIUM', $roles)) {
            $roles[] = 'ROLE_PREMIUM';
            $user->setRoles($roles);
        }

        // Guarda los cambios en la base de datos
        $entityManager->flush();

        // Muestra un mensaje de éxito al usuario
        $this->addFlash('success', '¡Felicidades! Ahora eres un usuario Premium.');

        return $this->redirectToRoute('app_profile');
    }


    #[Route('/downgrade-from-premium', name: 'app_downgrade_from_premium', methods: ['POST'])]
    public function downgradeFromPremium(EntityManagerInterface $entityManager): RedirectResponse
    {
        $user = $this->getUser();

        if (!$user) {
            return $this->redirectToRoute('app_profile');
        }

        // Elimina el rol 'ROLE_PREMIUM'
        $roles = $user->getRoles();
        $roles = array_diff($roles, ['ROLE_PREMIUM']);
        $user->setRoles($roles);

        $entityManager->flush();

        $this->addFlash('success', '¡Has cancelado tu suscripción Premium!');

        return $this->redirectToRoute('app_profile');
    }

    #[Route('/edit-profile', name: 'app_edit_profile')]
    public function editProfile(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();

        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $form = $this->createFormBuilder($user)
            ->add('name', TextType::class, ['label' => 'Nombre'])
            ->add('username', TextType::class, ['label' => 'Nombre de usuario'])
            ->add('email', TextType::class, ['label' => 'Correo electrónico'])
            ->add('birthdate', DateType::class, [
                'label' => 'Fecha de nacimiento',
                'widget' => 'single_text',
            ])
            ->add('bio', TextareaType::class, ['label' => 'Biografía', 'required' => false])
            ->add('gender', TextType::class, ['label' => 'Género'])
            ->add('submit', SubmitType::class, ['label' => 'Guardar cambios'])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFlash('success', 'Tu perfil ha sido actualizado.');

            return $this->redirectToRoute('app_profile');
        }

        return $this->render('profile/index.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
            'show_form' => true, // Mostrar el formulario
            'page_title' => 'Editar Perfil',
        ]);
    }
}