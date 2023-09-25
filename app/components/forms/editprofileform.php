<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="<?php ROOT?>assets/css/forms.css">
</head>
<body>
    <div class = "form-container"> 
            <form id="edit-profile-form">
            <h1>Edit Profile</h1> 
                <label for="full-name">Full Name:</label>
                <input type="text" id="full-name" name="full-name" required><br>

                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required><br>

                <label for="contact-number">Contact Number:</label>
                <input type="tel" id="contact-number" name="contact-number" required pattern="[0-9]{10}"><br>

                <div class = "flex-container">
                    <button type="button" id="update-button" onclick="updateProfile()">Update Profile</button>
                </div>
            </form>   
        
    </div>
    


    <script src="editprofileform.js"></script>
</body>
</html>