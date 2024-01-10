<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    
    <title>Dashboard</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');
    :root{
    --color-primary: #6C9BCF;
    --color-danger: #FF0060;
    --color-success: #1B9C85;
    --color-warning: #F7D060;
    --color-white: #fff;
    --color-info-dark: #7d8da1;
    --color-dark: #363949;
    --color-light: rgba(132, 139, 200, 0.18);
    --color-dark-variant: #677483;
    --color-background: #f6f6f9;
    --border-radius-1: 0.4rem;
    --border-radius-2: 1.2rem;
    --padding-1: 1.2rem;

    --box-shadow: 0 2rem 3rem var(--color-light);
}


*{
    margin-top: 0;
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
    width: 230px;
   margin-top: 0px;
   margin-left: 0px;
    gap: 1.8rem;
    grid-template-columns: 14rem auto 23rem;
}

aside{
    height: 100vh;
}

aside .toggle{
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-top: -2.8rem;
}

aside .toggle .logo{
    display: flex;
    gap: 0.5rem;
}

aside .toggle .logo img{
    width: 2rem;
    height: 2rem;
}

aside .toggle .close{
    padding-right: 1rem;
    display: none;
}

aside .sidebar{
    display: flex;
    flex-direction: column;
    background-color: var(--color-white);
    box-shadow: var(--box-shadow);
    border-radius: 15px;
    height: 88vh;
    position: relative;
    top: 1.5rem;
    transition: all 0.3s ease;
}

aside .sidebar:hover{
    box-shadow: none;
}

aside .sidebar a{
    display: flex;
    align-items: center;
    color: var(--color-info-dark);
    height: 3.7rem;
    gap: 1rem;
    position: relative;
    margin-left: 2rem;
    transition: all 0.3s ease;
}

aside .sidebar a span{
    font-size: 1.6rem;
    transition: all 0.3s ease;
}

aside .sidebar a:last-child{
    position: absolute;
    bottom: 2rem;
    width: 100%;
}

aside .sidebar a.active{
    width: 100%;
    color: var(--color-primary);
    background-color: var(--color-light);
    margin-left: 0;
}

aside .sidebar a.active::before{
    content: '';
    width: 6px;
    height: 18px;
    background-color: var(--color-primary);
}

aside .sidebar a.active span{
    color: var(--color-primary);
    margin-left: calc(1rem - 3px);
}

aside .sidebar a:hover{
    color: var(--color-primary);
}

aside .sidebar a:hover span{
    margin-left: 0.6rem;
}

aside .sidebar .message-count{
    background-color: var(--color-danger);
    padding: 2px 6px;
    color: var(--color-white);
    font-size: 11px;
    border-radius: var(--border-radius-1);
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

}
        </style>
                 
    <body>  
          <!-- Sidebar Section -->
          <aside>
            <div class="toggle">
                <div class="logo">
                <img src="<?=ROOT?>/assets/images/doglogo.jpg" alt="">
                    <h2>Pawfect<span class="danger">Care</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
                </div>
            </div>

            <div class="sidebar">
                <a href="#">
                    <span class="material-icons-sharp">
                        dashboard
                    </span>
                    <h3>Dashboard</h3>
                </a>
                <a href="<?php echo ROOT; ?>veterinarian/myprofile">
                    <span class="material-icons-sharp">
                            medical_services
                    </span>
                    <h3>Veterinarians</h3>
                </a>


                <a href="<?php echo ROOT; ?>ambulancedriver/myprofile">
                    <span class="material-icons-sharp">
                        local_hospital
                    </span>
                    <h3>Ambulance Drivers</h3>
                </a>


                <a href="#" class="active">
                    <span class="material-icons-sharp">
                        insights
                    </span>
                    <h3>Analytics</h3>
                </a>
               
                <a href="#">
                    <span class="material-icons-sharp">
                        pets
                    </span>
                    <h3>Pet Details</h3>
                </a>

                <a href="#">
                    <span class="material-icons-sharp">
                        person
                    </span>
                    <h3>Pet Owner Details</h3>
                </a>    

                <a href="<?php echo ROOT; ?>receptionist/appointments">
                    <span class="material-icons-sharp">
                        calendar_today
                    </span>
                    <h3>Appointments</h3>
                </a>

                <a href="#">
                    <span class="material-icons-sharp">
                        help
                    </span>
                    <h3>FAQ</h3>
              </a>


                <a href="#">
                    <span class="material-icons-sharp">
                        logout
                    </span>
                    <h3>Logout</h3>
                </a>
            </div>
         </aside>  
       

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
</body>    
        <!-- End of Sidebar Section -->