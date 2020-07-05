<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=UtilisateurRepository::class)
 * @UniqueEntity(
 * fields = {"username"},
 * message="Le nom d'utilisateur est déjà utilisé"
 * )
 */
class Utilisateur implements UserInterface
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
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

   

    /**
     * @ORM\OneToMany(targetEntity=Menu::class, mappedBy="utilisateur")
     */
    private $menus;

    /**
     * @ORM\OneToMany(targetEntity=Actu::class, mappedBy="utilisateur")
     */
    private $actus;

    /**
     * @ORM\OneToMany(targetEntity=Question::class, mappedBy="utilisateur")
     */
    private $question;

    /**
     * @ORM\OneToMany(targetEntity=Reponse::class, mappedBy="utilisateur")
     */
    private $reponse;

    /**
     * @ORM\ManyToOne(targetEntity=Role::class, inversedBy="utilisateurs")
     */
    private $role;

   

    public function __construct()
    {
        $this->menus = new ArrayCollection();
        $this->actus = new ArrayCollection();
        $this->question = new ArrayCollection();
        $this->reponse = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function eraseCredentials()
    {
        
    }
    public function getSalt()
    {
        
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword(string $password)
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);

        return $this;
    }

    public function getVerifPassword(): ?string
    {
        return $this->password;
    }

    public function setVerifPassword(string $verifPassword): self
    {
        $this->verifPassword = $verifPassword;

        return $this;
    }

    /**
     * @return Collection|Menu[]
     */
    public function getMenus(): Collection
    {
        return $this->menus;
    }

    public function addMenu(Menu $menu): self
    {
        if (!$this->menus->contains($menu)) {
            $this->menus[] = $menu;
            $menu->setUtilisateur($this);
        }

        return $this;
    }

    public function removeMenu(Menu $menu): self
    {
        if ($this->menus->contains($menu)) {
            $this->menus->removeElement($menu);
            // set the owning side to null (unless already changed)
            if ($menu->getUtilisateur() === $this) {
                $menu->setUtilisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|actu[]
     */
    public function getActus(): Collection
    {
        return $this->actus;
    }

    public function addActu(actu $actu): self
    {
        if (!$this->actus->contains($actu)) {
            $this->actus[] = $actu;
            $actu->setUtilisateur($this);
        }

        return $this;
    }

    public function removeActu(actu $actu): self
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
     * @return Collection|question[]
     */
    public function getQuestion(): Collection
    {
        return $this->question;
    }

    public function addQuestion(question $question): self
    {
        if (!$this->question->contains($question)) {
            $this->question[] = $question;
            $question->setUtilisateur($this);
        }

        return $this;
    }

    public function removeQuestion(question $question): self
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

    public function setRoles(?Role $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getRole()
    {
        return $this->role;
    }


public function getRoles(): array
{
    
    $roles[] = $this->role?$this->role->getLabel():[];

    return array_unique($roles);
}
   
}
