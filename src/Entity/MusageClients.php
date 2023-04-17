<?php

namespace App\Entity;

use App\Repository\MusageClientsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MusageClientsRepository::class)]
class MusageClients
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 45)]
    private ?string $nomClient = null;

    #[ORM\Column(length: 45)]
    private ?string $prenomClient = null;

    #[ORM\Column(length: 64)]
    private ?string $emailClient = null;

    #[ORM\Column(length: 70)]
    private ?string $motDePasse = null;

    #[ORM\Column(length: 15)]
    private ?string $telephone = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?musageAdresses $adresseId = null;

    #[ORM\OneToMany(mappedBy: 'clientId', targetEntity: MusageCommandes::class)]
    private Collection $musageCommandes;

    public function __construct()
    {
        $this->musageCommandes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomClient(): ?string
    {
        return $this->nomClient;
    }

    public function setNomClient(string $nomClient): self
    {
        $this->nomClient = $nomClient;

        return $this;
    }

    public function getPrenomClient(): ?string
    {
        return $this->prenomClient;
    }

    public function setPrenomClient(string $prenomClient): self
    {
        $this->prenomClient = $prenomClient;

        return $this;
    }

    public function getEmailClient(): ?string
    {
        return $this->emailClient;
    }

    public function setEmailClient(string $emailClient): self
    {
        $this->emailClient = $emailClient;

        return $this;
    }

    public function getMotDePasse(): ?string
    {
        return $this->motDePasse;
    }

    public function setMotDePasse(string $motDePasse): self
    {
        $this->motDePasse = $motDePasse;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getAdresseId(): ?musageAdresses
    {
        return $this->adresseId;
    }

    public function setAdresseId(musageAdresses $adresseId): self
    {
        $this->adresseId = $adresseId;

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
            $musageCommande->setClientId($this);
        }

        return $this;
    }

    public function removeMusageCommande(MusageCommandes $musageCommande): self
    {
        if ($this->musageCommandes->removeElement($musageCommande)) {
            // set the owning side to null (unless already changed)
            if ($musageCommande->getClientId() === $this) {
                $musageCommande->setClientId(null);
            }
        }

        return $this;
    }
}
