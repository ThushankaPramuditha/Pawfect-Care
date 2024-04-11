<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/tables.css">
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Breed</th>
                <th>Weight</th>
                <th>Temperature</th>
                <th>Pet ID</th>
                <th>Species</th>
                <th>Gender</th>
                <th>Owner Name</th>
                <th>Contact Number</th>
                <th class="medicalhistory-action-buttons"></th>
                <th class="vaccinationhistory-action-buttons"></th>
                <th class="edit-action-buttons"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Buddy</td>
                <td>2</td>
                <td>Labrador Retriever</td>
                <td>25 kg</td>
                <td>38.5°C</td>
                <td>12345</td>
                <td>Dog</td>
                <td>Male</td>
                <td>John Doe</td>
                <td>0775367289</td>
                <td class="medicalhistory-action-buttons">
                    <button class="medicalhistory-button"><a href = "medicalhistory">Medical History</a></button>
                </td>
                <td class="vaccinationhistory-action-buttons">
                    <button class="vaccinationhistory-button"><a href = "vaccinationhistory">Vaccination History</a></button>
                </td>
                <td class="edit-action-buttons">
                <a href = "<?php echo $_SESSION['updatepath'] ?>"><button class="edit-icon"></button></a>                </td>
            </tr>
            <tr>
                <td>Luna</td>
                <td>3</td>
                <td>Golden Retriever</td>
                <td>28 kg</td>
                <td>37.2°C</td>
                <td>67890</td>
                <td>Dog</td>
                <td>Female</td>
                <td>Jane Smith</td>
                <td>0783526789</td>
                <td class="medicalhistory-action-buttons">
                    <button class="medicalhistory-button"><a href = "medicalhistory">Medical History</a></button>
                </td>
                <td class="vaccinationhistory-action-buttons">
                    <button class="vaccinationhistory-button"><a href = "vaccinationhistory">Vaccination History</a></button>
                </td>
                <td class="edit-action-buttons">
                <a href = "<?php echo $_SESSION['updatepath'] ?>"><button class="edit-icon"></button></a>                </td>
            </tr>
           
                
        

        </tbody>
    </table>
</body>
</html>
