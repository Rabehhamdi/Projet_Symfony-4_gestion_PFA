<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ResponsableentrepriseRepository")
 */
class Responsableentreprise
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
    private $nom_Entreprise;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $domaine_Entreprise;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $logo;

    /**
     * @ORM\Column(type="text")
     */
    private $description_Entreprise;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Offreentreprise", mappedBy="responsable", orphanRemoval=true)
     */
    private $offres;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Responsablesignaleretudiant", mappedBy="responsable", orphanRemoval=true)
     */
    private $responsablesignaleretudiants;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $id_user;

    public function __construct()
    {
        $this->offres = new ArrayCollection();
        $this->responsablesignaleretudiants = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEntreprise(): ?string
    {
        return $this->nom_Entreprise;
    }

    public function setNomEntreprise(string $nom_Entreprise): self
    {
        $this->nom_Entreprise = $nom_Entreprise;

        return $this;
    }

    public function getDomaineEntreprise(): ?string
    {
        return $this->domaine_Entreprise;
    }

    public function setDomaineEntreprise(string $domaine_Entreprise): self
    {
        $this->domaine_Entreprise = $domaine_Entreprise;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    public function getDescriptionEntreprise(): ?string
    {
        return $this->description_Entreprise;
    }

    public function setDescriptionEntreprise(string $description_Entreprise): self
    {
        $this->description_Entreprise = $description_Entreprise;

        return $this;
    }

    /**
     * @return Collection|offreentreprise[]
     */
    public function getOffres(): Collection
    {
        return $this->offres;
    }

    public function addOffre(offreentreprise $offre): self
    {
        if (!$this->offres->contains($offre)) {
            $this->offres[] = $offre;
            $offre->setResponsable($this);
        }

        return $this;
    }

    public function removeOffre(offreentreprise $offre): self
    {
        if ($this->offres->contains($offre)) {
            $this->offres->removeElement($offre);
            // set the owning side to null (unless already changed)
            if ($offre->getResponsable() === $this) {
                $offre->setResponsable(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Responsablesignaleretudiant[]
     */
    public function getResponsablesignaleretudiants(): Collection
    {
        return $this->responsablesignaleretudiants;
    }

    public function addResponsablesignaleretudiant(Responsablesignaleretudiant $responsablesignaleretudiant): self
    {
        if (!$this->responsablesignaleretudiants->contains($responsablesignaleretudiant)) {
            $this->responsablesignaleretudiants[] = $responsablesignaleretudiant;
            $responsablesignaleretudiant->setResponsable($this);
        }

        return $this;
    }

    public function removeResponsablesignaleretudiant(Responsablesignaleretudiant $responsablesignaleretudiant): self
    {
        if ($this->responsablesignaleretudiants->contains($responsablesignaleretudiant)) {
            $this->responsablesignaleretudiants->removeElement($responsablesignaleretudiant);
            // set the owning side to null (unless already changed)
            if ($responsablesignaleretudiant->getResponsable() === $this) {
                $responsablesignaleretudiant->setResponsable(null);
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
