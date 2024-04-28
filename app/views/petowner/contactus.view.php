<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pawfect Care - Home</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,900;1,400;1,900&display=swap" rel="stylesheet">

    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
        }

        body{
        background-color: #f4f4f4;
         /* background:url(https://images.unsplash.com/photo-1639759032532-c7f288e9ef4f?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D); */
        /* background-color: #E9F1FA; */
        background-size:cover;
        background-position:right;
        background-attachment:fixed;
        align-items: center;
        }

        .container{
            max-width: 1200px; /* Set your desired maximum width */
            padding: 20px; 
            display:flex;
            justify-content:space-around;
            flex-wrap:wrap;
            padding:40px 20px;
            position:relative;
            flex-direction:column;
            border-radius: 24px;
        }
        
        .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        }


        .card{
        display:flex;
        flex-direction:column;
        width:calc(30%);
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        border-radius: 24px;
        overflow: hidden;
        margin: 20px;
        transition: transform 0.3s;
        color:#56475C;;
        text-align: center;
        margin-left: -50px;
        background-color: #D7CADB;
        height: auto;
        padding-bottom: 20px;
        }

        .card:hover {
        transform: scale(1.05);
        background-color: ;
        }

        .card-image{
        width:500px;
        height:400px;
        border-radius: 24px;
        }

        .card-image>img{
        width:100%;
        height:100%;
        object-fit:cover;
        object-position:bottom;
        border-radius: 24px;
        }

        .card-text{
        margin:-30px auto;
        margin-right:20px;
        color:#56475C;
        width: calc(30% -50px);
        padding: 20px;
        flex: 1; /* Allow the text area to grow */
        border-radius: 0 0 24px 24px;
        display: flex;
        flex-direction: column;
        justify-content: top;
        }

        .faq{
            font-size:16px; 
            color:#290029; 
            padding: 10px;
            font-weight: bold;
        }

        .faq-h{
            font-size:18px; 
            color:#6A3879; 
            padding-top: 30px;
            font-weight: bold;
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
        align-self: center;
        }

        .contactinfo {
        display: flex;
        flex-direction: column;
        align-items: flex-start; /* Align items to the left */
        font-size: 12px; /* Adjust the font size as needed */
        margin-left: 20px; /* Add margin to the left */
        }

        .contact{
            font-size: 20px;
            color: #666;
        }

        .contactinfo span {
            display: flex;
            align-items: center;
            align-self: justify;
            margin-bottom: 5px; /* Add margin between each contact information */
           
        }

        .material-icons-sharp {
             margin-right: 20px; /* Add margin between icon and text */
             color: #353535;
        }

        .textbox{
        margin-top:100px;
        display: flex;
        flex-direction: column;
        max-width: 400px; /* Set a maximum width for the form */
        align-self: center; /* Add some left margin on smaller screens */
        
    }

        form {
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        .button {
            /* Add spacing between form elements */
            padding: 10px; /* Add padding to form elements */
            width: 100%; /* Make form elements fill the container width */
            box-sizing: border-box; /* Include padding and border in element's total width and height */
            border: 1px solid #ccc; /* Add a thin border to each form element */
            border-radius: 24px; /* Add rounded corners on all borders */
            align-self: center;
            padding: 10px 20px; 
            border: none; 
            cursor: pointer;"

        }

        .button:hover {
            background-color: #6a3779;
        }

        /* Add to your existing styles */
        .feedback-section {
            background-color: #ffffff; /* White background */
            padding: 50px; /* Add some padding around the section */
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); /* Add subtle shadow */
            border-radius: 8px; /* Slightly rounded corners */
            margin-bottom: 100px; /* Space after the section */
        }

        .feedback-form-container form button:hover {
            background-color: #6a3779; /* Slightly darker purple on hover */
        }

        .para
        {
            margin-left:50px; 
            color: #666; 
            font-size:20px;
            text-align: center; 
            margin-bottom: 40px;
        }

        .feedback-form-container{
            align-items: center;
            width: 100%; 
            max-width: 800px;

        }

        ::placeholder{
            font-size: 16px;
            color:#636c72 ;
        }

        .in{
            border-radius: 12px;
            width: 400px; 
            padding: 15px; 
            margin-bottom: 20px; 
            border: 1px solid #636c72; 
            border-radius: 12px; height: 150px;
        }

        .in-s{
            border-radius: 12px;
            width: 400px; 
            padding: 15px; 
            margin-bottom: 20px; 
            border: 1px solid #636c72; 
            border-radius: 12px;
            justify-content: center;
        }

        h2.m{
            align-self:center;
            margin-bottom: 10px; 
            color: #353535; 
            font-size:40px; 
        }

    </style>

