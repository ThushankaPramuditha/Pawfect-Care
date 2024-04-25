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
        $pickup_lng  = $_POST['pick-up-lng'];
        $user_id = $_SESSION['USER']->id;
        $driver_id = $_POST['driver_id'];
    
        $ambulancemodel = new AmbulanceBookingModel();
        $data = [
            'pet_id' => $pet_id,
            'pickup_lat' => $pickup_lat,
            'pickup_lng' => $pickup_lng,
            'user_id' => $user_id,
            'driver_id' => $driver_id,

        ]; // Add a semicolon here
    
        // Call the model method to add the daycare booking
        //define success variable
        
    
        $success= $ambulancemodel->addBooking($data);
    
        if ($success === true) {
            // echo "Daycare booking successfully added.";
            redirect('petowner/bookrideform?true');
            //after successful booking, redirect to the services page
    
            
           
        } else {
            // Failed insertion
            echo "Failed to add daycare booking. Error: " . $success;
           
        }
    }
    
}
