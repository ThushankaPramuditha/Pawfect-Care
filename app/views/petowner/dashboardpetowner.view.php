<!DOCTYPE html>
<html lang="en">

<head>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">


    <style>
      
      
    
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');
    :root{
    --color-primary:#CF9FFF;
    --color-danger: #FF0060;
    --color-success: #1B9C85;
    --color-warning: #F7D060;
    --color-white: #fff;
    --color-info-dark: #7d8da1;
    --color-dark: #363949;
    --color-light: #E6E6FA;
    --color-dark-variant: #677483;
    --color-background: #f6f6f9;

    --card-border-radius: 2rem;
    --border-radius-1: 0.4rem;
    --border-radius-2: 1.2rem;

    --card-padding: 1.8rem;
    --padding-1: 1.2rem;

    --box-shadow: 0 2rem 3rem var(--color-light);
}


    *{
        margin: 0;
        padding: 0;
        outline: 0;
        appearance: 0;
        border: 0;
        text-decoration: none;
        box-sizing: border-box;
        
    }

    html{
        font-size: 14px;
    }

    body{
        width: 100vw;
        height: 100vh;
        font-family: 'Poppins', sans-serif;
        font-size: 0.88rem;
        user-select: none;
        overflow-x: hidden;
        color: var(--color-dark);
        background-color: var(--color-background);
    }

    a{
        color: var(--color-dark);
    }

    img{
        display: block;
        width: 100%;
        object-fit: cover;
    }

    h1{
        font-weight: 800;
        font-size: 1.8rem;
    }

    h2{
        font-weight: 600;
        font-size: 1.4rem;
    }

    h3{
        font-weight: 500;
        font-size: 0.87rem;
    }

    small{
        font-size: 0.76rem;
    }

    p{
        color: var(--color-dark-variant);
    }

    b{
        color: var(--color-dark);
    }

    .text-muted{
        color: var(--color-info-dark);
    }

    .primary{
        color: var(--color-primary);
    }

    .danger{
        color: var(--color-danger);
    }

    .success{
        color: var(--color-success);
    }

    .warning{
        color: var(--color-warning);
    }


    .pet {
        /* background-color: white;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 6px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        margin: 20px 0;
        transition: transform 0.3s;
        color: white;
        font-style: italic;
        text-align: center;
        backdrop-filter: blur(5px); 
        transition: transform 0.8s;
        transform-style: preserve-3d;
        width: 400px; */
        background-color: var(--color-white);
        padding: var(--card-padding);
        border-radius: var(--card-border-radius);
        margin-top: 1rem;
        box-shadow: var(--box-shadow);
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
        gap: 1.4rem;
        cursor: pointer;
        transition: all 0.6s ease;
        width:450px;
        font-size: 1.2rem;
           
    }

    .pet:hover {
      transform: scale(1.01);
      transition: all 0.6s ease;
    }



     .pet img {
         width: 100px;
         height: 100px;
         object-fit: cover;
         border-radius: 20px; 
         padding-left:10px;
         padding-top:10px;
        }

        .pet-content {
            padding: 15px;
            text-align: center;
            font-size: 10px;
            font-weight:bold;
            margin-left:30px;
        }

        h2 {
            font-size: 1.5em;
            margin-bottom: 5px;
        }

        p {
            margin: 5px 0;
            color: #555;
        }

        button {
            background-color: #9b59b6; /* Light purple */
            border: none;
            color: white;
            padding: 8px 10px;
            margin: 20px 0;
            text-align: center; /* Center-align the button */
            text-decoration: none;
            display: inline-block;
            font-size: 15px;
            border-radius: 8px;
            font-weight: bold;
            margin-right:15px;
        }
        button:hover {
            background-color: #8e44ad; /* Darker shade of purple on hover */
            transform: scale(1.02);
            cursor: pointer;
        }
        button a {
            color: white;
            text-decoration: none;
        }
/* 
        .vaccination-list {
            display: flex;
            flex-direction: column;
            margin-top: 50px;
            margin-bottom: 50px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
            cursor: pointer;
            padding-top: 20px;
            padding-right:20px;
            width:300px;
        }

        .appointment-list {
            display: flex;
            flex-direction: column;
            margin-top: 50px;
            margin-bottom: 50px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
            cursor: pointer;
            padding-top: 20px;
            width:300px;

        }

        .daycare-list {
            display: flex;
            flex-direction: column;
            margin-top: 50px;
            margin-bottom: 50px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
            cursor: pointer;
            padding-top: 20px;
            padding-right:20px;
            width:300px;
           
        }

        .vaccination-list h2 {
            text-align: center;
        }

        .appointment-list h2 {
            text-align: center;
        }

        .daycare-list h2 {
            text-align: center;
        }
        .vaccination-list,
        .appointment-list,
        .daycare-list {
            display: flex;
            flex-direction: column;
            margin-top: 50px;
            margin-bottom: 50px;
            margin-right:10px;
            background-color: #ffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
            cursor: pointer;
            padding-top: 20px;
            padding-right: 20px;
            width: 300px;
            max-height: 200px;
            overflow-y: auto;
            margin-bottom: 20px;
        }

        .vaccination-list h2,
        .appointment-list h2,
        .daycare-list h2 {
            text-align: center;
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .vaccination,
        .appointment,
        .daycare {
            padding: 15px;
            background-color: #f6f6f9;
            margin-bottom: 10px;
            margin-left:10px;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
        }

        .vaccination::before,
        .appointment::before,
        .daycare::before {
            content: '\f48a'; 
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            font-size: 24px;
            color: #555;
            position: absolute;
            top: 15px;
            left: 15px;
        }

        .vaccination p,
        .appointment p,
        .daycare p {
            margin: 5px 0;
            color: #555;
        }

        .vaccination:hover,
        .appointment:hover,
        .daycare:hover {
            transform: scale(1.02);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
         */

        .booking {
            background-color: black;
            border: none;
            color: white;
            padding: 10px 10px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 12px;
            border-radius: 5px;
            margin-top: 20px;
            margin-right: 5px;
            width: 300px;

        }

       


    .notification{
        background-color: var(--color-white);
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 0.7rem;
        padding: 1.4rem var(--card-padding);
        border-radius: var(--border-radius-2);
        box-shadow: var(--box-shadow);
        cursor: pointer;
        transition: all 0.3s ease;
        width:350px;
    }

    .notification:hover{
        box-shadow: none;
    }

    .notification .content{
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 0;
        width: 100%;
    }

    .notification .icon{
        padding: 0.6rem;
        color: var(--color-white);
        background-color:plum;
        border-radius: 20%;
        display: flex;
    }

    .notification.deactive .icon{
        background-color: var(--color-danger);
    }
            
     

    </style>

   
