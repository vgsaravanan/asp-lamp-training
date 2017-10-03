<?php

namespace UserBundle\Entity;

/**
 * UserEmail
 */
class UserEmail
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $emailId;

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
     * Set emailId
     *
     * @param string $emailId
     *
     * @return UserEmail
     */
    public function setEmailId($emailId)
    {
        $this->emailId = $emailId;

        return $this;
    }

    /**
     * Get emailId
     *
     * @return string
     */
    public function getEmailId()
    {
        return $this->emailId;
    }

    /**
     * Set user
     *
     * @param \UserBundle\Entity\UserDetail $user
     *
     * @return UserEmail
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
