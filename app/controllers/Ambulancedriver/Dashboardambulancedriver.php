<?php 

class Dashboardambulancedriver
{
    use Controller;

    public function index() {
        AuthorizationMiddleware::authorize(['Ambulance Driver']);

        $data['username'] = empty($_SESSION['USER']) ? 'User' : $_SESSION['USER']->email;
        $userdataModel = new AmbulanceDriversModel();
        $ambulancebookingmodel = new AmbulanceBookingModel();
        $notificationModel = new NotificationModel();
        $driver_id = $userdataModel-> getAmbulanceDriverIdByUserId($_SESSION['USER']->id);


        $data['userdata'] = $userdataModel->getDriverRoleDataById($_SESSION['USER']->id);
        $data['ambulancebookings'] = $ambulancebookingmodel->getAllAmbulancebookings($_SESSION['USER']->id);
        $data['todaybookings'] = $ambulancebookingmodel->countTodayBookings($_SESSION['USER']->id);
        $data['weekbookings'] = $ambulancebookingmodel->countWeekBookings($_SESSION['USER']->id);
        $data['recentbookings'] = $ambulancebookingmodel->getTodaysMostRecentBooking($_SESSION['USER']->id);
        $data['transportnotifications'] = $notificationModel->getTransportNotificationsByDriverId($driver_id);
        $data['driverdetails']= $userdataModel->getAmbulanceDriverById($driver_id);
        $this->view('ambulancedriver/dashboardambulancedriver', $data);
    }
    
    public function acceptBooking(string $id) : void
    {
        AuthorizationMiddleware::authorize(['Ambulance Driver']);

        $ambulancebookingmodel = new AmbulanceBookingModel();
       $recentbooking= $ambulancebookingmodel->getTodaysMostRecentBooking($_SESSION['USER']->id);
        $success = $ambulancebookingmodel->acceptBooking($id);
        
        if ($success === true) {
            $urlParams = http_build_query([
                'pet_id' => $recentbooking->pet_id,
                'date' => urlencode($recentbooking->date_time),
                'driver_id' => $recentbooking->driver_id
            ]);
            $url = '/ambulancedriver/maproute?' . $urlParams;
            
            // Redirect to the URL
            redirect($url);
            $ambulancebookingmodel = new AmbulanceBookingModel();
            // $petOwnerEmail = $ambulancebookingmodel->getPetOwnerEmailByPetId($pet_id);
            // $model = new AmbulanceBookingModel();
             // $petOwnerEmail = $model->getPetOwnerEmailById($id);
              //sample email
              $petOwnerEmail = 'thushankapramuditha17@gmail.com';
              if($petOwnerEmail) {
                  // Send email to the pet owner
              
                  $subject = "Ambulance Booking Confirmation";
                  $message = "
                  <html>
                  <head>
                  <title>Ambulance Booking Confirmation</title>
                  <style>
                      body {
                          font-family: Arial, sans-serif;
                          font-size: 16px;
                          line-height: 1.6;
                          color: #333;
                      }
                      .container {
                          max-width: 600px;
                          margin: 0 auto;
                          padding: 20px;
                          border: 1px solid #ccc;
                          border-radius: 5px;
                          background-color: #f9f9f9;
                      }
                      h2 {
                          color: #6a3879;
                          margin-top: 0;
                      }
                      p {
                          margin-bottom: 20px;
                      }
                      ul {
                          padding-left: 20px;
                      }
                  </style>
                  </head>
                  <body>
                  <div class='container'>
                      <h2>Ambulance Booking Confirmation</h2>
                      <p>Dear Customer,</p>
                      <p>We are pleased to inform you that your ambulance booking has been confirmed.</p>
                      <p>Your driver is on the way to pick you up. Please be ready at your designated location.</p>
                      <p>Your Driver Details:</p>
                      <ul>
                          <li><strong>Booking ID:</strong> $recentbooking->id</li>
                          <li><strong>Booking Date:</strong> $recentbooking->date_time</li>
                          <li><strong>Driver Name:</strong> $recentbooking->driver_name</li>
                          <li><strong>Driver Contact:</strong> $recentbooking->driver_contact</li>
                          <li><strong>Driver Email:</strong> $recentbooking->driver_email</li>
                      </ul>
                      <p>If you have any questions or need further assistance, please feel free to contact us at any time.</p>
                      <p>Thank you for choosing our ambulance service.</p>
                      <p>Best Regards,<br> Your Ambulance Service Team</p>
                  </div>
                  </body>
                  </html>
                  ";
           
                  $emailModel = new EmailModel();
                  $emailModel->sendEmail($petOwnerEmail, $subject, $message);
              } else {
                  // $_SESSION['error'] = "Failed to fetch pet owner email!";
                  
              }
        } else {
            echo "Failed to accept booking. Error: " . $success;
        }
    }

    //public function change availability
    
    public function changeAvailability($id)
    {
    
        AuthorizationMiddleware::authorize(['Ambulance Driver']);
        $driversModel = new AmbulanceDriversModel();
        $currentAvailability = $driversModel->getAmbulanceDriverById($id);
        $newAvailability = ($currentAvailability->availability) === 'available' ? 'unavailable' : 'available';
        
        $success = $driversModel->updateAvailability($id, $newAvailability);

        if ($success) {
            $_SESSION['flash'] = ['success' => 'Availability updated successfully!'];
        } else {
            $_SESSION['flash'] = ['error' => 'Failed to update availability.'];
        }

        header('Location: ' . ROOT . '/ambulancedriver/dashboardambulancedriver');
        exit;
    }

//  function to get the appointment details from the database
}
