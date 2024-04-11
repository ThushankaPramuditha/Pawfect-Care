<?php 

/**
 * home class
 */
class Daycarebooking
{
	use Controller;
	
		public function index(string $a = '', string $b = '', string $c = ''): void
		{
			$daycarebookingModel = new DaycarebookingModel();
			$data['daycarebooking'] = $daycarebookingModel->findAll();
	
			// You can include any additional logic or data fetching here
	
			$this->view('daycarebooking', $data);
		}
	
		public function update(string $a = '', string $b = '', string $c = ''): void
		{
			$daycarebookingModel = new DaycarebookingModel();
			$daycarebookingModel->updateDaycarebooking($a, $_POST);
	
			redirect('daycarebooking');
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
	
			redirect('daycarebooking');
		}

}
	
	