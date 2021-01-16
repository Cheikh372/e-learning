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

    /**
     * @ORM\ManyToMany(targetEntity=Enseignant::class, mappedBy="idMatiere")
     */
    private $enseignants;

    /**
     * @ORM\OneToMany(targetEntity=Inscription::class, mappedBy="idMatiere")
     */
    private $inscriptions;

    /**
     * @ORM\OneToMany(targetEntity=Seance::class, mappedBy="idMatiere")
     */
    private $seances;

    /**
     * @ORM\OneToMany(targetEntity=Note::class, mappedBy="idMatiere")
     */
    private $notes;

    /**
     * @ORM\OneToMany(targetEntity=DepotTraveaux::class, mappedBy="idMatiere")
     */
    private $depotTraveauxes;

    /**
     * @ORM\OneToMany(targetEntity=SupportCours::class, mappedBy="idMatiere")
     */
    private $supportCours;

    /**
     * @ORM\OneToMany(targetEntity=Discussion::class, mappedBy="idMatiere")
     */
    private $discussions;

    public function __construct()
    {
        $this->enseignants = new ArrayCollection();
        $this->inscriptions = new ArrayCollection();
        $this->seances = new ArrayCollection();
        $this->notes = new ArrayCollection();
        $this->depotTraveauxes = new ArrayCollection();
        $this->supportCours = new ArrayCollection();
        $this->discussions = new ArrayCollection();
    }

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

    /**
     * @return Collection|Enseignant[]
     */
    public function getEnseignants(): Collection
    {
        return $this->enseignants;
    }

    public function addEnseignant(Enseignant $enseignant): self
    {
        if (!$this->enseignants->contains($enseignant)) {
            $this->enseignants[] = $enseignant;
            $enseignant->addIdMatiere($this);
        }

        return $this;
    }

    public function removeEnseignant(Enseignant $enseignant): self
    {
        if ($this->enseignants->removeElement($enseignant)) {
            $enseignant->removeIdMatiere($this);
        }

        return $this;
    }

    /**
     * @return Collection|Inscription[]
     */
    public function getInscriptions(): Collection
    {
        return $this->inscriptions;
    }

    public function addInscription(Inscription $inscription): self
    {
        if (!$this->inscriptions->contains($inscription)) {
            $this->inscriptions[] = $inscription;
            $inscription->setIdMatiere($this);
        }

        return $this;
    }

    public function removeInscription(Inscription $inscription): self
    {
        if ($this->inscriptions->removeElement($inscription)) {
            // set the owning side to null (unless already changed)
            if ($inscription->getIdMatiere() === $this) {
                $inscription->setIdMatiere(null);
            }
        }

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
            $seance->setIdMatiere($this);
        }

        return $this;
    }

    public function removeSeance(Seance $seance): self
    {
        if ($this->seances->removeElement($seance)) {
            // set the owning side to null (unless already changed)
            if ($seance->getIdMatiere() === $this) {
                $seance->setIdMatiere(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Note[]
     */
    public function getNotes(): Collection
    {
        return $this->notes;
    }

    public function addNote(Note $note): self
    {
        if (!$this->notes->contains($note)) {
            $this->notes[] = $note;
            $note->setIdMatiere($this);
        }

        return $this;
    }

    public function removeNote(Note $note): self
    {
        if ($this->notes->removeElement($note)) {
            // set the owning side to null (unless already changed)
            if ($note->getIdMatiere() === $this) {
                $note->setIdMatiere(null);
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
            $depotTraveaux->setIdMatiere($this);
        }

        return $this;
    }

    public function removeDepotTraveaux(DepotTraveaux $depotTraveaux): self
    {
        if ($this->depotTraveauxes->removeElement($depotTraveaux)) {
            // set the owning side to null (unless already changed)
            if ($depotTraveaux->getIdMatiere() === $this) {
                $depotTraveaux->setIdMatiere(null);
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
            $supportCour->setIdMatiere($this);
        }

        return $this;
    }

    public function removeSupportCour(SupportCours $supportCour): self
    {
        if ($this->supportCours->removeElement($supportCour)) {
            // set the owning side to null (unless already changed)
            if ($supportCour->getIdMatiere() === $this) {
                $supportCour->setIdMatiere(null);
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
            $discussion->setIdMatiere($this);
        }

        return $this;
    }

    public function removeDiscussion(Discussion $discussion): self
    {
        if ($this->discussions->removeElement($discussion)) {
            // set the owning side to null (unless already changed)
            if ($discussion->getIdMatiere() === $this) {
                $discussion->setIdMatiere(null);
            }
        }

        return $this;
    }

}
