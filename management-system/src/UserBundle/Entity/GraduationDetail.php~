<?php

namespace UserBundle\Entity;

/**
 * GraduationDetail
 */
class GraduationDetail
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \UserBundle\Entity\GraduationType
     */
    private $graduation;

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
     * Set graduation
     *
     * @param \UserBundle\Entity\GraduationType $graduation
     *
     * @return GraduationDetail
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

    /**
     * Set user
     *
     * @param \UserBundle\Entity\User $user
     *
     * @return GraduationDetail
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
