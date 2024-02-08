<?php 

/**
 * home class
 */
class Daycareslots
{
	use Controller;

	public function index()
	{

		$data['username'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->email;

		$this->view('daycareslots',$data);
	}

}