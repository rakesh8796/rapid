<?php
    session_start();
    error_reporting(1);
    extract($_REQUEST);
    include "../config/dbcon.php";
    date_default_timezone_set('Asia/Calcutta');
?>












<!--  --><!--  -->
<?php
// echo "External<br>";
$startdatefrom = date('Y-m-d',strtotime($startdatefrom));
// echo "<br>";
$enddatefrom = date('Y-m-d',strtotime($enddatefrom));
// echo "<br>";

// $startdatefrom = "2021-05-12";
// $enddatefrom = "2021-08-10";

$useruinqueidno = $_SESSION['useruinqueidno'];
$user_id = $_SESSION['useridis'];
// Name Declare To Use in Loop
$todayordersisa = 0;
$todayprepaidresisa = 0;
$todaycodrunisa = 0;

$tprepaidordersres = 0;
$tcodordersres = 0;

$tdeliveredcodorders = 0;
$tdeliveredprepaidorders = 0;
$tdeliveredorders = 0;

$trtoorders = 0;
$trtoorders1 = 0;
$trtodelorderst1 = 0;

$tundeliveredorders = 0;

$tdispatchedorders = 0;

$tintransitorders = 0;
$tintransitorders1 = 0;
$tintransitorders2 = 0;
$tintransitorders3 = 0;

$trtoundlvrddorder = 0;
$tdatarcvdorder = 0;
$tnotpckedorder = 0;
$trtonotdlvrdorder = 0;
$tinvestigatedorder = 0;
$tcsawratmptdorder = 0;
$tpkdonedorder = 0;
$tmanifestedorder = 0;

$tlostorders = 0;
$tofdorders = 0;
$tradorders = 0;

$tgm500 = 0;
$tkg1 = 0;
$tkg2 = 0;
$tkg5 = 0;
$tkg10 = 0;

$tcodbalance = 0;
// Name Declare To Use in Loop

