<?php

namespace UserBundle\Entity;

/**
 * GraduationType
 */
class GraduationType
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $type;


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
     * Set type
     *
     * @param string $type
     *
     * @return GraduationType
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
    public function __toString()
    {
        return $this->getType();
    }
}
