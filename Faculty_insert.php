<?php
$f_id = $_POST['f_id'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
if ( !empty($f_id) || !empty($fname) || !empty($lname) || !empty($email) || !empty($phone) || !empty($address)) {
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
     $INSERT = "INSERT Into faculty (f_id, fname, lname, email, phone, address) VALUES('$f_id', '$fname', '$lname', '$email', '$phone', '$address')";
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