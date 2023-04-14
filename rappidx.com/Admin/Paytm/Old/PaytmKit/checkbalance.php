<?php
/**
* import checksum generation utility
* You can get this utility from https://developer.paytm.com/docs/checksum/
*/
require_once("checksum/PaytmChecksum.php");

$paytmParams = array();

/* body parameters */
$paytmParams["body"] = array(

    "mid"         => "cwrvZH47704415523233",
    "userToken"   => "eyJlbmMiOiJBMjU2R0NNIiwiYWxnIjoiZGlyIn0..xxxxxxxxxxx.9iHTtWbCZ0I6qbn2sUnyz5siw1fqbmtEnFMFE7nSIX-yrwCkiGfAC6QmPr9q-tw8LMPOh5-3UXRbpeVZEupQd3wNyaArWybRX2HAxJDRD8mxJ_wxzJM6GZ1ov4O3EIsx2Y_Zr0aHCd3VbnTjRUnlVdxXJPFG8QZs0b_2TVdoAX3_QjZS8_dwcmIWoH8ebDzOIs7MJacETfMtyFGAo8Xc0LjznToUWvTsTbIXQoF1yB0.1fZFAYJVsY61BTv2htLcXQ8800",
    "totalAmount" => "1.00",
);

/*
* Generate checksum by parameters we have in body
* Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys 
*/
$checksum = PaytmChecksum::generateSignature(json_encode($paytmParams["body"], JSON_UNESCAPED_SLASHES), "YOUR_MERCHANT_KEY");

$paytmParams["head"] = array(
    "clientId"    => "4",
    "signature"	  => $checksum
);

$post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);

/* for Staging */
$url = "https://securegw-stage.paytm.in/paymentservices/pay/consult";

/* for Production */
// $url = "https://securegw.paytm.in/paymentservices/pay/consult";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));  
$response = curl_exec($ch);       
print_r($response);
