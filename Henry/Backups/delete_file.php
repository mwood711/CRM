<?php
    require ('dbconfig.php');
    $file_id =$_REQUEST['file_id'];
    // sending query
     $sql = "DELETE FROM files WHERE file_id = '$file_id'";
     $stmt = sqlsrv_query( $conn, $sql );
     sqlsrv_execute($stmt);
     echo '<script type="text/javascript">window.location.href = "document";</script>';
  
     sqlsrv_close($conn);

 		die();
    ?>