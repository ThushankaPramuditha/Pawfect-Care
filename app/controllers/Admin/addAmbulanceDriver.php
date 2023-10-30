<?php 

class AddAmbulanceDriver
{
	use Controller;

	public function index()
	{

		$data['username'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->email;

		$this->view('admin/addambulancedriver',$data);
	}

}
