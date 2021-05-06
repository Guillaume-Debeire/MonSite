<?php

namespace App\Entity;

use App\Repository\ParcoursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ParcoursRepository::class)
 */
class Parcours
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
     * @ORM\Column(type="string", length=2555, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $skill;

    /**
     * @ORM\OneToMany(targetEntity=Picture::class, mappedBy="parcours")
     */
    private $pictures;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $YoutubeVideo;

    /**
     * @ORM\ManyToMany(targetEntity=Software::class, mappedBy="parcours")
     */
    private $software;

    public function __construct()
    {
        $this->pictures = new ArrayCollection();
        $this->software = new ArrayCollection();
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

    public function getSkill(): ?string
    {
        return $this->skill;
    }

    public function setSkill(?string $skill): self
    {
        $this->skill = $skill;

        return $this;
    }
    
    /**
     * @return Collection|Picture[]
     */
    public function getPictures(): Collection
    {
        return $this->pictures;
    }

    public function addPicture(Picture $picture): self
    {
        if (!$this->pictures->contains($picture)) {
            $this->pictures[] = $picture;
            $picture->setParcours($this);
        }

        return $this;
    }

    public function removePicture(Picture $picture): self
    {
        if ($this->pictures->removeElement($picture)) {
            // set the owning side to null (unless already changed)
            if ($picture->getParcours() === $this) {
                $picture->setParcours(null);
            }
        }

        return $this;
    }

    public function getYoutubeVideo(): ?string
    {
        return $this->YoutubeVideo;
    }

    public function setYoutubeVideo(?string $YoutubeVideo): self
    {
        $this->YoutubeVideo = $YoutubeVideo;

        return $this;
    }

    /**
     * @return Collection|Software[]
     */
    public function getSoftware(): Collection
    {
        return $this->software;
    }

    public function addSoftware(Software $software): self
    {
        if (!$this->software->contains($software)) {
            $this->software[] = $software;
            $software->addParcour($this);
        }

        return $this;
    }

    public function removeSoftware(Software $software): self
    {
        if ($this->software->removeElement($software)) {
            $software->removeParcour($this);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }
}
