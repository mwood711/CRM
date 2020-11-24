<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Events</title>
<!-- Favicon and touch icons --> 
<link rel="shortcut icon" href="assets/dist/img/ico/ksu-favicon.png" type="image/x-icon">
<!-- Start Global Mandatory Style
=====================================================================-->

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
<link href="assets/dist/css/bootstrap-datepicker.css" rel="stylesheet" />
<!-- End Global Mandatory Style
=====================================================================-->
<!-- Start Theme Layout Style
=====================================================================-->
<!-- Theme style -->
<link href="assets/dist/css/stylecrm.css" rel="stylesheet" />
<!-- Theme style rtl -->
<!--<link href="assets/dist/css/stylecrm-rtl.css" rel="stylesheet" />-->
<!-- End Theme Layout Style
=====================================================================-->
</head>
<body class="hold-transition sidebar-mini">
<?php 

      include 'assets/php/top-nav.php';
?>
<div>

<div class="container-fluid">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="header-icon">
<i class="fa fa-outdent"></i>
</div>
<div class="header-title">
<h1>Events</h1>
<small>All Events list</small>
</div>
</section>
<!-- Main content -->
<section class="content">
<div class="row">
<div class="col-lg-6 pinpin">
<div class="card lobicard"  data-sortable="true">
<div class="card-header lobicard-custom-control">
<div class="btn-group d-flex" role="group">
<!--============================================-->
<!-- Add Events  -->
</div> 
<div class="card-title custom_title">
<h4>Events</h4>
</div>
</div>
<div class="card-body">
<!--============================================-->
<!-- Add Events type -->
<div class="btn-group d-flex" role="group">
<div class="buttonexport"> 
<a href="#" class="btn btn-add" data-toggle="modal" data-target="#addevtuser"><i class="fa fa-plus"></i> Add New Event</a>  
</div>
</div>
<div class="table-responsive">
<table id="dataTableExample1" class="table table-bordered table-hover">
<thead class="back_table_color">
<tr class="info">
<th>Event Name</th>
<th>Address</th>
<th>Price</th>
<th></th>
<th></th>
</tr>
</thead>
<tbody>
            <?php
            require('dbconfig.php');
            $sql = "Select event_id, description, address, price, event_type_id FROM event";
            $stmt = sqlsrv_query( $conn, $sql );
            if( $stmt === false) {
            die( print_r( sqlsrv_errors(), true) );
            }
            while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
            echo 
            "<tr>
            <td>".$row['description']."</td>
            <td>".$row['address']."</td>
            <td>".$row['price']."</td>
            <td><a href=\"edit_event.php?event_id=".$row['event_id']."\" style='color:blue'>Update</a></td>
            <td><a href=\"delete_event.php?event_id=".$row['event_id']."\" style='color:red'>Delete</a></td>
            </tr>" ; 
            }
            sqlsrv_free_stmt( $stmt);
            ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
<div class="col-lg-6 pinpin">
<div class="card lobicard"  data-sortable="true">
<div class="card-header lobicard-custom-control">
<div class="card-title custom_title">
<h4>Event Identifier</h4>
</div>
</div>
<div class="card-body">
  <!--============================================-->
<!-- Add Events identifier -->
<div class="btn-group d-flex" role="group">
<div class="buttonexport"> 
<a href="#" class="btn btn-add" data-toggle="modal" data-target="#addeviuser"><i class="fa fa-plus"></i> Add New Identifier</a>  
</div>
</div>
<div class="table-responsive">
<table class="table table-bordered table-hover">
<thead class="back_table_color">
<tr class="info">
<th>Event Identifier ID</th>
<th>Event Identifier Name</th>
<th>Action</th>
</tr>
</thead>
<tbody>
          <?php
          require('dbconfig.php');
          $sql = "SELECT event_type_id, event_type FROM eventtype ";
          $stmt = sqlsrv_query( $conn, $sql );
          if( $stmt === false) {
          die( print_r( sqlsrv_errors(), true) );
          }
          while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
          echo "<tr>
          <td>".$row['event_type_id']."</td><td>".$row['event_type']."</td>
          <td><a href=\"delete_eventtype.php?event_type_id=".$row['event_type_id']."\" style='color:red'>Delete</a></td>
          </tr>" ;
          }
          sqlsrv_free_stmt( $stmt);
          ?>
