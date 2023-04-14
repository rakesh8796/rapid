<?php
session_start();
error_reporting(1);
extract($_REQUEST);
include "Admin/config/dbcon.php";


date_default_timezone_set('Asia/Kolkata');

// $email = $_SESSION['email'];
// $name  = $_SESSION['name'];
// $mobile = $_SESSION['mobile'];
// $companystorename = $_SESSION['companystorename'];
// $sellertype = $_SESSION['sellertype'];




// Mail Format For Rappidx
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
    // $mail->addAddress("info@rappidx.com");
    // $mail->addAddress("techsupport@rappidx.com");
    // $mail->addAddress("koool.shivamprasad00111@gmail.com");
    $mail->addAddress("rappidxsolutions@gmail.com");
    
    $mail->isHTML(true);
    $mail->Subject="Rappidx New Signup Form Query";
    $mail->Body="
    <pre  style='font-size:15px'>
    Hi Rappidx Team,
    
    Following details have been successfully captured from website. Please check and contact customer soon.
    
    Name            :    $name
    Mobile          :    $mobile
    Email           :    $email
    Company Name    :    $companystorename
    Sellar Type     :    $sellertype
    
    Thanks
    Rappidx Team 
    </pre>
    ";
    if($mail->send()){
	// echo "Yes";
    	echo "<script> window.location.assign('Signup.php?msg=Yes')</script>";
    }else
    {
    	// echo "No";
      	echo "<script> window.location.assign('Signup.php?msg=No')</script>";
    }
// Mail Format For Rappidx

?>
