<?php include 'bookserver.php'; ?>
<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$min = new DateTime();
$min->modify("3 days");
$max = new DateTime("9 days");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Patient</title>
	<link rel="stylesheet"  href="style/style2.css">

	<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
	<style type="text/css">
		body {
			background-image: url('recovery.jpg');
			background-repeat: no-repeat;
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
			<li><a href="view.php">View Appointment</a></li>
			<li><a href="cancel.php">Cancel Booking</a></li>
			<li><a href="searchdoctor.php ">Search Doctor</a></li>

			<li><a href="Doctorpatient.php">Logout</a></li>
			
		</ul>
		
	</nav>


</header>

<body>

	<div class="header">
	<h2>Book Appointment</h2>
</div>

<form method="post" action="book.php">
	<!--CODE TO SEND SMS-->  
<?php
if(isset($_POST['Book'])){
    $baseurl = "https://api.mobitechtechnologies.com/sms/sendsms";
    $ch = curl_init($baseurl);
    $data = array(
        "mobile" => $_POST['phone'],
        "response_type" => "json",
        "sender_name" => "23107",
        "service_id" => 0,
        "message" => "Hello, Thank you for making an appointment to Doctor Patient. Your appointment has been successfully approved. \n\nRegards\nDoctor Patient BS.",
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

if(isset($_POST["Book"])){
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'doctorpatient254@gmail.com';
    $mail->Password ='lsmjxojygxynftix';
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;


    $mail->setFrom('doctorpatient254@gmail.com');
    $mail->addAddress($_POST["Email"]);

    $mail->isHTML(true);


    $mail->Subject ="Doctor Patient Book Appointment";
    $mail->Body = "Hello, Your Appointment has been approved successful";

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

<?php include ('errors.php');?>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
	<div class="input-group">
		<label>Category</label>
	   	<select name="categorey" class="xd">
	   		<option value="bone" >bone</option>
	   		<option value="heart">heart</option>
	   		<option value="Dentistry">Dentistry</option>
	   		<option value="MentalHealth">Mental Health</option>
	   		<option value="Surgery">Surgery</option>
			   <option value="consultation">consultation</option>
		</select>
	</div>

	<div class="input-group">
		<button type="submit" name="Search" class="btn">Search</button>
	</div>



	<?php  

	  if (isset($_POST['Search'])) {

	$categorey = mysqli_real_escape_string($mysqli,$_POST['categorey']);
	
	$query2="SELECT * FROM doctor WHERE categorey=('$categorey')";
	$result2=mysqli_query($mysqli,$query2);
	?>
	
		<div class="input-group"> 

			<label>Doctor ID</label>
			

		<select class="input-group2" name="docID">
			
	<?php   while ($row2=mysqli_fetch_assoc($result2)) {
		?>
		
	 		<option> <?php echo $row2['DoctorID'] ?> </option>
			   
	  	   <?php 

	} ?>

	 </select>
	 </div>


	<div class="input-group">
		<label>Appointment ID</label>
		<input type="text" name="AppoID" >

	</div>

	<div class="input-group">
		<label>Date</label>
		<input type="Date" value="<?php echo date("Y-m-d");?>" min=<?=$min->format("Y-m-d")?> max=<?=$max->format("Y-m-d")?> name="Date">

	</div>

	<div class="input-group">
		<label>Time</label>
		<input type="Time" name="Time">
	</div>

	<div class="input-group">
		<label>Phone</label>
		<input type="text"  placeholder = "Enter your phone" name="phone">
	</div>

	<div class="input-group">
		<label>Email address</label>
		<input type="text" placeholder= "Enter your email address" name="Email">
	</div>
	
	 <div class="input-group">
			<button type="submit" value = "Book" name="Book" class="btn">BOOK</button>
	</div>
	 
	 <?php  
}
	    ?>

</form>

</body>

</html>