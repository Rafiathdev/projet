<?php

namespace App\Entity;

use App\Repository\OffreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OffreRepository::class)]
class Offre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $titre = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_exp = null;

    #[ORM\Column(length: 255)]
    private ?string $annee_exp = null;

    #[ORM\Column(length: 255)]
    private ?string $diplome = null;

    #[ORM\Column]
    private ?int $nbr_post = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $act_principal = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $comp_req = null;

//    #[ORM\ManyToOne(inversedBy: 'offres')]
//    #[ORM\JoinColumn(nullable: false)]
//    private ?categories $categories = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'employeur')]
    private ?self $offre = null;

    #[ORM\OneToMany(mappedBy: 'offre', targetEntity: self::class)]
    private Collection $employeur;

    #[ORM\OneToMany(mappedBy: 'offre', targetEntity: Entretien::class, orphanRemoval: true)]
    private Collection $entretiens;

    #[ORM\OneToMany(mappedBy: 'offre', targetEntity: Candidature::class, orphanRemoval: true)]
    private Collection $candidatures;

    #[ORM\ManyToOne(inversedBy: 'offre')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Categories $categories = null;

    #[ORM\Column(nullable: true)]
    private ?bool $isPublish = null;

    public function __construct()
    {
        $this->employeur = new ArrayCollection();
        $this->entretiens = new ArrayCollection();
        $this->candidatures = new ArrayCollection();
        $this->isPublish = false;
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

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

    public function getDateExp(): ?\DateTimeInterface
    {
        return $this->date_exp;
    }

    public function setDateExp(\DateTimeInterface $date_exp): self
    {
        $this->date_exp = $date_exp;

        return $this;
    }

    public function getAnneeExp(): ?string
    {
        return $this->annee_exp;
    }

    public function setAnneeExp(string $annee_exp): self
    {
        $this->annee_exp = $annee_exp;

        return $this;
    }

    public function getDiplome(): ?string
    {
        return $this->diplome;
    }

    public function setDiplome(string $diplome): self
    {
        $this->diplome = $diplome;

        return $this;
    }

    public function getNbrPost(): ?int
    {
        return $this->nbr_post;
    }

    public function setNbrPost(int $nbr_post): self
    {
        $this->nbr_post = $nbr_post;

        return $this;
    }

    public function getActPrincipal(): ?string
    {
        return $this->act_principal;
    }

    public function setActPrincipal(string $act_principal): self
    {
        $this->act_principal = $act_principal;

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

    public function getCompReq(): ?string
    {
        return $this->comp_req;
    }

    public function setCompReq(string $comp_req): self
    {
        $this->comp_req = $comp_req;

        return $this;
    }

    public function getCategories(): ?categories
    {
        return $this->categories;
    }

    public function setCategories(?categories $categories): self
    {
        $this->categories = $categories;

        return $this;
    }

    public function getOffre(): ?self
    {
        return $this->offre;
    }

    public function setOffre(?self $offre): self
    {
        $this->offre = $offre;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getEmployeur(): Collection
    {
        return $this->employeur;
    }

    public function addEmployeur(self $employeur): self
    {
        if (!$this->employeur->contains($employeur)) {
            $this->employeur->add($employeur);
            $employeur->setOffre($this);
        }

        return $this;
    }

    public function removeEmployeur(self $employeur): self
    {
        if ($this->employeur->removeElement($employeur)) {
            // set the owning side to null (unless already changed)
            if ($employeur->getOffre() === $this) {
                $employeur->setOffre(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Entretien>
     */
    public function getEntretiens(): Collection
    {
        return $this->entretiens;
    }

//

    public function removeEntretien(Entretien $entretien): self
    {
        if ($this->entretiens->removeElement($entretien)) {
            // set the owning side to null (unless already changed)
            if ($entretien->getOffre() === $this) {
                $entretien->setOffre(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Candidature>
     */
    public function getCandidatures(): Collection
    {
        return $this->candidatures;
    }

    public function __toString(): string
    {
         return $this->getDescription();
    }

//    public function addCandidature(Candidature $candidature): self
//    {
//        if (!$this->candidatures->contains($candidature)) {
//            $this->candidatures->add($candidature);
//            $candidature->setOffre($this);
//        }
//
//        return $this;
//    }

//    public function removeCandidature(Candidature $candidature): self
//    {
//        if ($this->candidatures->removeElement($candidature)) {
//            // set the owning side to null (unless already changed)
//            if ($candidature->getOffre() === $this) {
//                $candidature->setOffre(null);
//            }
//        }
//
//        return $this;
//    }

public function isIsPublish(): ?bool
{
    return $this->isPublish;
}

public function setIsPublish(?bool $isPublish): self
{
    $this->isPublish = $isPublish;

    return $this;
}


}
