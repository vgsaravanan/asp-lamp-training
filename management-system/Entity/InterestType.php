<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InterestType
 *
 * @ORM\Table(name="interest_type", indexes={@ORM\Index(name="fk_interest_type_id_idx", columns={"interest_id"}), @ORM\Index(name="fk_user_interest_id_idx", columns={"user_id"})})
 * @ORM\Entity
 */
class InterestType
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
     * @var \UserDetail
     *
     * @ORM\ManyToOne(targetEntity="UserDetail")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var \AreaOfInterest
     *
     * @ORM\ManyToOne(targetEntity="AreaOfInterest")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="interest_id", referencedColumnName="id")
     * })
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
