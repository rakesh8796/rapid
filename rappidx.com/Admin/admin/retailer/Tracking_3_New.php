<?php
  include("config/dbcon.php");
  extract($_REQUEST);
  error_reporting(1);
  include 'Header.php';
?>

<style type="text/css">
body{
  background-color:gold
}
</style>

<?php

$allawbno1 = array();
echo $livequery1 = "SELECT * FROM `autostatusupdate3` WHERE `awbcheck`='0'  ORDER BY `autostatusid` LIMIT 50";
$livequery1r = mysqli_query($conn,$livequery1);
$livecount1 = 1;
while ($livequery1res = mysqli_fetch_assoc($livequery1r)){
        $allawbno1[$livecount1] = $livequery1res['awbnois'];
        $crtno = $livequery1res['autostatusid'];
        $queryallawb = "UPDATE `autostatusupdate3` SET `awbcheck`='1' WHERE `autostatusid`='$crtno'";
        mysqli_query($conn,$queryallawb);
$livecount1++;
}
// echo "<br>";
// print_r($allawbno1);
// echo "<br>";
// echo count($allawbno1);
// exit();


echo "<br><br>";
$foril=1;
foreach($allawbno1 as $airwaybillnumber){
  echo $foril.".".$airwaybillnumber."&ensp;&ensp;";
// Track Multiple Orders

$status = "";
$statusshow = "";
$shadowstatus = "";
$dtdcstatus = "";
$DelhiveryStatusCode = "";





  $query = "SELECT * FROM `spark_single_order` WHERE `Awb_Number`='$airwaybillnumber'";
  $queryr = mysqli_query($conn,$query);
  $res = mysqli_fetch_assoc($queryr);
  if(mysqli_num_rows($queryr)){
    $couriername = $res['awb_gen_by'];
    $courier_uid = $res['Single_Order_Id'];
  }

if($couriername=="XpressBees"){
// Xpressbee Tracking Order
  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://xbclientapi.xbees.in/TrackingService.svc/GetBulkShipmentStatus',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS =>'{
      "XBkey": "dSsID3156mssewRrPSkspKSq",
      "AWBNo": "'.$airwaybillnumber.'"
  }',
    CURLOPT_HTTPHEADER => array(
      'Content-Type: application/json',
      'Cookie: ASP.NET_SessionId=kmsvx415s43bx0nrtxnny2ai'
    ),
  ));
  $response = curl_exec($curl);
  $response1 = json_decode($response, true);
  curl_close($curl);
// echo "<pre>";
// print_r($response1);
// echo "</pre>";
// exit();
  // echo $response;
    $xbrernmsgapi = $response1['GetBulkShipmentStatus'][0]["ReturnMessage"];
    $crtlocation = $response1['GetBulkShipmentStatus'][0]["CurrentLocation"];
    $status = $response1['GetBulkShipmentStatus'][0]["Status"];
    $ordertype = $response1['GetBulkShipmentStatus'][0]["OrderType"];
    $finaldestination = $response1['GetBulkShipmentStatus'][0]["FinalDestinationName"];
    $StatusDate = $response1['GetBulkShipmentStatus'][0]["StatusDate"];
    // echo $response1['GetBulkShipmentStatus'][0]["StatusCode"];
    // echo $response1['GetBulkShipmentStatus'][0]["LastAttemptStatus"];
    // echo $response1['GetBulkShipmentStatus'][0]["NetPayment"];
    // echo $response1['GetBulkShipmentStatus'][0]["OrderNo"];
    // echo $response1['GetBulkShipmentStatus'][0]["DeliveryDate"];
    // echo $response1['GetBulkShipmentStatus'][0]["DeliveryTime"];


