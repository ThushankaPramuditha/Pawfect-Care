<?php 

/**
 * home class
 */
class Services
{
	use Controller;

	public function index()
	{
		AuthorizationMiddleware::authorize(['Pet Owner']);
        $userdataModel = new PetownersModel();
		$data['userdata'] = $userdataModel->getPetownerRoleDataById($_SESSION['USER']->id);
		
		$servicesModel = new ServicesModel();
		$data['services'] = $servicesModel->getAllServices(); 
		

		$this->view('petowner/services',$data);
	}

}
