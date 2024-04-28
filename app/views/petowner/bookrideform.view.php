<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pawfect Care -Daycare Booking</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/panelheader.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>

      <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin=""></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            margin: 0;
            color: #333;
            font-size: 16px;
        }

        .modal-form {
            display: none; 
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 25% auto;
            padding: 20px;
            border: 1px solid #888;
            border-radius: 10px;
            max-width: 600px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .form-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .form-container .column {
            width: 48%; /* Adjusted to accommodate space between columns */
        }

        .form-container label {
            display: block;
            margin-bottom: 5px;
        }

        .form-container input[type="text"],
        .form-container input[type="tel"],
        .form-container input[type="time"],
        .form-container input[type="nic"],
        .form-container textarea {
            width: 100%;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            background-color: #ECECEC;
        }

        .select-container {
            margin-bottom: 10px;
        }

        .select-container label {
            display: block;
            margin-bottom: 5px;
        }

        .select-container select {
            width: 100%;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            background-color: #ECECEC;
        }

        .error-message {
            color: red;
            margin-bottom: 10px;
        }
        .add-new-button {

            background-color: #6a387944;
            border:none;
            width: fit-content;
            color:#6a3879;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
            box-shadow: #6a3879;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5); /* Added box shadow */
            }
            .add-new-button:hover {
            background-color: #6a3879;
            color: #fff;
            }
        #map { height: 350px; width:300px; }

    </style>
</head>  
<body>

<?php include 'navbar.php'; ?>
    <div class="modal-content" style="margin-top:10px;">
    <div style="display: flex; justify-content: center;">
            <h1>Transport Booking</h1>
        </div>
        <div class="form-container">
        <form id="bookride-form" action="<?php echo ROOT?>/petowner/bookrideform/addBooking" method="post">
            <div style="display: flex; justify-content: space-between;  margin-top:10px;">
                 <div class=column style="margin-right:20px;">


                    <div class="select-container">
                        <label for="pet-select">Choose a pet:</label>
                        <select name="pet_id" id="pet-select" onchange="setPetId()">
                            <?php if (!empty($data['pets'])): ?>
                                <?php foreach ($data['pets'] as $pet): ?>
                                    <option value="<?= htmlspecialchars($pet->id) ?>"><?= htmlspecialchars($pet->name) ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>

                    <input type="hidden" id="pet-id" name="pet_id" value="<?php echo $pet->id ?>">
                    <div id="error-pet-id" class="error-message"></div>

                    <input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['USER']->id; ?>"> 
                    <div id="error-user_id" class="error-message"></div>
                   <?php
                        // Assuming ambulance_id is an integer
                        $ambulance_id = isset($_GET['ambulance_id']) ? intval($_GET['ambulance_id']) : 0;
                    ?>
                      <input type="hidden" id="driver_id" name="driver_id" value="<?php echo $ambulance_id; ?>">
                     <div id="error-driver_id" class="error-message"></div>

                     
                    <!-- pick your location -->
                    <p>Pick Your Location Here <i class="fas fa-hand-point-right"></i></p>
                    <input type="hidden" id="pick-up-lat" name="pick-up-lat">
                    <input type="hidden" id="pick-up-lng" name="pick-up-lng">

                 </div>
                 <div class="column" style=" margin-left:20px; padding-right:50px;">
                    <div id="map"> </div>
                
                </div>
                 
            </div>
            <div class="flex-container" style="display: flex; justify-content: center; margin-left: 100px; margin-top:20px;">
                    <button class="add-new-button" type="submit" name="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <script>
    
    
    <?php if (isset($_GET['true'])): ?>
        Swal.fire({
            icon: 'success',
            title: 'Booking Successful',
            text: 'Your Booking is successful.We will contact you soon. ',
             //when okay clicked, redirect to services page
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '<?= ROOT ?>/petowner/services';
            }
            
        });

    <?php endif; ?>


    //failure message
    <?php if (isset($_GET['failure'])): ?>
        Swal.fire({
            icon: 'error',
            title: 'Booking Failed',
            text: 'Your Booking is denied. Error: <?= $_GET['failure'] ?>',
        });

    <?php endif; ?>


    //map
    var map = L.map('map');
map.setView([6.9271, 79.8612], 13); // Set view to Colombo
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

navigator.geolocation.watchPosition(success, error);

let marker, circle,zoomed;

function success(pos) {
    const lat = pos.coords.latitude;
    const lng = pos.coords.longitude;
    const accuracy = pos.coords.accuracy;


    if(marker) {
        map.removeLayer(marker);
        map.removeLayer(circle);
    }

     marker= L.marker([lat, lng]).addTo(map);
     circle = L.circle([lat, lng], {
        radius: accuracy,
        color: 'blue',
        fillColor: 'blue',
        fillOpacity: 0.1
    }).addTo(map);

    if(!zoomed){
        zoomed = map.fitBounds(circle.getBounds());
    }

    map.setView([lat, lng]);
    map.fitBounds(circle.getBounds());
}

function error(err) {
    if (err.code == 1) {
        alert("Error: Access is denied!");
    } else if (err.code == 2) {
        alert("Error: Position is unavailable!");
    } else if (err.code == 3) {
        alert("Error: Timeout!");
    } else {
        alert("An unknown error occurred.");
    }
}

map.on('click', function(e) {
    const lat = e.latlng.lat;
    const lng = e.latlng.lng;
    // const distance = e.latlng.distanceTo(marker.getLatLng());
    // add location [6.580656, 79.963901] to the map 

    const distance = map.distance([lat, lng], [6.580656, 79.963901]);
    
    //If your current location to location [6.580656, 79.963901] greater than 25000m
    if (distance > 25000) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Sorry Location is too far to reach.Within 25km Only.'
        });
        return;
    }



    // Remove existing marker
    if (marker) {
        map.removeLayer(marker);
    }

    // Add marker at clicked location
    marker = L.marker([lat, lng]).addTo(map);

    // Update hidden input field with coordinates
    document.getElementById('pick-up-lat').value = lat;
    document.getElementById('pick-up-lng').value = lng;

    //check if the distance is greater than 15000m
    // if (distance > 100) {
    //     Swal.fire({
    //         icon: 'error',
    //         title: 'Error',
    //         text: 'Please select a location within 100m from your current location.'
    //     });
    // }
});

    </script>


</body>
</html>
