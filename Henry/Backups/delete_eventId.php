
<?php
    require ('dbconfig.php');
    $evi_id =$_REQUEST['evi_id'];
    // sending query
     $sql = "DELETE FROM eventidentifier WHERE evi_id = '$evi_id'";
     $stmt = sqlsrv_query( $conn, $sql );
     sqlsrv_execute($stmt);
     echo '<script type="text/javascript">window.location.href = "events";</script>';
  
     sqlsrv_close($conn);

 		die();
    ?>
