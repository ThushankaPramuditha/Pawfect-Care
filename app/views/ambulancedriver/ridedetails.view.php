<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/panelheader.css">

    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/tables.css">
    <?php $activePage = 'ridedetails';?>
    <title>Ride Details</title>
</head>

<body>
<?php include '../app/views/components/panel-header-bar/hiuser.php'; ?>
<div style = "margin-top: 80px; ">
    <?php include '../app/views/components/dashboard-compo/ambulancedriversidebar.php'; ?>  
    <div style = "margin-left: 230px; margin-top:130px">
    <div class="panel-header" style="display:flex;">
          <div class="filter-date">
                  <input type="date"  id="date-filter" placeholder="Filter by date..." style="background-color: #ffffff; margin:0px; color: #666 ">   
          </div>

          <div class="search-bar">
                  <input type="text" id="search" placeholder="Search appointments...">
                  <button class="search-button">Search</button>
          </div>
    </header>
        </div>
      <div style="margin-top:20px; overflow:hidden; height:360px; overflow-y:scroll; overflow-x:scroll;">
      <table>
        <thead>
            <tr>
                <th>Pet Owner ID</th>
                <th>Name</th>
                <th>Contact Number</th>
                <th>Pick Up Location</th>
                <th>Pick Up Date-Time</th>
               
            </tr>
        </thead>
        <tbody>
        <?php foreach ($ambulancebookings as $ambulance): ?>
                         <tr key = "<?php echo $ambulance->id; ?>">
                            <td><?= htmlspecialchars($ambulance->pet_owner_id)  ?></td>
                            <td><?= htmlspecialchars($ambulance->pet_owner_name) ?></td>
                            <td><?= htmlspecialchars ($ambulance->pet_owner_contact)?></td>
                            <td><?= htmlspecialchars($ambulance->pickup_lat)?>, <?= htmlspecialchars($ambulance->pickup_lng) ?></td>
                            <td><?= htmlspecialchars( $ambulance->date_time) ?></td>
                        </tr>
                        <?php endforeach; ?>
           
        </tbody>
    </table>
    
      </div>
    </div>
</div>
</body>
<script>
   $(document).ready(function() {
            $('#date-filter').change(updateTable);
            $('#search').on('keyup', updateTable);
            function updateTable() {
                var searchTerm = $('#search').val();
                var filterDate = $('#date-filter').val(); 
                
                $.ajax({
                    url: "<?php echo ROOT ?>/Ambulancedriver/RideDetails/search",
                    type: "POST",
                    data: { search: searchTerm, date: filterDate }, 
                    success: function(data) {
                        $('tbody').html(data);
                    }
                });
            }  
        });
  </script>
</html>
