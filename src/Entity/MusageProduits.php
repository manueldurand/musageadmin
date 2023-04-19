<?php

namespace App\Entity;

use App\Repository\MusageProduitsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MusageProduitsRepository::class)]
class MusageProduits
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 45)]
    private ?string $image1 = null;

    #[ORM\Column(length: 45)]
    private ?string $image2 = null;

    #[ORM\Column]
    private ?int $stock = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateMAJ = null;

    #[ORM\Column(length: 64, nullable: true)]
    private ?string $lienBlog = null;

    #[ORM\ManyToOne(inversedBy: 'musageProduits')]
    #[ORM\JoinColumn(nullable: false)]
    private ?MusageTypePlante $planteId = null;

    #[ORM\ManyToOne(inversedBy: 'musageProduits')]
    private ?MusageCouleurs $couleurId = null;

    #[ORM\ManyToOne(inversedBy: 'musageProduits')]
    #[ORM\JoinColumn(nullable: false)]
    private ?MusageUnite $uniteId = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2)]
    private ?string $prix = null;

    #[ORM\OneToMany(mappedBy: 'produitId', targetEntity: MusageCommandeProduit::class)]
    private Collection $musageCommandeDansProduits;

    #[ORM\OneToMany(mappedBy: 'produitId', targetEntity: MusageProduitCategories::class)]
    private Collection $musageProduitCategories;

    public function __construct()
    {
        $this->musageCommandeDansProduits = new ArrayCollection();
        $this->musageProduitCategories = new ArrayCollection();
    }
    public function getNomPlante(): ?string 
    {
        return $this->planteId->getNomPlante();
    }

    public function getNomCouleur(): ?string 
    {
        return $this->couleurId->getNomCouleur();
    }
    public function getMusageTypeUnite(): ?string
    {
        return $this->uniteId->getMusageTypeUnite();
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImage1(): ?string
    {
        return $this->image1;
    }

    public function setImage1(string $image1): self
    {
        $this->image1 = $image1;

        return $this;
    }

    public function getImage2(): ?string
    {
        return $this->image2;
    }

    public function setImage2(string $image2): self
    {
        $this->image2 = $image2;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getDateMAJ(): ?\DateTimeInterface
    {
        return $this->dateMAJ;
    }

    public function setDateMAJ(\DateTimeInterface $dateMAJ): self
    {
        $this->dateMAJ = $dateMAJ;

        return $this;
    }

    public function getLienBlog(): ?string
    {
        return $this->lienBlog;
    }

    public function setLienBlog(?string $lienBlog): self
    {
        $this->lienBlog = $lienBlog;

        return $this;
    }

    public function getPlanteId(): ?MusageTypePlante
    {
        return $this->planteId;
    }

    public function setPlanteId(?MusageTypePlante $planteId): self
    {
        $this->planteId = $planteId;

        return $this;
    }

    public function getCouleurId(): ?MusageCouleurs
    {
        return $this->couleurId;
    }

    public function setCouleurId(?MusageCouleurs $couleurId): self
    {
        $this->couleurId = $couleurId;

        return $this;
    }

    public function getUniteId(): ?MusageUnite
    {
        return $this->uniteId;
    }

    public function setUniteId(?MusageUnite $uniteId): self
    {
        $this->uniteId = $uniteId;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * @return Collection<int, MusageCommandeProduit>
     */
    public function getMusageCommandeDansProduits(): Collection
    {
        return $this->musageCommandeDansProduits;
    }

    public function addMusageCommandeDansProduit(MusageCommandeProduit $musageCommandeDansProduit): self
    {
        if (!$this->musageCommandeDansProduits->contains($musageCommandeDansProduit)) {
            $this->musageCommandeDansProduits->add($musageCommandeDansProduit);
            $musageCommandeDansProduit->setProduitId($this);
        }

        return $this;
    }

    public function removeMusageCommandeDansProduit(MusageCommandeProduit $musageCommandeDansProduit): self
    {
        if ($this->musageCommandeDansProduits->removeElement($musageCommandeDansProduit)) {
            // set the owning side to null (unless already changed)
            if ($musageCommandeDansProduit->getProduitId() === $this) {
                $musageCommandeDansProduit->setProduitId(null);
            }
        }

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
            $musageProduitCategory->setProduitId($this);
        }

        return $this;
    }

    public function removeMusageProduitCategory(MusageProduitCategories $musageProduitCategory): self
    {
        if ($this->musageProduitCategories->removeElement($musageProduitCategory)) {
            // set the owning side to null (unless already changed)
            if ($musageProduitCategory->getProduitId() === $this) {
                $musageProduitCategory->setProduitId(null);
            }
        }

        return $this;
    }
}
