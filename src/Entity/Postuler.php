<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PostulerRepository")
 */
class Postuler
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Etudiant", inversedBy="postulers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $etudiant;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Offreentreprise", inversedBy="postulers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $offre;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getOffre(): ?offreentreprise
    {
        return $this->offre;
    }

    public function setOffre(?offreentreprise $offre): self
    {
        $this->offre = $offre;

        return $this;
    }
}