// User ParentID Check
$allclients = "SELECT DISTINCT `useruinqueparentid` FROM asitfa_user WHERE `usertype`='client' AND `Active`='1' ORDER BY `User_Id` ASC";
$allclientsr=mysqli_query($conn,$allclients);
while($clientres = mysqli_fetch_assoc($allclientsr)){
// User ParentID Check
$useruinqueidno = $clientres['useruinqueparentid'];


$queryall="SELECT * FROM `asitfa_user` WHERE `useruinqueparentid`='$useruinqueidno' AND `Active`='1'";
$fdataall=mysqli_query($conn,$queryall);
$numrowall=mysqli_num_rows($fdataall);

while($resultall = mysqli_fetch_assoc($fdataall)){
// echo $resultall['useruinqueparentid'];
// echo "Id : ";
$checkuserids = $resultall['User_Id'];









// Today Order Details
$todaydate = date("d-m-Y");
$todaydate = date('Y-m-d',strtotime($todaydate));
$todayorders = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$checkuserids' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND `Rec_Time_Date` BETWEEN '$todaydate' AND '$todaydate'";
$todayorderun = mysqli_query($conn, $todayorders);
$todayorderes = mysqli_fetch_assoc($todayorderun);
$todayordersisa+=$todayorderes["count('Single_Order_Id')"];
// echo "Today Prepaid Orders : ";
$todayprepaid = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$checkuserids' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND `Order_Type`='Prepaid' AND `Rec_Time_Date` BETWEEN '$todaydate' AND '$todaydate'";
$todayprepaidrun = mysqli_query($conn, $todayprepaid);
$todayprepaidres = mysqli_fetch_assoc($todayprepaidrun);
$todayprepaidresisa+=$todayprepaidres["count('Single_Order_Id')"];
// echo "Today COD Orders : ";
$todaycod = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$checkuserids' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND `Order_Type`='COD' AND `Rec_Time_Date` BETWEEN '$todaydate' AND '$todaydate'";
$todaycodres = mysqli_query($conn, $todaycod);
$todaycodrun = mysqli_fetch_assoc($todaycodres);
$todaycodrunisa+=$todaycodrun["count('Single_Order_Id')"];
// Today Order Details

// COD & Prepaid Orders
    // echo "<br><br>";
    // echo "/ &ensp; Totalorder : ";
    // echo "<br><br>1 :";
    $totalorders = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$checkuserids' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
    // echo "<br>";
    // echo "<br><br>";
    $totalordersrun = mysqli_query($conn, $totalorders);
    $totalordersres = mysqli_fetch_assoc($totalordersrun);
    $totalordersis+=$totalordersres["count('Single_Order_Id')"];
    // echo "<br><br>";


    // echo "/ &ensp; Prepaid : ";
    // echo "<br><br> 2 :";
    $prepaidorders = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$checkuserids' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND `Order_Type`='Prepaid' AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
    // echo "<br><br>";
    $prepaidordersrun = mysqli_query($conn, $prepaidorders);
    $prepaidordersres = mysqli_fetch_assoc($prepaidordersrun);
    $tprepaidordersres+= $prepaidordersres["count('Single_Order_Id')"];

    // echo "/ &ensp; COD : ";
    // echo "<br><br>3 : ";
    $codorders = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$checkuserids' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND `Order_Type`='COD' AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
    // echo "<br><br>";
    $codordersrun = mysqli_query($conn, $codorders);
    $codordersres = mysqli_fetch_assoc($codordersrun);
    $tcodordersres+= $codordersres["count('Single_Order_Id')"];


     // echo "Delivered COD Orders : ";
    // echo "<br><br>4 :";
    $deliveredcodorder = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$checkuserids' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND `order_status_show`='Delivered' AND `Order_Type`='COD' AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
    // echo "<br><br>";
    $deliveredcodorderrun = mysqli_query($conn, $deliveredcodorder);
    $deliveredcodorderres = mysqli_fetch_assoc($deliveredcodorderrun);
    $tdeliveredcodorders+= $deliveredcodorderres["count('Single_Order_Id')"];


     // echo " Delivered PrePaid Orders : ";
    // echo "<br><br>4 :";
    $deliveredprepaidorder = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$checkuserids' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND `order_status_show`='Delivered' AND `Order_Type`='Prepaid' AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
    // echo "<br><br>";
    $deliveredprepaidorderrun = mysqli_query($conn, $deliveredprepaidorder);
    $deliveredprepaidorderres = mysqli_fetch_assoc($deliveredprepaidorderrun);
    $tdeliveredprepaidorders+= $deliveredprepaidorderres["count('Single_Order_Id')"];


     // echo " Delivered Orders : ";
    // echo "<br><br>4 :";
    $deliveredorder = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$checkuserids' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND `order_status_show`='Delivered' AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
    // echo "<br><br>";
    $deliveredorderrun = mysqli_query($conn, $deliveredorder);
    $deliveredorderres = mysqli_fetch_assoc($deliveredorderrun);
    $tdeliveredorders+= $deliveredorderres["count('Single_Order_Id')"];



    // echo " RTO Delivered Orders : ";
    // echo "<br><br>4 :";
    $rtodeldorder1 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$checkuserids' AND `Awb_Number`!='' AND `order_status_show`='RTO Delivered' AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
    // echo "<br><br>";
    $rtodeldorderrun1 = mysqli_query($conn, $rtodeldorder1);
    $rtodeldorderres1 = mysqli_fetch_assoc($rtodeldorderrun1);
    $trtodelorderst1+= $rtodeldorderres1["count('Single_Order_Id')"];

    // echo " RTO InTransit Orders : ";
    // echo "<br><br>4 :";
    $rtodorder = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$checkuserids' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND `order_status_show`='RTO InTransit' AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
    // echo "<br><br>";
    $rtoorderrun = mysqli_query($conn, $rtodorder);
    $rtoorderres = mysqli_fetch_assoc($rtoorderrun);
    $trtoorders+= $rtoorderres["count('Single_Order_Id')"];

    // echo " RTO In Transit Orders : ";
    // echo "<br><br>4 :";
    $rtodorder2 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$checkuserids' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND `order_status_show`='RTO In Transit' AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
    // echo "<br><br>";
    $rtoorderrun2 = mysqli_query($conn, $rtodorder2);
    $rtoorderres2 = mysqli_fetch_assoc($rtoorderrun2);
    $trtoorders2+= $rtoorderres2["count('Single_Order_Id')"];


// echo " Return Undelivered Orders : ";
// echo "<br><br>4 :";
$rtoundlvrddorder = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$checkuserids' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND `order_status_show`='Return Undelivered' AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
// echo "<br><br>";
$rtoundlvrddorderun = mysqli_query($conn, $rtoundlvrddorder);
$rtoundlvrddorderes = mysqli_fetch_assoc($rtoundlvrddorderun);
$trtoundlvrddorder+= $rtoundlvrddorderes["count('Single_Order_Id')"];

// echo " Data Received Orders : ";
// echo "<br><br>4 :";
$datarcvdorder = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$checkuserids' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND `order_status_show`='Data Received' AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
// echo "<br><br>";
$datarcvdorderun = mysqli_query($conn, $datarcvdorder);
$datarcvdorderes = mysqli_fetch_assoc($datarcvdorderun);
$tdatarcvdorder+= $datarcvdorderes["count('Single_Order_Id')"];

// echo " Not Picked Orders : ";
// echo "<br><br>4 :";
$notpckedorder = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$checkuserids' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND `order_status_show`='Not Picked' AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
// echo "<br><br>";
$notpckedorderun = mysqli_query($conn, $notpckedorder);
$notpckedorderes = mysqli_fetch_assoc($notpckedorderun);
$tnotpckedorder+= $notpckedorderes["count('Single_Order_Id')"];

// echo " RTO Not Delivered Orders : ";
// echo "<br><br>4 :";
$rtonotdlvrdorder = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$checkuserids' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND `order_status_show`='RTO Not Delivered' AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
// echo "<br><br>";
$rtonotdlvrdorderun = mysqli_query($conn, $rtonotdlvrdorder);
$rtonotdlvrdorderes = mysqli_fetch_assoc($rtonotdlvrdorderun);
$trtonotdlvrdorder+= $rtonotdlvrdorderes["count('Single_Order_Id')"];

// echo " Investigate Orders : ";
// echo "<br><br>4 :";
$investigatedorder = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$checkuserids' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND `order_status_show`='Investigate' AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
// echo "<br><br>";
$investigatedorderun = mysqli_query($conn, $investigatedorder);
$investigatedorderes = mysqli_fetch_assoc($investigatedorderun);
$tinvestigatedorder+= $investigatedorderes["count('Single_Order_Id')"];

// echo " CSAW-ReAttempt Orders : ";
// echo "<br><br>4 :";
$csawratmptdorder = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$checkuserids' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND `order_status_show`='CSAW-ReAttempt' AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
// echo "<br><br>";
$csawratmptdorderun = mysqli_query($conn, $csawratmptdorder);
$csawratmptdorderes = mysqli_fetch_assoc($csawratmptdorderun);
$tcsawratmptdorder+= $csawratmptdorderes["count('Single_Order_Id')"];

// echo " PickDone Orders : ";
// echo "<br><br>4 :";
$pkdonedorder = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$checkuserids' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND `order_status_show`='PickDone' AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
// echo "<br><br>";
$pkdonedorderun = mysqli_query($conn, $pkdonedorder);
$pkdonedorderes = mysqli_fetch_assoc($pkdonedorderun);
$tpkdonedorder+= $pkdonedorderes["count('Single_Order_Id')"];

// echo " Manifested Orders : ";
// echo "<br><br>4 :";
$manifestedorder = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$checkuserids' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND `order_status_show`='Manifested' AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
// echo "<br><br>";
$manifestedorderun = mysqli_query($conn, $manifestedorder);
$manifestedorderes = mysqli_fetch_assoc($manifestedorderun);
$tmanifestedorder+= $manifestedorderes["count('Single_Order_Id')"];


    // echo " RTO Orders : ";
    // echo "<br><br>4 :";
    $rtodorder1 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$checkuserids' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND `order_status_show`='RTO' AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
    // echo "<br><br>";
    $rtoorderrun1 = mysqli_query($conn, $rtodorder1);
    $rtoorderres1 = mysqli_fetch_assoc($rtoorderrun1);
    $trtoorders1+= $rtoorderres1["count('Single_Order_Id')"];


    // echo " Undelivered Orders : ";
    // echo "<br><br>4 :";
    $undeliveredorder = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$checkuserids' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND `order_status_show`='Undelivered' AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
    // echo "<br><br>";
    $undeliveredorderrun = mysqli_query($conn, $undeliveredorder);
    $undeliveredorderres = mysqli_fetch_assoc($undeliveredorderrun);
    $tundeliveredorders+= $undeliveredorderres["count('Single_Order_Id')"];


    // echo " Dispatched Orders : ";
    // echo "<br><br>4 :";
    $dispatchedorder = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$checkuserids' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND `order_status_show`='Dispatched' AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
    // echo "<br><br>";
    $dispatchedorderrun = mysqli_query($conn, $dispatchedorder);
    $dispatchedorderres = mysqli_fetch_assoc($dispatchedorderrun);
    $tdispatchedorders+= $dispatchedorderres["count('Single_Order_Id')"];


    // echo " InTransit Orders : ";
    // echo "<br><br>4 :";
    $intransitdorder = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$checkuserids' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND `order_status_show`='InTransit' AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
    // echo "<br><br>";
    $intransitdorderun = mysqli_query($conn, $intransitdorder);
    $intransitdorderes = mysqli_fetch_assoc($intransitdorderun);
    $tintransitorders+= $intransitdorderes["count('Single_Order_Id')"];

    // echo " In Transit Orders : ";
    // echo "<br><br>4 :";
    $intransitdorder1 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$checkuserids' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND `order_status_show`='In Transit' AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
    // echo "<br><br>";
    $intransitdorderun1 = mysqli_query($conn, $intransitdorder1);
    $intransitdorderes1 = mysqli_fetch_assoc($intransitdorderun1);
    $tintransitorders1+= $intransitdorderes1["count('Single_Order_Id')"];


    // echo " Local Fwd Intransit Orders : ";
    // echo "<br><br>4 :";
    $intransitdorder2 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$checkuserids' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND `order_status_show`='Local Fwd Intransit' AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
    // echo "<br><br>";
    $intransitdorderun2 = mysqli_query($conn, $intransitdorder2);
    $intransitdorderes2 = mysqli_fetch_assoc($intransitdorderun2);
    $tintransitorders2+= $intransitdorderes2["count('Single_Order_Id')"];


    // echo " Pending Orders : ";
    // echo "<br><br>4 :";
    $intransitdorder3 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$checkuserids' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND `order_status_show`='Pending' AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
    // echo "<br><br>";
    $intransitdorderun3 = mysqli_query($conn, $intransitdorder3);
    $intransitdorderes3 = mysqli_fetch_assoc($intransitdorderun3);
    $tintransitorders3+= $intransitdorderes3["count('Single_Order_Id')"];


    // echo " OFD Orders : ";
    // echo "<br><br>4 :";
    $ofdorder = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$checkuserids' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND `order_status_show`='OFD' AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
    // echo "<br><br>";
    $ofdorderrun = mysqli_query($conn, $ofdorder);
    $ofdorderres = mysqli_fetch_assoc($ofdorderrun);
    $tofdorders+= $ofdorderres["count('Single_Order_Id')"];


    // echo " RAD Orders : ";
    // echo "<br><br>4 :";
    $radorders = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$checkuserids' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND `order_status_show`='RAD' AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
    // echo "<br><br>";
    $radordersrun = mysqli_query($conn, $radorders);
    $radordersres = mysqli_fetch_assoc($radordersrun);
    $tradorders+= $radordersres["count('Single_Order_Id')"];


    // echo "Lost Orders : ";
    // echo "<br><br>4 :";
    $lostorder = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$checkuserids' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND `order_status_show`='Lost' AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
    // echo "<br><br>";
    $lostorderun = mysqli_query($conn, $lostorder);
    $lostorderes = mysqli_fetch_assoc($lostorderun);
    $tlostorders+= $lostorderes["count('Single_Order_Id')"];

// COD & Prepaid Orders
// echo "<br>";
// COD Balance
// echo " COD Balance : ";
// echo "<br><br>4 :";
$codbalance = "SELECT * FROM `spark_single_order` WHERE `User_Id`='$checkuserids' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND `Order_Type`='COD' AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
// echo "<br><br>";
$codbalancerun = mysqli_query($conn, $codbalance);
while($codbalanceres = mysqli_fetch_assoc($codbalancerun)){
$tcodbalance+= $codbalanceres["Cod_Amount"];
}

// Weight Shipment

if($resultall['commercialstype']=="gm500" AND $resultall['Active']=="1"){
// echo "/ &ensp; Total 500GM : ";
// echo "<br><br>500Gm : ";
$weighttotal = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$checkuserids' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
// echo "<br><br>";
$weighttotalrun = mysqli_query($conn, $weighttotal);
$weighttotalres = mysqli_fetch_assoc($weighttotalrun);
$tgm500+= $weighttotalres["count('Single_Order_Id')"];
// $tgm500+= 0;
}
if($resultall['commercialstype']=="kg1" AND $resultall['Active']=="1"){
// echo "/ &ensp; Total 1KG : ";
// echo "<br><br>1KG : ";
$weighttotal = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$checkuserids' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
// echo "<br><br>";
$weighttotalrun = mysqli_query($conn, $weighttotal);
$weighttotalres = mysqli_fetch_assoc($weighttotalrun);
$tkg1+= $weighttotalres["count('Single_Order_Id')"];
// $tkg1+= 0;
}
if($resultall['commercialstype']=="kg2" AND $resultall['Active']=="1"){
// echo "/ &ensp; Total 2KG : ";
// echo "<br><br>2KG :";
$weighttotal = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$checkuserids' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
// echo "<br><br>";
$weighttotalrun = mysqli_query($conn, $weighttotal);
$weighttotalres = mysqli_fetch_assoc($weighttotalrun);
$tkg2+= $weighttotalres["count('Single_Order_Id')"];
// $tkg2+= 0;
}
if($resultall['commercialstype']=="kg5" AND $resultall['Active']=="1"){
// echo "/ &ensp; Total 5KG : ";
$weighttotal = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$checkuserids' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
$weighttotalrun = mysqli_query($conn, $weighttotal);
$weighttotalres = mysqli_fetch_assoc($weighttotalrun);
$tkg5+= $weighttotalres["count('Single_Order_Id')"];
// $tkg5+= 0;
}
if($resultall['commercialstype']=="kg10" AND $resultall['Active']=="1"){
// echo "/ &ensp; Total 10KG : ";
$weighttotal = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$checkuserids' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
$weighttotalrun = mysqli_query($conn, $weighttotal);
$weighttotalres = mysqli_fetch_assoc($weighttotalrun);
$tkg10+= $weighttotalres["count('Single_Order_Id')"];
// $tkg10+= 0;
}
// echo "<br><br>";
}

// User ParentID Check
}
// User ParentID Check

