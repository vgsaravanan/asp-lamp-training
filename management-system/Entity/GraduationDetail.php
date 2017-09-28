<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GraduationDetail
 *
 * @ORM\Table(name="graduation_detail", indexes={@ORM\Index(name="fk_graduation_id_idx", columns={"graduation_id"}), @ORM\Index(name="fk_user_graduation_Id_idx", columns={"user_id"})})
 * @ORM\Entity
 */
class GraduationDetail
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
     * @var \GraduationType
     *
     * @ORM\ManyToOne(targetEntity="GraduationType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="graduation_id", referencedColumnName="id")
     * })
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
     * @return GraduationDetail
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
}
