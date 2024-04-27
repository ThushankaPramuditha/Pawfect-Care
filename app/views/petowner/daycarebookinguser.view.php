<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pawfect Care -Daycare Booking</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/panelheader.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            color: #333;
            font-size: 16px;
        }

        .modal-form {
            display: none; 
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 25% auto;
            padding: 20px;
            border: 1px solid #888;
            border-radius: 10px;
            max-width: 600px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .form-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .form-container .column {
            width: 48%; /* Adjusted to accommodate space between columns */
        }

        .form-container label {
            display: block;
            margin-bottom: 5px;
        }

        .form-container input[type="text"],
        .form-container input[type="tel"],
        .form-container input[type="time"],
        .form-container input[type="nic"],
        .form-container textarea {
            width: 100%;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            background-color: #ECECEC;
        }

        .select-container {
            margin-bottom: 10px;
        }

        .select-container label {
            display: block;
            margin-bottom: 5px;
        }

        .select-container select {
            width: 100%;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            background-color: #ECECEC;
        }

        .error-message {
            color: red;
            margin-bottom: 10px;
        }

        .add-new-button {

            background-color: #6a387944;
            border:none;
            width: fit-content;
            color:#6a3879;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
            box-shadow: #6a3879;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5); /* Added box shadow */
            }
            .add-new-button:hover {
            background-color: #6a3879;
            color: #fff;
            }

    </style>
</head>  
<body>

<?php include 'navbar.php' ?>
    <div class="modal-content" style="margin-top:10px;">
    <div style="display: flex; justify-content: center;">
            <h1>Daycare Booking</h1>
        </div>
        <div class="form-container">
        <form id="daycarebooking-form" action="<?php echo ROOT?>/petowner/daycarebookinguser/addDaycarebooking" method="post">
            <div style="display: flex; justify-content: space-between; margin-top:10px;">
                 <div class="column" style="margin-left:40px; margin-right:90px;">


                    <div class="select-container">
                        <label for="pet-select">Choose a pet:</label>
                        <select name="pet_id" id="pet-select" onchange="setPetId()">
                            <?php if (!empty($data['pets'])): ?>
                                <?php foreach ($data['pets'] as $pet): ?>
                                    <option value="<?= htmlspecialchars($pet->id) ?>"><?= htmlspecialchars($pet->name) ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>

                    <input type="hidden" id="pet-id" name="pet_id" value="<?php echo $pet->id ?>">
                    <div id="error-pet-id" class="error-message"></div>

                    <input type="hidden" id="petowner_id" name="petowner_id" value="<?php echo $_SESSION['USER']->id; ?>"> 
                    <div id="error-petowner_id" class="error-message"></div>
                     
                    <label for="drop-off-date">Drop off Date:</label>
                    <input type="date" id="drop-off-date" name="drop-off-date">
                    <div id="error-drop-off-date" class="error-message"></div>

                    <label for="drop-off-time">Drop off Time:</label>
                    <input type="time" id="drop-off-time" name="drop-off-time" style="margin-top:20px;">
                    <div id="error-drop-off-time" class="error-message"></div>

                    <label for="pick-up-time">Pick up Time:</label>
                    <input type="time" id="pick-up-time" name="pick-up-time">
                    <div id="error-pick-up-time" class="error-message"></div>

                </div>
                <div class="column" style=" margin-left:20px; padding-right:50px;">
                    <label for="list-of-items">List of Items:</label>
                    <textarea id="list-of-items" name="list-of-items" style="border-radius: 10px; margin-right:60px;" rows="1"></textarea>
                    <div id="error-list-of-items" class="error-message"></div>

                    <label for="allergies">Allergies:</label>
                    <textarea id="allergies" name="allergies" style="border-radius: 10px;" rows="1"></textarea>
                    <div id="error-allergies" class="error-message"></div>

                    <label for="pet-behaviour">Pet Behaviour:</label>
                    <textarea id="pet-behaviour" name="pet-behaviour" style="border-radius: 10px;" rows="1"></textarea>
                    <div id="error-pet-behaviour" class="error-message"></div>

                    <label for="medications">Medications:</label>
                    <textarea id="medications" name="medications" style="border-radius: 10px;" rows="1"></textarea>
                    <div id="error-medications" class="error-message"></div>
                </div>
               
            </div>
            <div class="flex-container" style="display: flex; justify-content: center; margin-left: 100px; ">
                    <button class="add-new-button" type="submit" name="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <script>
    
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
