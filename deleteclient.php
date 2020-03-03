
<?php
    require ('dbconfig.php');
    $c_id =$_REQUEST['c_id'];
    // sending query
     $sql = "DELETE FROM contact WHERE c_id = '$c_id'";
     $stmt = sqlsrv_query( $conn, $sql );
     sqlsrv_execute($stmt);
     echo '<script type="text/javascript">window.location.href = "clientlist.php";</script>';
  
     sqlsrv_close($conn);

 		die();
    ?>
