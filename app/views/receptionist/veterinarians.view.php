<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ambulance Drivers</title>
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/basic.css">
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/panelheader.css">

    <?php $activePage = 'veterinarians';?>

    <style>
    body {
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    .card-container {
        max-width: 100%;
        margin: 0 auto;
        padding: 20px;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        /* Center cards horizontally */
        align-items: center;
        /* Center cards vertically for aesthetics */
    }

    .card {
        flex: 1 1 30%;
        /* Each card will take up roughly 30% of the container width */
        display: flex;
        flex-direction: column;
        margin: 10px;
        max-width: calc(100%/3 - 20px);
        /* Ensuring consistent size */
        min-height: 400px;
        /* Ensuring all cards have the same height */
        border-radius: 12px;
        overflow: hidden;
        transition: transform 0.3s;
        background-color: #ffffff;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }


    .card-image img {
        width: 100%;
        object-fit: cover;
        object-position: center;
        border-radius: 12px 12px 0 0;
    }

    .card-text {
        padding: 10px;
        text-align: center;
    }

    .card-title {
        font-size: 1.5rem;
        margin-bottom: 10px;
        color: #333;
    }

    .card-description {
        font-size: 1rem;
        color: #666;
    }

    .button-container {
        margin: 30px;

        /* Padding within the button container */
        text-align: center;
        /* Centers the button */
    }

    .btn {
        background-color: #6a387944;
        border: none;
        width: fit-content;
        color: #6a3879;
        border-radius: 5px;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;

    }

    .btn:hover {
        background-color: #6a3879;
        color: #fff;
    }
    </style>



</head>

<body>
    <?php include '../app/views/components/panel-header-bar/hiuser.php'; ?>
    <div style="margin-top: 80px; ">
        <?php include '../app/views/components/dashboard-compo/receptionistsidebar.php'; ?>
        <div style="margin-left: 230px;  padding: 10px 10px 100px 100px;">
            <?php include '../app/views/components/panel-header-bar/hiuser.php'; ?>



            <div class="card-container">
                <?php if (!empty($data['vets'])): ?>
                <?php foreach ($data['vets'] as $vets): ?>
                <div class="card">
                    <div class="card-image">
                        <img src="<?php echo ROOT?>/assets/images/veterinarian.png" alt="Ambulance">
                    </div>
                    <div class="card-text">
                        <h3 class="card-title"><?= htmlspecialchars($vets->name) ?></h3>
                        <p class="card-description"><?= htmlspecialchars($vets->contact) ?></p>
                        <p class="card-description"
                            style="color: <?= $vets->availability == 'available' ? '#00c749' : '#ff0000'; ?>;">
                            <?= htmlspecialchars($vets->availability) ?>
                        </p>

                    </div>
                    <div class="button-container">
                        <button type="button" class="btn"
                            onclick="window.location.href='<?=ROOT?>/receptionist/veterinarians/changeAvailability/<?= htmlspecialchars($vets->id); ?>'">
                            <?= $vets->availability == 'available' ? "Mark as Unavailable" : "Mark as Available"; ?>
                        </button>

                    </div>
                </div>

                <?php endforeach; ?>
                <?php endif; ?>


</body>

</html>