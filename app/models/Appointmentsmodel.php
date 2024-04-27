<?php

class AppointmentsModel
{
    use Model;

    protected $table = 'appointments';
    protected $allowedColumns = ['patient_no','date_time','pet_id','vet_id','status'];

    public function getAllAppointments()
    {
        $query = "SELECT
        a.date_time,
        a.patient_no,
        a.pet_id,
        p.name AS pet_name,
        po.name AS petowner,
        po.contact,
        v.name AS vet_name,
        a.status
        FROM
            appointments a
        JOIN
            pets p ON a.pet_id = p.id
        JOIN
            petowners po ON p.petowner_id = po.id
        JOIN
            veterinarians v ON a.vet_id = v.id
        ORDER BY a.date_time DESC";

        return $this->query($query);
    }

    public function getAppointmentsForCurrentDate()
    {
        // YYYY-MM-DD format
        $currentDate = date('Y-m-d');
        $query = "SELECT
        a.id,
        a.date_time,
        a.patient_no,
        a.pet_id,
        p.name AS pet_name,
        po.name AS petowner,
        po.contact,
        v.name AS vet_name,
        a.status
        FROM
            appointments a
        JOIN
            pets p ON a.pet_id = p.id
        JOIN
            petowners po ON p.petowner_id = po.id
        JOIN
            veterinarians v ON a.vet_id = v.id
        WHERE
            DATE(a.date_time) = :current_date
        ORDER BY a.id ASC";

        // Bind the current date parameter to the query
        $data = array(':current_date' => $currentDate);

        return $this->query($query, $data);
    }

    public function getAppointmentsForVetId($vetId)
    {
        // YYYY-MM-DD format
        $currentDate = date('Y-m-d');
        $query = "SELECT
            a.date_time,
            a.patient_no,
            a.pet_id,
            p.name AS pet_name,
            po.name AS petowner,
            po.contact,
            v.name AS vet_name,
            a.status
        FROM
            appointments a
        JOIN
            pets p ON a.pet_id = p.id
        JOIN
            petowners po ON p.petowner_id = po.id
        JOIN
            veterinarians v ON a.vet_id = v.id
        WHERE
            DATE(a.date_time) = :current_date
            AND
            a.vet_id = :vet_id
        ORDER BY a.id ASC";

        // Bind the current date and vet_id parameters to the query
        $data = array(':current_date' => $currentDate, ':vet_id' => $vetId);

        return $this->query($query, $data);
    }


    public function getAppointmentById($id)
    {
        return $this->first(['id' => $id]);
    }

    public function getAppointmentsForCurrentDateById($id)
    {
        $currentDate = date('Y-m-d');
        $query = "SELECT
        a.id,
        a.date_time,
        a.patient_no,
        a.pet_id,
        p.name AS pet_name,
        po.name AS petowner,
        po.contact,
        v.name AS vet_name,
        a.status
        FROM
            appointments a
        JOIN
            pets p ON a.pet_id = p.id
        JOIN
            petowners po ON p.petowner_id = po.id
        JOIN
            veterinarians v ON a.vet_id = v.id
        WHERE
            DATE(a.date_time) = :current_date
        ORDER BY a.id ASC";

        // Bind the current date parameter to the query
        $data = array(':current_date' => $currentDate);
        // show($id);
        // die();
        return $this->get_row($query, ['id' => $id]);
    }

   
    public function getAppointmentId($patientNo, $date, $vetId)
    {
        $query = "SELECT id FROM $this->table WHERE patient_no = :patient_no AND DATE(date_time) = :date AND vet_id = :vet_id";
        
        $bindings = [
            'patient_no' => $patientNo,
            'date' => $date,
            'vet_id' => $vetId,
        ];

        $result = $this->query($query, $bindings);

        if ($result && count($result) > 0) {
            return $result[0]->id;
        } else {
            return false; 
        }


    }

    public function searchForReceptionist($term, $date = '') {
        $term = "%{$term}%";
        $dateCondition = !empty($date) ? "AND DATE(date_time) = :date" : "";
        
        $query = "SELECT
            a.id,
            a.date_time,
            a.patient_no,
            a.pet_id,
            p.name AS pet_name,
            po.name AS petowner,
            po.contact,
            v.name AS vet_name,
            a.status
            FROM appointments a
            JOIN
                pets p ON a.pet_id = p.id
            JOIN
                petowners po ON p.petowner_id = po.id
            JOIN
                veterinarians v ON a.vet_id = v.id
            WHERE 
            (p.name LIKE :term 
            OR po.name LIKE :term 
            OR po.contact LIKE :term)
            {$dateCondition}";
    
        $bindings = [':term' => $term];
        if (!empty($date)) {
            $bindings[':date'] = $date;
        }
    
        return $this->query($query, $bindings);
    }

    