?>












<!-- Shipment Weight -->
<?php
    $totalweightt = $tgm500 + $tkg1 + $tkg2 + $tkg5 + $tkg10;
    $tgm500percent = ($tgm500/$totalweightt)*100;
    $tgm500percent = round($tgm500percent,1);
    $t1kgpercent = ($tkg1/$totalweightt)*100;
    $t1kgpercent = round($t1kgpercent,1);
    $t2kgpercent = ($tkg2/$totalweightt)*100;
    $t2kgpercent = round($t2kgpercent,1);
    $t5kgpercent = ($tkg5/$totalweightt)*100;
    $t5kgpercent = round($t5kgpercent,1);
    $t10kgpercent = ($tkg10/$totalweightt)*100;
    $t10kgpercent = round($t10kgpercent,1);
?>
<!-- Shipment Weight  -->
<!-- Performance -->
<?php

// echo $undefinestatus = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND (`order_status_show` IS NULL OR `order_status_show`='') AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
// echo "<br><br>";
// $undefinestatusr = mysqli_query($conn, $undefinestatus);
// $undefinestatusres = mysqli_fetch_assoc($undefinestatusr);
// echo $tundefinestatus+= $undefinestatusres["count('Single_Order_Id')"];

    // $tlostorders = 0;
    // $tperforms = $tdeliveredorders + $trtoorders + $tundeliveredorders + $tintransitorders + $tlostorders;
    // $deliveredpercent = ($tdeliveredorders/$tperforms)*100;
    // $deliveredpercent = round($deliveredpercent,1);
    // $rtopercent = ($trtoorders/$tperforms)*100;
    // $rtopercent = round($rtopercent,1);
    // $undeliveredpercent = ($tundeliveredorders/$tperforms)*100;
    // $undeliveredpercent = round($undeliveredpercent,1);
    // $intransitpercent = ($tintransitorders/$tperforms)*100;
    // $intransitpercent = round($intransitpercent,1);
    // $lostpercent = ($tlostorders/$tperforms)*100;
    // $lostpercent = round($lostpercent,1);


