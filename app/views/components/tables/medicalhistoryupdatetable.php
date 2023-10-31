<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo ROOT?>assets/css/tables.css">
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Pet ID</th>
                <th>Date</th>
                <th>Medical Condition</th>
                <th>Treatment</th>
                <th>Medication</th>
                <th>Remarks</th>
                <th class="edit-action-buttons"></th>
            </tr>
        </thead>
        <tbody>
         
            <tr>
                <td>12345</td>
                <td>24/09/2023</td>
                <td>Fever and Cold</td>
                <td>Check temperature and gave medication</td>
                <td>Paracetamol, antibiotic, anti cold</td>
                <td>Need to check again after 2 days</td>
                <td class="edit-action-buttons">
                    <button class="edit-icon"></button>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>
