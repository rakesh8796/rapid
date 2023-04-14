<?php
session_start();
error_reporting(1);
extract($_REQUEST);
include "config/dbcon.php";

// echo "<br>";
// echo "User Id : - ";
// echo $User_Id;
// echo "<br>";


if(isset($submit))
{

$oriclientpass = $clientpass;
$clientpass = md5($clientpass);

$foldername = $folderare;


$query = "UPDATE `asitfa_user` SET
`Company_Name`='$companyname',
`Website`='$website',
`Brand`='$brand',
`Email`='$Email',
`Pan`='$pan',
`Tan`='$tan',
`GST_No`='$gstno',
`Reg_Address`='$regaddress',
`Reg_City`='$regcity',
`Reg_Pin`='$regpin',
`Reg_Mobile`='$regmobile',
`Reg_Landline`='$reglandline',

`User_Password`='$clientpass',
`User_Password_show`='$oriclientpass',

`Com_Address`='$comaddress',
`Com_City`='$comcity',
`Com_Pin`='$compin',
`Com_Mobile`='$commobile',
`Com_Landline`='$comlandline',
`Bankname`='$bankname',
`Bankaccount`='$bankacc',
`Branch`='$branch',
`IFSC`='$ifsc',
`Acc_Type`='$acctype',
`Product`='$product',
`Service`='$service',
`Pickup`='$pickup',
`Cod_Rem`='$codrem',

`Billing_Type`='$billingtype',
`Billing_Cycle`='$billingcycle',
`Min_a`='$min_a',
`Min_b`='$min_b',
`Min_c`='$min_c',
`Min_d`='$min_d',
`Min_e`='$min_e',
`Add_a`='$add_a',
`Add_b`='$add_b',
`Add_c`='$add_c',
`Add_d`='$add_d',
`Add_e`='$add_e',
`Rto_a`='$rto_a',
`Rto_b`='$rto_b',

`Rto_c`='$rto_c',
`Rto_d`='$rto_d',
`Rto_e`='$rto_e',
`FSC`='$fsc',
`COD`='$cod',
`Shipment_Lia`='$shipmentlia',
`GST`='$gst',
`Client_Auth`='$clientauth',
`Designation`='$designation',
`Client_Email`='$clientemail',
`Client_Mobile`='$clientmobile',

`Client_poc`='$clientpoc',
`Poc_Designation`='$pocdesignation',
`Poc_Email`='$pocemail',
`Poc_Mobile`='$pocmobile',
`Operation_Poc`='$operationpoc',
`Operation_Designation`='$operationdesignation',

`Operation_Mail`='$operationemail',
`Operation_Mobile`='$operationmobile',
`Bd_Name`='$bdname',
`Bd_Designation`='$bddesignation',
`Bd_mail`='$bdemail',
`Bd_Mobile`='$bdmobile'
";

// `Active`='$statuscheck',
// `cancel_reason`='$cancel_reason'


$uploadimagename = $_FILES["uploadimage"]["name"];
$uploadimagenamet = $_FILES["uploadimage"]["tmp_name"];
if($uploadimagename)
{
	$query.=",`Pancard`='$uploadimagename'";
	move_uploaded_file($uploadimagenamet,"upload/$foldername/$uploadimagename");
}



$gstcername = $_FILES["gstcert"]["name"];
$gstcernamet = $_FILES["gstcert"]["tmp_name"];
if($gstcername)
{
	$query.=",`GST_cert`='$gstcername'";
	move_uploaded_file($gstcernamet,"upload/$foldername/$gstcername");
}



$canchequename = $_FILES["cancheque"]["name"];
$canchequenamet = $_FILES["cancheque"]["tmp_name"];
if($canchequename)
{
	$query.=",`Can_Cheque`='$canchequename'";
	move_uploaded_file($canchequenamet,"upload/$foldername/$canchequename");
}




$addproofename = $_FILES["addproofe"]["name"];
$addproofenamet = $_FILES["addproofe"]["tmp_name"];
if($addproofename)
{
	$query.=",`Add_Proofe`='$addproofename'";
	move_uploaded_file($addproofenamet,"upload/$foldername/$addproofename");
}



$clientmailaccname = $_FILES["clientmailacc"]["name"];
$clientmailaccnamet = $_FILES["clientmailacc"]["tmp_name"];
if($clientmailaccname)
{
	$query.=",`Client_Mail_acc`='$clientmailaccname'";
	move_uploaded_file($clientmailaccnamet,"upload/$foldername/$clientmailaccname");
}



$query.= " WHERE `User_Id`=$User_Id";



if(mysqli_query($conn,$query))
{
    echo "<script>window.location.assign('Client_Edite.php?m=$User_Id&msg=y')</script>";
}else
{
    echo "<script>window.location.assign('Client_Edite.php?m=$User_Id&msg=n')</script>";
}



}
 ?>
