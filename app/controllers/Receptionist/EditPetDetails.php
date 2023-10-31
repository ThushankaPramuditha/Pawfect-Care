<?php 

class EditPetDetails
{
	use Controller;

	public function index()
	{

		$data['username'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->email;

		$this->view('receptionist/editpetdetails',$data);
	}

}
