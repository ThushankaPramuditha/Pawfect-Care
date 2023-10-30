<?php 

/**
 * editprofile class
 */
class EditService
{
	use Controller;

	public function index()
	{

		$data['username'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->email;

		$this->view('admin/editservice',$data);
	}

}
