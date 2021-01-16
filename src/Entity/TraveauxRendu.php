<?php

namespace App\Entity;

use App\Repository\TraveauxRenduRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TraveauxRenduRepository::class)
 */
class TraveauxRendu
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=DepotTraveaux::class, inversedBy="traveauxRendus")
     */
    private $idDepot;

    /**
     * @ORM\ManyToOne(targetEntity=Etudiant::class, inversedBy="traveauxRendus")
     */
    private $idEtudiant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomFichier;

    /**
     * @ORM\Column(type="date")
     */
    private $dateRendu;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdDepot(): ?DepotTraveaux
    {
        return $this->idDepot;
    }

    public function setIdDepot(?DepotTraveaux $idDepot): self
    {
        $this->idDepot = $idDepot;

        return $this;
    }

    public function getIdEtudiant(): ?Etudiant
    {
        return $this->idEtudiant;
    }

    public function setIdEtudiant(?Etudiant $idEtudiant): self
    {
        $this->idEtudiant = $idEtudiant;

        return $this;
    }

    public function getNomFichier(): ?string
    {
        return $this->nomFichier;
    }

    public function setNomFichier(string $nomFichier): self
    {
        $this->nomFichier = $nomFichier;

        return $this;
    }

    public function getDateRendu(): ?\DateTimeInterface
    {
        return $this->dateRendu;
    }

    public function setDateRendu(\DateTimeInterface $dateRendu): self
    {
        $this->dateRendu = $dateRendu;

        return $this;
    }
}
