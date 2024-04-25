<?php 

class RideDetails
{
	use Controller;

	public function index()
	{
		AuthorizationMiddleware::authorize(['Ambulance Driver']);
		$userdataModel = new AmbulanceDriversModel();
		$data['userdata'] = $userdataModel->getDriverRoleDataById($_SESSION['USER']->id);

		$this->view('ambulancedriver/ridedetails',$data);
	}

}
