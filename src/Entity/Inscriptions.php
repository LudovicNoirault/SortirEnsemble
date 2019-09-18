<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Inscriptions
 *
 * @ORM\Table(name="inscriptions", indexes={@ORM\Index(name="FK_sorties", columns={"sorties_idSortie"}), @ORM\Index(name="FK_participants", columns={"participants_idParticipant"})})
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
     * @var int
     *
     * @ORM\Column(name="sorties_idSortie", type="integer", nullable=false)
     */
    private $sortiesIdsortie;

    /**
     * @var int
     *
     * @ORM\Column(name="participants_idParticipant", type="integer", nullable=false)
     */
    private $participantsIdparticipant;

    public function getIdinscriptions(): ?int
    {
        return $this->idinscriptions;
    }

    public function getDateInscription(): ?\DateTimeInterface
    {
        return $this->dateInscription;
    }

    public function setDateInscription(\DateTimeInterface $dateInscription): self
    {
        $this->dateInscription = $dateInscription;

        return $this;
    }

    public function getSortiesIdsortie(): ?int
    {
        return $this->sortiesIdsortie;
    }

    public function setSortiesIdsortie(int $sortiesIdsortie): self
    {
        $this->sortiesIdsortie = $sortiesIdsortie;

        return $this;
    }

    public function getParticipantsIdparticipant(): ?int
    {
        return $this->participantsIdparticipant;
    }

    public function setParticipantsIdparticipant(int $participantsIdparticipant): self
    {
        $this->participantsIdparticipant = $participantsIdparticipant;

        return $this;
    }


}
