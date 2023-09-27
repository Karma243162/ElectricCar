<?php

namespace App\Entity;

use App\Repository\StationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StationRepository::class)]
class Station
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $latitude = null;

    #[ORM\Column(length: 255)]
    private ?string $longitude = null;

    #[ORM\Column(length: 255)]
    private ?string $adresseRue = null;

    #[ORM\Column(length: 255)]
    private ?string $adresseville = null;

    #[ORM\Column(length: 255)]
    private ?string $CodePostal = null;

    #[ORM\OneToMany(mappedBy: 'idStation', targetEntity: Born::class)]
    private Collection $borns;

    public function __construct()
    {
        $this->borns = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLatitude(): ?string
    {
        return $this->latitude;
    }

    public function setLatitude(string $latitude): static
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    public function setLongitude(string $longitude): static
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getAdresseRue(): ?string
    {
        return $this->adresseRue;
    }

    public function setAdresseRue(string $adresseRue): static
    {
        $this->adresseRue = $adresseRue;

        return $this;
    }

    public function getAdresseville(): ?string
    {
        return $this->adresseville;
    }

    public function setAdresseville(string $adresseville): static
    {
        $this->adresseville = $adresseville;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->CodePostal;
    }

    public function setCodePostal(string $CodePostal): static
    {
        $this->CodePostal = $CodePostal;

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
            $born->setIdStation($this);
        }

        return $this;
    }

    public function removeBorn(Born $born): static
    {
        if ($this->borns->removeElement($born)) {
            // set the owning side to null (unless already changed)
            if ($born->getIdStation() === $this) {
                $born->setIdStation(null);
            }
        }

        return $this;
    }
}
