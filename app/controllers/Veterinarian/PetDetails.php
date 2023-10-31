<?php 

class PetDetails
{
	use Controller;

	public function index()
	{

		$data['username'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->email;

		$this->view('veterinarian/petdetails',$data);
	}

}
