<?php

class AmbulanceBookingModel
{
    use Model;

    protected $table = 'ambulancebookings';
    protected $allowedColumns = ['id','pet_id','pickup_lat','driver_id','pickup_lng','date_time','status'];


    public function getAllAmbulanceBookings($userId) {
        $query = "SELECT ab.*, p.name AS pet_name, p.petowner_id AS pet_owner_id, po.name AS pet_owner_name, po.contact AS pet_owner_contact
                  FROM ambulancebookings AS ab
                  JOIN pets AS p ON ab.pet_id = p.id
                  JOIN petowners AS po ON p.petowner_id = po.id
                  JOIN ambulancedrivers AS ad ON ab.driver_id = ad.id
                  WHERE ad.user_id = :user_id
                  ORDER BY ab.date_time DESC";
        return $this->query($query, ['user_id' => $userId]);
    }
    

 //get today's most recent booking
 public function getTodaysMostRecentBooking($userId) {
    // Get today's date of Colombo timezone
    date_default_timezone_set('Asia/Colombo');
    $today = date('Y-m-d');

    $query = "SELECT ab.*, p.name AS pet_name, p.petowner_id, po.name AS pet_owner_name, po.contact AS pet_owner_contact, ad.id AS driver_id, ad.name AS driver_name, ad.contact AS driver_contact ,ad.availability AS driver_availability
              FROM ambulancebookings AS ab
              JOIN pets AS p ON ab.pet_id = p.id
              JOIN petowners AS po ON p.petowner_id = po.id
              JOIN ambulancedrivers AS ad ON ab.driver_id = ad.id
              WHERE ad.user_id = :user_id
              AND DATE(ab.date_time) = :today AND ab.status = 'pending' 
              ORDER BY ab.date_time DESC LIMIT 1";

    return $this->get_row($query, ['user_id' => $userId, 'today' => $today]);
}


public function acceptBooking($id) {
    // Update the booking status to 'accepted'
    $query = "UPDATE ambulancebookings SET status = 'accepted' WHERE id = :id AND status = 'pending'";
    $bindings = [':id' => $id];
    $result = $this->query($query, $bindings);
    
    if ($result) {
        // Get the driver ID for the booking
        $driverId = $this->getDriverId($id);

        // If the booking was successfully accepted, update the ambulance driver availability
        if ($driverId) {
            // Update the driver's availability
            $updateDriverQuery = "UPDATE ambulancedrivers SET availability = 'unavailable' WHERE id = :driverId";
            $driverBindings = [':driverId' => $driverId];
            $driverResult = $this->query($updateDriverQuery, $driverBindings);

            // Update the notification status to 'read' if the notification type is 'transport'
            $updateNotificationQuery = "UPDATE notifications SET status = 'read' WHERE appointment_id = :appointmentId AND type = 'transport'";
            $notificationBindings = [':appointmentId' => $id];
            $notificationResult = $this->query($updateNotificationQuery, $notificationBindings);
            
            // Return true if all updates were successful
            return $driverResult && $notificationResult;
        }
    }
    // Return false if any update fails
    return false;
}

    // driverId

    public function getDriverId($id) {
        $query = "SELECT driver_id FROM ambulancebookings WHERE id = :id";
        $result = $this->get_row($query, ['id' => $id]);
        return $result->driver_id;
    }



 public function finishRide($driverId) {
    $query = "UPDATE ambulancebookings SET status = 'completed' WHERE driver_id = :driver_id AND status = 'accepted'";
    $bindings = [':driver_id' => $driverId];
    $result = $this->query($query, $bindings);
    return $result;
}
 
public function getLocationBypetIdandTime($pet_id) {
    $query = "SELECT ab.*, p.name AS pet_name, p.petowner_id
              FROM ambulancebookings AS ab
              JOIN pets AS p ON ab.pet_id = p.id
              WHERE ab.pet_id = :pet_id AND DATE(ab.date_time) = CURDATE()
              ORDER BY ab.date_time DESC";
    $result = $this->get_row($query, ['pet_id' => $pet_id]);

    if ($result === false) {
        // Error occurred, handle it or log it
        // Example: trigger_error($this->error(), E_USER_ERROR);
        return false; // Return false to indicate failure
    }

    return $result; // Return the result if successful
}
    
    public function getAmbulanceDriverId($id) {
        $query = "SELECT a.*, u.email ,u.status
                  FROM ambulancedrivers AS a
                  JOIN users AS u ON a.user_id = u.id
                  WHERE a.id = :id";
        // show($id);
        // die();
        return $this->get_row($query, ['id' => $id]);
    }
    public function getAmbulanceDriverById($id) {
        $query = "SELECT a.*, u.email ,u.status
                  FROM ambulancedrivers AS a
                  JOIN users AS u ON a.user_id = u.id
                  WHERE a.id = :id";
        // show($id);
        // die();
        return $this->get_row($query, ['id' => $id]);
    }

    public function getLastInsertedId(){
        $query = "SELECT id FROM ambulancebookings ORDER BY id DESC LIMIT 1";
        $result = $this->query($query);
    
        if ($result && !empty($result[0]->id)) {
            return $result[0]->id; // Access id property of the first row
        } else {
            return null; // Return null if no record is found or id is empty
        }
    }

