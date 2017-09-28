<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserContact
 *
 * @ORM\Table(name="user_contact", uniqueConstraints={@ORM\UniqueConstraint(name="contact_number_UNIQUE", columns={"contact_number"})}, indexes={@ORM\Index(name="fk_user_contact_id_idx", columns={"user_id"})})
 * @ORM\Entity
 */
class UserContact
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="contact_number", type="bigint", nullable=false)
     */
    private $contactNumber;

    /**
     * @var \UserDetail
     *
     * @ORM\ManyToOne(targetEntity="UserDetail")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set contactNumber
     *
     * @param integer $contactNumber
     *
     * @return UserContact
     */
    public function setContactNumber($contactNumber)
    {
        $this->contactNumber = $contactNumber;

        return $this;
    }

    /**
     * Get contactNumber
     *
     * @return integer
     */
    public function getContactNumber()
    {
        return $this->contactNumber;
    }

    /**
     * Set user
     *
     * @param \UserBundle\Entity\UserDetail $user
     *
     * @return UserContact
     */
    public function setUser(\UserBundle\Entity\UserDetail $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \UserBundle\Entity\UserDetail
     */
    public function getUser()
    {
        return $this->user;
    }
}
