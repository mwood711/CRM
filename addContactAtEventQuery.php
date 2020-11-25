<?php 

$contact_event_id = $_POST['contact_event_id'];
$event_id = $_POST['event_id'];
$contact_id = $_POST['contact_id'];

require_once 'dbconfig.php';
$sql = "INSERT Into ContactAtEvent (contact_event_id, event_id, contact_id) VALUES('".$contact_event_id."', '".$event_id."', '".$contact_id."')";

$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
die( print_r( sqlsrv_errors(), true) );
}
sqlsrv_free_stmt( $stmt);
echo '<script type="text/javascript">window.location.href = "events";</script>';




 ?>