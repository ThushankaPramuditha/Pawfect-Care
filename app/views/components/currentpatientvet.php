<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Current patient</title>

    <style>
  .card-container {
    width: 600px; /* Set the maximum width of the container */
    height: 400px; /* Set the height of the container */
    margin: 10px auto; /* Center the container horizontally */
    padding: 20px;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    background-color: #cfc3d3;
    border-radius: 15px;
    align-items: center; /* Center cards vertically */
}

.card {
    flex: 1 1 auto;
    display: flex;
    flex-direction: column;
    padding: 10px;
    margin: 10px;
    max-width: calc(100% / 2 - 20px);
    width: 60%;
    height: 50%;
    border-radius: 12px;
    overflow: hidden;
    transition: transform 0.3s;
    background-color: #ffffff;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.card-text {
    padding: 10px;
    text-align: center;
}

.card-title {
    font-size: 2.0rem;
    margin-bottom: 10px;
    color: #333;
}

.card-description {
    font-size: 1.5rem;
    color: #666;
}

.button-container {
    margin: 30px;
    text-align: center;
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


    <div class="card-container">
        <?php if (!empty($data['current'])): ?>
            <?php foreach ($data['current'] as $current): ?>
            <div class="card">
                <div class="card-text">
                    <!-- <h3 class="card-title">Dr. <?= htmlspecialchars($current->vet_name) ?></h3> -->
                    <p class="card-description">Pet ID: <?= htmlspecialchars($current->pet_id) ?></p>
                    <p class="card-description"> Pet Owner ID: <?= htmlspecialchars($current->owner_id) ?></p>
                    <br>
                    <h3 class="card-title"  style = "color: red">Patient No</h3>
                    <h3 class="card-title" style = "color: red"><?= htmlspecialchars($current->patient_no) ?></h3>

                </div>
            </div>

            <?php endforeach; ?>
        <?php endif; ?>

</body>

</html>