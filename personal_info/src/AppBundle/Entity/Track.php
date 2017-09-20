<?php
namespace AppBundle\Entity;

class Track
{
	protected $first_name;
	protected $last_name;
	protected $dateofbirth;
	protected $bloodgroup;

	public function getfirstName()
	{
		return $this->first_name;
	}

	public function getlastName()
	{
		//$name = $this->first_name.''.$this->last_name;
		return $this->last_name;
	}

	public function setfirstName($first_name) 
	{
		$this->first_name = $first_name;
		//$this->last_name = $last_name;
	}

	public function setlastName($last_name)
	{
		
		$this->last_name = $last_name;
	}

	public function getdateofbirth()
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
	}
}