<?php

class MedicalHistory
{
    use Controller;

    public function index(string $petId = ''): void
    {
        AuthorizationMiddleware::authorize(['Medical Staff']);
        $userdataModel = new MedicalStaffModel();
		$data['userdata'] = $userdataModel->getMedstaffRoleDataById($_SESSION['USER']->id);

        $medicalhistoryModel = new MedicalhistoryModel();
        //$data['medicalhistory'] = $medicalhistoryModel->findAll();
        $data['medicalhistory'] = $medicalhistoryModel->getAllMedicalHistoryForPetId($petId);

        $prescriptions = $medicalhistoryModel->getAllPrescriptions();
        $data['prescriptions'] = $prescriptions;

        $prescriptionsModel = new PrescriptionsModel();
        $data['prescriptions']  = $prescriptionsModel->getAllPrescriptions();
       
        $this->view('medicalstaff/medicalhistory', $data);
    }

    public function update(string $a = '', string $b = '', string $c = ''): void
    {
        AuthorizationMiddleware::authorize(['Medical Staff']);
        $userdataModel = new MedicalStaffModel();
		$data['userdata'] = $userdataModel->getMedstaffRoleDataById($_SESSION['USER']->id);
        
        $medicalhistoryModel = new MedicalhistoryModel();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           
            $success = $medicalhistoryModel->updateMedicalHistory($a, $_POST);

            if($success){
                $_SESSION['flash'] = ['success' => 'Treatment updated successfully!'];
                header("Location: " . $_SERVER['HTTP_REFERER']);
                exit();
            }
            else{
                $_SESSION['flash'] = ['error' => 'Failed to update treatment'];
                header("Location: " . $_SERVER['HTTP_REFERER']);
                exit();
            };
                
        }
        
    }



    public function add(string $a = '', string $b = '', string $c = ''): void
{
    AuthorizationMiddleware::authorize(['Medical Staff']);

    // Fetch the current user's data
    $userdataModel = new MedicalStaffModel();
    $data['userdata'] = $userdataModel->getMedstaffRoleDataById($_SESSION['USER']->id);
    
    // Set the created_by field in $_POST
    $_POST['created_by'] = $data['userdata']->id;

    $medicalhistoryModel = new MedicalhistoryModel();
    
    /*// Initialize array to store prescription details
    $prescriptionDetails = [];
    
    // Fetch selected prescriptions
    if (isset($_POST['prescriptions']) && is_array($_POST['prescriptions'])) {
        $selectedPrescriptions = $_POST['prescriptions'];
        
        // Initialize the PrescriptionsModel
        $prescriptionsModel = new PrescriptionsModel();
        
        // Extract prescription details for each selected prescription
        foreach ($selectedPrescriptions as $prescriptionId) {
            $prescription = $prescriptionsModel->getPrescriptionById($prescriptionId);
            if ($prescription !== false) {
                // Add prescription details to the array
                $prescriptionDetails[] = [
                    'prescription' => $prescription[0]->name,
                ];
            }
        }
    }*/
    
    // Pass prescription details along with other form data to addTreatment method
    $success = $medicalhistoryModel->addTreatment(
        $_POST['patient_no'],
        $_POST['weight'],
        $_POST['temperature'],
        $_POST['med_condition'],
        $_POST['treatment'],
        $_POST['prescription'],
        $_POST['remarks'],
        $_POST['created_by']
    );
    
    if ($success) {
        $_SESSION['flash'] = ['success' => 'Treatment added successfully!'];
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    } else {
        $_SESSION['flash'] = ['error' => 'Failed to add treatment'];
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    }
}


    public function viewMedicalHistory(string $a = '', string $b = '', string $c = ''): void
    {
        AuthorizationMiddleware::authorize(['Medical Staff']);
        $userdataModel = new MedicalStaffModel();
		$data['userdata'] = $userdataModel->getMedstaffRoleDataById($_SESSION['USER']->id);

        $medicalhistoryModel = new MedicalhistoryModel();
        $data['medicalhistory'] = $medicalhistoryModel-> getMedicalHistoryForPetIdById($a,$b);
         // show($a);
        // die();
        $this->view('medicalstaff/medicalhistory/update', $data);
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
                echo "<td>{$history->appointment_id}</td>";
                echo "<td>{$history->weight}</td>";
                echo "<td>{$history->temperature}</td>";
                echo "<td>{$history->med_condition}</td>";
                echo "<td>{$history->treatment}</td>";
                echo "<td>{$history->prescription}</td>";
                echo "<td>{$history->treated_by}</td>";
                echo "<td>{$history->remarks}</td>";
                echo "<td>{$history->created_by}</td>";
                echo "<td class='edit-action-buttons'>";
                echo "<button class='edit-icon' id='{$history->id}' pet-id='{$history->pet_id}'></button>";
                echo "</td>";
               
                echo "</tr>";
            }
        }
        exit; 
    }

}

	

   
