<?php 

/**
 * home class
 */
class Daycarebookingform
{
    use Controller;

    public function index()
    {
        AuthorizationMiddleware::authorize(['Daycare Staff']);
        $userdataModel = new DaycareStaffModel();
        $data['userdata'] = $userdataModel->getDaycareRoleDataById($_SESSION['USER']->id);
        $this->view('daycarestaff/daycarebookingform', $data);
    } 

    public function viewtable()
    {
        AuthorizationMiddleware::authorize(['Daycare Staff']);
        // Check if a date is provided
        if (isset($_POST['date'])) {
            // Fetch bookings for the selected date
            $daycarebookinguserModel = new DaycarebookinguserModel();
            $data['daycarebookinguser'] = $daycarebookinguserModel->getBookingsForDate($_POST['date']);
        } else {
            // If no date is provided, fetch all bookings
            $daycarebookinguserModel = new DaycarebookinguserModel();
            $data['daycarebookinguser'] = $daycarebookinguserModel->getAllDaycarebookings();
        }
        
        // Load the view with the filtered or all bookings data
        $this->view('components/tables/daycarebookingviewtable', $data);
    }

    public function decline(string $id): void
    {  
        AuthorizationMiddleware::authorize(['Daycare Staff']);
        $daycarebookinguserModel = new DaycarebookinguserModel();
        $success = $daycarebookinguserModel->declineDaycarebooking($id);

        if ($success) {
            $_SESSION['message'] = "Daycare booking declined successfully!";
             // $petOwnerEmail = $daycarebookinguserModel->getPetOwnerEmailById($id);
            //sample email
            $petOwnerEmail = 'thushankapramuditha17@gmail.com';
            if($petOwnerEmail) {
                // Send email to the pet owner
                $subject = "Your Daycare Booking has been declined";
                // $message = "Your daycare booking has been accepted. You will receive a phone call shortly.";
                $message = "
                        <div style='color: #333; font-family: Arial, sans-serif; font-size: 16px;'>
                            <p style='font-weight: bold;'>Your daycare booking has been accepted.</p>
                            <p>You will receive a phone call shortly to confirm the details.</p>
                        </div>
                    ";
                $emailModel = new EmailModel();
                $emailModel->sendEmail($petOwnerEmail, $subject, $message);
            } else {
                // $_SESSION['error'] = "Failed to fetch pet owner email!";
            }
        } else {
            $_SESSION['error'] = "Failed to decline daycare booking!";
        }
        redirect('daycarestaff/daycarebookingform');
    }

public function accept(string $id): void
{
    AuthorizationMiddleware::authorize(['Daycare Staff']);
    $daycarebookinguserModel = new DaycarebookinguserModel();
    $success = $daycarebookinguserModel->acceptDaycarebooking($id);
     
    if ($success) {
        $_SESSION['message'] = "Daycare booking accepted successfully!";
        
        // Fetch the pet owner's email using the provided pet ID
            // $email = $daycarebookinguserModel->getPetOwnerEmail($id);

        // Add notification
         $petOwnerId = $daycarebookinguserModel->getPetOwnerId($id);
        
        //  $petOwnerEmail = $this->getPetOwnerEmailByPetId($petOwnerId);
          
          $notificationModel = new NotificationModel();
            $notificationData = [
                'user_id' => $_SESSION['USER']->id,
                'receiver_id' =>$petOwnerId,
                'message' => "Your Daycare booking accepted successfully!",
                'type' => 'daycare',
                'appointment_id' => $id,
                'status' => 'unread'
            ];
            $daycarenotification = $notificationModel->addNotification($notificationData);
            if ($daycarenotification !== false) {
                echo "Notification added successfully";
            } else {
                echo "Failed to add notification";
            }
           
            // $petOwnerEmail = $daycarebookinguserModel->getPetOwnerEmailById($id);
            //sample email
            $petOwnerEmail = 'thushankapramuditha17@gmail.com';
            if($petOwnerEmail) {
                // Send email to the pet owner
                $subject = "Your Daycare Booking has been Accepted";
                $message = "
                <div style='color: #333; font-family: Arial, sans-serif; font-size: 16px;'>
                    <p style='color: #008000; font-weight: bold;'>Your daycare booking has been accepted.</p>
                    <p>You will receive a phone call shortly to confirm the details.</p>
                </div>
            ";
                $emailModel = new EmailModel();
                $emailModel->sendEmail($petOwnerEmail, $subject, $message);
            } else {
                // $_SESSION['error'] = "Failed to fetch pet owner email!";
            }

    } else {
        $_SESSION['error'] = "Failed to accept daycare booking!";

    } 

    redirect('daycarestaff/daycarebooking');
    //    redirect('daycarestaff/daycarebookingbookingform');
}


public function getPetOwnerEmailByPetId(PDO $pdo, string $pet_id): ?string
{
    AuthorizationMiddleware::authorize(['Daycare Staff']);
    try {
        // Query to fetch pet owner's email using the provided pet ID
        $query = "SELECT po.email 
                  FROM daycarebookinguser dbu
                  JOIN pets p ON dbu.pet_id = p.id
                  JOIN petowners po ON p.petowner_id = po.id
                  WHERE dbu.pet_id = ?";
        
        $statement = $pdo->prepare($query);
        $statement->execute([$pet_id]);
        $email = $statement->fetchColumn();
        
        return $email ? $email : null;
    } catch (PDOException $e) {
        // Handle database errors here
        error_log('Error fetching pet owner email: ' . $e->getMessage());
        return null;
    }
}

