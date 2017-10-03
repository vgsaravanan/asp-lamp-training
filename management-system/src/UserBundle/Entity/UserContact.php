<?php

namespace UserBundle\Entity;

/**
 * UserContact
 */
class UserContact
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $contactNumber;

    /**
     * @var \UserBundle\Entity\UserDetail
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
    public function setUser(\UserBundle\Entity\UserDetail $user = null)
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
