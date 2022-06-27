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
		<h4>Select p.FirstName , p.lastName , a.appointmentNo , a.PatientNo , a.AppointmentDate,a.specialistNo, s.specialistFirstName ,s.specialistLastName , s.specializeIn from patientdetails p INNER JOIN Appointment a ON p.patientNo = a.PatientNo Inner JOIN Specialist s ON a.SpecialistNo = s.SpecialistNo;
	 </h4>
		<table border="1">		
			<tr>
				<td><h2>FirstName</h2></td>
				<td><h2>lastName</h2></td>
				<td><h2>appointmentNo</h2></td>
				<td><h2>PatientNo</h2></td>
				<td><h2>AppointmentDate</h2></td>
				<td><h2>specialistNo</h2></td>
				<td><h2>specialistFirstName</h2></td>
				<td><h2>specialistLastName</h2></td>
				<td><h2>specializeIn</h2></td>
			</tr>
			<?php			
				//$host = 35.238.63.2;
				$host = "Localhost";
				$user = "root"; // "DK"
				$password = ""; // "DK"
				$database = "PatientsDB";				
				
				$query = "Select p.FirstName , p.lastName , a.appointmentNo , a.PatientNo , a.AppointmentDate,a.specialistNo, s.specialistFirstName ,s.specialistLastName , s.specializeIn from patientdetails p INNER JOIN Appointment a ON p.patientNo = a.PatientNo Inner JOIN Specialist s ON a.SpecialistNo = s.SpecialistNo";
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
					echo "<td><h2>" .$row['FirstName'] . "</h2></td>";
					echo "<td><h2>" .$row['lastName'] . "</h2></td>";
					echo "<td><h2>" .$row['appointmentNo'] . "</h2></td>";
					echo "<td><h2>" .$row['PatientNo'] . "</h2></td>";
					echo "<td><h2>" .$row['AppointmentDate'] . "</h2></td>";
					echo "<td><h2>" .$row['specialistNo'] . "</h2></td>";
					echo "<td><h2>" .$row['specialistFirstName'] . "</h2></td>";
					echo "<td><h2>" .$row['specialistLastName'] . "</h2></td>";
					echo "<td><h2>" .$row['specializeIn'] . "</h2></td>";
					echo "</tr>";
				}
			?>
		<table>
	</body>
</html>