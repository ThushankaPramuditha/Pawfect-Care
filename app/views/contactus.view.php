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
         /* background:url(https://images.unsplash.com/photo-1639759032532-c7f288e9ef4f?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D); */
        /* background-color: #E9F1FA; */
        background-size:cover;
        background-position:right;
        background-attachment:fixed;
        }
        .container{
            max-width: 1200px; /* Set your desired maximum width */
            padding: 20px; 
            display:flex;
            justify-content:space-around;
            flex-wrap:wrap;
            padding:40px 20px;
            position:relative;
        }
        .card{
        display:flex;
        flex-direction:column;
        width:500px;
        box-shadow: 0 0 0px rgba(0, 0, 0, 0);
        border-radius: 15px;
        overflow: hidden;
        margin: 20px 0;
        transition: transform 0.3s;
        color:black;
        text-align: center;
        margin-left: -50px;
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
        height:400px;
        width:300px;
        background-color:#910A67;
        color:black;
        padding:20px,40px,0,20px;
        border-radius: 15px;
    
        }

        .card-body{
        font-size:1.25rem;
        }

        .container h2{
        text-align:center;
        font-size:3rem;
        color: purple;
        font-family: 'Popins', sans-serif;
        font-weight: bolder;  
        }

        .container p{
        text-align:center;
        font-size:2rem;
        color: black;
        font-family: 'Popins', sans-serif;
        }

        .contactinfo {
        display: flex;
        flex-direction: column;
        align-items: flex-start; /* Align items to the left */
        font-size: 12px; /* Adjust the font size as needed */
        margin-left: 20px; /* Add margin to the left */
    }

        .contactinfo span {
            display: flex;
            align-items: center;
             margin-bottom: 5px; /* Add margin between each contact information */
        }

        .material-icons-sharp {
             margin-right: 5px; /* Add margin between icon and text */
        }
        .textbox {
        margin-top:100px;
        display: flex;
        flex-direction: column;
        align-items: center; /* Center items horizontally */
        max-width: 400px; /* Set a maximum width for the form */
        margin-left: 45% /* Add some left margin on smaller screens */
        
    }

        form {
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        input,
        textarea,
        button {
            margin-bottom: 15px; /* Add spacing between form elements */
            padding: 10px; /* Add padding to form elements */
            width: 100%; /* Make form elements fill the container width */
            box-sizing: border-box; /* Include padding and border in element's total width and height */
            border: 1px solid #ccc; /* Add a thin border to each form element */
            border-radius: 4px; /* Add rounded corners on all borders */

        }

        button {
            background-color: purple;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background-color: darkmagenta;
        }

        </style>

</head>

<body>
<?php include 'navbarpetowner.php'; ?>

<div class="container" style="display:flex; flex-direction:column" > 
 <h2 style="margin-left:100px;">Contact Us</h2>
 <p style="margin-left:50px;">At Pawfect Care, we value your feedback and are here to assist you. Whether you have questions, suggestions, or need assistance, please don't hesitate to get in touch with us. Your satisfaction and your pet's well-being are our top priorities.</p>

    <div class="contactinfo" style="display:flex; flex-direction:column">
        <span>
            <span class="material-icons-sharp">phone</span>
            <p>Phone:+94-71 478 8021</p>
        </span>

        <span>
            <span class="material-icons-sharp">email</span>
            <p>Email: <a href="mailto:pawfectcare@gmail.com">pawfectcare@gmail.com</a></p>
        </span>

        <span>
            <span class="material-icons-sharp">location_on</span>
            <p>Address:petCare Center, Old Road, Kalutara</p>
        </span>
    </div>


  
     <h2 style="margin-left:100px;">FAQs</h2>
    <div class="faqcontainer" style="display:flex; flex-direction:row;">
        <div class="card">
            <div class="card-text">
                <h2 style="font-size:30px; color:black; padding-top:20px;">How often should I take my pet for a check-up?</h2>
                <p style="font-size: 1.4rem; color:white; padding-top:20px;">Regular check-ups are essential. For most pets, an annual visit is sufficient. However, older pets or those with health issues may need more frequent visits.</p>
            </div>
        </div>

        <div class="card">
            <div class="card-text">
                <h2  style="font-size:30px; color:black; padding-top:30px;">How can I book a vet appointment through your platform?</h2>
                <p style="font-size:1.4rem; color:white; padding-top:20px;">After logging in, go to “services > Make an appointment ”.choose a vet, and place the booking.</p>
            </div>
        </div>

        <div class="card">
            <div class="card-text">
                <h2  style="font-size:30px; color:black; padding-top:30px;"> Is registration necessary to access your services?</h2>
                <p style="font-size:1.4rem; color:white; padding-top:20px;">Yes, you need to create an account to book our services and access features like pet records and appointment history.</p>
            </div>
        </div>
        </div>

        <div class="textbox" >
            <form action="contactus.php" method="post">
                <input type="text" name="name" placeholder="Enter your name">
                <input type="text" name="email" placeholder="Enter your email">
                <textarea name="message" placeholder="Got more Questions? let us know..."></textarea>
                <button type="submit" name="submit">Send Message</button>
            </form>
        </div>

            





        
</div>
</body>
</html>