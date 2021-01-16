<?php

namespace App\Entity;

use App\Repository\NoteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NoteRepository::class)
 */
class Note
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Etudiant::class, inversedBy="notes")
     */
    private $IdEtudiant;

    /**
     * @ORM\ManyToOne(targetEntity=Matiere::class, inversedBy="notes")
     */
    private $idMatiere;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typeNote;

    /**
     * @ORM\Column(type="date")
     */
    private $annee;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $note;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdEtudiant(): ?Etudiant
    {
        return $this->IdEtudiant;
    }

    public function setIdEtudiant(?Etudiant $IdEtudiant): self
    {
        $this->IdEtudiant = $IdEtudiant;

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

    public function getTypeNote(): ?string
    {
        return $this->typeNote;
    }

    public function setTypeNote(string $typeNote): self
    {
        $this->typeNote = $typeNote;

        return $this;
    }

    public function getAnnee(): ?\DateTimeInterface
    {
        return $this->annee;
    }

    public function setAnnee(\DateTimeInterface $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    public function getNote(): ?float
    {
        return $this->note;
    }

    public function setNote(?float $note): self
    {
        $this->note = $note;

        return $this;
    }
}
