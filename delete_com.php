
<?php
    require ('dbconfig.php');
    $company_id =$_REQUEST['company_id'];
    // sending query
     $sql = "DELETE FROM company WHERE company_id = '$company_id'";
     $stmt = sqlsrv_query( $conn, $sql );
     sqlsrv_execute($stmt);
     echo '<script type="text/javascript">window.location.href = "company";</script>';
  
     sqlsrv_close($conn);

 		die();
    ?>
