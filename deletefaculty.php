
<?php
    require ('dbconfig.php');
    $f_id =$_REQUEST['f_id'];
    // sending query
     $sql = "DELETE FROM faculty WHERE f_id = '$f_id'";
     $stmt = sqlsrv_query( $conn, $sql );
     sqlsrv_execute($stmt);
     echo '<script type="text/javascript">window.location.href = "faculty.php";</script>';
  
     sqlsrv_close($conn);

 		die();
    ?>
