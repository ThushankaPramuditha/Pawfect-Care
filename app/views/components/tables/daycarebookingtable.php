<?php

// Your database connection code goes here
$pdo = new PDO("mysql:host=localhost;dbname=pawfect-care", "root", "");

// Function to check if there are bookings for the given date
function hasBookingsForDate($pdo, $date) {
    $statement = $pdo->prepare("SELECT * FROM daycarebooking WHERE date = ?");
    $statement->execute([$date]);
    return $statement->fetchColumn() > 0;
}

// If there are no bookings for today's date, insert time slots
$today = date('Y-m-d');
if (!hasBookingsForDate($pdo, $today)) {
    $timeslots = [
        '08:00 - 10:00',
        '10:00 - 12:00',
        '12:00 - 14:00',
        '14:00 - 16:00',
        '16:00 - 18:00'
    ];

    foreach ($timeslots as $times) {
        $statement = $pdo->prepare("INSERT INTO daycarebooking (time, filled_slots, free_slots, date) VALUES (?, 0, 10, ?)");
        $statement->execute([$times, $today]);
    }
    
}

// Fetch all daycare bookings for today
$statement = $pdo->prepare("SELECT * FROM daycarebooking WHERE date = ?");
$statement->execute([$today]);
$bookingsToday = $statement->fetchAll(PDO::FETCH_OBJ);


// Group bookings by date
$bookingsByDate = [];
foreach ($bookingsToday as $booking) {
    $bookingsByDate[$booking->date][] = $booking;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/tables.css">

    <style>
        .slot-button {
            background-color: purple;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .slot-button:hover {
            background-color: #6a3879; 
        }
    </style>
</head>
<body>
<?php foreach ($bookingsByDate as $date => $bookings): ?>
    <p style="font-size: 30px; font-family: Arial;">
        <?= date('d F Y', strtotime($date)); ?>
    </p>
    <table>
        <thead>
            <tr>
                <th>Time</th>
                <th>Filled Slots</th>
                <th>Free Slots</th>
                <th>Action</th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bookings as $booking): ?>
                <tr key="<?= $booking->id ?>">
                    <td><?= htmlspecialchars($booking->time); ?></td>
                    <td><?= htmlspecialchars($booking->filled_slots); ?></td>
                    <td><?= htmlspecialchars($booking->free_slots); ?></td>
                    <td>
                            <button class="slot-button" onclick="bookSlots(<?= $booking->id ?>)" style="margin-right:100px;">Book Slot</button>
                            <button class="slot-button" onclick="cancelBooking(<?= $booking->id ?>)">Remove Slot</button>
                    </td>
                </tr> 
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endforeach; ?>
<script>
   async function bookSlots(id) {
       await fetch(`<?php echo ROOT?>/daycarestaff/daycarebooking/bookSlots/${id}`);
       window.location.reload();    
   }

    async function cancelBooking(id) {
         await fetch(`<?php echo ROOT?>/daycarestaff/daycarebooking/cancelBooking/${id}`);
         window.location.reload();    
    }
</script>
</body>
</html>
