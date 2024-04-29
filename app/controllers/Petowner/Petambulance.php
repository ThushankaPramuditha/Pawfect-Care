<?php

class PetAmbulance
{
    use Controller;
    
    public function index()
    {

        $data['username'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->email;
        $ambulancedrivermodel = new AmbulanceDriversModel();
        $data['ambulancedrivers'] = $ambulancedrivermodel->getAllAmbulanceDrivers();
        $data['availableambulancedrivers'] = $ambulancedrivermodel->getAvailableAmbulanceDrivers();

        AuthorizationMiddleware::authorize(['Pet Owner']);
        $userdataModel = new PetownersModel();
		$data['userdata'] = $userdataModel->getPetownerRoleDataById($_SESSION['USER']->id);

        $this->view('petowner/petambulance', $data);
    }
}