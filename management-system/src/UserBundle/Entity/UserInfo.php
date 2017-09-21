<?php
namespace UserBundle\Entity;

class UserInfo
{
	protected $first_name;
	protected $last_name;
	public $email_id;

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

	/*public function getdateofbirth()
	{
		return $this->dateofbirth;
	}

	public function setdateofbirth(\DateTime $dateofbirth = null)
	{
		$this->dateofbirth = $dateofbirth;
	}

	public function getBloodGroup()
	{
		return $this->bloodgroup;
	}

	public function setBloodGroup($bloodgroup)
	{
		$this->bloodgroup = $bloodgroup;
	}*/
}