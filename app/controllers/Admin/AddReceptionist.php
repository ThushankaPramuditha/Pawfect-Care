<?php 

class AddReceptionist
{
	use Controller;

	public function index()
	{

		$data['username'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->email;

		$this->view('admin/addreceptionist',$data);
	}

}
