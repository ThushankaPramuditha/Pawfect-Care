

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/tables.css">
</head>
<body>
<div class = "table-container">
<table>
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
                <th>NIC</th>
                
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
                        <td><?= htmlspecialchars($petdetail->nic); ?></td>
                        
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


