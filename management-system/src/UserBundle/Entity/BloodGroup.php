<?php

namespace UserBundle\Entity;

/**
 * BloodGroup
 */
class BloodGroup
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $bloodGroupType;


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
     * Set bloodGroupType
     *
     * @param string $bloodGroupType
     *
     * @return BloodGroup
     */
    public function setBloodGroupType($bloodGroupType)
    {
        $this->bloodGroupType = $bloodGroupType;

        return $this;
    }

    /**
     * Get bloodGroupType
     *
     * @return string
     */
    public function getBloodGroupType()
    {
        return $this->bloodGroupType;
    }

    public function __toString()
    {
        return $this->getBloodGroupType();
    }

}
