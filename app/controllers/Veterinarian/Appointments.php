<?php

class Appointments
{
    use Controller;

    public function index(string $a ='',string $b = '', string $c = ''): void
	{
        AuthorizationMiddleware::authorize(['Veterinarian']);
		$userdataModel = new VeterinariansModel();
		$data['userdata'] = $userdataModel->getVetRoleDataById($_SESSION['USER']->id);

        $vetId = $data['userdata']->id;
        $appointmentsModel = new AppointmentsModel();
        //$data['appointments'] = $appointmentsModel->findAll();
        $data['appointments'] = $appointmentsModel->getAppointmentsForVetId($vetId);
		$this->view('veterinarian/appointments',$data);
	}

    public function search(): void
    {
        $appointmentsModel = new AppointmentsModel();
        $searchTerm = $_POST['search'] ?? '';
        $vetId = $_POST['vetId'] ?? '';
        $appointments = $appointmentsModel->searchForVet($searchTerm,$vetId);
        if(empty($appointments)){
            echo "<tr><td colspan='20'>No appointments found</td></tr>";
        }
        else{
            foreach ($appointments as $appointment) {
                echo "<tr key='{$appointment->id}'>";
                echo "<td>{$appointment->date_time}</td>";
                echo "<td>{$appointment->patient_no}</td>";
                echo "<td>{$appointment->pet_id}</td>";
                echo "<td>{$appointment->pet_name}</td>";
                echo "<td>{$appointment->petowner}</td>";
                echo "<td>{$appointment->contact}</td>";
                echo "<td>{$appointment->status}</td>";
               
                echo "</tr>";
            }
        }
        exit; 

    }


    /* public function update(string $a = '', string $b = '', string $c = ''): void
    {
        $appointmentsModel = new AppointmentsModel();
        $appointmentsModel->updateAppointments($a, $_POST);

        redirect('veterinarian/appointments');
    }*/


    /*public function add(string $a = '', string $b = '', string $c = ''): void
    {
        $appointmentsModel = new AppointmentsModel();
        $appointmentsModel->addAppointments($_POST);
        redirect('veterinarian/appointments');
    }*/

    /*public function viewAppointments(string $a = '', string $b = '', string $c = ''): void
    {
        $appointmentsModel = new AppointmentsModel();
        $data['appointments'] = $appointmentsModel-> getAppointmentById($a);
         // show($a);
        // die();
        $this->view('veterinarian/appointments/update', $data);
    }*/
}



