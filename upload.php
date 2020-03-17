<?php
 require('dbconfig.php');

if (isset($_POST["submit"])){
 //retrieve file name 
	$filename = $_POST["filename"];
	$contactid = $_POST["contactid"];

//Add radom numbers to file name to not replace similar
	$pname = rand(100,1000)."_".$_FILES["file"]["name"];

//temp file name to store file
	$tname = $_FILES["file"]["tmp_name"];
//Upload Directory
	$uploads_dir = 'FileUpload/';
	$filepath = ($uploads_dir.$pname);
//Move upladed file to a specific location 
	move_uploaded_file($tname, $uploads_dir.'/'.$pname);
//sql query to insert into db
	$sql ="INSERT into files(filename, contactid, image) VALUES ('$filename','$contactid','$filepath')";

	 $stmt = sqlsrv_query( $conn, $sql );

	echo '<script type="text/javascript">window.location.href = "document.php";</script>';
}

?>