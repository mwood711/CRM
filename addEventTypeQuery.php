<?php 

$event_type_id = $_POST['event_type_id'];
$event_type = $_POST['event_type'];

require_once 'dbconfig.php';
$sql = "INSERT Into EventType (event_type_id, event_type) VALUES('".$event_type_id."', '".$event_type."')";

$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
die( print_r( sqlsrv_errors(), true) );
}
sqlsrv_free_stmt( $stmt);
echo '<script type="text/javascript">window.location.href = "events";</script>';




 ?>