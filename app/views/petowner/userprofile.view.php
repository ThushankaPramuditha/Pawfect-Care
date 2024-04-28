<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pawfect Care - Home</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,900;1,400;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/tables.css">
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/panelheader.css">

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>


    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f4f4f4;
            padding: 0 !important;

        }

        

        .button-container {
            margin: 0 auto;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        button{
            background-color: #6a387944;
            border:none;
            width: 100%;
            color:#6a3879;
            border-radius: 5px;
            padding: 10px 20px;
            margin:10px !important;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #6a3879;
            color: #fff;
        }

        button:active {
            background-color: #6a3879;
            color: #fff;
        }
        

    </style>
</head>
<body>
<?php include 'navbar.php'; ?>
<div class= "modal-content" style="display:flex; flex-direction:row; margin-top:80px;">

    <div class = "button-container" style=" padding: 10px; display:flex; flex-direction: column; width: 40% ">
        <button id="my-profile">My Profile</button>
        <button id="edit-profile">Edit Profile</button>
        <button id="change-password">Change Password</button>
    </div>

    <div class="dynamic-content" style="display:flex; justify-content:flex-start; margin-left: 20px; padding: 10px; width:60%" id="content-area">
        <!-- Dynamic content will be loaded here -->
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script>
        //sweeetalert for validation SUCCESS and ERROR
        window.onload = function() {
                <?php if (isset($_SESSION['flash'])): ?>
                    const flash = <?php echo json_encode($_SESSION['flash']); ?>;
    
                    if (flash.success) {
                        Swal.fire('Success', flash.success, 'success');
                    } else if (flash.error) {
                        Swal.fire('Error', flash.error, 'error');
                    }
                    <?php unset($_SESSION['flash']); ?>
                <?php endif; ?>
            };
        $(document).ready(function() {
            // Load the default view
            loadProfile();

            // Event binding
            $('#my-profile').click(function() {
                loadProfile();
            });

            $('#edit-profile').click(function() {
                loadEditProfile();
            });

            $('#change-password').click(function() {
                loadChangePassword();
            });
        });

        function loadProfile() {
            $.get("<?php echo ROOT?>/petowner/userprofile/fetchProfile", function(data) {
                $('#content-area').html(data);
            });
        }

        function loadEditProfile() {
            $.get("<?php echo ROOT?>/petowner/userprofile/fetchEditProfile", function(data) {
                $('#content-area').html(data);
            });
        }

        function loadChangePassword() {
            $.get("<?php echo ROOT?>/petowner/userprofile/fetchChangePassword", function(data) {
                $('#content-area').html(data);
            });
        }
        
        </script>
    
    
    
</body>
</html>
