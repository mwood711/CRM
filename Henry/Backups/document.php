<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Document</title>
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
<div class="col-lg-12 pinpin">
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
<div class="btn-group d-flex" role="group">
<div class="buttonexport"> 
<a href="#" class="btn green_btn" data-toggle="modal" data-target="#newdoc"> <i class="fa fa-plus"></i> Documents</a>  
</div>
</div>
<!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
<div class="table-responsive">
<table id="dataTableExample1" class="table table-bordered table-striped table-hover">
<thead class="back_table_color">
<tr class="info">
<th>contact ID</th>
<th>File ID</th>
<th>Client</th>
<th>Image Path</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
        require('dbconfig.php');
        $sql = "SELECT contactid, file_id, CONCAT (fname,' ',lname) AS name, filename FROM files, contact WHERE contact.c_id = files.contactid ";
        $stmt = sqlsrv_query( $conn, $sql );
        if( $stmt === false) {
        die( print_r( sqlsrv_errors(), true) );
        }
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
        echo "
        <tr>
        <td>".$row['contactid']."</td>
        <td>".$row['file_id']."</td>
        <td>".$row['name']."</td>
        <td>".$row['filename']."</td>
        <td><a href=\"viewimage.php?file_id=".$row['file_id']." & cid=".$row['contactid']."\">view file</a></td>
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
<!-- Addnew Modal1 -->
<div class="modal fade" id="newdoc" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header modal-header-primary">
<h3><i class="fa fa-plus m-r-5"></i> Add Documents</h3>
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<div class="modal-body">
<div class="row">
<div class="col-md-12">
<form class="form-horizontal" method="POST" action="upload.php" enctype="multipart/form-data">
<div class="row">
<!-- Text input-->
<div class="col-md-6 form-group">
<label class="control-label">File name</label>
<input  type="text" class="form-control" name="filename" placeholder="Enter File Name" required>
</div>
<!-- Text input-->
<div class="col-md-6 form-group">
<label>Contact</label>
<select class="form-control" name="contactid" id="inputGroupSelect">
    <option selected>--Select contact--</option>
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
<div class="col-md-6 form-group">
<label class="control-label">Choose File</label>
<input  type="file" name="file" placeholder="Select file" required>
</div>
<div class="col-md-12 form-group user-form-group">
<div class="float-right">
<button type="button" class="btn btn-danger btn-sm">Cancel</button>
<button type="submit" class="btn btn-add btn-sm" name="submit" value="Add">Save</button>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-danger float-left" data-dismiss="modal">Close</button>
</div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- Modal -->    
<!-- Document Modal1 -->
<div class="modal fade" id="customer1" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header modal-header-primary">
<h3><i class="fa fa-user m-r-5"></i> Update Documents</h3>
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<div class="modal-body">
<div class="row">
<div class="col-md-12">
<form class="form-horizontal">
<div class="row">
<!-- Text input-->
<div class="col-md-6 form-group">
<label class="control-label">Type</label>
<input type="text" placeholder="Type" class="form-control">
</div>
<!-- Text input-->
<div class="col-md-6 form-group">
<label class="control-label">Title</label>
<input type="text" placeholder="Title" class="form-control">
</div>
<div class="col-md-12 form-group user-form-group">
<div class="float-right">
<button type="button" class="btn btn-danger btn-sm">Cancel</button>
<button type="submit" class="btn btn-add btn-sm">Save</button>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-danger float-left" data-dismiss="modal">Close</button>
</div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- Modal -->    
<!-- document Modal2 -->
<div class="modal fade" id="customer2" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header modal-header-primary">
<h3><i class="fa fa-user m-r-5"></i> Delete Customer</h3>
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<div class="modal-body">
<div class="row">
<div class="col-md-12">
<form class="form-horizontal">
<fieldset>
<div class="col-md-12 form-group user-form-group">
<label class="control-label">Delete Customer</label>
<div class="float-right">
<button type="button" class="btn btn-danger btn-sm">NO</button>
<button type="submit" class="btn btn-add btn-sm">YES</button>
</div>
</div>
</fieldset>
</form>
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-danger float-left" data-dismiss="modal">Close</button>
</div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
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

