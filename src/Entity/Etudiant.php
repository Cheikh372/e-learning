<?php

namespace App\Entity;

use App\Repository\EtudiantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @UniqueEntity("matricule")
 * @ORM\Entity(repositoryClass=EtudiantRepository::class)
 * @Vich\Uploadable
 */
class Etudiant
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $matricule;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\Email
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $sexe;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $adresse;

    /**
     * @ORM\Column(type="date")
     */
    private $dateNaissance;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $lieuNaissance;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $cin;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $photo;

     /**
     * @Vich\UploadableField(mapping="user_images", fileNameProperty="photo")
     * @var File | null
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    /**
     * @ORM\OneToMany(targetEntity=Inscrire::class, mappedBy="etudiant", orphanRemoval=true)
     */
    private $matiere;

    public function __construct()
    {
        $this->matiere = new ArrayCollection();
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

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(\DateTimeInterface $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getLieuNaissance(): ?string
    {
        return $this->lieuNaissance;
    }

    public function setLieuNaissance(string $lieuNaissance): self
    {
        $this->lieuNaissance = $lieuNaissance;

        return $this;
    }

    public function getCin(): ?string
    {
        return $this->cin;
    }

    public function setCin(string $cin): self
    {
        $this->cin = $cin;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get | null
     *
     * @return  File
     */ 
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * Set | null
     *
     * @param  File  $imageFile  | null
     *
     * @return  self
     */ 
    public function setImageFile(File $imageFile)
    {
        $this->imageFile = $imageFile;
        
        if ($imageFile) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updated_at = new \DateTime('now');
        }
        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * @return Collection|Inscrire[]
     */
    public function getMatiere(): Collection
    {
        return $this->matiere;
    }

    public function addMatiere(Inscrire $matiere): self
    {
        if (!$this->matiere->contains($matiere)) {
            $this->matiere[] = $matiere;
            $matiere->setEtudiant($this);
        }

        return $this;
    }

    public function removeMatiere(Inscrire $matiere): self
    {
        if ($this->matiere->removeElement($matiere)) {
            // set the owning side to null (unless already changed)
            if ($matiere->getEtudiant() === $this) {
                $matiere->setEtudiant(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->matricule.'-'.$this->prenom.' '.$this->nom;
    }
}
