<?php

class AppointmentsModel
{
    use Model;

    protected $table = 'appointments';
    protected $allowedColumns = ['id','patient_no','date_time','pet_id','vet_id'];

    public function getAllAppointments()
    {
        $query = "SELECT
        a.date_time,
        a.patient_no,
        a.pet_id,
        p.name AS pet_name,
        po.name AS petowner,
        po.contact,
        v.name AS vet_name
        FROM
            appointments a
        JOIN
            pets p ON a.pet_id = p.id
        JOIN
            petowners po ON p.petowner_id = po.id
        JOIN
            veterinarians v ON a.vet_id = v.id";

        return $this->query($query);
    }

    public function getAppointmentsForCurrentDate()
    {
        // Get the current date in YYYY-MM-DD format
        $currentDate = date('Y-m-d');
        $query = "SELECT
        a.date_time,
        a.patient_no,
        a.pet_id,
        p.name AS pet_name,
        po.name AS petowner,
        po.contact,
        v.name AS vet_name
        FROM
            appointments a
        JOIN
            pets p ON a.pet_id = p.id
        JOIN
            petowners po ON p.petowner_id = po.id
        JOIN
            veterinarians v ON a.vet_id = v.id
        WHERE
            DATE(a.date_time) = :current_date";

        // Bind the current date parameter to the query
        $data = array(':current_date' => $currentDate);

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
        a.date_time,
        a.patient_no,
        a.pet_id,
        p.name AS pet_name,
        po.name AS petowner,
        po.contact,
        v.name AS vet_name
        FROM
            appointments a
        JOIN
            pets p ON a.pet_id = p.id
        JOIN
            petowners po ON p.petowner_id = po.id
        JOIN
            veterinarians v ON a.vet_id = v.id
        WHERE
            DATE(a.date_time) = :current_date";

        // Bind the current date parameter to the query
        $data = array(':current_date' => $currentDate);
        // show($id);
        // die();
        return $this->get_row($query, ['id' => $id]);
    }

    public function getAppointmentsForVetId($vetId)
    {
        // Get the current date in YYYY-MM-DD format
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
            v.id = :vet_id";

        // Bind the current date and vet_id parameters to the query
        $data = array(':current_date' => $currentDate, ':vet_id' => $vetId);

        return $this->query($query, $data);
    }


    /*public function getAppointmentId($patientNo, $date, $vetId)
    {
        $conditions = [
            'patient_no' => $patientNo,
            'DATE(date_time)' => $date,
            'vet_id' => $vetId,
        ];

        $result = $this->first($conditions);

        if ($result && property_exists($result, 'id')) {
            return $result->id;
        } else {
            return false; 
        }
    }*/
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


    public function addAppointment(array $data)
    {
        // Check how many appointments already exist for today
        $appointmentsToday = $this->countTodayAppointments();

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

    public function countTodayAppointments() {
        $today = date('Y-m-d'); // Ensures date is in the correct format for MySQL
        $query = "SELECT COUNT(*) AS total 
        FROM {$this->table} 
        WHERE DATE(date_time) = :today
        AND status != 'cancelled'";
        $result = $this->query($query, [':today' => $today]);
        return $result[0]->total ?? 0; // Make sure to handle the case where result is empty
    }
    

    public function updateAppointment($id, array $data)
    {
        // alowed column
        $data = array_filter($data, function ($key) {
            return in_array($key, $this->allowedColumns);
        }, ARRAY_FILTER_USE_KEY);
    
        return $this->update($id, $data, 'id');
    }

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
        return $result[0]->total ?? 0;  // Default to 0 if no results found
    }
    public function incomeFromAppointments($startDate, $endDate) {
        $count = $this->countAllAppointments($startDate, $endDate); // Use $this-> to refer to the other method in the same class
        $income = $count * 400;
        return $income; // Return the calculated income
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

    
    public function validate($data)
    {
        $this->errors = [];

        if (empty($data['id'])) {
            $this->errors['id'] = "Appointment ID is required";
        }

        if (empty($data['patient_no'])) {
            $this->errors['patient_no'] = "Patient No. is required";
        }

        if (empty($data['payment_status'])) {
            $this->errors['pet_owner_name'] = "Pet Owner Name is required";
        }

        if (empty($data['contact_no'])) {
            $this->errors['contact_no'] = "Contact Number is required";
        }
        if (empty($data['type'])) {
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
}