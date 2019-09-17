<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Inscriptions
 *
 * @ORM\Table(name="inscriptions", indexes={@ORM\Index(name="FK_participants", columns={"participants_idParticipant"}), @ORM\Index(name="FK_sorties", columns={"sorties_idSortie"})})
 * @ORM\Entity
 */
class Inscriptions
{
    /**
     * @var int
     *
     * @ORM\Column(name="idInscriptions", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idinscriptions;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_inscription", type="datetime", nullable=false)
     */
    private $dateInscription;

    /**
     * @var \Participants
     *
     * @ORM\ManyToOne(targetEntity="Participants")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="participants_idParticipant", referencedColumnName="idParticipant")
     * })
     */
    private $participantsparticipant;

    /**
     * @var \Sorties
     *
     * @ORM\ManyToOne(targetEntity="Sorties")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sorties_idSortie", referencedColumnName="idSortie")
     * })
     */
    private $sortiessortie;


}
