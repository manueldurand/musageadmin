<?php

namespace App\Entity;

use App\Repository\MusageCommandesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MusageCommandesRepository::class)]
class MusageCommandes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'musageCommandes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?MusageClients $clientId = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateCommande = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $livraisonSouhaitee = null;

    #[ORM\ManyToOne(inversedBy: 'musageCommandes')]
    private ?MusageLots $lotId = null;

    #[ORM\Column(length: 45)]
    private ?string $etatCommande = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateLivraison = null;

    #[ORM\OneToMany(mappedBy: 'commandeId', targetEntity: MusageCommandeProduit::class)]
    private Collection $musageProduitsDansCommande;

    public function __construct()
    {
        $this->musageProduitsDansCommande = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClientId(): ?MusageClients
    {
        return $this->clientId;
    }

    public function setClientId(?MusageClients $clientId): self
    {
        $this->clientId = $clientId;

        return $this;
    }
    public function getnomClient(): ?string
    {
        return $this->clientId->getNomClient();
    }
    public function getPrenomClient(): ?string
    {
        return $this->clientId->getPrenomClient();
    }

    public function getDateCommande(): ?\DateTimeInterface
    {
        return $this->dateCommande;
    }

    public function setDateCommande(\DateTimeInterface $dateCommande): self
    {
        $this->dateCommande = $dateCommande;

        return $this;
    }

    public function getLivraisonSouhaitee(): ?\DateTimeInterface
    {
        return $this->livraisonSouhaitee;
    }

    public function setLivraisonSouhaitee(\DateTimeInterface $livraisonSouhaitee): self
    {
        $this->livraisonSouhaitee = $livraisonSouhaitee;

        return $this;
    }

    public function getLotId(): ?MusageLots
    {
        return $this->lotId;
    }

    public function setLotId(?MusageLots $lotId): self
    {
        $this->lotId = $lotId;

        return $this;
    }
    public function getNomLot(): ?string
    {
        return $this->getNomLot();
    }

    public function getEtatCommande(): ?string
    {
        return $this->etatCommande;
    }

    public function setEtatCommande(string $etatCommande): self
    {
        $this->etatCommande = $etatCommande;

        return $this;
    }

    public function getDateLivraison(): ?\DateTimeInterface
    {
        return $this->dateLivraison;
    }

    public function setDateLivraison(?\DateTimeInterface $dateLivraison): self
    {
        $this->dateLivraison = $dateLivraison;

        return $this;
    }

    /**
     * @return Collection<int, MusageCommandeProduit>
     */
    public function getMusageProduitsDansCommande(): Collection
    {
        return $this->musageProduitsDansCommande;
    }

    public function addMusageProduitsDansCommande(MusageCommandeProduit $musageProduitsDansCommande): self
    {
        if (!$this->musageProduitsDansCommande->contains($musageProduitsDansCommande)) {
            $this->musageProduitsDansCommande->add($musageProduitsDansCommande);
            $musageProduitsDansCommande->setCommandeId($this);
        }

        return $this;
    }

    public function removeMusageProduitsDansCommande(MusageCommandeProduit $musageProduitsDansCommande): self
    {
        if ($this->musageProduitsDansCommande->removeElement($musageProduitsDansCommande)) {
            // set the owning side to null (unless already changed)
            if ($musageProduitsDansCommande->getCommandeId() === $this) {
                $musageProduitsDansCommande->setCommandeId(null);
            }
        }

        return $this;
    }
}
