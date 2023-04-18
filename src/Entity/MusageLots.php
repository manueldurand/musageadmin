<?php

namespace App\Entity;

use App\Repository\MusageLotsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MusageLotsRepository::class)]
class MusageLots
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 45)]
    private ?string $nomLot = null;

    #[ORM\Column]
    private ?int $quantite = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $m_a_j = null;

    #[ORM\OneToMany(mappedBy: 'lotId', targetEntity: MusageCommandes::class)]
    private Collection $musageCommandes;

    public function __construct()
    {
        $this->musageCommandes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomLot(): ?string
    {
        return $this->nomLot;
    }

    public function setNomLot(string $nomLot): self
    {
        $this->nomLot = $nomLot;

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

    public function getMAJ(): ?\DateTimeInterface
    {
        return $this->m_a_j;
    }

    public function setMAJ(?\DateTimeInterface $m_a_j): self
    {
        $this->m_a_j = $m_a_j;

        return $this;
    }

    /**
     * @return Collection<int, MusageCommandes>
     */
    public function getMusageCommandes(): Collection
    {
        return $this->musageCommandes;
    }

    public function addMusageCommande(MusageCommandes $musageCommande): self
    {
        if (!$this->musageCommandes->contains($musageCommande)) {
            $this->musageCommandes->add($musageCommande);
            $musageCommande->setLotId($this);
        }

        return $this;
    }

    public function removeMusageCommande(MusageCommandes $musageCommande): self
    {
        if ($this->musageCommandes->removeElement($musageCommande)) {
            // set the owning side to null (unless already changed)
            if ($musageCommande->getLotId() === $this) {
                $musageCommande->setLotId(null);
            }
        }

        return $this;
    }
}
