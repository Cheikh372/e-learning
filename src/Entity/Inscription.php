<?php

namespace App\Entity;

use App\Repository\InscriptionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InscriptionRepository::class)
 */
class Inscription
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Etudiant::class, inversedBy="inscriptions")
     */
    private $idEtudiant;

    /**
     * @ORM\ManyToOne(targetEntity=Matiere::class, inversedBy="inscriptions")
     */
    private $idMatiere;

    /**
     * @ORM\Column(type="integer")
     */
    private $semestre;

    /**
     * @ORM\Column(type="date")
     */
    private $dateInscription;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $groupe;

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

    public function getIdMatiere(): ?Matiere
    {
        return $this->idMatiere;
    }

    public function setIdMatiere(?Matiere $idMatiere): self
    {
        $this->idMatiere = $idMatiere;

        return $this;
    }

    public function getSemestre(): ?int
    {
        return $this->semestre;
    }

    public function setSemestre(int $semestre): self
    {
        $this->semestre = $semestre;

        return $this;
    }

    public function getDateInscription(): ?\DateTimeInterface
    {
        return $this->dateInscription;
    }

    public function setDateInscription(\DateTimeInterface $dateInscription): self
    {
        $this->dateInscription = $dateInscription;

        return $this;
    }

    public function getGroupe(): ?int
    {
        return $this->groupe;
    }

    public function setGroupe(?int $groupe): self
    {
        $this->groupe = $groupe;

        return $this;
    }
}
