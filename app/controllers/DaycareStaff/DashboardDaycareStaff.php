<?php 

class DashboardDaycareStaff
{
    use Controller;

    public function index()
    {
        AuthorizationMiddleware::authorize(['Daycare Staff']);
        $userdataModel = new DaycareStaffModel();
        $daycaresbookingusermodel = new DaycarebookinguserModel();
        $data['userdata'] = $userdataModel->getDaycareRoleDataById($_SESSION['USER']->id);
        $data['daycarebookings'] = $daycaresbookingusermodel->getAllDaycarebookings();

        $this->view('daycarestaff/dashboarddaycarestaff',$data);
    }



//  function to get the appointment details from the database
}

