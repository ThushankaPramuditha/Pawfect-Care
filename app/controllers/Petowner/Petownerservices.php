<?php 

/**
 * home class
 */
class PetOwnerServices
{
	use Controller;

	public function index()
	{

		$data['username'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->email;

		$this->view('petowner/petownerservices',$data);
	}

}
