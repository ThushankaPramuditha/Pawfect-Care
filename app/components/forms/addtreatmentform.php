<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Treatment</title>
    <link rel="stylesheet" href="<?php ROOT?>assets/css/forms.css">
</head>
<body>
    <div class="form-container">
        <form id="add-treatment-form">
            <h1>Add Treatment</h1>
            
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required><br>

            <label for="medical-condition">Medical Condition:</label>
            <textarea id="medical-condition" name="medical-condition" rows="4" required></textarea><br>
            
            <label for="treatment">Treatment:</label>
            <textarea id="treatment" name="treatment" rows="4" required></textarea><br>

            <label for="medications">Medications:</label>
            <textarea id="medications" name="medications" rows="4" required></textarea><br>

            <label for="remarks">Remarks:</label>
            <textarea id="remarks" name="remarks" rows="4" required></textarea><br>

            <div class="flex-container">
                <button type="submit" id="add-treatment-button" onclick="addTreatment()">Add Treatment</button>
            </div>
        </form>
    </div>

    <script src="addtreatmentform.js"></script>
</body>
</html>
