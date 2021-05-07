<?php

namespace App\Entity;

use App\Repository\SoftwareParcoursRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SoftwareParcoursRepository::class)
 */
class SoftwareParcours
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Software::class, inversedBy="softwareParcours")
     */
    private $software_id;

    /**
     * @ORM\ManyToOne(targetEntity=Parcours::class, inversedBy="softwareParcours")
     */
    private $parcours_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSoftwareId(): ?Software
    {
        return $this->software_id;
    }

    public function setSoftwareId(?Software $software_id): self
    {
        $this->software_id = $software_id;

        return $this;
    }

    public function getParcoursId(): ?Parcours
    {
        return $this->parcours_id;
    }

    public function setParcoursId(?Parcours $parcours_id): self
    {
        $this->parcours_id = $parcours_id;

        return $this;
    }
}
