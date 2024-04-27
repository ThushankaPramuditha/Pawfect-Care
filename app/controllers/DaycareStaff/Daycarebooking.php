<?php 

/**
 * home class
 */
class Daycarebooking
{
	use Controller;
	
		public function index(string $a = '', string $b = '', string $c = ''): void
		{
			AuthorizationMiddleware::authorize(['Daycare Staff']);
			$daycarebookingModel = new DaycarebookingModel();
			$data['daycarebooking'] = $daycarebookingModel->findAll();
	
			// You can include any additional logic or data fetching here
	
			$this->view('daycarestaff/daycarebooking', $data);
		}
	
		public function update(string $a = '', string $b = '', string $c = ''): void
		{
			$daycarebookingModel = new DaycarebookingModel();
			$daycarebookingModel->updateDaycarebooking($a, $_POST);
	
			redirect('daycarestaff/daycarebooking');
		}
	
		public function add(string $a = '', string $b = '', string $c = ''): void
		{
			$daycarebookingModel = new DaycarebookingModel();
			$daycarebookingModel->addDaycarebooking($_POST);
	
			redirect('daycarebooking');
		}
	
		// public function delete(string $id): void
		// {
		//     $appointmentsModel = new AppointmentsModel();
		//     $appointmentsModel->delete($id, 'id');
	
		//     redirect('receptionist/appointments');
		// }
	
		public function viewDaycareslots(string $a = '', string $b = '', string $c = ''):void {
			$daycarebookingModel = new DaycarebookingModel();
			$data['daycarebooking'] = $daycarebookingModel->getDaycarebookingById($a);
			$this->view('daycarebooking/update', $data);
		}
	

		public function bookSlots(string $bookingId): void
		{
			$daycarebookingModel = new DaycarebookingModel();
			$daycarebookingModel->updateslots($bookingId);
	}   
        
		public function cancelBooking(string $bookingId): void
		{
			$daycarebookingModel = new DaycarebookingModel();
			$daycarebookingModel->cancelBooking($bookingId);
		}
	
		public function validate(string $a = '', string $b = '', string $c = ''): void
		{
			$daycarebookingModel = new DaycarebookingModel();
			$daycarebookingModel->validate($_POST);
	
			redirect('daycarestaff/daycarebooking');
		}

		public function search(): void
    {
        $daycarebookingModel = new DaycarebookingModel();
        $searchTerm = $_POST['search'] ?? '';
        $daycarebooking = $daycarebookingModel->search($searchTerm);

        if (empty($daycarebooking)) {
            echo "<tr><td colspan='20'>No daycare booking found</td></tr>";
        } else {
            foreach ($daycarebooking as $dbooking) {
                echo "<tr key='{$dbooking->id}'>";
                echo "<td>{$dbooking->filled_slots}</td>";
				echo "<td>{$dbooking->free_slots}</td>";
                echo "</tr>";
            }
        }
        exit; 
    }

}
	
	