</head>
   
<body>
   <div style="padding-top:20px;">
   <?php include '../app/views/navbar.php';?>
   </div> 

   
    <div class="container" style="display:flex; flex-direction:row;">
        <div class="new-users" style="display:flex; width:70%; margin-left:100px; margin-top:80px;">
            <div class="user-list" style="display:flex; flex-direction:row; gap:3rem;">
                <?php
                // Assume you have a database connection established
                $pdo = new PDO("mysql:host=localhost;dbname=pawfect-care", "root", "");

                $query = "SELECT * FROM petdetails";
                $statement = $pdo->prepare($query);
                $statement->execute();
                $petdetails = $statement->fetchAll(PDO::FETCH_ASSOC);

                foreach ($petdetails as $pet) {
                ?>   
                     
                 <div class="pet" style="display:flex; flex-direction:column; margin-top:10px; margin-bottom:1px;" id="pet_<?php echo $pet['id']; ?>">
                     <div style="display:flex; flex-direction:row; justify-content:space-between; ">
                        <h2><?php echo $pet['pet_name']; ?></h2>
                        <button><a href="<?php echo ROOT ?>/petowner/editpetdetails/<?php echo $pet['id']; ?>">Edit Details</a></button>
                      </div>
                    <div style="display:flex; flex-direction:row;">    
                       <div class="pet-image">
                        <img src="<?= ROOT ?>/assets/images/<?php echo $pet['petimage']; ?>" alt="<?php echo $pet['pet_name']; ?> Image">
                        </div> 
                        <div class="pet-content" style="text-align:left;">
                            <p>Id: <?php echo $pet['pet_id']; ?></p>
                            <p>Breed: <?php echo $pet['breed']; ?></p>
                            <p>Date of Birth: <?php echo $pet['dob']; ?></p>
                            <p>Gender: <?php echo $pet['gender']; ?></p>
                            <p>Weight: <?php echo $pet['weight']; ?></p>
                        </div>
                    </div>
                      <div style="display:flex; flex-direction:row; justify-content:space-between; margin-left:10px;">
                        <button><a href="<?php echo ROOT ?>/petowner/petmedicalhistory/<?php echo $pet['pet_id']; ?>">Medical History</a></button>
                        <button><a href="<?php echo ROOT ?>/petowner/petvaccinationhistory/<?php echo $pet['pet_id']; ?>">Vaccination History</a></button>
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
      


        <div class="announcement" style="display:flex; flex-direction:column; margin-top:100px;">
            

            <div class="notification" >
                    <div class="icon">
                        <span class="material-icons-sharp">
                            volume_up
                        </span>
                    </div>
                    <div class="content">
                        <div class="info">
                            <p style="font-size:15px;font-weight:bold;">Appointment at 16.00 pm </p>
                            <small class="text_muted">
                            </small>
                        </div>
                        <span class="material-icons-sharp">
                            more_vert
                        </span>
                    </div>
              </div>

              <div class="notification" >
                    <div class="icon">
                        <span class="material-icons-sharp">
                            volume_up
                        </span>
                    </div>
                    <div class="content">
                        <div class="info">
                        <p style="font-size:15px;font-weight:bold;">vaccination date 23/02/2024</p>
                            <small class="text_muted">
                            </small>
                        </div>
                        <span class="material-icons-sharp">
                            more_vert
                        </span>
                    </div>
              </div>


            <div class="notification" >
                    <div class="icon">
                        <span class="material-icons-sharp">
                            volume_up
                        </span>
                    </div>
                    <div class="content">
                        <div class="info">
                        <p style="font-size:15px;font-weight:bold;">daycare appointment at 22/02/2024 at 15.00pm</p>
                            <small class="text_muted">
                            </small>
                        </div>
                        <span class="material-icons-sharp">
                            more_vert
                        </span>
                    </div>
 
            </div>

          
       
        </div>
    </div>
</body>
</html>

