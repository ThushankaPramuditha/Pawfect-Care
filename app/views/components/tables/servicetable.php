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
                <th>Service</th>
                <th>Description</th>
                <th class="edit-action-buttons"></th>
                <th class="delete-action-buttons"></th>
            </tr>
        </thead>
        <tbody>

<?php foreach ($services as $service) { ?>
    <tr>
        <td><b><?php echo $service->service?></b></td>
        <td><?php echo $service->description?></td>
        <td class="edit-action-buttons">
        <a href = "editservice"><button class="edit-icon"></button></a>
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

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo ROOT; ?>/assets/css/tables.css">
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Service</th>
                <th>Description</th>
                <th class="edit-action-buttons"></th>
                <th class="delete-action-buttons"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($services as $service) : ?>
            <tr>
                <td><b><?php echo $service->service_title; ?></b></td>
                <td><?php echo $service->description; ?></td>
                <td class="edit-action-buttons">
                    <a href="editservice/<?php echo $service->id; ?>">
                        <button class="edit-icon"></button>
                    </a>
                </td>
                <td class="delete-action-buttons">
                    <button class="delete-icon"></button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
 -->
