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
            background-color: #6a3879; /* or any light purple color you prefer */
        }
    </style>
</head>
<body>
<?php

// Get today's date
$today = date('Y-m-d');

// Filter bookings for today
$bookingsToday = [];
foreach ($daycarebooking as $booking) {
    if ($booking->date == $today) {
        $bookingsToday[] = $booking;
    }
}

// Sort bookings by ID
usort($bookingsToday, function($a, $b) {
    return $a->id - $b->id;
});

$bookingsByDate = [];
foreach ($bookingsToday as $booking) {
    $bookingsByDate[$booking->date][] = $booking;
}

// Render tables for each date
foreach ($bookingsByDate as $date => $bookings): ?>
    <p style="font-size: 30px;  font-family: Arial;">
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
                    <button class="slot-button" onclick="bookSlots(<?= $booking->id ?> )">Book Slot</button>
                    <button class="slot-button" onclick="cancelBooking(<?= $booking->id ?> )">Cancel Booking</button>

                    </td>
                </tr> 
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endforeach; ?>




<script>
   async function bookSlots(id) {
       await fetch(`<?php echo ROOT?>/daycarebooking/bookSlots/${id}`)
       window.location.reload();    
   }

    async function cancelBooking(id) {
         await fetch(`<?php echo ROOT?>/daycarebooking/cancelBooking/${id}`)
         window.location.reload();    
    }

</script>
</body>
</html>


