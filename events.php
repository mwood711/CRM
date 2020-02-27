<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CRM Admin panel</title>
<!-- Favicon and touch icons --> 
<link rel="shortcut icon" href="assets/dist/img/ico/favicon.png" type="image/x-icon">
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
<!--preloader-->
<div id="preloader">
<div id="status"></div>
</div>
<!-- Site wrapper -->
<div class="wrapper">
<header class="main-header">
<a href="index.php" class="logo">
<!-- Logo -->
<span class="logo-mini">
<img src="assets/dist/img/mini-logo.png" alt="">
</span>
<span class="logo-lg">
<img src="assets/dist/img/logo.png" alt="">
</span>
</a>
<!-- Header Navbar -->
<nav class="navbar navbar-expand py-0">
<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
<!-- Sidebar toggle button-->
<span class="sr-only">Toggle navigation</span>
<span class="pe-7s-angle-left-circle"></span>
</a>
<!-- searchbar-->
<a href="#search"><span class="pe-7s-search"></span></a>
<div id="search">
<button type="button" class="close">×</button>
<form>
<input type="search" value="" placeholder="Search.." />
<button type="submit" class="btn btn-add">Search...</button>
</form>
</div>
<div class="collapse navbar-collapse navbar-custom-menu" >
<ul class="navbar-nav ml-auto">

<!-- Help -->
<li class="nav-item dropdown  dropdown-help">
<a class="nav-link hidden_hidden" href="#"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<i class="pe-7s-settings"></i></a>

<div class="dropdown-menu drop_down" >
<div class="menus">
<a class="dropdown-item" href="#"> <i class="fa fa-line-chart"></i> Networking</a>
<a class="dropdown-item" href="#"><i class="fa fa fa-bullhorn"></i> Lan settings</a>
<a class="dropdown-item" href="#"><i class="fa fa-bar-chart"></i> Settings</a>
<a class="dropdown-item" href="#"><i class="fa fa-wifi"></i> wifi</a>
</div>
</div>
</li>
<!-- User -->
<li class="nav-item dropdown dropdown-user">
<a class="nav-link" href="#"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<img src="assets/dist/img/avatar5.png" class="rounded-circle" width="50" height="50" alt="user"></a>

<div class="dropdown-menu drop_down" >
<div class="menus">
<a class="dropdown-item" href="#"><i class="fa fa-user"></i> User Profile</a>
<a class="dropdown-item" href="#"><i class="fa fa-inbox"></i> Inbox</a>
<a class="dropdown-item" href="#"><i class="fa fa-sign-out"></i> Signout</a>
</div>
</div>
</li>
</ul>
</div>
</nav>
</header>
<!-- =============================================== -->
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
<!-- sidebar -->
<div class="sidebar">
<!-- sidebar menu -->
<ul class="sidebar-menu">
<li>
<a href="index.php"><i class="fa fa-tachometer"></i><span>Dashboard</span>
<span class="pull-right-container">
</span>
</a>
</li>
<li class="treeview">
<a href="#">
<i class="fa fa-users"></i><span>Client</span>
<span class="pull-right-container">
<i class="fa fa-angle-left float-right"></i>
</span>
</a>
<ul class="treeview-menu">
<li><a href="addclient.html">Add New Client</a></li>
<li><a href="clientlist.php">Client List</a></li>
<!-- <li><a href="group.html">Groups</a></li> -->
</ul>
</li>
<li> 
<a href="faculty.php">
<i class="fa fa-user-circle"></i><span>Faculty</span>
<span class="pull-right-container">
</span>
</a>
</li>
<li class="active">
<a href="events.php">
<i class="fa fa-tree"></i><span>Events</span>
<span class="pull-right-container">
</span>
</a>
</li>
<li>
<a href="document.html">
<i class="fa fa-file-text"></i> <span>Documents</span>
<span class="pull-right-container">
</span>
</a>
</li>
</ul>
</div>
<!-- /.sidebar -->
</aside>
<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
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
<h4>Event Types</h4>
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
<table class="table table-bordered table-hover">
<thead class="back_table_color">
<tr class="info">
<th>Event ID</th>
<th>Event Name</th>
<th>Event Type</th>
</tr>
</thead>
<tbody>
            <?php
            $serverName = "localhost\\SQLEXPRESS";
            $connectionInfo = array( "Database"=>"ksu_crm");
            $conn = sqlsrv_connect( $serverName, $connectionInfo );
            if( $conn === false ) {
            die( print_r( sqlsrv_errors(), true));
            }

            $sql = "Select evt_id, evt_name,evi_name  FROM eventtype,eventidentifier where eventtype.evi_idd = eventidentifier.evi_id ";
            $stmt = sqlsrv_query( $conn, $sql );
            if( $stmt === false) {
            die( print_r( sqlsrv_errors(), true) );
            }

            while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
            echo 
            "<tr>
            <td>".$row['evt_id']."</td>
            <td>".$row['evt_name']."</td>
            <td>".$row['evi_name']."</td>
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
</tr>
</thead>
<tbody>
          <?php
          $serverName = "localhost\\SQLEXPRESS";
          $connectionInfo = array( "Database"=>"ksu_crm");
          $conn = sqlsrv_connect( $serverName, $connectionInfo );
          if( $conn === false ) {
          die( print_r( sqlsrv_errors(), true));
          }

          $sql = "SELECT evi_id, evi_name FROM eventidentifier ";
          $stmt = sqlsrv_query( $conn, $sql );
          if( $stmt === false) {
          die( print_r( sqlsrv_errors(), true) );
          }

          while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
          echo "<tr><td>".$row['evi_id']."</td><td>".$row['evi_name']."</td></tr>" ;

          }
          sqlsrv_free_stmt( $stmt);
          ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
