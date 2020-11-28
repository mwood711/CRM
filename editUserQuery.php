<?php
$id = $_POST['id'];
$username = $_POST['username'];
$role = $_POST['role'];
if ( !empty($username) || !empty($role)) {
 //creating a connection to the SQL database
   require ('dbconfig.php');
 
//Insert data into the database
    {
     $INSERT = "update Login set username='".$username."', role='".$role."' where id='".$id."'";

//Prepare statement
      $stmt = sqlsrv_prepare($conn, $INSERT);
      sqlsrv_execute($stmt);
      echo '<script type="text/javascript">window.location.href = "Users.php";</script>';;
     } 
     sqlsrv_close($conn);

    }
 else {
 echo "All field are required";
 die();
}
?>