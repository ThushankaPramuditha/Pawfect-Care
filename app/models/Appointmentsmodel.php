<?php

class AppointmentsModel
{
    use Model;

    protected $table = 'Appointments';
    protected $allowedColumns = ['id','patient_no','pet_id','pet_name','pet_owner_name','contact_no','date'];

    public function getAllAppointments()
    {
        return $this->findAll();
    }

    public function getAppointmentById($id)
    {
        return $this->first(['id' => $id]);
    }

    public function addAppointment($data)
    {
        return $this->insert($data);
    }

    public function updateAppointment($id, array $data)
    {
        // alowed column
        $data = array_filter($data, function ($key) {
            return in_array($key, $this->allowedColumns);
        }, ARRAY_FILTER_USE_KEY);
    
        return $this->update($id, $data, 'id');
    }

    // public function updateService($id, $data)
    // {
    //     return $this->update($id, $data);
    // }

    // public function deleteAppointment($id)
    // {
    //     return $this->delete($id);
    // }

    public function validate($data)
    {
        $this->errors = [];

        if (empty($data['id'])) {
            $this->errors['id'] = "Appointment ID is required";
        }

        if (empty($data['patient_no'])) {
            $this->errors['patient_no'] = "Patient No. is required";
        }

        if (empty($data['pet_id'])) {
            $this->errors['pet_id'] = "Pet ID is required";
        }

        if (empty($data['pet_name'])) {
            $this->errors['pet_name'] = "Pet Name is required";
        }

        if (empty($data['pet_owner_name'])) {
            $this->errors['pet_owner_name'] = "Pet Owner Name is required";
        }

        if (empty($data['contact_no'])) {
            $this->errors['contact_no'] = "Contact Number is required";
        }

        if (empty($data['date'])) {
            $this->errors['date'] = "Date is required";
        }

        if (empty($data['time'])) {
            $this->errors['time'] = "Time is required";
        }


        return empty($this->errors);
    }
}


