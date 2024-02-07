<?php

class PetDetailsModel
{
    use Model;

    protected $table = 'petdetails';
    protected $allowedColumns = ['id', 'pet_id', 'pet_name', 'pet_type', 'breed', 'age', 'weight', 'gender'];

    // Get all pet details
    public function getAllPetDetails()
    {
        return $this->findall();
    }

    // Get pet details by ID
    public function getPetDetailsById($id)
    {
        return $this->first(['id' => $id]);
    }

    // Add pet details
    public function addPetDetails($data)
    {
        // Validate the data before proceeding
        if (!$this->validate($data)) {
            return false;
        }

        // Insert pet details into the petdetails table
        return $this->insert($data);
    }

    // Update pet details by ID
    public function updatePetDetails($id, array $data)
    {
        // Validate the data before proceeding
        if (!$this->validate($data)) {
            return false;
        }

        // Allow only the specified columns
        $data = array_filter($data, function ($key) {
            return in_array($key, $this->allowedColumns);
        }, ARRAY_FILTER_USE_KEY);

        // Update pet details in the petdetails table
        return $this->update($id, $data, 'id');
    }

    // Delete pet details by ID
    public function deletePetDetails($id)
    {
        return $this->delete($id);
    }

    // Validate pet details data
    public function validate($data)
    {
        $this->errors = [];

        if (empty($data['pet_name'])) {
            $this->errors['pet_name'] = "Pet Name is required";
        }

        if (empty($data['pet_type'])) {
            $this->errors['pet_type'] = "Pet Type is required";
        }

        if (empty($data['breed'])) {
            $this->errors['breed'] = "Breed is required";
        }

        if (empty($data['dob'])) {
            $this->errors['dob'] = "Date of Birth is required";
        }

        if (empty($data['weight'])) {
            $this->errors['weight'] = "Weight is required";
        }

        if (empty($data['gender'])){
             $this->errors['gender']= "Gender is required";
        }

        return empty($this->errors);
    }
}
