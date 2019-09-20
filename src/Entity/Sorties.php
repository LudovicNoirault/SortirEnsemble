<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sorties
 *
 * @ORM\Table(name="sorties", indexes={@ORM\Index(name="FK_lieux", columns={"lieux_idLieu"}), @ORM\Index(name="FK_participant", columns={"organisateur"}), @ORM\Index(name="FK_etats", columns={"etats_idEtat"})})
 * @ORM\Entity
 */
class Sorties
{
    /**
     * @var int
     *
     * @ORM\Column(name="idSortie", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idsortie;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=30, nullable=false)
     */
    private $nom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datedebut", type="datetime", nullable=false)
     */
    private $datedebut;

    /**
     * @var int|null
     *
     * @ORM\Column(name="duree", type="integer", nullable=true)
     */
    private $duree;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $timeScale;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datecloture", type="datetime", nullable=false)
     */
    private $datecloture;

    /**
     * @var int
     *
     * @ORM\Column(name="nbinscriptionsmax", type="integer", nullable=false)
     */
    private $nbinscriptionsmax;

    /**
     * @var string|null
     *
     * @ORM\Column(name="descriptioninfos", type="string", length=500, nullable=true)
     */
    private $descriptioninfos;

    /**
     * @var \Participants
     *
     * @ORM\OneToOne(targetEntity="Participants")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="organisateur", referencedColumnName="idParticipant")
     * })
     */
    private $organisateur;

    /**
     * @var \Etats
     *
     * @ORM\ManyToOne(targetEntity="Etats")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="etats_idEtat", referencedColumnName="idEtat")
     * })
     */
    private $etatsetat;

    /**
     * @var \Lieux
     *
     * @ORM\ManyToOne(targetEntity="Lieux")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="lieux_idLieu", referencedColumnName="idLieu")
     * })
     */
    private $lieuxlieu;

    public function getIdsortie(): ?int
    {
        return $this->idsortie;
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

    public function getDatedebut(): ?\DateTimeInterface
    {
        return $this->datedebut;
    }

    public function setDatedebut(\DateTimeInterface $datedebut): self
    {
        $this->datedebut = $datedebut;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(?int $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getDatecloture(): ?\DateTimeInterface
    {
        return $this->datecloture;
    }

    public function setDatecloture(\DateTimeInterface $datecloture): self
    {
        $this->datecloture = $datecloture;

        return $this;
    }

    public function getNbinscriptionsmax(): ?int
    {
        return $this->nbinscriptionsmax;
    }

    public function setNbinscriptionsmax(int $nbinscriptionsmax): self
    {
        $this->nbinscriptionsmax = $nbinscriptionsmax;

        return $this;
    }

    public function getDescriptioninfos(): ?string
    {
        return $this->descriptioninfos;
    }

    public function setDescriptioninfos(?string $descriptioninfos): self
    {
        $this->descriptioninfos = $descriptioninfos;

        return $this;
    }

    public function getUrlphoto(): ?string
    {
        return $this->urlphoto;
    }

    public function setUrlphoto(?string $urlphoto): self
    {
        $this->urlphoto = $urlphoto;

        return $this;
    }

    public function getOrganisateur(): ?Participants
    {
        return $this->organisateur;
    }

    public function setOrganisateur(?Participants $organisateur): self
    {
        $this->organisateur = $organisateur;

        return $this;
    }

    public function getEtatsetat(): ?Etats
    {
        return $this->etatsetat;
    }

    public function setEtatsetat(?Etats $etatsetat): self
    {
        $this->etatsetat = $etatsetat;

        return $this;
    }

    public function getLieuxlieu(): ?Lieux
    {
        return $this->lieuxlieu;
    }

    public function setLieuxlieu(?Lieux $lieuxlieu): self
    {
        $this->lieuxlieu = $lieuxlieu;

        return $this;
    }

    public function getTimeScale(): ?string
    {
        return $this->timeScale;
    }

    public function setTimeScale(string $timeScale): self
    {
        $this->timeScale = $timeScale;

        return $this;
    }


}
