<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Edit Event Type</title>
<!-- Favicon and touch icons -->
<link rel="shortcut icon" href="assets/dist/img/ico/ksu-favicon.png" type="image/x-icon">
<!-- Start Global Mandatory Style
=====================================================================-->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.css" />

<!-- lobicard tather css -->
<link rel="stylesheet" href="assets/plugins/lobipanel/css/tether.min.css" />
<!-- Bootstrap -->
<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<!-- lobicard tather css -->
<link rel="stylesheet" href="assets/plugins/lobipanel/css/jquery-ui.min.css" />
<!-- lobicard min css -->
<link href="assets/plugins/lobipanel/css/lobicard.min.css" rel="stylesheet" />
<!-- lobicard github css -->
<link href="assets/plugins/lobipanel/css/github.css" rel="stylesheet" />
<!-- Pace css -->
<link href="assets/plugins/pace/flash.css" rel="stylesheet" />
<!-- Font Awesome -->
<link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
<!-- Pe-icon -->
<link href="assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" />
<!-- Themify icons -->
<link href="assets/themify-icons/themify-icons.css" rel="stylesheet" />
<!-- End Global Mandatory Style
=====================================================================-->
<!-- Start page Label Plugins 
=====================================================================-->
<!-- Emojionearea -->
<link href="assets/plugins/emojionearea/emojionearea.min.css" rel="stylesheet" />
<!-- Monthly css -->
<link href="assets/plugins/monthly/monthly.css" rel="stylesheet" />
<!-- End page Label Plugins 
=====================================================================-->
<!-- Start Theme Layout Style
=====================================================================-->
<!-- Theme style -->
<link href="assets/dist/css/stylecrm.css" rel="stylesheet" />
<!-- Theme style rtl -->
<!--<link href="assets/dist/css/stylecrm-rtl.css" rel="stylesheet" />-->
<!-- End Theme Layout Style
=====================================================================-->

<?php
          require('dbconfig.php');

          $event_type_id =$_REQUEST['event_type_id'];
          $sql = "SELECT * FROM EventType where event_type_id='".$event_type_id."'"; 
          $stmt = sqlsrv_query($conn, $sql );
          while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){
          
            $event_type = $row['event_type'];
          }

?>

<style>
  div a { color:    #008B8B; }
  div a:hover { color: grey; };
</style>

</head>
<body class="hold-transition sidebar-mini">

<!-- header -->
<?php 

    include 'assets/php/top-nav.php';

?> 
<div>

<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="container-fluid">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="header-icon">
<i class="fa fa-users"></i>
</div>
<div class="header-title">
<h1>Edit Event Type</h1>
<small></small>
</div>
</section>
<!-- Main content -->
<div class="content">
<div class="row">
<!-- Form controls/labels -->
<div class="col-sm-12">
<div class="card lobicard all_btn_card" id="lobicard-custom-control1" data-sortable="true">
<div class="card-header all_card_btn">
<div class="card-title custom_title">
<a class="btn btn-add" href="events"><i class="fa fa-list"></i> Event Type List </a>  
</div>
</div>
<div class="card-body">
<form class="col-sm-6" action="editEventTypeQuery.php" method="POST">
<div class="form-group">
<label>Event Type</label>
<input type="text" class="form-control" value="<?php echo $event_type ?>" name="event_type" placeholder="Enter Event Type" require>
</div>
<input type="hidden" name="event_type_id" value="<?php echo $event_type_id ?>"/>
<div class="submit-button">                           
<a> <input class="btn btn-success" type="submit" name="submit" value="Edit"></a>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
<!-- /.content -->
</div>
<!-- ./wrapper -->
<!-- Start Core Plugins
=====================================================================-->
<!-- jQuery -->
<script src="assets/plugins/jQuery/jquery-1.12.4.min.js"></script>
<!-- Bootstrap proper -->
<script src="assets/bootstrap/js/popper.min.js"></script>
<!-- lobicard ui min js -->
<script src="assets/plugins/lobipanel/js/jquery-ui.min.js"></script>
<!-- lobicard ui touch-punch-improved js -->
<script src="assets/plugins/lobipanel/js/jquery.ui.touch-punch-improved.js"></script>
<!-- lobicard tether min js -->
<script src="assets/plugins/lobipanel/js/tether.min.js"></script>
<!-- Bootstrap -->
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<!-- lobicard js -->
<script src="assets/plugins/lobipanel/js/lobicard.js"></script>
<!-- lobicard highlight js -->
<script src="assets/plugins/lobipanel/js/highlight.js"></script>
<!-- Pace js -->
<script src="assets/plugins/pace/pace.min.js"></script>
<!-- NiceScroll -->
<script src="assets/plugins/slimScroll/jquery.nicescroll.min.js"> </script>
<!-- FastClick -->
<script src="assets/plugins/fastclick/fastclick.min.js"></script>
<!-- CRMadmin frame -->
<script src="assets/dist/js/custom.js"></script>
<!-- End Core Plugins
=====================================================================-->
<!-- Start Theme label Script
=====================================================================-->
<!-- Dashboard js -->
<script src="assets/dist/js/dashboard.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.js"></script>
<!-- End Theme label Script
=====================================================================-->

</body>
</html>