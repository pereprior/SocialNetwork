<?php

namespace App\Controller;

use App\Entity\Message;
use App\Entity\User;
use App\Form\MessageFormType;
use App\Repository\MessageRepository;
use App\Repository\UserRepository;
use App\Service\DateTimeService;
use App\Service\FileService;
use App\Service\FormService;
use App\Service\UserService;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;

#[Route('/chat')]
class ChatController extends AbstractController
{
    private ObjectManager $manager;
    private MessageRepository $messageRepository;
    private UserRepository $userRepository;
    private UserInterface $activeUser;

    public function __construct(UserService $userService, ManagerRegistry $doctrine)
    {
        $this->manager = $doctrine->getManager();
        $this->messageRepository = $doctrine->getRepository(Message::class);
        $this->userRepository = $doctrine->getRepository(User::class);
        $this->activeUser = $userService->getActiveUser();
    }

    /**
     * Ruta que muestra los chats que tiene abiertos el usuario actual
     * @throws NonUniqueResultException
     */
    #[Route('/', name: 'chats')]
    public function index(DateTimeService $dateTimeService, FileService $fileService, UserRepository $userRepository): Response
    {
        $chats = $this->messageRepository->findLastMessagesForUser($this->activeUser->getId(), $dateTimeService, $this->userRepository);
        $fileService->setImagesUrl($userRepository->findAll());

        return $this->render('chat/index.html.twig', [
            'page_title' => 'Chats',
            'chats' => $chats,
        ]);
    }

    /**
     * Ruta que muestra el chat privado entre el usuario actual y el usuario con el id proporcionado
     */
    #[Route('/dm/{id}', name: 'chat_dm')]
    public function dm($id, Request $request, FileService $fileService, UserRepository $userRepository, DateTimeService $dateTimeService): Response
    {
        $chats = $this->messageRepository->findMessagesByUserId($id);
        foreach ($chats as $chat) {
            $chat->setTimeSince($dateTimeService->timeSince($chat->getDateTime()));
        }

        $message = new Message();
        $form = $this->createForm(MessageFormType::class, $message);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $message = $form->getData();
            $message->setUserFrom($this->activeUser);
            $userTo = $this->userRepository->find($id);
            $message->setUserTo($userTo);

            $this->manager->persist($message);
            $this->manager->flush();
            return $this->redirectToRoute('chat_dm', ['id' => $id]);
        }

        $fileService->setImagesUrl($userRepository->findAll());

        return $this->render('chat/_chat.html.twig', [
            'page_title' => 'Direct Messages',
            'chats' => $chats,
            'messageForm' => $form->createView(),
        ]);
    }


}