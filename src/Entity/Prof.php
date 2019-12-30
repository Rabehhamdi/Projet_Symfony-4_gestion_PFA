<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ImageRepository")
 */
class Prof
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
    private $image;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Profsignaleretudiant", mappedBy="professeur", orphanRemoval=true)
     */
    private $profsignaleretudiants;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $id_user;

    public function __construct()
    {
        $this->profsignaleretudiants = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection|Profsignaleretudiant[]
     */
    public function getProfsignaleretudiants(): Collection
    {
        return $this->profsignaleretudiants;
    }

    public function addProfsignaleretudiant(Profsignaleretudiant $profsignaleretudiant): self
    {
        if (!$this->profsignaleretudiants->contains($profsignaleretudiant)) {
            $this->profsignaleretudiants[] = $profsignaleretudiant;
            $profsignaleretudiant->setProfesseur($this);
        }

        return $this;
    }

    public function removeProfsignaleretudiant(Profsignaleretudiant $profsignaleretudiant): self
    {
        if ($this->profsignaleretudiants->contains($profsignaleretudiant)) {
            $this->profsignaleretudiants->removeElement($profsignaleretudiant);
            // set the owning side to null (unless already changed)
            if ($profsignaleretudiant->getProfesseur() === $this) {
                $profsignaleretudiant->setProfesseur(null);
            }
        }

        return $this;
    }

    public function getIdUser(): ?string
    {
        return $this->id_user;
    }

    public function setIdUser(string $id_user): self
    {
        $this->id_user = $id_user;

        return $this;
    }
}
