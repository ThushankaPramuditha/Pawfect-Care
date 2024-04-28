<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Day Care Staff</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="<?php echo ROOT?>/assets/js/validatestaff.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/panelheader.css">
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/tables.css">

    <?php $activePage = 'daycarebookingform';?>

  <style>
    .view-date-button {
      cursor: pointer;
      padding: 5px 10px;
      background-color: purple;
      color: #fff;
      border: none;
      border-radius: 4px;
    }

    .slot-button {
            background-color: purple;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

       .slot-button:hover {
          background-color: #6a3879; 
      }
  </style>
</head>

<body>
    <div style="margin-top: 80px;">
    <?php include '../app/views/components/panel-header-bar/hiuser.php'; ?>
    </div>
    <div style = "margin-top: 80px; ">
    <?php include '../app/views/components/dashboard-compo/daycaresidebar.php'; ?>  
    <div style="margin-left: 230px; margin-top:130px;">
    <div class="panel-header" style="display:flex;">
          <!-- <div class="filter-date">
                  <input type="date"  id="date-filter" placeholder="Filter by date..." style="background-color: #ffffff; margin:0px; color: #666 ">   
          </div>

          <div class="search-bar">
                  <input type="text" id="search" placeholder="Search appointments...">
                  <button class="search-button">Search</button>
          </div> -->
    </header>
        </div>

          <div style="margin-left: 20px; margin-right:20px;">
        <!-- Your HTML code for displaying bookings -->
          <?php include '../app/views/components/tables/daycarebookingtable.php'; ?>
    </div>

    <script>
   $(document).ready(function() {
            $('#date-filter').change(updateTable);
            $('#search').on('keyup', updateTable);
            function updateTable() {
                var searchTerm = $('#search').val();
                var filterDate = $('#date-filter').val(); 
                
                $.ajax({
                    url: "<?php echo ROOT ?>/Daycarestaff/daycarebooking/search",
                    type: "POST",
                    data: { search: searchTerm, date: filterDate }, 
                    success: function(data) {
                        $('tbody').html(data);
                    }
                });
            }  
        });
    </script>

</body>
</html>
