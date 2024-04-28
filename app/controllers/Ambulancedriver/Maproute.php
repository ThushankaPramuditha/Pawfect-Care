<?php 

class Maproute
{
    use Controller;

    public function index()
    {
        AuthorizationMiddleware::authorize(['Ambulance Driver']);
        $data['username'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->email;
        $userdataModel = new AmbulanceDriversModel();
        $ambulancebookingmodel = new AmbulanceBookingModel();
        $data['userdata'] = $userdataModel->getDriverRoleDataById($_SESSION['USER']->id);
        $data['ambulancebookings'] = $ambulancebookingmodel->getAllAmbulancebookings($_SESSION['USER']->id);
        $data['todaybookings'] = $ambulancebookingmodel->countTodayBookings($_SESSION['USER']->id);
        $pet_id = $_GET['pet_id'];
        $driver_id = $_GET['driver_id'];
        // $locationData = $ambulancebookingmodel->getLocationBypetIdandTime($pet_id);
        // $data['pickup_lat'] = $locationData->pickup_lat;
        // $data['pickup_lng'] = $locationData->pickup_lng;
        $data['pickup_lat'] = $ambulancebookingmodel->getLocationBypetIdandTime($pet_id)->pickup_lat;
        $data['pickup_lng'] = $ambulancebookingmodel->getLocationBypetIdandTime($pet_id)->pickup_lng;
        $data['driverdetails']= $userdataModel->getAmbulanceDriverById($driver_id);

        $this->view('ambulancedriver/maproute',$data);
    }

    public function finishride($driverId)
    {
      
        AuthorizationMiddleware::authorize(['Ambulance Driver']);
        // $driversModel = new AmbulanceDriversModel();
        $ambulancebookingmodel = new AmbulanceBookingModel();
        $success = $ambulancebookingmodel->finishRide($driverId);

        if ($success) {
            $_SESSION['flash'] = ['success' => 'Finish Ride successfully!'];
        } else {
            $_SESSION['flash'] = ['error' => 'Failed to Finish the ride availability.'];
        }

        header('Location: ' . ROOT . '/ambulancedriver/dashboardambulancedriver');
        exit;

    }

//  function to get the appointment details from the database
}
