<?php

class PetAmbulance
{
    use Controller;
    
    public function index()
    {
        $data['username'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->email;
        $ambulancedrivermodel = new AmbulanceDriversModel();
        $data['ambulancedrivers'] = $ambulancedrivermodel->getAllAmbulanceDrivers();
        $this->view('petowner/petambulance', $data);
    }
}