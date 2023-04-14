<?php
  include("Admin/config/dbcon.php");
  extract($_REQUEST);
  error_reporting(1);
  include 'Header.php';
  
//   echo $airwaybillnumber;
?>

</section>
<section><br>
<!--  -->
<style type="text/css">
body{
  background-color:gold
}
</style>

<link href="//fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">


<!-- <div class="row" style="background-color:#1a1a1a"> -->
<div class="row">



<style>
.home-newsletter {
/* padding: 80px 0;
background: #f84e77; */
}

.home-newsletter .single {
max-width: 650px;
margin: 0 auto;
text-align: center;
position: relative;
z-index: 2; }
.home-newsletter .single h2 {
font-size: 22px;
color: white;
text-transform: uppercase;
margin-bottom: 40px; }
.home-newsletter .single .form-control {
height: 50px;
background: white;
border-color: transparent;
border-radius: 20px 0 0 20px; }
.home-newsletter .single .form-control:focus {
box-shadow: none;
border-color: #243c4f; }
.home-newsletter .single .btn {
min-height: 50px;
border-radius: 0 20px 20px 0;
background: #243c4f;
color: #fff;
}

.signuptxt{
  font-family: 'Montserrat', sans-serif
}
</style>


    <div class="col-lg-3 col-md-3"></div>
    <div class="col-lg-6 col-md-6">


      <section class="home-newsletter">
        <div class="container">
        <h2 class="text-center signuptxt"><b>Track your Order</b></h2>
        <div class="row">
        <div class="col-sm-12">
          <div class="single">
            <!-- <h2>Subscribe to our Newsletter</h2> -->
<form action="Tracking.php" method="post">
    <div class="input-group">
    <input type="text" class="form-control signuptxt" name="airwaybillnumber" value="<?= $airwaybillnumber ?>" placeholder="Track Your Order ( Use Comma(,) Between 2 AWB Numbers )">
    <!-- <textarea name="airwaybillnumber" rows="8" cols="80"><?= $airwaybillnumber ?></textarea> -->
    <span class="input-group-btn">
      <input type="submit" class="btn btn-theme" name="TrackOrder" value="Track Order">
    </span>
    </div>
</form>

          </div>
        </div>
        </div>
        </div>
      </section>

    </div>
    <div class="col-lg-3 col-md-3"></div>
</div>





<div class="row">
<div class="col-md-12">
<div class="col-md-12 table-responsive">
<?php
// Check Data Search Or Not
if(isset($TrackOrder)){
// Check Data Search Or Not


  // echo $airwaybillnumber;
  // echo "<br>";
  // echo $TrackOrder;

// Track Multiple Orders
$allawbno = explode(",",$airwaybillnumber);
// $allawbno = explode(PHP_EOL, $airwaybillnumber);
$foril=1;
foreach($allawbno as $airwaybillnumber){
// Track Multiple Orders









  $query = "SELECT * FROM `spark_single_order` WHERE `Awb_Number`='$airwaybillnumber'";
  $queryr = mysqli_query($conn,$query);
  $res = mysqli_fetch_assoc($queryr);
  if(mysqli_num_rows($queryr)){    $couriername = $res['awb_gen_by'];   }

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
    $rtmsg = $response1['GetBulkShipmentStatus'][0]["ReturnMessage"];
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






























<style>
.white-box{
  padding:12px !important;
  border-radius:10px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19) !important;
}
.fontweigh{
    font-weight:900 !important;
}
</style>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php
if($couriername=="XpressBees"){
?>
<!-- Xpressbee -->
<table class="table white-box fontweigh" style="border-radius:20px">
<thead style="background-color:#243c4f;color:#60baaf">
  <tr>
    <th style="border-right:1px solid #41AEAF;"><?= $foril ?>. Shipping ID</th>
    <th style="border-right:1px solid #41AEAF;">Type</th>
    <th style="border-right:1px solid #41AEAF;">Status</th>
    <th style="border-right:1px solid #41AEAF;">Current Location</th>
    <th style="border-right:1px solid #41AEAF;">Status_Date/Time</th>
    <th style="">Destination</th>
  </tr>
</thead>
<tbody>
  <tr>
    <td style="border-right:1px solid #41AEAF;color:#1c1d3e"><?= $airwaybillnumber ?></td>
    <td style="border-right:1px solid #41AEAF;;color:#1c1d3e"><?= $ordertype ?></td>
    <td style="border-right:1px solid #41AEAF;color:#1c1d3e"><?= $status ?></td>
    <td style="border-right:1px solid #41AEAF;color:#1c1d3e"><?= $crtlocation ?></td>
    <td style="border-right:1px solid #41AEAF;color:#1c1d3e"><?= $StatusDate ?></td>
    <td style="color:#1c1d3e"><?= $finaldestination ?></td>
  </tr>
</tbody>
</table>
<!-- Xpressbee -->
<?php
}elseif($couriername=="Shadowfax"){
?>
<!-- ShadowFax -->
<table class="table white-box fontweigh" style="border-radius:20px">
<thead style="background-color:#243c4f;color:#60baaf">
  <tr>
    <th style="border-right:1px solid #41AEAF;"><?= $foril ?>. Shipping ID</th>
    <th style="border-right:1px solid #41AEAF;">Type</th>
    <th style="border-right:1px solid #41AEAF;">Status</th>
    <th style="border-right:1px solid #41AEAF;">Current Location</th>
    <th style="border-right:1px solid #41AEAF;">Status_Date/Time</th>
    <th style="">Destination</th>
  </tr>
</thead>
<tbody>
  <tr>
    <td style="border-right:1px solid #41AEAF;color:#1c1d3e"><?= $shadowawbno ?></td>
    <td style="border-right:1px solid #41AEAF;color:#1c1d3e"><?= ucwords($paymenttype) ?></td>
    <td style="border-right:1px solid #41AEAF;color:#1c1d3e"><?= $shadowstatus ?></td>
    <td style="border-right:1px solid #41AEAF;color:#1c1d3e"><?= $shadowlocation ?></td>
    <td style="border-right:1px solid #41AEAF;color:#1c1d3e"><?= $shadowlocationtime ?></td>
    <td style="color:#1c1d3e"><?= $destinationcity ?>/<?= $destinationstate ?></td>
  </tr>
</tbody>
</table>
<!-- ShadowFax -->
<?php
}elseif($couriername=="DTDC"){
?>
<!-- DTDC -->
<table class="table white-box fontweigh" style="border-radius:20px">
<thead style="background-color:#243c4f;color:#60baaf">
  <tr>
    <th style="border-right:1px solid #41AEAF"><?= $foril ?>. Shipping ID</th>
    <th style="border-right:1px solid #41AEAF">Type</th>
    <th style="border-right:1px solid #41AEAF">Status</th>
    <th style="border-right:1px solid #41AEAF">Current Location</th>
    <th style="border-right:1px solid #41AEAF">Status_Date/Time</th>
    <th style="border-right:1px solid #41AEAF">Destination</th>
    <th style=""></th>
  </tr>
</thead>
<tbody>
  <tr>
    <td style="border-right:1px solid #41AEAF;color:#1c1d3e"><?= $dtdcawbno ?></td>
    <td style="border-right:1px solid #41AEAF;color:#1c1d3e"><?= ucwords($paymenttype) ?></td>
    <td style="border-right:1px solid #41AEAF;color:#1c1d3e"><?= $dtdcstatus ?></td>
    <td style="border-right:1px solid #41AEAF;color:#1c1d3e"><?= $dtdccrtlocation ?></td>
    <td style="border-right:1px solid #41AEAF;color:#1c1d3e">
      <?php
        echo substr($dtdcupdatedate,0,2);
        echo "-";
        echo substr($dtdcupdatedate,2,2);
        echo "-";
        echo substr($dtdcupdatedate,4,4);
      ?>
    </td>
    <td style="border-right:1px solid #41AEAF;color:#1c1d3e"><?= $dtdcnextdestination ?></td>
    <td style="color:#1c1d3e"><span id="dtdcview<?= $foril ?>" style="cursor:pointer" class="btn btn-primary active">VIEW</span></td>
  </tr>
</tbody>
</table>



<script>
$(document).ready(function(){
$("#dtdcdetails"+<?= $foril ?>).hide();
  $("#dtdcview"+<?= $foril ?>).click(function(){
    $("#dtdcdetails"+<?= $foril ?>).toggle(1000);
  });
});
</script>


<div class="col-md-12  text-center" id="dtdcdetails<?= $foril ?>">
  <br>
  <div class="col-md-12 text-center">
    <center>
      <table class="table table-striped table-bordered table-hover white-box fontweigh" style="border-radius:20px">
      <thead style="background-color:#60BAAF;color:black">
        <tr>
          <th style="border-color:#1c1d3e">Date/Time</th>
          <th style="border-color:#1c1d3e">Current_Location</th>
          <th style="border-color:#1c1d3e">Next_Location</th>
          <th style="border-color:#1c1d3e">Order_Status</th>
          <th style="border-color:#1c1d3e">Remarks</th>
        </tr>
      </thead>
      <tbody>
        <?php
          foreach ($dtdcawbdetaos as $dtdckey => $dtdckeyval) {
            echo "<tr>";
            foreach ($dtdckeyval as $dtdckey => $dtdcval) {
                // echo "Key : ".$dtdckey."&ensp;&ensp;"."Value : ".$dtdcval." &ensp;---<br>";
                echo "<td style='border-color:#1c1d3e;color:#1c1d3e'>".$dtdcval."</td>";
            }
            echo "</tr>";
          }
        ?>
      </tbody>
      </table>
    </center>
  </div>
</div>

<!-- DTDC -->
<?php
}elseif($couriername=="Delhivery"){
?>
<!-- Delhivery -->
<table class="table white-box fontweigh" style="border-radius:20px">
<thead style="background-color:#243c4f;color:#60baaf">
  <tr>
    <th style="border-right:1px solid #41AEAF"><?= $foril ?>. Shipping ID</th>
    <th style="border-right:1px solid #41AEAF">Type</th>
    <th style="border-right:1px solid #41AEAF">Status</th>
    <th style="border-right:1px solid #41AEAF">Current Location</th>
    <th style="border-right:1px solid #41AEAF">Status_Date/Time</th>
    <th style="border-right:1px solid #41AEAF">Destination</th>
    <th style=""></th>
  </tr>
</thead>
<tbody>
  <tr>
    <td style="border-right:1px solid #41AEAF;color:#1c1d3e"><?= $DelhiveryAWB ?></td>
    <td style="border-right:1px solid #41AEAF;color:#1c1d3e"><?= ucwords($PaymentType) ?></td>
    <td style="border-right:1px solid #41AEAF;color:#1c1d3e"><?= $DelhiveryStatusCode ?></td>
    <td style="border-right:1px solid #41AEAF;color:#1c1d3e"><?= $DelhiveryLastLocat ?></td>
    <td style="border-right:1px solid #41AEAF;color:#1c1d3e">
      <?php
        echo substr($DelhiveryScanDateTime,0,10);
        echo "&ensp;";
        echo substr($DelhiveryScanDateTime,11,8);
      ?>
    </td>
    <td style="border-right:1px solid #41AEAF;color:#1c1d3e"><?= $DelhiveryDestination ?></td>
    <td style="color:#1c1d3e"><span id="delhiveryview<?= $foril ?>" style="cursor:pointer" class="btn btn-primary active">VIEW</span></td>
  </tr>
</tbody>
</table>

<script>
$(document).ready(function(){
$("#delhiverydetails"+<?= $foril ?>).hide();
  $("#delhiveryview"+<?= $foril ?>).click(function(){
    $("#delhiverydetails"+<?= $foril ?>).toggle(1000);
  });
});
</script>


<div class="col-md-12 text-center" id="delhiverydetails<?= $foril ?>">
<div class="col-md-12 text-center">
    <table class="table table-striped table-bordered table-hover white-box fontweigh" style="border-radius:20px">
    <thead style="background-color:#60BAAF;color:black">
      <tr>
        <th style="border-color:#1c1d3e">Date/Time</th>
        <th style="border-color:#1c1d3e">Current_Location</th>
        <th style="border-color:#1c1d3e">Order_Status</th>
        <th style="border-color:#1c1d3e">Remarks</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach ($delhiveryawbdetaos as $keyvalue) {
          echo "<tr>";
          foreach ($keyvalue as $delkey => $delvalue) {
              // echo "Key : ".$delkey."&ensp;&ensp;"."Value : ".$delvalue." &ensp;---<br>";
              echo "<td style='border-color:#1c1d3e;color:#1c1d3e'>".$delvalue."</td>";
          }
          echo "</tr>";
        }
      ?>
    </tbody>
    </table>
  </div>
</div>

<!-- Delhivery -->
<?php
}else{
?>
    <center><h1 style="color:#60baaf"><?= $airwaybillnumber ?>AWB Number Not Found</h1></center>
<?php
}
?>


<?php
// Track Multiple Orders
$foril++;
}
// Track Multiple Orders
 ?>







<?php
// Check Data Search Or Not
}
// Check Data Search Or Not
?>












</div>
</div>
</div>

<!--  -->
</section>
<?php
  include "Footer.php";
?>
<style type="text/css">
.form_righ, .my-form-border {
  position: relative;
  border-top: 10px solid gold !important;
}
</style>
