<?php

namespace App\Entity;

use App\Repository\MusageCommandeProduitRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MusageCommandeProduitRepository::class)]
class MusageCommandeProduit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'musageProduitsDansCommande')]
    #[ORM\JoinColumn(nullable: false)]
    private ?MusageCommandes $commandeId = null;

    #[ORM\ManyToOne(inversedBy: 'musageCommandeDansProduits')]
    #[ORM\JoinColumn(nullable: false)]
    private ?MusageProduits $produitId = null;

    #[ORM\Column]
    private ?int $quantite = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommandeId(): ?MusageCommandes
    {
        return $this->commandeId;
    }

    public function setCommandeId(?MusageCommandes $commandeId): self
    {
        $this->commandeId = $commandeId;

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

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }
}