    public function addAppointment(array $data)
    {
        // Check how many appointments already exist for today
        $appointmentsToday = $this->countTodayAppointments($vetId);

        if ($appointmentsToday >= 3) {
            return "Maximum appointments for today reached."; // Limiting to 3 appointments per day
        }

        else {
            // If less than 3, proceed to add a new appointment
            $patientNo = $appointmentsToday + 1; // Assign the next patient number
            $data['patient_no'] = $patientNo;
            $data['date_time'] = date('Y-m-d H:i:s'); // Ensure MySQL compatible datetime format

        }

        // Insert the new appointment
        $inserted = $this->insert($data);
        if ($inserted) {
            return "Appointment successfully saved with patient number {$patientNo}.";
        } else {
            return "Failed to save appointment.";
        }
    }


      //get the active appointment count for current date for particular vet
      public function countTodayAppointments($vetId) {
        $today = date('Y-m-d'); // Ensures date is in the correct format for MySQL
        $query = "SELECT COUNT(*) AS total 
        FROM {$this->table} 
        WHERE DATE(date_time) = :today
        AND vet_id = :vet_id
        AND status != 'cancelled'";
        $result = $this->query($query, [':today' => $today, ':vet_id' => $vetId]);
        return $result[0]->total ?? 0; // Make sure to handle the case where result is empty
    }
       
    public function counttodayallAppointments(){
        $today = date('Y-m-d');
        $query = "SELECT COUNT(*) AS total 
        FROM {$this->table} 
        WHERE DATE(date_time) = :today";
        $result = $this->query($query, [':today' => $today]);
        return $result[0]->total ?? 0; // Make sure to handle the case where result is empty
    }

    public function countweekAppointments($vetId){
        $today = date('Y-m-d');
        $query = "SELECT COUNT(*) AS total 
        FROM {$this->table} 
        WHERE WEEK(date_time) = WEEK(:today)
        AND vet_id = :vet_id";
        $result = $this->query($query, [':today' => $today, ':vet_id' => $vetId]);
        return $result[0]->total ?? 0; // Make sure to handle the case where result is empty
    }

    public function countweekallAppointments(){
        $today = date('Y-m-d');
        $query = "SELECT COUNT(*) AS total 
        FROM {$this->table} 
        WHERE WEEK(date_time) = WEEK(:today)";
        $result = $this->query($query, [':today' => $today]);
        return $result[0]->total ?? 0; // Make sure to handle the case where result is empty
    }

    //I want a function to get incomefrom appointmets for weeek1, week2, week3 week4
    public function incomeFromAppointmentsForWeek($week) {
        $startDate = date('Y-m-d', strtotime("first day of this month"));
        $endDate = date('Y-m-d', strtotime("last day of this month"));
        $week1 = date('Y-m-d', strtotime("first day of this month"));
        $week2 = date('Y-m-d', strtotime("first day of this month + 1 week"));
        $week3 = date('Y-m-d', strtotime("first day of this month + 2 weeks"));
        $week4 = date('Y-m-d', strtotime("first day of this month + 3 weeks"));
        //only forweek1,week2,week3 and week4
        if ($week == 1) {
            $startDate = $week1;
            $endDate = $week2;
        } elseif ($week == 2) {
            $startDate = $week2;
            $endDate = $week3;
        } elseif ($week == 3) {
            $startDate = $week3;
            $endDate = $week4;
        } elseif ($week == 4) {
            $startDate = $week4;
            $endDate = date('Y-m-d', strtotime("last day of this month"));
        }

        $count = $this->countAllAppointments($startDate, $endDate);
        $income = $count * 400;
        return $income;
    }
    
     public function getLastInsertedId(){
        $query = "SELECT id FROM appointments ORDER BY id DESC LIMIT 1";
        $result = $this->query($query);
    
        if ($result && !empty($result[0]->id)) {
            return $result[0]->id; // Access id property of the first row
        } else {
            return null; // Return null if no record is found or id is empty
        }
     }

     public function getPatientNo($petId){
        $query = "SELECT patient_no FROM appointments WHERE pet_id = :pet_id ORDER BY id DESC LIMIT 1";
        $result = $this->query($query, [':pet_id' => $petId]);
    
        if ($result && !empty($result[0]->patient_no)) {
            return $result[0]->patient_no; // Access patient_no property of the first row
        } else {
            return null; // Return null if no record is found or patient_no is empty
        }
     }

     public function getVetName($vetId){
        $query = "SELECT name FROM veterinarians WHERE id = :vet_id";
        $result = $this->query($query, [':vet_id' => $vetId]);
    
        if ($result && !empty($result[0]->name)) {
            return $result[0]->name; // Access name property of the first row
        } else {
            return null; // Return null if no record is found or name is empty
        }
     }

