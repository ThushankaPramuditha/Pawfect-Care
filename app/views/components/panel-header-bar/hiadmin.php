

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <style>
        /* Header styles */
        .sticky-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #f9f9f9;
            color: white;
            padding: 20px 0; /* Removed the left and right padding */
            position: fixed;
            top: 0;
            left: 0; /* Aligns the header to the left edge of the viewport */
            right: 0; /* Aligns the header to the right edge of the viewport */
            z-index: 1000;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); /* Adds shadow for a lifted effect */
            box-sizing: border-box; /* Include padding in width calculation */
        }

        

        .greet-user {
            display: flex;
            align-items: start;
            justify-content: right;
            flex-direction: column;
            padding: 10px 30px; /* Add padding to the greeting user instead of the header */

        }

        .user-name {
            font-size: 1.2rem;
            font-weight: bold;
            color: #333; /* A richer color for the name for emphasis */
        }

        .user-type {
            display: block;
            font-size: 0.8rem;
            color: #666;
        }

        /* Logo styles */
        .sticky-header .image img {
            height: 30px; /* Small logo height */
            width: auto; /* Maintain aspect ratio */
            padding: 10px 30px; /* Add padding to the logo instead of the header */
        }

        /* Optional: Add a little padding to the top and bottom of the header */
        .sticky-header {
            padding-top: 8px;
            padding-bottom: 8px;
        }

        /* Optional: Make text unselectable for better UX */
        .greet-user, .center-image {
            -webkit-user-select: none; /* Chrome/Safari */
            -moz-user-select: none; /* Firefox */
            -ms-user-select: none; /* IE10+ */
            user-select: none; /* Standard */
        }

    </style>
</head>
<body>
    <header class="sticky-header">
        <div class="image">
            <img src="<?php echo ROOT?>/assets/images/logocolor.png" alt="Logo">
        </div>
        <div class="greet-user">
             <span class="user-name">Hi, Admin</span>
        </div>
        
    </header>
</body>
</html>






