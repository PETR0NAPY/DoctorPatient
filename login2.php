<?php include('server.php') ?>

<!DOCTYPE html>
<html>
<head>
	<title>Doctor</title>
	<link rel="stylesheet" type="text/css" href="style/style3.css">
	<style type="text/css">
		body {
			background-image: url('doctor.jpg');
			background-repeat: no-repeat;
			background-size: cover;
		}
	</style>
</head>

<body class="Dbody">
	<div class="Dheader">
	<h2>Doctor Login</h2>
</div>

<form method="post" action="login2.php" class="Dform">

	<?php include ('errors.php')?>

	<div class="input-groupD">
		<label>Doctor ID</label>
		<input type="text" name="doctorID">

	</div>
	<div class="input-groupD">
		<label>Password</label>
		<input type="Password" name="doctorpassword">
	<div class="input-groupD">
		<button type="submit" name="Login2" class="btnD"> Login</button>
	</div>
		
	<p> Not a member? <a href="2nd.php" class = "input-groupE">Sign Up </a> </p>
</form>

</body>
</html>