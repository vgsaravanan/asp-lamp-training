<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BloodGroup
 *
 * @ORM\Table(name="blood_group", uniqueConstraints={@ORM\UniqueConstraint(name="blood_group_type_UNIQUE", columns={"blood_group_type"})})
 * @ORM\Entity
 */
class BloodGroup
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
     * @var string
     *
     * @ORM\Column(name="blood_group_type", type="string", length=255, nullable=true)
     */
    private $bloodGroupType;

    public function __toString()
    {
        return $this->getBloodGroupType();
    }

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
}
