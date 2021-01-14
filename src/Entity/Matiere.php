<?php

namespace App\Entity;

use App\Repository\MatiereRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MatiereRepository::class)
 */
class Matiere
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
    private $idMatiere;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lebelle;

    /**
     * @ORM\Column(type="integer")
     */
    private $coefficient;

    /**
     * @ORM\Column(type="integer")
     */
    private $volhtd;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\Column(type="integer")
     */
    private $volhtp;

    /**
     * @ORM\Column(type="integer")
     */
    private $volhcours;

    /**
     * @ORM\ManyToOne(targetEntity=UniteEnseignement::class, inversedBy="matieres")
     * @ORM\JoinColumn(nullable=false)
     */
    private $codeUe;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdMatiere(): ?string
    {
        return $this->idMatiere;
    }

    public function setIdMatiere(string $idMatiere): self
    {
        $this->idMatiere = $idMatiere;

        return $this;
    }

    public function getLebelle(): ?string
    {
        return $this->lebelle;
    }

    public function setLebelle(string $lebelle): self
    {
        $this->lebelle = $lebelle;

        return $this;
    }

    public function getCoefficient(): ?int
    {
        return $this->coefficient;
    }

    public function setCoefficient(int $coefficient): self
    {
        $this->coefficient = $coefficient;

        return $this;
    }

    public function getVolhtd(): ?int
    {
        return $this->volhtd;
    }

    public function setVolhtd(int $volhtd): self
    {
        $this->volhtd = $volhtd;

        return $this;
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

    public function getVolhtp(): ?int
    {
        return $this->volhtp;
    }

    public function setVolhtp(int $volhtp): self
    {
        $this->volhtp = $volhtp;

        return $this;
    }

    public function getVolhcours(): ?int
    {
        return $this->volhcours;
    }

    public function setVolhcours(int $volhcours): self
    {
        $this->volhcours = $volhcours;

        return $this;
    }

    public function getCodeUe(): ?UniteEnseignement
    {
        return $this->codeUe;
    }

    public function setCodeUe(?UniteEnseignement $codeUe): self
    {
        $this->codeUe = $codeUe;

        return $this;
    }
}
