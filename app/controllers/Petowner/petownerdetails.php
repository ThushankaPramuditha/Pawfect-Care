<?php

class PetOwnerDetails
{
    use Controller;
    
    public function index()
    {
        AuthorizationMiddleware::authorize(['Pet Owner']);
        $userdataModel = new PetownersModel();
		$data['userdata'] = $userdataModel->getPetownerRoleDataById($_SESSION['USER']->id);
        
        $this->view('petowner/petownerdetails', $data);
    }
}