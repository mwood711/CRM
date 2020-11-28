<?php
$id = $_POST['id'];
$password = $_POST['password'];
if ( !empty($password)) {
 //creating a connection to the SQL database
   require ('dbconfig.php');
 
//Insert data into the database
    {
     $INSERT = "update Login set password='".$password."' where id='".$id."'";

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