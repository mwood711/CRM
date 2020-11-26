<?php
    require ('dbconfig.php');
    $faculty_event_id =$_REQUEST['faculty_event_id'];
    // sending query
     $sql = "DELETE FROM FacultyAtEvent WHERE faculty_event_id = '$faculty_event_id'";
     $stmt = sqlsrv_query( $conn, $sql );
     sqlsrv_execute($stmt);
     echo '<script type="text/javascript">window.location.href = "events";</script>';
  
     sqlsrv_close($conn);

 		die();
?>