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
            <?php if (is_array($daycarestaff) && !empty($daycarestaff)): ?>
                <?php foreach ($daycarestaff as $dstaff): ?>
                    <tr key = "<?php echo $dstaff->id; ?>" >
                        <td><?= htmlspecialchars($dstaff->id); ?></td>
                        <td><?= htmlspecialchars($dstaff->name); ?></td>
                        <td><?= htmlspecialchars($dstaff->address); ?></td>
                        <td><?= htmlspecialchars($dstaff->contact); ?></td>
                        <td><?= htmlspecialchars($dstaff->nic); ?></td>
                        <td><?= htmlspecialchars($dstaff->email); ?></td>
                        <td><?= htmlspecialchars($dstaff->qualifications); ?></td>
                        <td><?= htmlspecialchars($dstaff->status); ?></td>
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
                    <td colspan="9">No daycare staff found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
        
       
    </table>
</body>
</html>
