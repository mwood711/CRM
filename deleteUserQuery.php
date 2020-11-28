<?php
    require ('dbconfig.php');
    $id =$_REQUEST['id'];
    // sending query
     $sql = "DELETE FROM Login WHERE id = '$id'";
     $stmt = sqlsrv_query( $conn, $sql );
     sqlsrv_execute($stmt);
     echo '<script type="text/javascript">window.location.href = "Users.php";</script>';
  
     sqlsrv_close($conn);

 		die();
 ?>