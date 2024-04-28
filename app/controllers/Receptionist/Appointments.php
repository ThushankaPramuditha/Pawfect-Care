<?php 

class Appointments
{
    use Controller;

    public function index(string $a = '', string $b = '', string $c = ''): void
    {
        date_default_timezone_set('Asia/Colombo');
		$data['today'] = date('Y-m-d');


        AuthorizationMiddleware::authorize(['Receptionist']);
        $userdataModel = new ReceptionistsModel();
        $appointmentsModel = new Appointmentsmodel();
        $vetsModel = new VeterinariansModel();
        $today = date('Y-m-d');
		$data['today'] = $today;
		$data['userdata'] = $userdataModel->getReceptionistRoleDataById($_SESSION['USER']->id);
        $data['veterinarians'] = $vetsModel->getAllAvailableVeterinarians(); // Fetch all vets
        $data['appointments'] = $appointmentsModel->getAppointmentsForCurrentDate();
       
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
        AuthorizationMiddleware::authorize(['Receptionist']);

        $petsModel = new PetsModel();
        $pet = $petsModel->getAllPetsDetailsByPetId($petId);
        echo json_encode($pet);
    }

    public function updateStatus() {
        date_default_timezone_set('Asia/Colombo');

        $id = $_POST['appointmentId'];
        $status = $_POST['status'];
    
        $appointmentsModel = new AppointmentsModel();
    
        if ($status == 'current') {
            $vet = $appointmentsModel->getVetIdByAppointmentId($id);
            if ($appointmentsModel->checkAlreadyCurrent($vet->vet_id) > 0) {
                echo json_encode(['status' => 'error', 'message' => 'Vet is already attending another patient.']);
                exit;
            } else {
                $appointmentsModel->updatePatientStatus($id, $status);
                echo json_encode(['status' => 'success', 'message' => 'Appointment status updated to current.']);
                exit;
            }
        } else {
            $appointmentsModel->updatePatientStatus($id, $status);
            echo json_encode(['status' => 'success', 'message' => 'Appointment status updated.']);
            exit;
        }
    }
    

    public function search(): void
{
    $appointmentsModel = new Appointmentsmodel();
    $searchTerm = $_POST['search'] ?? '';

    $appointments = $appointmentsModel->searchForTodayReceptionist($searchTerm);
    if (empty($appointments)) {
        echo "<tr><td colspan='20'>No appointments found</td></tr>";
    } else {
        foreach ($appointments as $appointment) {
            echo "<tr key='{$appointment->id}'>";
            echo "<td>{$appointment->patient_no}</td>";
            echo "<td><select class='status-select' data-appointment-id='{$appointment->id}'>";
            echo "<option value='pending'" . ($appointment->status == 'pending' ? ' selected' : '') . ">Pending</option>";
            echo "<option value='current'" . ($appointment->status == 'current' ? ' selected' : '') . ">Current</option>";
            echo "<option value='finished'" . ($appointment->status == 'finished' ? ' selected' : '') . ">Finished</option>";
            echo "<option value='cancelled'" . ($appointment->status == 'cancelled' ? ' selected' : '') . ">Cancelled</option>";
            echo "</select></td>"; 
            echo "<td>{$appointment->vet_name}</td>";
            echo "<td>{$appointment->pet_id}</td>";
            echo "<td>{$appointment->pet_name}</td>";
            echo "<td>{$appointment->petowner}</td>";
            echo "<td>{$appointment->contact}</td>";

            echo "</tr>";
        }
    }
    exit;
}


}

