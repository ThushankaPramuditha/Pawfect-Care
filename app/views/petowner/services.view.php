<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pawfect Care - Home</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,900;1,400;1,900&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f4f4f4;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
        }

        .card {
            flex-basis: calc(33.33% - 20px);
            margin: 10px;
            border-radius: 12px;
            overflow: hidden;
            transition: transform 0.3s;
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .card-image img {
            width: 100%;
            height: 350px;
            object-fit: cover;
            object-position: center;
            border-radius: 12px 12px 0 0;
        }

        .card-text {
            padding: 20px;
        }

        .card-title {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #333;
        }

        .card-description {
            font-size: 1rem;
            color: #666;
            line-height: 1.6;
        }

        .card-body {
            font-size: 1.1rem; /* Adjusted */
        }
        .button {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .btn {
            background-color: #6a387944;
            border:none;
            width: fit-content;
            color:#6a3879;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.5s, color 0.5s, transform 0.5s;
        }

        .btn:hover {
            background-color: #6a3879;
            color: #fff;
            transform: scale(1.1);
        }

        .btn:active {
            transform: scale(0.9);
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <h2 style="text-align:center; color:black; padding-top:20px; font-size:60px; font-weight:bold; font-family:'Poppins', sans-serif">Our Services</h2>
    <div class="container">
        <!-- Static cards with three columns per row -->
        <div class="card">
            <div class="card-image">
                <img src="<?php echo ROOT?>/assets/images/appointment.jpeg">
            </div>
            <div class="card-text">
                <h3 class="card-title">Appointment Services</h3>
                <p class="card-description">Our team of dedicated veterinarians is committed to providing top-notch care for your beloved pets. From routine check-ups to complex surgeries, we've got your furry friends covered. Your pet's health and well-being are our priorities.</p>
                <div class="button">
                    <a href="<?php echo ROOT?>/petowner/selectveterinarian" class="btn">Book an Appointment</a>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-image">
                <img src="<?php echo ROOT?>/assets/images/daycare.jpg">
            </div>
            <div class="card-text">
                <h3 class="card-title">Daycare Services</h3>
                <p class="card-description">Our daycare services are designed to keep your pets active and engaged while you're away. Our secure facilities and trained staff ensure a day filled with play, exercise, and socialization. Your pet will love it here!</p>  
                <div class="button">
                    <a href="<?php echo ROOT?>/petowner/daycarebookinguser" class="btn">Book a Slot</a>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-image" >
                <img src="<?php echo ROOT?>/assets/images/ambulance.jpg">
            </div>
            <div class="card-text" >
                <h3 class="card-title">Pet Ambulance Services</h3>
                <p class="card-description"> Need a safe and convenient way to get your pet to our center? Our pet transport service ensures a comfortable journey. We offer easy booking and caring drivers who treat your pets like their own.</p>           
                <div class="button" style="margin-top:40px;">
                    <a href="<?php echo ROOT?>/petowner/petambulance" class="btn">Book an Ambulance</a>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-image">
                <img src="<?php echo ROOT?>/assets/images/dentalcare.jpg">
            </div>
            <div class="card-text">
            <h3 class="card-title">Dental Care</h3>
                <p class="card-description">Dental services for pets, including teeth cleaning,extractions,and treatment of dental issues. Good dental health is essential for a pet's overall well-being</p>
            </div>
        </div>
        <div class="card">
            <div class="card-image">
                <img src="<?php echo ROOT?>/assets/images/laboratory.jpg">
            </div>
            <div class="card-text">
                <h3 class="card-title">Laboratory Services</h3>
                <p class="card-description">In-house diagnostic laboratory services for quick and accurate testing of blood, urine, and other samples. Essential for diagnosing pet health issues promptly</p>
            </div>
        </div>
        <div class="card">
            <div class="card-image">
                <img src="<?php echo ROOT?>/assets/images/xray.jpg">
            </div>
            <div class="card-text">
                <h3 class="card-title">Xrays and Imaging</h3>
                <p class="card-description">Diagnostic imaging services, including X-rays and ultrasound, to assess a pet's internal health and identify any underlying issues</p>
            </div>
        </div>
        <div class="card">
            <div class="card-image">
                <img src="<?php echo ROOT?>/assets/images/petfood.jpg">
            </div>
            <div class="card-text">
                <h3 class="card-title">Nutritional Counselling </h3>
                <p class="card-description">Expert guidance on selecting the right pet food and creating a balanced diet tailored to a pet's specific needs</p>
            </div>
        </div>

            <?php if (!empty($data['services'])): ?>
                <?php 
                    $images = ['bg1.jpeg', 'bg2.jpeg', 'bg3.jpeg', 'bg4.jpeg', 'bg5.jpeg'];
                    $index = 0;
                    foreach ($data['services'] as $service):
                        $image = $images[$index];
                        $index = ($index + 1) % count($images); ?>
                        <div class="card">
                            <div class="card-image">
                                <img src="<?php echo ROOT?>/assets/images/<?= $image ?>">
                            </div>
                            <div class="card-text">
                                <h3 class="card-title"><?= htmlspecialchars($service->service) ?></h3>
                                <p class="card-description"><?= htmlspecialchars($service->description) ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
