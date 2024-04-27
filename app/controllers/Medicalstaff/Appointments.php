<?php

class Appointments
{
    use Controller;

    public function index(string $a = '', string $b = '', string $c = ''): void
    {
        AuthorizationMiddleware::authorize(['Medical Staff']);
        $userdataModel = new MedicalStaffModel();
		$data['userdata'] = $userdataModel->getMedstaffRoleDataById($_SESSION['USER']->id);
        $appointmentsModel = new AppointmentsModel();
        //$data['appointments'] = $appointmentsModel->findAll();
        $data['appointments'] = $appointmentsModel->getAppointmentsForCurrentDate();
        $this->view('medicalstaff/appointments', $data);
        
    }

    public function search(): void
    {
        $appointmentsModel = new AppointmentsModel();
        $searchTerm = $_POST['search'] ?? '';
        $appointments = $appointmentsModel->searchForMedStaff($searchTerm);
        if(empty($appointments)){
            echo "<tr><td colspan='20'>No appointments found</td></tr>";
        }
        else{
            foreach ($appointments as $appointment) {
                echo "<tr key='{$appointment->id}'>";
                echo "<td>{$appointment->id}</td>";
                echo "<td>{$appointment->date_time}</td>";
                echo "<td>{$appointment->patient_no}</td>";
                echo "<td>{$appointment->pet_id}</td>";
                echo "<td>{$appointment->pet_name}</td>";
                echo "<td>{$appointment->petowner}</td>";
                echo "<td>{$appointment->contact}</td>";
                echo "<td>{$appointment->vet_name}</td>";
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

        redirect('medicalstaff/appointments');
    }*/


    /*public function add(string $a = '', string $b = '', string $c = ''): void
    {
        $appointmentsModel = new AppointmentsModel();
        $appointmentsModel->addAppointments($_POST);
        redirect('medicalstaff/appointments');
    }*/

    /*public function viewAppointments(string $a = '', string $b = '', string $c = ''): void
    {
        $appointmentsModel = new AppointmentsModel();
        $data['appointments'] = $appointmentsModel-> getAppointmentById($a);
         // show($a);
        // die();
        $this->view('medicalstaff/appointments/update', $data);
    }*/
}


