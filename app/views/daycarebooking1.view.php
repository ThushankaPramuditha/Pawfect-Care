<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Day Care Staff</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        .view-date-button {
            cursor: pointer;
            padding: 10px 20px;
            background-color: purple;
            color: #fff;
            border: none;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        .form-container {
            display: none;
            margin-top: 20px;
            font-family: Arial, sans-serif;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="date"],
        textarea {
            width: 30%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }
        textarea {
            height: 100px;
        }
        button[type="submit"] {
            background-color: purple;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button[type="submit"]:hover {
            background-color: #6a1b9a;
        }
    </style>
</head>
<body>

    <?php include '../app/views/components/dashboard-compo/daycaresidebar.php'; ?> 

    <div style="margin-left: 230px">
        <h1>Book Day Care Facility</h1>
        <div id="pet-selection">
            <label for="pet-select">Select Pet:</label>
            <select id="pet-select">
                <?php foreach ($pets as $pet): ?>
                    <option value="<?= $pet->id ?>"><?= $pet->name ?></option>
                <?php endforeach; ?>
            </select>
            <button class="view-date-button" id="select-pet-button">Select Pet</button>
        </div>

        <div class="form-container" id="booking-form">
            <h2>Booking Details</h2>
            <form id="daycare-booking-form">
                <div>
                    <label for="drop-off-date">Drop-off Date & Time:</label>
                    <input type="datetime-local" id="drop-off-date" name="drop-off-date">
                </div>

                <div>
                    <label for="pick-up-date">Pick-up Date & Time:</label>
                    <input type="datetime-local" id="pick-up-date" name="pick-up-date">
                </div>
               
                <div>
                    <label for="emergency-contact">Emergency Contact:</label>
                    <input type="text" id="emergency-contact" name="emergency-contact">
                </div>

                <div>
                    <label for="list-of-items">List of Items:</label>
                    <textarea id="list-of-items" name="list-of-items"></textarea>
                </div>

                <div>
                    <label for="allergies">Allergies:</label> 
                    <textarea id="allergies" name="allergies"></textarea>
                </div>

                <div>
                    <label for="pet-behaviour">Pet Behaviour:</label>
                    <textarea id="pet-behaviour" name="pet-behaviour"></textarea>
                </div>

                <div>
                    <label for="medications">Medications:</label>
                    <textarea id="medications" name="medications"></textarea>
                </div>
                

                <button type="submit">Submit Application</button>
            </form>
        </div>
    </div>
    <script>
        document.getElementById('select-pet-button').addEventListener('click', function() {
            document.getElementById('booking-form').style.display = 'block';
        });
    </script>
</body>
</html>
