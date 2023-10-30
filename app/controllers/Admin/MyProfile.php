<?php 

/**
 * myprofile class
 */
class MyProfile
{
	use Controller;

	public function index()
	{

		$data['username'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->email;

		$this->view('admin/myprofile',$data);
	}

}
