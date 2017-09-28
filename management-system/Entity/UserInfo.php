<?php
namespace UserBundle\Entity;

class UserInfo
{
	protected $first_name;
	protected $last_name;
	public $email_id ;
	public $mobile_no;
	protected $date_of_birth;
	protected $bloodgroup;
	protected $gender;
	public $area_of_interest;
	public $graduation;

	public function getfirstName()
	{
		return $this->first_name;
	}

	public function getlastName()
	{
		return $this->last_name;
	}

	public function setfirstName($first_name) 
	{
		$this->first_name = $first_name;
	}

	public function setlastName($last_name)
	{
		
		$this->last_name = $last_name;
	}

	public function getEmail()
	{
		return $this->email_id;
	}

	public function setEmail($email_id) 
	{
		$this->email_id = $email_id;
	}

	public function getInterest()
	{
		return $this->area_of_interest;
	}

	public function setInterest($area_of_interest) 
	{
		$this->area_of_interest = $area_of_interest;
	}

	public function getMobileNumber()
	{
		return $this->mobile_no;
	}

	public function setMobileNumber($mobile_no) 
	{
		$this->mobile_no = $mobile_no;
	}

	public function getdateofbirth()
	{
		return $this->date_of_birth;
	}

	public function setdateofbirth(\DateTime $date_of_birth = null)
	{
		$this->date_of_birth = $date_of_birth;
	}

	public function getBloodGroup()
	{
		return $this->bloodgroup;
	}

	public function setBloodGroup($bloodgroup)
	{
		$this->bloodgroup = $bloodgroup;
	}

	public function getGender()
	{
		return $this->gender;
	}

	public function setGender($gender)
	{
		$this->gender = $gender;
	}

	public function getGraduation()
	{
		return $this->graduation;
	}

	public function setGraduation($graduation)
	{
		$this->graduation = $graduation;
	}
}