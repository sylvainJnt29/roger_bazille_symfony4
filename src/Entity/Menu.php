<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\MenuRepository;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=MenuRepository::class)
 * @Vich\Uploadable
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
     * @ORM\Column(type="float")
     */
    private $tarifAbonne;

    /**
     * @ORM\Column(type="float")
     */
    private $tarifPassager;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $carte_menu;


    /**
     * @Vich\UploadableField(mapping="images_menus", fileNameProperty="carte_menu")
     */
    private $imageFile;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="menus")
     */
    private $utilisateur;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updated_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTarifAbonne(): ?float
    {
        return $this->tarifAbonne;
    }

    public function setTarifAbonne(float $tarifAbonne): self
    {
        $this->tarifAbonne = $tarifAbonne;

        return $this;
    }

    public function getTarifPassager(): ?float
    {
        return $this->tarifPassager;
    }

    public function setTarifPassager(float $tarifPassager): self
    {
        $this->tarifPassager = $tarifPassager;

        return $this;
    }

    public function getCarteMenu(): ?string
    {
        return $this->carte_menu;
    }

    public function setCarteMenu(?string $carte_menu): self
    {
        $this->carte_menu = $carte_menu;

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
     public function setImageFile(?File $imageFile = null): self
    {
        $this->imageFile = $imageFile;
        
        if ($this->imageFile instanceof UploadedFile) {
            $this->updated_at = new \DateTime('now');
        }
        return $this;
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }
}
