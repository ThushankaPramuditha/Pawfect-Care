<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans+Condensed:300,400,600i&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            background-color: #f4f4f4;
            background-size: 600% 100%;
            animation: gradientAnimation 10s infinite;
            display: flex;
            flex-direction: row;
        }

        .infocardContainer * {
        font-family: 'Fira Sans Condensed', sans-serif;
        font-weight: 300;
        }
        h2 {
        font-weight: 600; font-style: italic; font-family: "Fira Sans Condensed", sans-serif;
        }

        a {
        text-decoration: none;
        }
        a:visited {
        color: #555566;
        }
        a:hover {
        text-decoration: underline;
        }
        .infocardContainer {
        display: flex;
        height: 200px;
        width: 200px;
        border-radius: 100px;
        background: rgb(0,159,255);
        background: linear-gradient(121deg, rgba(255,255,255,0) 13%, rgba(0,159,255,1) 100%);
        transition: all 500ms ease-in;
        transition-delay: 1s;
        margin: auto;
        margin-top: 100px;
        --margin-top: 100px;
        }
        .infocardContainer:hover {
        width: 500px;
        border-radius: 100px 10px 100px 100px;
        transition: all 1s ease-out;
        }

        .infocardContainer div {
        text-color: white;
        flex-shrink: 1;
        width: 100%;
        --background-color: green;
        }
        .infocardContainer div * {
        display: flex;
        --flex: inherit;
        overflow: hidden;
        text-overflow: hidden;
        --background-color: yellow;
        color: white;
        white-space: nowrap;
        width: 0;
        height: auto;
        transition: all 450ms ease-in;
        transition-delay: 1s;
        }
        .infocardContainer:hover div *{
        --background-color: purple;
        display: flex;
        visibility: visible;
        transition: all 1s ease-out;
        transition-delay: 500ms;
        width: 100%;
        height: auto;
        }

        .infocardContainer #main, .infocardContainer #main img{
        --background-color: red;
        height: 200px;
        width: 200px;
        padding-right: 10px;
        border-radius: 100%;
        flex-shrink: 0;
        object-fit: cover;
        }
        .infocardContainer #main img{
        height: 180px;
        width: 180px;
        transition: none;
        display: float;
        position: relative;
        border: 10px solid white;
        margin: 0 0 0 0; padding: 0 0 0 0;
        }
        .infocardContainer #textbois {
        position: relative;
        }
        .infocardContainer #textbois #hotlinks {
        max-width: 60%;
        max-height: 30px;
        
        --background-color: white;
        position:absolute;
        bottom: 5px;
        display: flex;
        justify-content: space-between;
        border-radius: 13px;
        }
        .infocardContainer #textbois #hotlinks * {
        background-color: white;
        max-width: 30px;
        --margin: 0 1px 0 1px;
        border-radius: 25px;
        }
        /*TODO: animate copy main transition style for info*/
        .infocardContainer #textbois #hotlinks *:hover {
        
  
}
    </style>
</head>

<body>
    <div class="container" style="display:flex; flex-direction:row;">
        <div class="new-users" style="display:flex; width:70%; margin-left:100px;">
            <div class="user-list" style="display:flex; flex-direction:column; ">
                <?php
                // Assume you have a database connection established
                $pdo = new PDO("mysql:host=localhost;dbname=pawfect-care", "root", "");

                $query = "SELECT * FROM petdetails";
                $statement = $pdo->prepare($query);
                $statement->execute();
                $petdetails = $statement->fetchAll(PDO::FETCH_ASSOC);

                foreach ($petdetails as $pet) {
                ?>
                    <div class="infocardContainer" id="pet_<?php echo $pet['id']; ?>">
                    <div class="main">
                         <img src="<?= ROOT ?>/assets/images/<?php echo $pet['petimage']; ?>" alt="<?php echo $pet['pet_name']; ?> Image">
                    </div>
                  
                        <div style="display:flex; flex-direction:row; justify-content:space-between; ">
                            <!-- <h2><?php echo $pet['pet_name']; ?></h2> -->
                            <!-- <button><a href="<?php echo ROOT ?>/petowner/editpetdetails/<?php echo $pet['id']; ?>">Edit Details</a></button> -->
                        </div>
                        <div style="display:flex; flex-direction:row;">
                      
                            <div class="textbois">
                                <p>Id: <?php echo $pet['pet_id']; ?></p><br>
                                <p>Breed: <?php echo $pet['breed']; ?></p><br>
                                <p>Date of Birth: <?php echo $pet['dob']; ?></p><br>
                                <p>Gender: <?php echo $pet['gender']; ?></p><br>
                                <p>Weight: <?php echo $pet['weight']; ?></p><br>
                            </div>
                        </div>
                        <div style="display:flex; flex-direction:row; justify-content:space-between; margin-left:10px;">
                            <!-- <button><a href="<?php echo ROOT ?>/petowner/petmedicalhistory/<?php echo $pet['pet_id']; ?>">Medical History</a></button> -->
                            <!-- <button><a href="<?php echo ROOT ?>/petowner/petvaccinationhistory/<?php echo $pet['pet_id']; ?>">Vaccination History</a></button> -->
                        </div>
                    </div>
                <?php
                }
                ?>
                <div class="new-users" style="display:flex; flex-direction:column;">
                    <!-- <button style="width:250px; margin-left:35px; margin-top:-200px;"><a href="<?php echo ROOT ?>/petowner/addpet">Add a Pet</a></button> -->
                </div>
            </div>
        </div>

        <div class="announcement" style="display:flex; flex-direction:column;  margin-left:600px;">
            <div class="vaccination-list">
                <h2>Upcoming Vaccinations</h2>
                <div class="vaccination">
                    <p>Vaccination 1</p>
                    <p>Date: 2021-10-10</p>
                </div>
                <div class="vaccination">
                    <p>Vaccination 2</p>
                    <p>Date: 2021-11-10</p>
                </div>
                <button style="width:250px; margin-left:35px;">View More</a></button>
            </div>

            <div class="appointment-list">
                <h2>Upcoming Appointments</h2>
                <div class="appointment">
                    <p>Appointment 1</p>
                    <p>Date: 2021-10-10</p>
                </div>
                <div class="appointment">
                    <p>Appointment 2</p>
                    <p>Date: 2021-11-10</p>
                </div>
                <button style="width:250px; margin-left:35px;"><a href="<?php echo ROOT ?>/petowner/appointment">Book an Appointment</a></button>
            </div>

            <div class="daycare-list">
                <h2>Upcoming Daycare</h2>
                <div class="daycare">
                    <p>Daycare 1</p>
                    <p>Date: 2021-10-10</p>
                </div>
                <div class="daycare">
                    <p>Daycare 2</p>
                    <p>Date: 2021-11-10</p>
                </div>
                <button style="width:250px; margin-left:35px;"><a href="<?php echo ROOT ?>/petowner/daycare">Book a Slot</a></button>
            </div>
        </div>
    </div>
</body>

</html>
