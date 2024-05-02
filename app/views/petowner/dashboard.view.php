<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="<?php echo ROOT?>/assets/js/validatepetdetails.js"></script>

    <link rel="stylesheet" href="<?php echo ROOT ?>/assets/css/panelheader.css">
   
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');

        :root {
            --color-primary: #665676;
            --color-danger: #FF0060;
            --color-success: #1B9C85;
            --color-warning: #F7D060;
            --color-white: #fff;
            --color-info-dark: #ffffff;
            --color-dark: #363949;
            --color-light: #E6E6FA;
            --color-dark-variant: #677483;
            --color-background: #f6f6f9;

            --card-border-radius: 2rem;
            --border-radius-1: 0.4rem;
            --border-radius-2: 1.2rem;

            --card-padding: 1.8rem;
            --padding-1: 1.2rem;

            --box-shadow: 0 2rem 3rem var(--color-light);
        }

        * {
            margin: 0;
            padding: 0;
            outline: 0;
            appearance: 0;
            border: 0;
            text-decoration: none;
            box-sizing: border-box;
        }

        html {
            font-size: 14px;
        }

        body {
            width: 100vw;
            height: 100vh;
            padding:0;
            font-family: 'Poppins', sans-serif;
            font-size: 0.88rem;
            user-select: none;
            overflow-x: hidden;
            color: var(--color-dark);
            background-color: var(--color-background);
            /* background: linear-gradient(19deg, #82a4ff 0%, #97d2fc 100%); */
        }



        img {
            display: block;
            width: 100%;
            object-fit: cover;
        }

        h1 {
            font-weight: 800;
            font-size: 1.8rem;
        }

        h2 {
            font-weight: 600;
            font-size: 1.4rem;
        }

        h3 {
            font-weight: 500;
            font-size: 0.87rem;
        }

        small {
            font-size: 0.76rem;
        }

        p {
            color: var(--color-dark-variant);
        }

        b {
            color: var(--color-dark);
        }

        .text-muted {
            color: var(--color-info-dark);
        }

        .primary {
            color: var(--color-primary);
        }

        .danger {
            color: var(--color-danger);
        }

        .success {
            color: var(--color-success);
        }

        .warning {
            color: var(--color-warning);
        }

        .pet {
            background-color: var(--color-white);
            padding: var(--card-padding);
            border-radius: var(--card-border-radius);
            margin-top: 1rem;
            box-shadow: var(--box-shadow);
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 1.4rem;
            cursor: pointer;
            transition: all 0.6s ease;
            width: 450px;
            font-size: 1.2rem;
        }

        .pet:hover {
            transform: scale(1.01);
        }

        .pet img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 20px;
            padding-left: 10px;
            padding-top: 10px;
        }

        .pet-content {
            padding: 15px;
            text-align: center;
            font-size: 10px;
            font-weight: bold;
            margin-left: 30px;
        }

        h2 {
            font-size: 1.5em;
            margin-bottom: 5px;
        }

        p {
            margin: 5px 0;
            color: #555;
        }

        .notification {
            background-color: var(--color-white);
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 0.7rem;
            padding: 1.4rem var(--card-padding);
            border-radius: var(--border-radius-2);
            box-shadow: var(--box-shadow);
            cursor: pointer;
            transition: all 0.3s ease;
            width: 350px;

        }

        .notification:hover {
            box-shadow: none;
        }

        .notification .content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 0;
            width: 100%;

        }

        .notification .icon {
            padding: 0.6rem;
            color: var(--color-white);
            background-color: plum;
            border-radius: 20%;
            display: flex;
        }

        .notification.deactive .icon {
            background-color: var(--color-danger);
        }

        
            ::-webkit-scrollbar{
                width: 0.6rem;
            }

            ::-webkit-scrollbar-thumb{
                background-color: var(--color-primary);
                border-radius: 1rem;
            }

            ::-webkit-scrollbar-track{
                background-color: var(--color-white);
            } 

            button
                 {
                display: block;
                background-color: #6a387944;
                border:none;
                width: fit-content;
                color:#6a3879;
                border-radius: 5px;
                padding: 10px 20px;
                margin-top: 10px;
                margin-bottom: 30px;
                font-size: 16px;
                cursor: pointer;
                transition: background-color 0.3s;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5); /* Added box shadow */

         }
            button:hover {
                background-color: #6a3879;
                color: #ffff;
            }
            button:active {
                background-color: #6a3879;
                color: #fff;
            }

            .pet button {
            margin:10px;
        }
       


            
    </style>
</head>

