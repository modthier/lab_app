<?php session_start();
    require_once 'inc/conn.php';
    require_once 'vendor/autoload.php'; 
    require_once 'classes/declare.php';
    
?>
<?php if (!$auth->isLoggedIn()) {
    header("Location:login.php");
    exit();

} ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><?php if (isset($_GET['title'])) { echo $_GET['title'] ;}else {echo "Lab";} ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <link href="main.css" rel="stylesheet">
    <link href="assets/css/jquery-ui.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap-tokenfield.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <style type="text/css">
       

        .box {
          display: flex;
          align-items: center;
          justify-content: center;
        }

        .box div {
          width: 100px;
          height: 100px;
        }

        .info {
            font-size: 1.5em;
        }

        .filters {
            display: none;
        }

        .modal .modal-body {    
		    overflow-y: auto;
		    max-height: 400px;
		}

        .select2-container--default .select2-selection--multiple{
            height : 38px;
        }
    </style>
</head>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <?php require('inc/app-header.php'); ?>
        <div class="app-main">
                <?php require 'inc/app-sidebar.php'; ?>   
                <div class="app-main__outer">
                    <div class="app-main__inner">   
                        <?php 
                           require 'route.php';
                        ?>
                    </div>
                   <?php require 'inc/app-wrapper-footer.php'; ?> 
            </div>
        </div>
    </div>
    <script type="text/javascript" src="assets/scripts/main.js"></script>
    
    <script type="text/javascript" src="assets/scripts/jquery.min.js"></script>
    <script type="text/javascript" src="assets/scripts/jquery-ui.min.js"></script>
    <script type="text/javascript" src="assets/scripts/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/scripts/bootstrap-tokenfield.js"></script>
    <script type="text/javascript" src="assets/scripts/select2.full.min.js"></script>
    <script type="text/javascript" src="assets/scripts/select2Scripts.js"></script>

    <script type="text/javascript">
            $(document).ready(function(){
 
             $('#selection_value').tokenfield();
            });
    </script>

    <script type="text/javascript" src="assets/scripts/printThis.js"></script>
    

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Investigation</h5>
                <button type="button" id="clsBtn" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="loadForm">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="clsBtnFooter" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
 
<script type="text/javascript">
        $('body').on('click','.print',function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            
            $('#barcode-'+id).printThis({
                importCSS: true
            });
        });

        $('#filter').click(function () {
            var btn = $(this).text();
            $('.filters').slideToggle(100);
            

            if ($.trim($(this).text()) === 'Show Filters') {
               $(this).text('Hide Filters');
            } else {
                $(this).text('Show Filters');        
            }

        });

         $('body').on('click','.view',function(e){
            e.preventDefault();
            var sid = $(this).data('sid');
            var cid = $(this).data('cid');
            var lbr = $(this).data('lbr');
            $.ajax({
                url: "api/viewForm.php",
                method:"get",
                data:{sid:sid,c_id:cid,lbr:lbr},
                success:function (result) {
                   $('#loadForm').html(result); 
                   $('#myModal').modal('show');
                  
                    
                }

            });
            
        });

        $('#clsBtn').click(function(){
            $('#myModal').modal('hide');
        });

        $('#clsBtnFooter').click(function(){
            $('#myModal').modal('hide');
        });

        

       
    </script>
    
</body>
</html>
