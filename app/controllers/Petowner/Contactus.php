<?php 

/**
 * home class
 */
class Contactus
{
	use Controller;

	public function index()
	{

		AuthorizationMiddleware::authorize(['Pet Owner']);
        $userdataModel = new PetownersModel();
		$data['userdata'] = $userdataModel->getPetownerRoleDataById($_SESSION['USER']->id);
		$this->view('petowner/contactus',$data);
	}

}
