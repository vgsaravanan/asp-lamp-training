<?php

namespace UserBundle\Entity;

/**
 * UserDetail
 */
class UserDetail
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var \DateTime
     */
    private $dateOfBirth;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $emailId;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $contactNumber;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $interest;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $graduationType;

    /**
     * @var \UserBundle\Entity\Gender
     */
    private $gender;

    /**
     * @var \UserBundle\Entity\BloodGroup
     */
    private $bloodGroup;
    private $image;

    public function getImage()
    {
        /*dump($this->image);*/
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image=$image;
        // dump($this->image);
        // die();
        return $this;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->emailId = new \Doctrine\Common\Collections\ArrayCollection();
        $this->contactNumber = new \Doctrine\Common\Collections\ArrayCollection();
        $this->interest = new \Doctrine\Common\Collections\ArrayCollection();
        $this->graduationType = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set firstName
     *
     * @param string $firstName
     *
     * @return UserDetail
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return UserDetail
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set dateOfBirth
     *
     * @param \DateTime $dateOfBirth
     *
     * @return UserDetail
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    /**
     * Get dateOfBirth
     *
     * @return \DateTime
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * Add emailId
     *
     * @param \UserBundle\Entity\UserEmail $emailId
     *
     * @return UserDetail
     */
    public function addEmailId(\UserBundle\Entity\UserEmail $emailId)
    {
        $this->emailId[] = $emailId;
        $emailId->setUser($this);
        return $this;
    }

    /**
     * Remove emailId
     *
     * @param \UserBundle\Entity\UserEmail $emailId
     */
    public function removeEmailId(\UserBundle\Entity\UserEmail $emailId)
    {
        $this->emailId->removeElement($emailId);
    }

    /**
     * Get emailId
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEmailId()
    {
        return $this->emailId;
    }

    /**
     * Add contactNumber
     *
     * @param \UserBundle\Entity\UserContact $contactNumber
     *
     * @return UserDetail
     */
    public function addContactNumber(\UserBundle\Entity\UserContact $contactNumber)
    {
        $this->contactNumber[] = $contactNumber;
        $contactNumber->setUser($this);

        return $this;
    }

    /**
     * Remove contactNumber
     *
     * @param \UserBundle\Entity\UserContact $contactNumber
     */
    public function removeContactNumber(\UserBundle\Entity\UserContact $contactNumber)
    {
        $this->contactNumber->removeElement($contactNumber);
    }

    /**
     * Get contactNumber
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContactNumber()
    {
        return $this->contactNumber;
    }

    /**
     * Add interest
     *
     * @param \UserBundle\Entity\InterestType $interest
     *
     * @return UserDetail
     */
    public function addInterest(\UserBundle\Entity\InterestType $interest)
    {
        $this->interest[] = $interest;
        $interest->setUser($this);
        return $this;
    }

    /**
     * Remove interest
     *
     * @param \UserBundle\Entity\InterestType $interest
     */
    public function removeInterest(\UserBundle\Entity\InterestType $interest)
    {
        $this->interest->removeElement($interest);
    }

    /**
     * Get interest
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInterest()
    {
        return $this->interest;
    }

    /**
     * Add graduationType
     *
     * @param \UserBundle\Entity\UserGraduation $graduationType
     *
     * @return UserDetail
     */
    public function addGraduationType(\UserBundle\Entity\UserGraduation $graduationType)
    {
        $this->graduationType[] = $graduationType;
        $graduationType->setUser($this);
        return $this;
    }

    /**
     * Remove graduationType
     *
     * @param \UserBundle\Entity\UserGraduation $graduationType
     */
    public function removeGraduationType(\UserBundle\Entity\UserGraduation $graduationType)
    {
        $this->graduationType->removeElement($graduationType);
    }

    /**
     * Get graduationType
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGraduationType()
    {
        return $this->graduationType;
    }

    /**
     * Set gender
     *
     * @param \UserBundle\Entity\Gender $gender
     *
     * @return UserDetail
     */
    public function setGender(\UserBundle\Entity\Gender $gender = null)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return \UserBundle\Entity\Gender
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set bloodGroup
     *
     * @param \UserBundle\Entity\BloodGroup $bloodGroup
     *
     * @return UserDetail
     */
    public function setBloodGroup(\UserBundle\Entity\BloodGroup $bloodGroup = null)
    {
        $this->bloodGroup = $bloodGroup;

        return $this;
    }

    /**
     * Get bloodGroup
     *
     * @return \UserBundle\Entity\BloodGroup
     */
    public function getBloodGroup()
    {
        return $this->bloodGroup;
    }
}
