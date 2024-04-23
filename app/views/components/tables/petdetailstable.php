<!-- <!DOCTYPE html>
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
                <th>Pet Name</th>
                <th>Owner Name</th>
                <th>NIC</th>
                <th>Breed</th>
                <th>Date of Birth</th>
                <th>Gender</th>
                <th class="edit-action-buttons"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>12345</td>
                <td>Buddy</td>
                <td>John Doe</td>
                <td>AB123456C</td>
                <td>Labrador Retriever</td>
                <td>2020-05-15</td>
                <td>Male</td>
                <td class="edit-action-buttons">
                <a href = "<?php echo $_SESSION['updatepath'] ?>"><button class="edit-icon"></button></a>                </td>
            </tr>
            <tr>
                <td>67890</td>
                <td>Luna</td>
                <td>Jane Smith</td>
                <td>XY987654Z</td>
                <td>Golden Retriever</td>
                <td>2019-11-22</td>
                <td>Female</td>
                <td class="edit-action-buttons">
                <a href = "<?php echo $_SESSION['updatepath'] ?>"><button class="edit-icon"></button></a>                </td>
            </tr>
        </tbody>
    </table>
</body>
</html> -->

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
                <th></th>
                <th></th>
                <th class="edit-action-buttons"></th>
                
            </tr>
        </thead>
        <tbody>

<?php foreach ($services as $service) { ?>
    <tr key = "<?php echo $service->id; ?>" >
        <td><b><?php echo $service->service?></b></td>
        <td><?php echo $service->description?></td>
        <td class="edit-action-buttons">
        <button class="edit-icon"></button>
        </td>
        <td class="delete-action-buttons">
            <button class="delete-icon"></button>
        </td>
    </tr>


    <?php
    } 
    ?>

           
        </tbody>
    </table>
</body>
</html>


