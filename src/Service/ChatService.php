<?php

namespace App\Service;

use App\Entity\Message;
use App\Repository\MessageRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;

class ChatService
{
    private MessageRepository $messageRepository;
    private UserRepository $userRepository;
    private EntityManagerInterface $entityManager;

    public function __construct(
        MessageRepository $messageRepository,
        UserRepository $userRepository,
        EntityManagerInterface $entityManager
    ) {
        $this->messageRepository = $messageRepository;
        $this->userRepository = $userRepository;
        $this->entityManager = $entityManager;
    }

    public function getOpenChats(int $userId, DateTimeService $dateTimeService)
    {
        return $this->messageRepository->findLastMessagesForUser($userId, $dateTimeService, $this->userRepository);
    }

    public function sendMessage(Message $messageContent, int $userFromId, int $userToId): void
    {
        $userFrom = $this->userRepository->find($userFromId);
        $userTo = $this->userRepository->find($userToId);
        $messageContent->setUserFrom($userFrom);
        $messageContent->setUserTo($userTo);

        $this->entityManager->persist($messageContent);
        $this->entityManager->flush();
    }

    public function getMessagesByUserId(int $userId, DateTimeService $dateTimeService): array
    {
        $userMessages = $this->messageRepository->findMessagesByUserId($userId);
        foreach ($userMessages as $message) {
            $message->setTimeSince($dateTimeService->timeSince($message->getDateTime()));
        }
        return $userMessages;
    }
}