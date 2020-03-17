<?php
 //creating a connection to the SQL database
  $serverName = "localhost\\SQLEXPRESS";
  $connectionInfo = array( "Database"=>"ksu_crm");
  $conn = sqlsrv_connect( $serverName, $connectionInfo);

//checking DB columns for empty values
if(isset($_POST) && !empty($_POST['username']) && !empty($_POST['password'])) 
    {   
    $username = $_POST["username"];
    $password  = $_POST["password"];
    extract($_POST);
{
  //SQL selection Query
    $sql = "SELECT username, password FROM logintable 
    WHERE username='".$username."'
    and password = '".$password."'";
    $stmt =  sqlsrv_query($conn, $sql);
    $stmt = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
// check password to match DB
    if($password === $stmt['password'])
        {
        echo '<script type="text/javascript">window.location.href = "index.php";</script>';
}
else 
       echo '<script type="text/javascript">window.location.href = "login.html";</script>';
}}
sqlsrv_close($conn);
?>