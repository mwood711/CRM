<?php
$evt_name = $_POST['evt_name'];
$date = $_POST['date'];
$time = $_POST['time'];
if ( !empty($evt_name) || !empty($date) || !empty($time)) {
    $serverName = "localhost";
 //creating a connection to the SQL database
    $connectionInfo = array( "Database"=>"ksu_crm");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
//Insert data into the database
    {
     $INSERT = "INSERT Into eventtype (evt_name, date, time) VALUES('$evt_name', '$date', '$time' )";
//Prepare statement
      $stmt = sqlsrv_prepare($conn, $INSERT);
      sqlsrv_execute($stmt);
      echo '<script type="text/javascript">window.location.href = "events";</script>';
     } 
     sqlsrv_close($conn);

    }
 else {
 die();
}
?>