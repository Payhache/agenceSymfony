<?php

namespace App\Entity;

use App\Repository\SejourRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SejourRepository::class)
 */
class Sejour
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
    private $type_logement;

    /**
     * @ORM\Column(type="integer")
     */
    private $nb_personne;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="sejours")
     */
    private $category;

    /**
     * @ORM\ManyToMany(targetEntity=Destination::class, mappedBy="sejour")
     */
    private $destinations;

    /**
     * @ORM\ManyToMany(targetEntity=Activity::class, mappedBy="sejour")
     */
    private $activities;

    public function __construct()
    {
        $this->destinations = new ArrayCollection();
        $this->activities = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeLogement(): ?string
    {
        return $this->type_logement;
    }

    public function setTypeLogement(string $type_logement): self
    {
        $this->type_logement = $type_logement;

        return $this;
    }

    public function getNbPersonne(): ?int
    {
        return $this->nb_personne;
    }

    public function setNbPersonne(int $nb_personne): self
    {
        $this->nb_personne = $nb_personne;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCategory(): ?category
    {
        return $this->category;
    }

    public function setCategory(?category $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection|Destination[]
     */
    public function getDestinations(): Collection
    {
        return $this->destinations;
    }

    public function addDestination(Destination $destination): self
    {
        if (!$this->destinations->contains($destination)) {
            $this->destinations[] = $destination;
            $destination->addSejour($this);
        }

        return $this;
    }

    public function removeDestination(Destination $destination): self
    {
        if ($this->destinations->contains($destination)) {
            $this->destinations->removeElement($destination);
            $destination->removeSejour($this);
        }

        return $this;
    }

    /**
     * @return Collection|Activity[]
     */
    public function getActivities(): Collection
    {
        return $this->activities;
    }

    public function addActivity(Activity $activity): self
    {
        if (!$this->activities->contains($activity)) {
            $this->activities[] = $activity;
            $activity->addSejour($this);
        }

        return $this;
    }

    public function removeActivity(Activity $activity): self
    {
        if ($this->activities->contains($activity)) {
            $this->activities->removeElement($activity);
            $activity->removeSejour($this);
        }

        return $this;
    }

}
