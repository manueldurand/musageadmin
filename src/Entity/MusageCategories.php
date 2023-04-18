<?php

namespace App\Entity;

use App\Repository\MusageCategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MusageCategoriesRepository::class)]
class MusageCategories
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 45)]
    private ?string $libelle = null;

    #[ORM\OneToMany(mappedBy: 'categorieId', targetEntity: MusageProduitCategories::class)]
    private Collection $musageProduitCategories;

    public function __construct()
    {
        $this->musageProduitCategories = new ArrayCollection();
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
     * @return Collection<int, MusageProduitCategories>
     */
    public function getMusageProduitCategories(): Collection
    {
        return $this->musageProduitCategories;
    }

    public function addMusageProduitCategory(MusageProduitCategories $musageProduitCategory): self
    {
        if (!$this->musageProduitCategories->contains($musageProduitCategory)) {
            $this->musageProduitCategories->add($musageProduitCategory);
            $musageProduitCategory->setCategorieId($this);
        }

        return $this;
    }

    public function removeMusageProduitCategory(MusageProduitCategories $musageProduitCategory): self
    {
        if ($this->musageProduitCategories->removeElement($musageProduitCategory)) {
            // set the owning side to null (unless already changed)
            if ($musageProduitCategory->getCategorieId() === $this) {
                $musageProduitCategory->setCategorieId(null);
            }
        }

        return $this;
    }
}
