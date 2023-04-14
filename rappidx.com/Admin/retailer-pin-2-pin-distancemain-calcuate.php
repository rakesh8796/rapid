<?php
  include "Layout_Header-retailer.php";
?>


<?php
error_reporting(1);
extract($_REQUEST);


$pincodeori = $oripin;
$pincodedis = $destinpin;



$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://maps.googleapis.com/maps/api/distancematrix/json
  ?destinations=$pincodedis
  &origins=$pincodeori
  &key=AIzaSyDZh0BHm9Z1L_PbfWf4Y5ViipH1IsamFSw",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$pin2pindistance = curl_exec($curl);
$pin2pindistance = json_decode($pin2pindistance, true);

curl_close($curl);
// echo $pin2pindistance;

$status = 0;

if($pin2pindistance['rows'][0]['elements'][0]['status']=="OK"){

  // echo "<br>  - - if  - - <br>";
  $distination = $pin2pindistance['destination_addresses'][0];
  $originstatn = $pin2pindistance['origin_addresses'][0];

  $distance = $pin2pindistance['rows'][0]['elements'][0]['distance']['text'];
  $estimatetime = $pin2pindistance['rows'][0]['elements'][0]['duration']['text'];



//   echo "Oringin : ".$originstatn;
//   echo "<br>";
//   echo "Destiantion : ".$distination;
//   echo "<br>";
// // echo "Distance : ".$distance;
// echo "Distance : ";
// // echo "<br>";
$distancenmetrix = explode(" ",$distance);
$distanceonly = $distancenmetrix[0];
// echo " - ";
$distancemetx = ucwords($distancenmetrix[1]);


  // echo "<br>";
  // echo "Estimate Time : ".$estimatetime;

echo $status = $distanceonly.' '.$distancemetx;


}else{


  echo $status;

}

 ?>
