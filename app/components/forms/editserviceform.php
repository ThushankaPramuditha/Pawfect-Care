<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Service</title>
    <link rel="stylesheet" href="<?php ROOT?>assets/css/forms.css">
</head>
<body>
    <div class="form-container">
        <form id="edit-service-form">
            <h1>Edit Service</h1>
            
            <label for="service">Service:</label>
            <input type="text" id="service" name="service" required><br>

            <label for="description">Description:</label>
            <textarea id="description" name="description" style="border-radius: 10px;" rows="4" required></textarea>

            <div class="flex-container">
                <button type="button" id="update-service-button" onclick="updateService()">Update Service</button>
            </div>
        </form>
    </div>

    <script src="editserviceform.js"></script>
</body>
</html>
