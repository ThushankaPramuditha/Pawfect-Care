<?php 

class EditProfile_Receptionist
{
	use Controller;

	public function index()
	{

		$data['username'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->email;

		$this->view('admin/editprofile_receptionist',$data);
	}

}