	public function finish(string $id): void
	{
        AuthorizationMiddleware::authorize(['Daycare Staff']);
		$daycarebookinguserModel = new DaycarebookinguserModel();
		$success = $daycarebookinguserModel->finishDaycarebooking($id);

		if ($success) {
			$_SESSION['message'] = "Daycare booking finished successfully!";

            $petOwnerEmail = $daycarebookinguserModel->getPetOwnerEmailById($id);
            //sample email
            // $petOwnerEmail = 'thushankapramuditha17@gmail.com';
            if($petOwnerEmail) {
                // Send email to the pet owner
                $subject = "Your Daycare Booking Time has been finished";
                // $message = "<h2>Your daycare booking time has been finished. Please pick up your pet.</h2>";
                $message = "
                        <div style='color: #333; font-family: Arial, sans-serif; font-size: 16px;'>
                            <h2 style='color: #333; font-family: Arial, sans-serif; font-size: 20px; font-weight: bold;'>Attention: Your daycare booking time has ended</h2>
                            <p>Your daycare booking has come to an end. Please pick up your pet at your earliest convenience.</p>
                            <p>If you have any questions or concerns, feel free to contact us. Thank you for choosing Pawfect Care!</p>
                        </div>
                    ";
                $emailModel = new EmailModel();
                $emailModel->sendEmail($petOwnerEmail, $subject, $message);
            } else {
                // $_SESSION['error'] = "Failed to fetch pet owner email!";
                
            }

		} else {
			$_SESSION['error'] = "Failed to finish daycare booking!";
		}
		redirect('daycarestaff/daycarebookingform');
	}
    public function search(): void
    {
        $daycarebookinguserModel = new DaycarebookinguserModel();
        $searchTerm = $_POST['search'] ?? '';
        $filterDate = $_POST['date'] ?? '';
        $daycarebookinguser = $daycarebookinguserModel->searchforDaycareStaff($searchTerm, $filterDate);

        if (empty($daycarebookinguser)) {
            echo "<tr><td colspan='20'>No daycare booking found</td></tr>";
        } else {
            foreach ($daycarebookinguser as $daycarebooking) {
                // echo "<tr key='{$daycarebooking->id}' style='" . 
                // ($daycarebooking->status == 'accepted' ? 'color: #2e7d32;' : 
                // ($daycarebooking->status == 'finished' ? 'color: #FFEA00;' : 
                // ($daycarebooking->status == 'declined' ? 'color: #c62828;' : ''))) . 
                // "'>";
                echo "<tr key='{$daycarebooking->id}'>";
                echo "<td style='width: 100px;'>" . date('m/d', strtotime($daycarebooking->drop_off_date)) . "</td>";
				echo "<td>{$daycarebooking->pet_owner_name}</td>";
				echo "<td>{$daycarebooking->pet_name}</td>";
				echo "<td>{$daycarebooking->pet_owner_contact}</td>";
                echo "<td>{$daycarebooking->drop_off_time}</td>";
                echo "<td>{$daycarebooking->pick_up_time}</td>";
                echo "<td>{$daycarebooking->status}</td>";
                echo "<td>{$daycarebooking->list_of_items}</td>";
                echo "<td>{$daycarebooking->allergies}</td>";
                echo "<td>{$daycarebooking->pet_behaviour}</td>";
                echo "<td>{$daycarebooking->medications}</td>";
                echo "<td class='activate-action-buttons'>";
                echo "<button class='activate-button'>Accept</button>";
                echo "</td>";
                echo "<td class='deactivate-action-buttons'>";
                echo "<button class='deactivate-button'>Decline</button>";
                echo "</td>";
				echo "<td class='finished-action-buttons'>";
                echo "<button class='finished-button'>Finish</button>";
                echo "</td>";
                echo "</tr>";
            }
        }
        exit; 
    }

	

}

