

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pawfect Care - Home</title>
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/tables.css">
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/panelheader.css">



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
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        
        

    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <h2 style="text-align:center; color:#333; padding:20px; font-size:50px; font-weight:bold; font-family:'Poppins', sans-serif">Appointment History</h2>
    <div class="container">
    
        <div class = "table-container">
<table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Appointment ID</th>
                <th>Patient No</th>
                <th>Veterinarian</th>
                
            </tr>
        </thead>

        <tbody>

            <?php if (is_array($appointmenthistory) && !empty($appointmenthistory)): ?>
                <?php foreach ($appointmenthistory as $history): ?>
                    <tr >
                        <td><?= htmlspecialchars($history->date); ?></td>
                        <td><?= htmlspecialchars($history->app_id); ?></td>
                        <td><?= htmlspecialchars($history->patient_no); ?></td>
                        <td><?= htmlspecialchars($history->vet_name); ?></td>
                       
                    </tr>
                    
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="20">No history found.</td>
                </tr>
            <?php endif; ?>

        </tbody>
    </table>

</body>
</html>
