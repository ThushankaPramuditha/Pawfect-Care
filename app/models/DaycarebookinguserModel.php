<?php

class DaycarebookinguserModel
{
    use Model;

    protected $table = 'daycarebookinguser'; 
    protected $allowedColumns = ['id','drop_off_time','pick_up_time','drop_off_date','list_of_items','allergies','pet_behaviour','medications','pet_id','created_at']; 

    public function getAllDaycarebookings()
    {
        // Adjusted query to fetch all daycare bookings with pet and pet owner details
        $query = "SELECT
                    d.drop_off_time,
                    d.pick_up_time,
                    d.drop_off_date,
                    d.pet_id,
                    p.name AS pet_name,
                    po.name AS pet_owner_name,
                    po.contact AS pet_owner_contact
                FROM
                    daycarebookinguser d
                JOIN
                    pets p ON d.pet_id = p.id
                JOIN
                    petowners po ON p.petowner_id = po.id";

        return $this->query($query);
    }


    public function addDaycarebooking(array $data)
    {
        // Retrieve pet owner details based on user ID stored in session
        $userId = $_SESSION['USER']->id;
        $petOwnerDetails = $this->getPetOwnerDetailsByUserId($userId);

        // If pet owner details are not found, return an error
        if (!$petOwnerDetails) {
            return "Failed to fetch pet owner details.";
        }

        // Include pet owner details in the booking data
        $data['pet_owner_name'] = $petOwnerDetails['name'];
        $data['pet_owner_contact'] = $petOwnerDetails['contact'];

        // Insert the new booking
        $inserted = $this->insert($data);
        if ($inserted) {
            return true; // Booking successfully saved
        } else {
            return "Failed to save booking.";
        }
    }

    // Method to get pet owner details by user ID
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
    
    //function to search date and load the booking for that day
   // In DaycarebookinguserModel class

public function getBookingsForDate($date)
{
    $query = "SELECT
                d.drop_off_time,
                d.pick_up_time,
                d.drop_off_date,
                d.pet_id,
                p.name AS pet_name,
                po.name AS pet_owner_name,
                po.contact AS pet_owner_contact
            FROM
                daycarebookinguser d
            JOIN
                pets p ON d.pet_id = p.id
            JOIN
                petowners po ON p.petowner_id = po.id
            WHERE
                d.drop_off_date = :drop_off_date";

    $bindings = [':drop_off_date' => $date];

    return $this->query($query, $bindings);
}


public function search($term)
{
    $term = "%{$term}%";
 
       $query = "SELECT d.* , p.name AS pet_name, po.name AS pet_owner_name, po.contact AS pet_owner_contact
                FROM daycarebookinguser d
                JOIN pets p ON d.pet_id = p.id
                JOIN petowners po ON p.petowner_id = po.id
                WHERE d.drop_off_date LIKE :term";

          return $this->query($query, [':term' => $term]);
}

public function searchByDate($date)
{
    $query = "SELECT d.*, p.name AS pet_name, po.name AS pet_owner_name, po.contact AS pet_owner_contact
              FROM daycarebookinguser d
              JOIN pets p ON d.pet_id = p.id
              JOIN petowners po ON p.petowner_id = po.id
              WHERE d.drop_off_date = :date";

    return $this->query($query, [':date' => $date]);
}
  
    public function updateDaycarebooking($id, array $data)
        {
            // Filter out non-allowed columns
            $data = array_filter($data, function ($key) {
                return in_array($key, $this->allowedColumns);
            }, ARRAY_FILTER_USE_KEY);
        
            return $this->update($id, $data, 'id');
        }
 

    public function getPetOwneremail($id)
    {
       // Query to fetch petowner using daycarebookinguser id
         $query = "SELECT u.email
                  FROM daycarebookinguser dbu
                  JOIN pets p ON dbu.pet_id = p.id
                  JOIN petowners po ON p.petowner_id = po.id
                  JOIN users u ON po.user_id = u.id
                  WHERE dbu.id = :id";

        $bindings = [':id' => $id];
        $result = $this->query($query, $bindings);
        return $result[0]->email;
    }

        public function acceptDaycarebooking($id)
            {
                // Update the status of the daycare booking to 'accepted'
                $query = "UPDATE daycarebookinguser SET status = 'accepted' WHERE id = :id AND status = 'pending'";
                $bindings = [':id' => $id];
                $result = $this->query($query, $bindings);
                return $result; // Return true or false based on the success of the update operation
            }

            public function declineDaycarebooking($id)
            {
                // Update the status of the daycare booking to 'declined'
                $query = "UPDATE daycarebookinguser SET status = 'declined' WHERE id = :id AND status = 'pending'";
                $bindings = [':id' => $id];
                $result = $this->query($query, $bindings);

                return $result; // Return true or false based on the success of the update operation
            }

            public function finishDaycarebooking($id){
                $query = "UPDATE daycarebookinguser SET status = 'finished' WHERE id = :id AND status = 'accepted'";
                $bindings = [':id' => $id];
                $result = $this->query($query, $bindings);
                return $result;
            }

        // Define validation rules
        public function validate($data)
        {
            $this->errors = [];
    
            if (empty($data['drop_off_time'])) {
                $this->errors['drop_off_time'] = "Drop off Time is required";
            }
            if (empty($data['pick_up_time'])) {
                $this->errors['pick_up_time'] = "Pick up Time is required";
            }
            
            if (empty($data['drop_off_date'])) {
                $this->errors['drop_off_date'] = "Drop off Date is required";
            }
    
            return empty($this->errors);
        }
    
}


