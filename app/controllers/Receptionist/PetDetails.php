<?php 

class PetDetails
{
	use Controller;

	public function index()
	{
		AuthorizationMiddleware::authorize(['Receptionist']);
		$userdataModel = new ReceptionistsModel();
		$data['userdata'] = $userdataModel->getReceptionistRoleDataById($_SESSION['USER']->id);

		$petsModel = new PetsModel();
		$petDetails = $petsModel->getAllPetDetails();

		// Calculate age for each pet
		foreach ($petDetails as $pet) {
			$pet->age = $this->calculateAge($pet->birthday);
		}
		$data['petdetails'] = $petDetails;
		$this->view('receptionist/petdetails',$data);
	}

	public function calculateAge($birthday) {
		AuthorizationMiddleware::authorize(['Receptionist']);
		$dateOfBirth = new DateTime($birthday);
		$today = new DateTime('today');

		//get the year element of the difference between the two dates
		return $dateOfBirth->diff($today)->y;
	}

	public function add()
    {
        AuthorizationMiddleware::authorize(['Receptionist']);
        $petsModel = new PetsModel();
        $success = $petsModel->addPet($_POST);

        if($success){
            $_SESSION['flash'] = ['success' => 'Pet added successfully!'];
            header('Location: ' . ROOT . '/receptionist/petdetails');
            exit();
        }
        else{
            $_SESSION['flash'] = ['error' => 'Failed to add pet'];
            header('Location: ' . ROOT . '/receptionist/petdetails');
            exit();
        };
    }
		

	}




