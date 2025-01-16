<?php

namespace App\Service;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;

class UserService
{
    private UserRepository $userRepository;
    private Security $security;

    public function __construct(UserRepository $userRepository, Security $security)
    {
        $this->userRepository = $userRepository;
        $this->security = $security;
    }

    public function getCurrentUser(): UserInterface
    {
        return $this->security->getUser();
    }

    public function getCurrentUserId(): int
    {
        $activeUser = $this->getCurrentUser();
        if ($activeUser instanceof User) {
            return $activeUser->getId();
        }
        throw new \LogicException('Current user is not an instance of User.');
    }

    public function getAllUsers(): array
    {
        return $this->userRepository->findAll();
    }
}