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
    
    // Call the model method to add the daycare booking
    $success = $model->addDaycarebooking($data);
    // Check the result and provide feedback
    if ($success === true) {
        // Successful insertion
        // echo "Daycare booking successfully added.";
        redirect('petowner/daycarebookinguser?true');
        //after successful booking, redirect to the services page

        
       
    } else {
        // Failed insertion
        echo "Failed to add daycare booking. Error: " . $success;
       
    }
}

}