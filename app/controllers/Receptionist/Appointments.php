<?php 

class Appointments
{
    use Controller;

    public function index(string $a = '', string $b = '', string $c = ''): void
    {
        $userdataModel = new ReceptionistsModel();
        $appointmentsModel = new Appointmentsmodel();
        $vetsModel = new VeterinariansModel();

		$data['userdata'] = $userdataModel->getReceptionistRoleDataById($_SESSION['USER']->id);
        $data['veterinarians'] = $vetsModel->getAllVeterinarians(); // Fetch all vets
        $data['appointments'] = $appointmentsModel->getAllAppointments();
        
        $this->view('receptionist/appointments', $data);
    }

    public function update(string $a = '', string $b = '', string $c = ''): void
    {
        $userdataModel = new ReceptionistsModel();
		$data['userdata'] = $userdataModel->getReceptionistRoleDataById($_SESSION['USER']->id);

        $appointmentsModel = new Appointmentsmodel();
        $appointmentsModel->updateAppointment($a, $_POST);

        redirect('receptionist/appointments');
    }

    public function getFreeBookingSlots($vetId) {
        $appointmentModel = new Appointmentsmodel();
        $filledSlots = $appointmentModel->countTodayAppointments($vetId);
        $freeSlots = 3 - $filledSlots;
        echo json_encode(['filled' => $filledSlots, 'free' => $freeSlots]);

    }
  

    public function add(string $a = '', string $b = '', string $c = ''): void
    {
        date_default_timezone_set('Your/Timezone');

        $userdataModel = new Receptionistsmodel();
		$data['userdata'] = $userdataModel->getReceptionistRoleDataById($_SESSION['USER']->id);

        $appointmentsModel = new AppointmentsModel();
        $appointmentsModel->addAppointment($_POST);

        redirect('receptionist/appointments');
    }

    public function viewAppointments(string $a = '', string $b = '', string $c = ''):void {
        $userdataModel = new Receptionistsmodel();
		$data['userdata'] = $userdataModel->getReceptionistRoleDataById($_SESSION['USER']->id);
        
        $appointmentsModel = new Appointmentsmodel();
        $data['appointments'] = $appointmentsModel->getAppointmentById($a);
        $this->view('receptionist/appointments/update', $data);
    }

    public function fetchPetdetails($petId) {
        $petsModel = new PetsModel();
        $pet = $petsModel->getAllPetsDetailsByPetId($petId);
        echo json_encode($pet);
    }

}

