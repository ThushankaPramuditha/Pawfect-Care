<?php

class VaccinesModel
{
    use Database;
    use Model;

    protected $table = 'vaccines';
    protected $allowedColumns = ['name','serial_no'];

    public function getAllVaccines()
    {
        $query = "SELECT *
                FROM vaccines ";

        return $this->query($query);

    }
    public function getVaccineById($vaccineId)
    {
        $query = "SELECT * 
                FROM vaccines 
                WHERE id = :vaccineId";

        return $this->query($query,[':vaccineId' => $vaccineId]);
    }

}