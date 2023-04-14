<?PHP
    error_reporting(1);
    extract($_REQUEST);

 //echo "Des";
// echo $Destinationpincode;
// echo $CateName;
// echo "<br><br>";


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://track.delhivery.com/c/api/pin-codes/json/?filter_codes=$Destinationpincode",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Token 7b40cb5dfe574749733682478e0c353d9e607ef3',
    'content: application/json'
  ),
));

$response = curl_exec($curl);
$response1 = json_decode($response, true);
curl_close($curl);

$rtmsg = $response1['delivery_codes'][0]['postal_code']['pin'];
if(empty($rtmsg)){
    echo "<span style='color:red'>Destination Pincode Not In Service</span>";
}else{
     $rtmsg1 = $response1['delivery_codes'][0]['postal_code']['state_code'];
  $locatinname = $response1['delivery_codes'][0]['postal_code']['district'];
   
  if($locatinname=="North West Delhi" OR $locatinname=="East Delhi" OR $locatinname=="South West Delhi" OR $locatinname=="New Delhi" OR $locatinname=="Central Delhi" OR $locatinname=="West Delhi" OR $locatinname=="Delhi NCR"){
    ;
  }
  // echo "<span style='color:green'>$locatinname</span>";
  echo $locatinname.'####'.$rtmsg1;
}
// echo "<pre>";
// print_r($response1);
// echo "</pre>";


?>




