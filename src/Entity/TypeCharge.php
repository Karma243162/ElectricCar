<?php

namespace App\Entity;

use App\Repository\TypeChargeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeChargeRepository::class)]
class TypeCharge
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $LibelleTypeChargeur = null;

    #[ORM\Column(length: 255)]
    private ?string $PuissanceTypeCharge = null;

    #[ORM\OneToMany(mappedBy: 'codeTypeCharge', targetEntity: Supporter::class)]
    private Collection $supporters;

    #[ORM\OneToMany(mappedBy: 'codeTypeCharge', targetEntity: Born::class)]
    private Collection $borns;

    public function __construct()
    {
        $this->supporters = new ArrayCollection();
        $this->borns = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleTypeChargeur(): ?string
    {
        return $this->LibelleTypeChargeur;
    }

    public function setLibelleTypeChargeur(string $LibelleTypeChargeur): static
    {
        $this->LibelleTypeChargeur = $LibelleTypeChargeur;

        return $this;
    }

    public function getPuissanceTypeCharge(): ?string
    {
        return $this->PuissanceTypeCharge;
    }

    public function setPuissanceTypeCharge(string $PuissanceTypeCharge): static
    {
        $this->PuissanceTypeCharge = $PuissanceTypeCharge;

        return $this;
    }

    /**
     * @return Collection<int, Supporter>
     */
    public function getSupporters(): Collection
    {
        return $this->supporters;
    }

    public function addSupporter(Supporter $supporter): static
    {
        if (!$this->supporters->contains($supporter)) {
            $this->supporters->add($supporter);
            $supporter->setCodeTypeCharge($this);
        }

        return $this;
    }

    public function removeSupporter(Supporter $supporter): static
    {
        if ($this->supporters->removeElement($supporter)) {
            // set the owning side to null (unless already changed)
            if ($supporter->getCodeTypeCharge() === $this) {
                $supporter->setCodeTypeCharge(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Born>
     */
    public function getBorns(): Collection
    {
        return $this->borns;
    }

    public function addBorn(Born $born): static
    {
        if (!$this->borns->contains($born)) {
            $this->borns->add($born);
            $born->setCodeTypeCharge($this);
        }

        return $this;
    }

    public function removeBorn(Born $born): static
    {
        if ($this->borns->removeElement($born)) {
            // set the owning side to null (unless already changed)
            if ($born->getCodeTypeCharge() === $this) {
                $born->setCodeTypeCharge(null);
            }
        }

        return $this;
    }
}
