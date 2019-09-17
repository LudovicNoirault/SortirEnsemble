<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Etats
 *
 * @ORM\Table(name="ETATS")
 * @ORM\Entity
 */
class Etats
{
    /**
     * @var int
     *
     * @ORM\Column(name="idEtat", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idetat;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=30, nullable=false)
     */
    private $libelle;


}