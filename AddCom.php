<?php
$company_name = $_POST['company_name'];
if ( !empty($company_name)) {
    $serverName = "localhost";
 //creating a connection to the SQL database
    $connectionInfo = array( "Database"=>"crm");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
    {
     $INSERT = "INSERT Into company (company_id, company_name) VALUES(15, '$company_name')";
//Prepare statement
      $stmt = sqlsrv_prepare($conn, $INSERT);
      sqlsrv_execute($stmt);
       echo '<script type="text/javascript">window.location.href = "company";</script>';
     } 
     sqlsrv_close($conn);

    }
 
?>