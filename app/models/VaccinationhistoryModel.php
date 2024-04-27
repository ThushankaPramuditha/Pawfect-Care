<?php

class VaccinationhistoryModel
{
    use Database;
    use Model;

    protected $table = 'vaccinations';
    protected $allowedColumns = ['appointment_id','weight','temperature','vaccine_name','serial_no','due_date','remarks'];

     //CHECK THIS ADD VACCHISTORY PART

    // public function getAllVaccinationHistory()
    // {
    //     return $this->where(['status' => 'active']);
    // }

    public function getAllVaccinationHistory()
    {

        $query ="SELECT
                DATE(a.date_time) AS date,
                p.id AS pet_id,
                vc.id,
                vc.appointment_id,
                vc.weight,
                vc.temperature,
                vc.vaccine_name,
                vc.serial_no,
                v.name AS administered_by,
                vc.due_date,
                vc.remarks
            FROM
                vaccinations vc
            JOIN
                appointments a ON vc.appointment_id = a.id
            JOIN
                veterinarians v ON a.vet_id = v.id
            JOIN
            pets p ON a.pet_id = p.id
            ORDER BY a.id ASC";

        return $this->query($query);

    }
    

   // public function getVaccinationHistoryById($id)
   //{
   //     return $this->first(['id' => $id]);
   // }

    public function getVaccinationHistoryById($id) 
    {
        $query = "SELECT
                  DATE(a.date_time) AS date,
                  vc.appointment_id,
                  p.id AS pet_id,
                  vc.id,
                  vc.weight,
                  vc.temperature,
                  vc.vaccine_name,
                  vc.serial_no,
                  v.name AS administered_by,
                  vc.due_date,
                  vc.remarks
                FROM
                    vaccinations vc
                JOIN
                    appointments a ON vc.appointment_id = a.id
                JOIN
                    veterinarians v ON a.vet_id = v.id
                JOIN
                    pets p ON a.pet_id = p.id
                WHERE vc.id= :id";
        // show($id);
        // die();
        return $this->get_row($query, ['id' => $id]);
    }

    public function getAllVaccinationHistoryForPetId($pet_id) 
    {
        
        $query = "SELECT
                    DATE(a.date_time) AS date,
                    vc.appointment_id,
                    vc.id,
                    p.id AS pet_id,
                    vc.weight,
                    vc.temperature,
                    vc.vaccine_name,
                    vc.serial_no,
                    v.name AS administered_by,
                    vc.due_date,
                    vc.remarks
                FROM
                    vaccinations vc
                JOIN
                    appointments a ON vc.appointment_id = a.id
                JOIN
                    veterinarians v ON a.vet_id = v.id
                JOIN
                    pets p ON a.pet_id = p.id 
                WHERE a.pet_id = :pet_id
                ORDER BY a.id ASC";
        return $this->query($query, ['pet_id' => $pet_id]);
    }

    
    public function searchVaccinationHistoryPerPet($searchTerm, $petId) {
        $searchTerm = "%{$searchTerm}%";
        $query = "SELECT
                DATE(a.date_time) AS date,
                vc.appointment_id,
                vc.id,
                p.id AS pet_id,
                vc.weight,
                vc.temperature,
                vc.vaccine_name,
                vc.serial_no,
                v.name AS administered_by,
                vc.due_date,
                vc.remarks
            FROM
                vaccinations vc
            JOIN
                appointments a ON vc.appointment_id = a.id
            JOIN
                veterinarians v ON a.vet_id = v.id
            JOIN
                pets p ON a.pet_id = p.id 
            WHERE a.pet_id = :petId AND
            (vc.serial_no LIKE :searchTerm OR
            vc.vaccine_name LIKE :searchTerm OR
            v.name LIKE :searchTerm)
            ORDER BY a.id ASC";
    
        $parameters = [':searchTerm' => $searchTerm, ':petId' => $petId];
    
    
        return $this->query($query, $parameters);
    }


