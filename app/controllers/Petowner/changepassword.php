<?php

class ChangePassword
{
    use Controller;
    
    public function index()
    {
        // $data['username'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->email;
       $data= [];

        $this->view('petowner/changepassword', $data);
    }
}