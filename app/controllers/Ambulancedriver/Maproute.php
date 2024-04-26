<?php 

class Maproute
{
    use Controller;

    public function index()
    {

        $data['username'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->email;
        $userdataModel = new AmbulanceDriversModel();
        $ambulancebookingmodel = new AmbulanceBookingModel();
        $data['userdata'] = $userdataModel->getDriverRoleDataById($_SESSION['USER']->id);
        $data['ambulancebookings'] = $ambulancebookingmodel->getAllAmbulancebookings($_SESSION['USER']->id);
        $data['todaybookings'] = $ambulancebookingmodel->countTodayBookings($_SESSION['USER']->id);
        $pet_id = $_GET['pet_id'];
        $locationData = $ambulancebookingmodel->getLocationBypetIdandTime($pet_id);
        $data['pickup_lat'] = $locationData->pickup_lat;
        $data['pickup_lng'] = $locationData->pickup_lng;
        // $data['daycarebookings'] = $daycaresbookingusermodel->getAllDaycarebookings();
        $this->view('ambulancedriver/maproute',$data);
    }

//  function to get the appointment details from the database
}
