<?php

namespace App\Entity;

use App\Repository\SoftwareRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SoftwareRepository::class)
 */
class Software
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity=Parcours::class, inversedBy="software")
     */
    private $parcours;

    /**
     * @ORM\ManyToMany(targetEntity=Production::class, inversedBy="software")
     */
    private $production;

    public function __construct()
    {
        $this->parcours = new ArrayCollection();
        $this->production = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Parcours[]
     */
    public function getParcours(): Collection
    {
        return $this->parcours;
    }

    public function addParcour(Parcours $parcour): self
    {
        if (!$this->parcours->contains($parcour)) {
            $this->parcours[] = $parcour;
        }

        return $this;
    }

    public function removeParcour(Parcours $parcour): self
    {
        $this->parcours->removeElement($parcour);

        return $this;
    }

    /**
     * @return Collection|Production[]
     */
    public function getProduction(): Collection
    {
        return $this->production;
    }

    public function addProduction(Production $production): self
    {
        if (!$this->production->contains($production)) {
            $this->production[] = $production;
        }

        return $this;
    }

    public function removeProduction(Production $production): self
    {
        $this->production->removeElement($production);

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }
}
