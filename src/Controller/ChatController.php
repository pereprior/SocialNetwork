<?php

namespace App\Controller;

use App\Entity\Message;
use App\Entity\User;
use App\Form\MessageFormType;
use App\Repository\MessageRepository;
use App\Repository\UserRepository;
use App\Service\DateTimeService;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

#[Route('/chat')]
class ChatController extends AbstractController
{
    private ObjectManager $manager;
    private MessageRepository $messageRepository;
    private UserRepository $userRepository;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->manager = $doctrine->getManager();
        $this->messageRepository = $doctrine->getRepository(Message::class);
        $this->userRepository = $doctrine->getRepository(User::class);
    }

    /**
     * @throws NonUniqueResultException
     */
    #[Route('/', name: 'chats')]
    public function index(Security $security, DateTimeService $dateTimeService): Response
    {
        $user = $security->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_inicio');
        }

        $allUsers = $this->userRepository->findAll();
        $chats = [];

        foreach ($allUsers as $otherUser) {
            if ($otherUser->getId() !== $user->getId()) {
                $lastMessage = $this->messageRepository->findLastMessagesByUsers($user->getId(), $otherUser->getId());
                if ($lastMessage) {
                    $lastMessage->setTimeSince($dateTimeService->timeSince($lastMessage->getDatetime()));
                    $chats[] = $lastMessage;
                }
            }
        }

        return $this->render('chat/index.html.twig', [
            'page_title' => 'Chats',
            'chats' => $chats,
        ]);
    }

    #[Route('/dm/{id}', name: 'chat_dm')]
    public function dm($id, Security $security, DateTimeService $dateTimeService, Request $request): Response
    {
        $user = $security->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_inicio');
        }

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
            $message->setUserFrom($user);
            $userTo = $this->userRepository->find($id);
            $message->setUserTo($userTo);

            $this->manager->persist($message);
            $this->manager->flush();
            return $this->redirectToRoute('chat_dm', ['id' => $id]);
        }

        return $this->render('chat/_chat.html.twig', [
            'page_title' => 'Direct Messages',
            'chats' => $chats,
            'messageForm' => $form->createView(),
        ]);
    }

}