<?php
session_start();
error_reporting(1);
extract($_REQUEST);
include "config/dbcon.php";

// echo "<br>";
// echo "User Id : - ";
// echo $User_Id;
// echo "<br>";
// echo $submit;


if(isset($submit)){

/*
$oriclientpass = $clientpass;
$clientpass = md5($clientpass);

$foldername = $folderare;
*/


/*
$query = "UPDATE `retailers_clients` SET 
`Company_Name`='$companyname',
`name`='$brand',`email`='$Email',`mobile`='$regmobile',
`password`='$clientpass' 
WHERE `rcsno`=$User_Id";
*/

// $query = "UPDATE `asitfa_user` SET `Company_Name`='$companyname',`Brand`='$brand',`Email`='$Email',`Reg_Mobile`='$regmobile',`User_Password_show`='$clientpass'";

$query.="UPDATE `asitfa_user` SET

`Company_Name`='$companyname',`User_Password_show`='$clientpass',

`Website`='$website',`Brand`='$brand',`Email`='$Email',`Pan`='$pan',`Tan`='$tan',`GST_No`='$gstno',

`Reg_Address`='$regaddress',`Reg_City`='$regcity',`Reg_Pin`='$regpin',`Reg_Mobile`='$regmobile',`Reg_Landline`='$reglandline',

`Com_Address`='$comaddress',`Com_City`='$comcity',`Com_Pin`='$compin',`Com_Mobile`='$commobile',`Com_Landline`='$comlandline',

`Bankname`='$bankname',`Bankaccount`='$bankacc',`Branch`='$branch',`IFSC`='$ifsc',`Acc_Type`='$acctype',

`Product`='$product',`Service`='$service',`Pickup`='$pickup',`Cod_Rem`='$codrem',`Billing_Type`='$billingtype',`Billing_Cycle`='$billingcycle',`remittancecycle`='$remittancecycle',

`commercialstype`='gm500',
`Min_a`='$min_a',
`Min_b`='$min_b',
`Min_b1`='$min_b1',
`Min_c`='$min_c',
`Min_c1`='$min_c1',
`Min_d`='$min_d',
`Min_d1`='$min_d1',
`Min_e`='$min_e',
`Min_F`='$min_c',

`Add_a`='$add_a',
`Add_b`='$add_b',
`Add_b1`='$add_b1',
`Add_c`='$add_c',
`Add_c1`='$add_c1',
`Add_d`='$add_d',
`Add_d1`='$add_d1',
`Add_e`='$add_e',
`Add_f`='$add_f',

`Rto_a`='$rto_a',
`Rto_b`='$rto_b',
`Rto_b1`='$rto_b1',
`Rto_c`='$rto_c',
`Rto_c1`='$rto_c1',
`Rto_d`='$rto_d',
`Rto_d1`='$rto_d1',
`Rto_e`='$rto_e',
`Rto_f`='$rto_f',

`FSC`='$fsc',
`COD`='$cod',
`Shipment_Lia`='$shipmentlia',
`GST`='$gst',
`specialnotes`='$specialnote',

`Client_Auth`='$clientauth',`Designation`='$designation',`Client_Email`='$clientemail',`Client_Mobile`='$clientmobile',

`Client_poc`='$clientpoc',`Poc_Designation`='$pocdesignation',`Poc_Email`='$pocemail',`Poc_Mobile`='$pocmobile',

`Operation_Poc`='$operationpoc',`Operation_Designation`='$operationdesignation',`Operation_Mail`='$operationemail',`Operation_Mobile`='$operationmobile',

`Bd_Name`='$bdname',`Bd_Designation`='$bddesignation',`Bd_mail`='$bdemail',`Bd_Mobile`='$bdmobile'";


// print_r($query);
// echo "<br>";



$uploadimagename = $_FILES["uploadimage"]["name"];
$uploadimagenamet = $_FILES["uploadimage"]["tmp_name"];
if($uploadimagename){
	$query.=",`Pancard`='$uploadimagename'";
	move_uploaded_file($uploadimagenamet,"upload/$foldername/$uploadimagename");
}

$gstcername = $_FILES["gstcert"]["name"];
$gstcernamet = $_FILES["gstcert"]["tmp_name"];
if($gstcername){
	$query.=",`GST_cert`='$gstcername'";
	move_uploaded_file($gstcernamet,"upload/$foldername/$gstcername");
}

$canchequename = $_FILES["cancheque"]["name"];
$canchequenamet = $_FILES["cancheque"]["tmp_name"];
if($canchequename){
	$query.=",`Can_Cheque`='$canchequename'";
	move_uploaded_file($canchequenamet,"upload/$foldername/$canchequename");
}

$addproofename = $_FILES["addproofe"]["name"];
$addproofenamet = $_FILES["addproofe"]["tmp_name"];
if($addproofename){
	$query.=",`Add_Proofe`='$addproofename'";
	move_uploaded_file($addproofenamet,"upload/$foldername/$addproofename");
}


$clientmailaccname = $_FILES["clientmailacc"]["name"];
$clientmailaccnamet = $_FILES["clientmailacc"]["tmp_name"];
if($clientmailaccname){
	$query.=",`Client_Mail_acc`='$clientmailaccname'";
	move_uploaded_file($clientmailaccnamet,"upload/$foldername/$clientmailaccname");
}
$query.= " WHERE `User_Id`=$User_Id";


























// echo "<br>";
// print_r($query);
// echo "<br>";




if(mysqli_query($conn,$query)){


// echo "<br>";
//     echo "First If";
// echo "<br>";


// 	if($sendmail)
// 	{
	    
//     	require "phpmailer/PHPMailerAutoload.php";
//         $mail = new PHPMailer(true);
//         $mail->isSMTP();
//         $mail->SMTPAuth=false;
//         $mail->Port=25;
//         $mail->Host="localhost";
        
//         $mail->Username="info@rappidx.com";
//         $mail->Password="INFO@rappid1234";
        
//         $mail->IsSendmail();
//         $mail->setFrom("info@rappidx.com");
//         $mail->FromName = "Rappidx Serving Happiness";
//         $mail->addAddress("$Email");
    
// // 		require 'phpmailer/PHPMailerAutoload.php';
// // 		$mail = new PHPMailer;
// // 		$mail->isSMTP();
// // 		$mail->Host='smtp.gmail.com';
// // 		$mail->Port=587;
// // 		$mail->SMTPAuth=true;
// // 		$mail->SMTPSecure='tls';
// // 		// $mail->Username='shivam.philontechnologies@gmail.com';
// // 		$mail->Username='techsupport@rappidx.com';
// // 		$mail->Password='Technology2021@)@!';
// // 		$mail->setFrom('techsupport@rappidx.com');
// // 	    $mail->addAddress("$Email");
// // 	    $mail->addReplyTo('techsupport@rappidx.com');

// 		$mail->isHTML(true);
// 		$mail->Subject="Rappidx Account Active";
// 		$mail->Body="

// Hello, <br><br>
// Greetings from Rappidx! We are glad to serve your esteemed organization and welcome you to the Rappidx Family. Our client servicing team will soon get in touch with you with the escalation matrix and other details. <br> <br>

// Follow the instructions given below to login to Rappidx client portal <br>
// Logon on to www.rappidx.com <br>
// Click the option login/sign up <br>
// Login to the system with the following login credentials: <br>
// User Id: ".$clientidusername." <br>
// Password: ".$clientpass." <br>
// Welcome again and we look forward to a mutually rewarding and long standing business relationship. <br>
// Thank You! <br>
// Team Rappidx <br><br><br>


// Warm Regards <br>

// Divyam Srivastava | Key Accounts Manager <br>

// 9559771188
// 		";

// 		$mail->send();
// 	}











$ac1kg = 0;
$ac2kg = 0;
$ac5kg = 0;
$ac10kg = 0;
$allclientquery1 = "SELECT * FROM `asitfa_user` WHERE `useruinqueparentid`='$User_UID' ORDER BY `User_Id` DESC";
// echo "<br>";
$allclientqueryr1=mysqli_query($conn,$allclientquery1);

// echo "<br>";
// echo "<br>";
// print_r($row1);
// echo "<br>";



while($row1 = mysqli_fetch_assoc($allclientqueryr1))
{
    // echo $row1['commercialstype'];
    // echo "<br>";
    if($row1['commercialstype']=="kg1"){
		$ac1kg = 1;
// Update 1 Kg  Account Start
$query1 = "UPDATE `asitfa_user` SET
`Company_Name`='$companyname',

`Website`='$website',`Brand`='$brand',`Email`='$Email',`Pan`='$pan',`Tan`='$tan',`GST_No`='$gstno',

`Reg_Address`='$regaddress',`Reg_City`='$regcity',`Reg_Pin`='$regpin',`Reg_Mobile`='$regmobile',`Reg_Landline`='$reglandline',

`Com_Address`='$comaddress',`Com_City`='$comcity',`Com_Pin`='$compin',`Com_Mobile`='$commobile',`Com_Landline`='$comlandline',

`Bankname`='$bankname',`Bankaccount`='$bankacc',`Branch`='$branch',`IFSC`='$ifsc',`Acc_Type`='$acctype',

`Product`='$product',`Service`='$service',`Pickup`='$pickup',`Cod_Rem`='$codrem',`Billing_Type`='$billingtype',`Billing_Cycle`='$billingcycle',`remittancecycle`='$remittancecycle',

`commercialstype`='kg1',
`min1_a`='$min1_a',
`min1_b`='$min1_b',
`min1_c`='$min1_c',
`min1_d`='$min1_d',
`min1_e`='$min1_e',

`add1_a`='$add1_a',
`add1_b`='$add1_b',
`add1_c`='$add1_c',
`add1_d`='$add1_d',
`add1_e`='$add1_e',

`Rto1_a`='$rto1_a',
`Rto1_b`='$rto1_b',
`Rto1_c`='$rto1_c',
`Rto1_d`='$rto1_d',
`Rto1_e`='$rto1_e',
`FSC1`='$fsc1',
`COD1`='$cod1',
`Shipment_Lia1`='$shipmentlia1',
`GST1`='$gst1',
`specialnotes1`='$specialnote1',

`Client_Auth`='$clientauth',`Designation`='$designation',`Client_Email`='$clientemail',`Client_Mobile`='$clientmobile',

`Client_poc`='$clientpoc',`Poc_Designation`='$pocdesignation',`Poc_Email`='$pocemail',`Poc_Mobile`='$pocmobile',

`Operation_Poc`='$operationpoc',`Operation_Designation`='$operationdesignation',`Operation_Mail`='$operationemail',`Operation_Mobile`='$operationmobile',

`Bd_Name`='$bdname',`Bd_Designation`='$bddesignation',`Bd_mail`='$bdemail',`Bd_Mobile`='$bdmobile',

`Active`='$statuscheck',`cancel_reason`='$cancel_reason' WHERE `User_Id`=$User_Id";

mysqli_query($conn,$query1);


// echo "<br>";
// print_r($query1);
// echo "<br>";

// Update 1 Kg  Account End
    }elseif($row1['commercialstype']=="kg2"){
        $ac2kg = 1;
// Update 2 Kg  Account Start
$query2 = "UPDATE `asitfa_user` SET
`Company_Name`='$companyname',

`Website`='$website',`Brand`='$brand',`Email`='$Email',`Pan`='$pan',`Tan`='$tan',`GST_No`='$gstno',

`Reg_Address`='$regaddress',`Reg_City`='$regcity',`Reg_Pin`='$regpin',`Reg_Mobile`='$regmobile',`Reg_Landline`='$reglandline',

`Com_Address`='$comaddress',`Com_City`='$comcity',`Com_Pin`='$compin',`Com_Mobile`='$commobile',`Com_Landline`='$comlandline',

`Bankname`='$bankname',`Bankaccount`='$bankacc',`Branch`='$branch',`IFSC`='$ifsc',`Acc_Type`='$acctype',

`Product`='$product',`Service`='$service',`Pickup`='$pickup',`Cod_Rem`='$codrem',`Billing_Type`='$billingtype',`Billing_Cycle`='$billingcycle',`remittancecycle`='$remittancecycle',



`commercialstype`='kg2',
`min2_a`='$min2_a',
`min2_b`='$min2_b',
`min2_c`='$min2_c',
`min2_d`='$min2_d',
`min2_e`='$min2_e',

`add2_a`='$add2_a',
`add2_b`='$add2_b',
`add2_c`='$add2_c',
`add2_d`='$add2_d',
`add2_e`='$add2_e',

`Rto2_a`='$rto2_a',
`Rto2_b`='$rto2_b',
`Rto2_c`='$rto2_c',
`Rto2_d`='$rto2_d',
`Rto2_e`='$rto2_e',
`FSC2`='$fsc2',
`COD2`='$cod2',
`Shipment_Lia2`='$shipmentlia2',
`GST2`='$gst2',
`specialnotes2`='$specialnote2',

`Client_Auth`='$clientauth',`Designation`='$designation',`Client_Email`='$clientemail',`Client_Mobile`='$clientmobile',

`Client_poc`='$clientpoc',`Poc_Designation`='$pocdesignation',`Poc_Email`='$pocemail',`Poc_Mobile`='$pocmobile',

`Operation_Poc`='$operationpoc',`Operation_Designation`='$operationdesignation',`Operation_Mail`='$operationemail',`Operation_Mobile`='$operationmobile',

`Bd_Name`='$bdname',`Bd_Designation`='$bddesignation',`Bd_mail`='$bdemail',`Bd_Mobile`='$bdmobile',

`Active`='$statuscheck',`cancel_reason`='$cancel_reason' WHERE `User_Id`=$User_Id";

mysqli_query($conn,$query2);
// Update 2 Kg  Account End
    }elseif($row1['commercialstype']=="kg5"){
        $ac5kg = 1;
// Update 5 Kg  Account Start
$query5 = "UPDATE `asitfa_user` SET
`Company_Name`='$companyname',

`Website`='$website',`Brand`='$brand',`Email`='$Email',`Pan`='$pan',`Tan`='$tan',`GST_No`='$gstno',

`Reg_Address`='$regaddress',`Reg_City`='$regcity',`Reg_Pin`='$regpin',`Reg_Mobile`='$regmobile',`Reg_Landline`='$reglandline',

`Com_Address`='$comaddress',`Com_City`='$comcity',`Com_Pin`='$compin',`Com_Mobile`='$commobile',`Com_Landline`='$comlandline',

`Bankname`='$bankname',`Bankaccount`='$bankacc',`Branch`='$branch',`IFSC`='$ifsc',`Acc_Type`='$acctype',

`Product`='$product',`Service`='$service',`Pickup`='$pickup',`Cod_Rem`='$codrem',`Billing_Type`='$billingtype',`Billing_Cycle`='$billingcycle',`remittancecycle`='$remittancecycle',

`commercialstype`='kg5',
`min5_a`='$min5_a',
`min5_b`='$min5_b',
`min5_c`='$min5_c',
`min5_d`='$min5_d',
`min5_e`='$min5_e',

`add5_a`='$add5_a',
`add5_b`='$add5_b',
`add5_c`='$add5_c',
`add5_d`='$add5_d',
`add5_e`='$add5_e',

`Rto5_a`='$rto5_a',
`Rto5_b`='$rto5_b',
`Rto5_c`='$rto5_c',
`Rto5_d`='$rto5_d',
`Rto5_e`='$rto5_e',
`FSC5`='$fsc5',
`COD5`='$cod5',
`Shipment_Lia5`='$shipmentlia5',
`GST5`='$gst5',
`specialnotes5`='$specialnote5',

`Client_Auth`='$clientauth',`Designation`='$designation',`Client_Email`='$clientemail',`Client_Mobile`='$clientmobile',

`Client_poc`='$clientpoc',`Poc_Designation`='$pocdesignation',`Poc_Email`='$pocemail',`Poc_Mobile`='$pocmobile',

`Operation_Poc`='$operationpoc',`Operation_Designation`='$operationdesignation',`Operation_Mail`='$operationemail',`Operation_Mobile`='$operationmobile',

`Bd_Name`='$bdname',`Bd_Designation`='$bddesignation',`Bd_mail`='$bdemail',`Bd_Mobile`='$bdmobile',

`Active`='$statuscheck',`cancel_reason`='$cancel_reason' WHERE `User_Id`=$User_Id";

mysqli_query($conn,$query5);
// Update 5 Kg  Account End
    }elseif($row1['commercialstype']=="kg10"){
        $ac10kg = 1;
// Update 10 Kg  Account Start
$query10 = "UPDATE `asitfa_user` SET
`Company_Name`='$companyname',

`Website`='$website',`Brand`='$brand',`Email`='$Email',`Pan`='$pan',`Tan`='$tan',`GST_No`='$gstno',

`Reg_Address`='$regaddress',`Reg_City`='$regcity',`Reg_Pin`='$regpin',`Reg_Mobile`='$regmobile',`Reg_Landline`='$reglandline',

`Com_Address`='$comaddress',`Com_City`='$comcity',`Com_Pin`='$compin',`Com_Mobile`='$commobile',`Com_Landline`='$comlandline',

`Bankname`='$bankname',`Bankaccount`='$bankacc',`Branch`='$branch',`IFSC`='$ifsc',`Acc_Type`='$acctype',

`Product`='$product',`Service`='$service',`Pickup`='$pickup',`Cod_Rem`='$codrem',`Billing_Type`='$billingtype',`Billing_Cycle`='$billingcycle',`remittancecycle`='$remittancecycle',

`commercialstype`='kg10',
`min10_a`='$min10_a',
`min10_b`='$min10_b',
`min10_c`='$min10_c',
`min10_d`='$min10_d',
`min10_e`='$min10_e',

`add10_a`='$add10_a',
`add10_b`='$add10_b',
`add10_c`='$add10_c',
`add10_d`='$add10_d',
`add10_e`='$add10_e',

`Rto10_a`='$rto10_a',
`Rto10_b`='$rto10_b',
`Rto10_c`='$rto10_c',
`Rto10_d`='$rto10_d',
`Rto10_e`='$rto10_e',
`FSC10`='$fsc10',
`COD10`='$cod10',
`Shipment_Lia10`='$shipmentlia10',
`GST10`='$gst10',
`specialnotes10`='$specialnote10',

`Client_Auth`='$clientauth',`Designation`='$designation',`Client_Email`='$clientemail',`Client_Mobile`='$clientmobile',

`Client_poc`='$clientpoc',`Poc_Designation`='$pocdesignation',`Poc_Email`='$pocemail',`Poc_Mobile`='$pocmobile',

`Operation_Poc`='$operationpoc',`Operation_Designation`='$operationdesignation',`Operation_Mail`='$operationemail',`Operation_Mobile`='$operationmobile',

`Bd_Name`='$bdname',`Bd_Designation`='$bddesignation',`Bd_mail`='$bdemail',`Bd_Mobile`='$bdmobile',

`Active`='$statuscheck',`cancel_reason`='$cancel_reason' WHERE `User_Id`=$User_Id";

mysqli_query($conn,$query10);
// Update 10 Kg  Account End
    }


}


























// If ID Not Created
if($ac1kg==0){
	// 1 Kg New Accounct Start
if($min1_a){
	$query1 = "INSERT INTO `asitfa_user`(`usertype`,`Company_Name`,`Website`,`Brand`,`Email`,`Pan`,`Tan`,`GST_No`,`Reg_Address`,`Reg_City`,`Reg_Pin`,`Reg_Mobile`,`Reg_Landline`,`Com_Address`,`Com_City`,`Com_Pin`,`Com_Mobile`,`Com_Landline`,`Bankname`,`Bankaccount`,`Branch`,`IFSC`,`Acc_Type`,`Product`,`Service`,`Pickup`,`Cod_Rem`,`Billing_Type`,`Billing_Cycle`,`remittancecycle`,`commercialstype`,`min1_a`,`min1_b`,`min1_c`,`min1_d`,`min1_e`,`add1_a`,`add1_b`,`add1_c`,`add1_d`,`add1_e`,`Rto1_a`,`Rto1_b`,`Rto1_c`,`Rto1_d`,`Rto1_e`,`FSC1`,`COD1`,`Shipment_Lia1`,`GST1`,`specialnotes1`,`Client_Auth`,`Designation`,`Client_Email`,`Client_Mobile`,`Client_poc`,`Poc_Designation`,`Poc_Email`,`Poc_Mobile`,`Operation_Poc`,`Operation_Designation`,`Operation_Mail`,`Operation_Mobile`,`Bd_Name`,`Bd_Designation`,`Bd_mail`,`Bd_Mobile`,`Pancard`,`GST_cert`,`Can_Cheque`,`Add_Proofe`,`Client_Mail_acc`,`foldername`,`Rec_Time_Stamp`,`Active`,`added_by`) VALUES ('client','$companyname','$website','$brand','$Email','$pan','$tan','$gstno','$regaddress','$regcity','$regpin','$regmobile','$reglandline','$comaddress','$comcity','$compin','$commobile','$comlandline','$bankname','$bankacc','$branch','$ifsc','$acctype','$product','$service','$pickup','$codrem','$billingtype','$billingcycle','$remittancecycle','kg1','$min1_a','$min1_b','$min1_c','$min1_d','$min1_e','$add1_a','$add1_b','$add1_c','$add1_d','$add1_e','$rto1_a','$rto1_b','$rto1_c','$rto1_d','$rto1_e','$fsc1','$cod1','$shipmentlia1','$gst1','$specialnote1','$clientauth','$designation','$clientemail','$clientmobile','$clientpoc','$pocdesignation','$pocemail','$pocmobile','$operationpoc','$operationdesignation','$operationemail','$operationmobile','$bdname','$bddesignation','$bdemail','$bdmobile','$uploadimagename','$gstcername','$canchequename','$addproofename','$clientmailaccname','$foldername',now(),'1','Admin')";
	mysqli_query($conn,$query1);
	$last_id1 = mysqli_insert_id($conn);
	$useruinqueidnois1 = "RPXC".$last_id1;
	$uniquequery1 = "UPDATE `asitfa_user` SET `useruinqueidno`='$useruinqueidnois1',`useruinqueparentid`='$User_UID' WHERE `User_Id`='$last_id1'";
	mysqli_query($conn,$uniquequery1);
	mysqli_query($conn,"INSERT INTO `asitfa_user_access`(`loginuser_id`) VALUES ('$last_id1')");
}
	// 1 Kg New Accounct End
}
if($ac2kg==0){
	// 2 Kg New Accounct Start
if($min2_a){
	$query2 = "INSERT INTO `asitfa_user`(`usertype`,`Company_Name`,`Website`,`Brand`,`Email`,`Pan`,`Tan`,`GST_No`,`Reg_Address`,`Reg_City`,`Reg_Pin`,`Reg_Mobile`,`Reg_Landline`,`Com_Address`,`Com_City`,`Com_Pin`,`Com_Mobile`,`Com_Landline`,`Bankname`,`Bankaccount`,`Branch`,`IFSC`,`Acc_Type`,`Product`,`Service`,`Pickup`,`Cod_Rem`,`Billing_Type`,`Billing_Cycle`,`remittancecycle`,`commercialstype`,`min2_a`,`min2_b`,`min2_c`,`min2_d`,`min2_e`,`add2_a`,`add2_b`,`add2_c`,`add2_d`,`add2_e`,`Rto2_a`,`Rto2_b`,`Rto2_c`,`Rto2_d`,`Rto2_e`,`FSC2`,`COD2`,`Shipment_Lia2`,`GST2`,`specialnotes2`,`Client_Auth`,`Designation`,`Client_Email`,`Client_Mobile`,`Client_poc`,`Poc_Designation`,`Poc_Email`,`Poc_Mobile`,`Operation_Poc`,`Operation_Designation`,`Operation_Mail`,`Operation_Mobile`,`Bd_Name`,`Bd_Designation`,`Bd_mail`,`Bd_Mobile`,`Pancard`,`GST_cert`,`Can_Cheque`,`Add_Proofe`,`Client_Mail_acc`,`foldername`,`Rec_Time_Stamp`,`Active`,`added_by`) VALUES ('client','$companyname','$website','$brand','$Email','$pan','$tan','$gstno','$regaddress','$regcity','$regpin','$regmobile','$reglandline','$comaddress','$comcity','$compin','$commobile','$comlandline','$bankname','$bankacc','$branch','$ifsc','$acctype','$product','$service','$pickup','$codrem','$billingtype','$billingcycle','$remittancecycle','kg2','$min2_a','$min2_b','$min2_c','$min2_d','$min2_e','$add2_a','$add2_b','$add2_c','$add2_d','$add2_e','$rto2_a','$rto2_b','$rto2_c','$rto2_d','$rto2_e','$fsc2','$cod2','$shipmentlia2','$gst2','$specialnote2','$clientauth','$designation','$clientemail','$clientmobile','$clientpoc','$pocdesignation','$pocemail','$pocmobile','$operationpoc','$operationdesignation','$operationemail','$operationmobile','$bdname','$bddesignation','$bdemail','$bdmobile','$uploadimagename','$gstcername','$canchequename','$addproofename','$clientmailaccname','$foldername',now(),'1','Admin')";
	mysqli_query($conn,$query2);
	$last_id2 = mysqli_insert_id($conn);
	$useruinqueidnois2 = "RPXC".$last_id2;
	$uniquequery2 = "UPDATE `asitfa_user` SET `useruinqueidno`='$useruinqueidnois2',`useruinqueparentid`='$User_UID' WHERE `User_Id`='$last_id2'";
	mysqli_query($conn,$uniquequery2);
	mysqli_query($conn,"INSERT INTO `asitfa_user_access`(`loginuser_id`) VALUES ('$last_id2')");
}
	// 2 Kg New Accounct End
}
if($ac5kg==0){
	// 5 Kg New Accounct Start
if($min5_a){
	$query5 = "INSERT INTO `asitfa_user`(`usertype`,`Company_Name`,`Website`,`Brand`,`Email`,`Pan`,`Tan`,`GST_No`,`Reg_Address`,`Reg_City`,`Reg_Pin`,`Reg_Mobile`,`Reg_Landline`,`Com_Address`,`Com_City`,`Com_Pin`,`Com_Mobile`,`Com_Landline`,`Bankname`,`Bankaccount`,`Branch`,`IFSC`,`Acc_Type`,`Product`,`Service`,`Pickup`,`Cod_Rem`,`Billing_Type`,`Billing_Cycle`,`remittancecycle`,`commercialstype`,`min5_a`,`min5_b`,`min5_c`,`min5_d`,`min5_e`,`add5_a`,`add5_b`,`add5_c`,`add5_d`,`add5_e`,`Rto5_a`,`Rto5_b`,`Rto5_c`,`Rto5_d`,`Rto5_e`,`FSC5`,`COD5`,`Shipment_Lia5`,`GST5`,`specialnotes5`,`Client_Auth`,`Designation`,`Client_Email`,`Client_Mobile`,`Client_poc`,`Poc_Designation`,`Poc_Email`,`Poc_Mobile`,`Operation_Poc`,`Operation_Designation`,`Operation_Mail`,`Operation_Mobile`,`Bd_Name`,`Bd_Designation`,`Bd_mail`,`Bd_Mobile`,`Pancard`,`GST_cert`,`Can_Cheque`,`Add_Proofe`,`Client_Mail_acc`,`foldername`,`Rec_Time_Stamp`,`Active`,`added_by`) VALUES ('client','$companyname','$website','$brand','$Email','$pan','$tan','$gstno','$regaddress','$regcity','$regpin','$regmobile','$reglandline','$comaddress','$comcity','$compin','$commobile','$comlandline','$bankname','$bankacc','$branch','$ifsc','$acctype','$product','$service','$pickup','$codrem','$billingtype','$billingcycle','$remittancecycle','kg5','$min5_a','$min5_b','$min5_c','$min5_d','$min5_e','$add5_a','$add5_b','$add5_c','$add5_d','$add5_e','$rto5_a','$rto5_b','$rto5_c','$rto5_d','$rto5_e','$fsc5','$cod5','$shipmentlia5','$gst5','$specialnote5','$clientauth','$designation','$clientemail','$clientmobile','$clientpoc','$pocdesignation','$pocemail','$pocmobile','$operationpoc','$operationdesignation','$operationemail','$operationmobile','$bdname','$bddesignation','$bdemail','$bdmobile','$uploadimagename','$gstcername','$canchequename','$addproofename','$clientmailaccname','$foldername',now(),'1','Admin')";
	mysqli_query($conn,$query5);
	$last_id5 = mysqli_insert_id($conn);
	$useruinqueidnois5 = "RPXC".$last_id5;
	$uniquequery5 = "UPDATE `asitfa_user` SET `useruinqueidno`='$useruinqueidnois5',`useruinqueparentid`='$User_UID' WHERE `User_Id`='$last_id5'";
	mysqli_query($conn,$uniquequery5);
	mysqli_query($conn,"INSERT INTO `asitfa_user_access`(`loginuser_id`) VALUES ('$last_id5')");
}
	// 5 Kg New Accounct End
}
if($ac10kg==0){
	// 10 Kg New Accounct Start
if($min10_a){
	$query10 = "INSERT INTO `asitfa_user`(`usertype`,`Company_Name`,`Website`,`Brand`,`Email`,`Pan`,`Tan`,`GST_No`,`Reg_Address`,`Reg_City`,`Reg_Pin`,`Reg_Mobile`,`Reg_Landline`,`Com_Address`,`Com_City`,`Com_Pin`,`Com_Mobile`,`Com_Landline`,`Bankname`,`Bankaccount`,`Branch`,`IFSC`,`Acc_Type`,`Product`,`Service`,`Pickup`,`Cod_Rem`,`Billing_Type`,`Billing_Cycle`,`remittancecycle`,`commercialstype`,`min10_a`,`min10_b`,`min10_c`,`min10_d`,`min10_e`,`add10_a`,`add10_b`,`add10_c`,`add10_d`,`add10_e`,`Rto10_a`,`Rto10_b`,`Rto10_c`,`Rto10_d`,`Rto10_e`,`FSC10`,`COD10`,`Shipment_Lia10`,`GST10`,`specialnotes10`,`Client_Auth`,`Designation`,`Client_Email`,`Client_Mobile`,`Client_poc`,`Poc_Designation`,`Poc_Email`,`Poc_Mobile`,`Operation_Poc`,`Operation_Designation`,`Operation_Mail`,`Operation_Mobile`,`Bd_Name`,`Bd_Designation`,`Bd_mail`,`Bd_Mobile`,`Pancard`,`GST_cert`,`Can_Cheque`,`Add_Proofe`,`Client_Mail_acc`,`foldername`,`Rec_Time_Stamp`,`Active`,`added_by`) VALUES ('client','$companyname','$website','$brand','$Email','$pan','$tan','$gstno','$regaddress','$regcity','$regpin','$regmobile','$reglandline','$comaddress','$comcity','$compin','$commobile','$comlandline','$bankname','$bankacc','$branch','$ifsc','$acctype','$product','$service','$pickup','$codrem','$billingtype','$billingcycle','$remittancecycle','kg10','$min10_a','$min10_b','$min10_c','$min10_d','$min10_e','$add10_a','$add10_b','$add10_c','$add10_d','$add10_e','$rto10_a','$rto10_b','$rto10_c','$rto10_d','$rto10_e','$fsc10','$cod10','$shipmentlia10','$gst10','$specialnote10','$clientauth','$designation','$clientemail','$clientmobile','$clientpoc','$pocdesignation','$pocemail','$pocmobile','$operationpoc','$operationdesignation','$operationemail','$operationmobile','$bdname','$bddesignation','$bdemail','$bdmobile','$uploadimagename','$gstcername','$canchequename','$addproofename','$clientmailaccname','$foldername',now(),'1','Admin')";
	mysqli_query($conn,$query10);
	$last_id10 = mysqli_insert_id($conn);
	$useruinqueidnois10 = "RPXC".$last_id10;
	$uniquequery10 = "UPDATE `asitfa_user` SET `useruinqueidno`='$useruinqueidnois10',`useruinqueparentid`='$User_UID' WHERE `User_Id`='$last_id10'";
	mysqli_query($conn,$uniquequery10);
	mysqli_query($conn,"INSERT INTO `asitfa_user_access`(`loginuser_id`) VALUES ('$last_id10')");
}
	// 10 Kg New Accounct End
}
// If ID Not Created













    // echo "IF Loop";
    echo "<script>window.location.assign('retailer_edit.php?m=$User_Id&msg=y')</script>";
}else{
    // echo "Else Loop";
    echo "<script>window.location.assign('retailer_edit.php?m=$User_Id&msg=n')</script>";
}



}
 ?>
