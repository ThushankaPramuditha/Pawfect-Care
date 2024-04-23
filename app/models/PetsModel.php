<?php

class PetsModel
{
    use Model;

    protected $table = 'pets';
    protected $allowedColumns = ['name', 'birthday', 'gender', 'species', 'breed', 'petowner_id'];

    public function getAllPetsByUserId($id) {
        $query = "SELECT p.id, p.name
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
                  JOIN users AS u ON p.user_id = u.id
                  WHERE p.id = :id";
        // show($id);
        // die();
        return $this->get_row($query, ['id' => $id]);
    }





}