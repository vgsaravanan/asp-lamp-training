<?php

namespace UserBundle\Entity;

/**
 * UserGraduation
 */
class UserGraduation
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
     * @var \UserBundle\Entity\GraduationType
     */
    private $graduation;


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
     * @return UserGraduation
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
     * Set graduation
     *
     * @param \UserBundle\Entity\GraduationType $graduation
     *
     * @return UserGraduation
     */
    public function setGraduation(\UserBundle\Entity\GraduationType $graduation = null)
    {
        $this->graduation = $graduation;

        return $this;
    }

    /**
     * Get graduation
     *
     * @return \UserBundle\Entity\GraduationType
     */
    public function getGraduation()
    {
        return $this->graduation;
    }
}
