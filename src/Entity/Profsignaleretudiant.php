<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProfsignaleretudiantRepository")
 */
class Profsignaleretudiant
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
    private $commantaire;

    /**
     * @ORM\Column(type="integer")
     */
    private $positivenegative;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Etudiant", inversedBy="profsignaleretudiants")
     * @ORM\JoinColumn(nullable=false)
     */
    private $etudiant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $id_prof;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Prof", inversedBy="profsignaleretudiants")
     * @ORM\JoinColumn(nullable=false)
     */
    private $professeur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommantaire(): ?string
    {
        return $this->commantaire;
    }

    public function setCommantaire(string $commantaire): self
    {
        $this->commantaire = $commantaire;

        return $this;
    }

    public function getPositivenegative(): ?int
    {
        return $this->positivenegative;
    }

    public function setPositivenegative(int $positivenegative): self
    {
        $this->positivenegative = $positivenegative;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getEtudiant(): ?etudiant
    {
        return $this->etudiant;
    }

    public function setEtudiant(?etudiant $etudiant): self
    {
        $this->etudiant = $etudiant;

        return $this;
    }

    public function getIdProf(): ?string
    {
        return $this->id_prof;
    }

    public function setIdProf(string $id_prof): self
    {
        $this->id_prof = $id_prof;

        return $this;
    }

    public function getProfesseur(): ?prof
    {
        return $this->professeur;
    }

    public function setProfesseur(?prof $professeur): self
    {
        $this->professeur = $professeur;

        return $this;
    }
}
