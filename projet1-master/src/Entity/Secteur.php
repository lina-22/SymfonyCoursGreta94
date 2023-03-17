<?php

namespace App\Entity;

use App\Repository\SecteurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SecteurRepository::class)]
class Secteur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    #[ORM\OneToMany(mappedBy: 'secteur', targetEntity: Region::class)]
    private Collection $regions;

    #[ORM\OneToMany(mappedBy: 'secteur', targetEntity: Delegue::class, orphanRemoval: true)]
    private Collection $delegues;

    

    public function __construct()
    {
        $this->regions = new ArrayCollection();
        $this->delegues = new ArrayCollection();
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
     * @return Collection<int, Region>
     */
    public function getRegions(): Collection
    {
        return $this->regions;
    }

    public function addRegion(Region $region): self
    {
        if (!$this->regions->contains($region)) {
            $this->regions->add($region);
            $region->setSecteur($this);
        }

        return $this;
    }

    public function removeRegion(Region $region): self
    {
        if ($this->regions->removeElement($region)) {
            // set the owning side to null (unless already changed)
            if ($region->getSecteur() === $this) {
                $region->setSecteur(null);
            }
        }

        return $this;
    }


    /**
     * @return Collection<int, Delegue>
     */
    public function getDelegues(): Collection
    {
        return $this->delegues;
    }

    public function addDelegue(Delegue $delegue): self
    {
        if (!$this->delegues->contains($delegue)) {
            $this->delegues->add($delegue);
            $delegue->setSecteur($this);
        }

        return $this;
    }

    public function removeDelegue(Delegue $delegue): self
    {
        if ($this->delegues->removeElement($delegue)) {
            // set the owning side to null (unless already changed)
            if ($delegue->getSecteur() === $this) {
                $delegue->setSecteur(null);
            }
        }

        return $this;
    }
    
    public function __toString()
    {
        return $this->libelle;
    }
}
