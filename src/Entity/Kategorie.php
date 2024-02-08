<?php

namespace App\Entity;

use App\Repository\KategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: KategorieRepository::class)]
class Kategorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'kategorie', targetEntity: Gericht::class)]
    private $gericht;

    public function __construct()
    {
        $this->gericht = new ArrayCollection();
    }


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


    /**
     * @return Collection<int, Gericht>
     */
    public function getGericht(): Collection
    {
        return $this->gericht;
    }

    public function addGericht(Gericht $gericht): static
    {
        if (!$this->gericht->contains($gericht)) {
            $this->gericht->add($gericht);
            $gericht->setKategorie($this);
        }

        return $this;
    }

    public function removeGericht(Gericht $gericht): static
    {
        if ($this->gericht->removeElement($gericht)) {
            // set the owning side to null (unless already changed)
            if ($gericht->getKategorie() === $this) {
                $gericht->setKategorie(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }
}
