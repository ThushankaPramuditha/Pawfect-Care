<?php


class Appointments
{
    use Controller;

    public function saveAppointment() {
        date_default_timezone_set('Asia/Colombo');
    
        $petId = $_POST['pet_id'];
        $vetId = $_POST['vet_id'];
        $dateTime = $_POST['date_time'];  // Adjust based on actual input and needs
    
        $model = new AppointmentsModel();
        $result = $model->addAppointment([
            'pet_id' => $petId,
            'vet_id' => $vetId,
            'date_time' => $dateTime
        ]);
    
        if ($result) {
            echo "Appointment successfully saved.";
        } else {
            echo "Failed to save appointment.";
        }
    }
    

    // In your Appointments controller
    public function checkAvailability() {
        date_default_timezone_set('Asia/Colombo');

        
        $vetId = $_POST['vet_id'];
    
        $model = new AppointmentsModel();
        $appointmentsToday = $model->countTodayAppointments($vetId);
        
        if ($appointmentsToday >= 3) {
            echo json_encode(['status' => 'full']);
        } else {
            echo json_encode(['status' => 'available', 'count' => $appointmentsToday]);
        }
    }

}
