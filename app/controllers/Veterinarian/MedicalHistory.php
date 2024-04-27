<?php

class MedicalHistory
{
    use Controller;

    public function index(string $petId = ''): void
    {
        AuthorizationMiddleware::authorize(['Veterinarian']);
        $userdataModel = new VeterinariansModel();
		$data['userdata'] = $userdataModel->getVetRoleDataById($_SESSION['USER']->id);

        $medicalhistoryModel = new MedicalhistoryModel();
        //$data['medicalhistory'] = $medicalhistoryModel->findAll();
        $data['medicalhistory'] = $medicalhistoryModel->getAllMedicalHistoryForPetId($petId);
       
        $this->view('veterinarian/medicalhistory', $data);
    }

    public function update(string $Id = ''): void
    {
        AuthorizationMiddleware::authorize(['Veterinarian']);
        $userdataModel = new VeterinariansModel();
		$data['userdata'] = $userdataModel->getVetRoleDataById($_SESSION['USER']->id);
        
        $medicalhistoryModel = new MedicalhistoryModel();
        $medicalhistoryModel->updateMedicalHistory($Id, $_POST);

        header("Location: " . $_SERVER['HTTP_REFERER']);
    }


    public function add(string $a = '', string $b = '', string $c = ''): void
    {
        AuthorizationMiddleware::authorize(['Veterinarian']);
        $userdataModel = new VeterinariansModel();
		$data['userdata'] = $userdataModel->getVetRoleDataById($_SESSION['USER']->id);

        $medicalhistoryModel = new MedicalhistoryModel();
        //$petId = $_POST['pet_id'];
        $medicalhistoryModel->addTreatment($_POST);

    
        header("Location: " . $_SERVER['HTTP_REFERER']);
     
    }

    public function viewMedicalHistory(string $Id = '', string $petId = ''): void
    {
        AuthorizationMiddleware::authorize(['Veterinarian']);
        $userdataModel = new VeterinariansModel();
		$data['userdata'] = $userdataModel->getVetRoleDataById($_SESSION['USER']->id);

        $medicalhistoryModel = new MedicalhistoryModel();
        $data['medicalhistory'] = $medicalhistoryModel-> getMedicalHistoryForPetIdById($Id,$petId);
         // show($a);
        // die();
        $this->view('veterinarian/medicalhistory/update', $data);
    }

    public function search(): void
    {
        $medicalhistoryModel = new MedicalhistoryModel();
        $searchTerm = $_POST['search'] ?? '';
        $petId = $_POST['petId'] ?? '';
        $medicalhistory = $medicalhistoryModel->searchMedicalHistoryPerPet($searchTerm, $petId);
        if(empty($medicalhistory)){
            echo "<tr><td colspan='20'>No medicalhistory found</td></tr>";
        }
        else{
            foreach ($medicalhistory as $history) {
                echo "<tr key='{$history->id}'>";
                echo "<td>{$history->pet_id}</td>";
                echo "<td>{$history->date}</td>";
                echo "<td>{$history->weight}</td>";
                echo "<td>{$history->temperature}</td>";
                echo "<td>{$history->med_condition}</td>";
                echo "<td>{$history->treatment}</td>";
                echo "<td>{$history->prescription}</td>";
                echo "<td>{$history->treated_by}</td>";
                echo "<td>{$history->remarks}</td>";
                echo "</tr>";
            }
        }
        exit; 
    }


    


}

	

   


	

   
