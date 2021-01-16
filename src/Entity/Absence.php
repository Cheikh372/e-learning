<?php

namespace App\Entity;

use App\Repository\AbsenceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AbsenceRepository::class)
 */
class Absence
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Etudiant::class, inversedBy="absences")
     */
    private $idEtudiant;

    /**
     * @ORM\ManyToOne(targetEntity=Seance::class, inversedBy="absences")
     */
    private $idSeance;

    /**
     * @ORM\Column(type="boolean")
     */
    private $absence;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getIdSeance(): ?Seance
    {
        return $this->idSeance;
    }

    public function setIdSeance(?Seance $idSeance): self
    {
        $this->idSeance = $idSeance;

        return $this;
    }

    public function getAbsence(): ?bool
    {
        return $this->absence;
    }

    public function setAbsence(bool $absence): self
    {
        $this->absence = $absence;

        return $this;
    }
}
