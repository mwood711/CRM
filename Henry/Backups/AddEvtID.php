<?php
$evi_name = $_POST['evi_name'];
if ( !empty($evi_name)) {
    $serverName = "localhost";
 //creating a connection to the SQL database
    $connectionInfo = array( "Database"=>"ksu_crm");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
    {
     $INSERT = "INSERT Into eventidentifier (evi_name) VALUES('$evi_name')";
//Prepare statement
      $stmt = sqlsrv_prepare($conn, $INSERT);
      sqlsrv_execute($stmt);
       echo '<script type="text/javascript">window.location.href = "events";</script>';
     } 
     sqlsrv_close($conn);

    }
 else {
 echo "All field are required";
 die();
}
?>