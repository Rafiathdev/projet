<?php

namespace App\Entity;

use App\Repository\EntretienRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EntretienRepository::class)]
class Entretien
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_entretien = null;

//    #[ORM\ManyToOne(inversedBy: 'entretiens')]
//    #[ORM\JoinColumn(nullable: false)]
//    private ?offre $offre = null;

//    #[ORM\ManyToOne(inversedBy: 'entretiens')]
//    #[ORM\JoinColumn(nullable: false)]
//    private ?candidat $candidat = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateEntretien(): ?\DateTimeInterface
    {
        return $this->date_entretien;
    }

    public function setDateEntretien(\DateTimeInterface $date_entretien): self
    {
        $this->date_entretien = $date_entretien;

        return $this;
    }

    public function getOffre(): ?offre
    {
        return $this->offre;
    }

    public function setOffre(?offre $offre): self
    {
        $this->offre = $offre;

        return $this;
    }

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
//    }
}
