<?php

class Vetappointment
{
    use Controller;
    
    public function index()
    {
        $data = [];

        $this->view('vetappointment', $data);
    }
}