// echo $totalordersis;
// echo "&ensp;&ensp;:&ensp;&ensp;";
// echo $tdeliveredorersis = $tdeliveredcodorders+$tdeliveredprepaidorders;
// echo "&ensp;&ensp;:&ensp;&ensp;";
// echo $trtodelorderst1;
// echo "&ensp;&ensp;:&ensp;&ensp;";
// echo $totalordersis-($tdeliveredorersis+$trtodelorderst1);

// $tlostorders = 0;
// echo "&ensp;&ensp;->&ensp;&ensp;";
// echo $totalprocessorders = $trtoorders2+$tundeliveredorders+$tdispatchedorders+$tintransitorders+$tintransitorders1+$tintransitorders2+$tintransitorders3+$tofdorders+$tradorders+$tlostorders+$trtoundlvrddorder+$tdatarcvdorder+$tnotpckedorder+$trtonotdlvrdorder+$tinvestigatedorder+$tcsawratmptdorder+$tpkdonedorder+$tmanifestedorder;
// echo "&ensp;=&ensp;";
$tundeliveredorders = $tundeliveredorders + $tdispatchedorders;
// echo "&ensp;&ensp;:&ensp;&ensp;";
$trtoorders = $trtoorders + $trtoorders1;
// $tofdorders = 0;

