<?php

class Petdetails
{
    use Controller;

    public function index(string $a = '', string $b = '', string $c = ''): void
    {
        AuthorizationMiddleware::authorize(['Medical Staff']);
        $userdataModel = new MedicalStaffModel();
        $data['userdata'] = $userdataModel->getMedstaffRoleDataById($_SESSION['USER']->id);

        $petsModel = new PetsModel();
        $petDetails = $petsModel->getAllPetDetails();

        // Calculate age for each pet
        foreach ($petDetails as $pet) {
            $pet->age = $this->calculateAge($pet->birthday);
        }

        $data['petdetails'] = $petDetails;
        $this->view('medicalstaff/petdetails', $data);
    }

    public function calculateAge($birthday) {
        AuthorizationMiddleware::authorize(['Medical Staff']);
        $dateOfBirth = new DateTime($birthday);
        $today = new DateTime('today');
        return $dateOfBirth->diff($today)->y;
    }

    public function search(): void {
        $petsModel = new PetsModel();
        $searchTerm = $_POST['search'] ?? '';
        
       $petdetails = $petsModel->searchAllPetDetails($searchTerm);
        
        if(empty($petdetails)) {
            echo "<tr><td colspan='9'>No pet details found</td></tr>";
        } else {
            foreach ($petdetails as $petdetail) {
                echo "<tr key='{$petdetail->id}'>";
                echo "<td>{$petdetail->id}</td>";
                echo "<td>{$petdetail->name}</td>";
                echo "<td>{$petdetail->age}</td>";
                echo "<td>{$petdetail->breed}</td>";
                echo "<td>{$petdetail->species}</td>";
                echo "<td>{$petdetail->gender}</td>";
                echo "<td>{$petdetail->petowner_id}</td>";
                echo "<td>{$petdetail->owner_name}</td>";
                echo "<td>{$petdetail->contact}</td>";
                echo "<td class='medicalhistory-action-buttons'>";
                echo "<button class='medicalhistory-button' id='{$petdetail->id}'>Medical History</button>";
                echo "</td>";
                echo "<td class='vaccinationhistory-action-buttons'>";
                echo "<button class='vaccinationhistory-button' id='{$petdetail->id}'>Vaccination History</button>";
                echo "</td>";
                echo "</tr>";
            }
        }
        exit;
    }


    /*public function viewPetdetails(string $a = '', string $b = '', string $c = ''): void
    {
        $userdataModel = new MedicalStaffModel();
		$data['userdata'] = $userdataModel->getMedstaffRoleDataById($_SESSION['USER']->id);
        $petsModel = new PetsModel();
        $data['petdetails'] = $petsModel-> getPetdetailsById($a);
         // show($a);
        // die();
        $this->view('medicalstaff/petdetails/update', $data);
    }*/
    
}


