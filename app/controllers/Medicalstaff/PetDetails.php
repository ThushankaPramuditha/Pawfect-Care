<?php

class Petdetails
{
    use Controller;

    public function index(string $a = '', string $b = '', string $c = ''): void
    {
        $userdataModel = new MedicalStaffModel();
        $data['userdata'] = $userdataModel->getMedstaffRoleDataById($_SESSION['USER']->id);

        $petdetailsModel = new PetdetailsModel();
        $petDetails = $petdetailsModel->getAllPetDetails();

        // Calculate age for each pet
        foreach ($petDetails as $pet) {
            $pet->age = $this->calculateAge($pet->birthday);
        }

        $data['petdetails'] = $petDetails;
        $this->view('medicalstaff/petdetails', $data);
    }

    public function calculateAge($birthday) {
        $dateOfBirth = new DateTime($birthday);
        $today = new DateTime('today');
        return $dateOfBirth->diff($today)->y;
    }


    /*public function petDetails($pet_id) 
    {
        $petdetailsModel = new PetdetailsModel();

        // Get pet details
        $petdetails = $petdetailsModel->getPetDetailsById($pet_id);

        // Check if pet exists
        if ($petdetails) {
            // Load the model
            $vaccinationhistoryModel = new VaccinationhistoryModel();

            // Get vaccination history for the pet
            $vaccinationhistory = $vaccinationhistoryModel->getVaccinationHistoryByPetId($pet_id);

            // Load view with pet details and vaccination history
            $this->view('petdetails', ['petdetails' => $petdetails, 'vaccinationhistory' => $vaccinationhistory]);
        } else {
            // Pet not found, redirect or show error
            // Example: Redirect to pet listing page
            redirect('petdatails');
        }
    }*/


   /* public function update(string $a = '', string $b = '', string $c = ''): void
    {
        $petdetailsModel = new PetdetailsModel();
        $petdetailsModel->updatePetdetails($a, $_POST);

        redirect('medicalstaff/petdetails');
    }*/

    /*public function update(string $id = ''): void
    {
        $petdetailsModel = new PetdetailsModel();
        
        // Fetch the vaccination history by ID
        $data['petdetails'] = $petdetailsModel->getPetdetailsById($id);

        // Check if the history data is available
        if (!$data['petdetails']) {
            // Redirect or handle the case where data is not found
            redirect('medicalstaff/petdetails');
        }

        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Perform the update
            $petdetailsModel->updatePetdetails($id, $_POST);
            // Redirect after update
            redirect('medicalstaff/petdetails');
        }

        // Load the update view
        $this->view('medicalstaff/petdetails/update', $data);
    }*/


    /*public function add(string $a = '', string $b = '', string $c = ''): void
    {
        $petdetailsModel = new PetdetailsModel();
        $petdetailsModel->addPetdetails($_POST);
        redirect('medicalstaff/petdetails');
    }*/

    public function viewPetdetails(string $a = '', string $b = '', string $c = ''): void
    {
        $userdataModel = new MedicalStaffModel();
		$data['userdata'] = $userdataModel->getMedstaffRoleDataById($_SESSION['USER']->id);
        $petdetailsModel = new PetdetailsModel();
        $data['petdetails'] = $petdetailsModel-> getPetdetailsById($a);
         // show($a);
        // die();
        $this->view('medicalstaff/petdetails/update', $data);
    }
}


