<?php

class Petambulance
{
    use Controller;
    
    public function index()
    {
        $data = [];

        $this->view('petambulance', $data);
    }
}