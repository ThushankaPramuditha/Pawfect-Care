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
}






