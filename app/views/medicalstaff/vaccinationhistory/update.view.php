
    <form id="updated-form" action="<?php echo ROOT?>/Medicalstaff/VaccinationHistory/update/<?php echo $vaccinationhistory->id; ?>" method="post">
        <div class="column">

            <label for="update-date time">Date Time:</label>
            <input type="datetime-local" class="disabled-field" id="update-date_time" name="date_time" value="<?php echo $vaccinationhistory->date_time;?>">
            <!--input type="datetime-local" class="disabled-field" id="update-date_time" name="date_time" value="<//?php echo $vaccinationhistory->date_time;?>" disabled readonly-->
            
            <label for="update-vaccine name">Vaccine Name:</label>
            <input type="text" id="update-vaccine_name" name="vaccine_name" value="<?php echo $vaccinationhistory->vaccine_name;?>">
            <div id="error-update-vaccine_name" class="error-message"></div>
            
            <label for="update-serial no">Serial No:</label>
            <input type="text" id="update-serial_no" name="serial_no" value="<?php echo $vaccinationhistory->serial_no;?>">
            <div id="error-update-serial_no" class="error-message"></div>

        </div>
        <div class="column">

            <!--label for="update-administered by">Administered By:</label>
            <select id="update-administered_by" name="administered_by">
                </*?php foreach ($veterinarians as $vet): ?>
                    <option value="</*?php echo $vet->name; ?>" </*?php echo ($vet->name == $vaccinationhistory->administered_by) ? 'selected' : ''; ?>>
                        </*?php echo $vet->name; ?>
                    </option>
                </*?php endforeach; ?>
            </select>
            <div id="error-update-administered_by" class="error-message"></div-->

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
    
