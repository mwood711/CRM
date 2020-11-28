<?php 

$id = $_POST['id'];
$description = $_POST['description'];
$contactDate = $_POST['contactDate'];
$contact_id = $_POST['contact_id'];



require_once 'dbconfig.php';
$sql = "update ContactLog set contact_id='".$contact_id."', contactDate='".$contactDate."', description='".$description."' where id='".$id."'";

$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
die( print_r( sqlsrv_errors(), true) );
}
sqlsrv_free_stmt( $stmt);
echo '<script type="text/javascript">window.location.href = "ContactLog";</script>';




 ?>