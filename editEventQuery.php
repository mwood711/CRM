<?php 

$event_id = $_POST['event_id'];
$description = $_POST['description'];
$date = $_POST['date'];
$startTime = $_POST['startTime'];
$address = $_POST['address'];
$price = $_POST['price'];
$event_type_id = $_POST['event_type_id'];


require_once 'dbconfig.php';
$sql = "update Event set description='".$description."', date='".$date."', start_time='".$startTime."', address='".$address."', price='".$price."', event_type_id='".$event_type_id."' where event_id='".$event_id."'";

$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
die( print_r( sqlsrv_errors(), true) );
}
sqlsrv_free_stmt( $stmt);
echo '<script type="text/javascript">window.location.href = "events";</script>';




 ?>