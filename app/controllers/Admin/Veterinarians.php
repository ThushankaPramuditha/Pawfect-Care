<?php 

/**
 * veterinarians class
 */
class Veterinarians
{
	use Controller;

	public function index()
	{

		$data['username'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->email;

		$this->view('admin/veterinarians',$data);
	}

}