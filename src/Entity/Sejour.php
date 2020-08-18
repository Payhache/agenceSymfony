<?php

namespace App\Entity;

use App\Repository\SejourRepository;
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
     * @ORM\Column(type="string", length=255)
     */
    private $activite1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $activite2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $activite3;

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

    public function getActivite1(): ?string
    {
        return $this->activite1;
    }

    public function setActivite1(string $activite1): self
    {
        $this->activite1 = $activite1;

        return $this;
    }

    public function getActivite2(): ?string
    {
        return $this->activite2;
    }

    public function setActivite2(string $activite2): self
    {
        $this->activite2 = $activite2;

        return $this;
    }

    public function getActivite3(): ?string
    {
        return $this->activite3;
    }

    public function setActivite3(string $activite3): self
    {
        $this->activite3 = $activite3;

        return $this;
    }
}
