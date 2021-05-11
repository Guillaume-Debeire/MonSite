<?php

namespace App\Entity;

use App\Repository\SkillRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SkillRepository::class)
 */
class Skill
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @ORM\ManyToMany(targetEntity=Parcours::class, inversedBy="skills")
     */
    private $parcours;

    /**
     * @ORM\ManyToMany(targetEntity=Exercice::class, inversedBy="skills")
     */
    private $exercice;

    /**
     * @ORM\ManyToMany(targetEntity=Application::class, inversedBy="skills")
     */
    private $application;

    /**
     * @ORM\ManyToMany(targetEntity=Audiovisuel::class, inversedBy="skills")
     */
    private $audiovisuel;

    
    public function __construct()
    {
        $this->parcours = new ArrayCollection();
        $this->exercice = new ArrayCollection();
        $this->application = new ArrayCollection();
        $this->audiovisuel = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

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
     * @return Collection|Exercice[]
     */
    public function getExercice(): Collection
    {
        return $this->exercice;
    }

    public function addExercice(Exercice $exercice): self
    {
        if (!$this->exercice->contains($exercice)) {
            $this->exercice[] = $exercice;
        }

        return $this;
    }

    public function removeExercice(Exercice $exercice): self
    {
        $this->exercice->removeElement($exercice);

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

    /**
     * @return Collection|Audiovisuel[]
     */
    public function getAudiovisuel(): Collection
    {
        return $this->audiovisuel;
    }

    public function addAudiovisuel(Audiovisuel $audiovisuel): self
    {
        if (!$this->audiovisuel->contains($audiovisuel)) {
            $this->audiovisuel[] = $audiovisuel;
        }

        return $this;
    }

    public function removeAudiovisuel(Audiovisuel $audiovisuel): self
    {
        $this->audiovisuel->removeElement($audiovisuel);

        return $this;
    }

    
}
