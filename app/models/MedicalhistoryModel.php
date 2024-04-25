<?php

class MedicalhistoryModel
{
    use Model;

    protected $table = 'treatments';
    protected $allowedColumns = ['appointment_id','weight','temperature','med_condition','treatment','prescription','remarks'];

    /*public function getAllMedicalHistory()
    {
        return $this->findAll();
    }*/

    public function getAllMedicalHistory()
    {
        $query = "SELECT
        DATE(a.date_time) AS date,
        p.id AS pet_id,
        t.id,
        t.appointment_id,
        t.weight,
        t.temperature,
        t.med_condition,
        t.treatment,
        t.prescription,
        v.name AS treated_by,
        t.remarks
        FROM
            treatments t
        JOIN
            appointments a ON t.appointment_id = a.id
        JOIN
            veterinarians v ON a.vet_id = v.id
        JOIN
            pets p ON a.pet_id = p.id
        ORDER BY a.id ASC";

        return $this->query($query);
    }

    /*public function getMedicalHistoryById($id)
    {
        return $this->first(['id' => $id]);
    }*/

    public function getMedicalHistoryById($id)
    {
        $query = "SELECT
        DATE(a.date_time) AS date,
        p.id AS pet_id,
        t.id,
        t.appointment_id,
        t.weight,
        t.temperature,
        t.med_condition,
        t.treatment,
        t.prescription,
        v.name AS treated_by,
        t.remarks
        FROM
            treatments t
        JOIN
            appointments a ON t.appointment_id = a.id
        JOIN
            veterinarians v ON a.vet_id = v.id
        JOIN
            pets p ON a.pet_id = p.id
        WHERE t.id= :id";
        // show($id);
        // die();
        return $this->get_row($query, ['id' => $id]);
    }

    public function getAllMedicalHistoryForPetId($pet_id)
    {
        $query = "SELECT
        DATE(a.date_time) AS date,
        p.id AS pet_id,
        t.id,
        t.appointment_id,
        t.weight,
        t.temperature,
        t.med_condition,
        t.treatment,
        t.prescription,
        v.name AS treated_by,
        t.remarks
        FROM
            treatments t
        JOIN
            appointments a ON t.appointment_id = a.id
        JOIN
            veterinarians v ON a.vet_id = v.id
        JOIN
            pets p ON a.pet_id = p.id
        WHERE a.pet_id = :pet_id
        ORDER BY a.id ASC";

        return $this->query($query, ['pet_id' => $pet_id]);
    }
    
    public function getMedicalHistoryForPetIdById($id,$pet_id)
    {
        $query = "SELECT
        DATE(a.date_time) AS date,
        p.id AS pet_id,
        t.id,
        t.appointment_id,
        t.weight,
        t.temperature,
        t.med_condition,
        t.treatment,
        t.prescription,
        v.name AS treated_by,
        t.remarks
        FROM
            treatments t
        JOIN
            appointments a ON t.appointment_id = a.id
        JOIN
            veterinarians v ON a.vet_id = v.id
        JOIN
            pets p ON a.pet_id = p.id
        WHERE a.pet_id = :pet_id AND t.id = :id";

        return $this->get_row($query, ['pet_id' => $pet_id, 'id' => $id]);
    }

    /*public function addTreatment($data)
    {
        return $this->insert($data);
    }*/

    public function addTreatment($data)
    {
        $data['date'] = date('Y-m-d');

        // Get vet_id 
        $vetModel = new VeterinariansModel();
        $vetId = $vetModel->getVetIdByName($data['vet_name']);

        if ($vetId !== false) {
            // Get appointment_id 
            $appointmentsModel = new AppointmentsModel();
            $appointmentId = $appointmentsModel->getAppointmentId($data['patient_no'],$data['date'], $vetId);
            //date('Y-m-d', strtotime($data['date_time']))

            if ($appointmentId !== false) {
    
                $treatmentData = [
                    'appointment_id' => $appointmentId,
                    'weight' => $data['weight'],
                    'temperature' => $data['temperature'],
                    'med_condition' => $data['med_condition'],
                    'treatment' => $data['treatment'],
                    'prescription' => $data['prescription'],
                    'remarks' => $data['remarks'],
                ];

                
                return $this->insert($treatmentData);

            } else {
                // Handle the case where no appointment is found
                $this->errors[] = 'Appointment id not found.';
                return false;
            }
        } else{
            // Handle the case where no veterinarian is found
            $this->errors[] = 'Veterinarian not found.';
            return false;
        }
    }

    public function updateMedicalHistory($id, array $data)
    {
        // alowed column
        $data = array_filter($data, function ($key) {
            return in_array($key, $this->allowedColumns);
        }, ARRAY_FILTER_USE_KEY);
    
        return $this->update($id, $data, 'id');
    }

   /*public function deleteMedicalHistory($id)
    {
        return $this->delete($id);
    }*/

    /*public function search($pet_id , $term)
    {
        $term = "%{$term}%";

        $query = "SELECT
                DATE(a.date_time) AS date,
                p.id AS pet_id,
                t.id,
                t.appointment_id,
                t.weight,
                t.temperature,
                t.med_condition,
                t.treatment,
                t.prescription,
                v.name AS treated_by,
                t.remarks
                FROM
                    treatments t
                JOIN
                    appointments a ON t.appointment_id = a.id
                JOIN
                    veterinarians v ON a.vet_id = v.id
                JOIN
                    pets p ON a.pet_id = p.id
                WHERE a.pet_id = :pet_id AND
                    (DATE(a.date_time) = :term OR
                    t.med_condition = :term OR
                    v.name = :term)
                ORDER BY a.id ASC";

        return $this->query($query, ['pet_id' => $pet_id,'term' => $term]);
       
    }*/


        
    public function validate($data)
    {
        $this->errors = [];

        
         if (empty($data['patient_no'])) {
            $this->errors['patient_no'] = "Patient No is required";
        }

        if (empty($data['weight'])) {
            $this->errors['weight'] = "Weight is required";
        }
        
        if (empty($data['temperature'])) {
            $this->errors['temperature'] = "Temperature is required";
        }
    
    
        if (empty($data['med_condition'])) {
            $this->errors['med_condition'] = "Medical Condition is required";
        }
    
        if (empty($data['treatment'])) {
            $this->errors['treatment'] = "Treatment is required";
        }
    
        if (empty($data['prescription'])) {
            $this->errors['prescription'] = "Prescription is required";
        }

        if (empty($data['vet_name'])) {
            $this->errors['vet_name'] = "Treated By is required";
        }
    
        /*if (empty($data['remarks'])) {
            $this->errors['remarks'] = "Remarks is required";
        }*/

        return empty($this->errors);
    }
    
}


