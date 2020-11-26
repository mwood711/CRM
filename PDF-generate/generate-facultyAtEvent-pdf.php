<?php

	$event_id =$_REQUEST['event_id'];

	$events = [];
        
    require_once('../dbconfig.php');
    $sql = "SELECT * 
                FROM Event
                INNER JOIN FacultyAtEvent ON FacultyAtEvent.event_id = Event.event_id
                INNER JOIN Faculty ON FacultyAtEvent.faculty_id = Faculty.faculty_id 
                WHERE event.event_id = '".$event_id."'";
    $stmt = sqlsrv_query( $conn, $sql );
    if( $stmt === false) 
    {
    	die( print_r( sqlsrv_errors(), true) );
    }
    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
    {
        
            $event = array($row['fname'], $row['lname'], $row['email'], $row['phone'], $row['description']);
            array_push($events,$event);
  
    }
          

    sqlsrv_free_stmt( $stmt);


	ob_start();
	require_once('../PDF-templates/FacultyAtEvents.php');
	$template = ob_get_clean();


	require_once('../dompdf/autoload.inc.php');
	use Dompdf\Dompdf;
	$dompdf = new Dompdf();
	$dompdf -> loadHtml($template);

	$dompdf -> setPaper('A4','landscape');

	$dompdf -> render();

	$dompdf -> stream('message-'.time());



?>