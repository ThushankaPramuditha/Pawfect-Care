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

            // Send an email to the pet owner
             $this->emailAppointment();
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

    public function emailAppointment() {
        // Fetch the logged-in user's email address from the session
        session_start(); // Start the session if it's not already started
        if (isset($_SESSION['user_email'])) {
            $email = $_SESSION['user_email'];
             
            echo $email;
            // Generate the appointment number (you might have a method to get this)
            $appointmentNumber = 12345; // Replace with the actual appointment number
    
            // Compose the email subject and message
            $subject = "Appointment Confirmation";
            $message = "Your appointment with number $appointmentNumber has been successfully scheduled.";
    
            // Create an instance of the EmailModel and send the email
            $emailModel = new EmailModel();
            if ($emailModel->sendEmail($email, $subject, $message)) {
                echo "Email sent successfully!";
            } else {
                echo "Failed to send email. Please try again later.";
            }
        } else {
            echo "User email not found in session. Please log in again.";
        }
    }
    

}
