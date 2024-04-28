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
        //timezoneset
		date_default_timezone_set('Asia/Colombo');
		$today = date('Y-m-d');
		$data['today'] = $today;
		$appointmentmodel = new Appointmentsmodel();
		$notificationModel = new NotificationModel();
        $vetId = $appointmentmodel->getVetIdByUserId($_SESSION['USER']->id);
		$data['counttodayallAppointments'] = $appointmentmodel->countTodayAppointments($vetId);
		$data['countweekallAppointments'] = $appointmentmodel->countweekAppointments($vetId);
		// $data['current'] = $appointmentsModel->getCurrentPatient();

		$data['vetnotifications'] = $notificationModel->getVetNotificationByVetUserId($_SESSION['USER']->id);

		$this->view('veterinarian/dashboardveterinarian',$data);
	}

	public function cancelNotification(string $id){
        AuthorizationMiddleware::authorize(['Veterinarian']);
        $notificationModel = new NotificationModel();
        $success = $notificationModel->cancelNotification($id);
        if($success){
            
            echo "Notification cancelled successfully";
        }
        else{
            echo "Failed to cancel notification";
        };
    }
}
