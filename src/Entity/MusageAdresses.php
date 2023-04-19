<?php

namespace App\Entity;

use App\Repository\MusageAdressesRepository;
use App\Repository\MusageClientsRepository;
use App\Repository\MusageCodePostalRepository;
use App\Repository\MusageVillesRepository;


use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MusageAdressesRepository::class)]
class MusageAdresses
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $complementAdresse = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?MusageCodePostal $codePostalId = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?MusageVilles $villeId = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getComplementAdresse(): ?string
    {
        return $this->complementAdresse;
    }

    public function setComplementAdresse(?string $complementAdresse): self
    {
        $this->complementAdresse = $complementAdresse;

        return $this;
    }

    public function getCodePostalId(): ?MusageCodePostal
    {
        return $this->codePostalId;
    }

    public function setCodePostalId(?MusageCodePostal $codePostalId): self
    {
        $this->codePostalId = $codePostalId;

        return $this;
    }

    public function getVilleId(): ?MusageVilles
    {
        return $this->villeId;
    }

    public function setVilleId(?MusageVilles $villeId): self
    {
        $this->villeId = $villeId;

        return $this;
    }
}
