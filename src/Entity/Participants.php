<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * Participants
 *
 * @ORM\Table(name="participants", indexes={@ORM\Index(name="FK_sites", columns={"sites_idSite"})})
 * @ORM\Entity
 */
class Participants extends BaseUser
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
     * @var bool
     *
     * @ORM\Column(name="actif", type="boolean", nullable=false)
     */
    private $actif;

    /**
     * @var \Sites
     *
     * @ORM\ManyToOne(targetEntity="Sites")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sites_idSite", referencedColumnName="idSite")
     * })
     */
    private $sitessite;


    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    public function getIdparticipant(): ?int
    {
        return $this->idparticipant;
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

    public function getActif(): ?bool
    {
        return $this->actif;
    }

    public function setActif(bool $actif): self
    {
        $this->actif = $actif;

        return $this;
    }

    public function getSitessite(): ?Sites
    {
        return $this->sitessite;
    }

    public function setSitessite(?Sites $sitessite): self
    {
        $this->sitessite = $sitessite;

        return $this;
    }



}
