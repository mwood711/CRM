<?php 

$contact_id = $_POST['id'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$title = $_POST['title'];
$info = $_POST['info'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$company_id = $_POST['company_id'];



require_once 'dbconfig.php';
$sql = "INSERT Into contact (contact_id,fname, lname, title, info, phone, email, address, city, state, zip, company_id) VALUES('".$contact_id."','".$fname."', '".$lname."', '".$title."', '".$info."', '".$phone."', '".$email."', '".$address."', '".$city."', '".$state."', '".$zip."', '".$company_id."')";

$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
die( print_r( sqlsrv_errors(), true) );
}
sqlsrv_free_stmt( $stmt);
echo '<script type="text/javascript">window.location.href = "clientlist";</script>';




 ?>