// $tradorders = 0;
$tintransitorders = $tintransitorders + $tintransitorders1 + $tintransitorders2 + $tintransitorders3;

    // Total Orders
        $overall = $tdeliveredorders + $trtodelorderst1 + $trtoorders + $tundeliveredorders + $tintransitorders + $tlostorders + $tradorders + $tofdorders;
         $tundeliveredorders1 = $totalordersis - $overall;
         if($tundeliveredorders1>0){
            $tundeliveredorders = $tundeliveredorders + $tundeliveredorders1;
         }
    // Total Orders

// Total Prcess Orders

// Total Prcess Orders
$tperforms = $tdeliveredorders + $trtodelorderst1 + $trtoorders + $tundeliveredorders + $tintransitorders + $tlostorders + $tradorders + $tofdorders;


$deliveredpercent = ($tdeliveredorders/$tperforms)*100;
$deliveredpercent = round($deliveredpercent,1);
$rtodlvdpercent = ($trtodelorderst1/$tperforms)*100;
$rtodlvdpercent = round($rtodlvdpercent,1);
$rtopercent = ($trtoorders/$tperforms)*100;
$rtopercent = round($rtopercent,1);
$undeliveredpercent = ($tundeliveredorders/$tperforms)*100;
$undeliveredpercent = round($undeliveredpercent,1);
$intransitpercent = ($tintransitorders/$tperforms)*100;
$intransitpercent = round($intransitpercent,1);
$lostpercent = ($tlostorders/$tperforms)*100;
$lostpercent = round($lostpercent,1);
$radpercent = ($tradorders/$tperforms)*100;
$radpercent = round($radpercent,1);
$ofdpercent = ($tofdorders/$tperforms)*100;
$ofdpercent = round($ofdpercent,1);
?>
<!-- Performance -->
<!-- Volume Trend -->
<?php
    $totalorders = $tprepaidordersres + $tcodordersres;
    $prepaidpercentage = ($tprepaidordersres/$totalorders)*100;
    $prepaidpercentage = round($prepaidpercentage,1);
    $codpercentage = ($tcodordersres/$totalorders)*100;
    $codpercentage = round($codpercentage,1);
?>
<!-- Volume Trend -->














<!-- Current And Last Month Data -->
<?php
$stdate = date("d-m-Y");
// Current Month
$currentmonthcheck = date('Y-m-d',strtotime($stdate));
// echo $currentmonthdata = "SELECT * FROM `spark_single_order` WHERE `User_Id`='$checkuserids' AND `Awb_Number`!='' AND MONTH(`Rec_Time_Date`) = MONTH('$currentmonthcheck') AND YEAR(`Rec_Time_Date`) = YEAR('$currentmonthcheck')";
// echo "<br>";

// echo "Total : ";
$currentmonthtotal = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND MONTH(`Rec_Time_Date`) = MONTH('$currentmonthcheck') AND YEAR(`Rec_Time_Date`) = YEAR('$currentmonthcheck')";
$currentmonthtotalr = mysqli_query($conn, $currentmonthtotal);
$currentmonthtotalres = mysqli_fetch_assoc($currentmonthtotalr);
$currentmonthtotalorders = $currentmonthtotalres["count('Single_Order_Id')"];

// echo "&ensp;&ensp; Delivered : ";
$currentmonthdelivered = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND `order_status_show`='Delivered' AND MONTH(`Rec_Time_Date`) = MONTH('$currentmonthcheck') AND YEAR(`Rec_Time_Date`) = YEAR('$currentmonthcheck')";
$currentmonthdeliveredr = mysqli_query($conn, $currentmonthdelivered);
$currentmonthdeliveredres = mysqli_fetch_assoc($currentmonthdeliveredr);
$currentmonthtotaldelivered = $currentmonthdeliveredres["count('Single_Order_Id')"];

// echo "&ensp;&ensp; RTO : ";
$currentmonthrto = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND `order_status_show`='RTO Delivered' AND MONTH(`Rec_Time_Date`) = MONTH('$currentmonthcheck') AND YEAR(`Rec_Time_Date`) = YEAR('$currentmonthcheck')";
$currentmonthrtor = mysqli_query($conn, $currentmonthrto);
$currentmonthrtores = mysqli_fetch_assoc($currentmonthrtor);
$currentmonthtotalrto = $currentmonthrtores["count('Single_Order_Id')"];

// echo "&ensp;&ensp; Process : ";
$currentmonthprocess = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND (`order_status_show`!='Delivered' AND `order_status_show`!='RTO Delivered') AND MONTH(`Rec_Time_Date`) = MONTH('$currentmonthcheck') AND YEAR(`Rec_Time_Date`) = YEAR('$currentmonthcheck')";
$currentmonthprocessr = mysqli_query($conn, $currentmonthprocess);
$currentmonthprocessres = mysqli_fetch_assoc($currentmonthprocessr);
$currentmonthtotalprocess = $currentmonthprocessres["count('Single_Order_Id')"];

