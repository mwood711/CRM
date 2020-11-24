<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Edit Client</title>
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

<?php 

      include 'assets/php/top-nav.php';
?>
<div>

<div class="container-fluid">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="header-icon">
<i class="fa fa-users"></i>
</div>
<div class="header-title">
<h1>Edit Client</h1>
<small>client list</small>
</div>
</section>
<!-- Main content -->
<div class="content">
<div class="row">
<!-- Form controls -->
<div class="col-sm-12">
<div class="card lobicard all_btn_card" id="lobicard-custom-control1" data-sortable="true">
<div class="card-header all_card_btn">
<div class="card-title custom_title">
<a class="btn btn-add" href="clientlist"><i class="fa fa-list"></i> client List </a>  
</div>
</div>

<?php
require ('dbconfig.php');
$c_id=$_GET['c_id'];
$sql = "SELECT  c_id, fname, lname, title, sname, cinfo, company, officephone, email, address, city, state, zipcode FROM contact  WHERE c_id = '$c_id'";
$stmt = sqlsrv_query( $conn, $sql );
$row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)
?>

<div class="card-body">
<form class="col-sm-6" action="clientEdit.php" method="POST">
<div class="form-group">
<label>contact ID</label>
<input type="text" class="form-control" name="c_id"  value="<?php echo $row['c_id']; ?>" >
</div>
<div class="form-group">
<label>First Name</label>
<input type="text" class="form-control" name="fname"  value="<?php echo $row['fname']; ?>" >
</div>
<div class="form-group">
<label>Last Name</label>
<input type="text" class="form-control" name="lname" value="<?php echo $row['lname']; ?>" >
</div>
<div class="form-group">
<label>title</label>
<input type="text" class="form-control" name="title" value="<?php echo $row['title']; ?>" >
</div>
<div class="form-group">
<label>Spouse</label>
<input type="text" class="form-control" name="sname" value="<?php echo $row['sname']; ?>" >
</div>
<div class="form-group">
<label>Number of Children</label>
<input type="text" class="form-control" name="cinfo" value="<?php echo $row['cinfo']; ?>" >
</div>
<div class="form-group">
<label>Company</label>
<input type="Number" class="form-control" name="company" value="<?php echo $row['company']; ?>" >
</div>
<div class="form-group">
<label>Office Phone </label>
<input type="text" class="form-control" name="officephone" value="<?php echo $row['officephone']; ?>" >
</div>
<div class="form-group">
<label>Email</label>
<input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>" >
</div>
<div class="form-group">
<label>Street Address </label>
<input type="text" class="form-control" name="address" value="<?php echo $row['address']; ?>" >
</div>
<div class="form-group">
<label>Enter city</label>
<input type="text" class="form-control" name="city" value="<?php echo $row['city']; ?>" >
</div>
<div class="form-group">
<label>Enter State</label>
<input type="text" class="form-control" name="state" value="<?php echo $row['state']; ?>" >
</div>
<div class="form-group">
<label>Enter ZipCode</label>
<input type="text" class="form-control" name="zipcode" value="<?php echo $row['zipcode']; ?>" >
</div>
<div class="submit-button">                           
<a> <input class="btn btn-success" type="submit" name="submit" value="Edit"></a>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
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
<script src="assets/plugins/jQuery/jquery-1.12.4.min.js"></script>
<!-- Bootstrap proper -->
<script src="assets/bootstrap/js/popper.min.js"></script>
<!-- lobicard ui min js -->
<script src="assets/plugins/lobipanel/js/jquery-ui.min.js"></script>
<!-- lobicard ui touch-punch-improved js -->
<script src="assets/plugins/lobipanel/js/jquery.ui.touch-punch-improved.js"></script>
<!-- lobicard tether min js -->
<script src="assets/plugins/lobipanel/js/tether.min.js"></script>
<!-- Bootstrap -->
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<!-- lobicard js -->
<script src="assets/plugins/lobipanel/js/lobicard.js"></script>
<!-- lobicard highlight js -->
<script src="assets/plugins/lobipanel/js/highlight.js"></script>
<!-- Pace js -->
<script src="assets/plugins/pace/pace.min.js"></script>
<!-- NiceScroll -->
<script src="assets/plugins/slimScroll/jquery.nicescroll.min.js"> </script>
<!-- FastClick -->
<script src="assets/plugins/fastclick/fastclick.min.js"></script>
<!-- CRMadmin frame -->
<script src="assets/dist/js/custom.js"></script>
<!-- End Core Plugins
=====================================================================-->
<!-- Start Theme label Script
=====================================================================-->
<!-- Dashboard js -->
<script src="assets/dist/js/dashboard.js"></script>
<!-- End Theme label Script
=====================================================================-->
</body>
</html>