</head>

<body>
<?php include 'navbar.php'; ?>

<div class="container"> 
 <h2 class="m">Contact Us</h2>
 <div class="para">At Pawfect Care, we value your feedback and are here to assist you. Whether you have questions, suggestions, or need assistance, please don't hesitate to get in touch with us. Your satisfaction and your pet's well-being are our top priorities.</div>

    <div class="contactinfo" style="display:flex; flex-direction:column;">
        <span>
            <span class="material-icons-sharp" >phone</span>
            <div class="contact">Phone:+94-71 478 8021</div>
        </span>

        <span>
            <span class="material-icons-sharp">email</span>
            <div class="contact">Email: <a href="mailto:pawfectcare@gmail.com" class="contact" style="color:blue">pawfectcare@gmail.com</a></div>
        </span>

        <span>
            <span class="material-icons-sharp">location_on</span>
            <div class="contact">Address:petCare Center, Old Road, Kalutara</div>
        </span>
    </div>

    <!-- Feedback Section -->
    <div class="feedback-section" style="margin-top: 100px; display: flex; flex-direction: column; align-items: center;">
        <h2 style="font-size: 35px; color: #353535; padding-bottom: 20px;">We Value Your Feedback</h2>
        <div class="para">
            Your feedback helps us improve our services. Please take a moment to share your thoughts, suggestions, or experiences with us through our online feedback form. Your insights are invaluable in our mission to provide the best care for your beloved pets.
        </div>
        
        <div class="feedback-form-container">
            <form id = "feedback-form" action="<?=ROOT?>/petowner/feedbacks/add" method="post">
                <textarea name="feedback" placeholder="Enter Your Feedback..." class="in" style="width:100%"></textarea>
                <button type="submit" style="color:white; height:auto; background-color: #6a3779; border-radius:24px; align-self: center; width: 400px;">Submit</button>
            </form>
        </div>
    </div>
    <!-- End Feedback Section -->



    <!--faq-->

    <h2 class="m">FAQs</h2>
    <div class="container" style="display:flex; flex-direction:row; align-self:center;">
        <div class="card">
            <div class="card-text">
                <div class="faq-h">How often should I take my pet for a check-up?</div>
                <div class="faq">Regular check-ups are essential. For most pets, an annual visit is sufficient. However, older pets or those with health issues may need more frequent visits.</div>
            </div>
        </div>

        <div class="card">
            <div class="card-text">
                <div class="faq-h">How can I book a vet appointment through your platform?</div>
                <div class="faq">After logging in, go to <br>“services > Make an appointment ”.choose a vet,<br> and place the booking.</div>
            </div>
        </div>

        <div class="card">
            <div class="card-text">
                <div class="faq-h"> Is registration necessary to access your services?</div>
                <div class="faq">Yes, you need to create an account to book our services and access features like pet records and appointment history.</div>
            </div>
        </div>
        </div>

        <div class="textbox">
            <form action="<?php echo ROOT?>/petowner/contactus" method="post">
                <input class="in-s" type="text" name="name" placeholder="Enter your name">
                <input type="text" name="email" placeholder="Enter your email" class="in-s">
                <textarea name="message" placeholder="Got more Questions? let us know..." class="in-s"></textarea>
                <button type="submit" name="submit" style="color:white; height:auto; background-color: #6a3779; border-radius:24px; align-self: center; width: 400px;">Send Message</button>
            </form>
        </div>

            





        
</div>


</body>
</html>