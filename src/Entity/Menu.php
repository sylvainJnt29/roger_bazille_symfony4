<?php

namespace App\Entity;

use App\Repository\MenuRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MenuRepository::class)
 */
class Menu
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_creation_menu;

    /**
     * @ORM\Column(type="date")
     */
    private $date_service_menu;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $entree;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $plat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dessert;

    /**
     * @ORM\Column(type="float")
     */
    private $tarif_abonne;

    /**
     * @ORM\Column(type="float")
     */
    private $tarif_passager;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="menu")
     */
    private $utilisateur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate_creation_menu(): ?\DateTimeInterface
    {
        return $this->date_creation_menu;
    }

    public function setDdate_creation_menu(?\DateTimeInterface $date_creation_menu): self
    {
        $this->date_creation_menu = $date_creation_menu;

        return $this;
    }

    public function getDate_service_menu(): ?\DateTimeInterface
    {
        return $this->date_service_menu;
    }

    public function setDate_service_menu(\DateTimeInterface $date_service_menu): self
    {
        $this->date_service_menu = $date_service_menu;

        return $this;
    }

    public function getEntree(): ?string
    {
        return $this->entree;
    }

    public function setEntree(string $entree): self
    {
        $this->entree = $entree;

        return $this;
    }

    public function getPlat(): ?string
    {
        return $this->plat;
    }

    public function setPlat(string $plat): self
    {
        $this->plat = $plat;

        return $this;
    }

    public function getDessert(): ?string
    {
        return $this->dessert;
    }

    public function setDessert(string $dessert): self
    {
        $this->dessert = $dessert;

        return $this;
    }

    public function getTarif_abonne(): ?float
    {
        return $this->tarif_abonne;
    }

    public function setTarif_abonne(float $tarif_abonne): self
    {
        $this->tarif_abonne = $tarif_abonne;

        return $this;
    }

    public function getTarif_passager(): ?float
    {
        return $this->tarif_passager;
    }

    public function setTarif_passager(float $tarif_passager): self
    {
        $this->tarif_passager = $tarif_passager;

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }
}
