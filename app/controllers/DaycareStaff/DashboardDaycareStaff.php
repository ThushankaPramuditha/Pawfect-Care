<?php 

class DashboardDaycareStaff
{
    use Controller;

    public function index()
    {

        $data['username'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->email;
        $userdataModel = new DaycareStaffModel();
        $data['userdata'] = $userdataModel->getDaycareRoleDataById($_SESSION['USER']->id);

        $this->view('daycarestaff/dashboarddaycarestaff',$data);
    }

//  function to get the appointment details from the database
}


