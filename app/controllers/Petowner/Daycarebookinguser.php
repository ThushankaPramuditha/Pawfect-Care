<?php
class Daycarebookinguser
{
    use Controller;

    public function index(string $a = '', string $b = '', string $c = ''): void
    {
        $daycarebookinguserModel = new DaycarebookinguserModel();
        $petsModel = new PetsModel();
        $user_id = $_SESSION['USER']->id;
        $data['pets'] = $petsModel->getAllPetsByUserId($user_id);
        $data['daycarebookinguser'] = $daycarebookinguserModel->getAllDaycarebookings();
         
    // Retrieve pet owner details from session
    $data['pet_owner_id'] = $user_id;
        $this->view('petowner/daycarebookinguser', $data);
    }

    public function addDaycarebooking()
{
    // Retrieve data from the form
    $petId = $_POST['pet_id'];
    $dropOffTime = $_POST['drop-off-time'];
    $pickUpTime = $_POST['pick-up-time'];
    $dropOffDate = $_POST['drop-off-date'];
    $listOfItems = $_POST['list-of-items'];
    $allergies = $_POST['allergies'];
    $petBehaviour = $_POST['pet-behaviour'];
    $medications = $_POST['medications'];

    $petOwnerId = $_SESSION['USER']->id;

    // Create an instance of the DaycarebookinguserModel
    $model = new DaycarebookinguserModel();

    // Prepare the data to be passed to the model method
    $data = [
        'pet_id' => $petId,
        'drop_off_time' => $dropOffTime,
        'pick_up_time' => $pickUpTime,
        'drop_off_date' => $dropOffDate,
        'list_of_items' => $listOfItems,
        'allergies' => $allergies,
        'pet_behaviour' => $petBehaviour,
        'medications' => $medications,
        'pet_owner_id' => $petOwnerId,
    ];

    // Add notification

    // Call the model method to add the daycare booking
    $success = $model->addDaycarebooking($data);
    // Check the result and provide feedback
    if ($success) {
        
        $appointment_id = $model->getLastInsertedId();
        $daycarestaffmodel = new DaycarestaffModel();
        // $daycarestaffId = $daycarestaffmodel->getDaycareStaffId();
        $notificationmodel = new NotificationModel();
        $notificationData = [
            'user_id' => $_SESSION['USER']->id,
            'receiver_id' => 'NULL',
            'message' => "Pet owner " . $_SESSION['USER']->id . " has booked a daycare service for pet $petId at $dropOffTime on $dropOffDate.",
            'type' => 'daycare',
            'appointment_id' => $appointment_id,
            'status' => 'unread'
        ];
    
        $daycarenotification = $notificationmodel->addNotification($notificationData);
    
        if ($daycarenotification !== false) {
            echo "Notification added successfully";
        } else {
            echo "Failed to add notification";
        }

        $_SESSION['flash'] = ['success' => 'Daycare Booking Added successfully.'];
        header('Location: ' . ROOT . '/petowner/daycarebookinguser');
        exit;
        
    } 
    else {
        $_SESSION['flash'] = ['error' => 'Failed to add daycare Booking.'];
        header('Location: ' . ROOT . '/petowner/daycarebookinguser');
        exit;
    }

   
    
}

}
