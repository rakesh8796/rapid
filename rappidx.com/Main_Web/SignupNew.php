<?php
session_start();
error_reporting(1);
extract($_REQUEST);
include "Admin/config/dbcon.php";


date_default_timezone_set('Asia/Kolkata');

// echo "<br>";
// echo "<br>";
// echo $email;
// echo $name;
// echo $mobile;
// echo "<br>";
// echo $companystorename;
// echo "<br>";
// echo $sellertype;
// echo "<br>";
// echo $password;


$_SESSION['email'] = $email;
$_SESSION['name'] = $name;
$_SESSION['mobile'] = $mobile;
$_SESSION['companystorename'] = $companystorename;
$_SESSION['sellertype'] = $sellertype;



// Mail Format For Client
require "phpmailer/PHPMailerAutoload.php";
$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->SMTPAuth=false;
$mail->Port=25;
$mail->Host="localhost";

$mail->Username="info@rappidx.com";
$mail->Password="INFO@rappid1234";

$mail->IsSendmail();
$mail->setFrom("info@rappidx.com");
$mail->FromName = "Rappidx Serving Happiness";
$mail->addAddress("$email");
// $mail->addAddress("info@rappidx.com");
// $mail->addAddress("techsupport@rappidx.com");
// $mail->addAddress("shivam_prasad@philontechnologies.com");
// $mail->addAddress("shivam.philontechnologies@gmail.com");
$mail->isHTML(true);
$mail->Subject="Rappidx Signup Form Query Confirmation";
$mail->Body="
<pre  style='font-size:15px'>
Hi $name

Welcome to Rappidx here we solve all your logistics related problems at one place.

Your following details have been successfully captured and will be communicated soon.

Name: $name
Mobile: $mobile
Email: $email
Company Name: $companystorename

Thanks
Rappidx Team 
</pre>
";
$mail->send();
// Mail Format For Client



$query = "INSERT INTO `asitfa_user_website`(`emailid`, `name`, `mobile`, `companyname`, `sellertype`, `requestdate`, `formstatus`) VALUES ('$email','$name','$mobile','$companystorename','$sellertype',now(),'Pending')";
if(mysqli_query($conn,$query))
{
	// echo "Yes";
// 	echo "<script> window.location.assign('Signup.php?msg=Yes')</script>";
	echo "<script> window.location.assign('SignupNewRPDX.php?msg=Yes&email=$email&name=$name&mobile=$mobile&companystorename=$companystorename&sellertype=$sellertype')</script>";
}else
{
	// echo "No";
  	echo "<script> window.location.assign('Signup.php?msg=No')</script>";
}


 ?>
