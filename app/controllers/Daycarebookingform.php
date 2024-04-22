<?php 

/**
 * home class
 */
class Daycarebookingform
{
    use Controller;

    public function index()
    {
        $data['username'] = isset($_SESSION['USER']) ? $_SESSION['USER']->email : 'User';
        $this->view('daycarebookingform', $data);
    } 

    public function viewtable()
    {
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
        $daycarebookinguserModel = new DaycarebookinguserModel();
        $success = $daycarebookinguserModel->declineDaycarebooking($id);

        if ($success) {
            $_SESSION['message'] = "Daycare booking declined successfully!";
        } else {
            $_SESSION['error'] = "Failed to decline daycare booking!";
        }
        redirect('daycarebookingform');
    }

public function accept(string $id): void
{
    $daycarebookinguserModel = new DaycarebookinguserModel();
    $success = $daycarebookinguserModel->acceptDaycarebooking($id);
     
    if ($success) {
        $_SESSION['message'] = "Daycare booking accepted successfully!";
        
        // Fetch the pet owner's email using the provided pet ID
            $email = $daycarebookinguserModel->getPetOwnerEmail($id);
            if($email) {
            // Send email to the pet owner
            $subject = "Your Daycare Booking has been Accepted";
            $message = "Your daycare booking has been accepted. You will receive a phone call shortly.";
            $emailModel = new EmailModel();
            $emailModel->sendEmail($email, $subject, $message);
        } else {
            $_SESSION['error'] = "Failed to fetch pet owner email!";
        }
    } else {
        $_SESSION['error'] = "Failed to accept daycare booking!";

    } 
    

    //redirect to daycarebooking
    redirect('daycarebooking');
}


public function getPetOwnerEmailByPetId(PDO $pdo, string $pet_id): ?string
{
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

	public function finished(string $id): void
	{
		$daycarebookinguserModel = new DaycarebookinguserModel();
		$success = $daycarebookinguserModel->finishDaycarebooking($id);

		if ($success) {
			$_SESSION['message'] = "Daycare booking finished successfully!";
		} else {
			$_SESSION['error'] = "Failed to finish daycare booking!";
		}
		redirect('daycarebooking');
	}
    public function search(): void
    {
        $daycarebookinguserModel = new DaycarebookinguserModel();
        $searchTerm = $_POST['search'] ?? '';
        $daycarebookinguser = $daycarebookinguserModel->search($searchTerm);

        if (empty($daycarebookinguser)) {
            echo "<tr><td colspan='20'>No daycare booking found</td></tr>";
        } else {
            foreach ($daycarebookinguser as $daycarebooking) {
                echo "<tr key='{$daycarebooking->id}'>";
                echo "<td>{$daycarebooking->drop_off_date}</td>";
				echo "<td>{$daycarebooking->pet_owner_name}</td>";
				echo "<td>{$daycarebooking->pet_name}</td>";
				echo "<td>{$daycarebooking->pet_owner_contact}</td>";
                echo "<td>{$daycarebooking->drop_off_time}</td>";
                echo "<td>{$daycarebooking->pick_up_time}</td>";
                echo "<td>{$daycarebooking->list_of_items}</td>";
                echo "<td>{$daycarebooking->allergies}</td>";
                echo "<td>{$daycarebooking->pet_behaviour}</td>";
                echo "<td>{$daycarebooking->medications}</td>";
				echo "<td>{$daycarebooking->status}</td>";
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

	public function searchByDate(): void
{
    $daycarebookinguserModel = new DaycarebookinguserModel();
    $searchDate = $_POST['date'] ?? '';
    $daycarebookinguser = $daycarebookinguserModel->searchByDate($searchDate);

    if (empty($daycarebookinguser)) {
        echo "<tr><td colspan='20'>No daycare booking found</td></tr>";
    } else {
        foreach ($daycarebookinguser as $daycarebooking) {
            echo "<tr key='{$daycarebooking->id}'>";
            echo "<td>{$daycarebooking->drop_off_date}</td>";
            echo "<td>{$daycarebooking->pet_owner_name}</td>";
            echo "<td>{$daycarebooking->pet_name}</td>";
            echo "<td>{$daycarebooking->pet_owner_contact}</td>";
            echo "<td>{$daycarebooking->drop_off_time}</td>";
            echo "<td>{$daycarebooking->pick_up_time}</td>";
            echo "<td>{$daycarebooking->list_of_items}</td>";
            echo "<td>{$daycarebooking->allergies}</td>";
            echo "<td>{$daycarebooking->pet_behaviour}</td>";
            echo "<td>{$daycarebooking->medications}</td>";
            echo "<td>{$daycarebooking->status}</td>";
            echo "<td class='activate-action-buttons'>";
            echo "<button class='activate-button'>Activate</button>";
            echo "</td>";
            echo "<td class='deactivate-action-buttons'>";
            echo "<button class='deactivate-button'>Deactivate</button>";
            echo "</td>";
            echo "</tr>";
        }
    }
    exit;
}

}

