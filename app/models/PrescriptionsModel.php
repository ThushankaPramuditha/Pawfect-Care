<?php

class PrescriptionsModel
{
    use Database;
    use Model;

    protected $table = 'prescriptions';
    protected $allowedColumns = ['name'];

    public function getAllPrescriptions()
    {
        $query = "SELECT *
                FROM prescriptions ";

        return $this->query($query);
    }

    public function getPrescriptionById($prescriptionId)
    {
        $query = "SELECT * 
                FROM prescriptions 
                WHERE id = :prescriptionId";

        return $this->query($query,[':prescriptionId' => $prescriptionId]);
    }

}
