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

	public function search(): void
    {
        
        $petsModel = new PetsModel();
        $searchTerm = $_POST['search'] ?? '';
        $petsModel = $petsModel->search($searchTerm);

        if(empty($petsModel)){
            echo "<tr><td colspan='20'>No pets found</td></tr>";
        }
        else{
            foreach ($petsModel as $pets) {
				$dateOfBirth = new DateTime($pets->birthday);
				$today = new DateTime('today');
				$pets->age =  $dateOfBirth->diff($today)->y;
                echo "<tr key='{$pets->id}'>";
                echo "<td>{$pets->id}</td>";
                echo "<td>{$pets->name}</td>";
                echo "<td>{$pets->age}</td>";
                echo "<td>{$pets->breed}</td>";
                echo "<td>{$pets->species}</td>";
                echo "<td>{$pets->gender}</td>";
                echo "<td>{$pets->petowner_id}</td>";
                echo "<td>{$pets->owner_name}</td>";
				echo "<td>{$pets->nic}</td>";
                echo "</tr>";
            }
        }
        exit; 

    }

	public function calculateAge($birthday) {
		AuthorizationMiddleware::authorize(['Receptionist']);
		$dateOfBirth = new DateTime($birthday);
		$today = new DateTime('today');

		//to get the year difference between the two dates
		return $dateOfBirth->diff($today)->y;
	}
		

}




