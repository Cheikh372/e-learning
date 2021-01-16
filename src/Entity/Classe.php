<?php

namespace App\Entity;

use App\Repository\ClasseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClasseRepository::class)
 */
class Classe
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Etudiant::class, mappedBy="classe")
     */
    private $idEtudiant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $annee;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $statut;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $niveau;

    /**
     * @ORM\ManyToOne(targetEntity=Parcours::class, inversedBy="classes")
     */
    private $idParcours;

    /**
     * @ORM\ManyToOne(targetEntity=Option::class, inversedBy="classes")
     */
    private $idOption;

    public function __construct()
    {
        $this->idEtudiant = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Etudiant[]
     */
    public function getIdEtudiant(): Collection
    {
        return $this->idEtudiant;
    }

    public function addIdEtudiant(Etudiant $idEtudiant): self
    {
        if (!$this->idEtudiant->contains($idEtudiant)) {
            $this->idEtudiant[] = $idEtudiant;
            $idEtudiant->setClasse($this);
        }

        return $this;
    }

    public function removeIdEtudiant(Etudiant $idEtudiant): self
    {
        if ($this->idEtudiant->removeElement($idEtudiant)) {
            // set the owning side to null (unless already changed)
            if ($idEtudiant->getClasse() === $this) {
                $idEtudiant->setClasse(null);
            }
        }

        return $this;
    }

    public function getAnnee(): ?string
    {
        return $this->annee;
    }

    public function setAnnee(string $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(string $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getIdParcours(): ?Parcours
    {
        return $this->idParcours;
    }

    public function setIdParcours(?Parcours $idParcours): self
    {
        $this->idParcours = $idParcours;

        return $this;
    }

    public function getIdOption(): ?Option
    {
        return $this->idOption;
    }

    public function setIdOption(?Option $idOption): self
    {
        $this->idOption = $idOption;

        return $this;
    }
}
