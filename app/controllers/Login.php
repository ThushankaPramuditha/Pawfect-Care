<?php 

/**
 * Login class
 */
class Login
{
	use Controller;

	public function index()
	{

		$this->view('login');
	}

}
