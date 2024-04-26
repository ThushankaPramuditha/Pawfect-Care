<?php 

class DashboardDaycareStaff
{
    use Controller;

    public function index()
    {   date_default_timezone_set('Asia/Colombo');
        AuthorizationMiddleware::authorize(['Daycare Staff']);
        $userdataModel = new DaycareStaffModel();
        $daycarebookingsusermodel = new DaycarebookinguserModel();
        $data['userdata'] = $userdataModel->getDaycareRoleDataById($_SESSION['USER']->id);
        $data['daycarebookings'] = $daycarebookingsusermodel->getAllDaycarebookings();
        // get day care bookings status accepted
        $data['daycarebookingtoday'] = $daycarebookingsusermodel->countTodayBookings();
        $data['daycarebookingsaccepted'] = $daycarebookingsusermodel->countTodayacceptedBookings(); 
        $data['daycarebookingsdeclined'] = $daycarebookingsusermodel->countTodaydeclinedBookings();
        $notificationModel = new NotificationModel();
        $data['daycarenotifications'] = $notificationModel->getDaycareNotifications();

        $this->view('daycarestaff/dashboarddaycarestaff',$data);
    }



//  function to get the appointment details from the database
}

