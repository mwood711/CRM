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
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Contact Log Details</title>
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
      $id = $_GET['id'];
?>
<div>


<div class="container-fluid">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="header-icon"><i class="fa fa-user-circle-o"></i></div>
<div class="header-title">
<h1>Contact Log Details</h1>
<small><a href="ContactLog">Back to List</a></small>
</div>
</section>
<!-- Main content -->
<section class="content">
<div class="row">
<div class="col-sm-12 pinpin">
<div class="card lobicard"  data-sortable="true">
<div class="card-header lobicard-custom-control">
<div class="card-title custom_title">
<h4>Log Information</h4>
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
      <button type="button" onclick="window.location='PDF-generate/generate-individualLog-pdf.php?id=<?php echo $id; ?> '">
      <img src="assets/dist/img/pdf.png" width="24" alt="logo"> PDF</button>
</li>
</ul>
</div>
<div class="card-body">
<div class="table-responsive">
<table class="table table-bordered table-hover">
<tbody>
        <?php
         require ('dbconfig.php');
        
        $sql = "SELECT * 
                FROM ContactLog INNER JOIN contact ON ContactLog.contact_id = Contact.contact_id 
                INNER JOIN Company ON Company.company_id = Contact.company_id 
                WHERE ContactLog.id = '".$id."'";
        $stmt = sqlsrv_query( $conn, $sql );
        if( $stmt === false) {
        die( print_r( sqlsrv_errors(), true) );
        }

        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {

        $date = $row['contactDate'];
        $stringdate = $date->format('m-d-y');
        echo 
        "
        <tr><th>First Name :</th><td>".$row['fname']."</td></tr>
        <tr><th>Last Name :</th><td>".$row['lname']."</td></tr>
        <tr><th>Company :</th><td>".$row['company_name']."</td></tr>
        <tr><th>Contact Date :</th><td>".$stringdate."</td></tr>
        <tr><th>Description :</th><td>".$row['description']."</td></tr>
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
  <th>Contact First Name</th>
  <th>Contact Last Name</th>
  <th>Company Name</th>
  <th>Contact Date</th>
  <th>Description</th>
  </thead>
  <tbody>
          <?php
          require('dbconfig.php');


          $sql = "SELECT * 
                FROM ContactLog INNER JOIN contact ON ContactLog.contact_id = Contact.contact_id 
                INNER JOIN Company ON Company.company_id = Contact.company_id 
                WHERE ContactLog.id = '".$id."'";
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
        <td>".$stringdate."</td>
        <td>".$row['description']."</td>
        </tr>
       ";
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

<!-- table-export js -->
<script src="assets/plugins/table-export/tableExport.js" ></script>
<script src="assets/plugins/table-export/jquery.base64.js" ></script>
<script src="assets/plugins/table-export/html2canvas.js" ></script>
<script src="assets/plugins/table-export/sprintf.js" ></script>
<script src="assets/plugins/table-export/jspdf.js" ></script>
<script src="assets/plugins/table-export/base64.js" ></script>
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