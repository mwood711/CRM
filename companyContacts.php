<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Company Contacts</title>
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
<!-- dataTables css -->
<link href="assets/plugins/datatables/dataTables.min.css" rel="stylesheet" />
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

      $company_id =$_REQUEST['company_id'];
 

     require('dbconfig.php');
     $sql = "SELECT company_id, company_name FROM company where company_id='".$company_id."'";
     $stmt = sqlsrv_query( $conn, $sql );
     if( $stmt === false) {
     die( print_r( sqlsrv_errors(), true) );
     }
     while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
     
        $company_name = $row['company_name'];
      
     }
     sqlsrv_free_stmt( $stmt);
?>
<div>

<div class="container-fluid">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="header-icon">
<i class="fa fa-user-plus"></i>
</div>
<div class="header-title">
<h1><?php echo $company_name ?></h1>
<small><a href="company">Back to List</a></small>
</div>
</section>
<!-- Main content -->
<section class="content">
<div class="row">
<div class="col-lg-12 pinpin">
<div class="card lobicard" id="lobicard-custom-control" data-sortable="true">
<div class="card-header">
<div class="card-title custom_title">
<h4></h4>
</div>
</div>
<!-- =============================================== -->
<div class="card-body">

<div class="btn-group">
<button class="btn btn-exp btn-sm" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Table Data</button>
<ul class="dropdown-menu exp-drop" role="menu">
<li class="dropdown-divider"></li>
<li>
<a href="#" onclick="$('#dataTableExample1').tableExport({type:'excel',escape:'false'});"> 
<img src="assets/dist/img/excel.png" width="24" alt="logo"> Excel</a>
</li>
  <li>
      <button type="button" onclick="window.location='PDF-generate/generate-companyContacts-pdf.php?id=<?php echo $company_id; ?> '">
      <img src="assets/dist/img/pdf.png" width="24" alt="logo"> PDF</button>
   </li>
</ul>
</div>
<!-- ./Plugin content:powerpoint,txt,pdf,png,word,xl -->
<!-- =============================================== -->
<div class="table-responsive">
<table class="table table-bordered table-striped table-hover">
<thead class="back_table_color">
 <tr class="info">
   <th>First Name</th>
   <th>Last Name</th>
   <th>Title</th>
   <th>Info</th>
   <th>Phone</th>
   <th>Email</th>
   </tr>
   </thead>
   <tbody>
   <?php
         require('dbconfig.php');
         $sql = "SELECT * FROM Contact where company_id='".$company_id."'";
         $stmt = sqlsrv_query( $conn, $sql );
         if( $stmt === false) {
         die( print_r( sqlsrv_errors(), true) );
         }
         while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
         echo "<tr onclick=\"window.location='ClientDetails?custid=".$row["contact_id"]."'\">
         <td>".$row['fname']."</td>
         <td>".$row['lname']."</td>
         <td>".$row['title']."</td>
         <td>".$row['info']."</td>
         <td>".$row['phone']."</td>
         <td>".$row['email']."</td>
         
         </tr>";
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

<!--Add User Modal1 -->
<div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header modal-header-primary">
<h3><i class="fa fa-plus m-r-5"></i> Add New Company</h3>
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<div class="modal-body">
<div class="row">
<div class="col-md-12">
<form class="form-horizontal" action="AddCom.php" method="POST">
<div class="row">
<div class="col-md-6 form-group">
<label>Company Name</label>
<input type="text" class="form-control" name="company_name" placeholder="Enter Company Name" required>
</div>
<div class="col-md-12 form-group user-form-group">
<div class="float-right">
<button type="submit" class="btn btn-add btn-sm" name="submit" value="Add">Submit</button>
<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
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
</div>
</div>

<table id="dataTableExample1" style="visibility: hidden;">
<thead>
 <tr>
   <th>First Name</th>
   <th>Last Name</th>
   <th>Title</th>
   <th>Info</th>
   <th>Phone</th>
   <th>Email</th>
   <th>Address</th>
   <th>City</th>
   <th>State</th>
   <th>Zip</th>
   </tr>
   </thead>
   <tbody>
   <?php
         require('dbconfig.php');
         $sql = "SELECT * FROM Contact where company_id='".$company_id."'";
         $stmt = sqlsrv_query( $conn, $sql );
         if( $stmt === false) {
         die( print_r( sqlsrv_errors(), true) );
         }
         while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
         echo "<tr onclick=\"window.location='ClientDetails?custid=".$row["contact_id"]."'\">
         <td>".$row['fname']."</td>
         <td>".$row['lname']."</td>
         <td>".$row['title']."</td>
         <td>".$row['info']."</td>
         <td>".$row['phone']."</td>
         <td>".$row['email']."</td>
         <td>".$row['address']."</td>
         <td>".$row['city']."</td>
         <td>".$row['state']."</td>
         <td>".$row['zip']."</td>
         
         </tr>";
         }
         sqlsrv_free_stmt( $stmt);
   ?>
</tbody>
</table>

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
<!-- table-export js -->
<script src="assets/plugins/table-export/tableExport.js" ></script>
<script src="assets/plugins/table-export/jquery.base64.js" ></script>
<script src="assets/plugins/table-export/html2canvas.js" ></script>
<script src="assets/plugins/table-export/sprintf.js" ></script>
<script src="assets/plugins/table-export/jspdf.js" ></script>
<script src="assets/plugins/table-export/base64.js" ></script>
<!-- dataTables js -->
<script src="assets/plugins/datatables/dataTables.min.js" ></script>
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
