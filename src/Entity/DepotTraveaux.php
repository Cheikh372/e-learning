<?php

namespace App\Entity;

use App\Repository\DepotTraveauxRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DepotTraveauxRepository::class)
 */
class DepotTraveaux
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
    private $idDepot;

    /**
     * @ORM\ManyToOne(targetEntity=Enseignant::class, inversedBy="depotTraveauxes")
     */
    private $idEnseignant;

    /**
     * @ORM\ManyToOne(targetEntity=Matiere::class, inversedBy="depotTraveauxes")
     */
    private $idMatiere;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="date")
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="date")
     */
    private $dateFin;

    /**
     * @ORM\OneToMany(targetEntity=TraveauxRendu::class, mappedBy="idDepot")
     */
    private $traveauxRendus;

    public function __construct()
    {
        $this->traveauxRendus = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdDepot(): ?string
    {
        return $this->idDepot;
    }

    public function setIdDepot(string $idDepot): self
    {
        $this->idDepot = $idDepot;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * @return Collection|TraveauxRendu[]
     */
    public function getTraveauxRendus(): Collection
    {
        return $this->traveauxRendus;
    }

    public function addTraveauxRendu(TraveauxRendu $traveauxRendu): self
    {
        if (!$this->traveauxRendus->contains($traveauxRendu)) {
            $this->traveauxRendus[] = $traveauxRendu;
            $traveauxRendu->setIdDepot($this);
        }

        return $this;
    }

    public function removeTraveauxRendu(TraveauxRendu $traveauxRendu): self
    {
        if ($this->traveauxRendus->removeElement($traveauxRendu)) {
            // set the owning side to null (unless already changed)
            if ($traveauxRendu->getIdDepot() === $this) {
                $traveauxRendu->setIdDepot(null);
            }
        }

        return $this;
    }
}
