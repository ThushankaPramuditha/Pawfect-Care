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

    public function search(): void
    {
        
        $petownersModel = new PetownersModel();
        $searchTerm = $_POST['search'] ?? '';
        $petownersModel = $petownersModel->search($searchTerm);
        
        if(empty($petownersModel)){
            echo "<tr><td colspan='20'>No petowners found</td></tr>";
        }
        else{
            foreach ($petownersModel as $petowners) {
                echo "<tr key='{$petowners->id}'>";
                echo "<td>{$petowners->id}</td>";
                echo "<td>{$petowners->name}</td>";
                echo "<td>{$petowners->nic}</td>";
                echo "<td>{$petowners->email}</td>";
                echo "<td>{$petowners->address}</td>";
                echo "<td>{$petowners->contact}</td>";
                echo "</tr>";
            }
        }
        exit; 

    }

}

