<?php

class SelectVeterinarian
{
    use Controller;
    
    public function index() {
        $petsModel = new PetsModel();
        $vetsModel = new VeterinariansModel(); // Assuming you have a VeterinariansModel
        
        // Fetch pets and veterinarians
        $user_id = $_SESSION['USER']->id;
        $data['pets'] = $petsModel->getAllPetsByUserId($user_id);
        $data['veterinarians'] = $vetsModel->getAllVeterinarians(); // Fetch all vets
        

        $this->view('petowner/selectveterinarian', $data);


        
    }


}