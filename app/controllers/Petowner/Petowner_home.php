<?php 

/**
 * home class
 */
class PetOwner_Home
{
	use Controller;

	public function index()
	{

		$data['username'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->email;

		$this->view('petowner/petowner_home',$data);
	}

}
