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
                <th>Patient No</th>
                <th>Pet ID</th>
                <th>Pet Name</th>
                <th>Pet Owner</th>
                <th>Contact Number</th>
                <th>Date</th>
                <th class="edit-action-buttons"></th>
    
            </tr>
        </thead>
        <tbody>

<?php foreach ($appointments as $appointment) { ?>
    <tr key="<?php echo $appointment->id; ?>">
        <td><?php echo $appointment->patient_no?></td>
        <td><?php echo $appointment->pet_id?></td>
        <td><?php echo $appointment->pet_name?></td>
        <td><?php echo $appointment->pet_owner_name?></td>
        <td><?php echo $appointment->contact_no?></td>
        <td><?php echo $appointment->date?></td>

        <td class="edit-action-buttons">
            <button class="edit-icon"></button>
        </td>
        
    </tr>
<?php } ?>

        </tbody>
    </table>
</body>
</html>
