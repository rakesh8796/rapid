<?php 
include("../Admin/config/dbcon.php");
extract($_REQUEST);
error_reporting(1);

$query = "INSERT INTO `websitequery`(`queryname`, `querycompanyname`, `querymobiile`, `queryemail`, `querymsg`) VALUES ('$yname','$cname','$mobil','$email','$messg')";
mysqli_query($conn,$query);

require "../phpmailer/PHPMailerAutoload.php";
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
// $mail->addAddress("shivam.philontechnologies@gmail.com");
// $mail->addAddress("$email");
$mail->addAddress("rappidxsolutions@gmail.com");
// $mail->addAddress("techsupport@rappidx.com");


$mail->isHTML(true);
$mail->Subject="Rappidx Business Query";
$mail->Body="
<pre style='font-size:15px'>
Name 		 :		$yname
Company Name     :              $cname
Mobile 		 :		$mobil
Email 		 :		$email
Message 	 :		$messg
</pre>
";

if($mail->send()){
    
	echo "Yes";
}else{
	echo "No";
}

?>