    public function addBooking($data) {
        // $query = "INSERT INTO ambulancebookings (pet_id, pickup_lat, pickup_lng, date_time, status) VALUES (:pet_id,  :pickup_lat, :pickup_lng, NOW(), 'pending')";
        // return $this->query($query, ['pet_id' => $pet_id, 'pickup_lat' => $pickup_lat, 'pickup_lng' => $pickup_lng]);
        $userId = $_SESSION['USER']->id;
        $petOwnerDetails = $this->getPetOwnerDetailsByUserId($userId);

        if (!$petOwnerDetails) {
            return "Failed to fetch pet owner details.";
        }
        $data['pet_owner_name'] = $petOwnerDetails['name'];
        $data['pet_owner_contact'] = $petOwnerDetails['contact'];

        $inserted = $this->insert($data);
        if ($inserted) {
            return true; 
        } else {
            return "Failed to save booking.";
        }

    }

    private function getPetOwnerDetailsByUserId($userId)
    {
        // Query to fetch pet owner details based on user ID
        $query = "SELECT name, contact FROM petowners WHERE user_id = :user_id";
        $bindings = [':user_id' => $userId];

        // Execute the query
        $result = $this->query($query, $bindings);

        // Check if pet owner details are found
        if ($result && count($result) > 0) {
            return [
                'name' => $result[0]->name,
                'contact' => $result[0]->contact
            ];
        } else {
            return false;
        }
    }
  

    public function getBookingById($id) {
        $query = "SELECT ab.*, p.name AS pet_name, p.owner_id
                  FROM ambulancebookings AS ab
                  JOIN pets AS p ON ab.pet_id = p.id
                  WHERE ab.id = :id";
        return $this->get_row($query, ['id' => $id]);
    }
    

    public function updateBookingStatus($id, $status) {
        $query = "UPDATE ambulancebookings SET status = :status WHERE id = :id";
        return $this->query($query, ['id' => $id, 'status' => $status]);
    }

    public function getBookingByPetId($pet_id) {
        $query = "SELECT ab.*, p.name AS pet_name, p.owner_id
                  FROM ambulancebookings AS ab
                  JOIN pets AS p ON ab.pet_id = p.id
                  WHERE ab.pet_id = :pet_id";
        return $this->get_row($query, ['pet_id' => $pet_id]);
    }

   public function countTodayBookings($userId) {
        $query = "SELECT COUNT(*) AS total
                  FROM ambulancebookings AS ab
                  JOIN ambulancedrivers AS ad ON ab.driver_id = ad.id
                  WHERE  DATE(date_time) = CURDATE() AND ad.user_id = :user_id";
        $result = $this->get_row($query, ['user_id' => $userId]);
        return $result->total;
    }

    // countWeekBookings
    public function countWeekBookings($userId){
        $query = "SELECT COUNT(*) AS total
                  FROM ambulancebookings AS ab
                  JOIN ambulancedrivers AS ad ON ab.driver_id = ad.id
                  WHERE WEEK(date_time) = WEEK(NOW()) AND ad.user_id = :user_id";
        $result = $this->get_row($query, ['user_id' => $userId]);
        return $result->total;
    }

    
    public function countTodayAmbulancebookings(){
        $query = "SELECT COUNT(*) AS total
                  FROM ambulancebookings
                  WHERE DATE(date_time) = CURDATE()";
        $result = $this->get_row($query);
        return $result->total;
    }

    public function countweekallAmbulancebookings(){
        $query = "SELECT COUNT(*) AS total
                  FROM ambulancebookings
                  WHERE WEEK(date_time) = WEEK(NOW())";
        $result = $this->get_row($query);
        return $result->total;
    }
     
    public function searchForAmbulanceDriver($term, $date = '') {
        $term = "%{$term}%";
        $dateCondition = !empty($date) ? "AND DATE(date_time) = :date" : "";
        
        $query = "SELECT
            ab.id,
            ab.date_time,
            ab.pickup_lat,
            ab.pickup_lng,
            ab.pet_id,
            p.name AS pet_name,
            po.name AS petowner,
            po.contact AS contact,
            po.id AS petowner_id,
            ab.status
            FROM ambulancebookings ab
            JOIN
                pets p ON ab.pet_id = p.id
            JOIN
                petowners po ON p.petowner_id = po.id
            WHERE 
            (po.name LIKE :term 
            OR po.contact LIKE :term
            OR po.id LIKE :term)
            {$dateCondition}";
    
        $bindings = [':term' => $term];
        if (!empty($date)) {
            $bindings[':date'] = $date;
        }
    
        return $this->query($query, $bindings);
    }


    public function validate($data)
    {
        $this->errors = [];

        if (empty($data['pet_id'])) {
            $this->errors['pet_id'] = 'Please select a pet';
        }

        if (empty($data['pickup_lat'])) {
            $this->errors['pickup_lat'] = 'Please enter the pickup latitude';
        }

        if (empty($data['pickup_lng'])) {
            $this->errors['pickup_lng'] = 'Please enter the pickup longitude';
        }


        return empty($this->errors);
    }

    /////////////////////////////////////////////////////////////////

    public function getPetOwnerEmailByPetId($petId) {
       $query ="SELECT u.email
                FROM ambulancebookings AS ab
                JOIN pets AS p ON ab.pet_id = p.id
                JOIN petowners AS po ON p.petowner_id = po.id
                JOIN users AS u ON po.user_id = u.id
                WHERE ab.pet_id = :pet_id";
        $result = $this->get_row($query, ['pet_id' => $petId]);
        return $result->email;
    }

    public function getPetOwnerId($id) {
        $query ="SELECT ab.*, p.petowner_id
                 FROM ambulancebookings AS ab
                 JOIN pets AS p ON ab.pet_id = p.id
                 WHERE ab.id = :id";
        $result = $this->get_row($query, ['id' => $id]);
        return $result->petowner_id;
}
   
}

