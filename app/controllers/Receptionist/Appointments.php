<?php 

class Appointments
{
    use Controller;

    public function index(string $a = '', string $b = '', string $c = ''): void
    {
        AuthorizationMiddleware::authorize(['Receptionist']);
        $userdataModel = new ReceptionistsModel();
        $appointmentsModel = new Appointmentsmodel();
        $vetsModel = new VeterinariansModel();

		$data['userdata'] = $userdataModel->getReceptionistRoleDataById($_SESSION['USER']->id);
        $data['veterinarians'] = $vetsModel->getAllAvailableVeterinarians(); // Fetch all vets
        $data['appointments'] = $appointmentsModel->getAllAppointments();
        
        $this->view('receptionist/appointments', $data);
    }

    public function update(string $a = '', string $b = '', string $c = ''): void
    {
        AuthorizationMiddleware::authorize(['Receptionist']);
        $userdataModel = new ReceptionistsModel();
		$data['userdata'] = $userdataModel->getReceptionistRoleDataById($_SESSION['USER']->id);

        $appointmentsModel = new Appointmentsmodel();
        $appointmentsModel->updateAppointment($a, $_POST);

        redirect('receptionist/appointments');
    }

    public function getFreeBookingSlots($vetId) {
        AuthorizationMiddleware::authorize(['Receptionist']);
        $appointmentModel = new Appointmentsmodel();
        $filledSlots = $appointmentModel->countTodayAppointments($vetId);
        $freeSlots = 3 - $filledSlots;
        echo json_encode(['filled' => $filledSlots, 'free' => $freeSlots]);

    }
  

    public function add(string $a = '', string $b = '', string $c = ''): void
    {
        AuthorizationMiddleware::authorize(['Receptionist']);
        date_default_timezone_set('Asia/Colombo');

        $userdataModel = new Receptionistsmodel();
		$data['userdata'] = $userdataModel->getReceptionistRoleDataById($_SESSION['USER']->id);

        $appointmentsModel = new AppointmentsModel();
        $success = $appointmentsModel->addAppointment($_POST);

        if($success){
            $_SESSION['flash'] = ['success' => 'Appointment added successfully.'];
            header('Location: ' . ROOT . '/receptionist/appointments');
            exit;
        } else {
            $_SESSION['flash'] = ['error' => 'Failed to add appointment.'];
            header('Location: ' . ROOT . '/receptionist/appointments');
            exit;
        }

        redirect('receptionist/appointments');
    }

    public function viewAppointments(string $a = '', string $b = '', string $c = ''):void {
        AuthorizationMiddleware::authorize(['Receptionist']);
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

    public function search(): void
    {
        $appointmentsModel = new Appointmentsmodel();
        $searchTerm = $_POST['search'] ?? '';
        $filterDate = $_POST['date'] ?? '';

        $appointments = $appointmentsModel->searchForReceptionist($searchTerm, $filterDate) ;
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
                echo "<td>{$appointment->vet_name}</td>";

                echo "</tr>";
            }
        }
        exit; 

    }

}

