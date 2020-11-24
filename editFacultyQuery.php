<?php 

$faculty_id = $_POST['id'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$address = $_POST['address'];


require_once 'dbconfig.php';
$sql = "update faculty set fname='".$fname."', lname='".$lname."', phone='".$phone."', email='".$email."', address='".$address."' where faculty_id='".$faculty_id."'";

$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
die( print_r( sqlsrv_errors(), true) );
}
sqlsrv_free_stmt( $stmt);
echo '<script type="text/javascript">window.location.href = "faculty";</script>';




 ?>