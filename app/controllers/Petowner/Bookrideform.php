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
                echo "Notification added successfully";
            } else {
                echo "Failed to add notification";
            }
            // Redirect to the services page
            redirect('petowner/bookrideform?true');
        } else {
            // Failed insertion
            echo "Failed to add ambulance booking. Error: " . $success;
        }
    }
    
    
}
