<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
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
    <h1>Edit Profile</h1> 
            <form id="edit-profile-form" action="<?php echo ROOT?>/Petowner/userprofile/editprofile/<?php echo $userdata->id; ?>" method="post">
            
                <label for="update-name">Full Name:</label>
                <input type="text" id="update-name" name="name" value="<?php echo $userdata->name;?>">
                <div id="error-update-name" class="error-message"></div>

                <label for="update-address">Address:</label>
                <input type="text" id="update-address" name="address" value="<?php echo $userdata->address;?>">
                <div id="error-update-address" class="error-message"></div>

                <label for="update-contact_no">Contact Number:</label>
                <input type="tel" id="update-contact_no" name="contact" value="<?php echo $userdata->contact;?>" >
                <div id="error-update-contact" class="error-message"></div>

                <div class="flex-container">
                    <button type="submit" >Update Profile</button>
                </div>
            </form>   
        
    </div>

    </div>      

</div>
</div>
<script>
     document.getElementById('update-name').addEventListener('input', validateUpdateName);
    document.getElementById('update-address').addEventListener('input', validateUpdateAddress);
    document.getElementById('update-contact_no').addEventListener('input', validateUpdateContactNumber);
    
    document.getElementById("edit-profile-form").addEventListener('submit', function(event) {
        var isValid = true;

        isValid = validateUpdateName() && isValid;
        isValid = validateUpdateAddress() && isValid;
        isValid = validateUpdateContactNumber() && isValid;

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
