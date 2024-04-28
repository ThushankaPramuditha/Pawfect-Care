<?php
class Bookrideform
{
    use Controller;

    public function index(string $a = '', string $b = '', string $c = ''): void
    {
       
        $petsModel = new PetsModel();
        $ambulancedrivermodel = new AmbulanceDriversModel();
        $user_id = $_SESSION['USER']->id;
        $data['pets'] = $petsModel->getAllPetsByUserId($user_id);
        $data['ambulancedrivers'] = $ambulancedrivermodel->getAllAmbulanceDrivers();
         
    $data['user_id'] = $user_id;
        $this->view('petowner/bookrideform', $data);
    }

    public function addBooking()
    {
        // Retrieve data from the form
        $pet_id = $_POST['pet_id'];
        $pickup_lat = $_POST['pick-up-lat'];
        $pickup_lng = $_POST['pick-up-lng'];
        $user_id = $_SESSION['USER']->id;
        $driver_id = $_POST['driver_id'];
        
       
    
        $ambulancemodel = new AmbulanceBookingModel();
        $date_time = date('Y-m-d H:i:s');
        $data = [
            'pet_id' => $pet_id,
            'pickup_lat' => $pickup_lat,
            'pickup_lng' => $pickup_lng,
            'user_id' => $user_id,
            'driver_id' => $driver_id,
            'message' => "petId : $pet_id booked an ambulance ride to $pickup_lat $pickup_lng at $date_time for$driver_id ",
    
        ];
    
        // Call the model method to add the ambulance booking
        $success = $ambulancemodel->addBooking($data);
    
        // Check if the booking was successful
        if ($success === true) {
            // Retrieve the ID of the newly added ambulance booking
            $appointment_id = $ambulancemodel->getLastInsertedId();
    
            // If booking was successful, add notification
            $notificationmodel = new NotificationModel();
            $notificationData = [
                'user_id' => $user_id,
                'receiver_id' => $driver_id,
                'message' => $data['message'],
                'type' => 'transport',
                'appointment_id' => $appointment_id,
                'status' => 'unread'
            ];
    
            $transportnotification = $notificationmodel->addNotification($notificationData);
    
            if ($transportnotification !== false) {  
              // $petOwnerEmail = $model->getPetOwnerEmailById($id);
              //sample email
               $petOwnerEmail = 'thushankapramuditha17@gmail.com';
                if($petOwnerEmail) {
                    // Send email to the pet owner
                   
                    $subject = "Ambulance Booking Confirmation";
                    $message = "
                    <html>
                    <head>
                    <title>Ambulance Facility Booking</title>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            font-size: 16px;
                            line-height: 1.6;
                            color: #333;
                        }
                        .container {
                            max-width: 600px;
                            margin: 0 auto;
                            padding: 20px;
                            border: 1px solid #ccc;
                            border-radius: 5px;
                            background-color: #f9f9f9;
                        }
                        h2 {
                            color: #6a3879;
                        }
                        p {
                            margin-bottom: 20px;
                        }
                    </style>
                    </head>
                    <body>
                    <div class='container'>
                        <h2>Thank You for Booking an Ambulance</h2>
                        <p>We have received your ambulance booking request. Our team is processing your request, and you will receive a confirmation email shortly.</p>
                        <p>Your Booking Details:</p>
                        <ul>
                            <li><strong>Pet ID:</strong> $pet_id</li>
                            <li><strong>Driver ID:</strong> $driver_id</li>
                            <li><strong>Pickup Date & Time:</strong> $date_time</li>
                        </ul>
                        <p>If you have any questions or need further assistance, please feel free to contact us.</p>
                        <p>Contact No: 011-1234567</p>
                        <p>Thank you for choosing our ambulance service.</p>
                    </div>
                    </body>
                    </html>
                    ";
                    
                    $emailModel = new EmailModel();
                    $emailModel->sendEmail($petOwnerEmail, $subject, $message);
                } else {
                    // $_SESSION['error'] = "Failed to fetch pet owner email!";
                    
                }
                echo "Notification added successfully";
            } else {
                echo "Failed to add notification";
            }
            // Redirect to the services page
            redirect('petowner/bookrideform?true');
        } 
        
        else {
            // Failed insertion
            echo "Failed to add ambulance booking. Error: " . $success;
        }
    }
    
    
}
