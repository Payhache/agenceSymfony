<?php

namespace App\Entity;

use App\Repository\DestinationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DestinationRepository::class)
 */
class Destination
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
    private $lieu;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pays;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_ouverture;

    /**
     * @ORM\Column(type="integer")
     */
    private $nb_star;

    /**
     * @ORM\ManyToMany(targetEntity=Sejour::class, inversedBy="destinations")
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

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getDateOuverture(): ?\DateTimeInterface
    {
        return $this->date_ouverture;
    }

    public function setDateOuverture(?\DateTimeInterface $date_ouverture): self
    {
        $this->date_ouverture = $date_ouverture;

        return $this;
    }

    public function getNbStar(): ?int
    {
        return $this->nb_star;
    }

    public function setNbStar(int $nb_star): self
    {
        $this->nb_star = $nb_star;

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
}
