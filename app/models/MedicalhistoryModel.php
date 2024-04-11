<?php

class MedicalhistoryModel
{
    use Model;

    protected $table = 'treatments';
    protected $allowedColumns = ['date_time','appointment_id','weight' ,'temperature','med_condition','treatment','prescription','remarks'];

    /*public function getAllMedicalHistory()
    {
        return $this->findAll();
    }*/

    public function getAllMedicalHistory()
    {
        $query = "SELECT
        t.date_time,
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
            veterinarians v ON a.vet_id = v.id";

        return $this->query($query);
    }

    /*public function getMedicalHistoryById($id)
    {
        return $this->first(['id' => $id]);
    }*/

    public function getMedicalHistoryById($id)
    {
        $query = "SELECT
        t.date_time,
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
        WHERE t.id= :id";
        // show($id);
        // die();
        return $this->get_row($query, ['id' => $id]);
    }

    public function getMedicalHistoryForPetId($pet_id)
    {
        $query = "SELECT
        t.date_time,
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
        WHERE a.pet_id = :pet_id";

        return $this->query($query, ['pet_id' => $pet_id]);
    }
        

    /*public function addTreatment($data)
    {
        return $this->insert($data);
    }*/

    public function addTreatment($data)
    {
        $data['date_time'] = date('Y-m-d H:i:s');

        // Get vet_id from VeterinariansModel
        $vetModel = new VeterinariansModel();
        $vetId = $vetModel->getVetIdByName($data['vet_name']);

        if ($vetId !== false) {
            // Get appointment_id from AppointmentModel
            $appointmentsModel = new AppointmentsModel();
            $appointmentId = $appointmentsModel->getAppointmentId($data['patient_no'], date('Y-m-d', strtotime($data['date_time'])), $vetId);

            if ($appointmentId !== false) {
                // Prepare treatment-specific data
                $treatmentData = [
                    'appointment_id' => $appointmentId,
                    'date_time' => $data['date_time'],
                    'weight' => $data['weight'],
                    'temperature' => $data['temperature'],
                    'med_condition' => $data['med_condition'],
                    'treatment' => $data['treatment'],
                    'prescription' => $data['prescription'],
                    'remarks' => $data['remarks'],
                ];

                // Insert treatment data into the treatments table
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

    /*public function updateMedicalHistory($id, array $data)
    {
        // Filter data to only include allowed columns
        $allowedColumns = ['date_time', 'weight', 'temperature', 'med_condition', 'treatment', 'prescription', 'remarks'];
        $filteredData = array_intersect_key($data, array_flip($allowedColumns));
        
        // Perform validation if necessary
        
        // Update the medical history record
        $query = "UPDATE medical_history SET ";
        foreach ($filteredData as $key => $value) {
            $query .= "$key = :$key, ";
        }
        $query = rtrim($query, ', ');
        $query .= " WHERE id = :id";
        
        // Add the ID to the data array
        $filteredData['id'] = $id;
        
        // Execute the update query
        $this->query($query, $filteredData);
    }*/


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

        
    public function validate($data)
    {
        $this->errors = [];

        if (empty($data['date_time'])) {
            $this->errors['date_time'] = "Date Time is required";
        }

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


