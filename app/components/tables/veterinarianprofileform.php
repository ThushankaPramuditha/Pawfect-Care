<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="assets/css/forms.css">
</head>
<body>
    <h1>Edit Profile</h1>
    
    <form id="profile-form">
        <label for="full-name">Full Name:</label>
        <input type="text" id="full-name" name="full-name" required><br><br>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br><br>

        <label for="contact-number">Contact Number:</label>
        <input type="tel" id="contact-number" name="contact-number" required pattern="[0-9]{10}"><br><br>

        <button type="button" id="update-button" onclick="updateProfile()">Update Profile</button>
    </form>


    <script src="vet_profile_form.js"></script>
</body>
</html>
