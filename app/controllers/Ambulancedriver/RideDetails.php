<?php 

class RideDetails
{
	use Controller;

	public function index()
	{
		AuthorizationMiddleware::authorize(['Ambulance Driver']);
		$userdataModel = new AmbulanceDriversModel();
		$data['userdata'] = $userdataModel->getDriverRoleDataById($_SESSION['USER']->id);
		$ambulancebookingmodel = new AmbulanceBookingModel();
		$data['ambulancebookings'] = $ambulancebookingmodel->getAllAmbulancebookings($_SESSION['USER']->id);
		$this->view('ambulancedriver/ridedetails',$data);
	}

    public function search(): void
    {
        $ambulanceModel = new AmbulanceBookingModel();
        $searchTerm = $_POST['search'] ?? '';
        $filterDate = $_POST['date'] ?? '';

        $rides = $ambulanceModel->searchForAmbulanceDriver($searchTerm, $filterDate) ;
        if(empty($rides)){
            echo "<tr><td colspan='20'>No booking found</td></tr>";
        }
        else{
            foreach ($rides as $ride) {
				echo "<tr key='{$ride->id}'>";
				echo "<td>{$ride->petowner_id}</td>";
				echo "<td>{$ride->petowner}</td>";
                echo "<td>{$ride->contact}</td>";
				echo "<td>{$ride->pickup_lat}, {$ride->pickup_lng}</td>";
				echo "<td>{$ride->date_time}</td>";
                echo "</tr>";
            }
        }
        exit; 

    }
	

}
