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
                <th>Pet ID</th>
                <th>Date</th>
                <th>Medical Condition</th>
                <th>Treatment</th>
                <th>Medication</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody>

        <?php foreach ($medicalhistory as $medicalhistory) { ?>
                <tr key = "<?php echo $medicalhistory->id; ?>" >
                    <td><?php echo $medicalhistory->id?></td>
                    <td><?php echo $medicalhistory->date?></td>
                    <td><?php echo $medicalhistory->medical_condition?></td>
                    <td><?php echo $medicalhistory->treatment?></td>
                    <td><?php echo $medicalhistory->medication?></td>
                    <td><?php echo $medicalhistory->remarks?></td>
                    <td class="edit-action-buttons">
                    <button class="edit-icon"></button>
                    </td>
                    
                </tr>

                <?php
                } 
                ?>
                    
        </tbody>
    </table>
</body>
</html>
