<?php 

/**
 * myprofile class
 */
class MyProfile
{
	use Controller;

	public function index()
	{
		AuthorizationMiddleware::authorize(['Admin']);		$data['user'] = new stdClass();
		$data['user']->email = $_SESSION['USER']->email;
		$data['user']->id = $_SESSION['USER']->id;

		$data['username'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->email;


		

		$this->view('admin/myprofile',$data);
	}

}
