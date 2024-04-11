<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book an Appointment</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/bookingpages.css">
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>

</head>
<body>

<div class="logo">
   <a href="<?=ROOT?>/home">
    <img src="<?= ROOT ?>/assets/images/footer-logo.png" alt="Pawfect Care Logo">
  </a>
</div>


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

<div class="cardcontainer">
  <div class="card">
    <div class="image-container">
      <img src="<?= ROOT?>/assets/images/dr1.jpg" alt="Avatar">
    </div>  
    <div class="container">
      <h4><b>DR.MIHIRAJ MAGAMAGE</b></h4> 
      <p class="availability available">Available</p>
      <p class="app-number">Current No. 15</p>
      <div class="button">
          <button class="btn" onclick="paymentgateway();" >Book now</button>
      </div>
      
    </div>
  </div>  

  <div class="card">
    <div class="image-container">
      <img src="<?= ROOT?>/assets/images/femaledoctor.jpg" alt="Avatar">
    </div> 
    <div class="container">
      <h4><b>DR.WASANTHI ALWIS</b></h4> 
      <p class="availability not-available">Not Available</p> 
      <p class="app-number" style="visibility:hidden">Current No. 15</p>
      <div class="button disabled">
          <button class="btn" onclick="paymentgateway();" >Book now</button>
      </div>
      
    </div>
  </div>
</div>

</body>
</html>


<script>


function paymentgateway() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = () => {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      console.log(xhttp.responseText);
      var obj = JSON.parse(xhttp.responseText);

       // Payment completed. It can be a successful failure.
        payhere.onCompleted = function onCompleted(orderId) {
            console.log("Payment completed. OrderID:" + orderId);
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
</script>
