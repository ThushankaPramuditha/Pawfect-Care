<?php 

class PetOwnerDetails
{
	use Controller;

	public function index()
	{
		AuthorizationMiddleware::authorize(['Receptionist']);
		$userdataModel = new ReceptionistsModel();
		$data['userdata'] = $userdataModel->getReceptionistRoleDataById($_SESSION['USER']->id);

		$petownersModel = new PetownersModel();
		$data['petownerdetails'] = $petownersModel->getAllPetowners();

		$this->view('receptionist/petownerdetails',$data);
	}

	public function add()
    {
        AuthorizationMiddleware::authorize(['Receptionist']);
		$petownersModel = new PetownersModel();
		
        $success = $petownersModel->addPetowner($_POST);

        if($success){
            $_SESSION['flash'] = ['success' => 'Pet Owner registered successfully!'];
            header('Location: ' . ROOT . '/receptionist/petownerdetails');
            exit();
        }
        else{
            $_SESSION['flash'] = ['error' => 'Failed to register pet owner'];
            header('Location: ' . ROOT . '/receptionist/petownerdetails');
            exit();
        };
    }

}

