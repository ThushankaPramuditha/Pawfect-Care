<?php

class VaccinationHistory
{
    use Controller;

    public function index(string $a = '', string $b = '', string $c = ''): void
    {
        AuthorizationMiddleware::authorize(['Medical Staff']);
        $userdataModel = new MedicalStaffModel();
		$data['userdata'] = $userdataModel->getMedstaffRoleDataById($_SESSION['USER']->id);
        
        $vaccinationhistoryModel = new VaccinationhistoryModel();
        //$data['vaccinationhistory'] = $vaccinationhistoryModel->findAll();
        $data['vaccinationhistory'] = $vaccinationhistoryModel->getAllVaccinationHistoryForPetId($a);

        $vaccinesModel = new VaccinesModel();
        $data['vaccines']  = $vaccinesModel->getAllVaccines();

        $this->view('medicalstaff/vaccinationhistory', $data);

    }
    
    public function update(string $a = '', string $b = '', string $c = ''): void
    {
        AuthorizationMiddleware::authorize(['Medical Staff']);
        $userdataModel = new MedicalStaffModel();
		$data['userdata'] = $userdataModel->getMedstaffRoleDataById($_SESSION['USER']->id);

        $vaccinationhistoryModel = new VaccinationhistoryModel();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           
            $success = $vaccinationhistoryModel->updateVaccinationHistory($a, $_POST);

            if($success){
                $_SESSION['flash'] = ['success' => 'Vaccination updated successfully!'];
                header("Location: " . $_SERVER['HTTP_REFERER']);
                exit();
            }
            else{
                $_SESSION['flash'] = ['error' => 'Failed to update vaccination'];
                header("Location: " . $_SERVER['HTTP_REFERER']);
                exit();
            };
        }

    }

   
    public function add(string $a = '', string $b = '', string $c = ''): void
    {
        AuthorizationMiddleware::authorize(['Medical Staff']);
        $userdataModel = new MedicalStaffModel();
		$data['userdata'] = $userdataModel->getMedstaffRoleDataById($_SESSION['USER']->id);

        $_POST['created_by'] = $data['userdata']->id;
        //show( $_POST['created_by']);
        //die();
        $vaccinationhistoryModel = new VaccinationhistoryModel();
        //$petId = $a;
        //Handle selected vaccines
        $selectedVaccines = $_POST['vaccines'];
        
        // Initialize arrays to store selected vaccine details
        $vaccineDetails = [];
        $vaccinesModel = new VaccinesModel();
    
        // Extract vaccine details for each selected vaccine
        foreach ($selectedVaccines as $vaccineId) {
            
        $vaccine = $vaccinesModel->getVaccineById($vaccineId);
        
            if ($vaccine !== false) {
                // Add vaccine details to the array
                $vaccineDetails[] = [
                    'vaccine_name' => $vaccine[0]->name,
                    'serial_no' => $vaccine[0]->serial_no
                ];
            }
        }
    

        // Pass vaccine details along with other form data to addVaccination method
        $success = $vaccinationhistoryModel->addVaccination(
        $_POST['patient_no'],
        $_POST['weight'],
        $_POST['temperature'],
        $vaccineDetails,
        $_POST['due_date'],
        $_POST['remarks'],
        $_POST['created_by']);
        
        if($success){
            $_SESSION['flash'] = ['success' => 'Vaccination added successfully!'];
            //show( $_SESSION['flash'] );
            //die();
            header("Location: " . $_SERVER['HTTP_REFERER']);
            //redirect("medicalstaff/vaccinationhistory/{$petId}");
            exit();
        }
        else{
            $_SESSION['flash'] = ['error' => 'Failed to add vaccination'];
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        };
        
    }

    public function viewVaccinationHistory(string $a = '', string $b = '', string $c = ''): void
    {
        AuthorizationMiddleware::authorize(['Medical Staff']);
        $userdataModel = new MedicalStaffModel();
		$data['userdata'] = $userdataModel->getMedstaffRoleDataById($_SESSION['USER']->id);
        
        $vaccinationhistoryModel = new VaccinationhistoryModel();
        $data['vaccinationhistory'] = $vaccinationhistoryModel-> getVaccinationHistoryById($a,$b);
         // show($a);
        // die();
        $this->view('medicalstaff/vaccinationhistory/update', $data);
    }

    public function search(): void {
        $vaccinationHistoryModel = new VaccinationhistoryModel();
        $searchTerm = $_POST['search'] ?? '';
        $petId = $_POST['petId'] ?? '';
       
        $vaccinationhistory = $vaccinationHistoryModel->searchVaccinationHistoryPerPet($searchTerm, $petId);
        
        if(empty($vaccinationhistory)) {
            echo "<tr><td colspan='9'>No vaccination found</td></tr>";
        } else {
            foreach ($vaccinationhistory as $history) {
                echo "<tr key='{$history->id}'>";
                echo "<td>{$history->pet_id}</td>";
                echo "<td>{$history->date}</td>";
                echo "<td>{$history->appointment_id}</td>";
                echo "<td>{$history->weight}</td>";
                echo "<td>{$history->temperature}</td>";
                echo "<td>{$history->vaccine_name}</td>";
                echo "<td>{$history->serial_no}</td>";
                echo "<td>{$history->administered_by}</td>";
                echo "<td>{$history->due_date}</td>";
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