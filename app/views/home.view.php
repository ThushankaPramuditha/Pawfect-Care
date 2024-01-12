<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pawfect Care - Home</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <style>

        
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');
       body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      height: 100vh;
      background-color: cornflowerblue;
      background-size: 600% 100%;
      animation: gradientAnimation 10s infinite;

    }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            box-sizing: border-box;
            color: black;
            background-color: rgba(255, 255, 255, 0); /* Slightly transparent white */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0);
            border-radius: 8px;
            transition: transform 0.3s;
            text-align: center;
            font-size: 25px;
            perspective: 1000px;
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
            flex: 1;
        }

        .photo {
            width: 100%;
            padding: 20px;
            border-radius: 40px;
            /* max-width: 40%; */
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
         
        .card-content {
            width:90%;
            padding: 20px;
            color: black;
            text-align: center;
        }

        .services-section,
        .feedback-section {
            clear: both;
            text-align: center; /* Center the content */
            color:white;
            /* font-weight: bold; */
            
        }
    .card1 {
    background-color: purple;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 6px 8px rgba(0, 0, 0, 0.1); /* Soft box shadow */
    border-radius: 50px;
    overflow: hidden;
    margin: 20px 0;
    transition: transform 0.3s;
    color: white;
    font-style: italic;
    text-align: center;
    backdrop-filter: blur(5px); /* Frosted glass effect */
    transition: transform 0.8s;
    transform-style: preserve-3d;
}

.card1:hover {
    transform: scale(1.02);
    cursor: pointer;
    transform: rotateY(45deg);
}


.card-content {
    /* background-color: rgba(255, 255, 255, 0.8);  */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 6px 8px rgba(0, 0, 0, 0.1); /* Soft box shadow */
    border-radius: 16px;
    overflow: hidden;
    margin: 20px 0;
    transition: transform 0.3s;
    color: white;
    /* font-weight: bold; */
    text-align: center;
    backdrop-filter: blur(5px); /* Frosted glass effect */
}

.service-card,
.feedback-card {
   
   background-color: rgba(255, 255, 255, 0.8); 
    width: calc(30% - 20px); /* Adjusted width */
    box-shadow: 0 0px 0px rgba(0, 0, 0, 0.1), 0 0px 0px rgba(0, 0, 0, 0);
    border-radius: 16px;
    overflow: hidden;
    margin: 10px;
    box-sizing: border-box;
    transition: transform 0.3s;
    display: inline-block; /* Display side by side */
    vertical-align: top; /* Align to the top */
    color:black;
    text-align: center;
    margin-right: 30px;
    height:440px;

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
        
     .account {
      display: flex;
      margin-bottom: 20px;
    }

   
    
    </style>


</head>

<body>
    <?php include 'navbar.php'; ?>
   
        

        <div class="container" style="display:flex;">
            <div class="left-section">
                <p class style="color:white; font-size:50px;font-weight:bold;  ">Pawfect Care Center</p>
                <p class style="color:white; font-weight:bold; font-style: italic;">Serving Love And Care, The PAWFECT Way! </p>
            </div>
            <div class="right-section">
            <img src="<?php ROOT?>assets/images/loginphoto2.png" alt="Login Photo" class="photo" style=" width: 100%; padding: 20px; border-radius:40px;">
            </div>

        </div>

    <div class="container">
         <div class="services-section">
            <h2 class style="color:white; font-weight:bold">Our Services</h2>
            <?php include '../app/views/components/dashboard-compo/card1.php'; ?>  
           
        </div>
        <!-- <button type="submit" >View More</button> -->
    </div>

    <div class="container">
        <h2 style="color:white;">Why Create an Account?</h2>
        <div class="account container" style="display:flex;">
        <div class="left-section">
        <div class="card1">
            <p>Easy Appointment Booking</p>
        </div>
        </div>
        <div class="right-section">
        <div class="card1">
            <p>Say goodbye to long phone calls and appointment mix-ups. With an account, you can effortlessly schedule vet visits, daycare, and transportation services online, anytime, anywhere.
            </p>
        </div>  
        </div>
    </div>

    <div class="account container">
    <div class="left-section">
      <div class="card1">
        <p>Your pet's health history, vaccination records, and important notes—all in one secure place. Accessible whenever you need it, ensuring you're always informed.</p>
      </div>
    </div>
    <div class="right-section">
      <div class="card1">
        <p>Secure Access to Pet Records</p>
      </div>  
    </div>
  </div>

  <div class="account container">
    <div class="left-section">
      <div class="card1">
        <p>Quick Check-Out</p>
      </div>
    </div>
    <div class="right-section">
      <div class="card1">
        <p>Booking a service is a breeze when your details are securely stored. No need to enter your information every time—just select, confirm, and you're set!</p>
      </div>  
    </div>
  </div>

  <div class="account container">
    <div class="left-section">
      <div class="card1">
        <p>Receive tailored recommendations and timely reminders for your pet's needs. We're here to help you provide the best care possible.</p>
      </div>  
    </div>
    <div class="right-section">
      <div class="card1">
        <p>Get Notified</p>
      </div>
    </div>
  </div>

    
    <div class="container" style="display:flex; flex-direction:column;">
        <div class="card" style="align-items:center; width:90%; margin-left:50px;">
            <h2 style="font-size:40px;">Ready to Get Started?</h2>
            <div class="card-content" >
                <p class style="display:flex; text-align:center;">Creating an account is quick, easy, and completely free. It's the first step to simplifying your pet care journey. Join Pawfect Care today and experience the future of pet care management.
                </p>
                <button type="button" onclick="window.location.href='<?=ROOT?>signup'">Create an Account</button>

            </div>
        </div>

        <h2 class style="color:white; font-weight:bold;">Feedback from Our Pet Owners</h2>
        <div class="feedback-section" style="display:flex; flex-direction:row; ">
        <div class="feedback-card card" style="align-items: center;margin-left:60px; margin-right:60px; ">
            <div class="card-image" style="width:90px; height:90px; border-radius:50px; align-items: center; margin-top:20px;">
            <img src="<?php ROOT?>assets/images/vetanddog.png">
            </div>
            <br>
            <p style="font-size:20px; color:black;">"The daycare staff is fantastic! My dog loves spending time there, and I love the peace of mind knowing he's in good hands." 
                    <br><b>Himasha Amandi</b>
                </p>
            </div>
            <div class="feedback-card card" style="align-items: center; margin-right:60px; padding-bottom:20px;">
            <div class="card-image" style="width:90px; height:90px;border-radius:80px; align-items: center; margin-top:20px;">
            <img src="<?php ROOT?>assets/images/vetanddog.png">
            </div>
            <br>
            <p style="font-size:20px; color:black;">"The pet transport service saved the day when I needed to get my pet to the clinic in a hurry. Fast and reliable!"
                   <br><b>Sachini Perera</b>
                </p>
            </div>
            <div class="feedback-card card" style="align-items: center; margin-right:60px;margin-bottom:50px;">
            <div class="card-image" style="width:90px; height:90px;border-radius:80px; margin-top:20px;">
            <img src="<?php ROOT?>assets/images/vetanddog.png">
            </div>
            <br>
                <p style="font-size:20px; color:black;">"Appointments through Pawfect-Care have been a breeze.No more waiting and the veterinarians are always so knowledgeable and caring."<br>
                <b>Thusitha Perera</b>
              </p>
            </div>
        </div>
        
    </div>

</body>

</html>

