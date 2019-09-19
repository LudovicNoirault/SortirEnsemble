<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

use FOS\UserBundle\Model\User as BaseUser;

/**
 * Participants
 *
 * @ORM\Table(name="participants", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_71697092A0D96FBF", columns={"email_canonical"}), @ORM\UniqueConstraint(name="UNIQ_7169709292FC23A8", columns={"username_canonical"}), @ORM\UniqueConstraint(name="UNIQ_71697092C05FB297", columns={"confirmation_token"})})
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
    private $idParticipant;

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
     * @ORM\ManyToOne(targetEntity="App\Entity\Sites", inversedBy="utilisateursSite")
     * @ORM\JoinColumn(name="id_site", referencedColumnName="idSite")
     */
    private $siteAffiliation;

    public function __construct()
    {
        parent::__construct();
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

    public function getSiteAffiliation(): ?Sites
    {
        return $this->siteAffiliation;
    }

    public function setSiteAffiliation(?Sites $siteAffiliation): self
    {
        $this->siteAffiliation = $siteAffiliation;

        return $this;
    }
}
