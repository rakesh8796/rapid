<?php
error_reporting(1);
extract($_REQUEST);
include "config/dbcon.php";
date_default_timezone_set('Asia/Calcutta');


$pincode = $pincode;




$pincityfetch = "SELECT * FROM `serviceable_pincodes` WHERE `pincode`='$pincode'";
$pincityfetc=mysqli_query($conn,$pincityfetch);
$pincityfet = mysqli_fetch_assoc($pincityfetc);

if($pincityfet['hubcity']){
  echo $pincityfet['hubcity'];
}else{
  echo '0';
}



exit();


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://maps.googleapis.com/maps/api/geocode/json?address=".$pincode."&key=AIzaSyChLdtsgkds1xjbwfdT6pNvK8rPO-2K6_o",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$citystateresponse = curl_exec($curl);
$citystateresponse = json_decode($citystateresponse, true);

curl_close($curl);
// echo $citystateresponse;
$citystatestatus = count($citystateresponse['results']);
if($citystatestatus){
  // echo "<br> - - if  - - <br>";
  $pincodeis = $citystateresponse['results'][0]['address_components'][0]['long_name'];
  $cityis = $citystateresponse['results'][0]['address_components'][1]['long_name'];

$totaladrs0 = count($citystateresponse['results'][0]['address_components']);
$stte = $totaladrs0-2;
  $stateis = $citystateresponse['results'][0]['address_components'][$stte]['long_name'];

$totaladrs1 = count($citystateresponse['results'][0]['address_components']);
$cntry = $totaladrs1-1;
  $countryis = $citystateresponse['results'][0]['address_components'][$cntry]['long_name'];

  // echo "Pincode : ".$pincodeis;
  // echo "<br>";
  // echo "City : ".$cityis;
  // echo "<br>";
  // echo "State : ".$stateis;
  // echo "<br>";
  // echo "Country : ".$countryis;

  // $ressatusare =  {"status"=>"1","Pincode"=>$pincodeis,"City"=>$cityis,"State"=>$stateis,"Country"=>$countryis};
  // $ressatusare = array("status"=>"1","Pincode"=>$pincodeis,"City"=>$cityis,"State"=>$stateis,"Country"=>$countryis);
  // echo $ressatusare = json_decode($ressatusare);
  // print_r($ressatusare);

echo $ressatusare = $cityis;

}else{

  // $ressatusare = array("status"=>"0","Pincode"=>"0","City"=>"0","State"=>"0","Country"=>"0");
  // echo $ressatusare = json_encode($ressatusare);

echo $ressatusare = "0";
  // echo "<br> - - Else  - - <br>";

}

// echo "<pre>";
// print_r($citystateresponse);



 ?>
