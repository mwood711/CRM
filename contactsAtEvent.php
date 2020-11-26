<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Contacts At Event</title>
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

<style>
    small a { color:    #008B8B; }
    small a:hover { color: grey; };

  small a:hover{
    color: grey;
  }

  ul li button{
    margin-left: 12px;
    border: none;
    background: none;
  }

</style>
</head>
<body class="hold-transition sidebar-mini">

<?php 

      include 'assets/php/top-nav.php';
?>
<div>
  <?php

        $event_id = $_GET['event_id'];

        require ('dbconfig.php');
        
        $sql = "SELECT description 
                FROM event WHERE event_id = '".$event_id."'";
        $stmt = sqlsrv_query( $conn, $sql );
        if( $stmt === false) {
        die( print_r( sqlsrv_errors(), true) );
        }

        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {

            $description = $row['description'];

        }
        sqlsrv_free_stmt( $stmt);

     ?>

<div class="container-fluid">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="header-icon"><i class="fa fa-user-circle-o"></i></div>
<div class="header-title">
<h1>Contacts Attending  <button class="ml-3 btn btn-success btn-sm" onclick="window.location='addContactAtEvent.php?event_id=<?php echo $event_id; ?> '">Add Contact</button></h1>
<small><a href="events">Back to List</a></small>
</div>
</section>
<!-- Main content -->
<section class="content">
<div class="row">
<div class="col-sm-4 pinpin">
<div class="card lobicard"  data-sortable="true">
<div class="card-header lobicard-custom-control">
<div class="card-title custom_title">
    <h4><?php echo $description; ?></h4>
</div>
</div>

<div class="btn-group ml-3 mt-3">
<button class="btn btn-exp btn-sm" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Table Data</button>
<ul class="dropdown-menu exp-drop" role="menu">
<li class="dropdown-divider"></li>
<li>
   <a href="#" onclick="$('#excelTable').tableExport({type:'excel',escape:'false'});"> 
   <img src="assets/dist/img/excel.png" width="24" alt="logo"> Excel</a>
</li>
 <li>
      <button type="button" onclick="window.location='PDF-generate/generate-contactAtEvent-pdf.php?event_id=<?php echo $event_id; ?> '">
      <img src="assets/dist/img/pdf.png" width="24" alt="logo"> PDF</button>
</li>
</ul>
</div>
<div class="card-body">
<div class="table-responsive">
<table class="table table-bordered table-hover">
<thead class="back_table_color">
   <tr class="info">
   <th>First Name</th>
   <th>Last Name</th>
   <th>Company</th>
   <th></th>

</thead>
<tbody>
        <?php
         require ('dbconfig.php');
        
        $sql = "SELECT * 
                FROM Event
                INNER JOIN ContactAtEvent ON ContactAtEvent.event_id = Event.event_id
                INNER JOIN Contact ON ContactAtEvent.contact_id = Contact.contact_id 
                INNER JOIN Company ON Company.company_id = Contact.company_id 
                WHERE event.event_id = '".$event_id."'";
        $stmt = sqlsrv_query( $conn, $sql );
        if( $stmt === false) {
        die( print_r( sqlsrv_errors(), true) );
        }

        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {

        echo 
        "
        <tr onclick=\"window.location='ClientDetails?custid=".$row["contact_id"]."'\">
        <td>".$row['fname']."</td>
        <td>".$row['lname']."</td>
        <td>".$row['company_name']."</td>
        <td><a href=\"deleteContactAtEventQuery.php?contact_event_id=".$row['contact_event_id']."\" style='color:red'>Delete</a></td>
        </tr>
        
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

<table id="excelTable" style="visibility:hidden">
  <thead>
  <tr>
  <th>First Name</th>
  <th>Last Name</th>
  <th>Title</th>
  <th>Email</th>
  <th>Phone</th>
  <th>Event</th>
  </tr>
  </thead>
  <tbody>
          <?php
          require('dbconfig.php');


          $sql = "SELECT * 
                FROM Event
                INNER JOIN ContactAtEvent ON ContactAtEvent.event_id = Event.event_id
                INNER JOIN Contact ON ContactAtEvent.contact_id = Contact.contact_id 
                WHERE event.event_id = '".$event_id."'";
          $stmt = sqlsrv_query( $conn, $sql );
          if( $stmt === false) {
          die( print_r( sqlsrv_errors(), true) );
          }

          while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {


          echo "<tr>

                  <td>".$row['fname']."</td>
                  <td>".$row['lname']."</td>
                  <td>".$row['title']."</td>
                  <td>".$row['email']."</td>
                  <td>".$row['phone']."</td>
                  <td>".$row['description']."</td>
          
                  </tr>" ;
          }
          sqlsrv_free_stmt( $stmt);
          ?>
  </tbody>
  
</table>

<!-- /.content -->
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

<!-- table-export js -->
<script src="assets/plugins/table-export/tableExport.js" ></script>
<script src="assets/plugins/table-export/jquery.base64.js" ></script>
<script src="assets/plugins/table-export/html2canvas.js" ></script>
<script src="assets/plugins/table-export/sprintf.js" ></script>
<script src="assets/plugins/table-export/jspdf.js" ></script>
<script src="assets/plugins/table-export/base64.js" ></script>
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