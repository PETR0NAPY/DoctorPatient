<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Doctor</title>
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
	<div class="header" >
	<h2>Register</h2>
</div>

<form method="post" action="2nd.php" enctype="multipart/form-data">

	<?php include ('errors.php'); ?>

	<div class="input-group">
		<label>Doctor ID</label>
		<input type="text" name="DoctorID" >
	</div>


	<div class="input-group">
		<label>Name</label>
		<input type="text" name="Doctorname" >
	</div>

	<div class="input-group">
		<label>Address</label>
		<input type="text" name="Address">
	</div>

	<div class="input-group">
		<label>Contact Number</label>
		<input type="text" name="ContactNumber">
	</div>


	<div class="input-group">
		<label>Email address</label>
		<input type="text" name="email">
	</div>

	<div class="input-group">
		<label>Password</label>
		<input type="Password" name="password">
	</div>

	<div class="input-group">
		<label>Category</label>
		<select name="category" class="xd">
	   		<option value="bone" >bone</option>
	   		<option value="heart">heart</option>
	   		<option value="Dentistry">Dentistry</option>
	   		<option value="MentalHealth">Mental Health</option>
	   		<option value="Surgery">Surgery</option>
			   <option value="consultation">consultation</option>
		</select>
	</div>
   

	<div class="input-group">
		<button type="submit" name="Register1" class="btn">Register</button>
	</div>

	<p>
		Already a member? <a href="login2.php">Sign in </a>
	</p>
</form>

</body>
</html>