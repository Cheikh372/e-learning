<?php

namespace App\Entity;

use App\Repository\SupportCoursRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SupportCoursRepository::class)
 */
class SupportCours
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
    private $idSupport;

    /**
     * @ORM\ManyToOne(targetEntity=Enseignant::class, inversedBy="supportCours")
     */
    private $idEnseignant;

    /**
     * @ORM\ManyToOne(targetEntity=Matiere::class, inversedBy="supportCours")
     */
    private $idMatiere;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomFichier;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdSupport(): ?string
    {
        return $this->idSupport;
    }

    public function setIdSupport(string $idSupport): self
    {
        $this->idSupport = $idSupport;

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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

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
}
