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
		<h4>Select appointment No,patient No,appointment Date,specialist No from appointment </h4>
		<table border="1">		
			<tr>
				<td><h2>appointment No</h2></td>
				<td><h2>patient No</h2></td>
				<td><h2>appointment Date</h2></td>
				<td><h2>specialist No</h2></td>
			</tr>
			<?php			
				//$host = 35.238.63.2 ;
				$host = "Localhost";
				$user = "root"; // "DK"
				$password = ""; // "DK"
				$database = "PatientsDB";				
				
				$query = "Select appointmentNo,patientNo,appointmentDate,specialistNo from appointment";
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
					echo "<td><h2>" .$row['appointmentNo'] . "</h2></td>";
					echo "<td><h2>" .$row['patientNo'] . "</h2></td>";
					echo "<td><h2>" .$row['appointmentDate'] . "</h2></td>";
					echo "<td><h2>" .$row['specialistNo'] . "</h2></td>";
					echo "</tr>";
				}
			?>
		<table>
	</body>
</html>