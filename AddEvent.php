<?php
$evt_name = $_POST['evt_name'];
$evi_idd = $_POST['evi_idd'];
$date = $_POST['date'];
$time = $_POST['time'];
if ( !empty($evt_name) || !empty($evi_idd) || !empty($date) || !empty($time)) {
    $serverName = "localhost\\SQLEXPRESS";
 //creating a connection to the SQL database
    $connectionInfo = array( "Database"=>"ksu_crm");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
//Insert data into the database
    {
     $INSERT = "INSERT Into eventtype (evt_name, evi_idd, date, time) VALUES('$evt_name', '$evi_idd', '$date', '$time' )";
//Prepare statement
      $stmt = sqlsrv_prepare($conn, $INSERT);
      sqlsrv_execute($stmt);
       echo '<script type="text/javascript">window.location.href = "events.php";</script>';
     } 
     sqlsrv_close($conn);

    }
 else {
 die();
}
?>