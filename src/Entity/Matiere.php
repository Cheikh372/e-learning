<?php

namespace App\Entity;

use App\Repository\MatiereRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\Column(type="string", length=10)
     */
    private $id_matiere;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\Column(type="integer")
     */
    private $coefficient;

    /**
     * @ORM\Column(type="integer")
     */
    private $volhcm;

    /**
     * @ORM\Column(type="integer")
     */
    private $volhtd;

    /**
     * @ORM\Column(type="integer")
     */
    private $volhtp;

    /**
     * @ORM\ManyToOne(targetEntity=UniteEnseignement::class, inversedBy="matieres")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_ue;

    /**
     * @ORM\OneToMany(targetEntity=Support::class, mappedBy="matiere")
     */
    private $supports;

    /**
     * @ORM\OneToMany(targetEntity=DepotTravaux::class, mappedBy="matiere", orphanRemoval=true)
     */
    private $depotTravaux;

    /**
     * @ORM\ManyToMany(targetEntity=Enseignant::class, inversedBy="matieres")
     */
    private $Enseignant;

    /**
     * @ORM\OneToMany(targetEntity=Inscrire::class, mappedBy="matiere", orphanRemoval=true)
     */
    private $etudiant;

    

    public function __construct()
    {
        $this->supports = new ArrayCollection();
        $this->depotTravaux = new ArrayCollection();
        $this->Enseignant = new ArrayCollection();
        $this->etudiant = new ArrayCollection();

    }

    public function __toString()
    {
        return $this->id_matiere.'-'.$this->libelle;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdMatiere(): ?string
    {
        return $this->id_matiere;
    }

    public function setIdMatiere(string $id_matiere): self
    {
        $this->id_matiere = $id_matiere;

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

    public function getCoefficient(): ?string
    {
        return $this->coefficient;
    }

    public function setCoefficient(string $coefficient): self
    {
        $this->coefficient = $coefficient;

        return $this;
    }

    public function getVolhcm(): ?int
    {
        return $this->volhcm;
    }

    public function setVolhcm(int $volhcm): self
    {
        $this->volhcm = $volhcm;

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

    public function getVolhtp(): ?int
    {
        return $this->volhtp;
    }

    public function setVolhtp(int $volhtp): self
    {
        $this->volhtp = $volhtp;

        return $this;
    }

    public function getIdUe(): ?UniteEnseignement
    {
        return $this->id_ue;
    }

    public function setIdUe(?UniteEnseignement $id_ue): self
    {
        $this->id_ue = $id_ue;

        return $this;
    }

    /**
     * @return Collection|Support[]
     */
    public function getSupports(): Collection
    {
        return $this->supports;
    }

    public function addSupport(Support $support): self
    {
        if (!$this->supports->contains($support)) {
            $this->supports[] = $support;
            $support->setMatiere($this);
        }

        return $this;
    }

    public function removeSupport(Support $support): self
    {
        if ($this->supports->removeElement($support)) {
            // set the owning side to null (unless already changed)
            if ($support->getMatiere() === $this) {
                $support->setMatiere(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|DepotTravaux[]
     */
    public function getDepotTravaux(): Collection
    {
        return $this->depotTravaux;
    }

    public function addDepotTravaux(DepotTravaux $depotTravaux): self
    {
        if (!$this->depotTravaux->contains($depotTravaux)) {
            $this->depotTravaux[] = $depotTravaux;
            $depotTravaux->setMatiere($this);
        }

        return $this;
    }

    public function removeDepotTravaux(DepotTravaux $depotTravaux): self
    {
        if ($this->depotTravaux->removeElement($depotTravaux)) {
            // set the owning side to null (unless already changed)
            if ($depotTravaux->getMatiere() === $this) {
                $depotTravaux->setMatiere(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Enseignant[]
     */
    public function getEnseignant(): Collection
    {
        return $this->Enseignant;
    }

    public function addEnseignant(Enseignant $enseignant): self
    {
        if (!$this->Enseignant->contains($enseignant)) {
            $this->Enseignant[] = $enseignant;
        }

        return $this;
    }

    public function removeEnseignant(Enseignant $enseignant): self
    {
        $this->Enseignant->removeElement($enseignant);

        return $this;
    }

    /**
     * @return Collection|Inscrire[]
     */
    public function getEtudiant(): Collection
    {
        return $this->etudiant;
    }

    public function addEtudiant(Inscrire $etudiant): self
    {
        if (!$this->etudiant->contains($etudiant)) {
            $this->etudiant[] = $etudiant;
            $etudiant->setMatiere($this);
        }

        return $this;
    }

    public function removeEtudiant(Inscrire $etudiant): self
    {
        if ($this->etudiant->removeElement($etudiant)) {
            // set the owning side to null (unless already changed)
            if ($etudiant->getMatiere() === $this) {
                $etudiant->setMatiere(null);
            }
        }

        return $this;
    }

 
}
