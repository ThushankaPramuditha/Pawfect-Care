<!-- services/create.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Service</title>
</head>
<body>
    <h1>Add Service</h1>
    <form action="<?php echo 'services/create'; ?>" method="POST">
        <label for="title">Title:</label>
        <input type="text" name="service_tittle" id="title" required>
        <br>
        <label for="description">Description:</label>
        <textarea name="description" id="description" required></textarea>
        <br>
        <button type="submit">Add Service</button>
    </form>
</body>
</html>
