<?php

namespace App\Entity;

use App\Repository\DonateurRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: DonateurRepository::class)]
#[UniqueEntity(fields: ['user'], message: 'Ce donateur est déjà associé à un utilisateur.')]
class Donateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    //ajout de contraintes pour valider le formulaire
    #[Assert\NotBlank(message: "champ obligatoire")]
    #[Assert\Length(max: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    //ajout de contraintes pour valider le formulaire
    #[Assert\NotBlank(message: "champ obligatoire")]
    #[Assert\Length(max: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $telephone = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column]
    private ?bool $TypeDeParrainage = null;

    #[ORM\Column]
    private ?bool $peutSeRendreEnInde = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $motivation = null;

    #[ORM\OneToOne(inversedBy: 'donateur', cascade: ['persist', 'remove'])]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function isTypeDeParrainage(): ?bool
    {
        return $this->TypeDeParrainage;
    }

    public function setTypeDeParrainage(bool $TypeDeParrainage): static
    {
        $this->TypeDeParrainage = $TypeDeParrainage;

        return $this;
    }

    public function isPeutSeRendreEnInde(): ?bool
    {
        return $this->peutSeRendreEnInde;
    }

    public function setPeutSeRendreEnInde(bool $peutSeRendreEnInde): static
    {
        $this->peutSeRendreEnInde = $peutSeRendreEnInde;

        return $this;
    }

    public function getMotivation(): ?string
    {
        return $this->motivation;
    }

    public function setMotivation(?string $motivation): static
    {
        $this->motivation = $motivation;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): static
    {
        // set the owning side of the relation if necessary
        if ($user->getDonateur() !== $this) {
            $user->setDonateur($this);
        }

        $this->user = $user;

        return $this;
    }
}
