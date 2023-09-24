<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Example</title>
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/tables.css">
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Question</th>
                <th>Answer</th>
                <th>Send</th>
                <th>Post</th>
                <th class="edit-action-buttons">Edit</th>
                <th class="delete-action-buttons">Delete</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example data rows -->
            <tr>
                <td>What time are you open on Friday?</td>
                <td>8:00 am to 9:00 pm</td>
                <td><button class="t-button">Send</button></td>
                <td><button class="t-button">Post</button></td>
                <td class="edit-action-buttons">
                    <button class="edit-icon"></button>
                </td>
                <td class="delete-action-buttons">
                    <button class="delete-icon"></button>
                </td>
            </tr>
            <!-- Add more rows as needed -->
        </tbody>
    </table>
</body>
</html>
