<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EtudiantRepository")
 */
class Etudiant
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $description_Profil_cv;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Formation", mappedBy="etudiant", orphanRemoval=true)
     */
    private $formations;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Experianceprofessionnelle", mappedBy="etudiant", orphanRemoval=true)
     */
    private $experiances;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Competence", mappedBy="etudiant", orphanRemoval=true)
     */
    private $competences;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Langue", mappedBy="etudiant", orphanRemoval=true)
     */
    private $langues;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Projet", mappedBy="etudiant", orphanRemoval=true)
     */
    private $projet;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Profsignaleretudiant", mappedBy="etudiant", orphanRemoval=true)
     */
    private $profsignaleretudiants;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Responsablesignaleretudiant", mappedBy="etudiant", orphanRemoval=true)
     */
    private $responsablesignaleretudiants;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Postuler", mappedBy="etudiant")
     */
    private $postulers;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $id_user;

    public function __construct()
    {
        $this->formations = new ArrayCollection();
        $this->experiances = new ArrayCollection();
        $this->competences = new ArrayCollection();
        $this->langues = new ArrayCollection();
        $this->projet = new ArrayCollection();
        $this->profsignaleretudiants = new ArrayCollection();
        $this->responsablesignaleretudiants = new ArrayCollection();
        $this->postulers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescriptionProfilCv(): ?string
    {
        return $this->description_Profil_cv;
    }

    public function setDescriptionProfilCv(string $description_Profil_cv): self
    {
        $this->description_Profil_cv = $description_Profil_cv;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
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
     * @return Collection|formation[]
     */
    public function getFormations(): Collection
    {
        return $this->formations;
    }

    public function addFormation(formation $formation): self
    {
        if (!$this->formations->contains($formation)) {
            $this->formations[] = $formation;
            $formation->setEtudiant($this);
        }

        return $this;
    }

    public function removeFormation(formation $formation): self
    {
        if ($this->formations->contains($formation)) {
            $this->formations->removeElement($formation);
            // set the owning side to null (unless already changed)
            if ($formation->getEtudiant() === $this) {
                $formation->setEtudiant(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|experianceprofessionnelle[]
     */
    public function getExperiances(): Collection
    {
        return $this->experiances;
    }

    public function addExperiance(experianceprofessionnelle $experiance): self
    {
        if (!$this->experiances->contains($experiance)) {
            $this->experiances[] = $experiance;
            $experiance->setEtudiant($this);
        }

        return $this;
    }

    public function removeExperiance(experianceprofessionnelle $experiance): self
    {
        if ($this->experiances->contains($experiance)) {
            $this->experiances->removeElement($experiance);
            // set the owning side to null (unless already changed)
            if ($experiance->getEtudiant() === $this) {
                $experiance->setEtudiant(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|competence[]
     */
    public function getCompetences(): Collection
    {
        return $this->competences;
    }

    public function addCompetence(competence $competence): self
    {
        if (!$this->competences->contains($competence)) {
            $this->competences[] = $competence;
            $competence->setEtudiant($this);
        }

        return $this;
    }

    public function removeCompetence(competence $competence): self
    {
        if ($this->competences->contains($competence)) {
            $this->competences->removeElement($competence);
            // set the owning side to null (unless already changed)
            if ($competence->getEtudiant() === $this) {
                $competence->setEtudiant(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|langue[]
     */
    public function getLangues(): Collection
    {
        return $this->langues;
    }

    public function addLangue(langue $langue): self
    {
        if (!$this->langues->contains($langue)) {
            $this->langues[] = $langue;
            $langue->setEtudiant($this);
        }

        return $this;
    }

    public function removeLangue(langue $langue): self
    {
        if ($this->langues->contains($langue)) {
            $this->langues->removeElement($langue);
            // set the owning side to null (unless already changed)
            if ($langue->getEtudiant() === $this) {
                $langue->setEtudiant(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|projet[]
     */
    public function getProjet(): Collection
    {
        return $this->projet;
    }

    public function addProjet(projet $projet): self
    {
        if (!$this->projet->contains($projet)) {
            $this->projet[] = $projet;
            $projet->setEtudiant($this);
        }

        return $this;
    }

    public function removeProjet(projet $projet): self
    {
        if ($this->projet->contains($projet)) {
            $this->projet->removeElement($projet);
            // set the owning side to null (unless already changed)
            if ($projet->getEtudiant() === $this) {
                $projet->setEtudiant(null);
            }
        }

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
            $profsignaleretudiant->setEtudiant($this);
        }

        return $this;
    }

    public function removeProfsignaleretudiant(Profsignaleretudiant $profsignaleretudiant): self
    {
        if ($this->profsignaleretudiants->contains($profsignaleretudiant)) {
            $this->profsignaleretudiants->removeElement($profsignaleretudiant);
            // set the owning side to null (unless already changed)
            if ($profsignaleretudiant->getEtudiant() === $this) {
                $profsignaleretudiant->setEtudiant(null);
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
            $responsablesignaleretudiant->setEtudiant($this);
        }

        return $this;
    }

    public function removeResponsablesignaleretudiant(Responsablesignaleretudiant $responsablesignaleretudiant): self
    {
        if ($this->responsablesignaleretudiants->contains($responsablesignaleretudiant)) {
            $this->responsablesignaleretudiants->removeElement($responsablesignaleretudiant);
            // set the owning side to null (unless already changed)
            if ($responsablesignaleretudiant->getEtudiant() === $this) {
                $responsablesignaleretudiant->setEtudiant(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Postuler[]
     */
    public function getPostulers(): Collection
    {
        return $this->postulers;
    }

    public function addPostuler(Postuler $postuler): self
    {
        if (!$this->postulers->contains($postuler)) {
            $this->postulers[] = $postuler;
            $postuler->setEtudiant($this);
        }

        return $this;
    }

    public function removePostuler(Postuler $postuler): self
    {
        if ($this->postulers->contains($postuler)) {
            $this->postulers->removeElement($postuler);
            // set the owning side to null (unless already changed)
            if ($postuler->getEtudiant() === $this) {
                $postuler->setEtudiant(null);
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
