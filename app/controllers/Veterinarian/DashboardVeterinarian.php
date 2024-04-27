<?php 

/**
 * changepassword class
 */
class DashboardVeterinarian
{
	use Controller;

	public function index()
	{
		AuthorizationMiddleware::authorize(['Veterinarian']);
		$userdataModel = new VeterinariansModel();
		$data['userdata'] = $userdataModel->getVetRoleDataById($_SESSION['USER']->id);
        
		$appointmentmodel = new Appointmentsmodel();
		$notificationModel = new NotificationModel();

		$data['counttodayallAppointments'] = $appointmentmodel->countTodayAppointments($_SESSION['USER']->id);
		$data['countweekallAppointments'] = $appointmentmodel->countweekAppointments($_SESSION['USER']->id);
		$data['vetnotifications'] = $notificationModel->getVetNotificationByUserId($_SESSION['USER']->id);

		$this->view('veterinarian/dashboardveterinarian',$data);
	}
}
