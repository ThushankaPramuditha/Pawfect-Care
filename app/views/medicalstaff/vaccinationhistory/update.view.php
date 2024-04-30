
    <form id="updated-form" action="<?php echo ROOT?>/Medicalstaff/VaccinationHistory/update/<?php echo $vaccinationhistory->id; ?>" method="post">
        <div class="column">

            <label for="update-date">Date:</label>
            <input type="date" class="disabled-field" id="update-date" name="date" value="<?php echo $vaccinationhistory->date;?>"readonly>
            <!--input type="datetime-local" class="disabled-field" id="update-date_time" name="date_time" value="<//?php echo $vaccinationhistory->date_time;?>" disabled readonly-->
            
            <label for="update-weight">Weight:</label>
            <input type="text" id="update-weight" name="weight" value="<?php echo $vaccinationhistory->weight;?>"><br>
            <div id="error-update-weight" class="error-message"></div>

            <label for="update-temperature">Temperature:</label>
            <input type="text" id="update-temperature" name="temperature" value="<?php echo $vaccinationhistory->temperature;?>"><br>
            <div id="error-update-temperature" class="error-message"></div>

            <div class="flex-container">
            <button type="submit">Update History</button>
            </div>
        </<div>
            
        </div>
        
    </form>
    
