<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ResponsablesignaleretudiantRepository")
 */
class Responsablesignaleretudiant
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Etudiant", inversedBy="responsablesignaleretudiants")
     * @ORM\JoinColumn(nullable=false)
     */
    private $etudiant;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="integer")
     */
    private $responsable_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Responsableentreprise", inversedBy="responsablesignaleretudiants")
     * @ORM\JoinColumn(nullable=false)
     */
    private $responsable;

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

    public function getEtudiant(): ?etudiant
    {
        return $this->etudiant;
    }

    public function setEtudiant(?etudiant $etudiant): self
    {
        $this->etudiant = $etudiant;

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

    public function getResponsableId(): ?int
    {
        return $this->responsable_id;
    }

    public function setResponsableId(int $responsable_id): self
    {
        $this->responsable_id = $responsable_id;

        return $this;
    }

    public function getResponsable(): ?responsableentreprise
    {
        return $this->responsable;
    }

    public function setResponsable(?responsableentreprise $responsable): self
    {
        $this->responsable = $responsable;

        return $this;
    }
}
