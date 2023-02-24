<?php

namespace App\Entity;

use App\Repository\DaRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraint as Assert;

#[ORM\Entity(repositoryClass: DaRepository::class)]
#[UniqueEntity('email','Cet email existe déjà')]
class Da implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id_da = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prenom = null;

    #[ORM\Column(type:'json' )]
    private array $roles = ['ROLE_USER'];

    private ?string $plainPassword = null;

    #[ORM\Column(length: 255)]
    private ?string $password;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $avatar = null;


    public function getIdDa(): ?int
    {
        return $this->id_da;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }
    public function getRoles(): array
    {
        $roles = $this->roles;
        $roles = ['ROLE_USER'];
        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }

    public function setPlainPassword(?string $plainPassword): self
    {
        $this->plainPassword = $plainPassword;

        return $this;
    }
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getAvatar(): ?string
    {
        return $this->image;
    }

    public function setAvatar (?string $image): self
    {
        $this->image = $image;

        return $this;
    }
    public function eraseCredentials() : void
    {
        $this->plainPassword = null;
    }
    public function getUserIdentifier(): string
    {
        return $this -> email;
    }
}
