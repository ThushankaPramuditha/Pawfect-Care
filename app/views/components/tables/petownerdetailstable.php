

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
                <th>Petowner ID</th>
                <th>Name</th>
                <th>NIC</th>
                <th>Email</th>
                <th>Address</th>
                <th>Contact Number</th>
                
            </tr>
        </thead>
        <tbody>

            <?php if (is_array($petownerdetails) && !empty($petownerdetails)): ?>
                <?php foreach ($petownerdetails as $petownerdetail): ?>
                    <tr key="<?php echo $petownerdetail->id; ?>">
                        <td><?= htmlspecialchars($petownerdetail->id); ?></td>
                        <td><?= htmlspecialchars($petownerdetail->name); ?></td>
                        <td><?= htmlspecialchars($petownerdetail->nic); ?></td>
                        <td><?= htmlspecialchars($petownerdetail->email); ?></td>
                        <td><?= htmlspecialchars($petownerdetail->address); ?></td>
                        <td><?= htmlspecialchars($petownerdetail->contact); ?></td>
                  
                        
                    </tr>
                    
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="20">No petowner details found.</td>
                </tr>
            <?php endif; ?>

        </tbody>
       
    </table>
</body>
</html>


