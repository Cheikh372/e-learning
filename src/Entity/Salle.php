<?php

namespace App\Entity;

use App\Repository\SalleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SalleRepository::class)
 */
class Salle
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $codeSalle;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $Libelle;

    /**
     * @ORM\Column(type="integer")
     */
    private $capacite;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $typeSalle;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeSalle(): ?string
    {
        return $this->codeSalle;
    }

    public function setCodeSalle(string $codeSalle): self
    {
        $this->codeSalle = $codeSalle;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->Libelle;
    }

    public function setLibelle(?string $Libelle): self
    {
        $this->Libelle = $Libelle;

        return $this;
    }

    public function getCapacite(): ?int
    {
        return $this->capacite;
    }

    public function setCapacite(int $capacite): self
    {
        $this->capacite = $capacite;

        return $this;
    }

    public function getTypeSalle(): ?string
    {
        return $this->typeSalle;
    }

    public function setTypeSalle(string $typeSalle): self
    {
        $this->typeSalle = $typeSalle;

        return $this;
    }
}
