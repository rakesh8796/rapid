<?PHP
    error_reporting(1);
    extract($_REQUEST);
    

// echo "Ori";
// echo $Originpincode;
// echo $CateName;
// echo "<br><br>";


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://track.delhivery.com/c/api/pin-codes/json/?filter_codes=$Originpincode",
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

$rtmsg = $response1['delivery_codes'][0]['postal_code']['state_code'];
 $rtmsg1 = $response1['delivery_codes'][0]['postal_code']['district'];
 echo $rtmsg1.'####'.$rtmsg;
 
if(empty($rtmsg)){
    echo "<span style='color:red'>Origin Pincode Not In Service</span>";
}else{
  $locatinname = $response1['delivery_codes'][0]['postal_code']['state_code'];
  if($locatinname=="A"){
    echo 'A';
  }
   //echo "<span style='color:green'>$locatinname</span>";
  //echo "$locatinname";
}
// echo "<pre>";
// print_r($response1);
// echo "</pre>";






?>