    public function getVaccinationHistoryForPetIdById($id,$pet_id) 
    {
        $query = "SELECT
                    DATE(a.date_time) AS date,
                    vc.appointment_id,
                    vc.id,
                    p.id AS pet_id,
                    vc.weight,
                    vc.temperature,
                    vc.vaccine_name,
                    vc.serial_no,
                    v.name AS administered_by,
                    vc.due_date,
                    vc.remarks
                FROM
                    vaccinations vc
                JOIN
                    appointments a ON vc.appointment_id = a.id
                JOIN
                    veterinarians v ON a.vet_id = v.id
                JOIN
                    pets p ON a.pet_id = p.id 
                WHERE a.pet_id = :pet_id AND t.id = :id";

        return $this->get_row($query, ['pet_id' => $pet_id, 'id' => $id]);
    }

    public function addVaccination($data)
    {
        $data['date'] = date('Y-m-d');

        $vetModel = new VeterinariansModel();
        $vetId = $vetModel->getVetIdByName($data['vet_name']);

        if ($vetId !== false) {
            
            $appointmentsModel = new AppointmentsModel();
            $appointmentId = $appointmentsModel->getAppointmentId($data['patient_no'], $data['date'], $vetId);

            if ($appointmentId !== false) {
                
                $vaccinationData = [
                    'appointment_id' => $appointmentId,
                    'weight' => $data['weight'],
                    'temperature' => $data['temperature'],
                    'vaccine_name' => $data['vaccine_name'],
                    'serial_no' => $data['serial_no'],
                    'due_date' => $data['due_date'],
                    'remarks' => $data['remarks'],
                ];

                return $this->insert($vaccinationData);

            } else {
                
                $this->errors[] = 'Appointment id not found.';
                return false;
            }
        } else {
            
            $this->errors[] = 'Veterinarian not found.';
            return false;
        }
    }

    public function updateVaccinationHistory($id, array $data)
    {

        //allowed columns
        $data = array_filter($data, function ($key){
            return in_array($key, $this->allowedColumns);
        }, ARRAY_FILTER_USE_KEY);
    
        return $this->update($id, $data, 'id');
    }

    /*public function search($pet_id , $term)
    {
        $term = "%{$term}%";

        $query = "SELECT
                    DATE(a.date_time) AS date,
                    vc.appointment_id,
                    vc.id,
                    p.id AS pet_id,
                    vc.weight,
                    vc.temperature,
                    vc.vaccine_name,
                    vc.serial_no,
                    v.name AS administered_by,
                    vc.due_date,
                    vc.remarks
                FROM
                    vaccinations vc
                JOIN
                    appointments a ON vc.appointment_id = a.id
                JOIN
                    veterinarians v ON a.vet_id = v.id
                JOIN
                    pets p ON a.pet_id = p.id 
                WHERE a.pet_id = :pet_id AND
                    (DATE(a.date_time) = :term OR
                    vc.vaccine_name = :term OR
                    vc.serial_no = :term
                    v.name = :term)
                ORDER BY a.id ASC";

        return $this->query($query, ['pet_id' => $pet_id,'term' => $term]);
       
    }*/

    
    
    /*public function deleteVaccinationHistory($id)
    {
        return $this->delete($id);
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
    
    
        if (empty($data['vaccine_name'])) {
            $this->errors['vaccine_name'] = "Vaccine Name is required";
        }
    
        if (empty($data['serial_no'])) {
            $this->errors['serial_no'] = "Serial No is required";
        }

        if (empty($data['vet_name'])) {
            $this->errors['vet_name'] = "Administered By is required";
        }

        if (empty($data['due_date'])) {
            $this->errors['due_date'] = "Next Due Date is required";
        }

        /* if (empty($data['remarks'])) {
            $this->errors['remarks'] = "Remarks is required";
        }*/

        return empty($this->errors);
    }

    
}