<body>
    

        <?php include 'navbar.php'; ?>

    <!-- <?php include '../app/views/components/dashboard-compo/petownersidebar.php'; ?> -->
<div class="container" style="display:flex; flex-direction:column; align-items: space-between; padding: 20px">
<div class="flex-container" style="display:flex; justify-content: space-between; padding:0 40px;">
<div>
    <button class="add-new-button">Add New</button>
</div>
<div>
    <button class="user-profile-button" onclick="location.href='<?php echo ROOT ?>/petowner/userprofile'">Profile Settings</button>
</div>

        </div>
        <div class="container" style="display:flex; flex-direction:row; padding: 0 40px;">
 
        <div class="new-users" style="display:flex; width:70%;  margin-right: 10px;">
            <div class="user-list" style="display:flex; flex-wrap: wrap; gap:1rem; ">
            <?php

                 foreach ($pets as $pet): ?>
                    <div  class="pet" style="display:flex; flex-direction:column; margin-top:10px; margin-bottom:1px;" id="pet_<?php echo $pet->id; ?>">
                        <div style="display:flex; flex-direction:row; justify-content:space-between;">
                            <h2><?php echo $pet->name; ?></h2>
                            <button key="<?php echo $pet->id; ?>" class="edit-button">Edit Details</a></button>
                        </div>
                        <div style="display:flex; flex-direction:row;">
                            <div style="margin-top:15px;">
                                <img src="<?php echo ROOT ?>/uploads/pets/<?php echo $pet->image ?>">
                            </div>
                            <div class="pet-content" style="margin-left:70px; text-align:left;">
                                <p style="font-size:15px;">Id: <?php echo $pet->id; ?></p>
                                <p style="font-size:15px;">Breed: <?php echo $pet->breed; ?></p>
                                <p style="font-size:15px;">Date of Birth: <?php echo $pet->birthday; ?></p>
                                <p style="font-size:15px;">Gender: <?php echo $pet->gender; ?></p>
                            </div>
                        </div>
                        <div style="display:flex; flex-direction:row; justify-content:space-between; margin-left:10px;">
                        <button onclick="location.href='<?php echo ROOT ?>/petowner/medicalhistory/getMedicalData/<?php echo $pet->id; ?>'">Medical History</button>
                        <button onclick="location.href='<?php echo ROOT ?>/petowner/vaccinationhistory/getVaccinationData/<?php echo $pet->id; ?>'">Vaccination History</button>
                        <button onclick="location.href='<?php echo ROOT ?>/petowner/appointmenthistory/getAppointmentData/<?php echo $pet->id; ?>'">Appointment History</button>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
                
            </div>

            <!-- <div class="announcement" style="display:flex; flex-direction:column;  align-content:flex-end ; flex-wrap: wrap; margin-left:20px;"> -->
            <div class="announcement" style="display: flex; flex-direction: column; align-items: flex-end; flex-wrap: wrap; margin-left: 20px; ">
            <?php 
            ?>
                <p style="font-size:20px; font-weight:bolder;">Vet Appointments</p>
                <div  style="display:flex; flex-direction:column; overflow:hidden; height:120px; overflow-y:scroll; margin-left:40px;" >
                <?php if (!empty($vetappointmentnotifications)): ?>
                        <?php foreach ($vetappointmentnotifications as $vnotification): ?>
                            <div class="notification" style="display:flex; flex-direction:column; background-color:#cfc3d3;">
                                <div class="notification-item" style="min-height:50px;">
                                    <!-- Add a close icon to delete notifications -->
                                    <span id="cancel-notification" class="material-icons-sharp" style="cursor:pointer; color:#6a3879; margin-left:300px; font-size:11px;" onclick="cancelNotification(<?php echo $vnotification->id ?>)">close</span>
                                    <div class="info">
                                        <!-- <small class="text-muted" style="font-size:14px;">Appointment</small> -->
                                        <p><?php echo $vnotification->message ?></p>
                                        <button style = "font-size:0.8rem; padding:0.5rem; margin:0; " onclick="location.href='<?=ROOT?>/petowner/appointments/cancel/<?php echo $vnotification->appointment_id?>/<?php echo $vnotification->id?>'">Cancel Appointment</button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="notification" style="display:flex; flex-direction:column; background-color:#cfc3d3">
                <div class="notification-item" style="display:flex; justify-content:center;height:80px;">
                    <div class="info">
                        <h3>No Notifications</h3>
                        <p>There are no Vet Appointment notifications at the moment.</p>
                    </div>
                </div>
            </div>
                    <?php endif; ?>

             </div>
                    <p style="font-size:20px; font-weight:bolder;">Daycare Booking</p>
                    <div  style="display:flex; flex-direction:column; overflow:hidden; height:120px; overflow-y:scroll;" >
                       <?php if (!empty($daycarenotifications)): ?>
                        <?php foreach ($daycarenotifications as $dnotification): ?>
                        <div class="notification" style="display:flex; flex-direction:column; background-color:#cfc3d3;">
                            
                            <div class="notification-item" style="height:80px;">
                            <!-- <span class="material-icons-sharp" style="cursor:pointer; color:#6a3879; margin-left:300px; font-size:12px;">close</span> -->
                            <span id="cancel-notification" class="material-icons-sharp" style="cursor:pointer; color:#6a3879; margin-left:300px; font-size:12px;" onclick="cancelNotification(<?php echo $dnotification->id ?>)">close</span>
                                <div class="info">
                                    <small class="text-muted" style="font-size:14px;">Daycare booking</small>
                                    <p>
                                    <?php echo $dnotification->message ?></p>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="notification" style="display:flex; flex-direction:column; background-color:#cfc3d3">
                <div class="notification-item" style="display:flex; justify-content:center;height:80px;">
                    <div class="info">
                        <h3>No Notifications</h3>
                        <p>There are no Daycarebooking notifications at the moment.</p>
                    </div>
                </div>
            </div>
                    <?php endif; ?>
                    </div>
            <p style="font-size:20px; font-weight:bolder;">Ambulance Notification</p>
                    <div  style="display:flex; flex-direction:column; overflow:hidden; height:120px; overflow-y:scroll;" >
                       <?php if (!empty($transportnotifications)): ?>
                        <?php foreach ($transportnotifications as $tnotification): ?>
                        <div class="notification" style="display:flex; flex-direction:column; background-color:#cfc3d3;">
                            
                            <div class="notification-item" style="height:80px;">
                            <!-- <span class="material-icons-sharp" style="cursor:pointer; color:#6a3879; margin-left:300px; font-size:12px;">close</span> -->
                            <span id="cancel-notification" class="material-icons-sharp" style="cursor:pointer; color:#6a3879; margin-left:300px; font-size:12px;" onclick="cancelNotification(<?php echo $tnotification->id ?>)">close</span>
                                <div class="info">
                                    <!-- <small class="text-muted" style="font-size:14px;">Daycare booking</small> -->
                                    <p>
                                    <?php echo $tnotification->message ?></p>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="notification" style="display:flex; flex-direction:column; background-color:#cfc3d3">
                <div class="notification-item" style="display:flex; justify-content:center;height:80px;">
                    <div class="info">
                        <h3>No Notifications</h3>
                        <p>There are no  notifications of Ambulance Booking at the moment.</p>
                    </div>
                </div>
            </div>
                    <?php endif; ?>
                    </div>
        </div>
 </div>

 

   



