
<?php
//Variable decalration 
$c_id=$_POST['c_id'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$title = $_POST['title'];
$sname = $_POST['sname'];
$cinfo = $_POST['cinfo'];
$company = $_POST['company'];
$officephone = $_POST['officephone'];
$email = $_POST['email'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zipcode = $_POST['zipcode'];

//creating a connection to the SQL database
    $serverName = "localhost\\SQLEXPRESS";
    $connectionInfo = array( "Database"=>"ksu_crm");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
    {
     $sql = ("UPDATE contact SET fname='$fname', lname='$lname' , title='$title' , sname='$sname' , cinfo='$cinfo', company='$company', officephone='$officephone', email='$email', address='$address', city='$city', state='$state' , zipcode='$zipcode' where c_id ='$c_id'");
//Prepare statement
      $stmt = sqlsrv_prepare($conn, $sql);
      sqlsrv_execute($stmt);
      echo '<script type="text/javascript">window.location.href = "clientlist.php";</script>';
     } 
     sqlsrv_close($conn);


?>