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
                <th>License Number</th>
                <th>Status</th>
                <th class="edit-action-buttons"></th>
                <th class="activate-action-buttons"></th>
                <th class="deactivate-action-buttons"></th>
            </tr>
        </thead>
        <tbody>
            <?php if (is_array($ambulancedriver) && !empty($ambulancedriver)): ?>
                <?php foreach ($ambulancedriver as $driver): ?>
                    <tr key = "<?php echo $driver->id; ?>" >
                        <td><?= htmlspecialchars($driver->id); ?></td>
                        <td><?= htmlspecialchars($driver->name); ?></td>
                        <td><?= htmlspecialchars($driver->address); ?></td>
                        <td><?= htmlspecialchars($driver->contact); ?></td>
                        <td><?= htmlspecialchars($driver->nic); ?></td>
                        <td><?= htmlspecialchars($driver->email); ?></td>
                        <td><?= htmlspecialchars($driver->qualifications); ?></td>
                        <td><?= htmlspecialchars($driver->status); ?></td>
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
                <tr>ambulance drivers found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
        
    </table>
</body>
</html>
