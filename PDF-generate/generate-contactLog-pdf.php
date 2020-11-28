<?php


	$events = [];
        
    require_once('../dbconfig.php');
    $sql = "SELECT * FROM Contact inner join ContactLog on contact.contact_id = contactlog.contact_id
         inner join Company on company.company_id = Contact.company_id
          order by contactlog.contactDate desc";
    $stmt = sqlsrv_query( $conn, $sql );
    if( $stmt === false) 
    {
    	die( print_r( sqlsrv_errors(), true) );
    }
    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
    {
            $date = $row['contactDate'];
            $contactDate = $date->format('m-d-y');

        
            $event = array($row['fname'], $row['lname'], $row['company_name'], $row['description'], $contactDate);
            array_push($events,$event);
  
    }
          

    sqlsrv_free_stmt( $stmt);


	ob_start();
	require_once('../PDF-templates/ContactLog.php');
	$template = ob_get_clean();


	require_once('../dompdf/autoload.inc.php');
	use Dompdf\Dompdf;
	$dompdf = new Dompdf();
	$dompdf -> loadHtml($template);

	$dompdf -> setPaper('A4','landscape');

	$dompdf -> render();

	$dompdf -> stream('message-'.time());



?>