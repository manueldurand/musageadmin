<?php

namespace App\Entity;

use App\Repository\MusageCouleursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MusageCouleursRepository::class)]
class MusageCouleurs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 45)]
    private ?string $nomCouleur = null;

    #[ORM\OneToMany(mappedBy: 'couleurId', targetEntity: MusageProduits::class)]
    private Collection $musageProduits;

    public function __construct()
    {
        $this->musageProduits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCouleur(): ?string
    {
        return $this->nomCouleur;
    }

    public function setNomCouleur(string $nomCouleur): self
    {
        $this->nomCouleur = $nomCouleur;

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
            $musageProduit->setCouleurId($this);
        }

        return $this;
    }

    public function removeMusageProduit(MusageProduits $musageProduit): self
    {
        if ($this->musageProduits->removeElement($musageProduit)) {
            // set the owning side to null (unless already changed)
            if ($musageProduit->getCouleurId() === $this) {
                $musageProduit->setCouleurId(null);
            }
        }

        return $this;
    }
}
