<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/tables.css">
</head>
<body>
   <div class="tablecontainer"> 
     <table>
        <thead>
            <tr>

                <th>Date Time</th>
                <th>Patient No.</th>
                <th>Pet ID</th>
                <th>Pet Name</th>
                <th>Pet Owner</th>
                <th>Contact Number</th>

                <th>Vet Name</th>
                <th class="edit-action-buttons"></th>

               
            </tr>
        </thead>
        <tbody>
            <?php if (is_array($appointments) && !empty($appointments)): ?>
                <?php foreach ($appointments as $appointment): ?>
                    <tr key = "<?php echo $appointment->id; ?>">
                        <td><?= htmlspecialchars($appointment->date_time); ?></td>
                        <td><?= htmlspecialchars($appointment->patient_no); ?></td>
                        <td><?= htmlspecialchars($appointment->pet_id); ?></td>
                        <td><?= htmlspecialchars($appointment->pet_name); ?></td>
                        <td><?= htmlspecialchars($appointment->petowner); ?></td>
                        <td><?= htmlspecialchars($appointment->contact); ?></td>
                        <td><?= htmlspecialchars($appointment->vet_name); ?></td>
                        <td class="edit-action-buttons">
                            <button class="edit-icon"></button>
                        </td>
                    </tr>
                    
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="9">No appointments found.</td>
                </tr>
            <?php endif; ?>
         



        </tbody>
        </table>
    </div>

</body>
</html>
