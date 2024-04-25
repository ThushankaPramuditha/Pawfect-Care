<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/panelheader.css">

    <title>Appointments</title>
</head>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>


<body>
    <?php include '../app/views/components/panel-header-bar/hiuser.php'; ?>
<div style = "margin-top: 80px; ">
    <?php include '../app/views/components/dashboard-compo/receptionistsidebar.php'; ?>
       
<div style = "margin-left: 230px; margin-top:130px">
    <div class="panel-header">
            <button class="add-new-button">Add New</button>

            <div class="filter-date">
                    <input type="date"  id="date-filter" placeholder="Filter by date..." style="background-color: #ffffff; margin:0px; color: #666 ">   
            </div>

            <div class="search-bar">
                    <input type="text" id="search" placeholder="Search appointments...">
                    <button class="search-button">Search</button>
            </div>
            
    </header>
        </div>        
        <?php include '../app/views/components/tables/appointmenttable.php'; ?> 
    </div>
</div>
<!-- </body>
</html>

Add Appointment Modal -->

<div class="modal-form" id="add-modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h1>Add Appointments</h1>
        <div class="form-container" >
            <form id="add-appointment-form" action="<?php echo ROOT ?>/Receptionist/Appointments/add" method="post" style="flex-direction:column">
                <div style="display: flex; flex-direction: column; margin-bottom: 20px;">
    
                    <!-- vet selection -->
                    <div style="display: flex; flex-direction: column; margin-bottom: 20px;">
                        <div class="select-container" style=" margin-top:10px; margin-bottom: 0px;">
                            <label for="vet-select">Choose a Veterinarian:</label>
                            <select name="vet_id" id="vet-select" required>
                                <option value="nothing">Select a Veterinarian</option>
                                <?php if (!empty($data['veterinarians'])): ?>
                                    <?php foreach ($data['veterinarians'] as $vet): ?>
                                    <option value="<?= htmlspecialchars($vet->id) ?>"><?= htmlspecialchars($vet->name) ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>

                        </div>
                        <p> Filled Slots: <span id="filled-slots"></span></p>
                        <p> Free Slots: <span id="free-slots"></span> </p>
                    </div>

                    <div>
                        <label for="pet_id">Pet ID:</label>
                        <input type="text" id="pet_id" name="pet_id" >
                    </div>
                    <div>
                        <label for="pet_name">Pet Name:</label>
                        <input type="text" id="pet_name" name="pet_name" class="disabled-field">
                    </div>
                    <div>
                        <label for="pet_owner_name">Pet Owner Name:</label>
                        <input type="text" id="pet_owner_name" name="pet_owner_name" class="disabled-field">
                    </div>
                    <div>
                        <label for="contact_no">Contact No:</label>
                        <input type="text" id="contact_no" name="contact_no" class="disabled-field">
                    </div>
                    <input type="hidden" id="date_time" name="date_time" value="<?php echo date('Y-m-d H:i:s'); ?>">

                    
                </div>
                <div style="text-align: center;">
                    <button type="submit" id="add-appointment-button">Add Appointment</button>
                </div>
                
                <!-- Submit Button -->
                

            </form>
        </div>
    </div>
</div>



    <script>
        $(document).ready(function() {
            $('#date-filter').change(updateTable);
            $('#search').on('keyup', updateTable);
            function updateTable() {
                var searchTerm = $('#search').val();
                var filterDate = $('#date-filter').val(); 
                
                $.ajax({
                    url: "<?php echo ROOT ?>/Receptionist/Appointments/search",
                    type: "POST",
                    data: { search: searchTerm, date: filterDate }, 
                    success: function(data) {
                        $('tbody').html(data);
                    }
                });
            }
            
        });

        
        // Real-time pet detail updating
        document.getElementById('pet_id').addEventListener('change', function() {
            var petId = this.value.trim(); 
            if (petId) {
                $.ajax({
                    url: '<?php echo ROOT?>/Receptionist/Appointments/fetchPetdetails/' + petId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        if (data) {
                            $('#pet_name').val(data[0].pet_name);
                            $('#pet_owner_name').val(data[0].pet_owner_name);
                            $('#contact_no').val(data[0].contact);
                        } else {
                            // Clear input fields if pet id not correct
                            $('#pet_name').val('');
                            $('#pet_owner_name').val('');
                            $('#contact_no').val('');
                            $('#pet_id').val('');
                            Swal.fire({
                                icon: 'error',
                                title: 'Pet not found',
                                text: 'No pet found with the given ID. Please enter a valid Pet ID',
                            });
                        }
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Unable to fetch pet details. Please try again.',
                        });
                    }
                });
            } else {
                //error if pet ID field is empty
                Swal.fire({
                    icon: 'error',
                    title: 'Pet ID Required',
                    text: 'Please enter a Pet ID',
                });
            }
        });


        // Real-time updates when the vet is selected
        document.getElementById('vet-select').addEventListener('change', function() {
            var vetId = this.value;
            if (vetId && vetId != 'empty') {
                $.ajax({
                    url: '<?php echo ROOT?>/Receptionist/Appointments/getFreeBookingSlots/' + vetId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        if (data) {
                            document.getElementById('filled-slots').textContent = data.filled;
                            document.getElementById('free-slots').textContent = data.free;
                            if (data.free <= 0) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Sorry',
                                    text: 'Booking limit exceeded for this veterinarian',
                                }).then((result) => {
                                        document.getElementById('vet-select').value = 'nothing'; // Reset the vet dropdown
                                        document.getElementById('filled-slots').textContent = '';
                                        document.getElementById('free-slots').textContent = '';
                                });
                            }
                        }
                    }
                });
            }
        });

           // Get the modal elements
            var addModal = document.getElementById("add-modal");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // Function to open add form modal
            function openAddModal() {
                addModal.style.display = "block";
            }

           

        // Event listener for add button click
        document.querySelector('.add-new-button').addEventListener('click', function () {
            openAddModal();
        });

       

        // Close modals when the close button is clicked
        var closeButtons = document.querySelectorAll('.close');

        // Close modals when the no button is clicked
        var noButtons = document.querySelectorAll('.reject');

        closeButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                addModal.style.display = "none";

            });
        });
        noButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                deleteModal.style.display = "none";

            });
        });

        document.getElementById("add-appointment-form").addEventListener('submit', function(event) {
            var vetId = document.getElementById('vet-select').value;
            var petName = document.getElementById('pet_name').value.trim();
            var freeSlots = parseInt(document.getElementById('free-slots').textContent);

            // Check if a pet ID is entered and if a vet is selected
            if (!petName) {
                event.preventDefault(); // Prevent form submission

                Swal.fire({
                    icon: 'error',
                    title: 'Pet ID Required',
                    text: 'Please enter a Pet ID',
                });
                return;
            }
            
            if (vetId == 'nothing') {
                event.preventDefault(); // Prevent form submission
                Swal.fire({
                    icon: 'error',
                    title: 'Veterinarian not selected',
                    text: 'Please select a veterinarian first',
                }).then((result) => {
                    document.getElementById('vet-select').value = 'nothing'; // Reset the vet dropdown if the alert is dismissed
                });
                return;
            }
            
            // Check slot availability
            if (freeSlots <= 0) {
                event.preventDefault(); // Prevent form submission
                Swal.fire({
                    icon: 'error',
                    title: 'Booking limit for this veterinarian exceeded',
                    text: 'Please choose a different Veterinarian or try again later.',
                }).then((result) => {
                    window.location.reload(); // Reload the page when SweetAlert is closed
                });
                return;
            }
        });

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
