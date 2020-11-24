
<?php
    require ('dbconfig.php');
    $event_id =$_REQUEST['event_id'];
    // sending query
     $sql = "DELETE FROM event WHERE event_id = '$event_id'";
     $stmt = sqlsrv_query( $conn, $sql );
     sqlsrv_execute($stmt);
     echo '<script type="text/javascript">window.location.href = "events";</script>';
  
     sqlsrv_close($conn);

 		die();
    ?>
