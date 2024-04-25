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

		$this->view('admin/myprofile',$data);
	}

}
