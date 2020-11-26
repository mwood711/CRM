<?php

	$name = "name";

	$events = [];
        
    require_once('../dbconfig.php');
    $sql = "SELECT * FROM Event INNER JOIN EventType ON Event.event_type_id = EventType.Event_type_id";
    $stmt = sqlsrv_query( $conn, $sql );
    if( $stmt === false) 
    {
    	die( print_r( sqlsrv_errors(), true) );
    }
    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
    {
            $stringdate = $row['date'];
            $date = $stringdate->format('m-d-y');

            $startTimeString = $row['start_time'];
            $startTime = $startTimeString->format('g:i A');
        
            $event = array($row['description'], $date, $startTime, $row['address'], $row['price'], $row['event_type']);
            array_push($events,$event);
  
    }
          

    sqlsrv_free_stmt( $stmt);


	ob_start();
	require_once('../PDF-templates/Events.php');
	$template = ob_get_clean();


	require_once('../dompdf/autoload.inc.php');
	use Dompdf\Dompdf;
	$dompdf = new Dompdf();
	$dompdf -> loadHtml($template);

	$dompdf -> setPaper('A4','landscape');

	$dompdf -> render();

	$dompdf -> stream('message-'.time());



?>