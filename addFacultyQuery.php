<?php 

$faculty_id = $_POST['faculty_id'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$address = $_POST['address'];


require_once 'dbconfig.php';
$sql = "INSERT Into faculty (faculty_id,fname, lname, phone, email, address) VALUES('".$faculty_id."','".$fname."', '".$lname."', '".$phone."', '".$email."', '".$address."')";

$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
die( print_r( sqlsrv_errors(), true) );
}
sqlsrv_free_stmt( $stmt);
echo '<script type="text/javascript">window.location.href = "faculty";</script>';




 ?>