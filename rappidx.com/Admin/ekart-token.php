<?php
// include "Layout_Header_Table.php";
include("config/dbcon.php");
extract($_REQUEST);
// error_reporting(1);
// include 'Header.php';
$crtdate = date('Y-m-d');
$crttime = date("H:i");




// error_reporting(1);

$curl = curl_init();

curl_setopt_array($curl, array(
CURLOPT_URL => 'https://api.ekartlogistics.com/auth/token',
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => '',
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 0,
CURLOPT_FOLLOWLOCATION => true,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => 'POST',
CURLOPT_HTTPHEADER => array(
'Content-Type: application/json',
'HTTP_X_MERCHANT_CODE: RPX',
'Authorization: Basic cmFwcGlkeDoqNkBLbHVmQjFANjMlU1FO'
),
));

$response = curl_exec($curl);
$response = json_decode($response, true);
curl_close($curl);
// echo $response;

echo "<pre>";
print_r($response);


if($response['unauthorised']){
    echo "<br>";
    echo $response['unauthorised'];
}else{
    echo "<br>";
    echo "Else Contion";
    $tokenno = trim($response['Authorization']);

    echo $ekarttoken = "UPDATE `api_tokens` SET `tokenno`='$tokenno',`update_date`='$crtdate',`update_time`='$crttime' WHERE `couriername`='Ekart'";
    mysqli_query($conn,$ekarttoken);
}