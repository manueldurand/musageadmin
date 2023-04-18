<?php

namespace App\Entity;

use App\Repository\MusageProduitCategoriesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MusageProduitCategoriesRepository::class)]
class MusageProduitCategories
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'musageProduitCategories')]
    #[ORM\JoinColumn(nullable: false)]
    private ?MusageCategories $categorieId = null;

    #[ORM\ManyToOne(inversedBy: 'musageProduitCategories')]
    #[ORM\JoinColumn(nullable: false)]
    private ?MusageProduits $produitId = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategorieId(): ?MusageCategories
    {
        return $this->categorieId;
    }

    public function setCategorieId(?MusageCategories $categorieId): self
    {
        $this->categorieId = $categorieId;

        return $this;
    }

    public function getProduitId(): ?MusageProduits
    {
        return $this->produitId;
    }

    public function setProduitId(?MusageProduits $produitId): self
    {
        $this->produitId = $produitId;

        return $this;
    }
}
