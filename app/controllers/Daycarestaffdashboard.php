<?php 

class DaycarestaffDashboard
{
    use Controller;

    public function index()
    {

        $data['username'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->email;

        $this->view('daycarestaffdashboard',$data);
    }

//  function to get the appointment details from the database
    public function getAppointmentDetails()
    {
        $daycarebookinguserModel = new DaycarebookinguserModel();
        $data['daycarebookinguser'] = $daycarebookinguserModel->findAll();

        //display in dashboard notification section
        $this->view('daycarestaffdashboard',$data);

        // $this->view('daycarestaffdashboard',$data);
    }
}