</div>


<!-- Add Pets Modal -->
<div class="modal-form" id="add-modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h1>Add Pets</h1>
        <div class="form-container">
            <form id="add-pet-form" action="<?php echo ROOT?>/Petowner/dashboard/addPet" method="post"  enctype="multipart/form-data">
                
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name">
                    <div id="error-name" class="error-message"></div>

                    <label for="birthday">Date of Birth:</label>
                    <input type="date" id="birthday" name="birthday" max="<?php echo date('Y-m-d');?>">
                    <div id="error-birthday" class="error-message"></div>

                     <!-- enum to select gender-->
                    <label for="gender">Gender:</label>
                    <select id="gender" name="gender">
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select>
                      <div id="error-gender" class="error-message"></div>
                
                    <label for="species">Species:</label>
                    <input type="text" id="species" name="species">
                    <div id="error-species" class="error-message"></div>
            
                    <label for="breed">Breed:</label>
                    <input type="text" id="breed" name="breed">
                    <div id="error-breed" class="error-message"></div>

                    <label for="file">Add Image:</label><br>
                    <input type="file" id="file" name="image"><br><br>

                
                <div class="flex-container">
                    <button type="submit" id="add-pet-button">Add Pet</button>
                </div>
                
            </form>
        </div>
        
    </div>
</div>

<!-- Update Day Care Staff Modal -->
<div class="modal-form" id="update-modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h1>Edit Pet</h1>
            <div id="updatepet" class="form-container">
                
            </div>
    </div>
</div>



