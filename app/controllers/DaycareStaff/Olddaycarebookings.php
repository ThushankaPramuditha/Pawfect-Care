<?php 

/**
 * home class
 */
class Olddaycarebookings
{
    use Controller;

    public function index()
    {
        AuthorizationMiddleware::authorize(['Daycare Staff']);
        $userdataModel = new DaycareStaffModel();
        $data['userdata'] = $userdataModel->getDaycareRoleDataById($_SESSION['USER']->id);
        
        // $daycarebookingmodel = new DaycarebookinguserModel();
        // $data['daycarebookings'] =$daycarebookingmodel->getAllOldDaycarebookings();
        $this->view('daycarestaff/olddaycarebookings', $data);
    } 

    public function search(): void
    {
        $daycarebookinguserModel = new DaycarebookinguserModel();
        $searchTerm = $_POST['search'] ?? '';
      
        $daycarebookinguser = $daycarebookinguserModel->searchforDaycareStaff($searchTerm);

        if (empty($daycarebookinguser)) {
            echo "<tr><td colspan='20'>No daycare booking found</td></tr>";
        } else {
            foreach ($daycarebookinguser as $daycarebooking) {

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
                
            }
        }
        exit; 
    }

	

}

