<?php
  include("config/dbcon.php");
  extract($_REQUEST);
  error_reporting(1);
?>

<style type="text/css">
body{
  background-color:gold
}
</style>

<?php

$allawbno1 = array();
echo $livequery1 = "SELECT * FROM `autostatusupdate3` WHERE `awbcheck`='0'  ORDER BY `autostatusid` LIMIT 1000";
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


// $allawbno1 = array('8445110234430','8445110219520');
// $allawbno1 = array('8445110112873','8445110112862');
// $allawbno1 = array('14315621110736','14315621110800','14315621110864','14315621118256','14315621182289');


echo "<br><br>";
$foril=1;
foreach($allawbno1 as $airwaybillnumber){
  echo $foril.".".$airwaybillnumber."&ensp;&ensp;";
  echo "<br><br>";
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



















// Xpressbee Tracking Order
if($couriername=="XpressBees"){
// Xpressbee Tracking Order



















$curl = curl_init();
curl_setopt_array($curl, array(
CURLOPT_URL => 'http://xbclientapi.xbees.in/TrackingService.svc/GetShipmentSummaryDetails',
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
  'Cookie: ASP.NET_SessionId=fecbe2ps12smztanzv1q2bcv'
),
));

$response = curl_exec($curl);
$response1 = json_decode($response, true);
curl_close($curl);
// echo "<pre>";
// print_r($response1);
// echo "</pre>";

// echo "<br>";
// echo $xbauthapi = $response1[0]["AuthKey"];
// echo "<br>";
// echo $xbcntryapi = $response1[0]["CountryCode"];
// echo "<br>";
// echo $xbordenoapi = $response1[0]["OrderNo"];
// echo "<br>";
$xbrernmsgapi = $response1[0]["ReturnMessage"];
// echo "<br>";


$airwaybillnumber = $response1[0]["AWBNo"];
$xbawbdetaos = array();
// for($i=0;$i<1;$i++){
//     $status = $response1[0]['ShipmentSummary'][$i]['StatusCode'];
//     $crtlocation = $response1[0]['ShipmentSummary'][$i]['Location'];
//     $xbstatusdate = $response1[0]['ShipmentSummary'][$i]['StatusDate'];
//     $xbstatustime = $response1[0]['ShipmentSummary'][$i]['StatusTime'];
//     $finaldestination = $response1[0]['ShipmentSummary'][$i]['DestinationLocation'];
//   $dated = substr($xbstatusdate,0,2);
//   $datem = substr($xbstatusdate,3,2);
//   $datey = substr($xbstatusdate,6,4);
//   $timeh = substr($xbstatustime,0,2);
//   $timem = substr($xbstatustime,2,4);
//   $StatusDate = $dated."/".$datem."/".$datey."&ensp;".$timeh.":".$timem;
// }


$ttrackno = count($response1[0]["ShipmentSummary"]);
$arrayno = $ttrackno-1;
$tarrayno = $ttrackno-1;
$xbawbdetaos = array();
for($i=0;$i<$ttrackno;$i++){
    $xbstatusdate = $response1[0]['ShipmentSummary'][$i]['StatusDate'];
    $xbstatustime = $response1[0]['ShipmentSummary'][$i]['StatusTime'];
    $xbcrtlocation = $response1[0]['ShipmentSummary'][$i]['Location'];
    $xbstatuscode = $response1[0]['ShipmentSummary'][$i]['StatusCode'];
    $xbstatusare = $response1[0]['ShipmentSummary'][$i]['Status'];
    $xbremark = $response1[0]['ShipmentSummary'][$i]['Comment'];
    $xbpickupdate = $response1[0]['ShipmentSummary'][$i]['PickUpDate'];
    $xbpickuptime = $response1[0]['ShipmentSummary'][$i]['PickUpTime'];
// echo "<br><br>";
  $dated = substr($xbstatusdate,0,2);
  $datem = substr($xbstatusdate,3,2);
  $datey = substr($xbstatusdate,6,4);
  $timeh = substr($xbstatustime,0,2);
  $timem = substr($xbstatustime,2,4);
  $datetime = $dated."/".$datem."/".$datey."&ensp;".$timeh.":".$timem;

  $pickd = substr($xbpickupdate,0,2);
  $pickm = substr($xbpickupdate,3,2);
  $picky = substr($xbpickupdate,6,4);
  $pickth = substr($xbpickuptime,0,2);
  $picktm = substr($xbpickuptime,2,4);
  $pickupdate = $pickd."/".$pickm."/".$picky."&ensp;".$pickth.":".$picktm;
  $xbawbdetaos[$arrayno] = array($datetime,$xbcrtlocation,$xbstatuscode,$xbremark,$xbstatusare,$pickupdate);
$arrayno--;
}


$delivereydate = '0000-00-00';
$delivereydatetime = '0000-00-00 00:00';
$rtodate = '0000-00-00';
$rtodatetime = '0000-00-00 00:00';
$lastupdatedate = '0000-00-00';
$lastupdatedatetime = '0000-00-00 00:00';
$pickupdate = '0000-00-00';
$pickupdatetime = '0000-00-00 00:00';



if($xbrernmsgapi=="Successful"){
  $crtdatetime = $xbawbdetaos[$tarrayno][0];
  $pickupdate = $xbawbdetaos[$tarrayno][5];

if(!empty($pickupdate)){
      $pickdd = substr($pickupdate,0,2);
      $pickdm = substr($pickupdate,3,2);
      $pickdy = substr($pickupdate,6,4);
      $pickth = substr($pickupdate,16,2);
      $picktm = substr($pickupdate,19,2);
    $pickupdatais = $pickdy."-".$pickdm."-".$pickdd;
    $pickuptimeis = $pickth.":".$picktm;
    $pickupdatais = date("Y-m-d", strtotime($pickupdatais));
    $pickuptimeis = date("H:i",strtotime($pickuptimeis));
    // echo "<br>";
    $pickupdatetime = $pickupdatais." ".$pickuptimeis;
  $pickupdate = $pickupdatais;
  $pickupdatetime = $pickupdatetime;
}

if(!empty($crtdatetime)){
      $lastupdate = $crtdatetime;
      $dated = substr($lastupdate,0,2);
      $datem = substr($lastupdate,3,2);
      $datey = substr($lastupdate,6,4);
      $timeh = substr($lastupdate,16,2);
      $timem = substr($lastupdate,19,2);
    $date = $datey."-".$datem."-".$dated;
    $time = $timeh.":".$timem;
    $crtdate = date("Y-m-d", strtotime($date));
    $time14 = date("H:i",strtotime($time));
    // echo "<br>";
    $crtdatetime = $crtdate." ".$time14;
  $lastupdatedate = $crtdate;
  $lastupdatedatetime = $crtdatetime;
}

  $crtaddress = $xbawbdetaos[$tarrayno][1];
  $status = $xbawbdetaos[$tarrayno][2];
  $remark = $xbawbdetaos[$tarrayno][3];
  $xbstatusare = $xbawbdetaos[$tarrayno][4];

$xbremarkshow = $remark;

  if($status=="DRC" OR $status=="PND"){
    $statusshow = "Pending";
    $xbremarkshow = $xbstatusare;
  }elseif($status=="PUC" OR $status=="OFP" OR $status=="PUD" OR $status=="PKD"){
    $statusshow = "InTransit";
    $xbremarkshow = $xbstatusare;
  }elseif($status=="IT"){
    $statusshow = "InTransit";
    $xbremarkshow = $xbstatusare;
  }elseif($status=="RAD"){
    $statusshow = "RAD";
    $xbremarkshow = $xbstatusare;
  }elseif($status=="OFD"){
    $statusshow = "OFD";
    $xbremarkshow = $xbstatusare;
  }elseif($status=="UD"){
    $statusshow = "Undelivered";
    $xbremarkshow = $xbstatusare;
  }elseif($status=="DLVD"){
    $statusshow = "Delivered";
    $xbremarkshow = $xbstatusare;
    $delivereydate = $crtdate;
    $delivereydatetime = $crtdatetime;
  }elseif($status=="LOST"){
    $statusshow = "Lost";
    $xbremarkshow = $xbstatusare;
  }elseif($status=="RTD"){
    $statusshow = "RTO Delivered";
    $xbremarkshow = $xbstatusare;
    $rtodate = $crtdate;
    $rtodatetime = $crtdatetime;
  }elseif($status=="RTON" OR $status=="RTO" OR $status=="RTO-IT" OR $status=="RAO" OR $status=="RTO-OFD"){
    $statusshow = "RTO InTransit";
    $xbremarkshow = $xbstatusare;
  }else{      $statusshow = $status;   }


echo $xblivestatus = "UPDATE `spark_single_order` SET
`Last_Time_Stamp`='$lastupdatedatetime',`Last_Stamp_Date`='$crtdate',`pickupdate`='$pickupdate',
`pickupdatetime`='$pickupdatetime',`delivereddate`='$delivereydate',`delivereddatetime`='$delivereydatetime',
`rtodate`='$rtodate',`rtodatetime`='$rtodatetime',
`order_status`='$status',`order_status1`='$xbremarkshow',`order_status_show`='$statusshow'
 WHERE `Single_Order_Id`='$courier_uid'";
mysqli_query($conn,$xblivestatus);
// echo "<br><br>";
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







$delivereydate = '0000-00-00';
$delivereydatetime = '0000-00-00 00:00';
$rtodate = '0000-00-00';
$rtodatetime = '0000-00-00 00:00';
$lastupdatedate = '0000-00-00';
$lastupdatedatetime = '0000-00-00 00:00';
$pickupdate = '0000-00-00';
$pickupdatetime = '0000-00-00 00:00';









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



// echo "<pre>";
// echo $response;
// echo $delhivererror = $response1["Error"];
// print_r($response1["ShipmentData"][0]["Shipment"]);
// print_r($response1["ShipmentData"][0]["Shipment"]);

$DelhiveryAWB = $response1["ShipmentData"][0]["Shipment"]["AWB"];
$PaymentType = $response1["ShipmentData"][0]["Shipment"]["OrderType"];
$DelhiveryDestination = $response1["ShipmentData"][0]["Shipment"]["Destination"];
$DelhiveryStatusCode = $response1["ShipmentData"][0]["Shipment"]["Status"]['Status'];
// 
$statustypeis = $response1["ShipmentData"][0]["Shipment"]["Status"]['StatusType'];
// 
$DelhiveryStatusCodeshow = $response1["ShipmentData"][0]["Shipment"]["Status"]['Instructions'];
$DelhiveryLastLocat = $response1["ShipmentData"][0]["Shipment"]["Status"]['StatusLocation'];
$StatusDateTime = $response1["ShipmentData"][0]["Shipment"]["Status"]['StatusDateTime'];
$DLPickupDatetime = $response1["ShipmentData"][0]["Shipment"]['PickUpDate'];

// echo "<br>";
// echo "<br>";
  $dated = substr($StatusDateTime,8,2);
  $datem = substr($StatusDateTime,5,2);
  $datey = substr($StatusDateTime,0,4);
  $timehms = substr($StatusDateTime,11,8);
  $lastdateonly = $datey."-".$datem."-".$dated;
  $datetime = $datey."-".$datem."-".$dated."&ensp;".$timehms;
// echo "<br>";
if(!empty($DLPickupDatetime)){
  $pickdated = substr($DLPickupDatetime,8,2);
  $pickdatem = substr($DLPickupDatetime,5,2);
  $pickdatey = substr($DLPickupDatetime,0,4);
  $picktimehms = substr($DLPickupDatetime,11,8);
  $pickdateonly = $pickdatey."-".$pickdatem."-".$pickdated;
  $pickdatetime = $pickdatey."-".$pickdatem."-".$pickdated."&ensp;".$picktimehms;
  $pickupdate = $pickdateonly;
  $pickupdatetime = $pickdatetime;
}



$lastupdatedate = $lastdateonly;
$lastupdatedatetime = $datetime;

// Live Status Check
if($DelhiveryStatusCode){

  if($DelhiveryStatusCode=="RTO"){
    $rtodate = $lastdateonly;
    $rtodatetime = $datetime;
    $DelhiveryStatusCodeshow = "Delivered";
    $DelhiveryStatusCode = "RTO Delivered";
  }elseif($DelhiveryStatusCode=="Delivered"){
    $delivereydate = $lastdateonly;
    $delivereydatetime = $datetime;
  }elseif($DelhiveryStatusCode=="Pending"){
    $DelhiveryStatusCode="In Transit";
  }elseif($DelhiveryStatusCode=="Dispatched"){
    $DelhiveryStatusCode="Dispatched";
  }elseif($DelhiveryStatusCode=="LOST"){
    $DelhiveryStatusCode="Lost";
  }elseif($DelhiveryStatusCode=="Not Picked"){
    $DelhiveryStatusCode="Not Picked";
  }

if($statustypeis=="RT"){    $DelhiveryStatusCode = "RTO In Transit";  }

echo $delhiverystatus = "UPDATE `spark_single_order` SET
`Last_Time_Stamp`='$lastupdatedatetime',`Last_Stamp_Date`='$lastupdatedate',`pickupdate`='$pickupdate',
`pickupdatetime`='$pickupdatetime',`delivereddate`='$delivereydate',`delivereddatetime`='$delivereydatetime',
`rtodate`='$rtodate',`rtodatetime`='$rtodatetime',
`order_status`='$DelhiveryStatusCode',`order_status1`='$DelhiveryStatusCodeshow',`order_status_show`='$DelhiveryStatusCode'
 WHERE `Single_Order_Id`='$courier_uid'";
mysqli_query($conn,$delhiverystatus);

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
}elseif($couriername=="Delhivery2"){
// Delhivery Bulky Tracking Order

$delivereydate = '0000-00-00';
$delivereydatetime = '0000-00-00 00:00';
$rtodate = '0000-00-00';
$rtodatetime = '0000-00-00 00:00';
$lastupdatedate = '0000-00-00';
$lastupdatedatetime = '0000-00-00 00:00';
$pickupdate = '0000-00-00';
$pickupdatetime = '0000-00-00 00:00';

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://track.delhivery.com/api/v1/packages/json/?cl=RAPPIDXSURFACE-B2C&token=6f82518fd0e9772ede80d1ec821013d41f11de05&waybill=".$airwaybillnumber."",
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


$DelhiveryAWB = $response1["ShipmentData"][0]["Shipment"]["AWB"];
$PaymentType = $response1["ShipmentData"][0]["Shipment"]["OrderType"];
$DelhiveryDestination = $response1["ShipmentData"][0]["Shipment"]["Destination"];
$DelhiveryStatusCode = $response1["ShipmentData"][0]["Shipment"]["Status"]['Status'];
// 
$statustypeis = $response1["ShipmentData"][0]["Shipment"]["Status"]['StatusType'];
// 
$DelhiveryStatusCodeshow = $response1["ShipmentData"][0]["Shipment"]["Status"]['Instructions'];
$DelhiveryLastLocat = $response1["ShipmentData"][0]["Shipment"]["Status"]['StatusLocation'];
$StatusDateTime = $response1["ShipmentData"][0]["Shipment"]["Status"]['StatusDateTime'];
$DLPickupDatetime = $response1["ShipmentData"][0]["Shipment"]['PickUpDate'];

// echo "<br>";
// echo "<br>";
  $dated = substr($StatusDateTime,8,2);
  $datem = substr($StatusDateTime,5,2);
  $datey = substr($StatusDateTime,0,4);
  $timehms = substr($StatusDateTime,11,8);
  $lastdateonly = $datey."-".$datem."-".$dated;
  $datetime = $datey."-".$datem."-".$dated."&ensp;".$timehms;
// echo "<br>";
if(!empty($DLPickupDatetime)){
  $pickdated = substr($DLPickupDatetime,8,2);
  $pickdatem = substr($DLPickupDatetime,5,2);
  $pickdatey = substr($DLPickupDatetime,0,4);
  $picktimehms = substr($DLPickupDatetime,11,8);
  $pickdateonly = $pickdatey."-".$pickdatem."-".$pickdated;
  $pickdatetime = $pickdatey."-".$pickdatem."-".$pickdated."&ensp;".$picktimehms;
  $pickupdate = $pickdateonly;
  $pickupdatetime = $pickdatetime;
}



$lastupdatedate = $lastdateonly;
$lastupdatedatetime = $datetime;

// Live Status Check
if($DelhiveryStatusCode){

  if($DelhiveryStatusCode=="RTO"){
    $rtodate = $lastdateonly;
    $rtodatetime = $datetime;
    $DelhiveryStatusCodeshow = "Delivered";
    $DelhiveryStatusCode = "RTO Delivered";
  }elseif($DelhiveryStatusCode=="Delivered"){
    $delivereydate = $lastdateonly;
    $delivereydatetime = $datetime;
  }elseif($DelhiveryStatusCode=="Pending"){
    $DelhiveryStatusCode="In Transit";
  }elseif($DelhiveryStatusCode=="Dispatched"){
    $DelhiveryStatusCode="Dispatched";
  }elseif($DelhiveryStatusCode=="LOST"){
    $DelhiveryStatusCode="Lost";
  }elseif($DelhiveryStatusCode=="Not Picked"){
    $DelhiveryStatusCode="Not Picked";
  }

if($statustypeis=="RT"){    $DelhiveryStatusCode = "RTO In Transit";  }

echo $delhiverystatus = "UPDATE `spark_single_order` SET
`Last_Time_Stamp`='$lastupdatedatetime',`Last_Stamp_Date`='$lastupdatedate',`pickupdate`='$pickupdate',
`pickupdatetime`='$pickupdatetime',`delivereddate`='$delivereydate',`delivereddatetime`='$delivereydatetime',
`rtodate`='$rtodate',`rtodatetime`='$rtodatetime',
`order_status`='$DelhiveryStatusCode',`order_status1`='$DelhiveryStatusCodeshow',`order_status_show`='$DelhiveryStatusCode'
 WHERE `Single_Order_Id`='$courier_uid'";
mysqli_query($conn,$delhiverystatus);

}
// Live Status Check



// Delhivery Bulky Tracking Order
}else{
    
    echo "Not Tracked";

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
// date_default_timezone_set('Asia/Kolkata');
// $query123 = "INSERT INTO `cronjobs`(`pagename`, `hitdate`, `hittime`, `hitdatetime`) VALUES ('Tracking_Tracked_Orders',now(),now(),now())";
// if(mysqli_query($conn,$query123))
// {
// 	echo "Work";
// }else{
// 	echo "Else";
// }
?>