<script>

    // Get the modal elements
    var addModal = document.getElementById("add-modal");
    var updateModal = document.getElementById("update-modal");
  
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    
    // Function to open add form modal
    function openAddModal() {
        addModal.style.display = "block";
    }

    function openUpdateModal(id) {
        console.log(id);
        updateModal.style.display = "block";
        $.get(`<?php echo ROOT?>/petowner/dashboard/viewPetDetails/${id}`, function(data) {
                // Update the modal content with the fetched data
                $("#updatepet").html(data);
            });
        
        // set time out and updateforminit
        setTimeout(updateFormInit, 1000);
        span.onclick = function() {
        modal.style.display = "none";
        }
        
    }
     
    // Event listener for add button click
    document.querySelector('.add-new-button').addEventListener('click', function () {
        openAddModal();
    });

    // Event listeners for update buttons click
    document.querySelectorAll('.edit-button').forEach(function (button) {
        button.addEventListener('click', function () {
            var id = this.getAttribute('key');
            openUpdateModal(id);
        });
    });

    
    
    var closeButtons = document.querySelectorAll('.close');

        // Close modals when the no button is clicked
        var noButtons = document.querySelectorAll('.reject');

        closeButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                addModal.style.display = "none";
                updateModal.style.display = "none";


            });
        });
        noButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                deactivateModal.style.display = "none";
                activateModal.style.display = "none";


            });
        });

        // Attach event listeners for validation on input for add form
        document.getElementById('name').addEventListener('input', validateName);
        document.getElementById('birthday').addEventListener('input', validateBirthday);
        document.getElementById('gender').addEventListener('input', validateGender);   
        document.getElementById('species').addEventListener('input', validateSpecies);
        document.getElementById('breed').addEventListener('input', validateBreed);
        
        function validateAddForm() {
        var isValid = true;

        isValid = validateName() && isValid;
        isValid = validateBirthday() && isValid;
        isValid = validateGender() && isValid;
        isValid = validateSpecies() && isValid;
        isValid = validateBreed() && isValid;


        if (!isValid) {
            Swal.fire({
                icon: 'error',
                title: 'Validation Error',
                html: "Please correct the errors before submitting.",
            });
            return false;
        }
        return true;
    }

    document.getElementById("add-pet-form").addEventListener('submit', function(event) {
        
        if (!validateAddForm()) {
            event.preventDefault();
        } else {
            addModal.style.display = "none";
        }
    });
    
    function updateFormInit() {
        // Attach event listeners for validation on input for update form
        document.getElementById('update-name').addEventListener('input', validateUpdateName);
        document.getElementById('update-birthday').addEventListener('input', validateUpdateBirthday);
        document.getElementById('update-gender').addEventListener('input', validateUpdateGender); 
        document.getElementById('update-species').addEventListener('input', validateUpdateSpecies);
        document.getElementById('update-breed').addEventListener('input', validateUpdateBreed);

        document.getElementById("updated-form").addEventListener('submit', function(event) {
            console.log("insideee");
            if (!validateUpdateForm()) {
                event.preventDefault();
            } else {
                addModal.style.display = "none";
            }
    
        });
    
    }

    function validateUpdateForm() {
        var isValid = true;

        isValid = validateUpdateName() && isValid;
        isValid = validateUpdateBirthday() && isValid;
        isValid = validateUpdateGender() && isValid;
        isValid = validateUpdateSpecies() && isValid;
        isValid = validateUpdateBreed() && isValid;
        

        if (!isValid) {
            Swal.fire({
                icon: 'error',
                title: 'Validation Error',
                html: "Please correct the errors before submitting.",
            });
            return false;
        }
        return true;
    }

        //sweeetalert for validation SUCCESS and ERROR
        window.onload = function() {
        <?php if (isset($_SESSION['flash'])): ?>
            const flash = <?php echo json_encode($_SESSION['flash']); ?>;
            if (flash.success) {
                Swal.fire('Success', flash.success, 'success');
            } else if (flash.error) {
                Swal.fire('Error', flash.error, 'error');
            }
            <?php unset($_SESSION['flash']); ?>
        <?php endif; ?>
    };

    


    function cancelNotification(notificationId) {
        // Make an AJAX request to the controller endpoint
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "<?php echo ROOT?>/Petowner/Dashboard/cancelnotification/" + notificationId, true);
        xhr.onload = function () {
            if (xhr.status == 200) {
                // Handle success response
                console.log("Notification canceled successfully.");
                window.location.reload();
                // You can perform additional actions here if needed
            } else {
                // Handle error response
                console.error("Failed to cancel notification. Status code: " + xhr.status);
                window.location.reload();

            }
        };
        xhr.onerror = function () {
            // Handle network errors
            console.error("Network error occurred while canceling notification.");
            window.location.reload();
        };
        xhr.send();
    }


        

</script>
</body>

</html>
