<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lieux
 *
 * @ORM\Table(name="LIEUX", indexes={@ORM\Index(name="lieux_villes_fk", columns={"villes_idVille"})})
 * @ORM\Entity
 */
class Lieux
{
    /**
     * @var int
     *
     * @ORM\Column(name="idLieu", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idlieu;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_lieu", type="string", length=30, nullable=false)
     */
    private $nomLieu;

    /**
     * @var string|null
     *
     * @ORM\Column(name="rue", type="string", length=30, nullable=true)
     */
    private $rue;

    /**
     * @var float|null
     *
     * @ORM\Column(name="latitude", type="float", precision=10, scale=0, nullable=true)
     */
    private $latitude;

    /**
     * @var float|null
     *
     * @ORM\Column(name="longitude", type="float", precision=10, scale=0, nullable=true)
     */
    private $longitude;

    /**
     * @var \Villes
     *
     * @ORM\ManyToOne(targetEntity="Villes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="villes_idVille", referencedColumnName="idVille")
     * })
     */
    private $villesville;

    public function getIdlieu(): ?int
    {
        return $this->idlieu;
    }

    public function getNomLieu(): ?string
    {
        return $this->nomLieu;
    }

    public function setNomLieu(string $nomLieu): self
    {
        $this->nomLieu = $nomLieu;

        return $this;
    }

    public function getRue(): ?string
    {
        return $this->rue;
    }

    public function setRue(?string $rue): self
    {
        $this->rue = $rue;

        return $this;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLatitude(?float $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function setLongitude(?float $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getVillesville(): ?Villes
    {
        return $this->villesville;
    }

    public function setVillesville(?Villes $villesville): self
    {
        $this->villesville = $villesville;

        return $this;
    }


}
