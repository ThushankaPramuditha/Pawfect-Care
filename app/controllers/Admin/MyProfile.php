<?php 

/**
 * myprofile class
 */
class MyProfile
{
	use Controller;

	public function index()
	{
		//get id and gmail form session and store in user object
		$data['user'] = new stdClass();
		$data['user']->email = $_SESSION['USER']->email;
		$data['user']->id = $_SESSION['USER']->id;

		$data['username'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->email;


		

		$this->view('admin/myprofile',$data);
	}

}