// Live Status Check
// echo $status;
if($xbrernmsgapi=="Successful"){
// echo "<br>";
  // if($status=="DRC" OR $status=="PND"){      $statusshow = "Pending";
  // }elseif($status=="PUC" OR $status=="OFP" OR $status=="PUD" OR $status=="PKD"){      $statusshow = "InTransit";
  // }elseif($status=="IT"){      $statusshow = "InTransit";
  // }elseif($status=="RAD"){      $statusshow = "RAD";
  // }elseif($status=="OFD"){      $statusshow = "OFD";
  // }elseif($status=="UD"){      $statusshow = "Undelivered";
  // }elseif($status=="DLVD"){      $statusshow = "Delivered";
  // }elseif($status=="LOST"){      $statusshow = "Lost";
  // }elseif($status=="RTD"){      $statusshow = "RTO Delivered";
  // }elseif($status=="RTON" OR $status=="RTO" OR $status=="RTO-IT" OR $status=="RAO" OR $status=="RTO-OFD"){      $statusshow = "RTO InTransit";
  // }else{      $statusshow = $status;   }
  if($status=="Return Delivered"){      $statusshow = "RTO Delivered";
  // }elseif($status=="Return Delivered"){      $statusshow = "RTO Delivered";
  }elseif($status=="Delivered"){      $statusshow = "Delivered";
  }elseif($status=="Return to Origin InTransit"){      $statusshow = "RTO InTransit";
  }else{      $statusshow = $status;   }
  echo "<br><br>";
  echo $shadowfaxawbnoudate = "UPDATE `spark_single_order` SET `order_status`='$status',`order_status1`='',`order_status_show`='$statusshow' WHERE `Single_Order_Id`='$courier_uid'";
  mysqli_query($conn,$shadowfaxawbnoudate);
  echo "<br><br>";
// }elseif($xbrernmsgapi=="Details not found"){
//   echo "<br><br>";
//   echo $shadowfaxawbnoudate = "UPDATE `spark_single_order` SET `order_cancel`='1' WHERE `Single_Order_Id`='$courier_uid'";
//   mysqli_query($conn,$shadowfaxawbnoudate);
//   echo "<br><br>";
  }
// Live Status Check

// Xpressbee Tracking Order
}elseif($couriername=="Shadowfax"){
// ShadowFax Tracking Order
$curl = curl_init();

curl_setopt_array($curl, array(
CURLOPT_URL => 'https://dale.staging.shadowfax.in/api/v2/clients/bulk_track/?format=json',
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => '',
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 0,
CURLOPT_FOLLOWLOCATION => true,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => 'POST',
CURLOPT_POSTFIELDS =>'{
  "awb_numbers": ["'.$airwaybillnumber.'"]
}',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Token b01f9aa380a64322e3e759cb4362de9a953250e9',
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);
$response1 = json_decode($response, true);
curl_close($curl);
// echo $response;
// echo "<pre>";
// print_r($response1);
// exit();
// echo "<br><br>";
$paymenttype = $response1["data"][0]["payment_mode"];
$statusdisplay = $response1["data"][0]["status_display"];
$stausshow = $response1["data"][0]["status"];
$destinationcity = $response1["data"][0]["delivery_details"]["city"];
$destinationstate = $response1["data"][0]["delivery_details"]["state"];
// print_r($response1["data"][0]["tracking_details"]);
// print_r($response1);

$ttrackno = count($response1["data"][0]["tracking_details"]);
if($ttrackno){
    $ttrackno = $ttrackno-1;
    // print_r($response1["data"][0]["tracking_details"][$ttrackno]);
    $shadowlocationtime = $response1["data"][0]["tracking_details"][$ttrackno]['created'];
    $shadowlocation = $response1["data"][0]["tracking_details"][$ttrackno]['location'];
    $shadowstausid = $response1["data"][0]["tracking_details"][$ttrackno]['status_id'];
    $shadowstatus = $response1["data"][0]["tracking_details"][$ttrackno]['status'];
    $shadowremark = $response1["data"][0]["tracking_details"][$ttrackno]['remarks'];
    $shadowawbno = $response1["data"][0]["tracking_details"][$ttrackno]['awb_number'];
}

// Live Status Check
if($shadowstatus){
echo "<br>";
  echo $shadowfaxawbnoudate = "UPDATE `spark_single_order` SET `order_status`='$shadowstatus',`order_status1`='',`order_status_show`='$shadowstatus' WHERE `Single_Order_Id`='$courier_uid'";
  mysqli_query($conn,$shadowfaxawbnoudate);
echo "<br>";
}
// Live Status Check

// ShadowFax Tracking Order
}elseif($couriername=="DTDC"){
// DTDC Tracking Order

$curl = curl_init();
curl_setopt_array($curl, array(
CURLOPT_URL => 'https://blktracksvc.dtdc.com/dtdc-api/rest/JSONCnTrk/getTrackDetails',
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => '',
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 0,
CURLOPT_FOLLOWLOCATION => true,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => 'POST',
CURLOPT_POSTFIELDS =>'{
    "trkType":"cnno",
    "strcnno":"'.$airwaybillnumber.'",
    "addtnlDtl":"Y"
}',
  CURLOPT_HTTPHEADER => array(
    'X-Access-Token: GL2467_trk:a27546321b097cde8b9f2f2bb8da69cf',
    'Content-Type: application/json',
    'Cookie: JSESSIONID=8D69770585A7DC4A53FCB129CEE674E6'
  ),
));

