<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/tables.css">
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Staff ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Contact No.</th>
                <th>NIC</th>
                <th>Email</th>
                <th>License Number</th>
                <th class="edit-action-buttons"></th>
                <th class="deactivate-action-buttons"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>12345</td>
                <td>John Doe</td>
                <td>123 Elm St</td>
                <td>123-456-7890</td>
                <td>AB123456C</td>
                <td>johndoe@example.com</td>
                <td>DR123456</td>
                <td class="edit-action-buttons">
                <a href = "<?php echo $_SESSION['updatepath'] ?>"><button class="edit-icon"></button></a>
                </td>
                <td class="deactivate-action-buttons">
                    <button class="deactivate-button">Deactivate</button>
                </td>
            </tr>
            <tr>
                <td>67890</td>
                <td>Jane Smith</td>
                <td>456 Oak St</td>
                <td>987-654-3210</td>
                <td>XY987654Z</td>
                <td>janesmith@example.com</td>
                <td>DR678901</td>
                <td class="edit-action-buttons">
                <a href = "<?php echo $_SESSION['updatepath'] ?>"><button class="edit-icon"></button></a>
                </td>
                <td class="deactivate-action-buttons">
                    <button class="deactivate-button">Deactivate</button>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>
