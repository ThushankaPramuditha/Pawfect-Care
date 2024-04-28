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
        $data['weekbookings'] = $ambulancebookingmodel->countWeekBookings($_SESSION['USER']->id);
        $data['recentbookings'] = $ambulancebookingmodel->getTodaysMostRecentBooking($_SESSION['USER']->id);
        $data['transportnotifications'] = $notificationModel->getTransportNotificationsByDriverId($driver_id);
        $data['driverdetails']= $userdataModel->getAmbulanceDriverById($driver_id);
        $this->view('ambulancedriver/dashboardambulancedriver', $data);
    }
    
    public function acceptBooking(string $id) : void
    {
        AuthorizationMiddleware::authorize(['Ambulance Driver']);

        $ambulancebookingmodel = new AmbulanceBookingModel();
       $recentbooking= $ambulancebookingmodel->getTodaysMostRecentBooking($_SESSION['USER']->id);
        $success = $ambulancebookingmodel->acceptBooking($id);
        
        if ($success === true) {
            $urlParams = http_build_query([
                'pet_id' => $recentbooking->pet_id,
                'date' => urlencode($recentbooking->date_time),
                'driver_id' => $recentbooking->driver_id
            ]);
            $url = '/ambulancedriver/maproute?' . $urlParams;
            
            // Redirect to the URL
            redirect($url);
        } else {
            echo "Failed to accept booking. Error: " . $success;
        }
    }

    //public function change availability
    
    public function changeAvailability($id)
    {
    
        AuthorizationMiddleware::authorize(['Ambulance Driver']);
        $driversModel = new AmbulanceDriversModel();
        $currentAvailability = $driversModel->getAmbulanceDriverById($id);
        $newAvailability = ($currentAvailability->availability) === 'available' ? 'unavailable' : 'available';
        
        $success = $driversModel->updateAvailability($id, $newAvailability);

        if ($success) {
            $_SESSION['flash'] = ['success' => 'Availability updated successfully!'];
        } else {
            $_SESSION['flash'] = ['error' => 'Failed to update availability.'];
        }

        header('Location: ' . ROOT . '/ambulancedriver/dashboardambulancedriver');
        exit;
    }

//  function to get the appointment details from the database
}
