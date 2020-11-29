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
<title>Edit Contact Log</title>
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

<?php
          require('dbconfig.php');

          $log_id =$_REQUEST['id'];
          $sql = "SELECT top 1 * FROM ContactLog inner join Contact on ContactLog.contact_id = Contact.contact_id where id='".$log_id."' "; 
          $stmt = sqlsrv_query($conn, $sql );
          while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){

            $fname = $row['fname'];
            $lname = $row['lname'];
            $contact_id = $row['contact_id'];
            $description = $row['description'];

            $stringdate = $row['contactDate'];
            $date = $stringdate->format('yy-m-d');        
            
          }

?>

<style>
  div a { color:    #008B8B; }
  div a:hover { color: grey; };
 </style>

</head>
<body class="hold-transition sidebar-mini">

<!-- header -->
<?php 

    include 'assets/php/top-nav.php';

?> 
<div>

<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="container-fluid">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="header-icon">
<i class="fa fa-building" aria-hidden="true"></i>
</div>
<div class="header-title">
<h1>Edit <?php echo $fname." ".$lname ?> Contact</h1>
<small><a href="ContactLog">Back to List</a></small>
</div>
</section>
<!-- Main content -->
<div class="content">
<div class="row">
<!-- Form controls/labels -->
<div class="col-sm-12">
<div class="card lobicard all_btn_card" id="lobicard-custom-control1" data-sortable="true">
<div class="card-header all_card_btn">

</div>
<div class="card-body">
<form class="col-sm-6" action="editLogQuery.php" method="POST">
<div class="col-md-6 form-group">
<label>Event Date</label>
<input value="<?php echo $date ?>" type="date" class="form-control" name="contactDate" required>
</div>
<div class="col-md-6 form-group">
<label>Contact</label>
  
  <select class="form-control" name="contact_id">
     <?php
          require('dbconfig.php');
          $sql = "SELECT * FROM contact"; 
          $stmt = sqlsrv_query($conn, $sql );
          while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){

            if ($row['contact_id'] == $contact_id){
              echo "<option selected value='".$row['contact_id']."'>".$row['fname']." ".$row['lname']."</option>";
            }
            else{

              echo "<option value='".$row['contact_id']."'>".$row['fname']." ".$row['lname']."</option>";

            }
          }
      ?>
  </select>
</div>

<div class="col-md-12 form-group">
<label>Description</label>
<textarea class="form-control" name="description" placeholder="Enter Contact Description" required><?php echo $description; ?></textarea>
</div>
<input type="hidden" name="id" value="<?php echo $log_id ?>"/>
<div class="submit-button">                           
<a> <input class="btn btn-success ml-3 mt-3" type="submit" name="submit" value="Edit"></a>
</div>


</form>
</div>
</div>
</div>
</div>
</div>
<!-- /.content -->
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


<script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.js" integrity="sha512-RCgrAvvoLpP7KVgTkTctrUdv7C6t7Un3p1iaoPr1++3pybCyCsCZZN7QEHMZTcJTmcJ7jzexTO+eFpHk4OCFAg==" crossorigin="anonymous"></script>



<script type="text/javascript">
   $(function () {
        $("#datepicker").datepicker({ minDate: 1, maxDate: "+1Y" });
        $("#timepicker").timepicker({ 'minTime': '7:00 AM', 'maxTime': '11:00 PM', step: '30' });
        $("#timepick").timepicker({ 'minTime': '7:00 AM', 'maxTime': '11:00 PM', step: '30' });
    });
</script>

</body>
</html>