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
                <th>Staff ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Contact No.</th>
                <th>NIC</th>
                <th>Email</th>
                <th>Qualifications</th>
                <th>Status</th>
                <th class="edit-action-buttons"></th>
                <th class="activate-action-buttons"></th>
                <th class="deactivate-action-buttons"></th>
            </tr>
        </thead>


        <tbody>
            <?php if (is_array($veterinarians) && !empty($veterinarians)): ?>
                <?php foreach ($veterinarians as $vet): ?>
                    <tr key = "<?php echo $vet->id; ?>" >
                        <td><?= htmlspecialchars($vet->id); ?></td>
                        <td><?= htmlspecialchars($vet->name); ?></td>
                        <td><?= htmlspecialchars($vet->address); ?></td>
                        <td><?= htmlspecialchars($vet->contact); ?></td>
                        <td><?= htmlspecialchars($vet->nic); ?></td>
                        <td><?= htmlspecialchars($vet->email); ?></td>
                        <td><?= htmlspecialchars($vet->qualifications); ?></td>
                        <td><?= htmlspecialchars($vet->status); ?></td>
                        <td class="edit-action-buttons">
                            <button class="edit-icon"></button>
                        </td>
                        <td class="activate-action-buttons">
                            <button class="activate-button">Activate</button>
                        </td>
                        <td class="deactivate-action-buttons">
                            <button class="deactivate-button">Deactivate</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="9">No veterinarians found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
        
       
    </table>
</body>
</html>
