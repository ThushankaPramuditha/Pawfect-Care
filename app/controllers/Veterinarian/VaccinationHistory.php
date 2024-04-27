<?php

class VaccinationHistory
{
    use Controller;

    public function index(string $a = '', string $b = '', string $c = ''): void
    {
        AuthorizationMiddleware::authorize(['Veterinarian']);
        $userdataModel = new VeterinariansModel();
		$data['userdata'] = $userdataModel->getVetRoleDataById($_SESSION['USER']->id);
        $vaccinationhistoryModel = new VaccinationhistoryModel();
        $data['vaccinationhistory'] = $vaccinationhistoryModel->getAllVaccinationHistoryForPetId($a);
        $this->view('veterinarian/vaccinationhistory', $data);

    }
    
    public function update(string $a = '', string $b = '', string $c = ''): void
    {
        AuthorizationMiddleware::authorize(['Veterinarian']);
        $userdataModel = new VeterinariansModel();
		$data['userdata'] = $userdataModel->getVetRoleDataById($_SESSION['USER']->id);

        $vaccinationhistoryModel = new VaccinationhistoryModel();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           
            $vaccinationhistoryModel->updateVaccinationHistory($a, $_POST);
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }

    }

    public function add(string $a = '', string $b = '', string $c = ''): void
    {
        AuthorizationMiddleware::authorize(['Veterinarian']);
        $userdataModel = new VeterinariansModel();
		$data['userdata'] = $userdataModel->getVetRoleDataById($_SESSION['USER']->id);

        $vaccinationhistoryModel = new VaccinationhistoryModel();
        //$petId = $a;
        $vaccinationhistoryModel->addVaccination($_POST);
        header("Location: " . $_SERVER['HTTP_REFERER']);
        //redirect("veterinarian/vaccinationhistory/{$petId}");
    }

    public function viewVaccinationHistory(string $a = '', string $b = '', string $c = ''): void
    {
        AuthorizationMiddleware::authorize(['Veterinarian']);
        $userdataModel = new VeterinariansModel();
		$data['userdata'] = $userdataModel->getVetRoleDataById($_SESSION['USER']->id);
        
        $vaccinationhistoryModel = new VaccinationhistoryModel();
        $data['vaccinationhistory'] = $vaccinationhistoryModel-> getVaccinationHistoryById($a,$b);
         // show($a);
        // die();
        $this->view('veterinarian/vaccinationhistory/update', $data);
    }

    public function search(): void 
    {
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
                echo "<td>{$history->weight}</td>";
                echo "<td>{$history->temperature}</td>";
                echo "<td>{$history->vaccine_name}</td>";
                echo "<td>{$history->serial_no}</td>";
                echo "<td>{$history->administered_by}</td>";
                echo "<td>{$history->due_date}</td>";
                echo "<td>{$history->remarks}</td>";
                echo "</tr>";
            }
        }
        exit;
    }

}






