<?php

namespace App\Entity;

use App\Repository\DelegueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DelegueRepository::class)]
class Delegue extends Visiteur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'delegues')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Secteur $secteur = null;

   

    public function __construct()
    {
        parent::__construct();
        $this->secteur = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Secteur>
     */
    public function getSecteur(): Collection
    {
        return $this->secteur;
    }

    public function addSecteur(Secteur $secteur): self
    {
        if (!$this->secteur->contains($secteur)) {
            $this->secteur->add($secteur);
            $secteur->setDelegue($this);
        }

        return $this;
    }

    public function removeSecteur(Secteur $secteur): self
    {
        if ($this->secteur->removeElement($secteur)) {
            // set the owning side to null (unless already changed)
            if ($secteur->getDelegue() === $this) {
                $secteur->setDelegue(null);
            }
        }

        return $this;
    }

    public function setSecteur(?Secteur $secteur): self
    {
        $this->secteur = $secteur;

        return $this;
    }
}
