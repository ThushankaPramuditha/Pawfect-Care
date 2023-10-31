<?php

class PetOwnerDetails
{
    use Controller;
    
    public function index()
    {
        $data['username'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->email;

        $this->view('petowner/petownerdetails', $data);
    }
}