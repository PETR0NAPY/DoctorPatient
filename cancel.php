<?php include 'bookserver.php'; ?>
<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Patient</title>
	<link rel="stylesheet"  href="style/style2.css">

	<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
	<style type="text/css">
		body {
			background-image: url('cancel.jpg');
			background-repeat: no-repeat;
      height: 70%;
      width: 100%;
			background-size: cover;
		}
	</style>
</head>
<header>
	<h1>Patient's <span>board</span></h1>
		<nav>
		
	
		<ul> 
			
			<li><a href=" index.php">MyInfo</a></li>
			<li><a href=" book.php">Book Appointment</a></li>
			<li><a href=" view.php">View Appointment</a></li>
			<li><a href=" cancel.php">Cancel Booking</a></li>
			<li><a href="searchdoctor.php ">Search Doctor</a></li>

			<li><a href="Doctorpatient.php">Logout</a></li>
			
		</ul>
		
	</nav>
</header>
<body>

	<!--CODE TO SEND SMS-->  
	<?php
if(isset($_POST['cancel'])){
    $baseurl = "https://api.mobitechtechnologies.com/sms/sendsms";
    $ch = curl_init($baseurl);
    $data = array(
        "mobile" => $_POST['phone'],
        "response_type" => "json",
        "sender_name" => "23107",
        "service_id" => 0,
        "message" => "Hello, There, It's so  sad to see you Cancel your appointment. Your appointment has been cancelled succesfully.",
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

<!-- put your Mail here  -->
<?php
if(isset($_POST["cancel"])){
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


    $mail->Subject ="Doctor Patient Cancel Booking";
    $mail->Body = "Hello, There, It's so  sad to see you Cancel your appointment. Your appointment has been cancelled succesfully";

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

<form method="post" action="cancel.php">

	<?php include ('errors.php') ;?>

	<div class="input-group">
		<label>Appointment ID</label>
		<input type="text" name="AppoID2" >
	</div>

	
	<div class="input-group">
		<label>Phone</label>
		<input type="text" name="phone" >
	</div>

	
	<div class="input-group">
		<label>Email</label>
		<input type="text" name="email" >
	</div>

	<div class="input-group">
		<button type="submit" name="cancel" class="btn">Cancel</button>
	</div>


		</form>
	</form>


</body>
</html>


