<?php

namespace App\Entity;

use App\Repository\AbonnementRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AbonnementRepository::class)]
class Abonnement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_debut = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_fin = null;

//    #[ORM\ManyToOne(inversedBy: 'abonnements')]
//    #[ORM\JoinColumn(nullable: false)]
//    private ?employeur $employeur = null;

//    #[ORM\ManyToOne(inversedBy: 'abonnements')]
//    #[ORM\JoinColumn(nullable: false)]
//    private ?candidat $candidat = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->date_debut;
    }

    public function setDateDebut(\DateTimeInterface $date_debut): self
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->date_fin;
    }

    public function setDateFin(\DateTimeInterface $date_fin): self
    {
        $this->date_fin = $date_fin;

        return $this;
    }

//    public function getEmployeur(): ?employeur
//    {
//        return $this->employeur;
//    }
//
//    public function setEmployeur(?employeur $employeur): self
//    {
//        $this->employeur = $employeur;
//
//        return $this;
//    }
//
//    public function getCandidat(): ?candidat
//    {
//        return $this->candidat;
//    }
//
//    public function setCandidat(?candidat $candidat): self
//    {
//        $this->candidat = $candidat;
//
//        return $this;
 //   }
}