$currentmonthtotalundelivered = 0;
$totalcurrentmonthtotals = $currentmonthtotaldelivered + $currentmonthtotalrto + $currentmonthtotalprocess;
$currentmonthtotalundelivered1 = $currentmonthtotalorders - $totalcurrentmonthtotals;
if($currentmonthtotalundelivered1>0){
    $currentmonthtotalundelivered = $currentmonthtotalundelivered1;
}

// Current Month    -   -   -   -   -   -   -   -   -
// Last Month       *   *   *   *   *   *   *   *   *

$lastmonthcheck = date('Y-m-d',strtotime("-1 Month"));
// echo $lastmonthdata = "SELECT * FROM `spark_single_order` WHERE `User_Id`='$checkuserids' AND `Awb_Number`!='' AND MONTH(`Rec_Time_Date`) = MONTH('$lastmonthcheck') AND YEAR(`Rec_Time_Date`) = YEAR('$lastmonthcheck')";
// echo "<br>";
// echo "Total : ";
$lastmonthtotal = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND MONTH(`Rec_Time_Date`) = MONTH('$lastmonthcheck') AND YEAR(`Rec_Time_Date`) = YEAR('$lastmonthcheck')";
$lastmonthtotalr = mysqli_query($conn, $lastmonthtotal);
$lastmonthtotalres = mysqli_fetch_assoc($lastmonthtotalr);
$lastmonthtotalorders = $lastmonthtotalres["count('Single_Order_Id')"];

// echo "&ensp;&ensp; Delivered : ";
$lastmonthdelivered = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND `order_status_show`='Delivered' AND MONTH(`Rec_Time_Date`) = MONTH('$lastmonthcheck') AND YEAR(`Rec_Time_Date`) = YEAR('$lastmonthcheck')";
$lastmonthdeliveredr = mysqli_query($conn, $lastmonthdelivered);
$lastmonthdeliveredres = mysqli_fetch_assoc($lastmonthdeliveredr);
$lastmonthtotaldelivered = $lastmonthdeliveredres["count('Single_Order_Id')"];

// echo "&ensp;&ensp; RTO : ";
$lastmonthrto = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND `order_status_show`='RTO Delivered' AND MONTH(`Rec_Time_Date`) = MONTH('$lastmonthcheck') AND YEAR(`Rec_Time_Date`) = YEAR('$lastmonthcheck')";
$lastmonthrtor = mysqli_query($conn, $lastmonthrto);
$lastmonthrtores = mysqli_fetch_assoc($lastmonthrtor);
$lastmonthtotalrto = $lastmonthrtores["count('Single_Order_Id')"];

// echo "&ensp;&ensp; Process : ";
$lastmonthprocess = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND (`order_status_show`!='Delivered' AND `order_status_show`!='RTO Delivered') AND MONTH(`Rec_Time_Date`) = MONTH('$lastmonthcheck') AND YEAR(`Rec_Time_Date`) = YEAR('$lastmonthcheck')";
$lastmonthprocessr = mysqli_query($conn, $lastmonthprocess);
$lastmonthprocessres = mysqli_fetch_assoc($lastmonthprocessr);
$lastmonthtotalprocess = $lastmonthprocessres["count('Single_Order_Id')"];


$lastmonthtotalundelivered = 0;
$totallastmonthtotals = $lastmonthtotaldelivered + $lastmonthtotalrto + $lastmonthtotalprocess;
$lastmonthtotalundelivered1 = $lastmonthtotalorders - $totallastmonthtotals;
if($lastmonthtotalundelivered1>0){
    $lastmonthtotalundelivered = $lastmonthtotalundelivered1;
}


// Last Month
?>
<!-- Current And Last Month Data -->




































<style>
/*div.card {
  width: 250px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  text-align: center;
}*/
.white-box{
  padding:15px !important;
  border-radius:10px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19) !important;
}
.fontweigh{
    font-weight:900 !important;
}
</style>



















<div class="container-fluid">
<!-- <div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Hospital Dashboard</h4> </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> <a href="" target="_blank" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Buy Now</a>
        <ol class="breadcrumb">
            <li><a href="index.html">Hospital</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </div>
</div> -->


<!--row -->
<?php

?>
<div class="row">
    <div class="col-md-3 col-sm-6">
        <div class="white-box">
            <div class="r-icon-stats">
              <i class="fa fa-shopping-cart" aria-hidden="true" style="background-color:#5A5A5A !important;width:41px;height:41px;padding:8px 0px 0px 0px"></i>
                <div class="bodystate fontweigh">
                  <span class="text-muted fontweigh">Today | <strong><?= $todayordersisa ?></strong></span>
                  <h5 style="font-size:10px" class=" fontweigh">Prepaid | <?= $todayprepaidresisa ?> &ensp; COD |  <?= $todaycodrunisa ?></h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="white-box">
            <div class="r-icon-stats">
              <i class="fa fa-shopping-cart" aria-hidden="true" style="background-color:#5A5A5A !important;width:41px;height:41px;padding:8px 0px 0px 0px"></i>
              <div class="bodystate fontweigh">
                <span class="text-muted">Delivered |  <strong><?= $tdeliveredcodorders+$tdeliveredprepaidorders ?></strong></span>
                <h5 style="font-size:10px" class=" fontweigh">Prepaid <strong><?= $tdeliveredprepaidorders ?></strong> &ensp;|&ensp; COD <strong><?= $tdeliveredcodorders ?></strong></h5>
              </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="white-box">
            <div class="r-icon-stats">
              <i class="fa fa-money" aria-hidden="true" style="background-color:#A1A1A1 !important;width:41px;height:41px;padding:8px 0px 0px 0px"></i>
                <div class="bodystate fontweigh">
                    <h4>00.00</h4>
                    <span class="text-muted">COD Balance</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="white-box">
            <div class="r-icon-stats">
              <i class="fa fa-money" aria-hidden="true" style="background-color:#A1A1A1 !important;width:41px;height:41px;padding:8px 0px 0px 0px"></i>
                <div class="bodystate fontweigh">
                    <h4>00.00</h4>
                    <span class="text-muted">Outstanding Bill</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/row -->















