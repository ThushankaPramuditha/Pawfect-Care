<?php

class VaccinationhistoryModel
{
    use Database;
    use Model;

    protected $table = 'vaccinations';
    protected $allowedColumns = ['appointment_id','date', 'vaccine_name','serial_no','due_date','remarks'];

     //CHECK THIS ADD VACCHISTORY PART

    // public function getAllVaccinationHistory()
    // {
    //     return $this->where(['status' => 'active']);
    // }

    public function getAllVaccinationHistory()
    {

        $query = "SELECT
                vc.date,
                vc.appointment_id,
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
                veterinarians v ON a.vet_id = v.id"
            ;

        return $this->query($query);

    }
    

   // public function getVaccinationHistoryById($id)
   //{
   //     return $this->first(['id' => $id]);
   // }

    public function getVaccinationHistoryById($id) 
    {
        $query = "SELECT
                  vc.date,
                  vc.appointment_id,
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
                WHERE vc.id= :id";
        // show($id);
        // die();
        return $this->get_row($query, ['id' => $id]);
    }

    public function getVaccinationHistoryForPetId($pet_id) 
    {
        $query = "SELECT
                    vc.date,
                    vc.appointment_id,
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
                WHERE a.pet_id = :pet_id";

        return $this->query($query, ['pet_id' => $pet_id]);
    }


    public function addVaccination($data)
    {
        $data['date'] = date('Y-m-d');

        // Get vet_id from VeterinariansModel
        $vetModel = new VeterinariansModel();
        $vetId = $vetModel->getVetIdByName($data['vet_name']);

        if ($vetId !== false) {
            // Get appointment_id from AppointmentModel
            $appointmentsModel = new AppointmentsModel();
            $appointmentId = $appointmentsModel->getAppointmentId($data['patient_no'], $data['date'], $vetId);

            if ($appointmentId !== false) {
                // Prepare vaccination-specific data
                $vaccinationData = [
                    'appointment_id' => $appointmentId,
                    'date' => $data['date'],
                    'vaccine_name' => $data['vaccine_name'],
                    'serial_no' => $data['serial_no'],
                    'due_date' => $data['due_date'],
                    'remarks' => $data['remarks'],
                ];

                // Insert vaccination data into the vaccinations table
                return $this->insert($vaccinationData);

            } else {
                // Handle the case where no appointment is found
                $this->errors[] = 'Appointment id not found.';
                return false;
            }
        } else {
            // Handle the case where no veterinarian is found
            $this->errors[] = 'Veterinarian not found.';
            return false;
        }
    }

    public function updateVaccinationHistory($id, array $data)
    {

        // Filter data to only include allowed columns
        $data = array_filter($data, function ($key){
            return in_array($key, $this->allowedColumns);
        }, ARRAY_FILTER_USE_KEY);
    
        return $this->update($id, $data, 'id');
    }
    
    
    /*public function deleteVaccinationHistory($id)
    {
        return $this->delete($id);
    }*/

        
    public function validate($data)
    {
        $this->errors = [];

        if (empty($data['date'])) {
            $this->errors['date'] = "Date is required";
        }

        if (empty($data['patient_no'])) {
            $this->errors['patient_no'] = "Patient No is required";
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


