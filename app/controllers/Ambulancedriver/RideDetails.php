<?php 

class RideDetails
{
	use Controller;

	public function index()
	{
		AuthorizationMiddleware::authorize(['Ambulance Driver']);
		$userdataModel = new AmbulanceDriversModel();
		$data['userdata'] = $userdataModel->getDriverRoleDataById($_SESSION['USER']->id);

		$data['username'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->email;

		$this->view('ambulancedriver/ridedetails',$data);
	}

}
