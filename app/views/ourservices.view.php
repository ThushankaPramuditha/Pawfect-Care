<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pawfect Care - Home</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,900;1,400;1,900&display=swap');a
        *{
        margin:0;
        padding:0;
        box-sizing:border-box;
        font-family:'Poppins', sans-serif;
        }
        body{ background:url(https://images.unsplash.com/photo-1639759032532-c7f288e9ef4f?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D);
        background-size:cover;
        background-position:right;
        background-attachment:fixed;
        }
        .container{
            max-width: 1200px; /* Set your desired maximum width */
            margin: 0 auto; /* Center the content within the page */
            padding: 20px; 
            display:flex;
            justify-content:space-around;
            flex-wrap:wrap;
            padding:40px 20px;
        }
        .card{
        display:flex;
        flex-direction:column;
        width:300px;
        box-shadow: 0 0 0px rgba(0, 0, 0, 0);
        border-radius: 12px;
        overflow: hidden;
        margin: 20px 0;
        transition: transform 0.3s;
        color:white;
        text-align: center;
        }

        .card:hover {
        transform: scale(1.02);
        }


        .card>div{
        /* box-shadow:0 15px 20px 0 rgba(0,0,0,0.5); */
        }
        .card-image{
        width:330px;
        height:320px;
        }
        .card-image>img{
        width:100%;
        height:100%;
        object-fit:cover;
        object-position:bottom;
        }
        .card-text{
        margin:-30px auto;
        margin-right:20px;
        height:280px;
        width:300px;
        background-color:purple;
        color:#fff;
        padding:20px,40px,0,20px;
        }

        .card-body{
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

        .card1{
        display:flex;
        flex-direction:column;
        width:400px;
        margin-right:100px;
        box-shadow: 0 0 0px rgba(0, 0, 0, 0);
        border-radius: 12px;
        overflow: hidden;
        margin: 20px 0;
        transition: transform 0.3s;
        color:white;
        text-align: center;
        }

        .card1:hover {
        transform: scale(1.02);
        }

        .card1-image{
        border-radius: 20px;    
        margin-top:100px;    
        width:400px;
        height:300px;
        }
        .card1-image>img{
        width:100%;
        height:100%;
        object-fit:cover;
        object-position:bottom;
        }
        .card1-text{
        
        height:180px;
        width:400px;
        background-color:palevioletred;
        color:#fff;
        border-radius:0 0 20px 20px;

        
        }

        

       
    </style>

https://img.freepik.com/premium-photo/beautiful-young-veterinarian-with-dog-white-background_488220-17290.jpg
</head>

<body>
    <?php include 'navbar.php'; ?>
      <h2 style="text-align:center; color:white; padding-top:20px; font-size:60px; font-weight:bold; font-family:'Poppins', sans-serif">Our Services</h2>
    <div class="container">
          <div class="card">
                <div class="card-image">
                <img src="<?php ROOT?>assets/images/vetanddog.png">
                </div>
                <div class="card-text">
                    <p class="card-body" style="padding-bottom:15px;">Our team of dedicated veterinarians is committed to providing top-notch care for your beloved pets. From routine check-ups to complex surgeries, we've got your furry friends covered. Your pet's health and well-being are our priorities.</p>
                    <div class="button">
                        <a href="services.php" class="btn">Book an Appointment</a>
                    </div>
                </div>   
          </div>

            <div class="card">
                <div class="card-image">
                <img src="<?php ROOT?>assets/images/daycaredog.png">
                </div>
                <div class="card-text">
                    <p class="card-body" style="padding-bottom:15px;">Our daycare services are designed to keep your pets active and engaged while you're away. Our secure facilities and trained staff ensure a day filled with play, exercise, and socialization. Your pet will love it here!</p>  
                    <div class="button">
                        <a href="services.php" class="btn">Book a Slot</a>
                   </div>
                </div>
            </div>


            <div class="card">
                <div class="card-image" style="height:300px;padding-bottom:20px;">
                <img src="<?php ROOT?>assets/images/pettransport.png">
                </div>
                <div class="card-text" style="padding-bottom:20px;">
                    <p class="card-body"style="padding-bottom:37px;">Need a safe and convenient way to get your pet to our center? Our pet transport service ensures a comfortable journey. We offer easy booking and caring drivers who treat your pets like their own.</p>
                    <div class="button">
                        <a href="services.php" class="btn">Book an Ambulance</a>
                    </div>
                </div>
            </div>


      <div class="service card section" style=" margin-top:200px; flex-direction:column; width:100%; margin-left:90px;">
      
        <div class="top row" style="display:flex; flex-direction:row;">
            <div class="card1" style="margin-right:200px;">
                <div class="card1-image">
                    <img src="<?php ROOT?>assets/images/dentalcare.jpg">
                </div>
                <div class="card1-text">
                    <h2>Dental Care</h2>
                    <p class="card1-body" style="padding-bottom:15px; font-size:20px;">Dental services for pets, including teeth cleaning,extractions,and treatment of dental issues. Good dental health is essential for a pet's overall well-being</p>
                </div>
            </div>  
            
            <div class="card1">
                <div class="card1-image">
                    <img src="<?php ROOT?>assets/images/laboratory.jpg">
                </div>
                <div class="card1-text">
                    <h2>Laboratory Services</h2>
                    <p class="card-body" style="padding-bottom:15px;">In-house diagnostic laboratory services for quick and accurate testing of blood, urine, and other samples. Essential for diagnosing pet health issues promptly</p>
                </div>
            </div> 
        </div>
        
        <div class="bottom row"  style="display:flex; flex-direction:row;">
            
         <div class="card1" style="margin-right:200px;">
                <div class="card1-image">
                    <img src="<?php ROOT?>assets/images/xray.jpg">
                </div>
                <div class="card1-text">
                    <h2>Pet X Rays and Imaging</h2>
                    <p class="card-body" style="padding-bottom:15px;">Diagnostic imaging services, including X-rays and ultrasound, to assess a pet's internal health and identify any underlying issues</p>
                </div>
         </div> 
    
    
          <div class="card1">
                <div class="card1-image">
                    <img src="<?php ROOT?>assets/images/petfood.jpg">
                </div>
                <div class="card1-text">
                    <h2>Nutritional Counseling</h2>
                    <p class="card-body" style="padding-bottom:15px;">Expert guidance on selecting the right pet food and creating <br>a balanced diet tailored to a pet's specific needs</p>
                </div>
          </div>
        </div>
            
      </div>   
      </div>
      
    
    

</body>

</html>

