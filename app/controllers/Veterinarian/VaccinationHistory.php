<?php

class VaccinationHistory
{
    use Controller;
    
    public function index()
    {
      $userdataModel = new VeterinariansModel();
      $data['userdata'] = $userdataModel->getVetRoleDataById($_SESSION['USER']->id);

      $data['username'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->email;

      $this->view('veterinarian/vaccinationhistory',$data);
    }

    /*public function index(string $a = '', string $b = '', string $c = ''): void
    {
        $vaccinationhistoryModel = new VaccinationhistoryModel();
        //$data['vaccinationhistory'] = $vaccinationhistoryModel->findAll();
        $data['vaccinationhistory'] = $vaccinationhistoryModel->getAllVaccinationHistory();
        $this->view('veterinarian/vaccinationhistory', $data);
    }*/

   
    public function getVaccinationHistoryForPetId(string $a = '', string $b = '', string $c = ''): void
    {
        $vaccinationhistoryModel = new VaccinationhistoryModel();
        $data['vaccinationhistory']  = $vaccinationhistoryModel->getVaccinationHistoryForPetId($a);
        // Load the view with the vaccination history data
        $this->view('veterinarian/vaccinationhistory', $data);
        
    }
    
    public function update(string $a = '', string $b = '', string $c = ''): void
    {
        $vaccinationhistoryModel = new VaccinationhistoryModel();
        $vaccinationhistoryModel->updateVaccinationHistory($a, $_POST);

        redirect('veterinarian/vaccinationhistory');
    }

    /*public function update(string $id = ''): void
    {
        $vaccinationhistoryModel = new VaccinationhistoryModel();
        
        // Fetch the vaccination history by ID
        $data['vaccinationhistory'] = $vaccinationhistoryModel->getVaccinationHistoryById($id);


        // Check if the history data is available
        if (!$data['vaccinationhistory']) {
            // Redirect or handle the case where data is not found
            redirect('veterinarian/vaccinationhistory');
        }


        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Perform the update
            $vaccinationhistoryModel->updateVaccinationHistory($id, $_POST);
            // Redirect after update
            redirect('veterinarian/vaccinationhistory');
        }

        // Load the update view
        $this->view('veterinarian/vaccinationhistory/update', $data);
    }*/


    public function add(string $a = '', string $b = '', string $c = ''): void
    {
        $vaccinationhistoryModel = new VaccinationhistoryModel();
        $vaccinationhistoryModel->addVaccination($_POST);
        redirect('veterinarian/vaccinationhistory');
    }

    public function viewVaccinationHistory(string $a = '', string $b = '', string $c = ''): void
    {
        $vaccinationhistoryModel = new VaccinationhistoryModel();
        $data['vaccinationhistory'] = $vaccinationhistoryModel-> getVaccinationHistoryById($a);
         // show($a);
        // die();
        $this->view('veterinarian/vaccinationhistory/update', $data);
    }
}


