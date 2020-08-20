<?php

namespace App\Entity;

use App\Repository\ActivityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ActivityRepository::class)
 */
class Activity
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity=Sejour::class, inversedBy="activities")
     */
    private $sejour;

    public function __construct()
    {
        $this->sejour = new ArrayCollection();
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
     * @return Collection|sejour[]
     */
    public function getSejour(): Collection
    {
        return $this->sejour;
    }

    public function addSejour(sejour $sejour): self
    {
        if (!$this->sejour->contains($sejour)) {
            $this->sejour[] = $sejour;
        }

        return $this;
    }

    public function removeSejour(sejour $sejour): self
    {
        if ($this->sejour->contains($sejour)) {
            $this->sejour->removeElement($sejour);
        }

        return $this;
    }

    public function setSejour(?Sejour $sejour): self
    {
        $this->sejour = $sejour;

        return $this;
    }
}
