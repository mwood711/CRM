<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CRM Admin Panel</title>
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
<i class="fa fa-file-text"></i>
</div>
<div class="header-title">
<h1>Documents</h1>
<small>Documents List</small>
</div>
</section>
<!-- Main content -->
<section class="content">
<div class="row">
<div class="col-lg-6 pinpin">
<div class="card-body">
<?php
        require ('dbconfig.php');
        $urlvariable = $_GET['file_id'];
        $sql ="select filename,image from files where file_id = '$urlvariable' ";
        $stmt = sqlsrv_query( $conn, $sql );
         if( $stmt === false) {
        die( print_r( sqlsrv_errors(), true) );
        }
        while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC))
        {
                $filename = $row['filename'];
                $img_src = $row['image'];
        }
?>
        <iframe src="<?php echo $img_src; ?>" alt="title" title="<?php echo $filename; ?>" class="img-responsive" style ="height: 700px; width: 700px; position:absolute; top:0; left: 0;"></iframe>
</div>
</div>
<div class="col-lg-6 pinpin">
<div class="card lobicard"  data-sortable="true">
<div class="card-header">
<div class="card-title custom_title">
<a href="#">
<h4>Documents</h4>
</a>
</div>
</div>
<div class="card-body">
<!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
<div class="table-responsive">
<table id="dataTableExample1" class="table table-bordered table-striped table-hover">
<thead class="back_table_color">
<tr class="info">
<th>File ID</th>
<th>File Name</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
        require('dbconfig.php');
          $urlvariable = $_GET['cid'];
        $sql = "SELECT contactid, file_id, filename FROM files, contact WHERE contact.c_id = files.contactid
        and c_id = '$urlvariable' ";
        $stmt = sqlsrv_query( $conn, $sql );
        if( $stmt === false) {
        die( print_r( sqlsrv_errors(), true) );
        }
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
        echo "
        <tr>
        <td>".$row['file_id']."</td>
        <td>".$row['filename']."</td>
        <td><a href=\"viewimage.php?cid=".$row['contactid']." & file_id=".$row['file_id']."\">view file</a></td>
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

</body>
</html>