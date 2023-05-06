<?php

namespace App\Entity;

use App\Repository\EmployeurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmployeurRepository::class)]
class Employeur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_u = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_e = null;

    #[ORM\Column(length: 255)]
    private ?string $ifu = null;

    #[ORM\Column(length: 255)]
    private ?string $rccm = null;

    #[ORM\Column]
    private ?int $telephone = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $site_web = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $mdp = null;

    #[ORM\OneToMany(mappedBy: 'employeur', targetEntity: Abonnement::class, orphanRemoval: true)]
    private Collection $abonnements;

    public function __construct()
    {
        $this->abonnements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomU(): ?string
    {
        return $this->nom_u;
    }

    public function setNomU(string $nom_u): self
    {
        $this->nom_u = $nom_u;

        return $this;
    }

    public function getNomE(): ?string
    {
        return $this->nom_e;
    }

    public function setNomE(string $nom_e): self
    {
        $this->nom_e = $nom_e;

        return $this;
    }

    public function getIfu(): ?string
    {
        return $this->ifu;
    }

    public function setIfu(string $ifu): self
    {
        $this->ifu = $ifu;

        return $this;
    }

    public function getRccm(): ?string
    {
        return $this->rccm;
    }

    public function setRccm(string $rccm): self
    {
        $this->rccm = $rccm;

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

    public function getSiteWeb(): ?string
    {
        return $this->site_web;
    }

    public function setSiteWeb(string $site_web): self
    {
        $this->site_web = $site_web;

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
     * @return Collection<int, Abonnement>
     */
    public function getAbonnements(): Collection
    {
        return $this->abonnements;
    }

//    public function addAbonnement(Abonnement $abonnement): self
//    {
//        if (!$this->abonnements->contains($abonnement)) {
//            $this->abonnements->add($abonnement);
//            $abonnement->setEmployeur($this);
//        }
//
//        return $this;
//    }

//    public function removeAbonnement(Abonnement $abonnement): self
//    {
//        if ($this->abonnements->removeElement($abonnement)) {
//            // set the owning side to null (unless already changed)
//            if ($abonnement->getEmployeur() === $this) {
//                $abonnement->setEmployeur(null);
//            }
//        }
//
//        return $this;
//    }
}
