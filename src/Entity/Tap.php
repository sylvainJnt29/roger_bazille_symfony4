<?php

namespace App\Entity;

use App\Repository\TapRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TapRepository::class)
 */
class Tap
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $dateCreationArticle;

    /**
     * @ORM\Column(type="date")
     */
    private $dateDebutActivite;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateFinActivite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $classe;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $activite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $responsable;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCreationArticle(): ?\DateTimeInterface
    {
        return $this->dateCreationArticle;
    }

    public function setDateCreationArticle(\DateTimeInterface $dateCreationArticle): self
    {
        $this->dateCreationArticle = $dateCreationArticle;

        return $this;
    }

    public function getDateDebutActivite(): ?\DateTimeInterface
    {
        return $this->dateDebutActivite;
    }

    public function setDateDebutActivite(\DateTimeInterface $dateDebutActivite): self
    {
        $this->dateDebutActivite = $dateDebutActivite;

        return $this;
    }

    public function getDateFinActivite(): ?\DateTimeInterface
    {
        return $this->dateFinActivite;
    }

    public function setDateFinActivite(?\DateTimeInterface $dateFinActivite): self
    {
        $this->dateFinActivite = $dateFinActivite;

        return $this;
    }

    public function getClasse(): ?string
    {
        return $this->classe;
    }

    public function setClasse(string $classe): self
    {
        $this->classe = $classe;

        return $this;
    }

    public function getActivite(): ?string
    {
        return $this->activite;
    }

    public function setActivite(string $activite): self
    {
        $this->activite = $activite;

        return $this;
    }

    public function getResponsable(): ?string
    {
        return $this->responsable;
    }

    public function setResponsable(string $responsable): self
    {
        $this->responsable = $responsable;

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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }
}
