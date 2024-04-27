<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/basic.css">
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/panelheader.css">
    <script src="<?php echo ROOT?>/assets/js/validatestaff.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
        /* for edit profile?updateprofile pages with grey background*/
.profile-formcontainer {
    width: 100%;

}

.profile-formcontainer input[type="text"],
input[type="tel"], 
input[type="password"], 
input[type="email"],
input[type="date"]{
    font-family: Arial, sans-serif;
    display: block;  
    background-color: #ffffff;
    width: calc(100% - 20px);
    padding: 10px;
    margin-bottom: 10px;
    border: none;
    border-radius: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    outline-color:#6a3879;
}
/*for long text fields*/
.profile-formcontainer textarea {
    display: block;
    width: calc(100% - 20px);
    background-color: #ffffff;
    font-family: Arial, sans-serif;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    outline-color:#6a3879;
    resize: vertical; /* Allow vertical resizing */

}
.profile-formcontainer .error-message {
    color: #ff0000; /* Red color for the text */
    margin-bottom: 1px; /* Add some space above the message */
    font-size: 0.9em; /* Slightly smaller font size */
    padding: 1px; /* Padding inside the message */
}

.profile-formcontainer h1 {
    color: #333;
    font-size: 40px;
    text-align:left;
    /* text-align: center; */
    margin-bottom: 40px;
}
.profile-formcontainer label, label {
    display: block;
    margin-bottom: 10px;
    color: #333;
    text-align: left;
    font-size: 20px;
}
        </style>

</head>

<body>

<div class="profile-formcontainer" style="display:flex; justify-content: flex-start; flex-direction:column; margin-left: 20%">
  <h1>Change Password</h1>

      <form id="change-password-form" action="<?php echo ROOT?>/petowner/userprofile/updatePassword" method="post">
      
          <label for="prev-password">Previous Password:</label>
          <input type="password" id="prev-password" name="prev-password" required>
          <div id="error-prev-password" class="error-message"></div>
          


          <label for="new-password">New Password:</label>
          <input type="password" id="new-password" name="new-password" required>
          <div id="error-new-password" class="error-message"></div>
          


          <label for="confirm-password">Confirm New Password:</label>
          <input type="password" id="confirm-password" name="confirm-password" required>
          <div id="error-confirm-password" class="error-message"></div>


          <div class="flex-container">
              <button type="submit" id="change-password-button" >Change Password</button>
          </div>
      </form>  
    </div>
    <script>

        document.getElementById('prev-password').addEventListener('input', validatePrevPassword);
        document.getElementById('new-password').addEventListener('input', validateNewPassword);
        document.getElementById('confirm-password').addEventListener('input', validateConfirmNewPassword);

        
        document.getElementById('change-password-form').addEventListener('submit', function(event) {
            
            var isValid = true;

            isValid = validatePrevPassword() && isValid;
            isValid = validateNewPassword() && isValid;
            isValid = validateConfirmNewPassword() && isValid;

            if (!isValid) {
                event.preventDefault();
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    html: "Please correct the errors before submitting.",
                });
            }
        });

 
    </script> 




</body>
</html>

