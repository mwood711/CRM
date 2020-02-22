<?php
$e_type = $_POST['e_type'] ??'';
$notes = $_POST['notes'] ??'';
$f_attending = $_POST['f_attending'] ??'';
$dates = $_POST['dates'] ??'';
$place = $_POST['place'] ??'';
$amount = $_POST['amount'] ??'';
$c_id = $_POST['c_id'] ??'';
if ( !empty($e_type) || !empty($notes) || !empty($f_attending) || !empty($dates) || !empty($place) || !empty($amount) || !empty($c_id) ) {
    $serverName = "localhost\\SQLEXPRESS";
 //creating a connection to the SQL database
    $connectionInfo = array( "Database"=>"ksu_crm");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
    if( $conn ) 
    {
        echo "Connection established.<br />";
   }
   else{
        echo "Connection could not be established.<br />";
        die( print_r( sqlsrv_errors(), true));
    } 
//Insert data into the database
    {
     $INSERT = "INSERT Into eventdetails (e_type, notes, f_attending, dates, place, amount,c_id) VALUES('$e_type', '$notes', '$f_attending', '$dates', '$place', '$amount', '$c_id' )";
//Prepare statement
      $stmt = sqlsrv_prepare($conn, $INSERT);
      sqlsrv_execute($stmt);
      echo "New record inserted sucessfully";
     } 
     sqlsrv_close($conn);

    }
 else {
 die();
}
?>