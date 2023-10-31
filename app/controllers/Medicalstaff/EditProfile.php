<?php 

/**
 * editprofile class
 */
class EditProfile
{
	use Controller;

	public function index()
	{

		$data['username'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->email;

		$this->view('medicalstaff/editprofile',$data);
	}

}
