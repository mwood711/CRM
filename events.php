  <?php 

    session_start();
    $id = $_SESSION['id'];
     require('dbconfig.php');
     $sql = "SELECT role FROM Login where id = '".$id."'";
     $stmt = sqlsrv_query( $conn, $sql );
     if( $stmt === false) {
     die( print_r( sqlsrv_errors(), true) );
     }
     while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
        
        $role = $row['role'];
     }
     sqlsrv_free_stmt( $stmt);
    if ($role != 'user' && $role != 'admin')
    {
        header('location:login2.php');
    }
?>

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
<div class="btn-group">
<button class="btn btn-exp btn-sm" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Table Data</button>
<ul class="dropdown-menu exp-drop" role="menu">
<li class="dropdown-divider"></li>
<li>
   <a href="#" onclick="$('#excelTable').tableExport({type:'excel',escape:'false'});"> 
   <img src="assets/dist/img/excel.png" width="24" alt="logo"> Excel</a>
   </li>
<li>
<a href="PDF-generate/generate-events-pdf.php" > 
<img src="assets/dist/img/pdf.png" width="24" alt="logo"> PDF</a>
</li>
</ul>
</div>
<div class="table-responsive">
<table id="dataTableExample1" class="table table-bordered table-hover">
<thead class="back_table_color">
<tr class="info">
<th>Event Name</th>
<th></th>
<th></th>
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
            "<tr onclick=\"window.location='eventsDetails?event_id=".$row["event_id"]."'\">
            <td>".$row['description']."</td>
            <td><a href=\"facultyAtEvent.php?event_id=".$row['event_id']."\" style='color:green'>Faculty Attending</a></td>
            <td><a href=\"contactsAtEvent.php?event_id=".$row['event_id']."\" style='color:blue'>Contacts Attending</a></td>
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
<h4>Event Types</h4>
</div>
</div>
<div class="card-body">
  <!--============================================-->
<!-- Add Events identifier -->
<div class="btn-group d-flex" role="group">
<div class="buttonexport"> 
<a href="#" class="btn btn-add" data-toggle="modal" data-target="#addEventType"><i class="fa fa-plus"></i> Add New Type</a>  
</div>
</div>
<div class="table-responsive">
<table class="table table-bordered table-hover">
<thead class="back_table_color">
<tr class="info">
<th>Event Type</th>
<th></th>
<th></th>
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
          <td>".$row['event_type']."</td>
          <td><a href=\"editEventType.php?event_type_id=".$row['event_type_id']."\" style='color:blue'>Update</a></td>
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
<form class="form-horizontal" action="addEventQuery.php" method="POST">
<div class="row">
<!-- Text input-->
<div class="col-md-6 form-group">
<label>Event Name</label>
<input type="text" class="form-control" name="description" placeholder="Enter Event Name" required>
</div>
<div class="col-md-6 form-group">
  <div class="input-group">
<label for="inputGroupSelect">Event Type</label>
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

<?php 

    require('dbconfig.php');
    $sql = "SELECT TOP 1 * FROM event ORDER BY event_id DESC";
    $stmt = sqlsrv_query( $conn, $sql );
    if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
    }
    $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
    $x = 1;

    if (empty($row)){

      $id = 1;      

    } 
      while($x < 2) {

            $id = $row['event_id'] + 1;
            ++$x;
      }
    sqlsrv_free_stmt( $stmt);

 ?>
<input type="hidden" name="event_id" value="<?php echo $id ?>"/>


<div class="col-md-12 form-group user-form-group">
<div class="float-right">
<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-success" name="submit" value="Add">Create</button>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>  



<!-- Create Event Type -->


<div class="modal fade" id="addEventType" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header modal-header-primary">
<h3><i class="fa fa-plus m-r-5"></i> Add New Event Type</h3>
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<div class="modal-body">
<div class="row">
<div class="col-md-12">
<form class="form-horizontal" action="addEventTypeQuery.php" method="POST">
<div class="row">
<!-- Text input-->
<div class="col-md-6 form-group">
<label>Event Type</label>
<input type="text" class="form-control" name="event_type" placeholder="Enter Event Type" required>
</div>

<?php 

    require('dbconfig.php');
    $sql = "SELECT TOP 1 * FROM EventType ORDER BY event_type_id DESC";
    $stmt = sqlsrv_query( $conn, $sql );
    if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
    }
    $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
    $x = 1;

    if (empty($row)){

      $id = 1;      

    } 
      while($x < 2) {

            $id = $row['event_type_id'] + 1;
            ++$x;
      }
    sqlsrv_free_stmt( $stmt);

 ?>
<input type="hidden" name="event_type_id" value="<?php echo $id ?>"/>


<div class="col-md-12 form-group user-form-group">
<div class="float-right">
<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-success" name="submit" value="Add">Create</button>
</div>
</div>
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

<table id="excelTable" style="visibility:hidden">
  <thead>
  <tr>
  <th>Event Description</th>
  <th>Date</th>
  <th>Start Time</th>
  <th>Address</th>
  <th>Price</th>
  <th>Event Type</th>
  </tr>
  </thead>
  <tbody>
          <?php
          require('dbconfig.php');


          $sql = "SELECT * FROM Event INNER JOIN EventType ON Event.event_type_id = EventType.Event_type_id";
          $stmt = sqlsrv_query( $conn, $sql );
          if( $stmt === false) {
          die( print_r( sqlsrv_errors(), true) );
          }

          while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {


                  $stringdate = $row['date'];
                  $date = $stringdate->format('m-d-y');

                  $startTimeString = $row['start_time'];
                  $startTime = $startTimeString->format('g:i A');

          echo "<tr>

                  <td>".$row['description']."</td>
                  <td>".$date."</td>
                  <td>".$startTime."</td>
                  <td>".$row['address']."</td>
                  <td>".$row['price']."</td>
                  <td>".$row['event_type']."</td>
                  </tr>" ;
          }
          sqlsrv_free_stmt( $stmt);
          ?>
  </tbody>
  
</table>
<!-- /.content -->
</div>

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
<!-- table-export js -->
<script src="assets/plugins/table-export/tableExport.js" ></script>
<script src="assets/plugins/table-export/jquery.base64.js" ></script>
<script src="assets/plugins/table-export/html2canvas.js" ></script>
<script src="assets/plugins/table-export/sprintf.js" ></script>
<script src="assets/plugins/table-export/jspdf.js" ></script>
<script src="assets/plugins/table-export/base64.js" ></script>
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
            $("#excelTable tbody tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });
</script>
</body>
</html>

