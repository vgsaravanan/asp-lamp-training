<?php

namespace UserBundle\Entity;

/**
 * InterestType
 */
class InterestType
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \UserBundle\Entity\AreaOfInterest
     */
    private $interest;

    /**
     * @var \UserBundle\Entity\User
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
     * Set interest
     *
     * @param \UserBundle\Entity\AreaOfInterest $interest
     *
     * @return InterestType
     */
    public function setInterest(\UserBundle\Entity\AreaOfInterest $interest = null)
    {
        $this->interest = $interest;

        return $this;
    }

    /**
     * Get interest
     *
     * @return \UserBundle\Entity\AreaOfInterest
     */
    public function getInterest()
    {
        return $this->interest;
    }

    /**
     * Set user
     *
     * @param \UserBundle\Entity\User $user
     *
     * @return InterestType
     */
    public function setUser(\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
