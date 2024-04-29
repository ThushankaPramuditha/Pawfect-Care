<?php


class Appointments
{
    use Controller;

    public function saveAppointment() {
        AuthorizationMiddleware::authorize(['Pet Owner']);
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
            $patient_no = $model->getPatientNo($petId);
            $vet_name = $model->getVetName($vetId);
            // Add notification
            $appointment_id = $model->getLastInsertedId();
            $notificationModel = new NotificationModel();
            $notificationData = [
                'user_id' => $_SESSION['USER']->id,
                'receiver_id' => $vetId,
                'message' => "Pet owner " . $_SESSION['USER']->id . " has booked an appointment with  $vetId at $dateTime.",
                'type' => 'vet',
                'appointment_id' => $appointment_id,
                'status' => 'unread'
            ];

            $appointmentnotification = $notificationModel->addNotification($notificationData);

            if ($appointmentnotification !== false) {
                echo "Notification added successfully";
            } else {
                echo "Failed to add notification";
            }

            // $petOwnerEmail = $model->getPetOwnerEmailById($id);
            //sample email
            $petOwnerEmail = 'thushankapramuditha17@gmail.com';
            if($petOwnerEmail) {
                // Send email to the pet owner
                $subject = "Your Vet Appointment Successfully Added.";
                // $message = "<h2>Your daycare booking time has been finished. Please pick up your pet.</h2>";
                $message = "
                <html>
                <head>
                <title>Your Vet Appointment Successfully Added.</title>
                </head>
                <body>
                <h2>Your Vet Appointment Successfully Added.</h2>
                <p>Appointment ID: $appointment_id</p>
                <p>Appointment Date: $dateTime</p>
                <p>Vet Name: $vet_name</p>
                <p>Patient No: $patient_no</p>
                </body>
                </html>
                    ";
                $emailModel = new EmailModel();
                $emailModel->sendEmail($petOwnerEmail, $subject, $message);
            } else {
                // $_SESSION['error'] = "Failed to fetch pet owner email!";
                
            }
        } else {
            echo "Failed to save appointment.";
        }
    }
    

    public function checkAvailability() {
        AuthorizationMiddleware::authorize(['Pet Owner']);
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

    public function cancel($appointment_id, $notif_id){
        AuthorizationMiddleware::authorize(['Pet Owner']);
        $model = new AppointmentsModel();
        $result = $model->updatePatientStatus($appointment_id, 'cancelled');

        $notificationModel = new NotificationModel();
        $success = $notificationModel->cancelNotification($notif_id);
        if ($result) {
            $_SESSION['flash'] = ['success' => 'Appointment successfully cancelled.'];
            header('Location: '.ROOT.'/petowner/dashboard');
            exit;
        } else {
            $_SESSION['flash'] = ['error' => 'Failed to cancel appointment.'];
            header('Location: '.ROOT.'/petowner/dashboard');
            exit;
        }
    }

    

}
