<?php 

class AppointmentHistory
{
	use Controller;

    public function index(string $a = '', string $b = '', string $c = ''): void
    {
        AuthorizationMiddleware::authorize(['Pet Owner']);
        $this->view('petowner/appointmenthistory');
    }


	public function getAppointmentData($id)
	{
        AuthorizationMiddleware::authorize(['Pet Owner']);
      
        $appModel = new Appointmentsmodel();
        $data['appointmenthistory']  = $appModel->getAppointmentsForPetId($id);
       
        
        $this->view('petowner/appointmenthistory', $data);    
	}

    
    
}


    


?>