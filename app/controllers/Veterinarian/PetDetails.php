<?php

class Petdetails
{
    use Controller;

    public function index(string $a = '', string $b = '', string $c = ''): void
    {
        $userdataModel = new VeterinariansModel();
        $data['userdata'] = $userdataModel->getVetRoleDataById($_SESSION['USER']->id);

        $petsModel = new PetsModel();
        $petDetails = $petsModel->getAllPetDetails();

        // Calculate age for each pet
        foreach ($petDetails as $pet) {
            $pet->age = $this->calculateAge($pet->birthday);
        }

        $data['petdetails'] = $petDetails;
        $this->view('veterinarian/petdetails', $data);
    }

    public function calculateAge($birthday) {
        $dateOfBirth = new DateTime($birthday);
        $today = new DateTime('today');
        return $dateOfBirth->diff($today)->y;
    }

     /* public function update(string $a = '', string $b = '', string $c = ''): void
    {
        $petdetailsModel = new PetdetailsModel();
        $petdetailsModel->updatePetdetails($a, $_POST);

        redirect('veterinarian/petdetails');
    }*/

    /*public function add(string $a = '', string $b = '', string $c = ''): void
    {
        $petdetailsModel = new PetdetailsModel();
        $petdetailsModel->addPetdetails($_POST);
        redirect('veterinarian/petdetails');
    }*/

    /*public function viewPetdetails(string $a = '', string $b = '', string $c = ''): void
    {
        $userdataModel = new MedicalStaffModel();
		$data['userdata'] = $userdataModel->getMedstaffRoleDataById($_SESSION['USER']->id);
        $petsModel = new PetsModel();
        $data['petdetails'] = $petsModel-> getPetdetailsById($a);
         // show($a);
        // die();
        $this->view('veterinarian/petdetails/update', $data);
    }*/
    
}



   


  

    