</tbody>
</table>
</div>
</div>
</div>
</div>

<!--Add Event Modal -->
<div class="modal fade" id="addevtuser" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header modal-header-primary">
<h3><i class="fa fa-plus m-r-5"></i> Add New Event</h3>
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<div class="modal-body">
<div class="row">
<div class="col-md-12">
<form class="form-horizontal" action="AddEvent.php" method="POST">
<div class="row">
<!-- Text input-->
<div class="col-md-6 form-group">
<label>Event Name</label>
<input type="text" class="form-control" name="description" placeholder="Enter Event Name" required>
</div>
<div class="col-md-6 form-group">
  <div class="input-group">
<label for="inputGroupSelect">Event Identifier ID</label>
  </div>
  <select class="form-control" name="event_type_id" id="inputGroupSelect">
    <option selected>--Select Event ID--</option>
     <?php
          require('dbconfig.php');
          $sql = "SELECT * FROM eventtype"; 
          $stmt = sqlsrv_query($conn, $sql );
          while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){
          echo "<option value='".$row['event_type_id']."'>".$row['event_type']."</option>";
          }
      ?>
  </select>
</div>
<div class="col-md-6 form-group">
<label>Event Date</label>
<input type="date" class="form-control" name="date" placeholder="Enter Event date" required>
</div>
<div class="col-md-6 form-group">
<label>Event Time</label>
<input type="time" class="form-control" name="start_time" placeholder="Enter Event time" required>
</div>
<div class="col-md-6 form-group">
<label>Event Address</label>
<input type="text" class="form-control" name="address" placeholder="Enter Event Address" required>
</div>
<div class="col-md-6 form-group">
<label>Event Price</label>
<input type="text" class="form-control" name="price" placeholder="Enter Event Price" required>
</div>
<div class="col-md-12 form-group user-form-group">
<div class="float-right">
<button type="button" class="btn btn-danger btn-sm">Cancel</button>
<button type="submit" class="btn btn-add btn-sm" name="submit" value="Add">Update</button>
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-danger float-left" data-dismiss="modal">Close</button>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>  
<!-- /.Event Modal -->

<!--Add Event identifier Modal -->
<div class="modal fade" id="addeviuser" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header modal-header-primary">
<h3><i class="fa fa-plus m-r-5"></i> Add New Identifier</h3>
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<div class="modal-body">
<div class="row">
<div class="col-md-12">
<form class="form-horizontal" action="AddEvtID.php" method="POST">
<div class="row">
<!-- Text input-->
<div class="col-md-6 form-group">
<label>Event Identifier Name</label>
<input type="text" class="form-control" name="event_type" placeholder="Enter Event Identifier Name" required>
</div>
<div class="col-md-12 form-group user-form-group">
<div class="float-right">
<button type="button" class="btn btn-danger btn-sm">Cancel</button>
<button type="submit" class="btn btn-add btn-sm" name="submit" value="Add">Update</button>
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-danger float-left" data-dismiss="modal">Close</button>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- /.Event Modal -->

<!--=============Add Event Details Modal ======================-->
<div class="modal fade" id="addevduser" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header modal-header-primary">
<h3><i class="fa fa-plus m-r-5"></i> Add Event details </h3>
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<div class="modal-body">
<div class="row">
<div class="col-md-12">
<form class="form-horizontal" action="addeventsdets.php" method="POST">
<div class="row">
<!-- Text input-->
<div class="col-md-6 form-group">
<label>Event Type </label>
<select class="form-control" name="e_type" id="inputGroupSelect">
    <option selected>--Select Event type--</option>
     <?php
          require('dbconfig.php');
          $sql = "SELECT * FROM eventtype"; 
          $stmt = sqlsrv_query($conn, $sql );
          while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){
          echo "<option value='".$row['evt_id']."'>".$row['evt_name']."</option>";
          }
      ?>
  </select>
