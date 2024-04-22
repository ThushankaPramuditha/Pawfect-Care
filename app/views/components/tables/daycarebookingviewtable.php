<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo ROOT ?>/assets/css/tables.css">
</head>

<body>

<?php

// Your database connection code goes here
$pdo = new PDO("mysql:host=localhost;dbname=pawfect-care", "root", "");

//table
$statement = $pdo->prepare("SELECT * FROM daycarebookinguser");
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
                <th>Items</th>
                <th>Allergies</th>
                <th>Behaviour</th>
                <th>Medications</th>
                <th class="edit-action-buttons"></th>
            </tr>
        </thead>
        <tbody>
            <?php if (is_array($daycarebookinguser) && !empty($daycarebookinguser)): ?>
                <?php foreach ($daycarebookinguser as $daycarebooking): ?>
                    <tr key="<?= $daycarebooking->id; ?>">
                        <td><?= htmlspecialchars($daycarebooking->drop_off_date); ?></td>
                        <td><?= getPetOwnerName($pdo, $daycarebooking->pet_id); ?></td>
                        <td><?= getPetName($pdo, $daycarebooking->pet_id); ?></td>
                        <td><?= getPetownerContact($pdo, $daycarebooking->pet_id); ?></td>
                        <td><?= htmlspecialchars($daycarebooking->drop_off_time); ?></td>
                        <td><?= htmlspecialchars($daycarebooking->pick_up_time); ?></td>
                        <td><?= htmlspecialchars($daycarebooking->list_of_items); ?></td>
                        <td><?= htmlspecialchars($daycarebooking->allergies); ?></td>
                        <td><?= htmlspecialchars($daycarebooking->pet_behaviour); ?></td>
                        <td><?= htmlspecialchars($daycarebooking->medications); ?></td>
                        <td class="edit-action-buttons">
                            <!-- Add edit button or any other action buttons here -->
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