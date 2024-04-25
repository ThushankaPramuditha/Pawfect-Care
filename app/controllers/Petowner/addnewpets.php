<?php

class AddNewPets
{
    use Controller;
    
    public function index()
    {
        AuthorizationMiddleware::authorize(['Pet Owner']);
        $userdataModel = new PetownersModel();
		$data['userdata'] = $userdataModel->getPetownerRoleDataById($_SESSION['USER']->id);

        $this->view('petowner/addnewpets', $data);
    }
}