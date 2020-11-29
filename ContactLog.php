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
<title>Contact Log</title>
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
<i class="fa fa-folder-open" aria-hidden="true"></i>
</div>
<div class="header-title">
<h1>Contact Log</h1>
<small></small>
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
<!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
<div class="btn-group d-flex" role="group">
<div class="buttonexport"> 
<a href="#" class="btn btn-add" data-toggle="modal" data-target="#addlog"><i class="fa fa-plus"></i> Add New Contact Log</a>  
</div>
</div>
<div class="btn-group">
<button class="btn btn-exp btn-sm" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Table Data</button>
<ul class="dropdown-menu exp-drop" role="menu">
<li class="dropdown-divider"></li>
<li>
<a href="#" onclick="$('#dataTableExample1').tableExport({type:'excel',escape:'false'});"> 
<img src="assets/dist/img/excel.png" width="24" alt="logo"> Excel</a>
</li>
  <li>
      <a href="PDF-generate/generate-contactLog-pdf.php" > 
      <img src="assets/dist/img/pdf.png" width="24" alt="logo"> PDF</a>
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
   <th>Company</th>
   <th>Contact Date</th>
   <th></th>
   <th></th>
   </tr>
   </thead>
   <tbody>
   <?php
         require('dbconfig.php');
         $sql = "SELECT * FROM Contact inner join ContactLog on contact.contact_id = contactlog.contact_id
         inner join Company on company.company_id = Contact.company_id
          order by contactlog.contactDate desc";
         $stmt = sqlsrv_query( $conn, $sql );
         if( $stmt === false) {
         die( print_r( sqlsrv_errors(), true) );
         }
         while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
          
        $date = $row['contactDate'];
        $stringdate = $date->format('m-d-y');
        echo 
        "<tr onclick=\"window.location='contactLogDetails.php?id=".$row["id"]."'\">
        <td>".$row['fname']."</td>
        <td>".$row['lname']."</td>
        <td>".$row['company_name']."</td>
        <td>".$stringdate."</td>
        <td align='center'><a href=\"editLog.php?id=".$row['id']."\" style='color:blue'>Update</a></td>
        <td align='center'><a href=\"deleteLogQuery.php?id=".$row['id']."\" style='color:red'>Delete</a></td>
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

<!--Add User Modal1 -->
<div class="modal fade" id="addlog" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header modal-header-primary">
<h3><i class="fa fa-plus m-r-5"></i> Add New Contact Log</h3>
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<div class="modal-body">
<div class="row">
<div class="col-md-12">
<form class="form-horizontal" action="addLogQuery.php" method="POST">
<div class="row">
<div class="col-md-6 form-group">
<label>Contact</label>
  
  <select class="form-control" name="contact_id">
    <option selected>--Select Contact--</option>
     <?php
          require('dbconfig.php');
          $sql = "SELECT * FROM contact"; 
          $stmt = sqlsrv_query($conn, $sql );
          while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){
          echo "<option value='".$row['contact_id']."'>".$row['fname']." ".$row['lname']."</option>";
          }
      ?>
  </select>
</div>


<?php 

    require('dbconfig.php');
    $sql = "SELECT TOP 1 * FROM ContactLog ORDER BY id DESC";
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

            $id = $row['id'] + 1;
            ++$x;
      }

  
    
    sqlsrv_free_stmt( $stmt);
 ?>
 <div class="col-md-6 form-group">
<label>Contact Date</label>
<input type="date" class="form-control" name="contactDate" placeholder="Enter Contact Date" required>
</div>
<div class="col-md-12 form-group">
<label>Description</label>
<textarea class="form-control" name="description" placeholder="Enter Contact Description" required></textarea>
</div>
<input type="hidden" name="id" value="<?php echo $id ?>"/>
<div class="col-md-12 form-group user-form-group">
<div class="float-right">
<button type="submit" class="btn btn-success btn-sm" name="submit" value="Add">Add</button>
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

<table id="dataTableExample1" style="visibility: hidden">
<thead>
 <tr>
   <th>Contact First Name</th>
   <th>Contact Last Name</th>
   <th>Company Name</th>
   <th>Description</th>
   <th>Contact Date</th>
   </tr>
   </thead>
   <tbody>
   <?php
         require('dbconfig.php');
         $sql = "SELECT * FROM Contact inner join ContactLog on contact.contact_id = contactlog.contact_id
         inner join Company on company.company_id = Contact.company_id
          order by contactlog.contactDate desc";
         $stmt = sqlsrv_query( $conn, $sql );
         if( $stmt === false) {
         die( print_r( sqlsrv_errors(), true) );
         }
         while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
         $date = $row['contactDate'];
        $stringdate = $date->format('m-d-y');
        echo 
        "<tr>
        <td>".$row['fname']."</td>
        <td>".$row['lname']."</td>
        <td>".$row['company_name']."</td>
        <td>".$row['description']."</td>
        <td>".$stringdate."</td>
        </tr>" ;
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