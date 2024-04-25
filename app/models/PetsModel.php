<?php

class PetsModel
{
    use Model;

    protected $table = 'pets';
    protected $allowedColumns = ['name', 'birthday', 'gender', 'species', 'breed', 'petowner_id'];

    public function getAllPetDetails()
    {
        
        //return $this->findAll();
        $query = "SELECT p.*, po.name AS owner_name, po.contact
        FROM
            pets p
        JOIN
            petowners po ON p.petowner_id = po.id";

        return $this->query($query);
    }

    /*public function getPetDetailsById($id)
    {
        //return $this->first(['id' => $id]);
        $query = "SELECT p.*, po.name AS owner_name, po.contact
        FROM
            pets p
        JOIN
            petowners po ON p.petowner_id = po.id
        WHERE p.id= :id";

        return $this->get_row($query, ['id' => $id]);
    }*/

    
    public function getAllPetsByUserId($id) {
        $query = "SELECT p.*, u.email, u.status
        FROM pets AS p
        JOIN petowners AS po ON p.petowner_id = po.id
        JOIN users AS u ON po.user_id = u.id
        WHERE u.id = :id";
  
        return $this->query($query, ['id' => $id]);
        
    }

    public function getAllPetsDetailsByPetId($id) {
        $query = "SELECT  p.name AS pet_name, p.birthday, p.gender,p.species,p.breed, po.name AS pet_owner_name, po.address, po.contact, po.nic
        FROM pets AS p
        JOIN petowners AS po ON p.petowner_id = po.id
        WHERE p.id = :id";
  
        return $this->query($query, ['id' => $id]);
        
    }

    public function getPetById($id) {
        $query = "SELECT p.*, u.email, u.status
                  FROM pets AS p
                  JOIN petowners AS po ON p.petowner_id = po.id
                  JOIN users AS u ON po.user_id = u.id
                  WHERE u.id = :id";
        
        return $this->get_row($query, ['id' => $id]);
    }
    

    public function addPet($data) {
      
        return $this->insert($data);
    }
    

    public function updatePet($id, $data) {
        $data = array_filter($data, function ($key) {
            return in_array($key, $this->allowedColumns);
        }, ARRAY_FILTER_USE_KEY);
        return $this->update($id, $data, 'id');
    }

    public function deletePet($id) {
        return $this->delete($id);
    }

    public function getPetsByOwnerId($id) {
        $query = "SELECT * FROM pets WHERE petowner_id = :id";
        return $this->query($query, ['id' => $id]);
    }

}