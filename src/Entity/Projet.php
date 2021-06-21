<?php

namespace App\Entity;

use App\Repository\ProjetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProjetRepository::class)
 */
class Projet
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Nom;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Description;

    /**
     * @ORM\Column(type="date")
     */
    private $dateCrea;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateRappel;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateFinPrev;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateFinReele;



    /**
     * @ORM\ManyToMany(targetEntity=Participant::class, mappedBy="projets")
     */
    private $participants;

    /**
     * @ORM\ManyToOne(targetEntity=TypeProjet::class, inversedBy="projets")
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity=EtatProjet::class, inversedBy="projets")
     */
    private $etatProjet;

    public function __construct()
    {
        $this->participants = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getDateCrea(): ?\DateTimeInterface
    {
        return $this->dateCrea;
    }

    public function setDateCrea(\DateTimeInterface $dateCrea): self
    {
        $this->dateCrea = $dateCrea;

        return $this;
    }

    public function getDateRappel(): ?\DateTimeInterface
    {
        return $this->dateRappel;
    }

    public function setDateRappel(?\DateTimeInterface $dateRappel): self
    {
        $this->dateRappel = $dateRappel;

        return $this;
    }

    public function getDateFinPrev(): ?\DateTimeInterface
    {
        return $this->dateFinPrev;
    }

    public function setDateFinPrev(?\DateTimeInterface $dateFinPrev): self
    {
        $this->dateFinPrev = $dateFinPrev;

        return $this;
    }

    public function getDateFinReele(): ?\DateTimeInterface
    {
        return $this->dateFinReele;
    }

    public function setDateFinReele(?\DateTimeInterface $dateFinReele): self
    {
        $this->dateFinReele = $dateFinReele;

        return $this;
    }



    /**
     * @return Collection|Participant[]
     */
    public function getParticipants(): Collection
    {
        return $this->participants;
    }

    public function addParticipant(participant $participant): self
    {
        if (!$this->participants->contains($participant)) {
            $this->participants[] = $participant;
            $participant->addProjet($this);
        }

        return $this;
    }

    public function removeParticipant(participant $participant): self
    {
        if ($this->participants->removeElement($participant)) {
            $participant->removeProjet($this);
        }

        return $this;
    }

    public function getType(): ?TypeProjet
    {
        return $this->type;
    }

    public function setType(?TypeProjet $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getEtatProjet(): ?EtatProjet
    {
        return $this->etatProjet;
    }

    public function setEtatProjet(?EtatProjet $etatProjet): self
    {
        $this->etatProjet = $etatProjet;

        return $this;
    }
}
