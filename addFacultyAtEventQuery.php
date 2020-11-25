<?php 

$faculty_event_id = $_POST['faculty_event_id'];
$event_id = $_POST['event_id'];
$faculty_id = $_POST['faculty_id'];

require_once 'dbconfig.php';
$sql = "INSERT Into FacultyAtEvent (faculty_event_id, event_id, faculty_id) VALUES('".$faculty_event_id."', '".$event_id."', '".$faculty_id."')";

$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
die( print_r( sqlsrv_errors(), true) );
}
sqlsrv_free_stmt( $stmt);
echo '<script type="text/javascript">window.location.href = "events";</script>';




 ?>