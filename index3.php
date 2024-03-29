<?php include ('bookserver.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet"  href="style/style5.css" type="text/css">

	<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
	<style type="text/css">
		body {
			background-image: url('piron.jpg');
			background-repeat: no-repeat;
			background-size: cover;
			margin-bottom: 500px;
		}
	</style>
</head>

<header>
	<h1>Admin's <span>board</span></h1>
		<nav>
		<ul> 
			<li><a href="index3.php">Add/Delete Doctor</a></li>
			<li><a href="viewdoctor.php">View Doctors</a></li>
			<li><a href=" viewpatients.php">View Patients</a></li>

  			<li><a href="Doctorpatient.php">Logout</a></li>
		</ul>
		</nav>
</header>
	<body>
	<div class="headerA">
	<h2>Add Doctor</h2>
    </div>

	<form method="post" action="index3.php" onsubmit="return validatePassword()">
		
	<?php include ('errors.php'); ?>

	<div class="input-groupA">
		<label>Doctor ID</label>
		<input type="text" name="addID" >
	</div>
	<div class="input-groupA">
		<label>Doctor Name</label>
		<input type="text" name="addname" >
	</div>

	<div class="input-groupA">
		<label>Address</label>
		<input type="text" name="addAddress">

	</div>

	<div class="input-groupA">
		<label>Contact Number</label>
		<input type="text" name="addContactNumber">
	</div>
	<div class="input-groupA">
		<label>Email address</label>
		<input type="text" name="addEmail">
	</div>
	<div class="input-groupA">
		<label>Password</label>
		<input type="password" name="addpassword" id="addpassword">
	</div>
	<div class="input-groupA">
		<label>Confirm Password</label>
		<input type="password" name="confirm_password" id="confirm_password" onkeyup="checkPasswordMatch();">
	</div>
	<script type="text/javascript">
        function validatePassword() {
            var password = document.getElementById("addpassword").value;
            var confirm_password = document.getElementById("confirm_password").value;

            if (password !== confirm_password) {
                alert("Passwords do not match!");
                return false;
            }

            return true;
        }
    </script>

<div class="input-groupA">
	<label>Category</label>
	   	<select name="addcategory" class="xd">
	   		<option value="bone" >bones</option>
	   		<option value="heart">heart</option>
	   		<option value="Dentistry">Dentistry</option>
	   		<option value="MentalHealth">Mental Health</option>
	   		<option value="Surgery">Surgery</option>
	   	</select>
	   	</div>
	<div class="input-groupA">
		<button type="submit" name="Add" class="btnA">Add Doctor</button>
	</div>
</form>
<div class="delete2">
<div class="headerAD">
<h2>Delete Doctor</h2>
</div>
<form method="post" action="index3.php" class="delete">

	<div class="input-groupA">
		<label>Doctor ID</label>
		<input type="text" name="deleteID" >
	</div>

	<div class="input-groupA">
		<button type="submit" name="Delete" class="btnA">Delete</button>
</div>
</div>
</form>

</body>
</html>