
<?php
    require ('dbconfig.php');
    $contact_id =$_REQUEST['contact_id'];
    // sending query
     $sql = "DELETE FROM contact WHERE contact_id = '$contact_id'";
     $stmt = sqlsrv_query( $conn, $sql );
     sqlsrv_execute($stmt);
     echo '<script type="text/javascript">window.location.href = "clientlist";</script>';
  
     sqlsrv_close($conn);

 		die();
    ?>
