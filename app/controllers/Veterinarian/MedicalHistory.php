<?php

class MedicalHistory
{
    use Controller;

    public function index()
    {

      $userdataModel = new VeterinariansModel();
      $data['userdata'] = $userdataModel->getVetRoleDataById($_SESSION['USER']->id);
      $data['username'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->email;

      $this->view('veterinarian/medicalhistory',$data);
    }

  
  /*public function index(string $a = '', string $b = '', string $c = ''): void
    {
        $medicalhistoryModel = new MedicalhistoryModel();
        //$data['medicalhistory'] = $medicalhistoryModel->findAll();
        $data['medicalhistory'] = $medicalhistoryModel->getAllMedicalHistory();
        $this->view('veterinarian/medicalhistory', $data);
    }*/

    public function getMedicalHistoryForPetId(string $a = '', string $b = '', string $c = ''): void
    {
        $medicalhistoryModel = new MedicalhistoryModel();
        $data['medicalhistory']  = $medicalhistoryModel->getMedicalHistoryForPetId($a);
        // Load the view with the medical history data
        $this->view('veterinarian/medicalhistory', $data);
        
    }

    public function update(string $a = '', string $b = '', string $c = ''): void
    {
        $medicalhistoryModel = new MedicalhistoryModel();
        $medicalhistoryModel->updateMedicalHistory($a, $_POST);

        redirect('veterinarian/medicalhistory');
    }



    /*public function update(string $id = ''): void
    {
        $medicalhistoryModel = new MedicalhistoryModel();
        
        // Fetch the medical history by ID
        $data['medicalhistory'] = $medicalhistoryModel->getMedicalHistoryById($id);


        // Check if the history data is available
        if (!$data['medicalhistory']) {
            // Redirect or handle the case where data is not found
            redirect('veterinarian/medicalhistory');
        }


        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Perform the update
            $medicalhistoryModel->updateMedicalHistory($id, $_POST);
            // Redirect after update
            redirect('veterinarian/medicalhistory');
        }

        // Load the update view
        $this->view('veterinarian/medicalhistory/update', $data);
    }*/


    public function add(string $a = '', string $b = '', string $c = ''): void
    {
        $medicalhistoryModel = new MedicalhistoryModel();
        $medicalhistoryModel->addTreatment($_POST);
        redirect('veterinarian/medicalhistory');
    }

    public function viewMedicalHistory(string $a = '', string $b = '', string $c = ''): void
    {
        $medicalhistoryModel = new MedicalhistoryModel();
        $data['medicalhistory'] = $medicalhistoryModel-> getMedicalHistoryById($a);
         // show($a);
        // die();
        $this->view('veterinarian/medicalhistory/update', $data);
    }

}

	

   
