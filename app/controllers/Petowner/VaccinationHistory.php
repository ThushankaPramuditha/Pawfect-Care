<?php 

class VaccinationHistory
{
	use Controller;

    public function index(string $a = '', string $b = '', string $c = ''): void
    {
        AuthorizationMiddleware::authorize(['Pet Owner']);
        $this->view('petowner/vaccinationhistory');
    }


	public function getVaccinationData($id)
	{
        AuthorizationMiddleware::authorize(['Pet Owner']);
      
        $vacModel = new VaccinationhistoryModel();
        $data['vaccinationhistory']  = $vacModel->getAllVaccinationHistoryForPetId($id);
        
        $this->view('petowner/vaccinationhistory', $data);    
	}

    public function search(): void {
        $vaccinationHistoryModel = new VaccinationhistoryModel();
        $searchTerm = $_POST['search'] ?? '';
        $petId = $_POST['petId'] ?? '';
       
        $vaccination = $vaccinationHistoryModel->searchVaccinationHistoryPerPet($searchTerm, $petId);
        
        if(empty($vaccination)) {
            echo "<tr><td colspan='9'>No vaccination records found</td></tr>";
        } else {
            foreach ($vaccination as $history) {
                echo "<tr key='{$history->id}'>";
                echo "<td>{$history->id}</td>";
                echo "<td>{$history->date}</td>";
                echo "<td>{$history->weight}</td>";
                echo "<td>{$history->temperature}</td>";
                echo "<td>{$history->vaccine_name}</td>";
                echo "<td>{$history->serial_no}</td>";
                echo "<td>{$history->administered_by}</td>";
                echo "<td>{$history->due_date}</td>";
                echo "<td>{$history->remarks}</td>";
                echo "</tr>";
            }
        }
        exit;
    }
    
}


    


?>