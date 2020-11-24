<?php

//create values to reflect client informationn
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


if ( !empty($fname) || !empty($lname) || !empty($title) || !empty($sname) || !empty($cinfo) || !empty($company) || !empty($officephone) || !empty($email)|| !empty($address)|| !empty($city)|| !empty($state)|| !empty($zipcode)) {
    $serverName = "localhost";

 //creating a connection to the KSU CRM SQL database
    $connectionInfo = array( "Database"=>"ksu_crm");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
    {
    	//create new client and add to database tables
     $INSERT = "INSERT Into contact (fname, lname, title, sname, cinfo, company, officephone, email, address, city, state, zipcode) VALUES('$fname', '$lname', '$title', '$sname', '$cinfo', '$company', '$officephone', '$email', '$address', '$city', '$state', '$zipcode')";

//Prepare statement
      $stmt = sqlsrv_prepare($conn, $INSERT);
      sqlsrv_execute($stmt);
      echo '<script type="text/javascript">window.location.href = "clientlist";</script>';
     } 
     sqlsrv_close($conn);

    }

 else {
 echo "All fields are required";

 die();
}
//program end
?>