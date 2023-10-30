<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Staff</title>
    <link rel="stylesheet" href="<?php echo ROOT?>assets/css/forms.css">
</head>
<body>

    <div class="form-container">
        <form id="add-staff-form">
            
            
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

            <label for="qualifications">Qualifications:</label>
            <textarea id="qualifications" name="qualifications" style="border-radius: 10px;" rows="4" required></textarea>

            <div class="flex-container">
                <button type="submit" id="add-staff-button" onclick="addStaff()">Add Staff</button>
            </div>
        </form>
    </div>

    <script src="addstaffform.js"></script>
</body>
</html>
