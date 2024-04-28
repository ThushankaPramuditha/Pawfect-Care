<?php 

class OldAppointments
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
        $data['appointments'] = $appointmentsModel->getAllAppointments();
       
        $this->view('receptionist/oldappointments', $data);
    }

    

    public function search(): void
{
    $appointmentsModel = new Appointmentsmodel();
    $searchTerm = $_POST['search'] ?? '';
    $filterDate = $_POST['date'] ?? '';

    $appointments = $appointmentsModel->searchForReceptionist($searchTerm, $filterDate);
    if (empty($appointments)) {
        echo "<tr><td colspan='20'>No appointments found</td></tr>";
    } else {
        foreach ($appointments as $appointment) {
            echo "<tr key='{$appointment->id}'>";
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


}

