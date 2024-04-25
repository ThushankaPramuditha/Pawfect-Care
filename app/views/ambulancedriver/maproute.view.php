<!DOCTYPE html>
<html>
<head>
    <title>Map Route</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>
     <!-- routing css -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css" />
      <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin=""></script>
        <!-- routing js -->
        <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
    <style>
        #map {
            height: 100vh;
        }
    </style>
</head>
<body>
    
    <div id="map"></div>

    <script>
        //view Colombo
        var map = L.map('map').setView([6.9271, 79.8612], 11);
       

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {attribution: "OSM" }).addTo(map);

        //marker icon
        var taxiIcon= L.icon({
            iconUrl: '<?php echo ROOT?>/assets/images/taxi.png',
            iconSize: [40, 40],
            iconAnchor: [20, 40]
        })

        var marker = L.marker([6.9271, 79.8612], {icon: taxiIcon}).addTo(map);
        map.on('click', function(e){
            console.log(e.latlng);

            
            var pickup_lat = <?php echo $pickup_lat ?>;
            var pickup_lng = <?php echo $pickup_lng ?>;
            var secondMarker = L.marker([pickup_lat, pickup_lng]).addTo(map);

        //routing
        L.Routing.control({
            waypoints: [
                L.latLng(6.9271, 79.8612),
                L.latLng(pickup_lat, pickup_lng)
            ]
        }).on('routesfound', function(e) {
            console.log(pickup_lat, pickup_lng)
            console.log(e)
            e.routes[0].coordinates.forEach(function(coord, index){
            })
        })
        .addTo(map);
        })
        
       

    </script>