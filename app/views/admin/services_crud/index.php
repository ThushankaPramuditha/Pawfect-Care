<!-- services/index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
</head>
<body>
    <h1>Services</h1>
    <a href="<?php echo 'services/create'; ?>">Add New Service</a>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($services as $service) : ?>
                <tr>
                    <td><?php echo $service->service_tittle; ?></td>
                    <td><?php echo $service->description; ?></td>
                    <td><a href="<?php echo 'services/edit/' . $service->id; ?>">Edit</a></td>
                    <td><a href="<?php echo 'services/destroy/' . $service->id; ?>">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
