<?php

namespace App\Entity;

use App\Repository\DiscussionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DiscussionRepository::class)
 */
class Discussion
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $idMessage;

    /**
     * @ORM\ManyToOne(targetEntity=Enseignant::class, inversedBy="discussions")
     */
    private $idEnseignant;

    /**
     * @ORM\ManyToOne(targetEntity=Matiere::class, inversedBy="discussions")
     */
    private $idMatiere;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $objet;

    /**
     * @ORM\Column(type="text")
     */
    private $text;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdMessage(): ?string
    {
        return $this->idMessage;
    }

    public function setIdMessage(string $idMessage): self
    {
        $this->idMessage = $idMessage;

        return $this;
    }

    public function getIdEnseignant(): ?Enseignant
    {
        return $this->idEnseignant;
    }

    public function setIdEnseignant(?Enseignant $idEnseignant): self
    {
        $this->idEnseignant = $idEnseignant;

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

    public function getObjet(): ?string
    {
        return $this->objet;
    }

    public function setObjet(string $objet): self
    {
        $this->objet = $objet;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }
}
