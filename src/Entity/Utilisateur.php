<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UtilisateurRepository::class)
 */
class Utilisateur
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\OneToMany(targetEntity=Profil::class, mappedBy="utilisateur")
     */
    private $profil;

    /**
     * @ORM\OneToMany(targetEntity=Menu::class, mappedBy="utilisateur")
     */
    private $menu;

    /**
     * @ORM\OneToMany(targetEntity=Actus::class, mappedBy="utilisateur")
     */
    private $actus;

    /**
     * @ORM\OneToMany(targetEntity=Bilan::class, mappedBy="utilisateur")
     */
    private $bilan;

    /**
     * @ORM\OneToMany(targetEntity=Question::class, mappedBy="utilisateur")
     */
    private $question;

    /**
     * @ORM\OneToMany(targetEntity=Reponse::class, mappedBy="utilisateur")
     */
    private $reponse;

    public function __construct()
    {
        $this->profil = new ArrayCollection();
        $this->menu = new ArrayCollection();
        $this->actus = new ArrayCollection();
        $this->bilan = new ArrayCollection();
        $this->question = new ArrayCollection();
        $this->reponse = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * @return Collection|Profil[]
     */
    public function getRelation(): Collection
    {
        return $this->profil;
    }

    public function addRelation(Profil $profil): self
    {
        if (!$this->profil->contains($profil)) {
            $this->profil[] = $profil;
            $profil->setUtilisateur($this);
        }

        return $this;
    }

    public function removeRelation(Profil $profil): self
    {
        if ($this->profil->contains($profil)) {
            $this->profil->removeElement($profil);
            // set the owning side to null (unless already changed)
            if ($profil->getUtilisateur() === $this) {
                $profil->setUtilisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Menu[]
     */
    public function getMenu(): Collection
    {
        return $this->menu;
    }

    public function addMenu(Menu $menu): self
    {
        if (!$this->menu->contains($menu)) {
            $this->menu[] = $menu;
            $menu->setUtilisateur($this);
        }

        return $this;
    }

    public function removeMenu(Menu $menu): self
    {
        if ($this->menu->contains($menu)) {
            $this->menu->removeElement($menu);
            // set the owning side to null (unless already changed)
            if ($menu->getUtilisateur() === $this) {
                $menu->setUtilisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Actus[]
     */
    public function getActus(): Collection
    {
        return $this->actus;
    }

    public function addActu(Actus $actu): self
    {
        if (!$this->actus->contains($actu)) {
            $this->actus[] = $actu;
            $actu->setUtilisateur($this);
        }

        return $this;
    }

    public function removeActu(Actus $actu): self
    {
        if ($this->actus->contains($actu)) {
            $this->actus->removeElement($actu);
            // set the owning side to null (unless already changed)
            if ($actu->getUtilisateur() === $this) {
                $actu->setUtilisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Bilan[]
     */
    public function getBilan(): Collection
    {
        return $this->bilan;
    }

    public function addBilan(Bilan $bilan): self
    {
        if (!$this->bilan->contains($bilan)) {
            $this->bilan[] = $bilan;
            $bilan->setUtilisateur($this);
        }

        return $this;
    }

    public function removeBilan(Bilan $bilan): self
    {
        if ($this->bilan->contains($bilan)) {
            $this->bilan->removeElement($bilan);
            // set the owning side to null (unless already changed)
            if ($bilan->getUtilisateur() === $this) {
                $bilan->setUtilisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Question[]
     */
    public function getQuestion(): Collection
    {
        return $this->question;
    }

    public function addQuestion(Question $question): self
    {
        if (!$this->question->contains($question)) {
            $this->question[] = $question;
            $question->setUtilisateur($this);
        }

        return $this;
    }

    public function removeQuestion(Question $question): self
    {
        if ($this->question->contains($question)) {
            $this->question->removeElement($question);
            // set the owning side to null (unless already changed)
            if ($question->getUtilisateur() === $this) {
                $question->setUtilisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|reponse[]
     */
    public function getReponse(): Collection
    {
        return $this->reponse;
    }

    public function addReponse(reponse $reponse): self
    {
        if (!$this->reponse->contains($reponse)) {
            $this->reponse[] = $reponse;
            $reponse->setUtilisateur($this);
        }

        return $this;
    }

    public function removeReponse(reponse $reponse): self
    {
        if ($this->reponse->contains($reponse)) {
            $this->reponse->removeElement($reponse);
            // set the owning side to null (unless already changed)
            if ($reponse->getUtilisateur() === $this) {
                $reponse->setUtilisateur(null);
            }
        }

        return $this;
    }
}
