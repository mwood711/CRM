<?php
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
if ( !empty($firstname) || !empty($lastname) || !empty($email) || !empty($phone) || !empty($address)) {
    $serverName = "localhost\\SQLEXPRESS";
 //creating a connection to the SQL database
    $connectionInfo = array( "Database"=>"ksu_crm");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
  {
     $INSERT = "INSERT Into faculty ( firstname, lastname, email, phone, address) VALUES('$firstname', '$lastname', '$email', '$phone', '$address')";
//Prepare statement
      $stmt = sqlsrv_prepare($conn, $INSERT);
      sqlsrv_execute($stmt);
      echo '<script type="text/javascript">window.location.href = "faculty.php";</script>';
     } 
     sqlsrv_close($conn);

    }
 else {
 echo "All field are required";
 die();
}
?>