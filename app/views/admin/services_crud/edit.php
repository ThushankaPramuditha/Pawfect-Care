<!-- services/edit.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Service</title>
</head>
<body>
    <h1>Edit Service</h1>
    <form action="<?php echo 'services/edit/' . (is_object($service) ? $service->id : ''); ?>" method="POST">
        <label for="title">Title:</label>
        <input type="text" name="service_tittle" id="title" value="<?php echo is_object($service) && isset($service->service_tittle) ? $service->service_tittle : ''; ?>" required>
        <br>
        <label for="description">Description:</label>
        <br>
        <?php if (is_object($service)) { ?>
            <textarea name="description" id="description" required><?php echo isset($service->description) ? $service->description : ''; ?></textarea>
        <?php } else { ?>
            <textarea name="description" id="description" required></textarea>
        <?php } ?>
        <br>
        <button type="submit">Update Service</button>
    </form>
</body>
</html>
