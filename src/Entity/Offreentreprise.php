<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OffreentrepriseRepository")
 */
class Offreentreprise
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
    private $titre;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Responsableentreprise", inversedBy="offres")
     * @ORM\JoinColumn(nullable=false)
     */
    private $responsable;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categorieoffre", inversedBy="offres")
     */
    private $categorie;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Postuler", mappedBy="offre", orphanRemoval=true)
     */
    private $postulers;



    public function __construct()
    {
        $this->postulers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getResponsable(): ?Responsableentreprise
    {
        return $this->responsable;
    }

    public function setResponsable(?Responsableentreprise $responsable): self
    {
        $this->responsable = $responsable;

        return $this;
    }

    public function getCategorie(): ?Categorieoffre
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorieoffre $categorie): self
    {
        $this->categorie = $categorie;

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
            $postuler->setOffre($this);
        }

        return $this;
    }

    public function removePostuler(Postuler $postuler): self
    {
        if ($this->postulers->contains($postuler)) {
            $this->postulers->removeElement($postuler);
            // set the owning side to null (unless already changed)
            if ($postuler->getOffre() === $this) {
                $postuler->setOffre(null);
            }
        }

        return $this;
    }




}
