<?php

namespace App\Entity;

use App\Repository\GerichtRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GerichtRepository::class)]
class Gericht
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $bild = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $beschreibung = null;

    #[ORM\Column(nullable: true)]
    private ?float $preis = null;

    #[ORM\ManyToOne(targetEntity: Kategorie::class, inversedBy: 'gericht')]
    private  $kategorie = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getBeschreibung(): ?string
    {
        return $this->beschreibung;
    }

    public function setBeschreibung(?string $beschreibung): static
    {
        $this->beschreibung = $beschreibung;

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

    public function getBild(): ?string
    {
        return $this->bild;
    }

    public function setBild(string $bild): static
    {
        $this->bild = $bild;

        return $this;
    }

    public function getKategorie(): ?Kategorie
    {
        return $this->kategorie;
    }

    public function setKategorie(?Kategorie $kategorie): static
    {
        $this->kategorie = $kategorie;

        return $this;
    }
}
