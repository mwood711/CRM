
<?php
    require ('dbconfig.php');
    $evt_id =$_REQUEST['evt_id'];
    // sending query
     $sql = "DELETE FROM eventtype WHERE evt_id = '$evt_id'";
     $stmt = sqlsrv_query( $conn, $sql );
     sqlsrv_execute($stmt);
     echo '<script type="text/javascript">window.location.href = "events.php";</script>';
  
     sqlsrv_close($conn);

 		die();
    ?>
