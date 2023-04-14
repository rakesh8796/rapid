<?php
 ini_set('session.gc_maxlifetime', 604800);

 // each client should remember their session id for EXACTLY 1 week
 session_set_cookie_params(604800);

 
ob_start();
require_once('../../include/function/autoload.php');
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
			$CUSTID = $_GET['CUST_ID'];
		?>
		<form class="form-horizontal" name="xyz" role="form" id="popup-validation" method="post" action="../../savedata.php">
		<input type="hidden" name="CUSTID" value="<?php echo $CUSTID; ?>">
	 	<input type="hidden" name="ORDER_ID" value="<?php echo $paramList["ORDERID"]; ?>">
	 	<input type="hidden" name="INDUSTRY_TYPE_ID" value="<?php echo $paramList["CURRENCY"]; ?>">
	 	<input type="hidden" name="CHANNEL_ID" value="<?php echo $paramList['ORDERID']; ?>">
	 	<input type="hidden" name="TXN_AMOUNT" value="<?php echo $paramList['TXNAMOUNT']; ?>">

	 </form>
	<script type="text/javascript">

   var wait=setTimeout("document.xyz.submit();",5000);

</script>
<?php
	}
	
}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

?>