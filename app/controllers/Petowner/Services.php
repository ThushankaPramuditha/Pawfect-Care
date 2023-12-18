<?php 

/**
 * home class
 */
class Services
{
	use Controller;

	public function index()
	{

		$data['username'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->email;

		$this->view('petowner/services',$data);
	}

}
