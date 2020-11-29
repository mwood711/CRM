<?php 


$contact_id = $_POST['contact_id'];
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

echo $contact_id;



require_once 'dbconfig.php';
$sql = "update Contact set fname='".$fname."', lname='".$lname."', title='".$title."', info='".$info."', phone='".$phone."', email='".$email."', address='".$address."', city='".$city."', state='".$state."', zip='".$zip."', company_id='".$company_id."' where contact_id='".$contact_id."'";

$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
die( print_r( sqlsrv_errors(), true) );
}
sqlsrv_free_stmt( $stmt);
echo '<script type="text/javascript">window.location.href = "clientlist";</script>';




 ?>