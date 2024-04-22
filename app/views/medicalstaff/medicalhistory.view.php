<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical History</title>
</head>

<script src="<?php echo ROOT?>/assets/js/validatemedicalhistory.js"></script>

<body onload="setInitialDate()">

<!--?php $_SESSION['addnewpath'] = 'addtreatment' ?-->

    <?php include '../app/views/components/dashboard-compo/medicalstaffsidebar.php'; ?>  
    <div style = "margin-left: 230px">
        <?php include '../app/views/components/panel-header-bar/withbutton.php'; ?> 
        <?php include '../app/views/components/tables/medicalhistoryupdatetable.php'; ?> 
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
                            <input type="text" id="patient_no" name="patient_no" required><br>
                            <div id="error-patient_no" class="error-message"></div>

                            <label for="weight">Weight:</label>
                            <input type="text" id="weight" name="weight" required><br>
                            <div id="error-weight" class="error-message"></div>

                            <label for="temperature">Temperature:</label>
                            <input type="text" id="temperature" name="temperature" required><br>
                            <div id="error-temperature" class="error-message"></div>

                            <label for="medical condition">Medical Condition:</label>
                            <input type="text" id="med_condition" name="med_condition" required><br>
                            <div id="error-med_condition" class="error-message"></div>

                        </div>
                        <div class ="column">
                            <label for="treatment">Treatment:</label>
                            <input type="text" id="treatment" name="treatment" required><br>
                            <div id="error-treatment" class="error-message"></div>

                            <label for="prescription">Prescription:</label>
                            <input type="text" id="prescription" name="prescription" required><br>
                            <div id="error-prescription" class="error-message"></div>

                            <label for="treated by">Treated By:</label>
                            <input type="text" id="treated_by" name="vet_name" required><br>
                            <div id="error-treated_by" class="error-message"></div>

                            <label for="remarks">Remarks:</label>
                            <textarea id="remarks" name="remarks" rows="4" style="border-radius: 10px;" required></textarea><br>
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
            // Get the modal elements
            var addModal = document.getElementById("add-modal");
            var updateModal = document.getElementById("update-modal");
            //var deleteModal = document.getElementById("delete-modal");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // Function to open add form modal
            function openAddModal() {
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


            // Event listener for add button click
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


            // Event listeners for delete buttons click
            /**document.querySelectorAll('.delete-icon').forEach(function (button) {
                button.addEventListener('click', function () {
                    var id = this.parentElement.parentElement.getAttribute('key');
                    console.log(id)
                    openDeleteModal(id);
                });
            });**/

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
            
        </script>
    </body>
    </html>



