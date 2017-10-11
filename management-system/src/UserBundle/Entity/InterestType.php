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
     * @var \UserBundle\Entity\UserDetail
     */
    private $user;

    /**
     * @var \UserBundle\Entity\AreaOfInterest
     */
    private $interest;


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
     * Set user
     *
     * @param \UserBundle\Entity\UserDetail $user
     *
     * @return InterestType
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
}
