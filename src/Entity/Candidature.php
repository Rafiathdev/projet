<?php

namespace App\Entity;

use App\Repository\CandidatureRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CandidatureRepository::class)]
class Candidature
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_cand = null;

    #[ORM\Column]
    private ?bool $rejeter = null;

    #[ORM\Column]
    private ?bool $accepter = null;

//    #[ORM\ManyToOne(inversedBy: 'candidatures')]
//    #[ORM\JoinColumn(nullable: false)]
//    private ?diplome $diplome = null;

//    #[ORM\ManyToOne(inversedBy: 'candidatures')]
//    #[ORM\JoinColumn(nullable: false)]
//    private ?offre $offre = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCand(): ?\DateTimeInterface
    {
        return $this->date_cand;
    }

    public function setDateCand(\DateTimeInterface $date_cand): self
    {
        $this->date_cand = $date_cand;

        return $this;
    }

    public function isRejeter(): ?bool
    {
        return $this->rejeter;
    }

    public function setRejeter(bool $rejeter): self
    {
        $this->rejeter = $rejeter;

        return $this;
    }

    public function isAccepter(): ?bool
    {
        return $this->accepter;
    }

    public function setAccepter(bool $accepter): self
    {
        $this->accepter = $accepter;

        return $this;
    }

//    public function getDiplome(): ?diplome
//    {
//        return $this->diplome;
//    }
//
//    public function setDiplome(?diplome $diplome): self
//    {
//        $this->diplome = $diplome;
//
//        return $this;
//    }

//    public function getOffre(): ?offre
//    {
//        return $this->offre;
//    }
//
//    public function setOffre(?offre $offre): self
//    {
//        $this->offre = $offre;
//
//        return $this;
//    }
}
