<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @Vich\Uploadable
 */
class User  implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $username;

    /**
     * @ORM\Column(type="array")
     */
    private $roles;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_Naissance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse_Email;

    /**
     * @ORM\Column(type="array")
     */
    private $role = [];

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cin;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Telephone", mappedBy="user", orphanRemoval=true)
     */
    private $teles;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(max=4096)
     */
    private $plainPassword;



    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $activer = "0";

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
        $this->teles = new ArrayCollection();
        $this->roles = array('ROLE_ADMIN');
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getSalt()
    {
    return null;
    }

    public function getRoles()
    {
        return $this->roles;
    }

    public function eraseCredentials()
    {
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
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

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->date_Naissance;
    }

    public function setDateNaissance(\DateTimeInterface $date_Naissance): self
    {
        $this->date_Naissance = $date_Naissance;

        return $this;
    }

    public function getAdresseEmail(): ?string
    {
        return $this->adresse_Email;
    }

    public function setAdresseEmail(string $adresse_Email): self
    {
        $this->adresse_Email = $adresse_Email;

        return $this;
    }

    public function getRole(): ?array
    {
        return $this->role;
    }

    public function setRole(array $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getCin(): ?string
    {
        return $this->cin;
    }

    public function setCin(string $cin): self
    {
        $this->cin = $cin;

        return $this;
    }

    /**
     * @return Collection|telephone[]
     */
    public function getTeles(): Collection
    {
        return $this->teles;
    }

    public function addTele(telephone $tele): self
    {
        if (!$this->teles->contains($tele)) {
            $this->teles[] = $tele;
            $tele->setUser($this);
        }

        return $this;
    }

    public function removeTele(telephone $tele): self
    {
        if ($this->teles->contains($tele)) {
            $this->teles->removeElement($tele);
            // set the owning side to null (unless already changed)
            if ($tele->getUser() === $this) {
                $tele->setUser(null);
            }
        }

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    public function setPlainPassword($password)
    {
        $this->plainPassword = $password;
    }

    public function getActiver(): ?string
    {
        return $this->activer;
    }

    public function setActiver(string $activer): self
    {
        $this->activer = $activer;

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