<!-- .row -->
<?php
// $tdeliveredorders
// $trtodelorderst1
// $trtoorders
// $trtoorders1

// $trtoorders2
// $tundeliveredorders
// $tdispatchedorders
// $tintransitorders
// $tintransitorders1
// $tintransitorders2
// $tintransitorders3
// $tofdorders
// $tradorders
// $tlostorders
// $trtoundlvrddorder
// $tdatarcvdorder
// $tnotpckedorder
// $trtonotdlvrdorder
// $tinvestigatedorder
// $tcsawratmptdorder
// $tpkdonedorder
// $tmanifestedorder


$totalprocessorders = $trtoorders2+$tundeliveredorders+$tdispatchedorders+$tintransitorders+$tintransitorders1+$tintransitorders2+$tintransitorders3+$tofdorders+$tradorders+$tlostorders+$trtoundlvrddorder+$tdatarcvdorder+$tnotpckedorder+$trtonotdlvrdorder+$tinvestigatedorder+$tcsawratmptdorder+$tpkdonedorder+$tmanifestedorder;
 ?>
<div class="row">
    <div class="col-md-4 col-sm-12 col-xs-12">
        <div class="white-box">
            <h3 class="box-title"> <?= $val ?> Orders</h3>
            <div class="stats-row">
                <!-- <div class="stat-item">
                    <h6 class="fontweigh">Total</h6> <b><?= $totalorders; ?></b></div> -->
                <div class="stat-item">
                    <h6 class="fontweigh">Delivered</h6> <strong><?= $tdeliveredorersis = $tdeliveredcodorders+$tdeliveredprepaidorders ?></strong></div>
                <div class="stat-item">
                    <h6 class="fontweigh">RTO</h6> <strong><?= $trtodelorderst1 ?></strong></div>
                <div class="stat-item">
                    <!-- <h6 class="fontweigh">Process</h6> <strong><?= $totalprocessorders ?>|<?= $totalorders-($tdeliveredorersis+$trtodelorderst1) ?></strong></div> -->
                    <h6 class="fontweigh">Process</h6> <strong><?= $totalorders-($tdeliveredorersis+$trtodelorderst1) ?></strong></div>
            </div>
            <!-- <div id="sparkline8" class="minus-mar"></div> -->
        </div>
    </div>
    <div class="col-md-4 col-sm-12 col-xs-12">
        <div class="white-box">
            <h3 class="box-title fontweigh">Current Month</h3>
            <div class="stats-row">
                <div class="stat-item">
                    <h6 class="fontweigh">Delivered</h6> <strong><?= $currentmonthtotaldelivered ?></strong></div>
                <div class="stat-item">
                    <h6 class="fontweigh">RTD</h6> <strong><?= $currentmonthtotalrto ?></strong></div>
                <div class="stat-item">
                    <h6 class="fontweigh">Process</h6> <strong><?= $currentmonthtotalprocess ?></strong></div>
                <div class="stat-item">
                    <h6 class="fontweigh">Pending</h6> <strong><?= $currentmonthtotalundelivered ?></strong></div>
            </div>
            <!-- <div id="sparkline9" class="minus-mar"></div> -->
        </div>
    </div>
    <div class="col-md-4 col-sm-12 col-xs-12">
        <div class="white-box">
            <h3 class="box-title fontweigh">Last Month</h3>
            <div class="stats-row">
                <div class="stat-item">
                    <h6 class="fontweigh">Delivered</h6> <strong><?= $lastmonthtotaldelivered ?></strong></div>
                <div class="stat-item">
                    <h6 class="fontweigh">RTD</h6> <strong><?= $lastmonthtotalrto ?></strong></div>
                <div class="stat-item">
                    <h6 class="fontweigh">Process</h6> <strong><?= $lastmonthtotalprocess ?></strong></div>
                <div class="stat-item">
                    <h6 class="fontweigh">Undelivered</h6> <strong><?= $lastmonthtotalundelivered ?></strong></div>
            </div>
            <!-- <div id="sparkline10" class="minus-mar"></div> -->
        </div>
    </div>
</div>
<!-- /.row -->










<!-- .row -->
<div class="row" >
    <div class="col-md-4 col-sm-12 col-xs-12">
        <div class="white-box">

          <!--  -->
          <!--  -->
            <div class="">
            <div class="">
              <!-- <h5 style="" class="text-center"><b></b></h5> -->
              <h5 style="margin:0px;padding:0px" class="text-center"><b>Shipment Weight</b></h5><br>
            <div class="row" style="">
