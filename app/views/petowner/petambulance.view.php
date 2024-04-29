<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book an Ambulance</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/bookingpages.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/panelheader.css">
    <style>
        .button {
            background-color: #6a387944;
            border: none;
            color: #6a3879;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
        }

        .button:hover {
            background-color: #6a3879;
            color: #fff;
        }
    </style>
</head>
<body    style=" padding: 0;">
<?php include 'navbar.php'; ?>

<h1>Book Pet Ambulance</h1>

<div class="cardcontainer">
    <?php foreach ($data['ambulancedrivers'] as $ambulance): ?>
        <div class="card">
            <div class="image-container">
                <img src="<?= ROOT ?>/assets/images/petowner.png" alt="Avatar" style="align-item:center; width:100px; margin-top:20px;">
            </div>
            <div class="container" style="margin-bottom:20px;">
                <h4><b><?php echo $ambulance->name ?></b></h4>
                <p class="available" style="color: <?php echo $ambulance->availability == 'available' ? '#00c749' : '#ff0000'; ?>">
                    <?php echo $ambulance->availability ?>
                </p>
                <p>contact number: <?php echo $ambulance->contact ?></p>
                <div class="button-container" style="margin-left:0px; margin-top:10px;">
                    <?php if ($ambulance->availability == 'available'): ?>
                        <a href="<?php echo ROOT?>/petowner/bookrideform?ambulance_id=<?php echo $ambulance->id ?>" class="btn">Book an Ambulance</a>
                    <?php else: ?>
                        <a class="btn disabled" style="cursor: not-allowed;">Book an Ambulance</a>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    <?php endforeach; ?>
</div>

</body>
</html>
