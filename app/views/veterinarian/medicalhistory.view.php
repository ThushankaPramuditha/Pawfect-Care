<<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical History</title>
    <?php $activePage = 'petdetails';?>

</head>

<link rel="stylesheet" href="<?php echo ROOT?>/assets/css/panelheader.css">


<body>

    <?php include '../app/views/components/panel-header-bar/hiuser.php'; ?>
<div style = "margin-top: 80px; ">
    <?php include '../app/views/components/dashboard-compo/veterinariansidebar.php'; ?>  
    <div style = "margin-left: 230px; margin-top:130px">
    <div class="panel-header"style="display:flex; justify-content:flex-end">
            <?php if (!empty($medicalhistory)): ?>
                    <?php $petId = $medicalhistory[0]->pet_id; ?>
                    
            <?php endif; ?>
            <div class="search-bar">
                <input type="text" id="search" placeholder="Search treatment...">
                <button class="search-button">Search</button>
            </div>
            
    </header>
        </div>
        <?php include '../app/views/components/tables/medicalhistorytable.php'; ?> 
    </div>
</div>

</body>
</html>


    <!--Add treatment model--> 

    <!--div class="modal-form" id="add-modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h1>Add Treatment</h1>
                    <div class="form-container">
                        <form id="add-treatment-form" action="<?php echo ROOT?>/Veterinarian/MedicalHistory/add" method="post">
                        <div class ="column">
                            <label for="date_time">Date Time:</label>
                            <input type="date_time" id="date_time" name="date_time"><br>

                            <label for="patient no">Patient No:</label>
                            <input type="text" id="patient_no" name="patient_no"><br>
                            <div id="error-patient_no" class="error-message"></div>

                            <label for="weight">Weight:</label>
                            <input type="text" id="weight" name="weight"><br>
                            <div id="error-weight" class="error-message"></div>

                            <label for="temperature">Temperature:</label>
                            <input type="text" id="temperature" name="temperature"><br>
                            <div id="error-temperature" class="error-message"></div>

                            <label for="medical condition">Medical Condition:</label>
                            <input type="text" id="med_condition" name="med_condition"><br>
                            <div id="error-med_condition" class="error-message"></div>

                        </div>
                        <div class ="column">
                            <label for="treatment">Treatment:</label>
                            <input type="text" id="treatment" name="treatment"><br>
                            <div id="error-treatment" class="error-message"></div>

                            <label for="prescription">Prescription:</label>
                            <input type="text" id="prescription" name="prescription"><br>
                            <div id="error-prescription" class="error-message"></div>

                            <label for="treated by">Treated By:</label>
                            <input type="text" id="treated_by" name="vet_name"><br>
                            <div id="error-treated_by" class="error-message"></div>

                            <label for="remarks">Remarks:</label>
                            <textarea id="remarks" name="remarks" rows="4" style="border-radius: 10px;"></textarea><br>
                        </div>

                            <div class="flex-container">
                            <button type="submit" id="add-treatment-button">Add Treatment</button>
                            </div>
                        </form>
                    </div>
                
            </div>
    </div-->

    <!-- Update medicalhistory Modal -->
    <!--div class="modal-form" id="update-modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h1>Update Medical History</h1>
                <div id="updatemedicalhistory" class="form-container">
                    
                </div>
        </div>
    </div-->

    <!-- Delete medicalhistory Modal 
    <div class="modal-form" id="delete-modal">
        <div class="modal-content-delete">
            <h1>Delete Medical History</h1>
            <p>Are you sure you want to delete?</p>
            <div class="flex-container">
                <button class="reject">No</button>
                <a id="delete-meducalhistory" href=""><button class="delete-button">Delete</button></a>
            </div>
            
        </div>
    </div>-->

    <script>

            $(document).ready(function(){
                //$('.search-button').on('click', function(){ 
                $('#search').on('keyup', function(){
                    //var searchTerm = $('#search').val(); 
                    var searchTerm = $(this).val();
                    var petId = <?= json_encode($petId); ?>;
                    
                    console.log(petId)
                    $.ajax({
                        url: "<?php echo ROOT ?>/Veterinarian/MedicalHistory/search",
                        type: "POST",
                        data: { search: searchTerm,petId:petId }, 
                        success: function(data) {
                            $('tbody').html(data);
                        }
                    
                    });
                });

            });
    </script>
     
  
    </body>
    </html>





