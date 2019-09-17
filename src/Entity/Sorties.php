<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sorties
 *
 * @ORM\Table(name="sorties", indexes={@ORM\Index(name="FK_lieux", columns={"lieux_idLieu"}), @ORM\Index(name="sorties_participants_fk", columns={"organisateur"}), @ORM\Index(name="FK_etats", columns={"etats_idEtat"})})
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
     * @var int|null
     *
     * @ORM\Column(name="etatsortie", type="integer", nullable=true)
     */
    private $etatsortie;

    /**
     * @var string|null
     *
     * @ORM\Column(name="urlPhoto", type="string", length=250, nullable=true)
     */
    private $urlphoto;

    /**
     * @var int
     *
     * @ORM\Column(name="organisateur", type="integer", nullable=false)
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


}
