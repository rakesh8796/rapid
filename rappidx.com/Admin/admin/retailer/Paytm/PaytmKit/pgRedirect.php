<?php
// session_start();
// echo $_SESSION['CUST_ID'];

header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$checkSum = "";
$paramList = array();

$ORDER_ID = $_POST["ORDER_ID"];
$CUST_ID = $_POST["CUST_ID"];
$INDUSTRY_TYPE_ID = $_POST["INDUSTRY_TYPE_ID"];
$CHANNEL_ID = $_POST["CHANNEL_ID"];
$TXN_AMOUNT = $_POST["TXN_AMOUNT"];


// DataBase Store Data
include "../../config/dbcon.php";


$query1 = "SELECT * FROM `spark_wallet_details` WHERE `user_id`='$CUST_ID' AND `status`='TXN_SUCCESS' ORDER BY `wallet_id` desc";
$data1 = mysqli_query($conn,$query1);
$res1 = mysqli_fetch_assoc($data1);

$lastamt = $res1['crt_amt'];
$finalamt = $TXN_AMOUNT + $lastamt;

$query="INSERT INTO `spark_wallet_details`(`user_id`, `order_id`, `last_amt`, `update_amt`,`crt_amt`) VALUES('$CUST_ID','$ORDER_ID','$lastamt','$TXN_AMOUNT','$finalamt')";
if(mysqli_query($conn,$query)){
}else{
	header("location:../../add_balance.php?walletstatus=n");
    echo "<script>window.location.assign('../../add_balance.php?walletstatus=n')</script>";
}
// DataBase Store Data

// Create an array having all required parameters for creating checksum.
$paramList["MID"] = PAYTM_MERCHANT_MID;
$paramList["ORDER_ID"] = $ORDER_ID;
$paramList["CUST_ID"] = $CUST_ID;
$paramList["INDUSTRY_TYPE_ID"] = $INDUSTRY_TYPE_ID;
$paramList["CHANNEL_ID"] = $CHANNEL_ID;
$paramList["TXN_AMOUNT"] = $TXN_AMOUNT;
$paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;
// $paramList["CALLBACK_URL"] = "http://localhost/Philon_Technology/14_Rappidx/Rappidx_6.3/Paytm/PaytmKit/pgResponse.php";
$paramList["CALLBACK_URL"] = "https://rappidx.com/Admin//Paytm/PaytmKit/pgResponse.php";
/*
$paramList["CALLBACK_URL"] = "http://localhost/PaytmKit/pgResponse.php";
$paramList["MSISDN"] = $MSISDN; //Mobile number of customer
$paramList["EMAIL"] = $EMAIL; //Email ID of customer
$paramList["VERIFIED_BY"] = "EMAIL"; //
$paramList["IS_USER_VERIFIED"] = "YES"; //

*/

//Here checksum string will return by getChecksumFromArray() function.
$checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);




// Store Details In DataBase Required Files
// include "../../config/dbcon.php";
// echo $query="INSERT INTO `spark_wallet_details`(`user_id`, `order_id`, `awb_no`, `currency`, `amount`, `txn_date_time`, `txnid`, `status`, `last_amt`, `update_amt`, `crt_amt`) VALUES ('$uid','$uid','$uid','$uid','$uid','$uid')";
// echo "<br><pre>";
// print_r($_POST);
// Store Details In DataBase


?>
<html>
<head>
<title>Merchant Check Out Page</title>
</head>
<body>
	<center><h1>Please do not refresh this page...</h1></center>
		<form method="post" action="<?php echo PAYTM_TXN_URL ?>" name="f1">
		<table border="1">
			<tbody>
			<?php
			foreach($paramList as $name => $value) {
				echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
			}
			?>
			<input type="hidden" name="CHECKSUMHASH" value="<?php echo $checkSum ?>">
			</tbody>
		</table>
		<script type="text/javascript">
			document.f1.submit();
		</script>
	</form>
</body>
</html>