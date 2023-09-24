<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/tables.css">
    <script>
        // Function to save the edits and remove the edit button
        function saveAndRemoveEdit(button) {
            // Add your code here to save the edits, e.g., send a request to the server
            
            // Remove the "Edit" button from the row
            button.remove();
        }

        // Function to add a new row for a new pet
        function addNewPetRow() {
            var table = document.querySelector("table tbody");
            var newRow = table.insertRow();

            // Add cells for the new row
            var editCell = newRow.insertCell();
            var petIdCell = newRow.insertCell();
            var nameCell = newRow.insertCell();
            var ageCell = newRow.insertCell();
            var breedCell = newRow.insertCell();
            var weightCell = newRow.insertCell();
            var medicalHistoryCell = newRow.insertCell();
            var vaccinationHistoryCell = newRow.insertCell();

            // Create input elements for the new row
            petIdCell.innerHTML = '<input type="text">';
            nameCell.innerHTML = '<input type="text">';
            ageCell.innerHTML = '<input type="text">';
            breedCell.innerHTML = '<input type="text">';
            weightCell.innerHTML = '<input type="text">';
            medicalHistoryCell.innerHTML = '<button class="t-button">Medical History</button>';
            vaccinationHistoryCell.innerHTML = '<button class="t-button">Vaccination History</button>';
        }
    </script>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th class="edit-action-buttons"></th>
                <th>Pet ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Breed</th>
                <th>Weight</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="edit-action-buttons">
                    <button class="edit-icon" onclick="saveAndRemoveEdit(this)">Edit</button>
                </td>
                <td>123456</td>
                <td>Roxy</td>
                <td>2 years</td>
                <td>Labrador</td>
                <td>20kg</td>
                <td><button class="t-button">Medical History</button></td>
                <td><button class="t-button">Vaccination History</button></td>
            </tr>
        </tbody>
    </table>

    Add Pet button to add a new row -->
    <!-- <button onclick="addNewPetRow()">Add Pet</button>
</body>
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/tables.css">
    <script>
        // Function to save the pet details
        function savePetDetails(row) {
            // Get the input fields in the row
            var petIdInput = row.cells[1].querySelector('input');
            var nameInput = row.cells[2].querySelector('input');
            var ageInput = row.cells[3].querySelector('input');
            var breedInput = row.cells[4].querySelector('input');
            var weightInput = row.cells[5].querySelector('input');
            
            // Get the text content of the buttons
            var medicalHistoryButton = row.cells[6].querySelector('button').textContent;
            var vaccinationHistoryButton = row.cells[7].querySelector('button').textContent;

            // Add your code here to save the pet details
            // You can send the data to the server or perform any necessary actions
            
            // Disable input fields and change button text
            petIdInput.disabled = true;
            nameInput.disabled = true;
            ageInput.disabled = true;
            breedInput.disabled = true;
            weightInput.disabled = true;
            row.cells[6].innerHTML = '<button class="t-button">' + medicalHistoryButton + '</button>';
            row.cells[7].innerHTML = '<button class="t-button">' + vaccinationHistoryButton + '</button>';
            
            // Add a "Save" button to edit the details again
            var editButtonCell = row.cells[0];
            editButtonCell.innerHTML = '<button class="edit-icon" onclick="editPetDetails(this)">Edit</button>';
        }

        // Function to enable input fields for editing
        function editPetDetails(button) {
            var row = button.parentNode.parentNode;
            var inputs = row.querySelectorAll('input');
            for (var i = 0; i < inputs.length; i++) {
                inputs[i].disabled = false;
            }
            row.cells[6].innerHTML = '<button class="t-button">Medical History</button>';
            row.cells[7].innerHTML = '<button class="t-button">Vaccination History</button>';
            var editButtonCell = row.cells[0];
            editButtonCell.innerHTML = '<button class="edit-icon" onclick="savePetDetails(this.parentNode.parentNode)">Save</button>';
        }
    </script>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th class="edit-action-buttons"></th>
                <th>Pet ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Breed</th>
                <th>Weight</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="edit-action-buttons">
                    <button class="edit-icon" onclick="editPetDetails(this)">Edit</button>
                </td>
                <td><input type="text" disabled></td>
                <td><input type="text" disabled></td>
                <td><input type="text" disabled></td>
                <td><input type="text" disabled></td>
                <td><input type="text" disabled></td>
                <td><button class="t-button">Medical History</button></td>
                <td><button class="t-button">Vaccination History</button></td>
            </tr>
        </tbody>
    </table>

    <!-- Add Pet button to add a new row -->
    <button onclick="addNewPetRow()">Add Pet</button>
</body>
</html>

<!-- more bugs to fix -->

