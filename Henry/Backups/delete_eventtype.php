
<?php
    require ('dbconfig.php');
    $evt_id =$_REQUEST['event_type_id'];
    // sending query
     $sql = "DELETE FROM eventtype WHERE event_type_id = '$event_type_id'";
     $stmt = sqlsrv_query( $conn, $sql );
     sqlsrv_execute($stmt);
     echo '<script type="text/javascript">window.location.href = "events";</script>';
  
     sqlsrv_close($conn);

 		die();
    ?>
