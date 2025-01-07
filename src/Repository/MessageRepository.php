<?php

namespace App\Repository;

use App\Entity\Message;
use App\Service\DateTimeService;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Message>
 *
 * @method Message|null find($id, $lockMode = null, $lockVersion = null)
 * @method Message|null findOneBy(array $criteria, array $orderBy = null)
 * @method Message[]    findAll()
 * @method Message[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MessageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Message::class);
    }

    public function findMessagesByUserId($userId)
    {
        return $this->createQueryBuilder('m')
            ->where('m.userFrom = :userId OR m.userTo = :userId')
            ->setParameter('userId', $userId)
            ->orderBy('m.datetime', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @throws NonUniqueResultException
     */
    public function findLastMessagesForUser(int $userId, DateTimeService $dateTimeService, UserRepository $userRepository): array
    {
        $allUsers = $userRepository->findAll();
        $chats = [];

        foreach ($allUsers as $otherUser) {
            if ($otherUser->getId() !== $userId) {

                $lastMessage = $this->createQueryBuilder('m')
                    ->where('(m.userFrom = :user1 AND m.userTo = :user2) OR (m.userFrom = :user2 AND m.userTo = :user1)')
                    ->setParameter('user1', $userId)
                    ->setParameter('user2', $otherUser->getId())
                    ->orderBy('m.datetime', 'DESC')
                    ->setMaxResults(1)
                    ->getQuery()
                    ->getOneOrNullResult();

                if ($lastMessage) {
                    $lastMessage->setTimeSince($dateTimeService->timeSince($lastMessage->getDatetime()));
                    $chats[] = $lastMessage;
                }
            }
        }

        return $chats;
    }


}
