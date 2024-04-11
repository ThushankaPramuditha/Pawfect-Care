<?php

class SelectVeterinarian
{
    use Controller;
    
    public function index() {
        $petsModel = new PetsModel();
        // Assuming you have the user's ID in session or passed somehow
        $id = $_SESSION['USER']->id; 
        $data['pets'] = $petsModel->getAllPetsByUserId($id);
        // $data['username'] = !empty($_SESSION['USER']) ? $_SESSION['USER']->email : 'User';

        $this->view('petowner/selectveterinarian', $data);


        
    }


}