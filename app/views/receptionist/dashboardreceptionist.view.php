<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
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

main .analyse{
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1.6rem;
}

main .analyse > div{
    background-color: var(--color-white);
    padding: var(--card-padding);
    border-radius: var(--card-border-radius);
    margin-top: 1rem;
    box-shadow: var(--box-shadow);
    cursor: pointer;
    transition: all 0.3s ease;
}

main .analyse > div:hover{
    box-shadow: none;
}

main .analyse > div .status{
    display: flex;
    align-items: center;
    justify-content: space-between;
}

main .analyse h3{
    margin-left: 0.6rem;
    font-size: 1rem;
}

main .analyse .progresss{
    position: relative;
    width: 92px;
    height: 92px;
    border-radius: 50%;
}

main .analyse svg{
    width: 7rem;
    height: 7rem;
}

main .analyse svg circle{
    fill: none;
    stroke-width: 10;
    stroke-linecap: round;
    transform: translate(5px, 5px);
}

main .analyse .sales svg circle{
    stroke: var(--color-success);
    stroke-dashoffset: -30;
    stroke-dasharray: 200;
}

main .analyse .visits svg circle{
    stroke: var(--color-danger);
    stroke-dashoffset: -30;
    stroke-dasharray: 200;
}

main .analyse .searches svg circle{
    stroke: var(--color-primary);
    stroke-dashoffset: -30;
    stroke-dasharray: 200;
}

