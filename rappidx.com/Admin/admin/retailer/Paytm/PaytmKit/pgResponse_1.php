<?php
session_start();
echo $_SESSION['CUST_ID'];
echo $useridisa = $_SESSION['CUST_ID'];

header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";


$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		echo "<b>Transaction status is success</b>" . "<br/>";
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
	}
	else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
	}

	if (isset($_POST) && count($_POST)>0 )
	{

		foreach($_POST as $paramName => $paramValue) {
				echo "<br/>" . $paramName . " = " . $paramValue;
		}

echo "<br>";
echo "<br>";
// Store Details In DataBase Required Files
include "../../config/dbcon.php";
// $query="INSERT INTO `spark_wallet_details`(`user_id`, `order_id`, `awb_no`, `currency`, `amount`, `txn_date_time`, `txnid`, `status`, `last_amt`, `update_amt`, `crt_amt`) VALUES ('$_POST["ORDERID"]')";

// $useridisa = "1";
$orderid = $_POST["ORDERID"];
$crncy = $_POST["CURRENCY"];
$amt = $_POST["TXNAMOUNT"];
$txndate = $_POST["TXNDATE"];
$txnid = $_POST["TXNID"];
$status = $_POST["STATUS"];

// Amount Details
$query1 = "SELECT * FROM `spark_wallet_details` WHERE `user_id`='$useridisa' ORDER BY `wallet_id` desc";
$data1 = mysqli_query($conn,$query1);
$res1 = mysqli_fetch_assoc($data1);

$lastamt = $res1['crt_amt'];
$finalamt = $amt + $lastamt;
// Amount Details

// echo $query="INSERT INTO `spark_wallet_details`
// (`user_id`, `order_id`,`currency`, `amount`, `txn_date_time`, `txnid`, `status`, `last_amt`, `update_amt`, `crt_amt`) VALUES
//  ('$useridisa','$orderid','$crncy','$amt','$txndate','$txnid','$status')";
$query="INSERT INTO `spark_wallet_details`(`user_id`, `order_id`,`currency`, `amount`, `txn_date_time`, `txnid`, `status`, `last_amt`, `update_amt`, `crt_amt`) VALUES('$useridisa','$orderid','$crncy','$amt','$txndate','$txnid','$status','$lastamt','$amt','$finalamt')";
if(mysqli_query($conn,$query))
{
	// echo "Work";
	header("location:../../add_balance.php?walletstatus=u");
    echo "<script>window.location.assign('../../add_balance.php?walletstatus=u')</script>";
}else
{
	// echo "No";
	header("location:../../add_balance.php?walletstatus=n");
    echo "<script>window.location.assign('../../add_balance.php?walletstatus=n')</script>";
}

// Store Details In DataBase


	}

	

}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

?>