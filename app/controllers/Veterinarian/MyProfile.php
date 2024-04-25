<?php 

/**
 * myprofile class
 */
class MyProfile
{
	use Controller;

	public function index()
	{
		AuthorizationMiddleware::authorize(['Veterinarian']);
		$userdataModel = new VeterinariansModel();
		$data['userdata'] = $userdataModel->getVetRoleDataById($_SESSION['USER']->id);

		$this->view('veterinarian/myprofile',$data);
	}

}
