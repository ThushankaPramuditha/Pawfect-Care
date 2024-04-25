<?php 

class DashboardDaycareStaff
{
    use Controller;

    public function index()
    {
        AuthorizationMiddleware::authorize(['Daycare Staff']);
        $userdataModel = new DaycareStaffModel();
        $daycarebookingsusermodel = new DaycarebookinguserModel();
        $data['userdata'] = $userdataModel->getDaycareRoleDataById($_SESSION['USER']->id);
        $data['daycarebookings'] = $daycarebookingsusermodel->getAllDaycarebookings();
        // get day care bookings status accepted
        $data['daycarebookingtoday'] = $daycarebookingsusermodel->countTodayBookings();
        $data['daycarebookingsaccepted'] = $daycarebookingsusermodel->countTodayacceptedBookings(); 
        $data['daycarebookingsdeclined'] = $daycarebookingsusermodel->countTodaydeclinedBookings();

        $this->view('daycarestaff/dashboarddaycarestaff',$data);
    }



//  function to get the appointment details from the database
}