<!-- Shipment Weight -->
<!-- Shipment Weight -->
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            <?php
            if(empty($tgm500) AND empty($tkg1) AND empty($tkg2) AND empty($tkg5) AND empty($tkg10)){
                echo "<div class='col-md-12 text-center' style='margin-top:122px;margin-bottom:92px'>Loading...</div>";
            }else{
                echo "<canvas id='myChartt' style='padding:0px !important'></canvas>";
            }
            ?>
                        <script type="text/javascript">
                            const type1 = "doughnut";
                            const data1 = {
                            labels: ['500GM(<?= $tgm500percent ?>%)','1KG(<?= $t1kgpercent ?>%)','2KG(<?= $t2kgpercent ?>%)','5KG(<?= $t5kgpercent ?>%)','10KG(<?= $t10kgpercent ?>%)'],
                            datasets: [{
                            // label: 'My First Dataset',
                            data: [<?= $tgm500 ?>,<?= $tkg1 ?>,<?= $tkg2 ?>,<?= $tkg5 ?>,<?= $tkg10 ?>],
                            // data: [0,0,0,0,0],
                            backgroundColor: [
                                '#5a5a5a',
                                '#5a5a5ab8',
                                '#5a5a5a91',
                                '#5a5a5a73',
                                '#5a5a5a4a'
                                ],
                                hoverOffset: 4
                                }]
                            };

                            var ctx = document.getElementById('myChartt');
                            var myChart = new Chart(ctx, {
                                type: type1,
                                data: data1,
                            });
                        </script>
                    </div>

            </div>
          </div>
            <!--  -->
            <!--  -->

        </div>
    </div>
    <div class="col-md-4 col-sm-12 col-xs-12">
        <div class="white-box">
          <!--  -->
          <!--  -->
          <h5 style="margin:0px;padding:0px" class="text-center"><b>Performance</b></h5><br>

          <div class="">
<div class="" style="background-color:white;">
  <!-- Performance -->
<!-- Performance -->
            <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
<?php
if(empty($tdeliveredorders) AND empty($trtodelorderst1) AND empty($trtoorders) AND empty($tundeliveredorders) AND empty($tintransitorders) AND empty($tlostorders) AND empty($tofdorders) AND empty($tradorders)){
    echo "<div class='col-md-12 text-center' style='margin-top:122px;margin-bottom:75px'>Loading...</div>";
}else{
    echo "<canvas id='myChartt3' style='height:250px !important'></canvas>";
}
?>

            <script type="text/javascript">
                const type3 = "doughnut";
                const data3 = {
                labels: ['Delivered(<?= $deliveredpercent ?>%)','RTD(<?= $rtodlvdpercent ?>%)','Undelivered(<?= $undeliveredpercent ?>%)','RTO(<?= $rtopercent ?>%)','Intransit(<?= $intransitpercent ?>%)','OFD(<?= $ofdpercent ?>%)','RAD(<?= $radpercent ?>%)','Lost(<?= $lostpercent ?>%)'],
                // labels: ['Delivered','RTO','Undelivered','Intrasit','Lost'],
                datasets: [{
                // label: 'My First Dataset',
                data: [<?= $tdeliveredorders ?>,<?= $trtodelorderst1 ?>,<?= $tundeliveredorders ?>,<?= $trtoorders ?>,<?= $tintransitorders ?>,<?= $tofdorders ?>,<?= $tradorders ?>,<?= $tlostorders ?>],
                backgroundColor: [
                    '#5a5a5a',
                    '#5a5a5ab8',
                    '#5a5a5a91',
                    '#8c979a',
                    '#a7afb2',
                    '#a7afb2',
                    '#a7afb2',
                    '#c1c7c9'
                    ],
                    hoverOffset: 4
                    }]
                };

                var ctx = document.getElementById('myChartt3');
                var myChart = new Chart(ctx, {
                    type: type3,
                    data: data3,
                });
            </script>
            &ensp;
        </div>

    </div>

          <!--  -->
          <!--  -->
        </div>
    </div>
    <div class="col-md-4 col-sm-12 col-xs-12">
        <div class="white-box">
          <!--  -->
          <!--  -->
          <h5 style="margin:0px;padding:0px" class="text-center"><b>Volume Trend</b></h5><br>

          <div class="">
          <div class="">
<!-- Volume Trend -->
<!-- Volume Trend -->
          <div class="row" style="background-color:white;">
          <div class="col-md-12" style="">
          <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
          <?php
          if(empty($tprepaidordersres) AND empty($tcodordersres)){
              echo "<div class='col-md-12 text-center' style='margin-top:100px;margin-bottom:95px'>Loading...</div>";
          }else{
              echo "<canvas id='mycharttisa'></canvas>";
          }
          ?>
          <script type="text/javascript">
              const type2 = "doughnut";
              const data2 = {
                labels: ["COD(<?= $codpercentage ?>%)",'Prepaid(<?= $prepaidpercentage ?>%)'],
                // labels: ["COD (<?= $codpercentage ?>%) ",'Prepaid (<?= $prepaidpercentage ?>%) '],
                datasets: [{
                  // label: 'My First Dataset',
                  data: [<?= $tcodordersres ?>,<?= $tprepaidordersres ?>],
                  backgroundColor: [
                    '#808080f5',
                    '#80808099'
                  ],
                  hoverOffset: 4
                }]
              };

              var ctx = document.getElementById('mycharttisa');
              var myChart = new Chart(ctx, {
                  type: type2,
                  data: data2,
              });
          </script>
          &ensp;
          </div>

          </div>
          </div>
          </div>

          <!--  -->
          <!--  -->
        </div>
    </div>
</div>
<!-- /.row -->















</div>
<!-- /.container-fluid -->
