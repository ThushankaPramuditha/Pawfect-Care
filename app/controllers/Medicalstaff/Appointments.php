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

   /* public function update(string $a = '', string $b = '', string $c = ''): void
    {
        $appointmentsModel = new AppointmentsModel();
        $appointmentsModel->updateAppointments($a, $_POST);

        redirect('medicalstaff/appointments');
    }*/

    /*public function update(string $id = ''): void
    {
        $appointmentsModel = new AppointmentsModel();
        
        // Fetch the vaccination history by ID
        $data['appointments'] = $appointmentsModel->getAppointmentsById($id);

        // Check if the history data is available
        if (!$data['appointments']) {
            // Redirect or handle the case where data is not found
            redirect('medicalstaff/appointments');
        }

        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Perform the update
            $appointmentsModel->updateAppointments($id, $_POST);
            // Redirect after update
            redirect('medicalstaff/appointments');
        }

        // Load the update view
        $this->view('medicalstaff/appointments/update', $data);
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


