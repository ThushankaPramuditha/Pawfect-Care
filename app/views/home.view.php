<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pawfect Care - Home</title>
    <style>
        body {
            font-family: 'Your-Preferred-Font', sans-serif;
            margin: 0;
            padding: 0;
            background-image: linear-gradient(to right top, #ffffff, #b9b9b9, #777777, #3b3b3b, #000000);
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            box-sizing: border-box;
            color: white;
            background-color: rgba(255, 255, 255, 0); /* Slightly transparent white */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0);
            border-radius: 8px;
            transition: transform 0.3s;
            text-align: center;
            font-size: 25px;
        }

        .container:hover {
            transform: scale(1.02);
            cursor: pointer;
        }

        .left-section,
        .right-section {
            width: 48%; /* Adjusted width to fit side by side with small gap */
            box-sizing: border-box;
            padding: 2px;
            text-align: justify;
            margin: 0 1%; /* Added margin for separation */
            display: inline-block; /* Display side by side */
            vertical-align: top; /* Align to the top */
        }

        .photo {
            max-width: 40%;
            height: auto;
            border-radius: 8px;
            margin-top: 20px;
            display: block;
            margin-left: auto;
            margin-right: auto;
            transition: transform 0.3s;
        }

        .photo:hover {
            transform: scale(1.02);
            cursor: pointer;

        }
         
        .card {
            background-color: rgba(255, 255, 255, 0); /* Slightly transparent white */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0);
            border-radius: 8px;
            overflow: hidden;
            margin: 20px 0;
            transition: transform 0.3s;
            color:white;
            text-align: center;
        }

        .card:hover {
            transform: scale(1.02);
        }

        .card img {
            width: 100%;
            height: auto;
            border-radius: 8px 8px 0 0;
        }

        .card-content {
            padding: 20px;
            color: black;
            text-align: center;
        }

        .services-section,
        .feedback-section {
            clear: both;
            text-align: center; /* Center the content */
            color:black;
            
        }
        .card1{
            background-color: rgba(255, 255, 255, 0); /* Slightly transparent white */
            box-shadow: 0 0 0px rgba(0, 0, 0, 0);
            border-radius: 8px;
            overflow: hidden;
            margin: 20px 0;
            transition: transform 0.3s;
            color:white;
            text-align: center;
          
        }

        .card1:hover {
            transform: scale(1.02);
            cursor: pointer;
        }

        .card-content{
            background-color: rgba(255, 255, 255, 0); /* Slightly transparent white */
            box-shadow: 0 0 0px rgba(0, 0, 0, 0);
            border-radius: 8px;
            overflow: hidden;
            margin: 20px 0;
            transition: transform 0.3s;
            color:white;
            text-align: center;
        }
        .service-card,
        .feedback-card {
            width: calc(30% - 20px); /* Adjusted width */
            margin: 10px;
            box-sizing: border-box;
            transition: transform 0.3s;
            display: inline-block; /* Display side by side */
            vertical-align: top; /* Align to the top */
            color:white;
            text-align: center;
            margin-right: 30px;
        }

        .service-card:hover,
        .feedback-card:hover {
            transform: scale(1.02);
        }

       

        button {
            background-color: #9b59b6; /* Light purple */
            border: none;
            color: white;
            padding: 15px 32px;
            margin: 20px 0;
            text-align: center; /* Center-align the button */
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 8px;
            font-size: 20px;
            font-weight: bold;
        }
        button:hover {
            background-color: #8e44ad; /* Darker shade of purple on hover */
            transform: scale(1.02);
            cursor: pointer;
        }
        
    </style>


</head>

