<?php

class Appointments
{
    use Controller;

    public function index(string $a = '', string $b = '', string $c = ''): void
    {
        $appointmentsModel = new AppointmentsModel();
        //$data['appointments'] = $appointmentsModel->findAll();
        $data['appointments'] = $appointmentsModel->getAppointmentsForVetId($a);
        $this->view('veterinarian/appointments', $data);
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



