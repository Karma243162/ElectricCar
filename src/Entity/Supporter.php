<?php

namespace App\Entity;

use App\Repository\SupporterRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SupporterRepository::class)]
class Supporter
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'supporters')]
    private ?ModelBatterie $idModelbatterie = null;

    #[ORM\ManyToOne(inversedBy: 'supporters')]
    private ?TypeCharge $codeTypeCharge = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdModelbatterie(): ?ModelBatterie
    {
        return $this->idModelbatterie;
    }

    public function setIdModelbatterie(?ModelBatterie $idModelbatterie): static
    {
        $this->idModelbatterie = $idModelbatterie;

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
}
