<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/tables.css">

    <title>Feedbacks</title>
</head>
<body>
    <?php include '../app/views/components/dashboard-compo/adminsidebar.php'; ?>
    <div style="margin-left: 230px">
        <?php include '../app/views/components/panel-header-bar/adminwithoutbutton.php'; ?>
        <table>
            <thead>
                <tr>
                    <th>Petowner ID</th>
                    <th>Petowner Name</th>
                    <th>Feedback</th>
                    <th>Feedback Status</th>
                    <th class="delete-action-buttons">Delete</th>
                    <th class="activate-action-buttons"></th>
                    <th class="deactivate-action-buttons"></th>
                </tr>
            </thead>
            <tbody>
            <?php if (is_array($feedbacks) && !empty($feedbacks)): ?>
                <?php foreach ($feedbacks as $feedback): ?>
                    <tr key = "<?php echo $feedback->id; ?>" >
                        <td><?php echo htmlspecialchars($feedback->petowner_id); ?></td>
                        <td><?php echo htmlspecialchars($feedback->owner_name); ?></td>
                        <td><?php echo htmlspecialchars($feedback->feedback); ?></td>
                        <td><?php echo htmlspecialchars($feedback->status); ?></td>

                    
                        <td class="delete-action-buttons">
                            <button class="delete-icon"></button>
                        </td>
                        <td class="activate-action-buttons">
                            <button class="activate-button">Post Feedback</button>
                        </td>
                        <td class="deactivate-action-buttons">
                            <button class="deactivate-button">Remove Feedback</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php else: ?>
                <tr>
                    <td colspan="9">No feedbacks found.</td>
                </tr>
            <?php endif; ?>
                
            </tbody>
        </table>
    </div>

  

    <!-- Delete Feedback Modal -->
    <div class="modal-form" id="delete-modal">
        <div class="modal-content-delete">
            <h1>Delete Feedback</h1>
            <p>Are you sure you want to delete this feedback?</p>
            <div class="flex-container">
                <button class="reject">No</button>
                <a id="delete-feedback" href=""><button class="delete-button">Delete</button></a>
            </div>
            
        </div>
    </div>

    <!-- check this -->
    <!-- remove feedback from website Modal -->
    <div class="modal-form" id="deactivate-modal">
        <div class="modal-content-delete">
            <h1>Remove Feedback</h1>
            <p>This will be removed from the website</p>
            <div class="flex-container">
                <button class="reject">Cancel</button>
                <a id="deactivate-staff" href=""><button class="d-button">Remove</button></a>
            </div>
            
        </div>
    </div>
    <!-- post feedback in website  Modal -->
    <div class="modal-form" id="activate-modal">
        <div class="modal-content-delete">
            <h1>Post Feedback</h1>
            <p>This feedback will be posted in the website</p>
            <div class="flex-container">
                <button class="reject">Cancel</button>
                <a id="activate-staff" href=""><button class="d-button">Post</button></a>
            </div>
            
        </div>
    </div>


    <script>
           // Get the modal elements
            var deleteModal = document.getElementById("delete-modal");
            //check
            var deactivateModal = document.getElementById("deactivate-modal");
            var activateModal = document.getElementById("activate-modal");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

           
            function openDeleteModal(id) {
                console.log(id);
                deleteModal.style.display = "block";
                document.getElementById("delete-feedback").href = `<?php echo ROOT?>/admin/Feedbacks/delete/${id}`;
                span.onclick = function() {
                modal.style.display = "none";
                }
                
            }

            function openActivateModal(id) {
                console.log(id);
                activateModal.style.display = "block";
                document.getElementById("activate-staff").href = `<?php echo ROOT?>/admin/Feedbacks/post/${id}`;  //hereeee
                span.onclick = function() {
                modal.style.display = "none";
                }
                
            }
            
            function openDeactivateModal(id) {
                console.log(id);
                deactivateModal.style.display = "block";
                document.getElementById("deactivate-staff").href = `<?php echo ROOT?>/admin/Feedbacks/remove/${id}`;  //hereeee
                span.onclick = function() {
                modal.style.display = "none";
                }
                
            }

    
        // Event listeners for delete buttons click
        document.querySelectorAll('.delete-icon').forEach(function (button) {
            button.addEventListener('click', function () {
                var id = this.parentElement.parentElement.getAttribute('key');
                console.log(id)
                openDeleteModal(id);
            });
        });

        // Event listeners for activate buttons click in the table
        document.querySelectorAll('.activate-button').forEach(function (button) {
            button.addEventListener('click', function () {
                var id = this.parentElement.parentElement.getAttribute('key');
                console.log(id)
                openActivateModal(id);
            });
        });

        // Event listeners for delete buttons click in the table
        document.querySelectorAll('.deactivate-button').forEach(function (button) {
            button.addEventListener('click', function () {
                var id = this.parentElement.parentElement.getAttribute('key');
                console.log(id)
                openDeactivateModal(id);
            });
        });

        // Close modals when the close button is clicked
        var closeButtons = document.querySelectorAll('.close');

        // Close modals when the no button is clicked
        var noButtons = document.querySelectorAll('.reject');

        closeButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                deleteModal.style.display = "none";
                deactivateModal.style.display = "none";
                activateModal.style.display = "none";


            });
        });
        noButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                deleteModal.style.display = "none";
                deactivateModal.style.display = "none";
                activateModal.style.display = "none";


            });
        });

        

    </script>
</body>
</html>
