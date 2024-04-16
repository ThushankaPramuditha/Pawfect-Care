<?php

class VaccinationHistory
{
    use Controller;

    public function index(string $a = '', string $b = '', string $c = ''): void
    {$userdataModel = new MedicalStaffModel();
		$data['userdata'] = $userdataModel->getMedstaffRoleDataById($_SESSION['USER']->id);
        $vaccinationhistoryModel = new VaccinationhistoryModel();
        //$data['vaccinationhistory'] = $vaccinationhistoryModel->findAll();
        $data['vaccinationhistory'] = $vaccinationhistoryModel->getAllVaccinationHistory();
        $this->view('medicalstaff/vaccinationhistory', $data);
    }

   
    public function getVaccinationHistoryForPetId(string $a = '', string $b = '', string $c = ''): void
    {
        $vaccinationhistoryModel = new VaccinationhistoryModel();
        $data['vaccinationhistory']  = $vaccinationhistoryModel->getVaccinationHistoryForPetId($a);
        // Load the view with the vaccination history data
        $this->view('medicalstaff/vaccinationhistory', $data);
        
    }
    
    public function update(string $a = '', string $b = '', string $c = ''): void
    {
        $vaccinationhistoryModel = new VaccinationhistoryModel();
        $vaccinationhistoryModel->updateVaccinationHistory($a, $_POST);

        redirect('medicalstaff/vaccinationhistory');
    }

    /*public function update(string $id = ''): void
    {
        $vaccinationhistoryModel = new VaccinationhistoryModel();
        
        // Fetch the vaccination history by ID
        $data['vaccinationhistory'] = $vaccinationhistoryModel->getVaccinationHistoryById($id);

        // Check if the history data is available
        if (!$data['vaccinationhistory']) {
            // Redirect or handle the case where data is not found
            redirect('medicalstaff/vaccinationhistory');
        }

        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Perform the update
            $vaccinationhistoryModel->updateVaccinationHistory($id, $_POST);
            // Redirect after update
            redirect('medicalstaff/vaccinationhistory');
        }

        // Load the update view
        $this->view('medicalstaff/vaccinationhistory/update', $data);
    }*/


    public function add(string $a = '', string $b = '', string $c = ''): void
    {
        $vaccinationhistoryModel = new VaccinationhistoryModel();
        $vaccinationhistoryModel->addVaccination($_POST);
        redirect('medicalstaff/vaccinationhistory');
    }

    public function viewVaccinationHistory(string $a = '', string $b = '', string $c = ''): void
    {
        $vaccinationhistoryModel = new VaccinationhistoryModel();
        $data['vaccinationhistory'] = $vaccinationhistoryModel-> getVaccinationHistoryById($a);
         // show($a);
        // die();
        $this->view('medicalstaff/vaccinationhistory/update', $data);
    }
}


