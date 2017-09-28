<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AreaOfInterest
 *
 * @ORM\Table(name="area_of_interest", uniqueConstraints={@ORM\UniqueConstraint(name="interest_UNIQUE", columns={"interest"})})
 * @ORM\Entity
 */
class AreaOfInterest
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
     * @ORM\Column(name="interest", type="string", length=255, nullable=true)
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
     * Set interest
     *
     * @param string $interest
     *
     * @return AreaOfInterest
     */
    public function setInterest($interest)
    {
        $this->interest = $interest;

        return $this;
    }

    /**
     * Get interest
     *
     * @return string
     */
    public function getInterest()
    {
        return $this->interest;
    }

    public function __toString()
    {
        return $this->getInterest();
    }
}