main .analyse .progresss .percentage{
    position: absolute;
    top: -3px;
    left: -1px;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100%;
    width: 100%;
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

main .recent-orders{
    margin-top: 1.3rem;
}

main .recent-orders h2{
    margin-bottom: 0.8rem;
}

main .recent-orders table{
    background-color: var(--color-white);
    width: 100%;
    padding: var(--card-padding);
    text-align: center;
    box-shadow: var(--box-shadow);
    border-radius: var(--card-border-radius);
    transition: all 0.3s ease;
}    

main .recent-orders table:hover{
    box-shadow: none;
}

main .recent-orders table

main table tbody td{
    height: 2.8rem;
    border-bottom: 1px solid var(--color-light);
    color: var(--color-dark-variant);
}

main table tbody tr:last-child td{
    border: none;
}

main .recent-orders a{
    text-align: center;
    display: block;
    margin: 1rem auto;
    color: var(--color-primary);
}

.right-section{
    margin-top: 1.4rem;
}

.right-section .nav{
    display: flex;
    justify-content: end;
    gap: 2rem;
}

.right-section .nav button{
    display: none;
}


.right-section .nav .profile{
    display: flex;
    gap: 2rem;
    text-align: right;
}

.right-section .nav .profile .profile-photo{
    width: 2.8rem;
    height: 2.8rem;
    border-radius: 50%;
    overflow: hidden;
}

.right-section .user-profile1{
    display: flex;
    justify-content: center;
    text-align: center;
    margin-top: 1rem;
    background-color: var(--color-white);
    padding: var(--card-padding);
    border-radius: var(--card-border-radius);
    box-shadow: var(--box-shadow);
    cursor: pointer;
    transition: all 0.3s ease;
}

.right-section .user-profile:hover{
    box-shadow: none;
}

.right-section .user-profile img{
    width: 11rem;
    height: auto;
    margin-bottom: 0.8rem;
    border-radius: 50%;
}

.right-section .user-profile1  img{
    width: 11rem;
    height: auto;
    margin-bottom: 0.8rem;
    border-radius: 20%;
}
.right-section .user-profile h2{
    margin-bottom: 0.2rem;
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

    aside .logo h2{
        display: none;
    }

    aside .sidebar h3{
        display: none;
    }

    aside .sidebar a{
        width: 5.6rem;
    }

    aside .sidebar a:last-child{
        position: relative;
        margin-top: 1.8rem;
    }

    main .analyse{
        grid-template-columns: 1fr;
        gap: 0;
    }

    main .new-users .user-list .user{
        flex-basis: 40%;
    }

    main .recent-orders {
    width: 94%;
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    margin: 2rem 0 0 0.8rem;
}

main .recent-orders table {
    width: 83vw;
}

main .recent-orders tbody tr:nth-child(even) {
    background-color: #e6f7ff; /* Light blue color for even rows */
}

main .recent-orders tbody tr:nth-child(odd) {
    background-color: #ffffff; /* White color for odd rows */
}

main table thead tr th:last-child,
main table thead tr th:first-child {
    display: none;
}

main table tbody tr td:last-child,
main table tbody tr td:first-child {
    display: none;
}


   
}

@media screen and (max-width: 768px) {
    .container{
        width: 100%;
        grid-template-columns: 1fr;
        padding: 0 var(--padding-1);
    }

    aside{
        position: fixed;
        background-color: var(--color-white);
        width: 15rem;
        z-index: 3;
        box-shadow: 1rem 3rem 4rem var(--color-light);
        height: 100vh;
        left: -100%;
        display: none;
        animation: showMenu 0.4s ease forwards;
    }

    @keyframes showMenu {
       to{
        left: 0;
       } 
    }

    aside .logo{
        margin-left: 1rem;
    }

    aside .logo h2{
        display: inline;
    }

    aside .sidebar h3{
        display: inline;
    }

    aside .sidebar a{
        width: 100%;
        height: 3.4rem;
    }

    aside .sidebar a:last-child{
        position: absolute;
        bottom: 5rem;
    }

    aside .toggle .close{
        display: inline-block;
        cursor: pointer;
    }

    main{
        margin-top: 8rem;
        padding: 0 1rem;
    }

    main .new-users .user-list .user{
        flex-basis: 35%;
    }

    main .recent-orders{
        position: relative;
        margin: 3rem 0 0 0;
        width: 100%;
    }

    main .recent-orders table{
        width: 100%;
        margin: 0;
        background-color: var(--color-white);
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

::-webkit-scrollbar{
    width: 0.6rem;
}

::-webkit-scrollbar-thumb{
    background-color: var(--color-primary);
    border-radius: 1rem;
}

::-webkit-scrollbar-track{
    background-color: var(--color-white);
}

        </style>
          

</head>

<body>
<?php include '../app/views/components/panel-header-bar/hiuser.php'; ?>
    <div class="container">
   
      <div>
      <?php include '../app/views/components/dashboard-compo/daycaresidebar.php'; ?>
        </div>
        <!-- Main Content -->

        <main>
            <!-- <h1>Analytics</h1> -->
            <!-- Analyses -->
            <div class="analyse" style="margin-top:50px;">
                <div class="sales">
                    <div class="status">
                        <div class="info" >
                            <p style="font-size:20px; text-align:center; font-weight:bolder;">Daycare Bookings</p>
                            <?php 
                            
                                $pdo = new PDO("mysql:host=localhost;dbname=pawfect-care", "root", "");
                                $query = "SELECT * FROM daycarebookinguser WHERE drop_off_date = CURDATE()";
                                $statement = $pdo->prepare($query);
                                $statement->execute();
                                $todaybookings = $statement->rowCount();
                                ?>
                                <p style="font-size:20px; text-align:center; font-weight:bolder;"><?php echo $todaybookings; ?></p>

                        </div>
                    </div>
                </div>
          
            
              <!-- filled slots -->
                <div class="sales">
                    <div class="status">
                        <div class="info">
                        <p style="font-size:20px; text-align:center; font-weight:bolder;">Accepted Bookings</p>
                            <?php 
                            //get today accepted bookings
                            $pdo = new PDO("mysql:host=localhost;dbname=pawfect-care", "root", "");
                            $query = "SELECT * FROM daycarebookinguser WHERE status = 'accepted' AND drop_off_date = CURDATE()";
                            $statement = $pdo->prepare($query);
                            $statement->execute();
                            $acceptedbookings = $statement->rowCount();
                            ?>
                            <p style="font-size:20px; text-align:center; font-weight:bolder;"><?php echo $acceptedbookings; ?></p>

                        </div>
                    </div>
                </div>
             

               <!-- free slots -->
                 <div class="sales">
                      <div class="status">
                            <div class="info">
                            <p style="font-size:20px; text-align:center; font-weight:bolder;">Declined Bookings</p>
                                <?php 
                                $pdo = new PDO("mysql:host=localhost;dbname=pawfect-care", "root", "");
                                $query = "SELECT * FROM daycarebookinguser WHERE status = 'declined' AND drop_off_date = CURDATE()";
                                $statement = $pdo->prepare($query);
                                $statement->execute();
                                $declinedbookings = $statement->rowCount();
                                ?>
                                <p style="font-size:20px; text-align:center; font-weight:bolder;"><?php echo $declinedbookings; ?></p>
                            </div>
                      </div>
                 </div>
                </div>
            <!-- End of Analyses -->

            <!-- New Users Section -->
         
    <div style="margin-top:100px; display:flex; flex-direction:row;">
      <div>
        <!-- <canvas id="myDonutChart" width="400" height="350"></canvas>
        <script>
            // Get the canvas element
            var ctx = document.getElementById('myDonutChart').getContext('2d');

            // Define data for the chart
            var data = {
                labels: ['All Bookings', 'Accepted', 'Decliend'],
                datasets: [{
                    label: 'My First Dataset',
 
                    //add the bookings data
                    data : [<?php echo $todaybookings; ?>, <?php echo $acceptedbookings; ?>, <?php echo $declinedbookings; ?>],
                
                    backgroundColor: [
                        //colors like purple , rose and blue
                        'rgb(153, 102, 255)',
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)'
                         
                        
                    ],
                    hoverOffset: 4 // Add space when hovered over a segment
                }]
            };

            // Configure options for the chart
            var options = {
                cutout: 70, // Change this value to adjust the size of the hole in the middle
                responsive: false, // Disable responsiveness for fixed size
            };

            // Create the donut chart
            var myDonutChart = new Chart(ctx, {
                type: 'doughnut',
                data: data,
                options: options
            });
        </script>
          <div style="justify-content:center;">
            <button style="height:40px; display:flex; justify-content:center; align-items:center; background-color:rgb(153, 102, 255); cursor:pointer; color:white; font-weight:bolder; font-size:20px; margin-top:10px; border-radius:5px; padding:10px;">
            <a href="<?=ROOT?>/daycarestaff/daycarebooking">
                <div>
                    <h3>Slots View</h3>
                </div>
            </a>
          </div> -->
          <div class="new-users">
                <h2>Veterinarians</h2>
                <div class="user-list">
                    <?php
                    // Assume you have a database connection established
                    $pdo = new PDO("mysql:host=localhost;dbname=pawfect-care", "root", "");

                    $query = "SELECT * FROM veterinarians";
                    $statement = $pdo->prepare($query);
                    $statement->execute();
                    $veterinarians = $statement->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($veterinarians as $veterinarian) {
                        ?>
                        <div class="user" id="vet_<?php echo $veterinarian['id']; ?>">
                            <img src="<?=ROOT?>/assets/images/petowner.png">
                            <h2><?php echo $veterinarian['name']; ?></h2>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            
            </div>

        </div> 
        <!-- <div style="margin-left:50px;">
        <canvas id="myBarChart" width="300" height="350"></canvas>
        <script>
           
            // Get the canvas element
            var ctx = document.getElementById('myBarChart').getContext('2d');
             //function to get week1, week2, week3, week4 bookings
            
            // Define data for the chart
            var data = {
                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                datasets: [{
                    label: 'Bookings in a Week',
                    data : [10, 20, 30, 40],
                   
                    backgroundColor: [
                        //colors like purple , rose and blue,red
                        'rgb(153, 102, 255)',
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 0, 65)'  
                    ],
                    hoverOffset: 4 // Add space when hovered over a segment
                }]
            };

            // Configure options for the chart
            var options = {
                responsive: false, // Disable responsiveness for fixed size
            };

            // Create the bar chart
            var myBarChart = new Chart(ctx, {
                type: 'bar',
                data: data,
                options: options
            });
        </script>
        </div>
    </div> -->

    
            
        </main>
        <!-- End of Main Content -->

        <!-- Right Section -->
        <div class="right-section">
            <div class="nav">
                <button id="menu-btn">
                    <span class="material-icons-sharp">
                        menu
                    </span>
                </button>
                

                <!-- <div class="profile">
                    <div class="info">
                        <display the name of the daycare staff using session -->
                        <!-- <p style="display:none"><b>Hello</b></p>
                        <p ><b>Daycare Staff</b></p>
                    </div>
                    <div class="profile-photo">
                    <a href="<?php echo ROOT; ?>/daycarestaff/myprofile">
                    <img src="<?=ROOT?>/assets/images/petowner.png">
                    
                    </div>
                </div> --> 

            </div>
            <!-- End of Nav -->

            <div class="user-profile1" style="margin-top:50px;">
                <div class="logo">
                <img src="<?=ROOT?>/assets/images/logocolor.png" alt="Pawfect Care Logo" style="width:200px;">
                    <!-- <h2>PawfectCare</h2> -->
                    <p>Serving Love And Care, The PAWFECT Way!</p>
                </div>
            </div>

            <div class="reminders">
                <div class="header">
                    <h2>Notifications</h2>
                    <span class="material-icons-sharp">
                        notifications_none
                    </span>
                </div>


<div>
    <?php 
    $pdo = new PDO("mysql:host=localhost;dbname=pawfect-care", "root", "");
    $query = "SELECT * FROM daycarebookinguser";
    $statement = $pdo->prepare($query);
    $statement->execute();
    $daycarebookinguser = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    //get the notification count
    $query = "SELECT * FROM daycarebookinguser WHERE status = 'pending'";
    $statement = $pdo->prepare($query);
    $statement->execute();
    $pendingbookings = $statement->rowCount();

    ?>
    <div  style="display:flex; flex-direction:column; overflow:hidden; height:310px; overflow-y:scroll;" >
        <?php foreach ($daycarebookinguser as $daycarebookingnotification) { ?>
         <div class="notification" style="display:flex; flex-direction:column; background-color:#CBC3E3">
            <!-- <div class="icon">
                <span class="material-icons-sharp">
                    volume_up
                </span>
            </div> -->
            <div class="notification-item">
                <div class="info">
                    <h3>Daycare Booking</h3>
                    <small class="text-muted">New Booking</small>
                    <p>
                        <?php echo $daycarebookingnotification['id']; ?> has been booked for daycare on <?php echo $daycarebookingnotification['drop_off_date'];?> at <?php echo $daycarebookingnotification['drop_off_time'] ;?> to <?php echo $daycarebookingnotification['pick_up_time'] ;?> 
                    </p>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
       
        <!-- button to view more bookings path is Daycarebookingform -->
        <div style="height:50px; display:flex; justify-content:center; align-items:center; background-color:rgb(153, 102, 255); cursor:pointer; color:white; font-weight:bolder; font-size:20px; margin-top:10px; border-radius:10px;">
        <a href="<?=ROOT?>/daycarestaff/daycarebookingform">
            <div>
                <span class="material-icons-sharp">
                      arrow_forward
                </span>
                <h3>View</h3>
            </div>
      
        </div>
 </div>
</div>



                <!-- <div class="notification deactive">
                    <div class="icon">
                        <span class="material-icons-sharp">
                           volume_up
                        </span>
                    </div>
                    <div class="content">
                        <div class="info">
                            <h3></h3>
                            <small class="text_muted">
                            </small>
                        </div>
                        <span class="material-icons-sharp">
                            more_vert
                        </span>
                    </div>
                </div> -->

            <!-- <div class="notification add-reminder">
              <div>
                <span class="material-icons-sharp">
                    arrow_forward
                </span>
                <h3>View More</h3>
             </div>
        </div> -->

            </div>

        </div>


    </div>

<script>
const sideMenu = document.querySelector('aside');
const menuBtn = document.getElementById('menu-btn');
const closeBtn = document.getElementById('close-btn');

// const darkMode = document.querySelector('.dark-mode');

menuBtn.addEventListener('click', () => {
    sideMenu.style.display = 'block';
});

closeBtn.addEventListener('click', () => {
    sideMenu.style.display = 'none';
});



</script>    
 </body>
</html>