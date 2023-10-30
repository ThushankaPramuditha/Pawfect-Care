<?php 

class EditProfile_AmbulanceDrivers
{
	use Controller;

	public function index()
	{

		$data['username'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->email;

		$this->view('admin/editprofile_ambulancedrivers',$data);
	}

}
