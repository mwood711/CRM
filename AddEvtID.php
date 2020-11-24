<?php
$event_type = $_POST['event_type'];


if ( !empty($event_type)) {
    $serverName = "localhost";
 //creating a connection to the SQL database
    $connectionInfo = array( "Database"=>"crm");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
    {
     $INSERT = "INSERT Into eventtype (event_type_id, event_type) VALUES(6, '$event_type')";
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