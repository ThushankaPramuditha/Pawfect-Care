<?php 

/**
 * ambulancedrivers class
 */
class AmbulanceDrivers
{
	use Controller;

	public function index()
	{

		$data['username'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->email;

		$this->view('admin/ambulancedrivers',$data);
	}

}
