<?php

namespace App\Entity;

use App\Repository\MusageUniteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MusageUniteRepository::class)]
class MusageUnite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 45)]
    private ?string $musageTypeUnite = null;

    #[ORM\OneToMany(mappedBy: 'uniteId', targetEntity: MusageProduits::class)]
    private Collection $musageProduits;

    public function __construct()
    {
        $this->musageProduits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMusageTypeUnite(): ?string
    {
        return $this->musageTypeUnite;
    }

    public function setMusageTypeUnite(string $musageTypeUnite): self
    {
        $this->musageTypeUnite = $musageTypeUnite;

        return $this;
    }

    /**
     * @return Collection<int, MusageProduits>
     */
    public function getMusageProduits(): Collection
    {
        return $this->musageProduits;
    }

    public function addMusageProduit(MusageProduits $musageProduit): self
    {
        if (!$this->musageProduits->contains($musageProduit)) {
            $this->musageProduits->add($musageProduit);
            $musageProduit->setUniteId($this);
        }

        return $this;
    }

    public function removeMusageProduit(MusageProduits $musageProduit): self
    {
        if ($this->musageProduits->removeElement($musageProduit)) {
            // set the owning side to null (unless already changed)
            if ($musageProduit->getUniteId() === $this) {
                $musageProduit->setUniteId(null);
            }
        }

        return $this;
    }
}
