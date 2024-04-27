<?php 

class Dashboardambulancedriver
{
    use Controller;

    public function index() {
        AuthorizationMiddleware::authorize(['Ambulance Driver']);

        $data['username'] = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        $userdataModel = new AmbulanceDriversModel();
        $ambulancebookingmodel = new AmbulanceBookingModel();
        $notificationModel = new NotificationModel();
        $driver_id = $userdataModel-> getAmbulanceDriverIdByUserId($_SESSION['USER']->id);

        $data['userdata'] = $userdataModel->getDriverRoleDataById($_SESSION['USER']->id);
        $data['ambulancebookings'] = $ambulancebookingmodel->getAllAmbulancebookings($_SESSION['USER']->id);
        $data['todaybookings'] = $ambulancebookingmodel->countTodayBookings($_SESSION['USER']->id);
        $data['recentbookings'] = $ambulancebookingmodel->getTodaysMostRecentBooking($_SESSION['USER']->id);
        $data['transportnotifications'] = $notificationModel->getTransportNotificationsByDriverId($driver_id);
        $this->view('ambulancedriver/dashboardambulancedriver', $data);
    }
    
    public function acceptBooking(string $id) : void
    {
        AuthorizationMiddleware::authorize(['Ambulance Driver']);

        $ambulancebookingmodel = new AmbulanceBookingModel();
        $success = $ambulancebookingmodel->acceptBooking($id);
        
        if ($success === true) {
            redirect('ambulancedriver/dashboardambulancedriver');
        } else {
            echo "Failed to accept booking. Error: " . $success;
        }
    }

//  function to get the appointment details from the database
}
