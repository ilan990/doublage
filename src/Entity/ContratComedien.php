<?php

namespace App\Entity;

use App\Repository\ContratComedienRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContratComedienRepository::class)]
class ContratComedien
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id_contrat_comedien = null;

    #[ORM\ManyToOne(targetEntity: Comedien::class)]
    #[ORM\JoinColumn(name: 'id_comedien', referencedColumnName: 'id_comedien')]
    private Comedien|null $id_comedien = null;

    #[ORM\ManyToOne(targetEntity: Da::class)]
    #[ORM\JoinColumn(name: 'id_da', referencedColumnName: 'id_da')]
    private Da|null $id_da = null;


    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $creation_contrat = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_debut = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_fin = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?int $production = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $titre = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $roleComedien = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(name: 'id_role', referencedColumnName: 'id_role')]
    private ?Role $id_role = null;

    public function getIdContrat(): ?int
    {
        return $this->id_contrat_comedien;
    }

    /**
     * @return Comedien|null
     */
    public function getIdComedien(): ?Comedien
    {
        return $this->id_comedien;
    }

    /**
     * @param Comedien|null $id_comedien
     */
    public function setIdComedien(?Comedien $id_comedien): void
    {
        $this->id_comedien = $id_comedien;
    }

    /**
     * @return Da|null
     */
    public function getIdDa(): ?Da
    {
        return $this->id_da;
    }

    /**
     * @param Da|null $id_da
     */
    public function setIdDa(?Da $id_da): void
    {
        $this->id_da = $id_da;
    }


    public function getCreationContrat(): ?\DateTimeInterface
    {
        return $this->creation_contrat;
    }

    public function setCreationContrat(?\DateTimeInterface $creation_contrat): self
    {
        $this->creation_contrat = $creation_contrat;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->date_debut;
    }

    public function setDateDebut(?\DateTimeInterface $date_debut): self
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->date_fin;
    }

    public function setDateFin(?\DateTimeInterface $date_fin): self
    {
        $this->date_fin = $date_fin;

        return $this;
    }

    public function getProduction(): ?string
    {
        return $this->production;
    }

    public function setProduction(?string $production): self
    {
        $this->production = $production;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(?string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getIdContratComedien(): ?int
    {
        return $this->id_contrat_comedien;
    }

    /**
     * @param int|null $id_contrat_comedien
     */
    public function setIdContratComedien(?int $id_contrat_comedien): void
    {
        $this->id_contrat_comedien = $id_contrat_comedien;
    }

    /**
     * @return string|null
     */
    public function getRoleComedien(): ?string
    {
        return $this->roleComedien;
    }

    /**
     * @param string|null $roleComedien
     */
    public function setRoleComedien(?string $roleComedien): void
    {
        $this->roleComedien = $roleComedien;
    }

    /**
     * @return Role|null
     */
    public function getIdRole(): ?Role
    {
        return $this->id_role;
    }

    /**
     * @param Role|null $id_role
     */
    public function setIdRole(?Role $id_role): void
    {
        $this->id_role = $id_role;
    }


}
