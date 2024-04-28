<?php 

class DashboardReceptionist
{
    use Controller;

    public function index()
    {
        AuthorizationMiddleware::authorize(['Receptionist']);
        $userdataModel = new ReceptionistsModel();
		$data['userdata'] = $userdataModel->getReceptionistRoleDataById($_SESSION['USER']->id);
        $veterinariansModel = new VeterinariansModel();
        $data['veterinarians'] = $veterinariansModel->getAllVeterinarians();
        $appointmentsModel = new Appointmentsmodel();
        $data['allappointments'] = $appointmentsModel->counttodayallAppointments();
        $notificationModel = new NotificationModel();
        $data['vetnotifications'] = $notificationModel->getVetAppointmentNotifications();
    
        $this->view('receptionist/dashboardreceptionist',$data);
    }

    public function cancelNotification(string $id){
        AuthorizationMiddleware::authorize(['Receptionist']);
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
