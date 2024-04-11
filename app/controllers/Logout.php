<?php 

/**
 * logout class
 */
class Logout
{
	use Controller;

	public function index()
	{

		session_destroy();

		redirect('login');
	}

}
