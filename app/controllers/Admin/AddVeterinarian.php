<?php 

/**
 * ambulancedrivers class
 */
class AddVeterinarian
{
	use Controller;

	public function index()
	{

		$data['username'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->email;

		$this->view('admin/addveterinarian',$data);
	}

}
