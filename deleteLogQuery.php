<?php
    require ('dbconfig.php');
    $id =$_REQUEST['id'];
    // sending query
     $sql = "DELETE FROM ContactLog WHERE id = '$id'";
     $stmt = sqlsrv_query( $conn, $sql );
     sqlsrv_execute($stmt);
     echo '<script type="text/javascript">window.location.href = "ContactLog";</script>';
  
     sqlsrv_close($conn);

 		die();
?>