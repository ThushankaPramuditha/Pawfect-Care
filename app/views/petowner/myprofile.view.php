<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/basic.css">
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/panelheader.css">
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
                    <h1>My Profile</h1> 
                            <div class= "pair"><div class = "key">Pet Owner ID:</div>  <div class = "value"><?= htmlspecialchars($data['userdata']->id)?></div></div>
                            <div class= "pair"><div class = "key">Full Name:</div> <div class = "value"><?= htmlspecialchars($data['userdata']->name)?></div></div>
                            <div class= "pair"><div class = "key">Address:</div> <div class = "value"><?= htmlspecialchars($data['userdata']->address)?></div></div>
                            <div class= "pair"><div class = "key">Contact No:</div> <div class = "value"><?= htmlspecialchars($data['userdata']->contact)?></div></div>
                            <div class= "pair"><div class = "key">NIC:</div> <div class = "value"><?= htmlspecialchars($data['userdata']->nic)?></div></div>
                            <div class= "pair"><div class = "key">Email:</div> <div class = "value"><?= htmlspecialchars($data['userdata']->email)?></div></div>

                </div>      
            
        </div>
    </div>

</body>
</html>
