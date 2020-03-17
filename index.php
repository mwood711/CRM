<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CRM Admin Panel</title>
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

<!-- User -->
<li class="nav-item dropdown dropdown-user">
<a class="nav-link" href="#"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

        <?php
        $urlvariable = $_GET['id']??'';
        require ('dbconfig.php');
        $sql = "select username
        from logintable
        Where username = '$urlvariable'";
        $stmt = sqlsrv_query( $conn, $sql );
        if( $stmt === false) {
        die( print_r( sqlsrv_errors(), true) );
        }

        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
        echo "<table>";
        echo "
        <tr><td>".$row['username']."</td></tr>
        ";
        echo "</table>";
        }
        sqlsrv_free_stmt( $stmt);
        ?>
<div class="dropdown-menu drop_down">
<div class="menus">
<a class="dropdown-item" href="#"><i class="fa fa-user"></i> User Profile</a>
<a class="dropdown-item" href="#"><i class="fa fa-inbox"></i> Inbox</a>
<a class="dropdown-item" href="login.html"><i class="fa fa-sign-out"></i> Signout</a>
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
<li  class="active">
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
<li><a href="addclient.php">Add New Client</a></li>
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
<li>
<a href="events.php">
<i class="fa fa-tree"></i><span>Events</span>
<span class="pull-right-container">
</span>
</a>
</li>
<li>
<a href="document.php">
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
<i class="fa fa-dashboard"></i>
</div>
<div class="header-title">
<h1>CRM Admin Dashboard</h1>
<small>Very detailed & featured admin.</small>
</div>
</section>
<!-- Main content -->
<section class="content">
<div class="row">
<div class=" col-sm-6 col-md-6 col-lg-3">
<div id="cardbox1">
<div class="statistic-box">
<i class="fa fa-user-plus fa-3x"></i>
<div class="counter-number pull-right">
<span class="count-number">
        <?php
        require('dbconfig.php');
        $sql = "select count(c_id) as contacts from contact";
        $stmt = sqlsrv_query( $conn, $sql );
        if( $stmt === false) {
        die( print_r( sqlsrv_errors(), true) );
        }
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
        echo "
        <tr><td>".$row['contacts']."</td></tr> ";
        }
        sqlsrv_free_stmt( $stmt);
        ?>   
</span> 
<span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
</span>
</div>
<h3> Active Clients</h3>
</div>
</div>
</div>
<div class=" col-sm-6 col-md-6 col-lg-3">
<div id="cardbox2">
<div class="statistic-box">
<i class="fa fa-user-secret fa-3x"></i>
<div class="counter-number pull-right">
<span class="count-number">
        <?php
        require('dbconfig.php');
        $sql = "select count(f_id) as no_fac from faculty";
        $stmt = sqlsrv_query( $conn, $sql );
        if( $stmt === false) {
        die( print_r( sqlsrv_errors(), true) );
        }
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
        echo "
        <tr><td>".$row['no_fac']."</td></tr> ";
        }
        sqlsrv_free_stmt( $stmt);
        ?>
</span> 
<span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
</span>
</div>
<h3>  Active Faculties</h3>
</div>
</div>
</div>
<div class=" col-sm-6 col-md-6 col-lg-3">
<div id="cardbox3">
<div class="statistic-box">
<i class="fa fa-calendar fa-3x"></i>
<div class="counter-number pull-right">
<i class="fa fa-files"></i><span class="count-number">
        <?php
        require('dbconfig.php');
        $sql = "select count(evt_id) As upcoming from eventtype WHERE date >= getdate() ";
        $stmt = sqlsrv_query( $conn, $sql );
        if( $stmt === false) {
        die( print_r( sqlsrv_errors(), true) );
        }
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
        echo "
        <tr><td>".$row['upcoming']."</td></tr> ";
        }
        sqlsrv_free_stmt( $stmt);
        ?>   
</span> 
<span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
</span>
</div>
<h3>  Upcoming Events</h3>
</div>
</div>
</div>
<div class=" col-sm-6 col-md-6 col-lg-3">
<div id="cardbox4">
<div class="statistic-box">
<i class="fa fa-files-o fa-3x"></i>
<div class="counter-number pull-right">
<span class="count-number">
        <?php
        require('dbconfig.php');  
        $sql = "select count(evt_id) As passed from eventtype ";
        $stmt = sqlsrv_query( $conn, $sql );
        if( $stmt === false) {
        die( print_r( sqlsrv_errors(), true) );
        }
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
        echo "
        <tr><td>".$row['passed']."</td></tr> ";
        }
        sqlsrv_free_stmt( $stmt);
        ?>   
