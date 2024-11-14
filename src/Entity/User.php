<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints\Date;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?string $username = null;

    #[ORM\Column]
    private ?string $name = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\OneToMany(targetEntity: Post::class, mappedBy: 'user')]
    private Collection $posts;

    #[ORM\OneToMany(targetEntity: Comment::class, mappedBy: 'user')]
    private Collection $comments;

    #[ORM\OneToMany(targetEntity: Message::class, mappedBy: 'userFrom')]
    private Collection $messages;

    #[ORM\ManyToMany(targetEntity: self::class, inversedBy: 'followers')]
    #[ORM\JoinTable(name: 'user_following')]
    private Collection $following;

    #[ORM\ManyToMany(targetEntity: self::class, mappedBy: 'following')]
    private Collection $followers;




    public function __construct()
    {
        $this->posts = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->messages = new ArrayCollection();
        $this->following = new ArrayCollection();
        $this->followers = new ArrayCollection();
    }

    #[ORM\Column(type: 'boolean')]
    private bool $isStudent = false;

    #[ORM\Column(type: 'boolean')]
    private bool $isChef = false;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $proofOfChefTitle = null;

    #[ORM\Column]
    private ?string $bio = null;

    #[ORM\Column(type: 'date')]
    private ?\DateTimeInterface $birthdate = null;

    #[ORM\Column]
    private ?string $gender = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $userImage = null;
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getIsStudent(): bool
    {
        return $this->isStudent;
    }

    public function setIsStudent(bool $isStudent): static
    {
        $this->isStudent = $isStudent;

        return $this;
    }

    public function getIsChef(): bool
    {
        return $this->isChef;
    }

    public function setIsChef(bool $isChef): static
    {
        $this->isChef = $isChef;

        return $this;
    }

    public function getProofOfChefTitle(): ?string
    {
        return $this->proofOfChefTitle;
    }

    public function setProofOfChefTitle(?string $proofOfChefTitle): static
    {
        $this->proofOfChefTitle = $proofOfChefTitle;

        return $this;
    }

    public function getUsername(): ?string {

        return $this->username;
    }

    public function setUsername(string $username): static {

        $this->username = $username;

        return $this;
    }

    public function getName(): ?string {

        return $this->name;
    }

    public function setName(string $name): static {

        $this->name = $name;

        return $this;
    }

    public function getBio(): ?string {

        return $this->bio;
    }

    public function setBio(string $bio): static {

        $this->bio = $bio;

        return $this;
    }

    public function getBirthdate(): ?\DateTimeInterface {

        return $this->birthdate;
    }

    public function setBirthdate(\DateTimeInterface $birthdate): static {

        $this->birthdate = $birthdate;

        return $this;
    }

    public function getUserImage(): ?string
    {
        return $this->userImage;
    }

    public function setUserImage(?string $userImage): static
    {
        $this->userImage = $userImage;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(?string $gender): static
    {
        $this->gender = $gender;

        return $this;
    }

    public function follow(User $user): void
    {
        if (!$this->following->contains($user)) {
            $this->following->add($user);
            $user->addFollower($this);
        }
    }

    public function getFollowing(): Collection
    {
        return $this->following;
    }

    public function unfollow(User $user): void
    {
        if ($this->following->contains($user)) {
            $this->following->removeElement($user);
            $user->removeFollower($this);
        }
    }

    public function removeFollower(User $user): void
    {
        if ($this->followers->contains($user)) {
            $this->followers->removeElement($user);
        }
    }

    public function addFollower(User $user): void
    {
        if (!$this->followers->contains($user)) {
            $this->followers->add($user);
        }
    }

    public function getFollowers(): Collection
    {
        return $this->followers;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }
}