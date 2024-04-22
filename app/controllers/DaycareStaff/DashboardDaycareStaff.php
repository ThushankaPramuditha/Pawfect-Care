<?php 

class DashboardDaycareStaff
{
    use Controller;

    public function index()
    {

        $data['username'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->email;

        $this->view('daycarestaff/dashboarddaycarestaff',$data);
    }

//  function to get the appointment details from the database
    public function getAppointmentDetails()
    {
        $daycarebookinguserModel = new DaycarebookinguserModel();
        $data['daycarebookinguser'] = $daycarebookinguserModel->findAll();

        //display in dashboard notification section
        $this->view('daycarestaff/dashboarddaycarestaff',$data);

        // $this->view('daycarestaffdashboard',$data);
    }
}

