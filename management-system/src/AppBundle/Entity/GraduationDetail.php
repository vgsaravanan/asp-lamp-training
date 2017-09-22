<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GraduationDetail
 *
 * @ORM\Table(name="Graduation_Detail", indexes={@ORM\Index(name="user_id", columns={"user_id"}), @ORM\Index(name="graduation_type", columns={"graduation_type"})})
 * @ORM\Entity
 */
class GraduationDetail
{
    /**
     * @var integer
     *
     * @ORM\Column(name="graduation_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $graduationId;

    /**
     * @var string
     *
     * @ORM\Column(name="graduation_type", type="string", length=255, nullable=false)
     */
    private $graduationType;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     */
    private $userId;


}

