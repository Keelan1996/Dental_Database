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
		<h4>Select patientNo,firstName, lastName, DOB,email,billAddress,appointmentNo,specializeIn,billId, patientImage from PatientDetails </h4>
		<table border="1">		
			<tr>
				<td><h2>patientNo</h2></td>
				<td><h2>firstName</h2></td>
				<td><h2>lastName</h2></td>
				<td><h2>DOB</h2></td>
				<td><h2>email</h2></td>
				<td><h2>billAddress</h2></td>
				<td><h2>appointmentNo</h2></td>
				<td><h2>specializeIn</h2></td>
				<td><h2>billId</h2></td>
				<td><h2>patientImage</h2></td>
				<td><h2>Picture_Path</h2></td>
				
			</tr>
			<?php			
				//$host = 35.238.63.2;
				$host = "Localhost";
				$user = "root"; // "DK"
				$password = ""; // "DK"
				$database = "PatientsDB";				
				
				$query = "Select patientNo,firstName, lastName, DOB,email,billAddress,appointmentNo,specializeIn,billId, patientImage,  Picture_Path from PatientDetails";
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
					echo "<td><h2>" .$row['patientNo'] . "</h2></td>";
					echo "<td><h2>" .$row['firstName'] . "</h2></td>";
					echo "<td><h2>" .$row['lastName'] . "</h2></td>";
					echo "<td><h2>" .$row['DOB'] . "</h2></td>";
					echo "<td><h2>" .$row['email'] . "</h2></td>";
					echo "<td><h2>" .$row['billAddress'] . "</h2></td>";
					echo "<td><h2>" .$row['appointmentNo'] . "</h2></td>";
					echo "<td><h2>" .$row['specializeIn'] . "</h2></td>";
					echo "<td><h2>" .$row['billId'] . "</h2></td>";
					echo "<td><h2><img src=image_patient.php?empno=".$row['patientNo']." width=80 height=80/></h2></td>";
					echo "<td><h2><img src=".$host.$row['Picture_Path'] . " width=60 height=60/></h2></td>";
				    echo "</tr>";
				}
			?>
		<table>
	</body>
</html>