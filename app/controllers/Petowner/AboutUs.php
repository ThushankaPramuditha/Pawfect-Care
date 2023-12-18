<?php 

/**
 * home class
 */
class AboutUs
{
	use Controller;

	public function index()
	{

		$data['username'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->email;

		$this->view('petowner/aboutus',$data);
	}

}
