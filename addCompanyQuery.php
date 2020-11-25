<?php 

$company_id = $_POST['company_id'];
$company_name = $_POST['company_name'];



require_once 'dbconfig.php';
$sql = "INSERT Into company (company_id, company_name) VALUES('".$company_id."','".$company_name."')";

$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
die( print_r( sqlsrv_errors(), true) );
}
sqlsrv_free_stmt( $stmt);
echo '<script type="text/javascript">window.location.href = "company";</script>';




 ?>