</span> 
<span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
</span>
</div>
<h3>All Events</h3>
</div>
</div>
</div>

</div>
<!-- Main Content-->
<!-- Where to change information on the main page while keeping important stuff-->
<div class="row">
<div class="col-lg-6 pinpin">
<div class="card lobicard lobicard-custom-control"  data-sortable="true">
<div class="card-header">
<div class="card-title custom_title">
<h4>upcoming Events</h4>
</div>
</div>
<div class="card-body">
<div class="Workslist">
<div class="worklistdate">
<table class="table table-hover">
<thead class="border_border">
<tr>
<th>Event Name</th>
<th>Events date</th>
</tr>
</thead>
<tbody>
        <?php
        require('dbconfig.php');
        $sql = "Select  evt_name, date  FROM eventtype WHERE date >= getdate() ";
        $stmt = sqlsrv_query( $conn, $sql );
        if( $stmt === false) {
        die( print_r( sqlsrv_errors(), true) );
        }
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
         $date = $row['date'];
        $stringdate = $date->format('m-d-y');
        echo 
        "<tr>
        <td>".$row['evt_name']."</td>
        <td>".$stringdate."</td>
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
</div>
<div class="col-lg-6 pinpin">
<div class="card lobicard lobicard-custom-control"  data-sortable="true">
<div class="card-header">
<div class="card-title custom_title">
<h4>Chart Showing Percentage of Contacts at an event</h4>
</div>
</div>
<div class="card-body">
<div style="width:100%;">   
<div id="chart" style="width: 100%; height: 400px;"></div>  
</div>  
</div>
</div>
</div>
<!-- /.content-wrapper -->
</div>
</section>
</div>
<div>      
<footer class="main-footer">
<strong>Copyright &copy; 2019-2020 <a href="#">CRM Tool</a>.</strong> All rights reserved.
</footer>
</div>
<!-- /.wrapper -->
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
<!-- NIceScroll -->
<script src="assets/plugins/slimScroll/jquery.nicescroll.min.js" ></script>
<!-- FastClick -->
<script src="assets/plugins/fastclick/fastclick.min.js" ></script>
<!-- CRMadmin frame -->
<script src="assets/dist/js/custom.js" ></script>
<!-- End Core Plugins
=====================================================================-->
<!-- Start Page Lavel Plugins
=====================================================================-->
<!-- ChartJs JavaScript -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="assets/plugins/chartJs/Chart.min.js" ></script>
<!-- Counter js -->
<script src="assets/plugins/counterup/waypoints.js" ></script>
<script src="assets/plugins/counterup/jquery.counterup.min.js" ></script>
<!-- Monthly js -->
<script src="assets/plugins/monthly/monthly.js" ></script>
<!-- End Page Lavel Plugins
=====================================================================-->
<!-- Start Theme label Script
=====================================================================-->
<!-- Dashboard js -->
<script src="assets/dist/js/dashboard.js" ></script>
<!-- End Theme label Script
=====================================================================-->

<!--=============Chart Script==========-->
<script type="text/javascript"> 
        <?php
        require('dbconfig.php');

        $sql = "SELECT evt_name,count(contact.c_id) as contacts FROM eventtype,contact,eventdetails 
        Where contact.c_id = eventdetails.c_id 
        and eventtype.evt_id = eventdetails.e_type 
        group by evt_name
        ORDER BY evt_name";

        $stmt = sqlsrv_query( $conn, $sql ); 
        ?>
google.charts.load('current', {'packages':['corechart']});  
google.charts.setOnLoadCallback(drawChart);  
function drawChart()  
{  
var data = google.visualization.arrayToDataTable([  
['evt_name', 'contacts'], 

        <?php  
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) )  
        {  
        echo "['".$row["evt_name"]."', ".$row["contacts"]."],";  
        }  
        ?>  
]);  
var options = {  
//title: 'Percentage of contacts and Events',
bar: {groupWidth: "90%"},
is3D: false,
hAxis: {
title: 'Events',
viewWindow: {
 min: [7, 30, 0],
 max: [17, 30, 0]
 }
},
 vAxis: {
 title: 'Number of Clients'
 }
};  
var chart = new google.visualization.PieChart(document.getElementById('chart'));  
chart.draw(data, options);  
}  
</script>  
</body>
</html>

