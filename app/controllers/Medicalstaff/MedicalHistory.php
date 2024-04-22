<?php

class MedicalHistory
{
    use Controller;

    public function index(string $petId = ''): void
    {
        $userdataModel = new MedicalStaffModel();
		$data['userdata'] = $userdataModel->getMedstaffRoleDataById($_SESSION['USER']->id);

        $medicalhistoryModel = new MedicalhistoryModel();
        //$data['medicalhistory'] = $medicalhistoryModel->findAll();
        $data['medicalhistory'] = $medicalhistoryModel->getAllMedicalHistoryForPetId($petId);
       
        $this->view('medicalstaff/medicalhistory', $data);
    }

    public function update(string $Id = ''): void
    {
        $userdataModel = new MedicalStaffModel();
		$data['userdata'] = $userdataModel->getMedstaffRoleDataById($_SESSION['USER']->id);
        
        $medicalhistoryModel = new MedicalhistoryModel();
        $medicalhistoryModel->updateMedicalHistory($Id, $_POST);

        header("Location: " . $_SERVER['HTTP_REFERER']);
    }


    public function add(string $a = '', string $b = '', string $c = ''): void
    {
        $userdataModel = new MedicalStaffModel();
		$data['userdata'] = $userdataModel->getMedstaffRoleDataById($_SESSION['USER']->id);

        $medicalhistoryModel = new MedicalhistoryModel();
        //$petId = $_POST['pet_id'];
        $medicalhistoryModel->addTreatment($_POST);

    
        header("Location: " . $_SERVER['HTTP_REFERER']);
     
    }

    public function viewMedicalHistory(string $Id = '', string $petId = ''): void
    {
        $userdataModel = new MedicalStaffModel();
		$data['userdata'] = $userdataModel->getMedstaffRoleDataById($_SESSION['USER']->id);

        $medicalhistoryModel = new MedicalhistoryModel();
        $data['medicalhistory'] = $medicalhistoryModel-> getMedicalHistoryForPetIdById($Id,$petId);
         // show($a);
        // die();
        $this->view('medicalstaff/medicalhistory/update', $data);
    }

}

	

   
