<!DOCTYPE html>
<html>
<head>
	<title>Faculty At Event</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
<style>
	table{
		width: 100%;
	}

	th {
  		letter-spacing: 2px;
	}

	td {
	  letter-spacing: 1px;
	}

	tbody td {
	  text-align: center;
	}

	tfoot th {
	  text-align: right;
	}
	table, th, td {
		padding: 5px;
	}
	th{
	    border-bottom:1px solid #000;
	}
</style>

	<h1 style="text-align: center;">Faculty At Event</h1>


 <table>

 	<thead>

 		<tr>
 
 			<th>First Name</th>
 			<th>Last Name</th>
 			<th>Email</th>
 			<th>Phone</th>
 			<th>Event</th>
 			
 		</tr>

 	</thead>	
 	<tbody>
 
 	
 	<?php for ($x = 0; $x < count($events); $x++) {  ?>

 		<tr>
 			<?php for ($y = 0; $y < count($events[$x]); $y++) {  ?>
 				<td> <?php echo $events[$x][$y]; ?></td>
 			<?php } ?>
 		</tr>
 	<?php } ?>
 	</tbody>
 </table>


</body>
</html>