$response = curl_exec($curl);
$response1 = json_decode($response, true);
curl_close($curl);
// echo $response;
$paymenttype = $response1["trackHeader"]["strCNProdCODFOD"];
$stausshow = $response1["trackHeader"]["strStatus"];
$response1["trackHeader"]["strExpectedDeliveryDate"];
$dtdcawbno = $response1["trackHeader"]["strShipmentNo"];
$ttrackno = count($response1["trackDetails"]);
if($ttrackno){
    $ttrackno = $ttrackno-1;
    $dtdcstatuscode = $response1["trackDetails"][$ttrackno]['strCode'];
    $dtdcstatus = $response1["trackDetails"][$ttrackno]['strAction'];
    $dtdccrtlocation = $response1["trackDetails"][$ttrackno]['strOrigin'];
    $dtdcnextdestination = $response1["trackDetails"][$ttrackno]['strDestination'];
    $dtdcupdatedate = $response1["trackDetails"][$ttrackno]['strActionDate'];
    $dtdcreceiver = $response1["trackDetails"][$ttrackno]['sTrRemarks'];
}


$dtdcawbdetaos = array();
for($i=0;$i<$ttrackno+1;$i++){
  $i;
  // $strCode = $response1["trackDetails"][$i]['strCode'];
  $strAction = $response1["trackDetails"][$i]['strAction'];
  // $strManifestNo = $response1["trackDetails"][$i]['strManifestNo'];
  $strOrigin = $response1["trackDetails"][$i]['strOrigin'];
  // $strOriginCode = $response1["trackDetails"][$i]['strOriginCode'];
  $strDestination = $response1["trackDetails"][$i]['strDestination'];
  // $strDestinationCode = $response1["trackDetails"][$i]['strDestinationCode'];
  $strActionDate = $response1["trackDetails"][$i]['strActionDate'];
  $strActionTime = $response1["trackDetails"][$i]['strActionTime'];
  $sTrRemarks = $response1["trackDetails"][$i]['sTrRemarks'];

  $dated = substr($strActionDate,0,2);
  $datem = substr($strActionDate,2,2);
  $datey = substr($strActionDate,4,4);
  $timeh = substr($strActionTime,0,2);
  $timem = substr($strActionTime,2,4);
  $datetime = $dated."/".$datem."/".$datey."&ensp;".$timeh.":".$timem;

  $dtdcawbdetaos[] = array($datetime,$strOrigin,$strDestination,$strAction,$sTrRemarks);
  // $dtdcawbdetaos[] = array($strAction,$strOrigin,$strDestination,$strActionDate,$strActionTime,$sTrRemarks);
}



// Live Status Check
if($dtdcstatus){
echo "<br>";

if($dtdcstatus=="RTO Not Delivered"){    $dtdcstatusshow = "RTO Delivered";
}else{ $dtdcstatusshow==$dtdcstatus;  }
  echo $shadowfaxawbnoudate = "UPDATE `spark_single_order` SET `order_status`='$dtdcstatus',`order_status1`='$dtdcreceiver',`order_status_show`='$dtdcstatusshow' WHERE `Single_Order_Id`='$courier_uid'";
  mysqli_query($conn,$shadowfaxawbnoudate);
echo "<br>";
}
// Live Status Check


// echo "<pre>";
// print_r($response1);
// exit();
// echo "<br><br>";

