<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/panelheader.css">


    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');

        :root {
            --color-primary: #CF9FFF;
            --color-danger: #FF0060;
            --color-success: #1B9C85;
            --color-warning: #F7D060;
            --color-white: #fff;
            --color-info-dark: #7d8da1;
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
            font-family: 'Poppins', sans-serif;
            font-size: 0.88rem;
            user-select: none;
            overflow-x: hidden;
            color: var(--color-dark);
            background-color: var(--color-background);
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
       


            
    </style>
</head>

<body>
    

        <?php include 'navbar.php'; ?>

    <!-- <?php include '../app/views/components/dashboard-compo/petownersidebar.php'; ?> -->

    <div class="panel-header" style="margin-left:310px; margin-top:160px;">
            <button class="add-new-button">Add New</button>
    </div>

    <div class="container" style="display:flex; flex-direction:row;">
 
        <div class="new-users" style="display:flex; width:70%; margin-left:230px; margin-top:80px;">
            <div class="user-list" style="display:flex; flex-direction:row; gap:0.5rem; ">
                <?php
                  
                  $pdo = new PDO("mysql:host=localhost;dbname=pawfect-care", "root", "");

                  // Get the user id from the session
                  $userId = $_SESSION['USER']->id;
                  
                  // Prepare and execute the SQL query to fetch pet details joined with users and petowners
                  $stmt = $pdo->prepare("SELECT pets.*
                                        FROM users
                                        JOIN petowners ON users.id = petowners.user_id
                                        JOIN pets ON petowners.id = pets.petowner_id
                                        WHERE users.id = :userId");
                  $stmt->execute(['userId' => $userId]);
                  $pets = $stmt->fetchAll();
                foreach ($pets as $pet) {
                ?>
                    <div class="pet" style=" display:flex; flex-direction:column; margin-top:10px; margin-bottom:1px;" id="pet_<?php echo $pet['id']; ?>">
                        <div style=";display:flex; flex-direction:row; justify-content:space-between; ">
                            <h2><?php echo $pet['name']; ?></h2>
                            <button class="edit-button"><<?php echo $pet['id']; ?>">Edit Details</a></button>
                        </div>
                        <div style="display:flex; flex-direction:row;">
                        <div style="margin-top:15px;">
                        <img src="<?php echo ROOT ?>/assets/images/doglogo.jpg">
                        </div>
                            <div class="pet-content" style="margin-left:70px; text-align:left;">
                                <p style="font-size:15px;">Id: <?php echo $pet['id']; ?></p>
                                <p style="font-size:15px;">Breed: <?php echo $pet['breed']; ?></p>
                                <p style="font-size:15px;">Date of Birth: <?php echo $pet['birthday']; ?></p>
                                <p style="font-size:15px;">Gender: <?php echo $pet['gender']; ?></p>
                            </div>
                        </div>

                        <div style="display:flex; flex-direction:row; justify-content:space-between; margin-left:10px;">
                            <button><a href="<?php echo ROOT ?>/petowner/petmedicalhistory/<?php echo $pet['id']; ?>">Medical History</a></button>
                            <button><a href="<?php echo ROOT ?>/petowner/petvaccinationhistory/<?php echo $pet['id']; ?>">Vaccination History</a></button>
                        </div>
                    </div>
                <?php
                }
                ?>
                <div class="new-users" style="display:flex; flex-direction:column;">
                    <!-- <button style="width:250px; margin-left:35px; margin-top:-200px;"><a href="<?php echo ROOT ?>/petowner/addpet">Add a Pet</a></button> -->
                </div>
            </div>
        </div>

        <div class="announcement" style="display:flex; flex-direction:column; margin-top:15px;">
            <div>
                <div style="margin-left:300px; margin-top:5px;">
                    <span class="material-icons-sharp">
                        notifications_none
                    </span>
           </div>
            <?php 
            $pdo = new PDO("mysql:host=localhost;dbname=pawfect-care", "root", "");
            //select all the daycare bookings that have been accepted for the petowner
            $userId = $_SESSION['USER']->id;
                        
            // Prepare and execute the SQL query to fetch pet details joined with users and petowners
            $stmt = $pdo->prepare("SELECT daycarebookinguser.* ,petowners.name AS petowner_name
                                    FROM users
                                    JOIN petowners ON users.id = petowners.user_id
                                    JOIN pets ON petowners.id = pets.petowner_id
                                    JOIN daycarebookinguser ON pets.id = daycarebookinguser.pet_id
                                    WHERE users.id = :userId AND daycarebookinguser.status = 'accepted'"
                                );
            $stmt->execute(['userId' => $userId]);
            $daycarebookinguser = $stmt->fetchAll();

            ?>
                <p style="font-size:20px; font-weight:bolder;">Vet Appointments</p>
                <div  style="display:flex; flex-direction:column; overflow:hidden; height:132px; overflow-y:scroll;" >
                    <?php foreach ($daycarebookinguser as $daycarebookingnotification) { ?>
                    <div class="notification" style="display:flex; flex-direction:column; background-color:#CBC3E3">
                        <!-- <div class="icon">
                            <span class="material-icons-sharp">
                                volume_up
                            </span>
                        </div> -->
                        <div class="notification-item">
                            <div class="info">
                                <h3>Daycare Booking</h3>
                                <small class="text-muted">New Booking</small>
                                <p>
                                    <?php echo $daycarebookingnotification['petowner_name'];; ?> your booking is accepted <?php echo $daycarebookingnotification['drop_off_date'];?> at <?php echo $daycarebookingnotification['drop_off_time'] ;?> to <?php echo $daycarebookingnotification['pick_up_time'] ;?> 
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
             </div>
                    <p style="font-size:20px; font-weight:bolder;">Daycare Booking</p>
                    <div  style="display:flex; flex-direction:column; overflow:hidden; height:132px; overflow-y:scroll;" >
                        <?php foreach ($daycarebookinguser as $daycarebookingnotification) { ?>
                        <div class="notification" style="display:flex; flex-direction:column; background-color:#CBC3E3">
                            <!-- <div class="icon">
                                <span class="material-icons-sharp">
                                    volume_up
                                </span>
                            </div> --> 
                            <div class="notification-item">
                                <div class="info">
                                    <h3>Daycare Booking</h3>
                                    <small class="text-muted">New Booking</small>
                                    <p>
                                        <?php echo $daycarebookingnotification['petowner_name'];; ?> your booking is accepted <?php echo $daycarebookingnotification['drop_off_date'];?> at <?php echo $daycarebookingnotification['drop_off_time'] ;?> to <?php echo $daycarebookingnotification['pick_up_time'] ;?> 
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
            <p style="font-size:20px; font-weight:bolder;">Upcoming Vaccinations</p>
            <div  style="display:flex; flex-direction:column; overflow:hidden; height:132px; overflow-y:scroll;" >
                <?php foreach ($daycarebookinguser as $daycarebookingnotification) { ?>
                <div class="notification" style="display:flex; flex-direction:column; background-color:#CBC3E3">
                    <!-- <div class="icon">
                        <span class="material-icons-sharp">
                            volume_up
                        </span>
                    </div> --> 
                    <div class="notification-item">
                        <div class="info">
                            <h3>Daycare Booking</h3>
                            <small class="text-muted">New Booking</small>
                            <p>
                                <?php echo $daycarebookingnotification['petowner_name'];; ?> your booking is accepted <?php echo $daycarebookingnotification['drop_off_date'];?> at <?php echo $daycarebookingnotification['drop_off_time'] ;?> to <?php echo $daycarebookingnotification['pick_up_time'] ;?> 
                            </p>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
 </div>

 <!-- modal container for vaccination history popup -->
    <div class="modal-form" id="vaccine-modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h1>Vaccination History</h1>
                
        </div>
    </div>

<!-- modal container for medical history popup -->
<div class="modal-form" id="med-modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h1>Medical History</h1>
                
        </div>
    </div>

   



</div>


<!-- Add Pets Modal -->
<div class="modal-form" id="add-modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h1>Add Pets</h1>
        <div class="form-container">
            <form id="add-pet-form" action="<?php echo ROOT?>/Petowner/dashboard/addPet" method="post">
                <div class="column">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name">
                    <div id="error-name" class="error-message"></div>

                    <label for="birthday">Date of Birth:</label>
                    <input type="date" id="birthday" name="birthday">
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
                
                    <?php
                    $pdo = new PDO("mysql:host=localhost;dbname=pawfect-care", "root", "");
                    $userId = $_SESSION['USER']->id;
                    $stmt = $pdo->prepare("SELECT petowners.id
                                        FROM users
                                        JOIN petowners ON users.id = petowners.user_id
                                        WHERE users.id = :userId");
                    $stmt->execute(['userId' => $userId]);
                    $petowner_id = $stmt->fetchColumn();
                    ?>
                    <label for="petowner_id">Pet Owner ID:</label>
                    <input type="text" id="petowner_id" name="petowner_id" value="<?php echo $petowner_id?>" readonly>
                    <div id="error-petowner_id" class="error-message"></div>
                </div>
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
    $(document).ready(function(){
        $('#searchmedhistory').on('keyup', function(){
            var searchTerm = $(this).val();
            $.ajax({
            url: "<?php echo ROOT ?>/Petowner/Dashboard/searchMedHistory",
            type: "POST",
            data: {search: searchTerm},
            success: function(data) {
                $('tbody').html(data);
            }
            });
        });
    }); 

    $(document).ready(function(){
        $('#searchvaccinehistory').on('keyup', function(){
            var searchTerm = $(this).val();
            $.ajax({
            url: "<?php echo ROOT ?>/Petowner/Dashboard/searchVacHistory",
            type: "POST",
            data: {search: searchTerm},
            success: function(data) {
                $('tbody').html(data);
            }
            });
        });
    }); 

    // Get the modal elements
    var addModal = document.getElementById("add-modal");
    var updateModal = document.getElementById("update-modal");
    var viewMedicalHistoryModal = document.getElementById("med-modal");
    var viewVaccinationHistoryModal = document.getElementById("vaccine-modal");


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

    function openMedicalHistoryModal(id) {
        console.log(id);
        viewMedicalHistoryModal.style.display = "block";
        document.getElementById("medical-history-button").href = `<?php echo ROOT?>/petowner/Dashboard/viewMedHistory/${id}`;  
        span.onclick = function() {
        modal.style.display = "none";
        }
        
    }

    function openVaccinationHistoryModal(id) {
        console.log(id);
        viewVaccinationHistoryModal.style.display = "block";
        document.getElementById("vaccination-history-button").href = `<?php echo ROOT?>/petowner/Dashboard/viewVacHistory/${id}`;  
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
            var id = this.parentElement.parentElement.getAttribute('key');
            openUpdateModal(id);
        });
    });

    //view medical history
    document.querySelectorAll('.medical-history-button').forEach(function (button) {
        button.addEventListener('click', function () {
            var id = this.parentElement.parentElement.getAttribute('key');
            console.log(id)
            openMedicalHistoryModal(id);
        });
    });

    //view vaccination history
    document.querySelectorAll('.vaccination-history-button').forEach(function (button) {
        button.addEventListener('click', function () {
            var id = this.parentElement.parentElement.getAttribute('key');
            console.log(id)
            openVaccinationHistoryModal(id);
        });
    });
    
    var closeButtons = document.querySelectorAll('.close');

        // Close modals when the no button is clicked
        var noButtons = document.querySelectorAll('.reject');

        closeButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                addModal.style.display = "none";
                updateModal.style.display = "none";
                viewVaccinationHistoryModal.style.display = "none";
                viewMedicalHistoryModal.style.display = "none";


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
        

</script>
</body>

</html>
