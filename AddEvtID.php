<?php
$evi_name = $_POST['evi_name'];
if ( !empty($evi_name)) {
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
     $INSERT = "INSERT Into eventidentifier (evi_name) VALUES('$evi_name')";
//Prepare statement
      $stmt = sqlsrv_prepare($conn, $INSERT);
      sqlsrv_execute($stmt);
      echo "New record inserted sucessfully";
     } 
     sqlsrv_close($conn);

    }
 else {
 echo "All field are required";
 die();
}
?>