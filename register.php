<?php
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];
if ( !empty($username) || !empty($password) || !empty($role)) {
    $serverName = "localhost\\SQLEXPRESS";
 //creating a connection to the SQL database
    $connectionInfo = array( "Database"=>"ksu_crm");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
 
//Insert data into the database
    {
     $INSERT = "INSERT Into logintable (username, password, role ) VALUES('$username', '$password', '$role')";
//Prepare statement
      $stmt = sqlsrv_prepare($conn, $INSERT);
      sqlsrv_execute($stmt);
      echo '<script type="text/javascript">window.location.href = "login.html";</script>';;
     } 
     sqlsrv_close($conn);

    }
 else {
 echo "All field are required";
 die();
}
?>