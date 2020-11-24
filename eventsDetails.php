<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Event Deatils</title>
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
<div class="header-icon"><i class="fa fa-user-circle-o"></i></div>
<div class="header-title">
<h1>Events Details</h1>
<small>Show Clients and Event details</small>
</div>
</section>

<!--============================================-->
<section class="content">
<div class="row">
<div class="col-sm-4 pinpin">
<div class="card lobicard"  data-sortable="true">
<div class="card-header lobicard-custom-control">
<div class="card-title custom_title">
    <h4>Client Information</h4>
</div>
</div>
<div class="card-body">
<div class="table-responsive">
<table class="table table-bordered table-hover">
<tbody>
        <?php
         require ('dbconfig.php');
        $urlvariable = $_GET['evt'];
        $sql = " select evt_name, place, date from contact, eventtype, eventdetails
        where eventdetails.c_id = contact.c_id
        and eventtype.evt_id = eventdetails.e_type 
        and evt_id ='$urlvariable'
        group by evt_name, place, date";
        $stmt = sqlsrv_query( $conn, $sql );
        if( $stmt === false) {
        die( print_r( sqlsrv_errors(), true) );
        }
       
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
        $date = $row['date'];
        $stringdate = $date->format('Y-m-d');
        echo 
        "
        <tr><th>Event Name :</th><td>".$row['evt_name']."</td></tr>
        <tr><th>Event Location :</th><td>".$row['place']."</td></tr>
        <tr><th>Event Date :</th><td>".$stringdate."</td></tr>
       ";
        }
        sqlsrv_free_stmt( $stmt);
        ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="content">
<div class="row">
<div class="col-lg-6 pinpin">
<div class="card lobicard"  data-sortable="true">
<div class="card-header lobicard-custom-control">
<div class="btn-group d-flex" role="group">
</div> 
<div class="card-title custom_title">
<h4>Client Attendees</h4>
</div>
</div>
<div class="card-body">
<div class="table-responsive">
<table class="table table-bordered table-hover">
<thead class="back_table_color">
<tr class="info">
<th>Client First Name</th>
<th>Client Last Name</th>
<th>Company</th>
</tr>
</thead>
<tbody>
            <?php
            $serverName = "localhost";
            $connectionInfo = array( "Database"=>"ksu_crm");
            $urlvariable = $_GET['evt'];
            $conn = sqlsrv_connect( $serverName, $connectionInfo );
            if( $conn === false ) {
            die( print_r( sqlsrv_errors(), true));
            }

            $sql = "select fname, lname, cname from contact, company, eventtype,eventdetails
            where company.company_id = contact.c_id
            and eventdetails.c_id = contact.c_id
            and eventtype.evt_id = '$urlvariable'
           group by fname,lname, cname";
            $stmt = sqlsrv_query( $conn, $sql );
            if( $stmt === false) {
            die( print_r( sqlsrv_errors(), true) );
            }

            while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
            echo 
            "<tr>
            <td>".$row['fname']."</td>
            <td>".$row['lname']."</td>
            <td>".$row['cname']."</td>
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
<h4>Faculties</h4>
</div>
</div>
<div class="card-body">
  <!--============================================-->
<div class="table-responsive">
<table class="table table-bordered table-hover">
<thead class="back_table_color">
<tr class="info">
<th>Event Identifier ID</th>
<th>Event Identifier Name</th>
</tr>
</thead>
<tbody>
          <?php
          $serverName = "localhost";
          $connectionInfo = array( "Database"=>"ksu_crm");
          $urlvariable = $_GET['evt'];
          $conn = sqlsrv_connect( $serverName, $connectionInfo );
          if( $conn === false ) {
          die( print_r( sqlsrv_errors(), true));
          }

          $sql = "select firstname, lastname from faculty, eventdetails
          where eventdetails.f_attending = faculty.f_id
          and eventdetails.e_type = '$urlvariable'
          group by firstname, lastname";
          $stmt = sqlsrv_query( $conn, $sql );
          if( $stmt === false) {
          die( print_r( sqlsrv_errors(), true) );
          }

          while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
          echo "<tr><td>".$row['firstname']."</td><td>".$row['lastname']."</td></tr>" ;

          }
          sqlsrv_free_stmt( $stmt);
          ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</section>
<section class="content">
<div class="row">
<div class="col-lg-12 pinpin">
<div class="card lobicard"  data-sortable="true">
<div class="card-header lobicard-custom-control">
<div class="card-title custom_title">
<h4>Notes</h4>
</div>
</div>
<div class="card-body">
<div class="table-responsive">
<table class="table table-bordered table-hover">
<thead class="back_table_color">
<tr class="info">
<th>Date</th>
<th>Notes</th>
</tr>
</thead>
<tbody>
          <?php
          $serverName = "localhost";
          $connectionInfo = array( "Database"=>"ksu_crm");
          $urlvariable = $_GET['evt'];
          $conn = sqlsrv_connect( $serverName, $connectionInfo );
          if( $conn === false ) {
          die( print_r( sqlsrv_errors(), true));
          }

          $sql = "select date, notes from eventdetails, eventtype where eventdetails.e_type = eventtype.evt_id and e_type = '$urlvariable'";
          $stmt = sqlsrv_query( $conn, $sql );
          if( $stmt === false) {
          die( print_r( sqlsrv_errors(), true) );
          }

          while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
          $date = $row['date'];
          $stringdate = $date->format('Y-m-d');
          echo "<tr><td>".$stringdate."</td><td>".$row['notes']."</td></tr>" ;

          }
          sqlsrv_free_stmt( $stmt);
          ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
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
</body>
</html>