// DTDC Tracking Order
}elseif($couriername=="Delhivery"){
// Delhivery Tracking Order


$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://track.delhivery.com/api/v1/packages/json/?cl=RAPPIDXSURFACE-B2C&token=7b40cb5dfe574749733682478e0c353d9e607ef3&waybill=".$airwaybillnumber."",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);
$response1 = json_decode($response, true);
curl_close($curl);


// echo $response;
$delhivererror = $response1["Error"];
// print_r($response1["ShipmentData"][0]["Shipment"]);
// print_r($response1["ShipmentData"][0]["Shipment"]);

$DelhiveryAWB = $response1["ShipmentData"][0]["Shipment"]["AWB"];
$PaymentType = $response1["ShipmentData"][0]["Shipment"]["OrderType"];
$DelhiveryDestination = $response1["ShipmentData"][0]["Shipment"]["Destination"];
$DelhiveryStatusCode = $response1["ShipmentData"][0]["Shipment"]["Status"]['Status'];
$DelhiveryLastLocat = $response1["ShipmentData"][0]["Shipment"]["Status"]['StatusLocation'];
$DelhiveryScanDateTime = $response1["ShipmentData"][0]["Shipment"]["Status"]['StatusDateTime'];



$ttrackno = count($response1["ShipmentData"][0]["Shipment"]["Scans"]);
$delhiveryawbdetaos = array();
for($i=0;$i<$ttrackno;$i++){
  // $ScanDateTime = $response1["ShipmentData"][0]["Shipment"]["Scans"][$i]["ScanDetail"]["ScanDateTime"];
  // $ScanType = $response1["ShipmentData"][0]["Shipment"]["Scans"][$i]["ScanDetail"]["ScanType"];
  $StatusDateTime = $response1["ShipmentData"][0]["Shipment"]["Scans"][$i]["ScanDetail"]["StatusDateTime"];
  $ScannedLocation = $response1["ShipmentData"][0]["Shipment"]["Scans"][$i]["ScanDetail"]["ScannedLocation"];
  $Scan = $response1["ShipmentData"][0]["Shipment"]["Scans"][$i]["ScanDetail"]["Scan"];
  $Instructions = $response1["ShipmentData"][0]["Shipment"]["Scans"][$i]["ScanDetail"]["Instructions"];
  // $StatusCode = $response1["ShipmentData"][0]["Shipment"]["Scans"][$i]["ScanDetail"]["StatusCode"];
  $dated = substr($StatusDateTime,8,2);
  $datem = substr($StatusDateTime,5,2);
  $datey = substr($StatusDateTime,0,4);
  $timehms = substr($StatusDateTime,11,8);
  // echo ":";
  // echo $timem = substr($StatusDateTime,14,2);
  // echo ":";
  // echo $times = substr($StatusDateTime,16,3);
  $datetime = $dated."/".$datem."/".$datey."&ensp;".$timehms;

  // $delhiveryawbdetaos[] = array($ScanDateTime,$ScanType,$Scan,$StatusDateTime,$ScannedLocation,$Instructions,$StatusCode);
  $delhiveryawbdetaos[] = array($datetime,$ScannedLocation,$Scan,$Instructions);
}




// Live Status Check
if($DelhiveryStatusCode){
echo "<br><br>";
  if($DelhiveryStatusCode=="RTO"){  $DelhiveryStatusCodeshow = "RTO Delivered";
  }else{   $DelhiveryStatusCodeshow = $DelhiveryStatusCode;  }
  echo $shadowfaxawbnoudate = "UPDATE `spark_single_order` SET `order_status`='$DelhiveryStatusCode',`order_status1`='$Instructions',`order_status_show`='$DelhiveryStatusCodeshow' WHERE `Single_Order_Id`='$courier_uid'";
  mysqli_query($conn,$shadowfaxawbnoudate);
echo "<br><br>";
// }elseif($delhivererror=="No such waybill or Order Id found"){
//   echo "<br><br>";
//   echo $shadowfaxawbnoudate = "UPDATE `spark_single_order` SET `order_cancel`='1' WHERE `Single_Order_Id`='$courier_uid'";
//   mysqli_query($conn,$shadowfaxawbnoudate);
//   echo "<br><br>";
}
// Live Status Check

// echo "<pre>";
// print_r($response1);
// echo "</pre>";
// exit();


// $orginname = $response1["ShipmentData"][0]["Shipment"]["Origin"];
// $PickUpDate = $response1["ShipmentData"][0]["Shipment"]["PickUpDate"];
// $ReferenceNo = $response1["ShipmentData"][0]["Shipment"]["ReferenceNo"];

// Delhivery Tracking Order
}else{

}
?>













<?php
echo "<br>";
// Track Multiple Orders
$foril++;
}
// Track Multiple Orders
 ?>







<?php
// Check Data Search Or Not
// }
// Check Data Search Or Not
?>


<?php
$conn123 = mysqli_connect("localhost","singhaniyatest","singhaniyatest","singhaniyatest");
date_default_timezone_set('Asia/Kolkata');
$query123 = "INSERT INTO `testing_cronjob`(`name`, `crtdate`, `count`) VALUES ('Admin',now(),'New_3')";
if(mysqli_query($conn123,$query123))
{
	echo "Work";
}else{
	echo "Else";
}
?>