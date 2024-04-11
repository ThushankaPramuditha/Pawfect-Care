<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pawfect Care - Sign Up</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
   

    <style>
        /* CSS styles for the login form */
        body {
            font-family: Arial, sans-serif;
            /* background-color: #f4f4f4; */
            /* background: linear-gradient(to right, #e0d2ff, #ffdbec, #f4f4f4); */
            padding: 20px;
            margin: 0;
            color: #333;
            
        }

        .container {
            display:flex;
            background-color:lightgray;
            justify-content: space-between; /* Display children in a row with space between them */
            align-items: center; /* Center vertically */
            height: 90vh; /* Set container height to 100% of viewport height */
            width: 40%; /* Set container width to 100% of viewport width */
            /* background-color:#FCFCFE; */
            border-radius: 50px;
            box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.2);
            margin-left:30%;
            margin-top:5px;

        }
        .logo{
            margin-left:85%;
            margin-top:3px;
            width: 25px;
            height: 25px;
            border-radius: 5px;
        }
        .logo img {
            width: 200px; /* Adjust the width to your desired size */
            height: auto; /* Maintain the aspect ratio by setting height to 'auto' */
        }


        /* Styling for the image container */
        .img-container {
            background-color: #9971FE;
            border-radius: 0;
            text-align: center;
            display: flex;
            align-items: center;
            margin-top: 5px;
            padding-left: 20px;
        }
        .img-container img {
            width: 100%;
            height: 100%;
            border-radius: 50px;
        }
        /* Styling for the login form container */
        .form-container {
            width: 60%;
            background-color:none;
            border: 1px solid #ccc;
            border-radius: 15px;
            align-items: center;
            display: flex;
            border: none;
            height: auto;
        }

        h1 {
            color: #333;
            font-size: 28px;
            text-align: center;
            margin-top:50px;
        }

        form {
            max-width: 100%;
            margin: 0 auto;
            margin-top:0;
        
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: none;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        /* Style for the login button */
        button[type="submit"] {
            background-color: #6a3879;
            width: 100%;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #4b2756;
        }

        /* Style for the "Don't have an account?" link */
        p {
            text-align: center;
            margin-top: 2px;
        }

        p a {
            color: #9971FE;
            text-decoration: none;
        }

        /* Style for the "Don't have an account?" link on hover */
        p a:hover {
            text-decoration: underline;
        }



        label {
            margin-bottom: 5px;
            text-align: left;
            
        }

        label:hover {
            border-color: #4b2756;
        }


        input[type="text"],
        input[type="tel"], 
        input[type="password"], 
        input[type="email"],
        input[type="date"]{
            font-family: Arial, sans-serif;
            width: 93%;
            padding: 8px;
            margin-bottom: 8px;
            border: 1px solid #ccc;
            border-radius: 15px;
            font-size: 16px;
            outline-color:#9971FE;
        }

        button[type="submit"] {
            background-color: #9971FE;
            width: 100%;
            color: rgb(255, 255, 255);
            border: none;
            border-radius: 50px;
            padding: 10px 20px;
            margin-top: 30px;
            margin-bottom: 30px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        select {
            font-family: Arial, sans-serif;
            width: 93%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 15px;
            font-size: 16px;
            outline-color:#9971FE;
        }

        button[type="submit"]:hover {
            background-color: #4b2756;
        }

        input[readonly] {
            background-color: #eee;
            cursor: not-allowed;
        }

        /*for long text fields*/
        textarea {
            font-family: Arial, sans-serif;
            width: 93%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 15px;
            font-size: 16px;
            outline-color:#9971FE;
        }

        /* Basic style for radio buttons */
        input[type="radio"] {
            margin-right: 5px; 
        }

        /* Styling for the radio button when it's checked */
        input[type="radio"]:checked {
            border: 2px solid #9971FE; /* Change the border color when the radio button is checked */
            background-color: #9971FE; /* Change the background color when the radio button is checked */
        }

    </style>
</head>  
<body>
  
   <div>
   <!-- <div class="logo">
       <a href="<?php echo ROOT?>/home">
       <img src="<?php echo ROOT?>/assets/images/footer-logo.png" alt="Pawfect Care Logo">
      </a>
    </div> -->

    <div class="container">
        <!-- <div class="img-container">
            <img src="<?php echo ROOT?>/assets/images/signup-photo2.jpg" alt="Sign Up Photo">
        </div> -->
          
        <div class="form-container" style="padding-left:120px;">
            <form method="post">

        <script>
        // Check if the PHP variable $errors is set and not empty
        <?php if (!empty($errors)): ?>
            // Create a JavaScript array to hold the error messages
            var errorMessages = [
            <?php foreach ($errors as $error): ?>
                "<?= $error ?>",
            <?php endforeach; ?>
            ];

            // Create an error message by joining the array elements
            var errorMessage = errorMessages.join("<br>");

            // Show the SweetAlert with the error message
            Swal.fire({
            icon: 'error',
            title: 'Booking Error',
            html: errorMessage,
            });
        <?php endif; ?>
        </script>

                <h1>Daycare Booking </h1>
                
                <div>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required><br>
                </div>

                <div>
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required><br>
                </div>
                
                <div>
                <label for="contact_no">Contact Number:</label>
                <input type="tel" id="contact_no" name="contact" required ><br>
                </div>
                
                <div>
                <label for="nic">Pet name</label>
                <input type="text" id="pet_name" name="pet_name" required><br>
                </div>
                
                
                <!-- <div>
                <input type="checkbox" name="terms" required> I agree to the terms and conditions.
                </div> -->

                <div class="flex-container">
                    <button class="button" type="submit" name="submit">Submit</button>
                </div>
                
                
            </form>
               
        </div>
       
    </div>

    <script>
        function validateForm() {
            var name = document.getElementById('name').value;
            var address = document.getElementById('address').value;
            var contact_no = document.getElementById('contact_no').value;
            var pet_name = document.getElementById('pet_name').value;

            // var terms = document.querySelector('input[name="terms"]:checked');

            var errors = [];

            if (!name) errors.push("Name is required.");
            if (!address) errors.push("Address is required.");
            if (!contact_no.match(/^[0-9]{10}$/)) errors.push("Contact number must be 10 digits.");
            if (!pet_name) errors.push("Pet name is required.");
        
        
            // if (!terms) errors.push("Please accept the terms and conditions.");

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

        document.querySelector('form').addEventListener('submit', function(event) {
            if (!validateForm()) {
                event.preventDefault();
            }
        });
    </script>
</body>
</html>
