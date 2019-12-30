<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
/**
 * @ORM\Entity(repositoryClass="App\Repository\CategorieoffreRepository")
 */
class Categorieoffre
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
     * @ORM\OneToMany(targetEntity="App\Entity\Offreentreprise", mappedBy="categorie")
     */
    private $offres;

    /**
     * @ORM\Column(type="string",length=255)
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="users", fileNameProperty="image")
     * @var File
     */
    private $imageFile;


    public function __construct()
    {
        $this->offres = new ArrayCollection();
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
            $offre->setCategorie($this);
        }

        return $this;
    }

    public function removeOffre(offreentreprise $offre): self
    {
        if ($this->offres->contains($offre)) {
            $this->offres->removeElement($offre);
            // set the owning side to null (unless already changed)
            if ($offre->getCategorie() === $this) {
                $offre->setCategorie(null);
            }
        }

        return $this;
    }


    public function getImage(): ?string 
    {
        return $this->image;
    }

    public function setImage (string $image): self
    {
        $this->image = $image;
        return $this;
    }

    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }
}
