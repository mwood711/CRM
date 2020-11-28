<?php 

$id = $_POST['id'];
$contact_id = $_POST['contact_id'];
$contactDate = $_POST['contactDate'];
$description = $_POST['description'];

require_once 'dbconfig.php';
$sql = "INSERT Into ContactLog (id, contact_id, contactDate, description) VALUES('".$id."', '".$contact_id."', '".$contactDate."', '".$description."')";

$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
die( print_r( sqlsrv_errors(), true) );
}
sqlsrv_free_stmt( $stmt);
echo '<script type="text/javascript">window.location.href = "ContactLog";</script>';




 ?>