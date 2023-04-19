<?php

namespace App\Entity;

use App\Repository\MusageTypePlanteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MusageTypePlanteRepository::class)]
class MusageTypePlante
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 45)]
    private ?string $nomPlante = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\OneToMany(mappedBy: 'planteId', targetEntity: MusageProduits::class)]
    private Collection $musageProduits;

    public function __construct()
    {
        $this->musageProduits = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->nomPlante;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomPlante(): ?string
    {
        return $this->nomPlante;
    }

    public function setNomPlante(string $nomPlante): self
    {
        $this->nomPlante = $nomPlante;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

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
            $musageProduit->setPlanteId($this);
        }

        return $this;
    }

    public function removeMusageProduit(MusageProduits $musageProduit): self
    {
        if ($this->musageProduits->removeElement($musageProduit)) {
            // set the owning side to null (unless already changed)
            if ($musageProduit->getPlanteId() === $this) {
                $musageProduit->setPlanteId(null);
            }
        }

        return $this;
    }
}
