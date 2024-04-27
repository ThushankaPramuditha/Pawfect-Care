<?php 

class DashboardDaycareStaff
{
    use Controller;

    public function index()
    {   date_default_timezone_set('Asia/Colombo');
        AuthorizationMiddleware::authorize(['Daycare Staff']);
        $userdataModel = new DaycareStaffModel();
        $daycarebookingsusermodel = new DaycarebookinguserModel();
        $notificationModel = new NotificationModel();

        $data['userdata'] = $userdataModel->getDaycareRoleDataById($_SESSION['USER']->id);
      
        //  get all bookings
        $data['daycarebookings'] = $daycarebookingsusermodel->getAllDaycarebookings();
        //get todaybookings
        $data['daycarebookingtoday'] = $daycarebookingsusermodel->countTodayBookings();
        $data['daycarebookingsaccepted'] = $daycarebookingsusermodel->countTodayacceptedBookings(); 
        $data['daycarebookingsdeclined'] = $daycarebookingsusermodel->countTodaydeclinedBookings();

        //get week bookings
        $week1count = $daycarebookingsusermodel->countDaycareBookingForWeek(1);
        $week2count = $daycarebookingsusermodel->countDaycareBookingForWeek(2);
        $week3count = $daycarebookingsusermodel->countDaycareBookingForWeek(3);
        $week4count = $daycarebookingsusermodel->countDaycareBookingForWeek(4);
        
        //Pass weeklycount
        $data['week1count'] = $week1count;
        $data['week2count'] = $week2count;
        $data['week3count'] = $week3count;
        $data['week4count'] = $week4count;

        //get all notifications
        $data['daycarenotifications'] = $notificationModel->getDaycareNotifications();

        $this->view('daycarestaff/dashboarddaycarestaff',$data);
    }



//  function to get the appointment details from the database
}

