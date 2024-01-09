<form id="updated-form" action="<?php echo ROOT?>/receptionist/appointments/update/<?php echo $appointments->id; ?>" method="post">
    
    <label for="updated-appointment">Patient No:</label>
    <input type="text" id="updated-appointment" name="appointment" value="<?php echo $appointments->patient_no;  ?>" required><br>

    <label for="updated-appointment">Pet ID:</label>
    <input type="text" id="updated-appointment" name="appointment" value="<?php echo $appointments->pet_id;  ?>" required><br>

    <label for="updated-appointment">Pet Name:</label>
    <input type="text" id="updated-appointment" name="appointment" value="<?php echo $appointments->pet_name;  ?>" required><br>

    <label for="updated-appointment">Pet Owner Name:</label>
    <input type="text" id="updated-appointment" name="appointment" value="<?php echo $appointments->pet_owner_name;  ?>" required><br>

    <label for="updated-appointment">Contact No:</label>
    <input type="text" id="updated-appointment" name="appointment" value="<?php echo $appointments->contact_no;  ?>" required><br>

    <label for="updated-appointment">Date:</label>
    <input type="date" id="updated-appointment" name="appointment" value="<?php echo $appointments->date;  ?>" required><br>


    <div class="flex-container">
        <button type="submit" >Update Appointment</button>
    </div>
</form>