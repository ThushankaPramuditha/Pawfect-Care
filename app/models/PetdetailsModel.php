<?php


class PetdetailsModel
{
    use Model;

    protected $table = 'pets';
    protected $allowedColumns = ['id', 'name','age','breed','species','gender','petowner_id'];

   /* public function calculateAge($birthday) {
        // Calculate the difference between the birthday and the current date
        $diff = date_diff(date_create($birthday), date_create());

        // Return the age
        return $diff->y . ' years, ' . $diff->m . ' months, ' . $diff->d . ' days';
    }*/

    public function getAllPetDetails()
    {
        //$age = $this->calculateAge('birthday');
        //return $this->findAll();
        $query = "SELECT p.*, po.name AS owner_name, po.contact
        FROM
            pets p
        JOIN
            petowners po ON p.petowner_id = po.id";

        return $this->query($query);
    }

    public function getPetDetailsById($id)
    {
        //$age = $this->calculateAge('birthday');
        //return $this->first(['id' => $id]);
        $query = "SELECT p.*, po.name AS owner_name, po.contact
        FROM
            pets p
        JOIN
            petowners po ON p.petowner_id = po.id
        WHERE p.id= :id";

        return $this->get_row($query, ['id' => $id]);
    }

    public function addPetDetails($data)
    {
        return $this->insert($data);
    }

    public function updatePetDetails($id, array $data)
    {
        // alowed column
        $data = array_filter($data, function ($key) {
            return in_array($key, $this->allowedColumns);
        }, ARRAY_FILTER_USE_KEY);
    
        return $this->update($id, $data, 'id');
    }

    

    public function deleteVaccinationHistory($id)

    {
        return $this->delete($id);
    }


    public function validate($data)
    {
        $this->errors = [];


        if (empty($data['id'])) {
            $this->errors['id'] = "PetID is required";
        }
    
        if (empty($data['name'])) {
            $this->errors['name'] = "Name is required";
        }
    
        if (empty($data['age'])) {
            $this->errors['age'] = "Age is required";
        }
    
        if (empty($data['breed'])) {
            $this->errors['breed'] = "Breed is required";
        }
    
        if (empty($data['species'])) {
            $this->errors['species'] = "Species is required";
        }
    
        if (empty($data['gender'])) {
            $this->errors['gender'] = "Gender is required";
        }
    
        if (empty($data['owner_name'])) {
            $this->errors['owner_name'] = "Owner Name is required";
        }
    
        if (empty($data['contact'])) {
            $this->errors['contact'] = "Contact No is required";
        }
    
        return empty($this->errors);
    }
    
}
