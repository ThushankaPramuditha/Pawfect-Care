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
         body{
        background-color: #f4f4f4; 
        /* background:url(https://images.unsplash.com/photo-1639759032532-c7f288e9ef4f?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D);  */
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
        width:500px;
        box-shadow: 0 0 0px rgba(0, 0, 0, 0);
        border-radius: 12px;
        overflow: hidden;
        margin: 20px 0;
        transition: transform 0.3s;
        color:black;
        text-align: center;
        }

        .card:hover {
        transform: scale(1.02);
        }

        .card-image{
        width:500px;
        height:400px;
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
        height:150px;
        width:500px;
        background-color:purple;
        color:white;
        padding:20px,40px,0,20px;
    
        }

        .card-body{
        font-size:1.25rem;
        }

      
       
        </style>

</head>

<body>
<?php include 'navbar.php'; ?>

<div class="container">

        <h2 style="font-family: 'Poppins',sans-serif; font-size:50px; color:purple; font-weight:bolder;">About Us</h2>
        <div class="Aboutus"  >
        <p style="font-family:'Poppins',sans-serif;  font-size:30px; color:black;">Welcome to Pawfect Care, your trusted partner in pet wellness. Our mission is to provide the highest standard of pet care and to foster a community of pet lovers dedicated to their furry companions' well-being.</p>
        </div>

        <h2 style="font-family: 'Poppins',sans-serif;font-size:50px; color:purple; font-weight:bolder;">Our commitment</h2>
        <div class="Ourcommitment">
        <p style="font-family: 'Poppins', sans-serif; font-size:30px; color:black;">At Pawfect Care, we're not just a pet care center; we're a family of pet enthusiasts dedicated to your pets' health. Our team of passionate veterinarians and pet care experts work tirelessly to ensure every pet receives personalized care, and we're committed to making pet care more accessible and convenient.</p>
        </div>

    <div class="Vetinfo"style="display:flex; flex-direction:row; margin-top:200px;">
        <div class="card" style="margin-right:100px;">
            <div class="card-image">
                <img src="<?php ROOT?>assets/images/maledoctor1.jpg" alt="">
                
            </div>
            <div class="card-text">
                <h2>Dr. Mihiraj Magamage</h2>
                <p>specializes in preventive care</p>
            </div>
        </div>

        <div class="card">
            <div class="card-image">
                <img src="<?php ROOT?>assets/images/femaledoctor1.jpg" alt="">
            </div>
            <div class="card-text">
                <h2>Dr. Wasanthi Alwis</h2>
                <p>specializes in pet Surgeries</p>
            </div>
        </div>
    </div>
</div>
</body>
</html>