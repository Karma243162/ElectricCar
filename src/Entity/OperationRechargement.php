<?php

namespace App\Entity;

use App\Repository\OperationRechargementRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OperationRechargementRepository::class)]
class OperationRechargement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateHeureDebut = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $DateHeureFin = null;

    #[ORM\Column]
    private ?float $nmkwHeures = null;

    #[ORM\ManyToOne(inversedBy: 'operationRechargements')]
    private ?Contrat $idContrat = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateHeureDebut(): ?\DateTimeInterface
    {
        return $this->dateHeureDebut;
    }

    public function setDateHeureDebut(\DateTimeInterface $dateHeureDebut): static
    {
        $this->dateHeureDebut = $dateHeureDebut;

        return $this;
    }

    public function getDateHeureFin(): ?\DateTimeInterface
    {
        return $this->DateHeureFin;
    }

    public function setDateHeureFin(\DateTimeInterface $DateHeureFin): static
    {
        $this->DateHeureFin = $DateHeureFin;

        return $this;
    }

    public function getNmkwHeures(): ?float
    {
        return $this->nmkwHeures;
    }

    public function setNmkwHeures(float $nmkwHeures): static
    {
        $this->nmkwHeures = $nmkwHeures;

        return $this;
    }

    public function getIdContrat(): ?Contrat
    {
        return $this->idContrat;
    }

    public function setIdContrat(?Contrat $idContrat): static
    {
        $this->idContrat = $idContrat;

        return $this;
    }
}
