<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AreaOfIntereset
 *
 * @ORM\Table(name="Area_Of_Intereset", indexes={@ORM\Index(name="user_id", columns={"user_id"})})
 * @ORM\Entity
 */
class AreaOfIntereset
{
    /**
     * @var integer
     *
     * @ORM\Column(name="interest_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $interestId;

    /**
     * @var integer
     *
     * @ORM\Column(name="interest", type="integer", nullable=false)
     */
    private $interest;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     */
    private $userId;


}

