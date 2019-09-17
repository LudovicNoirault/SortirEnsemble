<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sites
 *
 * @ORM\Table(name="SITES")
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
    private $idsite;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_site", type="string", length=30, nullable=false)
     */
    private $nomSite;


}
