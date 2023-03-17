<?php

namespace App\Entity;

use App\Repository\MedicamentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MedicamentRepository::class)]
class Medicament
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $depotLegal = null;

    #[ORM\Column(length: 255)]
    private ?string $nomCommercial = null;

    #[ORM\Column(length: 255)]
    private ?string $code = null;

    #[ORM\Column(length: 255)]
    private ?string $composition = null;

    #[ORM\Column(length: 255)]
    private ?string $effetsIndesirable = null;

    #[ORM\Column(length: 255)]
    private ?string $contreIndication = null;

    #[ORM\Column(length: 255)]
    private ?string $prixEchantillon = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDepotLegal(): ?string
    {
        return $this->depotLegal;
    }

    public function setDepotLegal(string $depotLegal): self
    {
        $this->depotLegal = $depotLegal;

        return $this;
    }

    public function getNomCommercial(): ?string
    {
        return $this->nomCommercial;
    }

    public function setNomCommercial(string $nomCommercial): self
    {
        $this->nomCommercial = $nomCommercial;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getComposition(): ?string
    {
        return $this->composition;
    }

    public function setComposition(string $composition): self
    {
        $this->composition = $composition;

        return $this;
    }

    public function getEffetsIndesirable(): ?string
    {
        return $this->effetsIndesirable;
    }

    public function setEffetsIndesirable(string $effetsIndesirable): self
    {
        $this->effetsIndesirable = $effetsIndesirable;

        return $this;
    }

    public function getContreIndication(): ?string
    {
        return $this->contreIndication;
    }

    public function setContreIndication(string $contreIndication): self
    {
        $this->contreIndication = $contreIndication;

        return $this;
    }

    public function getPrixEchantillon(): ?string
    {
        return $this->prixEchantillon;
    }

    public function setPrixEchantillon(string $prixEchantillon): self
    {
        $this->prixEchantillon = $prixEchantillon;

        return $this;
    }
}
