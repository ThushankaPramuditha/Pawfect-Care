<?php 

/**
 * home class
 */
class Daycarebooking1
{
	use Controller;
	
		public function index(string $a = '', string $b = '', string $c = ''): void
		{
			$daycarebookingModel = new DaycarebookingModel();
			$data['daycarebooking'] = $daycarebookingModel->findAll();
	
			// You can include any additional logic or data fetching here
	
			$this->view('daycarebooking1', $data);
		}
	
		public function update(string $a = '', string $b = '', string $c = ''): void
		{
			$daycarebookingModel = new DaycarebookingModel();
			$daycarebookingModel->updateDaycarebooking($a, $_POST);
	
			redirect('daycarebooking1');
		}
	
		public function add(string $a = '', string $b = '', string $c = ''): void
		{
			$daycarebookingModel = new DaycarebookingModel();
			$daycarebookingModel->addDaycarebooking($_POST);
	
			redirect('daycarebooking1');
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
			$this->view('daycarebooking1/update', $data);
		}
	

		// public function daycareslots(string $a = '', string $b = '', string $c = ''): void
		// {
		// 	$daycarebookingModel = new DaycarebookingModel();
		// 	$daycarebookingModel->addslots($_POST);
	
		// 	redirect('daycarebooking');
		// }
    
    
	}
	
	