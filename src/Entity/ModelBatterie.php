<?php

namespace App\Entity;

use App\Repository\ModelBatterieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ModelBatterieRepository::class)]
class ModelBatterie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $capacite = null;

    #[ORM\Column(length: 255)]
    private ?string $fabricant = null;

    #[ORM\OneToMany(mappedBy: 'idModelBatterie', targetEntity: Contrat::class)]
    private Collection $contrats;

    #[ORM\OneToMany(mappedBy: 'idModelbatterie', targetEntity: Supporter::class)]
    private Collection $supporters;

    public function __construct()
    {
        $this->contrats = new ArrayCollection();
        $this->supporters = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCapacite(): ?string
    {
        return $this->capacite;
    }

    public function setCapacite(string $capacite): static
    {
        $this->capacite = $capacite;

        return $this;
    }

    public function getFabricant(): ?string
    {
        return $this->fabricant;
    }

    public function setFabricant(string $fabricant): static
    {
        $this->fabricant = $fabricant;

        return $this;
    }

    /**
     * @return Collection<int, Contrat>
     */
    public function getContrats(): Collection
    {
        return $this->contrats;
    }

    public function addContrat(Contrat $contrat): static
    {
        if (!$this->contrats->contains($contrat)) {
            $this->contrats->add($contrat);
            $contrat->setIdModelBatterie($this);
        }

        return $this;
    }

    public function removeContrat(Contrat $contrat): static
    {
        if ($this->contrats->removeElement($contrat)) {
            // set the owning side to null (unless already changed)
            if ($contrat->getIdModelBatterie() === $this) {
                $contrat->setIdModelBatterie(null);
            }
        }

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
            $supporter->setIdModelbatterie($this);
        }

        return $this;
    }

    public function removeSupporter(Supporter $supporter): static
    {
        if ($this->supporters->removeElement($supporter)) {
            // set the owning side to null (unless already changed)
            if ($supporter->getIdModelbatterie() === $this) {
                $supporter->setIdModelbatterie(null);
            }
        }

        return $this;
    }
}
