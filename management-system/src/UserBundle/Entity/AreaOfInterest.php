<?php

namespace UserBundle\Entity;

/**
 * AreaOfInterest
 */
class AreaOfInterest
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
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
