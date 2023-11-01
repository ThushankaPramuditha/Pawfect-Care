<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Staff</title>
    <link rel="stylesheet" href="<?php echo ROOT?>assets/css/forms.css">
</head>
<body>
<h1>Add Ambulance Driver</h1>
    <div class="form-container">
        <form id="add-ambulance-driver-form">
            
            
            <label for="full-name">Full Name:</label>
            <input type="text" id="full-name" name="full-name" required><br>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required><br>

            <label for="contact-number">Contact Number:</label>
            <input type="tel" id="contact-number" name="contact-number" required pattern="[0-9]{10}"><br>

            <label for="nic">NIC:</label>
            <input type="text" id="nic" name="nic" required><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>

            <label for="licence-number">License Number:</label>
            <input type="text" id="licence-number" name="licence-number" required><br>

            <div class="flex-container">
                <button type="submit" id="add-ambulance-driver-button" onclick="addAmbulanceDriver()">Add Ambulance Driver</button>
            </div>
        </form>
    </div>

    <script src="addstaffform.js"></script>
</body>
</html>
