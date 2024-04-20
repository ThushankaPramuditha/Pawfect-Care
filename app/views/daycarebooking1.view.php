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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pawfect Care - Sign Up</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/panelheader.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
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

    </style>
</head>  
<body>

<?php include 'navbarpetowner.php'; ?>

    <div class="modal-content" style="margin-top:10px;">
    <div style="display: flex; justify-content: center;">
            <h1>Daycare Booking</h1>
        </div>
        <div class="form-container">
        <form id="daycarebooking-form" action="<?php echo ROOT?>/daycarebookinguser/add" method="post">
            <div style="display: flex; justify-content: space-between; margin-top:10px;">
                 <div class="column" style="margin-right:90px;">


                    <div class="select-container">
                        <label for="pet-select">Choose a pet:</label>
                        <select name="pets" id="pet-select">
                            <?php if (!empty($data['pets'])): ?>
                                <?php foreach ($data['pets'] as $pet): ?>
                                <option value="<?= htmlspecialchars($pet->id) ?>"><?= htmlspecialchars($pet->name) ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>


                    <label for="drop-off-time">Drop off Time:</label>
                    <input type="time" id="drop-off-time" name="drop-off-time">
                    <div id="error-drop-off-time" class="error-message"></div>

                    <label for="pick-up-time">Pick up Time:</label>
                    <input type="time" id="pick-up-time" name="pick-up-time">
                    <div id="error-pick-up-time" class="error-message"></div>

                </div>
                <div class="column" style=" margin-left:20px; padding-right:50px;">
                    <label for="list-of-items">List of Items:</label>
                    <textarea id="list-of-items" name="list-of-items" style="border-radius: 10px;" rows="4"></textarea>
                    <div id="error-list-of-items" class="error-message"></div>

                    <label for="allergies">Allergies:</label>
                    <textarea id="allergies" name="allergies" style="border-radius: 10px;" rows="4"></textarea>
                    <div id="error-allergies" class="error-message"></div>

                    <label for="pet-behaviour">Pet Behaviour:</label>
                    <textarea id="pet-behaviour" name="pet-behaviour" style="border-radius: 10px;" rows="4"></textarea>
                    <div id="error-pet-behaviour" class="error-message"></div>

                    <label for="medications">Medications:</label>
                    <textarea id="medications" name="medications" style="border-radius: 10px;" rows="4"></textarea>
                    <div id="error-medications" class="error-message"></div>
                </div>
               
            </div>
            <div class="flex-container" style="display: flex; justify-content: center; margin-left: 100px; margin-top:20px;">
                    <button class="add-new-button" type="submit" name="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>

<script>
    function validateForm() {
        var drop_off_time = document.getElementById('drop-off-time').value;
        var pick_up_time = document.getElementById('pick-up-time').value;
        var list_of_items = document.getElementById('list-of-items').value;
        var allergies = document.getElementById('allergies').value;
        var pet_behaviour = document.getElementById('pet-behaviour').value;
        var medications = document.getElementById('medications').value;


        var errors = [];
        if (!drop_off_time) errors.push("Drop off time is required.");
        if (!pick_up_time) errors.push("Pick up time is required.");
        // if (!list_of_items) errors.push("List of items is required.");
        // if (!allergies) errors.push("Allergies is required.");
        // if (!pet_behaviour) errors.push("Pet behaviour is required.");
        if (!medications) errors.push("Medications is required.");
        


        if (errors.length > 0) {
            Swal.fire({
                icon: 'error',
                title: 'Validation Error',
                html: errors.join("<br>"),
            });
            return false;
        }

        return true;
    }
    
        function saveAppointment(petId, vetId) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log("Appointment saved: " + this.responseText);
                }
            };

            xhttp.open("POST", "<?= ROOT ?>/Daycarebookinguser/saveAppointment", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(`pet_id=${petId}&vet_id=${vetId}&date_time=${new Date().toISOString()}`);
        }

    document.getElementById('daycarebooking-form').addEventListener('submit', function(event) {
        if (!validateForm()) {
            event.preventDefault();
        }
    });
</script>
</body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book an Appointment</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/bookingpages.css">
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>
<body>

<div class="logo">
   <a href="<?=ROOT?>/home">
    <img src="<?= ROOT ?>/assets/images/footer-logo.png" alt="Pawfect Care Logo">
  </a>
</div>


<!-- <h1>Book your preferred Veterinarian</h1>
<!Inside your HTML structure where the dropdown should appear -->
<!-- <div class="select-container">
    <label for="pet-select">Choose a pet:</label>
    <select name="pets" id="pet-select">
        <?php if (!empty($data['pets'])): ?>
            <?php foreach ($data['pets'] as $pet): ?>
              <option value="<?= htmlspecialchars($pet->id) ?>"><?= htmlspecialchars($pet->name) ?></option>
            <?php endforeach; ?>
        <?php endif; ?>
    </select>
