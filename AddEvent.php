<?php
$description = $_POST['description'];
$date = $_POST['date'];
$start_time = $_POST['start_time'];
$address = $_POST['address'];
$price = $_POST['price'];
$event_type_id = $_POST['event_type_id'];
$event_id = 8;

if ( !empty($description) || !empty($date) || !empty($start_time) || !empty($address) || !empty($price) || !empty($event_type_id)) {
    $serverName = "localhost";
 //creating a connection to the SQL database
    $connectionInfo = array( "Database"=>"crm");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
//Insert data into the database
    {
     $INSERT = "INSERT Into event (event_id, description, date, start_time, address, price, event_type_id) VALUES('$event_id', '$description', '$date', '$start_time', '$address', '$price', '$event_type_id')";
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