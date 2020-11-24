<?php

//create values to reflect client informationn
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$title = $_POST['title'];
$info = $_POST['info'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$company_id = $_POST['company_id'];

//***********************************************************************************************************************************
//$contact_id = 36;
//********note for henry: ask alex about the auto generator feature on sql********
//***********************************************************************************************************************************



if ( !empty($fname) || !empty($lname) || !empty($title) || !empty($info) ||  !empty($phone) || !empty($email)|| !empty($address)|| !empty($city)|| !empty($state)|| !empty($zip) || !empty($company_id)) {
    $serverName = "localhost";

 //creating a connection to the KSU CRM SQL database
    $connectionInfo = array( "Database"=>"crm");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
    {
    	//create new client and add to database tables
     $INSERT = "INSERT Into contact (contact_id, fname, lname, title, info, phone, email, address, city, state, zip, company_id) VALUES('$contact_id', '$fname', '$lname', '$title', '$info', '$phone', '$email', '$address', '$city', '$state', '$zip', '$company_id')";

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