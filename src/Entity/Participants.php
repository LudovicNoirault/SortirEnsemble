<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Participants
 *
 * @ORM\Table(name="PARTICIPANTS", uniqueConstraints={@ORM\UniqueConstraint(name="participants_pseudo_uk", columns={"pseudo"})})
 * @ORM\Entity
 */
class Participants
{
    /**
     * @var int
     *
     * @ORM\Column(name="idParticipant", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idparticipant;

    /**
     * @var string
     *
     * @ORM\Column(name="pseudo", type="string", length=30, nullable=false)
     */
    private $pseudo;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=30, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=30, nullable=false)
     */
    private $prenom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="telephone", type="string", length=15, nullable=true)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=20, nullable=false)
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="mot_de_passe", type="string", length=20, nullable=false)
     */
    private $motDePasse;

    /**
     * @var bool
     *
     * @ORM\Column(name="administrateur", type="boolean", nullable=false)
     */
    private $administrateur;

    /**
     * @var bool
     *
     * @ORM\Column(name="actif", type="boolean", nullable=false)
     */
    private $actif;

    /**
     * @var int
     *
     * @ORM\Column(name="sites_idSite", type="integer", nullable=false)
     */
    private $sitesIdsite;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Sorties", mappedBy="participantsparticipant")
     */
    private $sortiessortie;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->sortiessortie = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdparticipant(): ?int
    {
        return $this->idparticipant;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

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

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getMotDePasse(): ?string
    {
        return $this->motDePasse;
    }

    public function setMotDePasse(string $motDePasse): self
    {
        $this->motDePasse = $motDePasse;

        return $this;
    }

    public function getAdministrateur(): ?bool
    {
        return $this->administrateur;
    }

    public function setAdministrateur(bool $administrateur): self
    {
        $this->administrateur = $administrateur;

        return $this;
    }

    public function getActif(): ?bool
    {
        return $this->actif;
    }

    public function setActif(bool $actif): self
    {
        $this->actif = $actif;

        return $this;
    }

    public function getSitesIdsite(): ?int
    {
        return $this->sitesIdsite;
    }

    public function setSitesIdsite(int $sitesIdsite): self
    {
        $this->sitesIdsite = $sitesIdsite;

        return $this;
    }

    /**
     * @return Collection|Sorties[]
     */
    public function getSortiessortie(): Collection
    {
        return $this->sortiessortie;
    }

    public function addSortiessortie(Sorties $sortiessortie): self
    {
        if (!$this->sortiessortie->contains($sortiessortie)) {
            $this->sortiessortie[] = $sortiessortie;
            $sortiessortie->addParticipantsparticipant($this);
        }

        return $this;
    }

    public function removeSortiessortie(Sorties $sortiessortie): self
    {
        if ($this->sortiessortie->contains($sortiessortie)) {
            $this->sortiessortie->removeElement($sortiessortie);
            $sortiessortie->removeParticipantsparticipant($this);
        }

        return $this;
    }

}
