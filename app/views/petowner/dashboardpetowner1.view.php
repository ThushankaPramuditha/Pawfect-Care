<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Add your meta tags, title, and styles here -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    
    <title>Dashboard</title>
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

.container{
    display: grid;
    width: 96%;
    margin: 0 auto;
    gap: 1.8rem;
    grid-template-columns: 12rem auto 23rem;
}

main{
    margin-top: 1.4rem;
    margin-left: 100px;
}


main .new-users{
    margin-top: 1.3rem;
}

main .new-users .user-list{
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
    transition: all 0.3s ease;
}

main .new-users .user-list:hover{
    box-shadow: none;
}

main .new-users .user-list .user{
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

main .new-users .user-list .user img{
    width: 5rem;
    height: 5rem;
    margin-bottom: 0.4rem;
    border-radius: 50%;
}

.right-section{
    margin-top: 1.4rem;
}

.right-section .nav{
    display: flex;
    justify-content: end;
    gap: 2rem;
}


.right-section .reminders{
    margin-top: 2rem;
}

.right-section .reminders .header{
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 0.8rem;
}

.right-section .reminders .header span{
    padding: 10px;
    box-shadow: var(--box-shadow);
    background-color: var(--color-white);
    border-radius: 50%;
}

.right-section .reminders .notification{
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
}

.right-section .reminders .notification:hover{
    box-shadow: none;
}

.right-section .reminders .notification .content{
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 0;
    width: 100%;
}

.right-section .reminders .notification .icon{
    padding: 0.6rem;
    color: var(--color-white);
    background-color: var(--color-success);
    border-radius: 20%;
    display: flex;
}

.right-section .reminders .notification.deactive .icon{
    background-color: var(--color-danger);
}

.right-section .reminders .add-reminder{
    background-color: var(--color-white);
    border: 2px dashed var(--color-primary);
    color: var(--color-primary);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
}

.right-section .reminders .add-reminder:hover{
    background-color: var(--color-primary);
    color: white;
}

.right-section .reminders .add-reminder div{
    display: flex;
    align-items: center;
    gap: 0.6rem;
}

@media screen and (max-width: 1200px) {
    .container{
        width: 95%;
        grid-template-columns: 7rem auto 23rem;
    }

}

@media screen and (max-width: 768px) {
    .container{
        width: 100%;
        grid-template-columns: 1fr;
        padding: 0 var(--padding-1);
    }


    @keyframes showMenu {
       to{
        left: 0;
       } 
    }

    main{
        margin-top: 8rem;
        padding: 0 1rem;
    }

    main .new-users .user-list .user{
        flex-basis: 35%;
    }


    .right-section{
        width: 94%;
        margin: 0 auto 4rem;
    }

    .right-section .nav{
        position: fixed;
        top: 0;
        left: 0;
        align-items: center;
        background-color: var(--color-white);
        padding: 0 var(--padding-1);
        height: 4.6rem;
        width: 100%;
        z-index: 2;
        box-shadow: 0 1rem 1rem var(--color-light);
        margin: 0;
    }

    .right-section .profile .info{
        display: none;
    }

    .right-section .nav button{
        display: inline-block;
        background-color: transparent;
        cursor: pointer;
        color: var(--color-dark);
        position: absolute;
        left: 1rem;
    }

    .right-section .nav button span{
        font-size: 2rem;
    }

}
        </style>
</head>

<body>

    <div class="container">
        <!-- Main Content -->
        <main>
            <!-- New Users Section -->
            <div class="new-users">
                <h2>Pets</h2>
                <div class="user-list">
                    <!-- PHP loop for pet details -->
     
                    <?php
                        $pdo = new PDO("mysql:host=localhost;dbname=pawfect-care", "root", "");

                        $query = "SELECT * FROM petdetails";
                        $statement = $pdo->prepare($query);
                        $statement->execute();
                        $veterinarians = $statement->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($petdetails as $pet) {
                    ?>
                        <div class="pet" style="display: flex; flex-direction: column; margin-top: 10px; margin-bottom: 1px;" id="pet_<?php echo $pet['id']; ?>">
                            <div style="display: flex; flex-direction: row; justify-content: space-between;">
                                <h2><?php echo $pet['pet_name']; ?></h2>
                                <button><a href="<?php echo ROOT ?>/petowner/editpetdetails/<?php echo $pet['id']; ?>">Edit Details</a></button>
                            </div>
                            <div style="display: flex; flex-direction: row;">
                                <div class="pet-image">
                                    <img src="<?= ROOT ?>/assets/images/<?php echo $pet['petimage']; ?>" alt="<?php echo $pet['pet_name']; ?> Image">
                                </div>
                                <div class="pet-content" style="text-align: left;">
                                    <p>Id: <?php echo $pet['pet_id']; ?></p>
                                    <p>Breed: <?php echo $pet['breed']; ?></p>
                                    <p>Date of Birth: <?php echo $pet['dob']; ?></p>
                                    <p>Gender: <?php echo $pet['gender']; ?></p>
                                    <p>Weight: <?php echo $pet['weight']; ?></p>
                                </div>
                            </div>
                            <div style="display: flex; flex-direction: row; justify-content: space-between; margin-left: 10px;">
                                <button><a href="<?php echo ROOT ?>/petowner/petmedicalhistory/<?php echo $pet['pet_id']; ?>">Medical History</a></button>
                                <button><a href="<?php echo ROOT ?>/petowner/petvaccinationhistory/<?php echo $pet['pet_id']; ?>">Vaccination History</a></button>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </main>

        <!-- Right Section -->
        <div class="right-section">
            <div class="nav">
                <button id="menu-btn">
                    <span class="material-icons-sharp">
                        menu
                    </span>
                </button>
            </div>

            <div class="reminders">
                <!-- Notification Section -->
                <div class="header">
                    <h2>Notifications</h2>
                    <span class="material-icons-sharp">
                        notifications_none
                    </span>
                </div>

                <div class="notification">
                    <!-- Notification Content -->
                </div>

                <div class="notification deactive">
                    <!-- Another Notification Content -->
                </div>
            </div>
        </div>

        <!-- JavaScript script tag for handling menu toggle -->
        <script>
            const sideMenu = document.querySelector('aside');
            const menuBtn = document.getElementById('menu-btn');
            const closeBtn = document.getElementById('close-btn');

            menuBtn.addEventListener('click', () => {
                sideMenu.style.display = 'block';
            });

            closeBtn.addEventListener('click', () => {
                sideMenu.style.display = 'none';
            });
        </script>
    </div>

</body>

</html>
