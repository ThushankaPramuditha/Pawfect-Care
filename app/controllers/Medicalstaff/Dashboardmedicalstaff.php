<?php 

/**
 * changepassword class
 */
class DashboardMedicalStaff
{
	use Controller;

	public function index()
	{
		AuthorizationMiddleware::authorize(['Medical Staff']);
		$userdataModel = new MedicalStaffModel();
		$data['userdata'] = $userdataModel->getMedstaffRoleDataById($_SESSION['USER']->id);

		$data['username'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->email;
		$appointmentsmodel = new Appointmentsmodel();

		// Fetch data for various metrics
		$data['appointmentbookings'] = $appointmentsmodel->counttodayallAppointments();
		$data['allappointments'] = $appointmentsmodel->getAllAppointments();
        $notificationModel = new NotificationModel();
		$data['vetnotifications'] = $notificationModel->getVetNotificationByVetUserId($_SESSION['USER']->id);

		$this->view('medicalstaff/dashboardmedicalstaff',$data);
	}

	public function cancelNotification(string $id){
        AuthorizationMiddleware::authorize(['Medical Staff']);
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
