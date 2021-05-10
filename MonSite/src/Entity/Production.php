<?php

namespace App\Entity;

use App\Repository\ProductionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductionRepository::class)
 */
class Production
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToOne(targetEntity=Exercice::class, cascade={"persist", "remove"})
     */
    private $exercice;

    /**
     * @ORM\ManyToOne(targetEntity=Parcours::class, inversedBy="productions")
     */
    private $parcours;

    /**
     * @ORM\OneToOne(targetEntity=Application::class, cascade={"persist", "remove"})
     */
    private $application;

    /**
     * @ORM\OneToOne(targetEntity=Audiovisuel::class, cascade={"persist", "remove"})
     */
    private $audiovisuel;

    
    public function __construct()
    {

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }

    public function getExercice(): ?Exercice
    {
        return $this->exercice;
    }

    public function setExercice(?Exercice $exercice): self
    {
        $this->exercice = $exercice;

        return $this;
    }

    public function getParcours(): ?Parcours
    {
        return $this->parcours;
    }

    public function setParcours(?Parcours $parcours): self
    {
        $this->parcours = $parcours;

        return $this;
    }

    public function getApplication(): ?Application
    {
        return $this->application;
    }

    public function setApplication(?Application $application): self
    {
        $this->application = $application;

        return $this;
    }

    public function getAudiovisuel(): ?Audiovisuel
    {
        return $this->audiovisuel;
    }

    public function setAudiovisuel(?Audiovisuel $audiovisuel): self
    {
        $this->audiovisuel = $audiovisuel;

        return $this;
    }
}
