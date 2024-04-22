<?php 

/**
 * home class
 */
class Daycarebookingform
{
	use Controller;

	public function index()
	{

		$data['username'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->email;

		$this->view('daycarebookingform',$data);
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

// In Daycarebookingform controller

public function search()
{
    // Fetch bookings for the selected date
    $daycarebookinguserModel = new DaycarebookinguserModel();
    $data['daycarebookinguser'] = $daycarebookinguserModel->search($_POST);

    // Load the view with the filtered bookings data
    $this->view('components/tables/daycarebookingviewtable', $data);
}


}
