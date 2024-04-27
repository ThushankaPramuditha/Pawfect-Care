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

        $appointmentsModel = new AppointmentsModel();
        $data['appointments'] = $appointmentsModel->getCurrentPatientNo();

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

        $vaccinationhistoryModel = new VaccinationhistoryModel();
        //$petId = $a;
        $success = $vaccinationhistoryModel->addVaccination($_POST);

        if($success){
            $_SESSION['flash'] = ['success' => 'Vaccination added successfully!'];
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
                echo "<td class='edit-action-buttons'>";
                echo "<button class='edit-icon' id='{$history->id}' pet-id='{$history->pet_id}'></button>";
                echo "</td>";
                echo "</tr>";
            }
        }
        exit;
    }
}


