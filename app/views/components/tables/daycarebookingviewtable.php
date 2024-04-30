<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo ROOT ?>/assets/css/tables.css">
</head>

<style>
 .finish-button {
    background: #FFFF80; /* Very light yellow */
    border: 1px; /* Matching border color */
    border-radius: 5px;
    color:#FF8000; /* Text color */
    padding: 5px 10px;
    cursor: pointer;
}

.finish-button:hover {
    background: #ffff00; /* Yellow color on hover */
    color: #ffffff; /* White text color on hover */
}
    

    </style>
<body>

<?php

// Your database connection code goes here
$pdo = new PDO("mysql:host=localhost;dbname=pawfect-care", "root", "");

//table
$statement = $pdo->prepare("SELECT * FROM daycarebookinguser ORDER BY 
    CASE 
        WHEN status = 'pending' THEN 1
        WHEN status = 'accepted' THEN 2
        WHEN status = 'declined' THEN 3
        WHEN status = 'finished' THEN 4
    END, drop_off_date DESC");
$statement->execute();
$daycarebookinguser = $statement->fetchAll(PDO::FETCH_OBJ);

//function to get petowner name using pet_id from pets table and join with it petowner table
function getPetOwnerName($pdo, $pet_id)
{
    $statement = $pdo->prepare("SELECT petowners.name
                                FROM pets
                                INNER JOIN petowners ON pets.petowner_id = petowners.id
                                WHERE pets.id = ?");
    $statement->execute([$pet_id]);
    return $statement->fetchColumn();
}

function getPetownerContact($pdo, $pet_id)
{
    $statement = $pdo->prepare("SELECT petowners.contact
                                FROM pets
                                INNER JOIN petowners ON pets.petowner_id = petowners.id
                                WHERE pets.id = ?");
    $statement->execute([$pet_id]);
    return $statement->fetchColumn();
}

//function to get pet name using pet_id from pets table
function getPetName($pdo, $pet_id)
{
    $statement = $pdo->prepare("SELECT name FROM pets WHERE id = ?");
    $statement->execute([$pet_id]);
    return $statement->fetchColumn();
}



?>
    <table>
        <thead>
            <tr>
                <th>Drop-Date</th>
                <th>Pet Owner</th>
                <th>Pet Name</th>
                <th>Contact Number</th>
                <th>Drop-Time</th>
                <th>Pickup-Time</th>
                <th>Status</th>
                <th>Items</th>
                <th>Allergies</th>
                <th>Behaviour</th>
                <th>Medications</th>
               
                <th class="activate-action-buttons"></th>
                <th class="deactivate-action-buttons"></th>
                <th class="finish-action-buttons"></th>
                
            </tr>
        </thead>
        <tbody>
            <?php if (is_array($daycarebookinguser) && !empty($daycarebookinguser)): ?>
                <?php foreach ($daycarebookinguser as $daycarebooking): ?>
                    <!-- <tr key="<?= $daycarebooking->id; ?>" style="<?= 
                            $daycarebooking->status == 'accepted' ? 'color: #2e7d32;' : 
                            ($daycarebooking->status == 'finished' ? 'color: #FFEA00;' : 
                            ($daycarebooking->status == 'declined' ? 'color: #c62828;' : '')) 
                        ?>"> -->
                        <tr key="<?= $daycarebooking->id; ?>">
                        <td style="width:100px;"><?= date('m/d', strtotime($daycarebooking->drop_off_date)); ?></td>
                        <td><?= getPetOwnerName($pdo, $daycarebooking->pet_id); ?></td>
                        <td><?= getPetName($pdo, $daycarebooking->pet_id); ?></td>
                        <td><?= getPetownerContact($pdo, $daycarebooking->pet_id); ?></td>
                        <td><?= htmlspecialchars($daycarebooking->drop_off_time); ?></td>
                        <td><?= htmlspecialchars($daycarebooking->pick_up_time); ?></td>
                        <td><?= htmlspecialchars($daycarebooking->status); ?></td>
                        <td><?= htmlspecialchars($daycarebooking->list_of_items); ?></td>
                        <td><?= htmlspecialchars($daycarebooking->allergies); ?></td>
                        <td><?= htmlspecialchars($daycarebooking->pet_behaviour); ?></td>
                        <td><?= htmlspecialchars($daycarebooking->medications); ?></td>
                       
                        <td class="activate-action-buttons <?= $daycarebooking->status == 'accepted' || $daycarebooking->status == 'finished' || $daycarebooking->status == 'declined' ? 'disabled' : '' ?>">
                            <button class="activate-button" <?= $daycarebooking->status == 'accepted' || $daycarebooking->status == 'finished' || $daycarebooking->status == 'declined' ? 'disabled' : '' ?>>Accept</button>
                        </td>
                        <td class="deactivate-action-buttons <?= $daycarebooking->status == 'declined' || $daycarebooking->status == 'accepted' || $daycarebooking->status == 'finished' ? 'disabled' : '' ?>">
                            <button class="deactivate-button" <?= $daycarebooking->status == 'declined' || $daycarebooking->status == 'accepted' || $daycarebooking->status == 'finished' ? 'disabled' : '' ?>>Decline</button>
                        </td>
                        <td class="finish-action-buttons <?= $daycarebooking->status == 'accepted' || $daycarebooking->status == 'declined' || $daycarebooking->status == 'finished' ? 'disabled' : '' ?>">
                            <button class="finish-button" <?= $daycarebooking->status == 'accepted' || $daycarebooking->status == 'declined' || $daycarebooking->status == 'finished' ? 'disabled' : '' ?>>Finish</button>
                        </td>


                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="10">No Bookings found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>

</html>