<?php

namespace App\Entity;

use App\Repository\ProductionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductionRepository::class)]
class Production
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id_production = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    /**
     * @return int|null
     */
    public function getIdProduction(): ?int
    {
        return $this->id_production;
    }


    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @param int|null $id_production
     */
    public function setIdProduction(?int $id_production): void
    {
        $this->id_production = $id_production;
    }


}
