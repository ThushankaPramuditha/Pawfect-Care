<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical History</title>
</head>

<script src="<?php echo ROOT?>/assets/js/validatemedicalhistory.js"></script>
<link rel="stylesheet" href="<?php echo ROOT?>/assets/css/panelheader.css">


<body onload="setInitialDate()">

<!--?php $_SESSION['addnewpath'] = 'addtreatment' ?-->
<?php include '../app/views/components/panel-header-bar/hiuser.php'; ?>
<div style = "margin-top: 80px; ">
    <?php include '../app/views/components/dashboard-compo/medicalstaffsidebar.php'; ?>  
    <div style = "margin-left: 230px; margin-top:130px">
    <div class="panel-header">
            <button class="add-new-button">Add New</button>

            <?php if (!empty($medicalhistory)): ?>
            <?php $petId = $medicalhistory[0]->pet_id; ?>
            
            <?php endif; ?>

            <div class="search-bar">
            <input type="text" id="search" placeholder="Search by medical condition or veterinarian name...">
                    <button class="search-button">Search</button>
            </div>
            
        </header>
    </div>
    <?php include '../app/views/components/tables/medicalhistoryupdatetable.php'; ?> 
    </div>
</div>

</body>
</html>

    <!--Add treatment model--> 

    <div class="modal-form" id="add-modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h1>Add Treatment</h1>
                    <div class="form-container">
                        <form id="add-treatment-form" action="<?php echo ROOT?>/Medicalstaff/MedicalHistory/add" method="post">
                        <div class ="column">
                             <!--input type="hidden" name="pet_id" value="<!?php echo htmlspecialchars($medicalhistory->pet_id); ?>"-->
                            <label for="date">Date:</label>
                            <input type="date" id="date" name="date" required><br>

                            <label for="patient no">Patient No:</label>
                            <input type="text" id="patient_no" name="patient_no" ><br>
                            <div id="error-patient_no" class="error-message"></div>

                            <label for="weight">Weight:</label>
                            <input type="text" id="weight" name="weight" ><br>
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
    </div>

    <!-- Update medicalhistory Modal -->
    <div class="modal-form" id="update-modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h1>Update Medical History</h1>
                <div id="updatemedicalhistory" class="form-container">
                
                </div>
        </div>
    </div>

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
                        url: "<?php echo ROOT ?>/Medicalstaff/MedicalHistory/search",
                        type: "POST",
                        data: { search: searchTerm,petId:petId }, 
                        success: function(data) {
                            $('tbody').html(data);
                        }
                    
                    });
                });

                // to update when filtered by search
                $('body').on('click', '.edit-icon', function(){
                    var Id = $(this).closest('tr').attr('key');
                    var petId = <?= json_encode($petId); ?>;
                    openUpdateModal(Id,petId);
                });
            });




            // Get the modal elements
            var addModal = document.getElementById("add-modal");
            var updateModal = document.getElementById("update-modal");
            //var deleteModal = document.getElementById("delete-modal");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // Function to open add form modal
            function openAddModal() {
                console.log('dsdbff'); 
                addModal.style.display = "block";
            }

            function openUpdateModal(Id, petId) {
                console.log(Id); 
                console.log(petId); 

                updateModal.style.display = "block";

                // Fetch data and update the modal content
                $.get(`<?php echo ROOT?>/Medicalstaff/MedicalHistory/viewMedicalHistory/${Id}/${petId}`, function(data) {
                    // Update the content with the fetched data
                    $("#updatemedicalhistory").html(data);
                });

                setTimeout(updateFormInit, 1000);
                // to close the modal
                span.onclick = function() {
                    updateModal.style.display = "none";
                }
            }


            function setInitialDate() {
                // format YYYY-MM-DD
                var currentDate = new Date().toISOString().split('T')[0];

                // Set the value of the date field
                document.getElementById('date').value = currentDate;
            }

            // Call setInitialDate() when the form is loaded
            window.addEventListener('DOMContentLoaded', setInitialDate);

            /*function setInitialDateTime()
            {
                var currentDateTime = new Date().toISOString().slice(0, 16); // Format: YYYY-MM-DDTHH:mm

                document.getElementById('date_time').value = currentDateTime;
            }

            window.addEventListener('DOMContentLoaded', setInitialDateTime);*/


            //Event listener for add button click
            document.querySelector('.add-new-button').addEventListener('click', function () {
            openAddModal();
            });

            document.querySelectorAll('.edit-icon').forEach(function (button) {
                button.addEventListener('click', function () {
                    var Id = this.getAttribute('id');
                    var petId = this.getAttribute('pet-id');
                    openUpdateModal(Id, petId);
                });
            });


            // Event listeners for update buttons click
            document.querySelectorAll('.edit-icon').forEach(function (button) {
                button.addEventListener('click', function () {
                    var Id = this.getAttribute('id');
                    var petId = this.getAttribute('pet-id');
                    openUpdateModal(Id, petId);
                });
            });

            // Close modals when the close button is clicked
            var closeButtons = document.querySelectorAll('.close');

            // Close modals when the no button is clicked
            /**var noButtons = document.querySelectorAll('.reject');**/

            closeButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    addModal.style.display = "none";
                    updateModal.style.display = "none";

                });
            });
            /*noButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    deleteModal.style.display = "none";

                });
            });***/

            // Attach event listeners for validation on input for add form
            
            document.getElementById('patient_no').addEventListener('input', validatePatientNo);
            document.getElementById('weight').addEventListener('focus', validatePatientNo);
            document.getElementById('temperature').addEventListener('focus', validateWeight);
            document.getElementById('med_condition').addEventListener('focus', validateTemperature);
            document.getElementById('treatment').addEventListener('focus', validateMedCondition);
            document.getElementById('prescription').addEventListener('focus', validateTreatment);
            document.getElementById('treated_by').addEventListener('focus', validatePrescription);
            document.getElementById('remarks').addEventListener('focus', validateTreatedBy);
            
            
            function validateAddForm() {
                var isValid = true;

                isValid = validatePatientNo() && isValid;
                isValid = validateWeight() && isValid;
                isValid = validateTemperature() && isValid;
                isValid = validateMedCondition() && isValid;
                isValid = validateTreatment() && isValid;
                isValid = validatePrescription() && isValid;
                isValid = validateTreatedBy() && isValid;


                if (!isValid) {
                    console.log("dvnbfb");
                    Swal.fire({
                        icon: 'error',
                        title: 'Validation Error',
                        html: "Please correct the errors before submitting.",
                    });
                    return false;
                }
                return true;
            }
            document.getElementById("add-treatment-form").addEventListener('submit', function(event) {
                
                if (!validateAddForm()) {
                    event.preventDefault();
                } else {
                    addModal.style.display = "none";
                }
            });

            function updateFormInit() {
            
                document.getElementById('update-weight').addEventListener('input', validateUpdateWeight);
                document.getElementById('update-temperature').addEventListener('input', validateUpdateTemperature);
                //document.getElementById('update-med_condition').addEventListener('input', validateUpdateMedCondition);
                //document.getElementById('update-treatment').addEventListener('input', validateUpdateTreatment);
                //document.getElementById('update-prescription').addEventListener('input', validateUpdatePrescription);

                document.getElementById("updated-form").addEventListener('submit', function(event) {
                    //console.log("insideee");
                    if (!validateUpdateForm()) {
                        event.preventDefault();
                    } else {
                        addModal.style.display = "none";
                    }
            
                });
            }

            function validateUpdateForm() {
                var isValid = true;

                isValid = validateUpdateWeight() && isValid;
                isValid = validateUpdateTemperature() && isValid;
                //isValid = validateUpdateMedCondition() && isValid;
                //isValid = validateUpdateTreatment() && isValid;
                //isValid = validateUpdatePrescription() && isValid;

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



