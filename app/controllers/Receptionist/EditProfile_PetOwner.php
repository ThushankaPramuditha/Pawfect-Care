<?php 

class EditProfile_PetOwner
{
	use Controller;

	public function index()
	{

		$data['username'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->email;

		$this->view('receptionist/editprofile_petowner',$data);
	}

}
