<?php 

class Appointments
{
    use Controller;

    public function index(string $a = '', string $b = '', string $c = ''): void
    {
        $appointmentsModel = new AppointmentsModel();
        // show($servicesModel->findAll());
        $data['appointments'] = $appointmentsModel->findAll();

        // You can include any additional logic or data fetching here

        $this->view('receptionist/appointments', $data);
    }

    public function update(string $a = '', string $b = '', string $c = ''): void
    {
        $appointmentsModel = new AppointmentsModel();
        $appointmentsModel->updateAppointment($a, $_POST);

        redirect('receptionist/appointments');
    }

    public function add(string $a = '', string $b = '', string $c = ''): void
    {
        $appointmentsModel = new AppointmentsModel();
        $appointmentsModel->addAppointment($_POST);

        redirect('receptionist/appointments');
    }

    // public function delete(string $id): void
    // {
    //     $appointmentsModel = new AppointmentsModel();
    //     $appointmentsModel->delete($id, 'id');

    //     redirect('receptionist/appointments');
    // }

    public function viewAppointments(string $a = '', string $b = '', string $c = ''):void {
        $appointmentsModel = new AppointmentsModel();
        $data['appointments'] = $appointmentsModel->getAppointmentById($a);
        $this->view('receptionist/appointments/update', $data);
    }

}

