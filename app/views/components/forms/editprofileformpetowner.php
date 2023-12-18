<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/forms.css">
</head>
<body>
<h1>Edit Profile</h1> 
    <div class = "form-container"> 
            <form id="edit-profile-form">
            
            <?php
            // You should replace these placeholders with the actual PHP code
            // to retrieve and populate the form data.
            $full_name = "John Doe"; // Replace with actual full name
            $address = "123 Elm St"; // Replace with actual address
            $contact_number = "1234567890"; // Replace with actual contact number
            ?>

                <label for="full-name">Full Name:</label>
                <input type="text" id="full-name" name="full-name" required value="<?php echo $full_name; ?>"><br>

                <label for="address">Address:</label>
                <input type= "text" id="address" name="address" required value="<?php echo $address; ?>"><br>

                <label for="contact-number">Contact Number:</label>
                <input type="tel" id="contact-number" name="contact-number" required pattern="[0-9]{10}" value="<?php echo $contact_number; ?>"><br>

                <div class = "flex-container">
                    <button type="submit" id="update-button" onclick="updateProfile()">Update Profile</button>
                </div>
            </form>   
        
    </div>
    

    <script src="editprofileform.js"></script>
</body>
</html>
