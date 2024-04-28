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
        $data['current'] = $appointmentsModel->getCurrentPatient();
        

        $notificationModel = new NotificationModel();
        $data['vetnotifications'] = $notificationModel->getVetAppointmentNotifications();
 

    
        $this->view('receptionist/dashboardreceptionist',$data);
    }

}
