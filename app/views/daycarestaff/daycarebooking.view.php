<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Day Care Staff</title>
</head>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<link rel="stylesheet" href="<?php echo ROOT?>/assets/css/panelheader.css">

<script src="<?php echo ROOT?>/assets/js/validatestaff.js"></script>

<body>
    <?php include '../app/views/components/dashboard-compo/adminsidebar.php'; ?>  
    <div style = "margin-left: 230px">
        <?php include '../app/views/components/panel-header-bar/withbutton.php'; ?> 
        <?php include '../app/views/components/tables/daycarebooking.php'; ?> 
    </div>

</body>
</html>


<!-- Add Day Care Booking Modal -->
<div class="modal-form" id="add-modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h1>Add Booking</h1>
        <div class="form-container">
            <form id="add-booking-form" action="<?php echo ROOT?>/DaycareStaff/add" method="post">
                <div class="column">
                    <div class="form-group">
                        <label for="pet_id">Pet ID</label>
                        <input type="text" id="pet_id" name="pet_id" required>
                    </div>
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" id="date" name="date" required>
                    </div>
                    <div class="form-group">
                        <label for="time">Time</label>
                        <input type="time" id="time" name="time" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select id="status" name="status" required>
                            <option value="Pending">Pending</option>
                            <option value="Approved">Approved</option>
                            <option value="Declined">Declined</option>
                        </select>
                    </div>
                </div>
                <div class="column">
                    <div class="form-group">
                        <label for="remarks">Remarks</label>
                        <textarea id="remarks" name="remarks" required></textarea>
                    </div>
                </div>
                <div class="flex-container">
                    <button class="reject">Cancel</button>
                    <button class="d-button" type="submit">Add</button>
                </div>
     
            </form>
        </div>
        
    </div>
</div>

    <!-- Update Day Care Staff Modal -->
    <!-- <div class="modal-form" id="update-modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h1>Update Staff</h1>
                <div id="updateveterinarian" class="form-container">
                    
                </div>
        </div>
    </div> -->

    <!-- check this -->
    <!-- Deactivate Day Care Staff Modal -->
    <!-- <div class="modal-form" id="deactivate-modal">
        <div class="modal-content-delete">
            <h1>Deactivate Daycare Staff</h1>
            <p>The user will be deactivated</p>
            <div class="flex-container">
                <button class="reject">Cancel</button>
                <a id="deactivate-staff" href=""><button class="d-button">Deactivate</button></a>
            </div>
            
        </div>
    </div> -->
    <!-- activate  Modal -->
    <!-- <div class="modal-form" id="activate-modal">
        <div class="modal-content-delete">
            <h1>Activate Daycare Staff</h1>
            <p>The user data will be activated</p>
            <div class="flex-container">
                <button class="reject">Cancel</button>
                <a id="activate-staff" href=""><button class="d-button">Activate</button></a>
            </div>
            
        </div>
    </div> -->


    <script>
        // Get the modal
        var addModal = document.getElementById('add-modal');
        var updateModal = document.getElementById('update-modal');
        var deactivateModal = document.getElementById('deactivate-modal');
</body>
</html>