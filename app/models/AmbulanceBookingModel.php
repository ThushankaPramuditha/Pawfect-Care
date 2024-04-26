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
    // Get today's date
    $today = date('Y-m-d');

    $query = "SELECT ab.*, p.name AS pet_name, p.petowner_id, po.name AS pet_owner_name, po.contact AS pet_owner_contact
              FROM ambulancebookings AS ab
              JOIN pets AS p ON ab.pet_id = p.id
              JOIN petowners AS po ON p.petowner_id = po.id
              JOIN ambulancedrivers AS ad ON ab.driver_id = ad.id
              WHERE ad.user_id = :user_id
              AND DATE(ab.date_time) = :today
              ORDER BY ab.date_time DESC LIMIT 1";

    return $this->get_row($query, ['user_id' => $userId, 'today' => $today]);
}

//accept bookings
public function acceptBooking($id) {
    $query = "UPDATE ambulancebookings SET status = 'accepted' WHERE id = :id";
    return $this->query($query, ['id' => $id]);
}

    public function getLocationBypetIdandTime($pet_id) {
        $query = "SELECT ab.*, p.name AS pet_name, p.petowner_id
                  FROM ambulancebookings AS ab
                  JOIN pets AS p ON ab.pet_id = p.id
                  WHERE ab.pet_id = :pet_id AND DATE(ab.date_time) = CURDATE()
                  ORDER BY ab.date_time DESC";
        return $this->get_row($query, ['pet_id' => $pet_id]);
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
}


