<?php
    require ('dbconfig.php');
    $contact_event_id =$_REQUEST['contact_event_id'];
    // sending query
     $sql = "DELETE FROM ContactAtEvent WHERE contact_event_id = '$contact_event_id'";
     $stmt = sqlsrv_query( $conn, $sql );
     sqlsrv_execute($stmt);
     echo '<script type="text/javascript">window.location.href = "events";</script>';
  
     sqlsrv_close($conn);

 		die();
?>