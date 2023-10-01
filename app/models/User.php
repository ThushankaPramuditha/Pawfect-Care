<?php 


/**
 * User class
 */
Class User
{
	
	use Model;

	protected $table = 'users';

	protected $allowedColumns = [

		'email',
		'password',
	];

	public function validate($data)
	{
		$this->errors = [];
        
		if(empty($data['full-name']))
		{
			$this->errors['full-name'] = "Full name is required";
		}
        if(empty($data['address']))
		{
			$this->errors['address'] = "Address is required";
		} 
		if(empty($data['contact-number']))
		{
			$this->errors['contact-number'] = "Contact number is required";
		}
        if(empty($data['nic']))
		{
			$this->errors['nic'] = "NIC is required";
		}
         
		if(empty($data['email']))
		{
			$this->errors['email'] = "Email is required";
		}else
		if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL))
		{
			$this->errors['email'] = "Email is not valid";
		}
		
		if(empty($data['password']))
		{
			$this->errors['password'] = "Password is required";
		}

		if(empty($data['confirm_password']))
		{
			$this->errors['confirm_password'] = "Confirm password is required";
		}

		if(empty($data['terms']))
		{
			$this->errors['terms'] = "Please accept the terms and conditions";
		}

		if(empty($this->errors))
		{
			return true;
		}

		return false;
	}
}