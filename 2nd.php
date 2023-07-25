<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Doctor</title>
	<link rel="stylesheet" type="text/css" href="style/style7.css">
	<style type="text/css">
		body {
			background-image: url('expertise.jpg');
			background-repeat: no-repeat;
			background-size: cover;
		}
	</style>
</head>
<body>
	<div class="header" >
	<h2>Register</h2>
</div>

<!-- put your Mail here  -->
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST["Test"])){
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'doctorpatient254@gmail.com';
    $mail->Password ='lsmjxojygxynftix';
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;


    $mail->setFrom('doctorpatient254@gmail.com');
    $mail->addAddress($_POST["email"]);

    $mail->isHTML(true);


    $mail->Subject ="Doctor Patient SignUp";
    $mail->Body = "Hello, Your Account Has been Successfully created";

    $mail->send();
}

   // Check if the code has already been executed
   if (!isset($_SESSION['sent_successfully'])) {
    // Code to execute only once
    echo "
      <script>
        alert('Sent Successfully');
        window.location.href = '1st.php';
      </script>
    ";

    // Set a flag to indicate that the code has been executed
    $_SESSION['sent_successfully'] = true;

    // Terminate the script
    exit;
  }

?>

<!-- Mails ends here  -->


<form method="post" action="2nd.php" enctype="multipart/form-data">

	<?php include ('errors.php'); ?>

	<div class="input-group">
		<label>Doctor ID</label>
		<input type="number" name="DoctorID" >
	</div>


	<div class="input-group">
		<label>Name</label>
		<input type="text" name="Doctorname" >
	</div>

	<div class="input-group">
		<label>Address</label>
		<input type="number" name="Address">
	</div>

	<div class="input-group">
		<label>Contact Number</label>
		<input type="number" name="ContactNumber">
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
		<button type="submit" name="Test" class="btn">Register</button>
	</div>

	<p>
		Already a member? <a href="login2.php">Sign in </a>
	</p>
</form>

</body>
</html>