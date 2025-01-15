<?php

namespace App\Controller;

use App\Entity\Clases;
use App\Entity\User;
use App\Form\ClasesType;
use App\Service\FileService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class ClasesController extends AbstractController
{
    private FileService $fileService;

    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    #[Route('/clases/new', name: 'class_new')]
    public function createClass(Request $request, EntityManagerInterface $entityManager): Response
    {
        try {
            // Verificar si el usuario tiene el rol de chef
            $this->denyAccessUnlessGranted('ROLE_CHEF');

            $clases = new Clases();
            $form = $this->createForm(ClasesType::class, $clases);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $clases->setChef($this->getUser()); // Asignar el chef actual

                $entityManager->persist($clases);
                $entityManager->flush();

                // Redirigir a la lista de clases
                return $this->redirectToRoute('class_list');
            }
            $this->fileService->setImagesUrl($entityManager->getRepository(User::class)->findAll());

            return $this->render('clases/index.html.twig', [
                'classForm' => $form->createView(),
                'page_title' => 'Create a New Class',
            ]);
        } catch (\Exception $e) {
            $this->addFlash('error', 'An error occurred while creating the class: ' . $e->getMessage());
            return $this->redirectToRoute('class_list');
        }
    }

    #[Route('/clases', name: 'class_list')]
    public function listClasses(EntityManagerInterface $entityManager): Response
    {
        try {
            // Obtener todas las clases de la base de datos
            $classes = $entityManager->getRepository(Clases::class)->findAll();
            $this->fileService->setImagesUrl($entityManager->getRepository(User::class)->findAll());

            return $this->render('clases/lista_clases.html.twig', [
                'classes' => $classes,
                'page_title' => 'Class list',
            ]);
        } catch (\Exception $e) {
            $this->addFlash('error', 'An error occurred while retrieving the classes: ' . $e->getMessage());
            return $this->redirectToRoute('class_list');
        }
    }

    #[Route('/clases/{id}/edit', name: 'class_edit')]
    public function editClass(Clases $clases, Request $request, EntityManagerInterface $entityManager): Response
    {
        try {
            // Verificar si el usuario autenticado es el chef que creó la clase
            $this->denyAccessUnlessGranted('ROLE_CHEF');

            if ($clases->getChef() !== $this->getUser()) {
                throw new AccessDeniedException('You are not allowed to edit this class.');
            }

            $form = $this->createForm(ClasesType::class, $clases);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $entityManager->flush();

                $this->addFlash('success', 'Class updated successfully.');
                return $this->redirectToRoute('class_list');
            }
            $this->fileService->setImagesUrl($entityManager->getRepository(User::class)->findAll());

            return $this->render('clases/edit.html.twig', [
                'classForm' => $form->createView(),
            ]);
        } catch (\Exception $e) {
            $this->addFlash('error', 'An error occurred while updating the class: ' . $e->getMessage());
            return $this->redirectToRoute('class_list');
        }
    }

    // Método para eliminar una clase
    #[Route('/clases/{id}/delete', name: 'class_delete', methods: ['POST'])]
    public function deleteClass(Request $request, Clases $clases, EntityManagerInterface $entityManager): Response
    {
        try {
            // Verificar si el usuario autenticado es el chef que creó la clase
            $this->denyAccessUnlessGranted('ROLE_CHEF');

            if ($clases->getChef() !== $this->getUser()) {
                throw new AccessDeniedException('You are not allowed to delete this class.');
            }

            // Validar el token CSRF para evitar ataques
            if ($this->isCsrfTokenValid('delete' . $clases->getId(), $request->request->get('_token'))) {
                $entityManager->remove($clases);
                $entityManager->flush();

                $this->addFlash('success', 'Class deleted successfully.');
            } else {
                $this->addFlash('error', 'Invalid CSRF token.');
            }

            return $this->redirectToRoute('class_list');
        } catch (\Exception $e) {
            $this->addFlash('error', 'An error occurred while deleting the class: ' . $e->getMessage());
            return $this->redirectToRoute('class_list');
        }
    }
}
