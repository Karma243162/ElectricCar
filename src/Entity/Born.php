<?php

namespace App\Entity;

use App\Repository\BornRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BornRepository::class)]
class Born
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateMiseEnService = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $DateDernierRevision = null;

    #[ORM\ManyToOne(inversedBy: 'borns')]
    private ?TypeCharge $codeTypeCharge = null;

    #[ORM\ManyToOne(inversedBy: 'borns')]
    private ?Station $idStation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateMiseEnService(): ?\DateTimeInterface
    {
        return $this->dateMiseEnService;
    }

    public function setDateMiseEnService(\DateTimeInterface $dateMiseEnService): static
    {
        $this->dateMiseEnService = $dateMiseEnService;

        return $this;
    }

    public function getDateDernierRevision(): ?\DateTimeInterface
    {
        return $this->DateDernierRevision;
    }

    public function setDateDernierRevision(\DateTimeInterface $DateDernierRevision): static
    {
        $this->DateDernierRevision = $DateDernierRevision;

        return $this;
    }

    public function getCodeTypeCharge(): ?TypeCharge
    {
        return $this->codeTypeCharge;
    }

    public function setCodeTypeCharge(?TypeCharge $codeTypeCharge): static
    {
        $this->codeTypeCharge = $codeTypeCharge;

        return $this;
    }

    public function getIdStation(): ?Station
    {
        return $this->idStation;
    }

    public function setIdStation(?Station $idStation): static
    {
        $this->idStation = $idStation;

        return $this;
    }
}
