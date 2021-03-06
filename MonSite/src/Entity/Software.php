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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $level;

    /**
     * @ORM\ManyToMany(targetEntity=Application::class, inversedBy="software")
     */
    private $application;

    public function __construct()
    {
        $this->parcours = new ArrayCollection();
        $this->production = new ArrayCollection();
        $this->softwareParcours = new ArrayCollection();
        $this->application = new ArrayCollection();
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
    
    public function __toString()
    {
        return $this->name;
    }

    public function getLevel(): ?string
    {
        return $this->level;
    }

    public function setLevel(?string $level): self
    {
        $this->level = $level;

        return $this;
    }

    /**
     * @return Collection|Application[]
     */
    public function getApplication(): Collection
    {
        return $this->application;
    }

    public function addApplication(Application $application): self
    {
        if (!$this->application->contains($application)) {
            $this->application[] = $application;
        }

        return $this;
    }

    public function removeApplication(Application $application): self
    {
        $this->application->removeElement($application);

        return $this;
    }

}
