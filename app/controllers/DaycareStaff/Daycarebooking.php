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
        $userdataModel = new DaycareStaffModel();
        $data['userdata'] = $userdataModel->getDaycareRoleDataById($_SESSION['USER']->id);
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


}
	
	