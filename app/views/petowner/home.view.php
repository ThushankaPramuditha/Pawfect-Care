<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pawfect Care - Home</title>
</head>

<body>
  

</body>
</html> -->

<!DOCTYPE html>
<html>
    <head>
        <title>
            Home Page
        </title>
        <link rel="stylesheet" href="landing-pages.css">
    </head>
    
    <body>
    <?php include '../app/views/components/navbar2.php'; ?>
 
    <div class="table">
        <table class="table">
            <tr>
                <td width="50%">
                    <h2 class="upper">Pawfect Care <br>Center</h2>
                    <p>Serving Love And Care, <br>The PAWFECT way!</p>
                </td>
                <td>
                    <img src="someone.png" alt="Avatar" class="avatar">
                </td>
            </tr>
        </table>
    </div>

    <br><br><br>

    <div class="card">
        <div class="container">
            <table class="table">
                <tr>
                    <td width="30%">
                        <h2 class="upper">who we are?</h2>
                    </td>
                    <td>
                        <p class="title-case">Pawfect care center is one of the leading pet care ceners in Sri Lanka. Your pet will be cared for, by highly experienced veterinarians with support stafff using state of the art modern facilities.</p>
                        <button class="more">More About Us</button>
                    </td>
                </tr>
            </table>
        </div>    
    </div>

    <br><br><br>

    <div>
        <h2 class="upper">Our Services</h2>
        <table class="table">
            <tr>
                <td class="td-3">
                    <div class="card-3">
                        <h3 class="upper"> Veterinary Services </h3>
                        <p class="title-case">Our team of dedicated veterinary staff is committed to providing top-notch care for your beloved pets. From routine check-ups to complex surgeries, we've got your fury friends covered. Your pet's health and well- being are our priorities.</p>
                    </div>
                </td>
                <td class="td-3">
                    <div class="card-3">
                        <h3 class="upper"> Daycare Services </h3>
                        <p class="title-case">Our daycare services are designed to keep your pets active and engaged while you're away. our secure facilities and trained staff ensure a day filled with play, excercise and socialization. Your pet will love it here!</p>
                    </div>
                </td>
                <td class="td-3">
                    <div class="card-3">
                        <h3 class="upper"> Transport Services </h3>
                        <p class="title-case">Need a safeand convenient way to get your pet to our center? our pet transport service ensures a comfortable journey. We offer easy booking and caring drivers who treat your pets like their own.</p>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <button class="more">View More</button>

    <br><br><br>

    <h2 class="upper">Why Create Account?</h2>
    <table class="table">
        <tr>
            <td width="30%">
                <h2 class="upper">Easy Appoinment Booking</h2>
            </td>
            <td>
                <p class="title-case">Say goodbye to long phone calls and appointment mix-ups. With an account, you can effortlessly schedule vet visits, daycare, and transportation services online, anytime, anywhere.</p>
            </td>
        </tr>
    </table>

    <br><br>

    <table class="table">
        <tr>
            <td width="70%">
                <p class="title-case">Your pet's health history, vaccination records, and important notes—all in one secure place. Accessible whenever you need it, ensuring you're always informed.</p>
            </td>
            <td>
                <h2 class="upper">Secure Access to Pet Records</h2>
            </td>
        </tr>
    </table>

    <br><br>

    <table class="table">
        <tr>
            <td width="30%">
                <h2 class="upper">Quick Check-Out</h2>
            </td>
            <td>
                <p class="title-case">Booking a service is a breeze when your details are securely stored. No need to enter your information every time—just select, confirm, and you're set!</p>
            </td>
        </tr>
    </table>

    <br><br>

    <table class="table">
        <tr>
            <td width="70%">
                <p class="title-case">Receive tailored recommendations and timely reminders for your pet's needs. We're here to help you provide the best care possible.</p>
            </td>
            <td>
                <h2 class="upper">get notified</h2>
            </td>
        </tr>
    </table>

    <br><br>

    <div class="card">
        <div class="container">
            <table class="table">
                <tr>
                    <td width="30%">
                        <h2 class="upper">Ready To Get Started?</h2>
                    </td>
                    <td>
                        <p class="title-case">Creating an account is quick, easy, and completely free. It's the first step to simplifying your pet care journey. Join Pawfect Care today and experience the future of pet care management.</p>
                        <button class="more">Sign Up For Free!</button>
                    </td>
                </tr>
            </table>
        </div>    
    </div>

    <br><br>

    <div>
        <h2 class="upper"> Feedbacks from our petowners</h2>
        <table class="table">
            <tr>
                <td class="td-3">
                    <div class="card-3">
                        <h3 class="upper"> Cillian Murphy </h3>
                        <p class="title-case">"The pet transport service saved the day when I needed to get my pet to the clinic in a hurry. Fast and reliable!"</p>
                    </div>
                </td>
                <td class="td-3">
                    <div class="card-3">
                        <h3 class="upper"> Trevin  Munasinghe </h3>
                        <p class="title-case">"The daycare staff is fantastic! My dog loves spending time there, and I love the peace of mind knowing he's in good hands."</p>
                    </div>
                </td>
                <td class="td-3">
                    <div class="card-3">
                        <h3 class="upper"> Sofie Perera </h3>
                        <p class="title-case">"The vet appointments through Pawfect Care have been a breeze. No more waiting on hold to schedule. And the veterinarians are always so knowledgeable and caring."</p>
                    </div>
                </td>
            </tr>
        </table>    
        <?php include '../app/views/components/footer.php'; ?>
    </body>
</html>