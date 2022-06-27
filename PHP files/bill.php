<?php
//Send utf-8 header before any output
header('Content-Type: text/html; charset=utf-8'); 
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Php Picture Table Example</title>
	</head>	
	<body>
		<h4>select p.firstName, p.lastName, b.paymentId, b.cost from patientdetails p Inner join bill b ON p.patientNo = b.patientNo;</h4>
		<table border="1">		
			<tr>
				<td><h2>firstName</h2></td>
				<td><h2>lastName</h2></td>
				<td><h2>paymentId</h2></td>
				<td><h2>cost</h2></td>
			</tr>
			<?php			
				//$host = 35.238.63.2;
				$host = "Localhost";
				$user = "root"; // "DK"
				$password = ""; // "DK"
				$database = "PatientsDB";				
				
				$query = "select p.firstName, p.lastName, b.paymentId, b.cost from patientdetails p Inner join bill b ON p.patientNo = b.patientNo;";
				//Connect to the database
				$connect = mysqli_connect($host,$user,$password,$database) or die("Problem connecting.");
				//Set connection to UTF-8
				mysqli_query($connect,"SET NAMES utf8");
				//Select data
				$result = mysqli_query($connect,$query) or die("Bad Query.");
				mysqli_close($connect);

				while($row = $result->fetch_array())
				{		
					echo "<tr>";
					echo "<td><h2>" .$row['firstName'] . "</h2></td>";
					echo "<td><h2>" .$row['lastName'] . "</h2></td>";
					echo "<td><h2>" .$row['paymentId'] . "</h2></td>";
					echo "<td><h2>" .$row['cost'] . "</h2></td>";
					echo "</tr>";
				}
			?>
		<table>
	</body>
</html>