     public function getPetOwnerEmailById($id){
        $query = "SELECT u.email 
                  FROM appointments As a
                    JOIN pets AS p ON a.pet_id = p.id
                    JOIN petowners AS po ON p.petowner_id = po.id
                    JOIN users AS u ON po.user_id = u.id
                    WHERE a.id = :id";
        $result = $this->query($query, [':id' => $id]);

        if ($result && !empty($result[0]->email)) {
            return $result[0]->email; // Access email property of the first row
        } else {
            return null; // Return null if no record is found or email is empty
        }         
     }

    public function updateAppointment($id, array $data)
    {
        // alowed column
        $data = array_filter($data, function ($key) {
            return in_array($key, $this->allowedColumns);
        }, ARRAY_FILTER_USE_KEY);
    
        return $this->update($id, $data, 'id');
    }


    /*public function searchForMedStaff($term)
    {
        $term = "%{$term}%";
        
        $currentDate = date('Y-m-d');
        $query = "SELECT
                a.id,
                a.date_time,
                a.patient_no,
                a.pet_id,
                p.name AS pet_name,
                po.name AS petowner,
                po.contact,
                v.name AS vet_name,
                a.status
                FROM
                    appointments a
                JOIN
                    pets p ON a.pet_id = p.id
                JOIN
                    petowners po ON p.petowner_id = po.id
                JOIN
                    veterinarians v ON a.vet_id = v.id
                WHERE
                    DATE(a.date_time) = :current_date AND
                    (p.name LIKE :term OR
                    po.contact LIKE :term OR
                    v.name LIKE :term OR
                    a.status LIKE :term)
                ORDER BY a.id ASC";

                // Bind the parameters to the query
                $data = array(':current_date' => $currentDate,':term' => $term);
        
        return $this->query($query, $data);
    }*/


    public function validate($data)
    {
        $this->errors = [];

        if (empty($data['id'])) {
            $this->errors['id'] = "Appointment ID is required";
        }

        if (empty($data['patient_no'])) {
            $this->errors['patient_no'] = "Patient No. is required";
        }

        if (empty($data['petowner_name'])) {
            $this->errors['petowner_name'] = "Pet Owner Name is required";
        }

        if (empty($data['contact_no'])) {
            $this->errors['contact_no'] = "Contact Number is required";
        }
        if (empty($data['pet_name'])) {
            $this->errors['pet_name'] = "Pet Name is required";
        }

        if (empty($data['date_time'])) {
            $this->errors['date_time'] = "Date Time is required";
        }

        
        if (empty($data['pet_id'])) {
           $this->errors['pet_id'] = "Pet ID is required";
        }

        if (empty($data['time'])) {
            $this->errors['time'] = "Time is required";
        }


        return empty($this->errors);
    }

//////////////////////////////////// reports   /////////////////////////////////////////////////

    //get the appointment count for given period for all vets
    public function countAllAppointments($startDate, $endDate) {
        $query = "SELECT COUNT(*) AS total 
                  FROM {$this->table} 
                  WHERE date_time >= :start_date 
                  AND date_time < :end_date";
                  
        $params = [
            ':start_date' => $startDate,
            ':end_date' => $endDate
        ];
        $result = $this->query($query, $params);
        return $result[0]->total ?? 0;  
    }

    //get the total income from appointments for given period for all vets
    public function incomeFromAppointments($startDate, $endDate) {
        $count = $this->countAllAppointments($startDate, $endDate); 
        $income = $count * 400;
        return $income; 
    }

    //get the appointment count for given period per vet
    public function getAppointmentsDetailsPerVet($from, $to) {
        $query = "SELECT v.name AS vet_name, a.vet_id AS vet_id,
        COUNT(a.id) AS total_appointments
        FROM {$this->table} a
        JOIN veterinarians v ON a.vet_id = v.id
        WHERE a.date_time >= :from 
        AND a.date_time <= :to
        GROUP BY a.vet_id
        ";
        $params = [':from' => $from, ':to' => $to];
        $result = $this->query($query, $params);
    
        // Since this is expected to fetch multiple rows, return the full result set
        return $result ? $result : [];
    }

    //get the total income from appointments for given period for all vets
    public function incomeFromAppointmentsPerVet($startDate, $endDate) {
        $appointmentDetails = $this->getAppointmentsDetailsPerVet($startDate, $endDate);
        $incomeDetails = [];
    
        foreach ($appointmentDetails as $detail) {
            $incomeDetails[] = [
                'vet_id' => $detail->vet_id,
                'vet_name' => $detail->vet_name,
                'income' => $detail->total_appointments * 400,
                'total_appointments' => $detail->total_appointments
            ];
        }
        return $incomeDetails;
    }

    public function countAppointmentsByStatus($status, $startDate, $endDate) {
        $query = "SELECT COUNT(*) AS total 
                  FROM {$this->table} 
                  WHERE status = :status
                  AND date_time >= :start_date 
                  AND date_time < :end_date";
        $params = [':status' => $status,
        ':start_date' => $startDate,
        ':end_date' => $endDate];
        $result = $this->query($query, $params);
        return $result[0]->total ?? 0;  // Default to 0 if no results found
    }
}