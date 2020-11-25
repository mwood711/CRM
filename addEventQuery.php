<?php 

$event_id = $_POST['event_id'];
$description = $_POST['description'];
$event_type_id = $_POST['event_type_id'];
$date = $_POST['date'];
$start_time = $_POST['start_time'];
$address = $_POST['address'];
$price = $_POST['price'];


require_once 'dbconfig.php';
$sql = "INSERT Into event (event_id, description, date, start_time, address, price, event_type_id) VALUES('".$event_id."','".$description."', '".$date."', '".$start_time."', '".$address."', '".$price."', '".$event_type_id."')";

$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
die( print_r( sqlsrv_errors(), true) );
}
sqlsrv_free_stmt( $stmt);
echo '<script type="text/javascript">window.location.href = "events";</script>';




 ?>