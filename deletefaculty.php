
<?php
    require ('dbconfig.php');
    $faculty_id =$_REQUEST['faculty_id'];
    // sending query
     $sql = "DELETE FROM faculty WHERE faculty_id = '$faculty_id'";
     $stmt = sqlsrv_query( $conn, $sql );
     sqlsrv_execute($stmt);
     echo '<script type="text/javascript">window.location.href = "faculty";</script>';
  
     sqlsrv_close($conn);

 		die();
    ?>
