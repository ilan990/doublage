<?php

namespace App\Entity;

use App\Repository\ContratRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContratRepository::class)]
class  Contrat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id_contrat = null;

    #[ORM\ManyToOne(targetEntity: Comedien::class)]
    #[ORM\JoinColumn(name: 'id_comedien', referencedColumnName: 'id_comedien')]
    private Comedien|null $id_comedien = null;

    #[ORM\ManyToOne(targetEntity: Da::class)]
    #[ORM\JoinColumn(name: 'id_da', referencedColumnName: 'id_da')]
    private ?int $id_da = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $creation_contrat = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_debut = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_fin = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $production = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $titre = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nom_personnage = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prenom = null;

    public function getIdContrat(): ?int
    {
        return $this->id_contrat;
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

    public function getNomPersonnage(): ?string
    {
        return $this->nom_personnage;
    }

    public function setNomPersonnage(?string $nom_personnage): self
    {
        $this->nom_personnage = $nom_personnage;

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
}
