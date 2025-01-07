<?php

namespace App\Security;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;

class UserProvider implements UserProviderInterface
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Carga el usuario por su identificador, que puede ser el correo o el nombre de usuario.
     */
    public function loadUserByIdentifier(string $identifier): UserInterface
    {
        // Primero intentamos encontrar al usuario por email
        $user = $this->entityManager->getRepository(User::class)->findOneBy(['email' => $identifier]);

        // Si no encontramos el usuario por email, intentamos por el nombre de usuario
        if (!$user) {
            $user = $this->entityManager->getRepository(User::class)->findOneBy(['username' => $identifier]);
        }

        // Si no se encuentra el usuario, lanzamos una excepción
        if (!$user) {
            throw new UsernameNotFoundException("Usuario no encontrado.");
        }

        return $user;
    }

    public function refreshUser(UserInterface $user): UserInterface
    {
        return $user;
    }

    public function supportsClass(string $class): bool
    {
        return User::class === $class;
    }
}