<div class="col-lg-12 pinpin">
<div class="card lobicard"  data-sortable="true">
<div class="card-header lobicard-custom-control">
<div class="card-title custom_title">
<h4>All Events</h4>
</div>
</div>
<div class="card-body">
  <!--============================================-->
<!-- Add Events details  -->
<div class="btn-group d-flex" role="group">
<div class="buttonexport"> 
<a href="#" class="btn btn-add" data-toggle="modal" data-target="#addevduser"><i class="fa fa-plus"></i> Add Event Details</a>  
</div>
</div>
<div class="table-responsive">
<table class="table table-bordered table-hover">
<thead class="back_table_color">
<tr class="info">
<th>Events ID</th>
<th>Events Name</th>
<th>Location</th>
<th>Dates</th>
</tr>
</thead>
<tbody>
        <?php
        $serverName = "localhost\\SQLEXPRESS";
        $connectionInfo = array( "Database"=>"ksu_crm");
        $conn = sqlsrv_connect( $serverName, $connectionInfo );
        if( $conn === false ) {
        die( print_r( sqlsrv_errors(), true));
        }

        $sql = "SELECT distinct evt_id, evt_name, place ,date FROM eventdetails, eventtype WHERE eventtype.evt_id = eventdetails.e_type group by evt_id,evt_name,notes,place,date";
        $stmt = sqlsrv_query( $conn, $sql );
        if( $stmt === false) {
        die( print_r( sqlsrv_errors(), true) );
        }
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
        $date = $row['date'];
        $stringdate = $date->format('Y-m-d');
        echo "
        <tr onclick=\"window.location='eventsDetails.php?evt=".$row["evt_id"]."'\">
        <td>".$row['evt_id']."</td>
        <td>".$row['evt_name']."</td>
        <td>".$row['place']."</td>
        <td>".$stringdate."</td></tr>" ;

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
<input type="text" class="form-control" name="evt_name" placeholder="Enter Event Name" required>
</div>
<div class="col-md-6 form-group">
  <div class="input-group">
<label for="inputGroupSelect">Event Identifier ID</label>
  </div>
  <select class="custom-select" name="evi_idd" id="inputGroupSelect">
    <option selected>Select Event ID</option>
    <option value="1">Project</option>
    <option value="2">Meeting</option>
    <option value="3">Gift</option>
    <option value="9">Event</option>
  </select>
</div>
<div class="col-md-6 form-group">
<label>Event Date</label>
<input type="date" class="form-control" name="date" placeholder="Enter Event date" required>
</div>
<div class="col-md-6 form-group">
<label>Event Time</label>
<input type="time" class="form-control" name="time" placeholder="Enter Event time" required>
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
<input type="text" class="form-control" name="evi_name" placeholder="Enter Event Identifier Name" required>
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
<label>Event Type ID</label>
<input type="number" class="form-control" name="e_type" placeholder="Enter Event ID" >
</div>
<div class="col-md-6 form-group">
<label>Enter Notes From Events</label>
<textarea type="text" class="form-control" name="notes" placeholder="Enter notes from event" ></textarea>
</div>
<!-- Text input-->
<div class="col-md-6 form-group">
<label>Faculty who attended</label>
<input type="number" class="form-control" name="f_attending" placeholder="Enter Faculty ID" >
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
<label>Contact ID</label>
<input type="number" class="form-control" name="c_id" placeholder="Enter Id of Client who attended" >
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
<!-- /.content-wrapper -->
<footer class="main-footer">
<strong>Copyright &copy; 2016-2017 <a href="#">thememinister</a>.</strong> All rights reserved.
</footer>
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

