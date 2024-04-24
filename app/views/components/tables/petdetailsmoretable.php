<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/tables.css">
</head>
<body>                                           <!--not used this table.anyone can change this-->
    <table >
        <thead>
            <tr>
                <th>Pet ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Breed</th>
                <th>Species</th>
                <th>Gender</th>
                <th>Owner ID</th>
                <th>Owner Name</th>
                <th>Contact Number</th>
                <th class="medicalhistory-action-buttons"></th>
                <th class="vaccinationhistory-action-buttons"></th>
            </tr>
        </thead>
        <tbody>

            <?php if (is_array($petdetails) && !empty($petdetails)): ?>
                <?php foreach ($petdetails as $petdetail): ?>
                    <tr key="<?php echo $petdetail->id; ?>">
                        <td><?= htmlspecialchars($petdetail->id); ?></td>
                        <td><?= htmlspecialchars($petdetail->name); ?></td>
                        <td><?= htmlspecialchars($petdetail->age); ?></td>
                        <td><?= htmlspecialchars($petdetail->breed); ?></td>
                        <td><?= htmlspecialchars($petdetail->species); ?></td>
                        <td><?= htmlspecialchars($petdetail->gender); ?></td>
                        <td><?= htmlspecialchars($petdetail->petowner_id); ?></td>
                        <td><?= htmlspecialchars($petdetail->owner_name); ?></td>
                        <td><?= htmlspecialchars($petdetail->contact); ?></td>
                        <td class="medicalhistory-action-buttons">
                            <!--button class="medicalhistory-button"><a href="<!?php echo ROOT ?>/veterinarian/medicalhistory/<?php echo $petdetail->id ?>">Medical History</a></button-->
                            <button class="medicalhistory-button" onclick="getMedicalHistory(<?php echo $petdetail->id ?>)">Medical History</button>
                        </td>
                        <td class="vaccinationhistory-action-buttons">
                            <!--button class="vaccinationhistory-button"><a href="<?php echo ROOT ?>/veterinarian/vaccinationhistory/<?php echo $petdetail->id ?>">Vaccination History</a></button-->
                            <button class="vaccinationhistory-button" onclick="getVaccinationHistory(<?php echo $petdetail->id ?>)">Vaccination History</button>
                        </td>
                    </tr>
                    
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="20">No petdetail found.</td>
                </tr>
            <?php endif; ?>

        </tbody>
       
    </table>
</body>
</html>
