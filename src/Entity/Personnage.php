<?php

namespace App\Entity;

use App\Repository\PersonnageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonnageRepository::class)]
class Personnage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $DateDeNaissance = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Description = null;

    #[ORM\Column]
    private ?int $Niveau = null;

    #[ORM\Column]
    private ?int $Experience = null;

    #[ORM\Column]
    private ?int $Vie = null;

    #[ORM\ManyToMany(targetEntity: Competence::class, inversedBy: 'personnages')]
    private Collection $PersonnageCompetence;

    #[ORM\ManyToOne(inversedBy: 'personnages')]
    private ?Type $PersonnageType = null;

    public function __construct()
    {
        $this->PersonnageCompetence = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getDateDeNaissance(): ?\DateTimeInterface
    {
        return $this->DateDeNaissance;
    }

    public function setDateDeNaissance(\DateTimeInterface $DateDeNaissance): self
    {
        $this->DateDeNaissance = $DateDeNaissance;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getNiveau(): ?int
    {
        return $this->Niveau;
    }

    public function setNiveau(int $Niveau): self
    {
        $this->Niveau = $Niveau;

        return $this;
    }

    public function getExperience(): ?int
    {
        return $this->Experience;
    }

    public function setExperience(int $Experience): self
    {
        $this->Experience = $Experience;

        return $this;
    }

    public function getVie(): ?int
    {
        return $this->Vie;
    }

    public function setVie(int $Vie): self
    {
        $this->Vie = $Vie;

        return $this;
    }

    /**
     * @return Collection<int, Competence>
     */
    public function getPersonnageCompetence(): Collection
    {
        return $this->PersonnageCompetence;
    }

    public function addPersonnageCompetence(Competence $personnageCompetence): self
    {
        if (!$this->PersonnageCompetence->contains($personnageCompetence)) {
            $this->PersonnageCompetence->add($personnageCompetence);
        }

        return $this;
    }

    public function removePersonnageCompetence(Competence $personnageCompetence): self
    {
        $this->PersonnageCompetence->removeElement($personnageCompetence);

        return $this;
    }

    public function getPersonnageType(): ?Type
    {
        return $this->PersonnageType;
    }

    public function setPersonnageType(?Type $PersonnageType): self
    {
        $this->PersonnageType = $PersonnageType;

        return $this;
    }
}
