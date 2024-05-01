<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Day Care Staff</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="<?php echo ROOT?>/assets/css/panelheader.css">
    <?php $activePage = 'olddaycarebookings';?>

    <style>
        .view-date-button {
            cursor: pointer;
            padding: 5px 10px;
            background-color: purple;
            color: #fff;
            border: none;
            border-radius: 4px;
        }

        /* Add this style for modals */
        .modal-form {
            display: none;
            position: fixed;
            z-index: 999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            border-radius: 5px;
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

        .modal-content-delete {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            border-radius: 5px;
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
    <div style="margin-top: 80px;">
    <?php include '../app/views/components/panel-header-bar/hiuser.php'; ?>
    </div> 
    <div style="margin-top: 80px;">
        <?php include '../app/views/components/dashboard-compo/daycaresidebar.php'; ?>
        <div style="margin-left: 230px; margin-top:130px">
        <div class="panel-header" style="display:flex;">
        
          <div class="search-bar">
                  <input type="text" id="search" placeholder="Search bookings...">
                  <button class="search-button">Search</button>
          </div>
    </header>
        </div>
            </div>
    </div>

    <div style="margin-left: 230px;margin-right:20px; overflow:hidden; height:360px; overflow-y:scroll; overflow-x:scroll;">
        <div id="daycarebookingviewtable">
        <?php include '../app/views/components/tables/olddaycarebookingtable.php'; ?>
        </div>    
    </div>

    <script>
        
            
            $(document).ready(function() {
            $('#search').on('keyup', updateTable);
            function updateTable() {
                var searchTerm = $('#search').val();
            
                
                $.ajax({
                    url: "<?php echo ROOT ?>/Daycarestaff/olddaycarebookings/search",
                    type: "POST",
                    data: { search: searchTerm}, 
                    success: function(data) {
                        $('tbody').html(data);
                    }
                });
            }  
        });
            
    </script>
</body>
</html>
