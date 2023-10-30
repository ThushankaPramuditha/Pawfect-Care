<?php

class PetDetails
{
    use Controller;
    
    public function index()
    {
        $data = [];

        $this->view('petdetails', $data);
    }
}