</div> -->


<!-- form for daycare booking -->
<div class="form-container">
    <form action="<?= ROOT ?>/daycarebookinguser/add" method="post">
        <label for="pet-select">Choose a pet:</label>
        <select name="pet_id" id="pet-select">
            <?php if (!empty($data['pets'])): ?>
                <?php foreach ($data['pets'] as $pet): ?>
                    <option value="<?= htmlspecialchars($pet->id) ?>"><?= htmlspecialchars($pet->name) ?></option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>

        <label for="drop_off_time">Drop off time:</label>
        <input type="datetime-local" name="drop_off_time" id="drop_off_time" required>
        <label for="pick_up_time">Pick up time:</label>
        <input type="datetime-local" name="pick_up_time" id="pick_up_time" required>
        <label for="list_of_items">List of items:</label>
        <textarea name="list_of_items" id="list_of_items" required></textarea>
        <label for="allergies">Allergies:</label>
        <textarea name="allergies" id="allergies"></textarea>
        <label for="pet_behaviour">Pet behaviour:</label>
        <textarea name="pet_behaviour" id="pet_behaviour"></textarea>
        <label for="medications">Medications:</label>
        <textarea name="medications" id="medications"></textarea>
        <button type="submit">Book now</button>
    </form>




</body>
</html>


<script>
 
 function paymentgateway(vetId) {
    const petId = document.getElementById('pet-select').value;
    if (!petId) {
        Swal.fire('Error', 'Please select a pet first!', 'error');
        return;
    }

    // Check appointment availability before proceeding
    var checkXhttp = new XMLHttpRequest();
    checkXhttp.onreadystatechange = function() {
        if (checkXhttp.readyState == 4 && checkXhttp.status == 200) {
            var response = JSON.parse(checkXhttp.responseText);
            if (response.status === 'full') {
                Swal.fire('Sorry', 'No more bookings are accepted today.', 'info');
            } else {
                proceedPayment(vetId, petId);
            }
        }
    };
    checkXhttp.open("GET", "<?= ROOT ?>/Petowner/Appointments/checkAvailability", true);
    checkXhttp.send();
}


function proceedPayment(vetId, petId) {
  
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = () => {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      console.log(xhttp.responseText);
      var obj = JSON.parse(xhttp.responseText);
      obj.pet_id = petId;  // Include the pet ID in the payment info
      obj.vet_id = vetId;  // Include the vet ID in the payment info
      

       // Payment completed. It can be a successful failure.
        payhere.onCompleted = function onCompleted(orderId) {
          console.log("Payment completed. OrderID:" + orderId);
          saveAppointment(obj.pet_id, obj.vet_id);  // Save the appointment
            // Note: validate the payment and show success or failure page to the customer
        };

        // Payment window closed
        payhere.onDismissed = function onDismissed() {
            // Note: Prompt user to pay again or show an error page
            console.log("Payment dismissed");
        };

        // Error occurred
        payhere.onError = function onError(error) {
            // Note: show an error page
            console.log("Error:"  + error);
        };

        // Put the payment variables here
        var payment = {
            "sandbox": true,
            "merchant_id": "1225790",    // Replace your Merchant ID
            "return_url":  "<?= ROOT ?>/petowner/selectveterinarian",     // Important
            "cancel_url":  "<?= ROOT ?>/petowner/selectveterinarian",     // Important
            "notify_url": "http://sample.com/notify",
            "order_id": obj["order_id"],
            "items": obj["items"],
            "amount": obj["amount"],
            "currency": obj["currency"],
            "hash": obj["hash"], // *Replace with generated hash retrieved from backend
            "first_name": obj["first_name"],
            "last_name": obj["last_name"],
            "email": obj["email"],
            "phone": obj["phone"],
            "address": obj["address"],
            "city": obj["city"],
            "country": "Sri Lanka",
            "delivery_address": "No. 46, Galle road, Kalutara South",
            "delivery_city": "Kalutara",
            "delivery_country": "Sri Lanka",
            "custom_1": "",
            "custom_2": ""
        };
        
        payhere.startPayment(payment);
        
    }
  };
  
  xhttp.open("POST", "<?= ROOT ?>/PayHere", true);
  xhttp.send();
}

function saveAppointment(petId, vetId) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log("Appointment saved: " + this.responseText);
        }
    };

    xhttp.open("POST", "<?= ROOT ?>/Petowner/Appointments/saveAppointment", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(`pet_id=${petId}&vet_id=${vetId}&date_time=${new Date().toISOString()}`);
}
</script>
