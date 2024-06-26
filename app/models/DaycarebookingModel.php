<?php

class DaycarebookingModel
{
    use Model;

    protected $table = 'daycarebooking';
    protected $allowedColumns = ['id','time','filled_slots','free_slots','status','date'];

    public function getAllDaycarebooking()
    {
        return $this->findAll();
    }

    public function getDaycarebookingById($id)
    {
        return $this->first(['id' => $id]);
    }

    public function addDaycarebooking($data)
    {
        return $this->insert($data);
    }
    public function updateDaycareBooking($id, array $data)
    {
        // allowed column
        $data = array_filter($data, function ($key) {
            return in_array($key, $this->allowedColumns);
        }, ARRAY_FILTER_USE_KEY);
    
        return $this->update($id, $data, 'id');
    }
    public function updateslots($id)
    {
        $daycarebooking = $this->first(['id' => $id]);
        if($daycarebooking->free_slots== 0) {
            return false;
        }else{
            $daycarebooking->filled_slots += 1;
            $daycarebooking->free_slots -= 1;    
        }
        
        return $this->update($id, (array) $daycarebooking);
    }

    public function cancelBooking($id)
    {
        $daycarebooking = $this->first(['id' => $id]);
        if($daycarebooking->filled_slots== 0) {
            return false;
        }else{
            $daycarebooking->filled_slots -= 1;
            $daycarebooking->free_slots += 1;    
        }
        
        return $this->update($id, (array) $daycarebooking);
    }

    public function deleteDaycarebooking($id)
    {
        return $this->delete($id);
    }
   
    public function search($term)
    {
        $term = "%{$term}%";
    
        $query = "SELECT db.*
                  FROM daycarebooking db
                  WHERE db.date LIKE :term";
    
        return $this->query($query, [':term' => $term]);
    }

    public function hasBookingsForDate($date)
    {
        $query = "SELECT COUNT(*) AS total FROM daycarebooking WHERE date = ?";
        $result = $this->query($query, [$date]);
        return $result[0]->total > 0;
    }

    public function insertTimeSlots($date, $timeslots)
    {
        foreach ($timeslots as $times) {
            $query = "INSERT INTO daycarebooking (time, filled_slots, free_slots, date) VALUES (?, 0, 10, ?)";
            $result = $this->query($query, [$times, $date]);
        }
        return $result; 
    }

    public function getBookingsByDate($date)
    {
        $query = "SELECT * FROM daycarebooking WHERE date = ?";
        $result = $this->query($query, [$date]);
        return $result;
    }

    // public function searchForDaycarebooking($term, $date = '')
    // {
    //     $term = "%{$term}%";
    //     $dateCondition = !empty($date) ? "AND DATE(date_time) = :date" : "";
    //     $query = "SELECT db.*
    //               FROM daycarebooking db
    //               WHERE db.date LIKE :term
    //                {$dateCondition}";
       
    //         $bindings = [':term' => $term];
    //         if (!empty($date)) {
    //             $bindings[':date'] = $date;
    //         }
    //         return $this->query($query, $bindings);
    // }
    public function validate($data)
    {
        $this->errors = [];

        if(empty($data['time'])) {
            $this->errors['time'] = "Time is required";
        }

        if(empty($data['filled_slots'])) {
            $this->errors['filled_slots'] = "Filled slots is required";
        }

        if(empty($data['free_slots'])) {
            $this->errors['free_slots'] = "Free slots is required";
        }

        if(empty($data['status'])) {
            $this->errors['status'] = "Status is required";
        }

        return empty($this->errors);
    }
   
}
