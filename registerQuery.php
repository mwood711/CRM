<?php
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];
if ( !empty($username) || !empty($password) || !empty($role)) {
 //creating a connection to the SQL database
   require ('dbconfig.php');
 
//Insert data into the database
    {
     $INSERT = "INSERT Into Login (username, password, role ) VALUES('$username', '$password', '$role')";
//Prepare statement
      $stmt = sqlsrv_prepare($conn, $INSERT);
      sqlsrv_execute($stmt);
      echo '<script type="text/javascript">window.location.href = "login2.php";</script>';;
     } 
     sqlsrv_close($conn);

    }
 else {
 echo "All field are required";
 die();
}
?>