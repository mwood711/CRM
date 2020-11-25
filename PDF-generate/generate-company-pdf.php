<?php

	$name = "name";

	$events = [];
        
    require_once('../dbconfig.php');
    $sql = "SELECT * FROM Company";
    $stmt = sqlsrv_query( $conn, $sql );
    if( $stmt === false) 
    {
    	die( print_r( sqlsrv_errors(), true) );
    }
    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
    {
        
            $event = array($row['company_name']);
            array_push($events,$event);
  
    }
          

    sqlsrv_free_stmt( $stmt);


	ob_start();
	require_once('../PDF-templates/Company.php');
	$template = ob_get_clean();


	require_once('../dompdf/autoload.inc.php');
	use Dompdf\Dompdf;
	$dompdf = new Dompdf();
	$dompdf -> loadHtml($template);

	$dompdf -> setPaper('A4','landscape');

	$dompdf -> render();

	$dompdf -> stream('message-'.time());



?>
