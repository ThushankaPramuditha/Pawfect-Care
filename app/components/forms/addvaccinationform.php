<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Vaccination</title>
    <link rel="stylesheet" href="<?php ROOT?>assets/css/forms.css">
</head>
<body>
    <div class="form-container">
        <form id="add-vaccination-form">
            <h1>Add Vaccination</h1>
            
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required><br>

            <label for="vaccine">Vaccine:</label>
            <input type="text" id="vaccine" name="vaccine" required><br>

            <label for="serial-number">Serial Number:</label>
            <input type="text" id="serial-number" name="serial-number" required><br>

            <label for="administered-by">Administered By:</label>
            <input type="text" id="administered-by" name="administered-by" required><br>
            
            <label for="next-due-date">Next Due Date:</label>
            <input type="date" id="next-due-date" name="next-due-date" required><br>

        
            <div class="flex-container">
                <button type="button" id="add-vaccination-button" onclick="addVaccination()">Add Vaccination</button>
            </div>
        </form>
    </div>

    <script src="addvaccinationform.js"></script>
</body>
</html>
