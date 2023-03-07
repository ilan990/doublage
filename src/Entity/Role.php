<?php

namespace App\Entity;

use App\Repository\RoleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoleRepository::class)]
class Role
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id_role = null;

    #[ORM\ManyToOne(targetEntity: ContratDa::class)]
    #[ORM\JoinColumn(name: 'id_contrat_da', referencedColumnName: 'id_contrat_da')]
    private ContratDa|null $id_contrat_da = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[ORM\Column(length: 255)]
    private ?string $sexe = null;


    /**
     * @return int|null
     */
    public function getIdRole(): ?int
    {
        return $this->id_role;
    }

    /**
     * @param int|null $id_role
     */
    public function setIdRole(?int $id_role): void
    {
        $this->id_role = $id_role;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }
    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }


    /**
     * @return ContratDa|null
     */
    public function getIdContratDa(): ?ContratDa
    {
        return $this->id_contrat_da;
    }

    /**
     * @param ContratDa|null $id_contrat_da
     */
    public function setIdContratDa(?ContratDa $id_contrat_da): void
    {
        $this->id_contrat_da = $id_contrat_da;
    }

}
