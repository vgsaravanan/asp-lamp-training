<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VoiceMail
 *
 * @ORM\Table(name="Voice_Mail", uniqueConstraints={@ORM\UniqueConstraint(name="email", columns={"email"})}, indexes={@ORM\Index(name="user_id", columns={"user_id"}), @ORM\Index(name="user_id_2", columns={"user_id"}), @ORM\Index(name="user_id_3", columns={"user_id"}), @ORM\Index(name="user_id_4", columns={"user_id"}), @ORM\Index(name="user_id_5", columns={"user_id"})})
 * @ORM\Entity
 */
class VoiceMail
{
    /**
     * @var integer
     *
     * @ORM\Column(name="email_Id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $emailId;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     */
    private $userId;


}

