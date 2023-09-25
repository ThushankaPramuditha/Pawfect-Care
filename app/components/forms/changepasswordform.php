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
            <form id="change-password-form">
            <h1>Change Password</h1> 
                <label for="prev-password">Previous Password:</label>
                <input type="password" id="prev-password" name="prev-password" required><br>

                <label for="new-password">New Password:</label>
                <input type="password" id="new-password" name="new-password" required><br>

                <label for="confirm-password">Confirm New Password:</label>
                <input type="password" id="confirm-password" name="confirm-password" required><br>

                <div class="flex-container">
                    <button type="button" id="change-password-button" onclick="changePassword()">Change Password</button>
                </div>
            </form>   
        
    </div>
    


    <script src="changepasswordform.js"></script>
</body>
</html>