<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,900;1,400;1,900&display=swap');a
*{
  margin:0;
  padding:0;
  box-sizing:border-box;
  font-family:'Playfair Display', serif;
}
body{ 
  background:url(https://images.unsplash.com/photo-1639759032532-c7f288e9ef4f?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D); 
  /* background: url(https://images.unsplash.com/photo-1557682250-33bd709cbe85?q=80&w=2029&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D); */
  /* background: url(https://images.unsplash.com/photo-1602498456745-e9503b30470b?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D); */
  /* background: url(https://images.unsplash.com/photo-1543097676-44e5a5bd4ef1?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D); */
  background-size:cover;
  background-position:right;
  background-attachment:fixed;
}
.container{
  width:100vw;
  display:flex;
  justify-content:space-around;
  flex-wrap:wrap;
  padding:40px 20px;
}
.card{
  display:flex;
  flex-direction:column;
  width:300px;
  margin-bottom:60px;
  box-shadow: 0 0 0px rgba(0, 0, 0, 0);
  border-radius: 8px;
  overflow: hidden;
  margin: 20px 0;
  transition: transform 0.3s;
  color:white;
  text-align: center;
}

.card:hover {
  transform: scale(1.02);
 }


.card>div{
  /* box-shadow:0 15px 20px 0 rgba(0,0,0,0.5); */
}
.card-image{
  width:300px;
  height:390px;
}
.card-image>img{
  width:100%;
  height:100%;
  object-fit:cover;
  object-position:bottom;
}
.card-text{
  margin:-30px auto;
  margin-right:20px;
  margin-bottom:-50px;
  height:360px;
  width:300px;
  background-color:purple;
  color:#fff;
  padding:20px,40px,0,20px;
}

.card-body{
  font-size:1.25rem;
}
    </style>

</head>

<body>

<div class="container">
<div class="card">
  <div class="card-image">
  <img src="<?php ROOT?>assets/images/vetanddog.png">
  </div>
  <div class="card-text">
    <p class="card-body">Our team of dedicated veterinarians is committed to providing top-notch care for your beloved pets. From routine check-ups to complex surgeries, we've got your furry friends covered. Your pet's health and well-being are our priorities.</p>
  </div>
  
</div>
  <div class="card">
  <div class="card-image">
  <img src="<?php ROOT?>assets/images/daycaredog.png">
  </div>
  <div class="card-text">
    <p class="card-body">Our daycare services are designed to keep your pets active and engaged while you're away. Our secure facilities and trained staff ensure a day filled with play, exercise, and socialization. Your pet will love it here!</p>
  </div>

</div>
  <div class="card">
  <div class="card-image">
  <img src="<?php ROOT?>assets/images/pettransport.png">
  </div>
  <div class="card-text">
    <p class="card-body">Need a safe and convenient way to get your pet to our center? Our pet transport service ensures a comfortable journey. We offer easy booking and caring drivers who treat your pets like their own.</p>
  </div>

</div>
</div>

</div>
</body>
</html>

