<?php 

/**
 * Dashboard Services Class
 */
class DashboardServices
{
	use Controller;

	public function index()
	{
		$data['username'] = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
		$daycaresbookingusermodel = new DaycarebookinguserModel();
		$appointmentsmodel = new Appointmentsmodel();
		$ambulancebookingmodel = new AmbulancebookingModel();
		$feedbacksmodel = new FeedbacksModel();
		$petownerModel = new PetownersModel();
	
		// Fetch data for various metrics
		$data['appointmentbookings'] = $appointmentsmodel->counttodayallAppointments();
		$data['todaydaycarebookings'] = $daycaresbookingusermodel->countTodayBookings();
		$data['weeekdaycarebookings'] = $daycaresbookingusermodel->countweekallBookings();
		$data['weekappointments'] = $appointmentsmodel->countweekallAppointments();
		$data['weekambulancebookings'] = $ambulancebookingmodel->countweekallAmbulancebookings();
		$data['daycarebookings'] = $daycaresbookingusermodel->getAllDaycarebookings();
        $data['ambulancebookings'] = $ambulancebookingmodel->countTodayAmbulancebookings();
		$data['feedbacks'] = $feedbacksmodel-> getNotPostedFeedbacks();
		$data['petownercount'] = $petownerModel->petownerCount();
		
		// Calculate weekly income
		$week1Income = $appointmentsmodel->incomeFromAppointmentsForWeek(1);
		$week2Income = $appointmentsmodel->incomeFromAppointmentsForWeek(2);
		$week3Income = $appointmentsmodel->incomeFromAppointmentsForWeek(3);
		$week4Income = $appointmentsmodel->incomeFromAppointmentsForWeek(4);
	
		// Pass weekly income data to the view
		$data['week1Income'] = $week1Income;
		$data['week2Income'] = $week2Income;
		$data['week3Income'] = $week3Income;
		$data['week4Income'] = $week4Income;
	
		// $this->view('admin/dashboardservices', $data);


		AuthorizationMiddleware::authorize(['Admin']);

		$this->view('admin/dashboardservices',$data);

	}
	

	public function getIncomeForWeek($week) {
        $appointmentsModel = new AppointmentsModel();
        $income = $appointmentsModel->incomeFromAppointmentsForWeek($week);
        return $income;
    }
    
	public function cancelNotification(string $id){
        AuthorizationMiddleware::authorize(['Admin']);
        $notificationModel = new NotificationModel();
        $success = $notificationModel->cancelNotification($id);
        if($success){
            
            echo "Notification cancelled successfully";
        }
        else{
            echo "Failed to cancel notification";
        };
    }

}
