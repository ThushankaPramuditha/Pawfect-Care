<?php


class Appointments
{
    use Controller;

    public function saveAppointment() {

        $petId = $_POST['pet_id'];
        $vetId = $_POST['vet_id'];
        $dateTime = $_POST['date_time'];  // Assuming the date_time is sent in a valid SQL format

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
        $model = new AppointmentsModel();
        $appointmentsToday = $model->countTodayAppointments();
        if ($appointmentsToday >= 3) {
            echo json_encode(['status' => 'full']);
        } else {
            echo json_encode(['status' => 'available', 'count' => $appointmentsToday]);
        }
    }

}
