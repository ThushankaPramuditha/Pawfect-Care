

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
        .search-bar {
        width:40%;
        font-size: 16px;
        background: #f1f1f1;
        border: 1px solid #ccc;
        margin:20px;
        border-radius: 5px; 
        display: flex; 
        overflow: hidden; 
        }
        .search-bar input[type="text"]{
            width:auto; 
            font-size: 16px;
            border: none; /* Remove input border */
            padding: 10px; /* Increase padding */
            flex: 1; /* Input takes remaining space */
        }
        .search-button {
            font-size: 16px;
            background: #6a3879; /* Blue background color */
            border: none; /* Remove button border */
            border-radius: 5px;
            margin: 2px;
            color: white; /* White text color */
            padding: 10px 15px; /* Adjust padding */
            cursor: pointer; /* Add cursor pointer */
            width: fit-content;

        }

    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <h2 style="text-align:center; color:black; padding-top:20px; font-size:60px; font-weight:bold; font-family:'Poppins', sans-serif">Vaccination History</h2>
    <div class="container">
    <?php if (!empty($vaccinationhistory)): ?>
            <?php $petId = $vaccinationhistory[0]->pet_id; ?>
            <script>var petId = <?= json_encode($petId); ?>;</script>
        <?php endif; ?>

    <div class="search-bar">
        <input type="text" id="search" placeholder="Search by vaccine name ,serial number or veterinarian ...">
        <button class="search-button" >Search</button>
    </div>
    <?php include '../app/views/components/tables/vaccinationhistorytable.php'; ?> 

        <script>
           $(document).ready(function(){
            $('#search').on('keyup', function(){
                var searchTerm = $(this).val();
                
                $.ajax({
                    url: "<?php echo ROOT ?>/Petowner/VaccinationHistory/search",
                    type: "POST",
                    data: {
                        search: searchTerm, 
                        petId: petId  
                    },
                    success: function(data) {
                        $('tbody').html(data);
                    }
                });
            });
        }); 
        </script>
</body>
</html>
