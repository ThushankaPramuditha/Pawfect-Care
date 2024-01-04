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
                <th class="edit-action-buttons"></th>
                <th class="deactivate-action-buttons"></th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($veterinarians as $veterinarian) { ?>
                <tr key = "<?php echo $veterinarian->id; ?>" >
                    <td><?php echo $veterinarian->id?></td>
                    <td><?php echo $veterinarian->name?></td>
                    <td><?php echo $veterinarian->address?></td>
                    <td><?php echo $veterinarian->contact?></td>
                    <td><?php echo $veterinarian->nic?></td>
                    <td><?php echo $veterinarian->email?></td>
                    <td><?php echo $veterinarian->qualifications?></td>
                    <td class="edit-action-buttons">
                    <button class="edit-icon"></button>
                    </td>
                    <td class="deactivate-action-buttons">
                    <button class="deactivate-button">Deactivate</button>
                </td>
                </tr>

                <?php
                } 
                ?>
                    
        </tbody>
       
    </table>
</body>
</html>
