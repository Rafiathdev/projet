<?php

namespace App\Entity;

use App\Repository\CategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoriesRepository::class)]
class Categories
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    #[ORM\OneToMany(mappedBy: 'categories', targetEntity: Offre::class, orphanRemoval: true)]
    private Collection $offres;

    #[ORM\OneToMany(mappedBy: 'categories', targetEntity: Offre::class)]
    private Collection $offre;

    public function __construct()
    {
        $this->offres = new ArrayCollection();
        $this->offre = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection<int, Offre>
     */
    public function getOffres(): Collection
    {
        return $this->offres;
    }

    public function addOffre(Offre $offre): self
    {
        if (!$this->offres->contains($offre)) {
            $this->offres->add($offre);
            $offre->setCategories($this);
        }

        return $this;
    }

    public function removeOffre(Offre $offre): self
    {
        if ($this->offres->removeElement($offre)) {
            // set the owning side to null (unless already changed)
            if ($offre->getCategories() === $this) {
                $offre->setCategories(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Offre>
     */
    public function getOffre(): Collection
    {
        return $this->offre;
    }

     public function __toString(): string
     {
         return $this->getLibelle();
     }
}
