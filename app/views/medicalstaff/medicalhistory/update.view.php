<form id="updated-form" action="<?php echo ROOT ?>/MedicalStaff/MedicalHistory/update/<?php echo $medicalhistory->id; ?>" method="post">

                    <!--div class="column"-->

                    <label for="update-date ">Date:</label>
                    <input type="date" class="disabled-field" id="update-date" name="date" value="<?php echo $medicalhistory->date;?>"readonly>
                    <!--input type="datetime-local" class="disabled-field" id="update-date_time" name="date_time" value="<//?php echo $medicalhistory->date_time;?>" disabled readonly-->

                    <label for="update-weight">Weight:</label>
                    <input type="text" id="update-weight" name="weight" value="<?php echo $medicalhistory->weight;?>">
                    <div id="error-update-weight" class="error-message"></div>

                    <label for="update-temperature">Temperature:</label>
                    <input type="text" id="update-temperature" name="temperature" value="<?php echo $medicalhistory->temperature;?>">
                    <div id="error-update-temperature" class="error-message"></div>

                    <!--label for="update-medical condition">Medical Condition:</label>
                    <input type="text" id="update-med_condition" name="med_condition" value="<!?php echo $medicalhistory->med_condition;?>">
                    <div id="error-update-med_condition" class="error-message"></div>

                    </div>
                    <div class="column">

                    <label for="update-treatment">Treatment:</label>
                    <input type="text" id="update-treatment" name="treatment" value="<!?php echo $medicalhistory->treatment;?>">
                    <div id="error-update-treatement" class="error-message"></div>

                    <label for="update-prescription">Prescription:</label>
                    <input type="text" id="update-prescription" name="prescription" value="<!?php echo $medicalhistory->prescription;?>">
                    <div id="error-update-prescription" class="error-message"></div-->

                    <label for="update-remarks">Remarks:</label>
                    <textarea id="update-remarks" name="remarks" style="border-radius: 10px;" rows="4"><?php echo $medicalhistory->remarks; ?></textarea>
                    <!--<div id="error-update-remarks" class="error-message"></div-->

                    <!--/div-->
                    
                    <div class="flex-container">
                        <button type="submit">Update Treatment</button>
                    </div>
                
                </form>