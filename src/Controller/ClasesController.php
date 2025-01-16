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

    // Método para crear una clase
    #[Route('/clases/new', name: 'class_new')]
    public function createClass(Request $request, EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('ROLE_CHEF'); // Solo los chefs pueden crear clases

        $clases = new Clases();
        $form = $this->createForm(ClasesType::class, $clases);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $clases->setChef($this->getUser()); // Asignar el chef actual
            $entityManager->persist($clases);
            $entityManager->flush();

            return $this->redirectToRoute('class_list');
        }

        $this->fileService->setImagesUrl($entityManager->getRepository(User::class)->findAll());

        return $this->render('clases/index.html.twig', [
            'classForm' => $form->createView(),
            'page_title' => 'Create a New Class',
        ]);
    }

    // Método para listar las clases
    #[Route('/clases', name: 'class_list')]
    public function listClasses(EntityManagerInterface $entityManager): Response
    {
        // Verificar que el usuario es al menos un alumno (ROLE_STUDENT)
        if (!$this->isGranted('ROLE_STUDENT')) {
            throw new AccessDeniedException('You are not allowed to view this page.');
        }

        $classes = $entityManager->getRepository(Clases::class)->findAll();
        $this->fileService->setImagesUrl($entityManager->getRepository(User::class)->findAll());

        return $this->render('clases/lista_clases.html.twig', [
            'classes' => $classes,
            'page_title' => 'Class List',
        ]);
    }

    // Método para editar una clase
    #[Route('/clases/{id}/edit', name: 'class_edit')]
    public function editClass(Clases $clases, Request $request, EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('ROLE_CHEF'); // Solo los chefs pueden editar clases

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
    }

    // Método para eliminar una clase
    #[Route('/clases/{id}/delete', name: 'class_delete', methods: ['POST'])]
    public function deleteClass(Request $request, Clases $clases, EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('ROLE_CHEF'); // Solo los chefs pueden eliminar clases

        if ($clases->getChef() !== $this->getUser()) {
            throw new AccessDeniedException('You are not allowed to delete this class.');
        }

        if ($this->isCsrfTokenValid('delete' . $clases->getId(), $request->request->get('_token'))) {
            $entityManager->remove($clases);
            $entityManager->flush();
            $this->addFlash('success', 'Class deleted successfully.');
        } else {
            $this->addFlash('error', 'Invalid CSRF token.');
        }

        return $this->redirectToRoute('class_list');
    }
}