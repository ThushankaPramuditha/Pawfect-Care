
    <form id="updated-form" action="<?php echo ROOT?>/Medicalstaff/VaccinationHistory/update/<?php echo $vaccinationhistory->id; ?>" method="post">
        <div class="column">

            <label for="update-date">Date:</label>
            <input type="date" class="disabled-field" id="update-date" name="date" value="<?php echo $vaccinationhistory->date;?>"readonly>
            <!--input type="datetime-local" class="disabled-field" id="update-date_time" name="date_time" value="<//?php echo $vaccinationhistory->date_time;?>" disabled readonly-->
            
            <!--label for="update-vaccine name">Vaccine Name:</label>
            <input type="text" id="update-vaccine_name" name="vaccine_name" value="<//?php echo $vaccinationhistory->vaccine_name;?>">
            <div id="error-update-vaccine_name" class="error-message"></div>
            
            <label for="update-serial no">Serial No:</label>
            <input type="text" id="update-serial_no" name="serial_no" value="<//?php echo $vaccinationhistory->serial_no;?>">
            <div id="error-update-serial_no" class="error-message"></div-->

            <label for="update-weight">Weight:</label>
            <input type="text" id="update-weight" name="weight" value="<?php echo $vaccinationhistory->weight;?>">
            <div id="error-update-weight" class="error-message"></div>

            <label for="update-temperature">Temperature:</label>
            <input type="text" id="update-temperature" name="temperature" value="<?php echo $vaccinationhistory->temperature;?>">
            <div id="error-update-temperature" class="error-message"></div>

        </div>
        <div class="column">

            <label for="update-due date">Next Due Date:</label>
            <input type="date" id="update-due_date" name="due_date" value="<?php echo $vaccinationhistory->due_date;?>">
            <div id="error-update-due_date" class="error-message"></div>

            <label for="update remarks">Remarks:</label>
            <textarea id="update-remarks" name="remarks" style="border-radius: 10px;" rows="4"><?php echo $vaccinationhistory->remarks; ?></textarea>
            <!--<div id="error-update-remarks" class="error-message"></div-->
            
        </div>

        <div class="flex-container">
            <button type="submit">Update History</button>
        </div>
        
    </form>
    
