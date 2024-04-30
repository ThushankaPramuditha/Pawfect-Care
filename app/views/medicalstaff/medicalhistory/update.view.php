<form id="updated-form" action="<?php echo ROOT?>/Medicalstaff/MedicalHistory/update/<?php echo $medicalhistory->id; ?>" method="post">

                    <div class="column">

                    <label for="update-date ">Date:</label>
                    <input type="date" class="disabled-field" id="update-date" name="date" value="<?php echo $medicalhistory->date;?>"readonly>
                    <!--input type="datetime-local" class="disabled-field" id="update-date_time" name="date_time" value="<//?php echo $medicalhistory->date_time;?>" disabled readonly-->

                    <label for="update-weight">Weight:</label>
                    <input type="text" id="update-weight" name="weight" value="<?php echo $medicalhistory->weight;?>"><br>
                    <div id="error-update-weight" class="error-message"></div><br>

                    <label for="update-temperature">Temperature:</label>
                    <input type="text" id="update-temperature" name="temperature" value="<?php echo $medicalhistory->temperature;?>"><br>
                    <div id="error-update-temperature" class="error-message"></div><br>
                 
                    <div class="flex-container">
                        <button type="submit">Update Treatment</button>
                    </div>
                    </div>
                
                </form>