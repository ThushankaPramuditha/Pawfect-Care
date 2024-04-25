<?php

class Petdetails
{
    use Controller;

    public function index(string $a = '', string $b = '', string $c = ''): void
    {
        AuthorizationMiddleware::authorize(['Medical Staff']);
        $userdataModel = new MedicalStaffModel();
        $data['userdata'] = $userdataModel->getMedstaffRoleDataById($_SESSION['USER']->id);

        $petsModel = new PetsModel();
        $petDetails = $petsModel->getAllPetDetails();

        // Calculate age for each pet
        foreach ($petDetails as $pet) {
            $pet->age = $this->calculateAge($pet->birthday);
        }

        $data['petdetails'] = $petDetails;
        $this->view('medicalstaff/petdetails', $data);
    }

    public function calculateAge($birthday) {
        AuthorizationMiddleware::authorize(['Medical Staff']);
        $dateOfBirth = new DateTime($birthday);
        $today = new DateTime('today');
        return $dateOfBirth->diff($today)->y;
    }


    /*public function viewPetdetails(string $a = '', string $b = '', string $c = ''): void
    {
        $userdataModel = new MedicalStaffModel();
		$data['userdata'] = $userdataModel->getMedstaffRoleDataById($_SESSION['USER']->id);
        $petsModel = new PetsModel();
        $data['petdetails'] = $petsModel-> getPetdetailsById($a);
         // show($a);
        // die();
        $this->view('medicalstaff/petdetails/update', $data);
    }*/
    
}


