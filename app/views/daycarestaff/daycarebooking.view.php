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
  </style>
</head>

<body>
    <div style="margin-top: 80px;">
    <?php include '../app/views/components/panel-header-bar/hiadmin.php'; ?>
    </div>
    <div style = "margin-top: 80px; ">
    <?php include '../app/views/components/dashboard-compo/daycaresidebar.php'; ?>  
    <div style="margin-left: 230px; margin-top:130px;">
    <div class="panel-header">
            <div class="search-bar" style="margin-left:930px;" >
                    <input type="text" id="search" placeholder="yyyy-mm-dd">
                    <button class="search-button">View</button>
                </div>
        </div>
          <div style="margin-left: 20px; margin-right:20px;">
            <?php include '../app/views/components/tables/daycarebookingtable.php'; ?>
          </div>
    </div>

    <script>

$(document).ready(function(){
      $('#search').on('keyup', function(){
       var searchTerm = $(this).val();
       $.ajax({
       url: "<?php echo ROOT ?>/Daycarestaff/Daycrebooking/search",
       type: "POST",
       data: {search: searchTerm},
       success: function(data) {
       $('tbody').html(data);
             }
           });
        });
    });
    </script>


</body>
</html>
