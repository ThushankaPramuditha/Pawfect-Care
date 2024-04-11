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
                <!--th>Pet ID</th-->
                <th>Date Time</th>
                <th>Appointment ID</th>
                <th>Weight</th>
                <th>Temperature</th>
                <th>Medical Condition</th>
                <th>Treatment</th>
                <th>Prescription</th>
                <th>Treated By</th>
                <th>Remarks</th>
                <th class="edit-action-buttons"></th>
            </tr>
        </thead>
        
        <tbody>

        <?php if (is_array($medicalhistory) && !empty($medicalhistory)): ?>
            <?php foreach ($medicalhistory as $history): ?>
                <tr key = "<?php echo $history->id; ?>">
                    <td><?= htmlspecialchars($history->date_time); ?></td>
                    <td><?= htmlspecialchars($history->appointment_id); ?></td>
                    <td><?= htmlspecialchars($history->weight); ?></td>
                    <td><?= htmlspecialchars($history->temperature); ?></td>
                    <td><?= htmlspecialchars($history->med_condition); ?></td>
                    <td><?= htmlspecialchars($history->treatment); ?></td>
                    <td><?= htmlspecialchars($history->prescription); ?></td>
                    <td><?= htmlspecialchars($history->treated_by); ?></td>
                    <td><?= htmlspecialchars($history->remarks); ?></td>
                    <td class="edit-action-buttons">
                        <button class="edit-icon"></button>
                    </td>
                </tr>
                
            <?php endforeach; ?>
        <?php else: ?>
            <tr>

                <td colspan="9">No history found.</td>


            </tr>
        <?php endif; ?>
        
        </tbody>
         
            
     </table>
</body>
</html>
