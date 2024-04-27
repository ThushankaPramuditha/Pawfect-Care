<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">

        <?php $activePage = 'dashboardambulancedriver';?>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/panelheader.css">


    
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

#map { height: 350px; width:300px;}

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
           <div class="analyse" style="margin-top:50px;">
                <div class="sales">
                    <div class="status">
                        <div class="info" >
                            <p style="font-size:20px; text-align:center; font-weight:bolder;">Transport Bookings</p>
                                <p style="font-size:20px; text-align:center; font-weight:bolder;"><?php echo $todaybookings; ?></p>
                        </div>
                    </div>
                </div>
    
            </div> 
            <!-- End of Analyses -->

             <!-- New Users Section  -->
            <div class="new-users">
            <h2>Recent Bookings</h2>
            <div class="user-list" style="display: flex; flex-direction: column;">
            <div class="user" style="align-items: center; display: flex; justify-content: center;">
                <img src="<?= ROOT ?>/assets/images/petowner.png" alt="Taxi Image">
                <h3><?php echo $recentbookings->pet_owner_name ?></h3>
                <p><?php echo $recentbookings->pet_owner_contact ?></p>
                <p><?php echo $recentbookings->date_time ?></p>
                <p><?php echo $recentbookings->pickup_lat . ', ' . $recentbookings->pickup_lng ?></p>
                <!-- Button to accept the bookings -->
            </div>
            <div style="display:flex; flex-direction:row;">
            <div style="margin-left:100px; margin-top:2px;">
                <button style="background-color:rgb(153, 102, 255); padding: 5px; padding-left:10px; padding-right:10px; border-radius: 5px;"><a href="<?= ROOT ?>/ambulancedriver/maproute?pet_id=<?php echo $recentbookings->pet_id ?>&date=<?php echo $recentbookings->date_time ?>">View</a></button>
            </div>
            <div style="align-items: center; display: flex; margin-left:450px;">
                <button class="accept-button" <?php echo $recentbookings->id ?> style="background-color: rgb(153, 102, 255); padding: 5px; border-radius: 5px; width: 50px; cursor:pointer;">Accept</button>
                </div>
            </div>  
           
             </div>
            </div>

            <!-- End of New Users Section -->

            <!-- Recent Orders Section -->
            <div class="recent-orders">
                <h2>Booking Table</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Pet Owner Name</th>
                            <th>Pet Name </th>
                            <th>Date & Time</th>
                         
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ambulancebookings as $ambulance): ?>
                        <tr>
                            <td><?php echo $ambulance->pet_owner_name ?></td>
                            <td><?php echo $ambulance->pet_name ?></td>
                            <td><?php echo $ambulance->date_time ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- End of Recent Orders Section -->	
       

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
            <div  style="display:flex; flex-direction:column; overflow:hidden; height:290px; overflow-y:scroll;" >
            <?php foreach ($transportnotifications as $notification) {?>
                <div class="notification" style="display:flex; flex-direction:column; background-color:#CBC3E3">
                <span class="close" style="margin-left:280px;">&times;</span>
                    <div class="notification-item" style="display:flex; justify-content:center;">
                        <div class="info">
                            <h3>Transport Bookings</h3>
                            <small class="text-muted">New Booking</small>
                            <p>
                                <?php echo $notification->message ?>
                            </p>
                            <div style="margin-left:100px; margin-top:2px;">
                                <button style="background-color:rgb(153, 102, 255); padding: 5px; border-radius: 5px;"><a href="<?= ROOT ?>/ambulancedriver/maproute?pet_id=<?php echo $notification->pet_id ?>&date=<?php echo $notification->date_time ?>">View</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
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

    </div>
   <!-- accept modal-->
   <div class="modal-form" id="accept-modal">
            <div class="modal-content-delete">
                <h1>Accept the Ride</h1>
                <p>Start the Journey</p>
                <div class="flex-container">
                    <button class="reject">Cancel</button>
                    <a id="accept-booking" href=""><button class="d-button">Accept</button></a>
                </div>
            </div>
        </div>
     

<script>

$('body').on('click', '.accept-button', function(){
    var id = <?php echo json_encode($recentbookings->id); ?>;
    console.log(id);
    openAcceptModal(id);
});

var acceptModal = document.getElementById("accept-modal");

 // Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

function openAcceptModal(id) {
            console.log(id);
            acceptModal.style.display = "block";
            document.getElementById("accept-booking").href = `<?php echo ROOT?>/Ambulancedriver/Dashboardambulancedriver/acceptBooking/${id}`;

            span.onclick = function() {
                modal.style.display = "none";
            }
        }


document.querySelectorAll('.accept-button').forEach(function (button) {
            button.addEventListener('click', function () {
                var id = this.parentElement.parentElement.getAttribute('key');
                console.log(id)
                openAcceptModal(id);
            });
        });

var closeButtons = document.querySelectorAll('.close');

var noButtons = document.querySelectorAll('.reject');

        closeButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                acceptModal.style.display = "none";
            });
    });
    noButtons.forEach(function(button) {
            button.addEventListener('click', function() {
               acceptModal.style.display = "none";
            });
        });
      

// JavaScript code
// document.addEventListener('DOMContentLoaded', function () {
//     // Function to open the modal
//     function openAcceptModal(id) {
//         var acceptModal = document.getElementById("accept-modal");
//         acceptModal.style.display = "block";
//         document.getElementById("accept-booking").href = `<?php echo ROOT?>/Ambulancedriver/Dashboardambulancedriver/acceptBooking/${id}`;
//     }

//     // Function to close the modal
//     function closeAcceptModal() {
//         var acceptModal = document.getElementById("accept-modal");
//         acceptModal.style.display = "none";
//     }

//     // Event listeners
//     document.querySelectorAll('.accept-button').forEach(function (button) {
//         button.addEventListener('click', function () {
//             var id = this.getAttribute('data-id');
//             openAcceptModal(id);
//         });
//     });

//     document.querySelectorAll('.close-modal').forEach(function (button) {
//         button.addEventListener('click', function () {
//             closeAcceptModal();
//         });
//     });
// });


    </script>
 </body>
</html>