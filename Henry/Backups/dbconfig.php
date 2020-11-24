<?php
        $serverName = "localhost";
        $connectionInfo = array( "Database"=>"ksu_crm");
        $conn = sqlsrv_connect( $serverName, $connectionInfo );
        if( $conn === false ) {
        die( print_r( sqlsrv_errors(), true));
        }  
?>