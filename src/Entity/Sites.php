<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Sites
 *
 * @ORM\Table(name="sites", indexes={@ORM\Index(name="FK_lieux2", columns={"lieux_idLieu"})})
 * @ORM\Entity
 */
class Sites
{
    /**
     * @var int
     *
     * @ORM\Column(name="idSite", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSite;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_site", type="string", length=30, nullable=false)
     */
    private $nomSite;

    /**
     * @var \Lieux
     *
     * @ORM\ManyToOne(targetEntity="Lieux")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="lieux_idLieu", referencedColumnName="idLieu")
     * })
     */
    private $lieuxlieu;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Participants", mappedBy="siteAffiliation")
     */
    private $utilisateursSite;

    public function __construct()
    {
        $this->utilisateursSite = new ArrayCollection();
    }

    public function getNomSite(): ?string
    {
        return $this->nomSite;
    }

    public function setNomSite(string $nomSite): self
    {
        $this->nomSite = $nomSite;

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

    /**
     * @return Collection|Participants[]
     */
    public function getUtilisateursSite(): Collection
    {
        return $this->utilisateursSite;
    }

    public function addUtilisateursSite(Participants $utilisateursSite): self
    {
        if (!$this->utilisateursSite->contains($utilisateursSite)) {
            $this->utilisateursSite[] = $utilisateursSite;
            $utilisateursSite->setSiteAffiliation($this);
        }

        return $this;
    }

    public function removeUtilisateursSite(Participants $utilisateursSite): self
    {
        if ($this->utilisateursSite->contains($utilisateursSite)) {
            $this->utilisateursSite->removeElement($utilisateursSite);
            // set the owning side to null (unless already changed)
            if ($utilisateursSite->getSiteAffiliation() === $this) {
                $utilisateursSite->setSiteAffiliation(null);
            }
        }

        return $this;
    }

    public function getIdSite(): ?int
    {
        return $this->idSite;
    }
}
