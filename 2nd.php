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

	<!--CODE TO SEND SMS-->  
	<?php
if(isset($_POST['Test'])){
    $baseurl = "https://api.mobitechtechnologies.com/sms/sendsms";
    $ch = curl_init($baseurl);
    $data = array(
        "mobile" => $_POST['ContactNumber'],
        "response_type" => "json",
        "sender_name" => "23107",
        "service_id" => 0,
        "message" => "Hello, Thank you for successfully registering to Doctor Patient",
    );
    $payload = json_encode($data);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'h_api_key:2b0ed0557644f9aa49f40b11f20063a55f741a3ca92bf5a6b51b781107456554'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = json_encode(curl_exec($ch));
    echo $result;    
    curl_close($ch);
}
?>
<!--CODE TO SEND SMS-->
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


<form method="post" action="2nd.php" enctype="multipart/form-data" onsubmit="return validatePassword()">

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
		<input type="password" name="password" id="password">
	</div>

	<div class="input-group">
		<label>Confirm Password</label>
		<input type="password" name="confirm_password" id="confirm_password">
	</div>

	<script type="text/javascript">
        function validatePassword() {
            var password = document.getElementById("password").value;
            var confirm_password = document.getElementById("confirm_password").value;

            if (password !== confirm_password) {
                alert("Passwords do not match!");
                return false;
            }

            return true;
        }
    </script>

	<div class="input-group">
		<label>Category</label>
		<select name="category" class="xd">
	   		<option value="bone" >bones</option>
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