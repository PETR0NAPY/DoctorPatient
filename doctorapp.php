<?php include 'bookserver.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Doctor</title>
	<link rel="stylesheet"  href="style/style3.css">

	<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
	<style type="text/css">
		body {
			background-image: url('Doctorsapp.jpg');
			background-repeat: no-repeat;
			background-size: cover;
		}
	</style>
</head>

<header>
	<h1>Doctor's <span>board</span></h1>
		<nav>
		
		<ul> 
			
					<li><a href="index2.php">My Info</a></li>
			<li><a href="doctorapp.php">My Appointments</a></li>
			<li><a href=" searchpatient.php">Search Patient</a></li>
			<li><a href="add.php">Add Description</a></li>
			<li><a href="Doctorpatient.php">Logout</a></li>

		</ul>
		
	</nav>

</header>

<body>
	<h1 class="my1">My Appointments</h1>

	<table class="table2">
		<tr>
		<th>Appointment ID</th>
		<th>DATE</th>
		<th>TIME</th>
		<th>Patient ID</th>
		<th>Patient Name</th>
		<th>Patient Address</th>
		<th>Patient Email</th>
		<th>Patient Number</th>
		<th>BloodGroup</th>

		
		</tr>
		<?php $sqldoc="SELECT  * FROM bookapp , patients   WHERE docID=('$doctorprofile') AND  patientID=UserID "  ;
		$resultdoc=$mysqli->query($sqldoc);
		if(mysqli_num_rows($resultdoc)>= 1){
			while ($rowdoc=$resultdoc->fetch_assoc()) {

				echo "<tr><td>".$rowdoc["AppoID"]."</td><td>".$rowdoc["Date"]."</td><td>".$rowdoc["Time"]."</td><td>".$rowdoc["UserID"]."</td><td>".$rowdoc['Name']."</td><td>".$rowdoc['Address']."</td><td>".$rowdoc['Email']."</td><td>".$rowdoc["ContactNumber"]."</td><td>".$rowdoc["Bloodtype"]."</td></tr>";
			}


			echo "</table";
	
		}

		?>
		
	</table>

</body>
</html>

