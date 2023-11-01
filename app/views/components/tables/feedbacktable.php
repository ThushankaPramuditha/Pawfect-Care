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
                <th>Feedback</th>
                <th>Answer</th>
                <th>Post</th>
                <th class="edit-action-buttons">Edit</th>
                <th class="delete-action-buttons">Delete</th>
            </tr>
        </thead>
        <tbody>
         
            <tr>
                <td>Good Service</td>
                <td>Thank you very much.</td>
                <td><button class="t-button">Post</button></td>
                <td class="edit-action-buttons">
                <a href = "<?php echo $_SESSION['updatepath'] ?>"><button class="edit-icon"></button></a>                </td>
                <td class="delete-action-buttons">
                    <button class="delete-icon"></button>
                </td>
            </tr>
        
        </tbody>
    </table>
</body>
</html>
