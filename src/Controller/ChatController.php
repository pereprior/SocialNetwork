<?php

namespace App\Controller;

use App\Entity\Message;
use App\Form\MessageFormType;
use App\Service\ChatService;
use App\Service\DateTimeService;
use App\Service\FileService;
use App\Service\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/chat')]
class ChatController extends AbstractController
{
    private ChatService $chatService;
    private DateTimeService $dateTimeService;
    private UserService $userService;

    public function __construct(
        ChatService $chatService,
        UserService $userService,
        FileService $fileService,
        DateTimeService $dateTimeService
    ) {
        $this->chatService = $chatService;
        $this->dateTimeService = $dateTimeService;
        $this->userService = $userService;

        $fileService->setImagesUrl($userService->getAllUsers());
    }

    /**
     * Ruta que muestra los chats que tiene abiertos el usuario actual
     */
    #[Route('/', name: 'chats')]
    public function index(): Response
    {
        $userId = $this->userService->getCurrentUserId();
        $openChats = $this->chatService->getOpenChats($userId, $this->dateTimeService);

        return $this->render(
            view: 'chat/index.html.twig',
            parameters: ['chats' => $openChats]
        );
    }

    /**
     * Ruta que muestra el chat privado entre el usuario actual y el usuario con el id proporcionado
     */
    #[Route('/dm/{id}', name: 'chat_dm')]
    public function dm($id, Request $request): Response
    {
        $message = new Message();
        $form = $this->createForm(MessageFormType::class, $message);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $this->chatService->sendMessage(
                messageContent: $message,
                userFromId: $this->userService->getCurrentUserId(),
                userToId: $id
            );
            return $this->redirectToRoute('chat_dm', ['id' => $id]);
        }

        $userToMessages = $this->chatService->getMessagesByUserId($id, $this->dateTimeService);
        return $this->render('chat/_chat.html.twig', [
            'chats' => $userToMessages,
            'messageForm' => $form->createView(),
        ]);
    }
}