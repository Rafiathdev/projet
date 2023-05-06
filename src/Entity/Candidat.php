<?php

namespace App\Entity;

use App\Repository\CandidatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CandidatRepository::class)]
class Candidat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_c = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom_c = null;

    #[ORM\Column(length: 255)]
    private ?string $sexe = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_n = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(length: 255)]
    private ?string $nationnalite = null;

    #[ORM\Column]
    private ?int $telephone = null;

    #[ORM\Column(length: 255)]
    private ?string $niveau = null;

    #[ORM\Column(length: 255)]
    private ?string $qualification = null;

    #[ORM\Column(length: 255)]
    private ?string $pdf_cv = null;

    #[ORM\Column(length: 255)]
    private ?string $photo = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $mdp = null;

    #[ORM\OneToMany(mappedBy: 'candidat', targetEntity: Entretien::class)]
    private Collection $entretiens;

    #[ORM\OneToMany(mappedBy: 'candidat', targetEntity: Abonnement::class, orphanRemoval: true)]
    private Collection $abonnements;

    public function __construct()
    {
        $this->entretiens = new ArrayCollection();
        $this->abonnements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomC(): ?string
    {
        return $this->nom_c;
    }

    public function setNomC(string $nom_c): self
    {
        $this->nom_c = $nom_c;

        return $this;
    }

    public function getPrenomC(): ?string
    {
        return $this->prenom_c;
    }

    public function setPrenomC(string $prenom_c): self
    {
        $this->prenom_c = $prenom_c;

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

    public function getDateN(): ?\DateTimeInterface
    {
        return $this->date_n;
    }

    public function setDateN(\DateTimeInterface $date_n): self
    {
        $this->date_n = $date_n;

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

    public function getNationnalite(): ?string
    {
        return $this->nationnalite;
    }

    public function setNationnalite(string $nationnalite): self
    {
        $this->nationnalite = $nationnalite;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(int $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(string $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getQualification(): ?string
    {
        return $this->qualification;
    }

    public function setQualification(string $qualification): self
    {
        $this->qualification = $qualification;

        return $this;
    }

    public function getPdfCv(): ?string
    {
        return $this->pdf_cv;
    }

    public function setPdfCv(string $pdf_cv): self
    {
        $this->pdf_cv = $pdf_cv;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(string $mdp): self
    {
        $this->mdp = $mdp;

        return $this;
    }

    /**
     * @return Collection<int, Entretien>
     */
    public function getEntretiens(): Collection
    {
        return $this->entretiens;
    }

    public function addEntretien(Entretien $entretien): self
    {
        if (!$this->entretiens->contains($entretien)) {
            $this->entretiens->add($entretien);
            $entretien->setCandidat($this);
        }

        return $this;
    }

    public function removeEntretien(Entretien $entretien): self
    {
        if ($this->entretiens->removeElement($entretien)) {
            // set the owning side to null (unless already changed)
            if ($entretien->getCandidat() === $this) {
                $entretien->setCandidat(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Abonnement>
     */
    public function getAbonnements(): Collection
    {
        return $this->abonnements;
    }

    public function addAbonnement(Abonnement $abonnement): self
    {
        if (!$this->abonnements->contains($abonnement)) {
            $this->abonnements->add($abonnement);
            $abonnement->setCandidat($this);
        }

        return $this;
    }

    public function removeAbonnement(Abonnement $abonnement): self
    {
        if ($this->abonnements->removeElement($abonnement)) {
            // set the owning side to null (unless already changed)
            if ($abonnement->getCandidat() === $this) {
                $abonnement->setCandidat(null);
            }
        }

        return $this;
    }
}
