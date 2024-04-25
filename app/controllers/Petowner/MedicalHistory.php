<?php 

class MedicalHistory
{
	use Controller;

	public function index(string $a = '', string $b = '', string $c = ''): void
	{
        AuthorizationMiddleware::authorize(['Pet Owner']);
        $medModel = new MedicalhistoryModel();
        $data['medicalhistory']  = $medModel->getAllMedicalHistoryForPetId($id);
        
        $this->view('petowner/medicalhistory', $data);
	}

    public function getMedicalData($id)
	{
        AuthorizationMiddleware::authorize(['Pet Owner']);
      
        $medModel = new MedicalhistoryModel();
        $data['medicalhistory']  = $medModel->getAllMedicalHistoryForPetId($id);
        
        $this->view('petowner/medicalhistory', $data);    
	}

    public function search(): void {
        $medicalHistoryModel = new MedicalhistoryModel();
        $searchTerm = $_POST['search'] ?? '';
        $petId = $_POST['petId'] ?? '';
       
        $medical = $medicalHistoryModel->searchMedicalHistoryPerPet($searchTerm, $petId);
        
        if(empty($medical)) {
            echo "<tr><td colspan='9'>No medical records found</td></tr>";
        } else {
            foreach ($medical as $history) {
                echo "<tr key='{$history->id}'>";
                echo "<td>{$history->pet_id}</td>";
                echo "<td>{$history->date}</td>";
                echo "<td>{$history->weight}</td>";
                echo "<td>{$history->temperature}</td>";
                echo "<td>{$history->med_condition}</td>";
                echo "<td>{$history->treatment}</td>";
                echo "<td>{$history->prescription}</td>";
                echo "<td>{$history->treated_by}</td>";
                echo "<td>{$history->remarks}</td>";
                echo "</tr>";
            }
        }
        exit;
    }
}


    


?>