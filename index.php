<?php 

    session_start();
    if ($_SESSION['role'] != 'user' && $_SESSION['role'] != 'admin')
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
<title>Dashboard</title>
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
<!-- header -->
<?php 

    include 'assets/php/top-nav.php';
?>  

<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="container-fluid">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="header-icon">
<i class="fa fa-dashboard"></i>
</div>
<div class="header-title">
<h1>CCSE CRM Dashboard</h1>
<small>The Best CCSE CRM Tool</small>
</div>
</section>
<!-- Main content -->
<section class="content">
<div class="row">

<div class=" col-sm-6 col-md-6 col-lg-3">
    <a href="clientlist">
<div id="cardbox1">
<div class="statistic-box">
<i class="fa fa-user-plus fa-3x" style=" color: white"></i>
<div class="counter-number pull-right">
<span class="count-number">
        <?php
        require('dbconfig.php');
        $sql = "select count(contact_id) as contacts from contact";
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

<h3><font color="white">Active Contacts</font></h3>
<span class="pull-right-container">

</div>
</div></a>
</div>
<div class=" col-sm-6 col-md-6 col-lg-3">
    <a href="faculty">
<div id="cardbox2">
<div class="statistic-box">
<i class="fa fa-calculator fa-3x" aria-hidden="true" style=" color: white"></i>
<div class="counter-number pull-right">
<span class="count-number">
        <?php
        require('dbconfig.php');
        $sql = "select count(faculty_id) as no_fac from faculty";
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
<h3><font color="white">Active Faculty</font></h3>
<span class="pull-right-container">

</div>
</div></a>
</div>
<div class=" col-sm-6 col-md-6 col-lg-3">
    <a href="calender">
<div id="cardbox3">
<div class="statistic-box">
<i class="fa fa-calendar fa-3x" fa-8x style= "color:white"></i>
<div class="counter-number pull-right">
<i class="fa fa-files"></i><span class="count-number">
        <?php
        require('dbconfig.php');
        $sql = "select count(event_id) As upcoming from event WHERE date >= getdate() ";
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
<h3><font color="white"font-size: 12px; >Calendar</font></h3>
<span class="pull-right-container">
</div>
</div></a>
</div>
<div class=" col-sm-6 col-md-6 col-lg-3">
    <a href="events">
<div id="cardbox4">
<div class="statistic-box">
<i class="fa fa-calendar-o fa-3x" style= "color:white" aria-hidden="true"></i>
<div class="counter-number pull-right">
<span class="count-number">
        <?php
        require('dbconfig.php');  
        $sql = "select count(event_id) As passed from event";
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
<h3><font color="white">All Events</font></h3>
<span class="pull-right-container">
</div>
</div></a>
</div>

</div>
<!-- Main Content-->
<!-- Where to change information on the main page while keeping important stuff-->
<div class="row">
<div class="col-lg-6 pinpin">
<div class="card lobicard lobicard-custom-control"  data-sortable="true">
<div class="card-header">
<div class="card-title custom_title">
</a>
<h4>Events in the next 60 days</h4>
</div>
</div>
<div class="card-body">
<div class="Workslist">
<div class="worklistdate">
<table class="table table-hover">
<thead class="border_border">
<tr>
<th>Event Name</th>
<th>Events Date</th>
</tr>
</thead>
<tbody>
       <?php
        $serverName = "localhost";
        $connectionInfo = array( "Database"=>"CRM");
        $conn = sqlsrv_connect( $serverName, $connectionInfo );
        if( $conn === false ) {
        die( print_r( sqlsrv_errors(), true));
        } 
        $sql = "Select  event_id, date, description FROM event WHERE date >= CAST(GETDATE() AS DATE) AND date <= CAST(DATEADD(day, +60, GETDATE()) AS DATE) " ;
        $stmt = sqlsrv_query( $conn, $sql );
        if( $stmt === false) {
        die( print_r( sqlsrv_errors(), true) );
        }
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
         
         $date = $row['date'];
         $stringdate = $date->format('m-d-y');
        echo 
        "<tr>
        <td>".$row['description']."</td>
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
<h4>Contacts that haven't been reached lately</h4>
</div>
</div>
<div class="card-body">
<div style="width:100%;">   
<div id="chart" style="width: 100%; height: 400px;">

<table class="table table-hover">
<thead class="border_border">
<tr>
<th>Contact Name</th>
<th>Last Contacted</th>
</tr>
</thead>
<tbody>
       <?php
        $serverName = "localhost";
        $connectionInfo = array( "Database"=>"CRM");
        $conn = sqlsrv_connect( $serverName, $connectionInfo );
        if( $conn === false ) {
        die( print_r( sqlsrv_errors(), true));
        } 
        $sql = "Select top 5 * from ContactLog order by date " ;
        $stmt = sqlsrv_query( $conn, $sql );
        if( $stmt === false) {
        die( print_r( sqlsrv_errors(), true) );
        }
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
         
         $date = $row['date'];
        $stringdate = $date->format('m-d-y');
        echo 
        "<tr>
        <td>".$row['fname']." ". $row['lname'] ."</td>
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
<!-- /.content-wrapper -->
</div>
</section>
</div>
<div>      

<!-- footer -->
<?php 
    include 'assets/php/footer.php';
?>
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

        $sql = "SELECT event_name,count(contact.contact_id) as contacts FROM event,contact,eventdetails 
        Where contact.c_id = eventdetails.c_id 
        and eventtype.event_id = eventdetails.e_type 
        group by event_name
        ORDER BY event_name";

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
//title: 'Percentage of Contacts and Events',
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
<script>
function dash() {
// single bar chart
var ctx = document.getElementById("singelBarChart");
var myChart = new Chart(ctx, {
type: 'bar',
data: {
labels: ["Sun", "Mon", "Tu", "Wed", "Th", "Fri", "Sat"],
datasets: [
{
label: "My First dataset",
data: [40, 55, 75, 81, 56, 55, 40],
borderColor: "rgba(0, 150, 136, 0.8)",
width: "1",
borderWidth: "0",
backgroundColor: "rgba(0, 150, 136, 0.8)"
}
]
},
options: {
scales: {
yAxes: [{
ticks: {
beginAtZero: true
}
}]
}
}
});
//monthly calender
$('#m_calendar').monthly({
mode: 'event',
//jsonUrl: 'events.json',
//dataType: 'json'
xmlUrl: 'events.xml'
});

//bar chart
var ctx = document.getElementById("barChart");
var myChart = new Chart(ctx, {
type: 'bar',
data: {
labels: ["January", "February", "March", "April", "May", "June", "July", "august", "september","october", "Nobemver", "December"],
datasets: [
{
label: "My First dataset",
data: [65, 59, 80, 81, 56, 55, 40, 65, 59, 80, 81, 56],
borderColor: "rgba(0, 150, 136, 0.8)",
width: "1",
borderWidth: "0",
backgroundColor: "rgba(0, 150, 136, 0.8)"
},
{
label: "My Second dataset",
data: [28, 48, 40, 19, 86, 27, 90, 28, 48, 40, 19, 86],
borderColor: "rgba(51, 51, 51, 0.55)",
width: "1",
borderWidth: "0",
backgroundColor: "rgba(51, 51, 51, 0.55)"
}
]
},
options: {
scales: {
yAxes: [{
ticks: {
beginAtZero: true
}
}]
}
}
});
//counter
$('.count-number').counterUp({
delay: 10,
time: 5000
});
}
dash();         
</script>
</body>
</html>