</div>
<div class="col-md-6 form-group">
<label>Enter Notes From Events</label>
<textarea type="text" class="form-control" name="notes" placeholder="Enter notes from event" ></textarea>
</div>
<!-- Text input-->
<div class="col-md-6 form-group">
<label>Faculty who attended</label>
<select class="form-control" name="f_attending" id="inputGroupSelect">
    <option selected>--Select Faculty--</option>
     <?php
          require('dbconfig.php');
          $sql = "SELECT * FROM faculty"; 
          $stmt = sqlsrv_query($conn, $sql );
          while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){
          echo "<option value='".$row['f_id']."'>".$row['firstname']. " ".$row['lastname']."</option>";
          }
      ?>
  </select>
</div>
<!-- Text input-->
<div class="col-md-6 form-group">
<label>Event Location</label>
<input type="text" class="form-control" name="place" placeholder="Enter Event Location" >
</div>
<div class="col-md-6 form-group">
<label>Amount Pledge (If Any)</label>
<input type="number" class="form-control" name="amount" placeholder="Enter amount pledge at event by Client" >
</div>
<div class="col-md-6 form-group">
<label>Contact Attending</label>
<select class="form-control" name="c_id" id="inputGroupSelect">
    <option selected>--Select Contact--</option>
     <?php
          require('dbconfig.php');
          $sql = "SELECT * FROM contact"; 
          $stmt = sqlsrv_query($conn, $sql );
          while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){
          echo "<option value='".$row['c_id']."'>".$row['fname']. " ".$row['lname']."</option>";
          }
      ?>
  </select>
</div>
<div class="col-md-12 form-group user-form-group">
<div class="float-right">
<button type="button" class="btn btn-danger btn-sm">Cancel</button>
<button type="submit" class="btn btn-add btn-sm" name="submit" value="Add">Update</button>
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-danger float-left" data-dismiss="modal">Close</button>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- /.Event details Modal -->
<!--Add Event Modal -->
</section>
<!-- /.content -->
</div>
<!-- footer -->
<?php 
    include 'assets/php/footer.php';
?>
</div>
<!-- ./wrapper -->
<!-- Start Core Plugins
=====================================================================-->
<!-- jQuery -->
<script src="assets/plugins/jQuery/jquery-1.12.4.min.js" ></script>
<!-- Bootstrap proper -->
<script src="assets/bootstrap/js/popper.min.js" ></script>
<!-- lobicard ui min js -->
<script src="assets/plugins/lobipanel/js/jquery-ui.min.js" ></script>
<!-- lobicard ui touch-punch-improved js -->
<script src="assets/plugins/lobipanel/js/jquery.ui.touch-punch-improved.js"></script>
<!-- lobicard tether min js -->
<script src="assets/plugins/lobipanel/js/tether.min.js" ></script>
<!-- Bootstrap -->
<script src="assets/bootstrap/js/bootstrap.min.js" ></script>
<!-- lobicard js -->
<script src="assets/plugins/lobipanel/js/lobicard.js" ></script>
<!-- lobicard highlight js -->
<script src="assets/plugins/lobipanel/js/highlight.js" ></script>
<!-- Pace js -->
<script src="assets/plugins/pace/pace.min.js" ></script>
<!-- NiceScroll -->
<script src="assets/plugins/slimScroll/jquery.nicescroll.min.js" > </script>
<!-- FastClick -->
<script src="assets/plugins/fastclick/fastclick.min.js" ></script>
<!-- CRMadmin frame -->
<script src="assets/dist/js/custom.js" ></script>
<!-- End Core Plugins
=====================================================================-->
<!-- Start Theme label Script
=====================================================================-->
<!-- Dashboard js -->
<script src="assets/dist/js/dashboard.js" ></script>
<!-- End Theme label Script
=====================================================================-->
<script>
        $(document).ready(function() {
          $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#dataTableExample1 tbody tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });
        </script>
</body>
</html>

