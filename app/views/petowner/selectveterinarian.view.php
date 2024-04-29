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
<?php include 'navbar.php'; ?>




<br><br><br>
<h1>Book your preferred Veterinarian</h1>
<!-- Inside your HTML structure where the dropdown should appear -->
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


<!-- Cards for veterinarians -->
<div class="cardcontainer">
    <?php if (!empty($data['veterinarians'])): ?>
        <?php foreach ($data['veterinarians'] as $vet): ?>
            <div class="card">
                <div class="container">
                    <h4><b>Dr. <?= htmlspecialchars($vet->name) ?></b></h4>
                    <p class="availability <?= $vet->availability == 'available' ? 'available' : 'not-available' ?>">
                        <?= $vet->availability == 'available' ? 'Available' : 'Unavailable' ?>
                    </p>
                    
                    <div class="button <?= $vet->availability == 'available' ? '' : 'disabled' ?>">
                        <button class="btn" <?= $vet->availability == 'available' ? '' : 'disabled' ?> onclick="paymentgateway(<?= $vet->id?>, '<?= addslashes($vet->name) ?>');" value="<?= $vet->id ?>">Book now</button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>


</body>
</html>


<script>


 
 function paymentgateway(vetId,vetName) {
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
            console.log(response.count);
            if (response.status === 'full') {
                Swal.fire('Sorry', `No more bookings are accepted for ${vetName} today.`, 'info');
            } else {
                proceedPayment(vetId, petId);
            }
        }
    };
    checkXhttp.open("POST", "<?= ROOT ?>/Petowner/Appointments/checkAvailability", true);
    checkXhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    checkXhttp.send(`vet_id=${vetId}`);
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
          saveAppointment(obj.pet_id, obj.vet_id) ;
        };

        // Payment window closed
        payhere.onDismissed = function onDismissed() {
            // Note: Prompt user to pay again or show an error page
            console.log("Payment dismissed");
            Swal.fire('Payment Incomplete', 'You closed the payment window before completing the payment.', 'info');

        };

        // Error occurred
        payhere.onError = function onError(error) {
            // Note: show an error page
            console.log("Error:"  + error);
            Swal.fire('Error', 'An error occurred while processing your payment: ' + error, 'error');

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
        if (this.readyState === 4 && this.status === 200) {
            console.log("Response from save appointment: " + this.responseText);
            
        }
    };
    xhttp.open("POST", "<?= ROOT ?>/Petowner/Appointments/saveAppointment", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(`pet_id=${petId}&vet_id=${vetId}&date_time=${new Date().toISOString()}`);
}


</script>
