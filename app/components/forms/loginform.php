<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="<?php ROOT?>assets/css/forms.css">
</head>
<body>
    <div class = "form-container"> 
            <form id="log-in-form">
            <h1>Log In</h1> 
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required><br>

                <div class = "flex-container">
                    <button type="submit" id="log-in-button" onclick="logIn()">Log In</button>
                </div>
            </form>   
        
    </div>
    


    <script src="loginform.js"></script>
</body>
</html>