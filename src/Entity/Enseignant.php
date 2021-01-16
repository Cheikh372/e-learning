<?php

namespace App\Entity;

use App\Repository\EnseignantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EnseignantRepository::class)
 */
class Enseignant
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
    private $matricule;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $grade;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $specialite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $photo;

    /**
     * @ORM\ManyToMany(targetEntity=Matiere::class, inversedBy="enseignants")
     */
    private $idMatiere;

    /**
     * @ORM\OneToMany(targetEntity=Seance::class, mappedBy="idEnseignant")
     */
    private $seances;

    /**
     * @ORM\OneToMany(targetEntity=DepotTraveaux::class, mappedBy="idEnseignant")
     */
    private $depotTraveauxes;

    /**
     * @ORM\OneToMany(targetEntity=SupportCours::class, mappedBy="idEnseignant")
     */
    private $supportCours;

    /**
     * @ORM\OneToMany(targetEntity=Discussion::class, mappedBy="idEnseignant")
     */
    private $discussions;

    public function __construct()
    {
        $this->cours = new ArrayCollection();
        $this->idMatiere = new ArrayCollection();
        $this->seances = new ArrayCollection();
        $this->depotTraveauxes = new ArrayCollection();
        $this->supportCours = new ArrayCollection();
        $this->discussions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(string $matricule): self
    {
        $this->matricule = $matricule;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getGrade(): ?string
    {
        return $this->grade;
    }

    public function setGrade(string $grade): self
    {
        $this->grade = $grade;

        return $this;
    }

    public function getSpecialite(): ?string
    {
        return $this->specialite;
    }

    public function setSpecialite(string $specialite): self
    {
        $this->specialite = $specialite;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * @return Collection|Matiere[]
     */
    public function getIdMatiere(): Collection
    {
        return $this->idMatiere;
    }

    public function addIdMatiere(Matiere $idMatiere): self
    {
        if (!$this->idMatiere->contains($idMatiere)) {
            $this->idMatiere[] = $idMatiere;
        }

        return $this;
    }

    public function removeIdMatiere(Matiere $idMatiere): self
    {
        $this->idMatiere->removeElement($idMatiere);

        return $this;
    }

    /**
     * @return Collection|Seance[]
     */
    public function getSeances(): Collection
    {
        return $this->seances;
    }

    public function addSeance(Seance $seance): self
    {
        if (!$this->seances->contains($seance)) {
            $this->seances[] = $seance;
            $seance->setIdEnseignant($this);
        }

        return $this;
    }

    public function removeSeance(Seance $seance): self
    {
        if ($this->seances->removeElement($seance)) {
            // set the owning side to null (unless already changed)
            if ($seance->getIdEnseignant() === $this) {
                $seance->setIdEnseignant(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|DepotTraveaux[]
     */
    public function getDepotTraveauxes(): Collection
    {
        return $this->depotTraveauxes;
    }

    public function addDepotTraveaux(DepotTraveaux $depotTraveaux): self
    {
        if (!$this->depotTraveauxes->contains($depotTraveaux)) {
            $this->depotTraveauxes[] = $depotTraveaux;
            $depotTraveaux->setIdEnseignant($this);
        }

        return $this;
    }

    public function removeDepotTraveaux(DepotTraveaux $depotTraveaux): self
    {
        if ($this->depotTraveauxes->removeElement($depotTraveaux)) {
            // set the owning side to null (unless already changed)
            if ($depotTraveaux->getIdEnseignant() === $this) {
                $depotTraveaux->setIdEnseignant(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|SupportCours[]
     */
    public function getSupportCours(): Collection
    {
        return $this->supportCours;
    }

    public function addSupportCour(SupportCours $supportCour): self
    {
        if (!$this->supportCours->contains($supportCour)) {
            $this->supportCours[] = $supportCour;
            $supportCour->setIdEnseignant($this);
        }

        return $this;
    }

    public function removeSupportCour(SupportCours $supportCour): self
    {
        if ($this->supportCours->removeElement($supportCour)) {
            // set the owning side to null (unless already changed)
            if ($supportCour->getIdEnseignant() === $this) {
                $supportCour->setIdEnseignant(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Discussion[]
     */
    public function getDiscussions(): Collection
    {
        return $this->discussions;
    }

    public function addDiscussion(Discussion $discussion): self
    {
        if (!$this->discussions->contains($discussion)) {
            $this->discussions[] = $discussion;
            $discussion->setIdEnseignant($this);
        }

        return $this;
    }

    public function removeDiscussion(Discussion $discussion): self
    {
        if ($this->discussions->removeElement($discussion)) {
            // set the owning side to null (unless already changed)
            if ($discussion->getIdEnseignant() === $this) {
                $discussion->setIdEnseignant(null);
            }
        }

        return $this;
    }

    
}
