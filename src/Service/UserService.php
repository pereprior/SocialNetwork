<?php

namespace App\Service;

use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;

class UserService
{
    private Security $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public function getActiveUser(): UserInterface
    {
        return $this->security->getUser();
    }
}