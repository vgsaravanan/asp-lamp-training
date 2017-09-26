<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="User", indexes={@ORM\Index(name="email_id", columns={"email_id"}), @ORM\Index(name="email_id_2", columns={"email_id"}), @ORM\Index(name="email_id_3", columns={"email_id"}), @ORM\Index(name="contact_id", columns={"contact_id", "graduation_id", "interest_id"}), @ORM\Index(name="graduation_id", columns={"graduation_id"}), @ORM\Index(name="interest_id", columns={"interest_id"})})
 * @ORM\Entity
 */
class User
{
    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $userId;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=255, nullable=false)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=255, nullable=false)
     */
    private $lastName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_of_birth", type="date", nullable=false)
     */
    private $dateOfBirth;

    /**
     * @var string
     *
     * @ORM\Column(name="blood_group", type="string", length=6, nullable=false)
     */
    private $bloodGroup;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=6, nullable=false)
     */
    private $gender;

    /**
     * @var integer
     *
     * @ORM\Column(name="email_id", type="integer", nullable=false)
     */
    private $emailId;

    /**
     * @var integer
     *
     * @ORM\Column(name="contact_id", type="integer", nullable=false)
     */
    private $contactId;

    /**
     * @var integer
     *
     * @ORM\Column(name="graduation_id", type="integer", nullable=false)
     */
    private $graduationId;

    /**
     * @var integer
     *
     * @ORM\Column(name="interest_id", type="integer", nullable=false)
     */
    private $interestId;


}

