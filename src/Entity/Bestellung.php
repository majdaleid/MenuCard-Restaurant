<?php

namespace App\Entity;

use App\Repository\BestellungRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BestellungRepository::class)]
class Bestellung
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tisch = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $bnummer = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(nullable: true)]
    private ?float $preis = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $status = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTisch(): ?string
    {
        return $this->tisch;
    }

    public function setTisch(?string $tisch): static
    {
        $this->tisch = $tisch;

        return $this;
    }

    public function getBnummer(): ?string
    {
        return $this->bnummer;
    }

    public function setBnummer(?string $bnummer): static
    {
        $this->bnummer = $bnummer;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getPreis(): ?float
    {
        return $this->preis;
    }

    public function setPreis(?float $preis): static
    {
        $this->preis = $preis;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): static
    {
        $this->status = $status;

        return $this;
    }
}
