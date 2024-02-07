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
      background-color: gradient;
      background-size: 600% 100%;
      animation: gradientAnimation 10s infinite;
      /* background:url(https://images.unsplash.com/photo-1639759032532-c7f288e9ef4f?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D);  */
      background-size:cover;
      background-position:right;
      background-attachment:fixed;

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

        .home-container{
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
            transform: scale(1.00);
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
            color:black;
            /* font-weight: bold; */
            
        }

        .card1 {
        background-color: none;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 6px 8px rgba(0, 0, 0, 0.1); /* Soft box shadow */
        border-radius: 50px;
        overflow: hidden;
        margin: 20px 0;
        transition: transform 0.3s;
        color: black;
        font-style: italic;
        text-align: center;
        backdrop-filter: blur(5px); /* Frosted glass effect */
        transition: transform 0.8s;
        transform-style: preserve-3d;
       
        }

        .card1:hover {
            transform: scale(1.2);
            cursor: pointer;
            /* transform: rotateY(30deg); */
            /* transform: rotateX(30deg); */
            transform: rotateZ(10deg);
            transform-style: preserve-3d;
            
        }
        .card3{
                display:flex;
                flex-direction:column;
                width:300px;
                box-shadow: 0 0 0px rgba(0, 0, 0, 0);
                border-radius: 12px;
                overflow: hidden;
                margin: 20px 0;
                transition: transform 0.3s;
                color:black;
                text-align: center;
                box-shadow: 0 0 20px 8px #d0d0d0;
                }

        .card3:hover {
          transform: scale(1.02);
        }


        .card3>div{
        /* box-shadow:0 15px 20px 0 rgba(0,0,0,0.5); */
        }
        .card3-image{
        width:330px;
        height:320px;
        }
        .card3-image>img{
        width:100%;
        height:100%;
        object-fit:cover;
        object-position:bottom;
        }
        .card3-text{
        margin:-30px auto;
        margin-right:20px;
        height:300px;
        width:300px;
        background-color:#f4f4f4;
        color:#333;
        padding:20px,40px,0,20px;
        }

        .card3-body{
        font-size:1.25rem;
        }

        .button{
        margin:10px auto;
        margin-top:20px;
        margin-bottom:20px;
        }
        .btn{
        padding:10px 20px;
        background-color:white;
        color:purple;
        font-weight: bold;
        border-radius:5px;
        text-decoration:none;
        }
        .btn:hover{
        background-color:#fff;
        color:darkmagenta;
        transition:0.5s;
        transform:scale(1.1);
        }
        .btn:active{
        transform:scale(0.9);

        }

        .card2{
        display:flex;
        flex-direction:column;
        width:320px;
        height:380px;
        box-shadow: 0 0 0px rgba(0, 0, 0, 0);
        border-radius: 12px;
        overflow: hidden;
        transition: transform 0.3s;
        color:black;
        text-align: center;
        box-shadow: 0 0 20px 8px #d0d0d0;
        overflow: hidden;
        }

        .card2:hover {
        transform: scale(1.02);
        }

        .card2-image{
        border-radius: 20px;    
        margin-top:0px;    
        width:400px;
        height:300px;
        }
        .card2-image>img{
        width:100%;
        height:100%;
        object-fit:cover;
        object-position:bottom;
        }

        .card2-text{
        background-color:darkblue;
        color:#fff;
        border-radius:0 0 20px 20px;
        }


        .card-content {
            /* background-color: rgba(255, 255, 255, 0.8);  */
              box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 6px 8px rgba(0, 0, 0, 0.1); /* Soft box shadow */
              border-radius: 16px;
              overflow: hidden;
              margin: 20px 0;
              transition: transform 0.3s;
              color: black;
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

      .card4 {
      height: 300px;
      width: 240px;
      position: relative;
      transition: all 0.4s cubic-bezier(0.645, 0.045, 0.355, 1);
      border-radius: 16px;
      box-shadow: 0 0 20px 8px #d0d0d0;
      overflow: hidden;
    }



    /*Description */
    .card4-description {
      display: flex;
      position: absolute;
      gap: .5em;
      flex-direction: column;
      background-color: black;
      color: white;
      height: 70%;
      bottom: 0;
      border-radius: 16px;
      transition: all 1s cubic-bezier(0.645, 0.045, 0.355, 1);
      padding: 1rem;
    }

    .card-descript {
      display: flex;
      position: absolute;
      gap: .5em;
      flex-direction: column;
      background-color: darkblue;
      color: #212121;
      height: 70%;
      bottom: 0;
      border-radius: 16px;
      transition: all 1s cubic-bezier(0.645, 0.045, 0.355, 1);
      padding: 1rem;
    }

    /*Text*/
    .text-title {
      font-size: 1.3rem;
      font-weight: 700;
    }

    .text-body {
      font-size: 1rem;
      line-height: 130%;
    }


    /* Hover states */
    .card4:hover .card4-description {
      transform: translateY(100%);
    }

      button {
          background-color: #9b59b6; 
          border: none;
          color: white;
          padding: 15px 32px;
          margin: 20px 0;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 16px;
          border-radius: 8px;
          font-size: 20px;
          font-weight: bold;
        }
      
        button:hover {
          background-color: #8e44ad; 
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
   
        

        <div class="home-container" style="display:flex;">
            <div class="left-section" style="display:flex; flex-direction:column;">
                <p class style="color:black; font-size:50px;font-weight:bold;  ">Pawfect Care Center</p>
                <p class style="color:black; font-weight:bold; font-style: italic;">Serving Love And Care, The PAWFECT Way! </p>

            </div>
        
            <div class="right-section" style="margin-top:-60px;">
            <img src="<?php ROOT?>assets/images/loginphoto2.png" alt="Login Photo" class="photo" style=" width: 80%; padding: 20px; border-radius:20px; margin-top:-5px; margin-left:50px;">
            </div>
        </div>
     


    <div class="container">
         <div class="services-section">
            <h2 class style="color:darkblue; font-weight:bold">Our Services</h2>
            <div style="display:flex; dlex-direction:row; justify-content:space-between; margin-top:50px; margin-bottom:0px; ">
             <div class="card3">
                <div class="card3-image">
                <img src="<?php ROOT?>assets/images/vetanddog.png">
                </div>
                <div class="card3-text">
                    <p class="card3-body" style="padding-bottom:15px;">Our team of dedicated veterinarians is committed to providing top-notch care for your beloved pets. From routine check-ups to complex surgeries, we've got your furry friends covered. Your pet's health and well-being are our priorities.</p>
                    <div class="button">
                        <a href="services.php" class="btn">Book an Appointment</a>
                    </div>
                </div>   
            </div>

            <div class="card3">
                <div class="card3-image">
                <img src="<?php ROOT?>assets/images/daycaredog.png">
                </div>
                <div class="card3-text">
                    <p class="card3-body" style="padding-bottom:15px;">Our daycare services are designed to keep your pets active and engaged while you're away. Our secure facilities and trained staff ensure a day filled with play, exercise, and socialization. Your pet will love it here!</p>  
                    <div class="button">
                        <a href="services.php" class="btn">Book a Slot</a>
                   </div>
                </div>
            </div>


            <div class="card3">
                <div class="card3-image" style="height:300px;padding-bottom:20px;">
                <img src="<?php ROOT?>assets/images/pettransport.png">
                </div>
                <div class="card3-text" style="padding-bottom:20px;">
                    <p class="card3-body"style="padding-bottom:37px;">Need a safe and convenient way to get your pet to our center? Our pet transport service ensures a comfortable journey. We offer easy booking and caring drivers who treat your pets like their own.</p>
                    <div class="button">
                        <a href="services.php" class="btn">Book an Ambulance</a>
                    </div>
                </div>
            </div>
          </div>


      <div class="service card section" style=" margin-top:0px; flex-direction:column; width:100%; margin-left:160px;">
      
        <div class="top row" style="display:flex; flex-direction:row; margin-top:100px;">
            <div class="card2" style="margin-right:200px;  width:320px;  height:280px;">
                <div class="card2-image" style="width:320px; height:210px;">
                    <img src="<?php ROOT?>assets/images/dentalcare.jpg">
                </div>
                <div class="card2-text">
                    <p style="font-size:25px; font-weight:bold;">Dental Care</p>
                    <!-- <p class="card3-body" style="padding-bottom:15px;">Dental services for pets, including teeth cleaning,extractions,and treatment of dental issues. Good dental health is essential for a pet's overall well-being</p> -->
                </div>
            </div>  
            
            <div class="card2" style=" width:320px;  height:280px;">
                <div class="card2-image" style="width:320px;  height:210px;">
                    <img src="<?php ROOT?>assets/images/laboratory.jpg">
                </div>
                <div class="card2-text">
                    <p style="font-size:25px; font-weight:bold;">Laboratory Services</p>
                    <!-- <p class="card3-body" style="padding-bottom:15px;">In-house diagnostic laboratory services for quick and accurate testing of blood, urine, and other samples. Essential for diagnosing pet health issues promptly</p> -->
                </div>
            </div> 
        </div>
        
        <div class="bottom row"  style="display:flex; flex-direction:row; margin-top:100px;">
            
         <div class="card2" style="margin-right:200px;  width:320px;  height:280px; border-radius:20px;">
                <div class="card2-image"  style="width:320px; height:210px; ">
                    <img src="<?php ROOT?>assets/images/xray.jpg">
                </div>
                <div class="card2-text">
                    <p style="font-size:25px; font-weight:bold; ">Pet X Rays and Imaging</p>
                    <!-- <p class="card3-body" style="padding-bottom:15px;">Diagnostic imaging services, including X-rays and ultrasound, to assess a pet's internal health and identify any underlying issues</p> -->
                </div>
         </div> 
    
    
          <div class="card2" style="  width:320px;  height:280px;">
                <div class="card2-image"style="width:320px;  height:210px;">
                    <img src="<?php ROOT?>assets/images/petfood.jpg">
                </div>
                <div class="card2-text">
                    <p style="font-size:25px; font-weight:bold; ">Nutritional Counseling</p>
                    <!-- <p class="card3-body" style="padding-bottom:15px;">Expert guidance on selecting the right pet food and creating <br>a balanced diet tailored to a pet's specific needs</p> -->
                </div>
          </div>
        </div>
            
      </div>   
        </div>
        <!-- <button type="submit" >View More</button> -->
    </div>

    <div class="container" style="margin-top:100px;">
        <h2 style="color:darkblue; margin-bottom:80px;">Why Create an Account?</h2>
 <div style="display:flex; flex-direction:row; gap:60px; margin-bottom:200px;">
  <div class="card4">
  <div class="card4-descript">
    <p class="text-body" style="font-weight:bold">Easy Appointment Booking</p>
     <div>
       
     </div>
  </div>
    <div class="card4-description">
      <p class="text-body">Say goodbye to long phone calls and appointment mix-ups. With an account, you can effortlessly schedule vet visits, daycare, and transportation services online, anytime, anywhere.</p>
    </div>
  </div>

  <div class="card4">
  <div class="card4-descript">
    <p class="text-body" style="font-weight:bold">Secure Access to Pet Records</p>
  </div>
    <div class="card4-description">
      <p class="text-body">Your pet's health history, vaccination records, and important notes—all in one secure place. Accessible whenever you need it, ensuring you're always informed.</p>
    </div>
  </div>

  <div class="card4">
  <div class="card4-descript">
    <p class="text-body" style="font-weight:bold">Quick Check-Out</p>
  </div>
    <div class="card4-description">
      <p class="text-body">Booking a service is a breeze when your details are securely stored. No need to enter your information every time—just select, confirm, and you're set!</p>
    </div>
  </div>

  <div class="card4">
    <div class="card4-descript">
      <p class="text-body" style="font-weight:bold">Get Notified</p>
    </div>
      <div class="card4-description">
        <p class="text-body">Receive tailored recommendations and timely reminders for your pet's needs. We're here to help you provide the best care possible.</p>
      </div>
  </div>
 </div>



    
    <div class="container" style="display:flex; flex-direction:column;">
        <div class="card" style="align-items:center; width:90%; margin-left:50px; margin-top:-60px;">
            <h2 style="font-size:40px; color:darkblue;">Ready to Get Started?</h2>
            <div class="card-content" >
                <p class style="display:flex; text-align:center;">Creating an account is quick, easy, and completely free. It's the first step to simplifying your pet care journey. Join Pawfect Care today and experience the future of pet care management.
                </p>
                <button type="button" onclick="window.location.href='<?=ROOT?>signup'">Create an Account</button>

            </div>
        </div style="margin-bottom:100px;">

        <h2 class style="color:darkblue; font-weight:bold;">Feedback from Our Pet Owners</h2>
        <div class="feedback-section" style="display:flex; flex-direction:row; margin-top:50px; ">
        <div class="feedback-card card" style="align-items: center;margin-left:60px; margin-right:60px;">
            <div class="card3-image" style="width:90px; height:90px; margin-left:95px; margin-top:20px;">
            <img src="<?php ROOT?>assets/images/female1.jpg" style="border-radius:50px;">
            </div>
            <br>
            <p style="font-size:20px; color:black;">"The daycare staff is fantastic! My dog loves spending time there, and I love the peace of mind knowing he's in good hands." 
                    <br><b>Himasha Amandi</b>
                </p>
            </div>
            <div class="feedback-card card" style="align-items: center; margin-right:60px; padding-bottom:20px;">
            <div class="card3-image" style="width:90px; height:90px; margin-left:95px; margin-top:20px;">
            <img src="<?php ROOT?>assets/images/female2.jpeg" style="border-radius:50px;">
            </div>
            <br>
            <p style="font-size:20px; color:black;">"The pet transport service saved the day when I needed to get my pet to the clinic in a hurry. Fast and reliable!"
                   <br><b>Sachini Perera</b>
                </p>
            </div>
            <div class="feedback-card card" style="align-items: center; margin-right:60px;margin-bottom:50px;">
            <div class="card3-image" style="width:90px; height:90px; margin-top:20px; margin-left:95px;">
            <img src="<?php ROOT?>assets/images/male1.jpg" style="border-radius:50px;">
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

