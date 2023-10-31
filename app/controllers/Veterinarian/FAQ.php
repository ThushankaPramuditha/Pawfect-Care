<?php 

class FAQ
{
	use Controller;

	public function index()
	{

		$data['username'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->email;

		$this->view('veterinarian/faq',$data);
	}

}