<body>
    <?php include 'navbar.php'; ?>
        

        <div class="container" style="display:flex;">
            <div class="left-section">
                <p class style="font-weight:bold;">Pawfect Care Center</p>
                <p class style="font-weight:bold;">Serving Love And Care, The PAWFECT Way! </p>
            </div>
            <div class="right-section">
            <img src="<?php ROOT?>assets/images/login-photo1.jpg" alt="Login Photo" class="photo" style=" width: 100%; padding: 20px; border-radius:40px;">
            </div>

        </div>

    <div class="container">
         <div class="services-section">
            <h2 class style="color:white;">Our Services</h2>

            <div class="service-card card">
                <p>Our team of dedicated veterinarians is committed to providing top-notch care for your beloved pets. From routine check-ups to complex surgeries, we've got your furry friends covered. Your pet's health and well-being are our priorities.
                </p>
            </div>

            <div class="service-card card">
                <p>Our daycare services are designed to keep your pets active and engaged while you're away. Our secure facilities and trained staff ensure a day filled with play, exercise, and socialization. Your pet will love it here!
                </p>
            </div>

            <div class="service-card card">
                <p>Need a safe and convenient way to get your pet to our center? Our pet transport service ensures a comfortable journey. We offer easy booking and caring drivers who treat your pets like their own.
                </p>
            </div>
        </div>
        <button type="submit" >View More</button>
    </div>

    <div class="container">
        <h2>Why Create an Account?</h2>
        <div class="account container" style="display:flex;">
        <div class="left-section">
        <div class="card1 card">
            <p>Easy Appointment Booking</p>
        </div>
        </div>
        <div class="right-section">
        <div class="card1 card">
            <p>Say goodbye to long phone calls and appointment mix-ups. With an account, you can effortlessly schedule vet visits, daycare, and transportation services online, anytime, anywhere.
            </p>
        </div>  
        </div>
    </div>

        <div class="account container" style="display:flex;">
        <div class="left-section">
        <div class="card1 card">
            <p>Your pet's health history, vaccination records, and important notes—all in one secure place. Accessible whenever you need it, ensuring you're always informed.
            </p>
        </div>
        </div>
        <div class="right-section">
        <div class="card1 card">
            <p>Secure Access to Pet Records</p>
        </div>  
        </div>
      </div>
      <div class="account container" style="display:flex;">
        <div class="left-section">
        <div class="card1 card">
            <p>Quick Check-Out</p>
        </div>

        </div>
        <div class="right-section">
        <div class="card1 card">
            <p>Booking a service is a breeze when your details are securely stored. No need to enter your information every time—just select, confirm, and you're set!</p>
        </div>  
        </div>
    </div>
       
    <div class="account container" style="display:flex;">
        <div class="left-section">
         <div class="card1 card">
            <p>Receive tailored recommendations and timely reminders for your pet's needs. We're here to help you provide the best care possible.</p>
         </div>  
        </div>
        <div class="right-section">
         <div class="card1 card">
            <p>Get Notified</p>
         </div>
        </div>
    </div>


    <div class="container">
        <div class="card" style="align-items:center;">
            <h2>Ready to Get Started?</h2>
            <div class="card-content" >
                <p class style="display:flex; text-align:center;">Creating an account is quick, easy, and completely free. It's the first step to simplifying your pet care journey. Join Pawfect Care today and experience the future of pet care management.
                </p>
                <button type="submit">Create an Account</button>
            </div>
        </div>

        
        <div class="feedback-section">
            <h2 class style="color:white;">Feedback from Our Pet Owners</h2>
            <div class="feedback-card card">
                <p>"The daycare staff is fantastic! My dog loves spending time there, and I love the peace of mind knowing he's in good hands."
                </p>
            </div>
            <div class="feedback-card card">
                <p>"The pet transport service saved the day when I needed to get my pet to the clinic in a hurry. Fast and reliable!"
                </p>
            </div>
            <div class="feedback-card card">
                <p>"The vet appointments through Pawfect Care have been a breeze. No more waiting on hold to schedule. And the veterinarians are always so knowledgeable and caring."
              </p>
            </div>
        </div>
        
    </div>

</body>

</html>
