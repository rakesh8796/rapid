<?php
    session_start();
    error_reporting(1);
    extract($_REQUEST);
    include "../config/dbcon.php";
    date_default_timezone_set('Asia/Calcutta');
?>



<?php

$startdatefrom = date('Y-m-d',strtotime($startdatefrom));
// echo "<br>";
$enddatefrom = date('Y-m-d',strtotime($enddatefrom));

// echo "<br>";
// echo $timeperiod;


if($timeperiod == "CurrentMonth" OR $timeperiod == "LastMonth"){
    $deliveredq = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`!='0' AND `Awb_Number`!='' AND `order_status_show`='Delivered' AND `order_cancel` IS NULL AND `awb_gen_by`='Delhivery' 
    AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
}else{
    $deliveredq = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`!='0' AND `Awb_Number`!='' AND `order_status_show`='Delivered' AND `order_cancel` IS NULL AND `awb_gen_by`='Delhivery' 
    AND `delivereddate` BETWEEN '$startdatefrom' AND '$enddatefrom'";
}
$deliveredr = mysqli_query($conn, $deliveredq);
$deliveredres = mysqli_fetch_assoc($deliveredr);
$delivered = $deliveredres["count('Single_Order_Id')"];

// echo "<br><br>";
if($timeperiod == "CurrentMonth" OR $timeperiod == "LastMonth"){
    $rtdq = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`!='0' AND `Awb_Number`!='' AND `order_status_show`='RTO Delivered' AND `order_cancel` IS NULL AND `awb_gen_by`='Delhivery' 
    AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
}else{
    $rtdq = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`!='0' AND `Awb_Number`!='' AND `order_status_show`='RTO Delivered' AND `order_cancel` IS NULL AND `awb_gen_by`='Delhivery' 
    AND `rtodate` BETWEEN '$startdatefrom' AND '$enddatefrom'";
}
$rtdr = mysqli_query($conn, $rtdq);
$rtdres = mysqli_fetch_assoc($rtdr);
$rtd = $rtdres["count('Single_Order_Id')"];


// echo "<br><br>";
$processq = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`!='0' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND `awb_gen_by`='Delhivery' AND (`order_status_show`!='Delivered' AND `order_status_show`!='RTO Delivered' AND `order_status_show`!='Manifested' AND `order_status_show`!='Data Received' AND `order_status_show`!='Not Picked' AND `order_status_show`!='Upload' AND `order_status_show`!='Pending')
AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
$processr = mysqli_query($conn, $processq);
$processres = mysqli_fetch_assoc($processr);
$process = $processres["count('Single_Order_Id')"];


$maniq = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`!='0' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND `awb_gen_by`='Delhivery' AND (`order_status_show`='Manifested' OR `order_status_show`='Data Received' OR `order_status_show`='Not Picked' OR `order_status_show`='Upload' OR `order_status_show`='Pending')
AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
$manir = mysqli_query($conn, $maniq);
$manires = mysqli_fetch_assoc($manir);
$manifest = $manires["count('Single_Order_Id')"];

?>


<div class="">
    <h3 class="box-title"> <?= $val ?> Orders
        <span style="float:right;" title="Delivered + RTD + Process">Total : <b><?= $delivered+$rtd+$process ?></b></span>
    </h3>
    <div class="stats-row">
        <div class="stat-item">
            <h6 class="fontweigh">Delivered</h6> <b><?= $delivered; ?></b></div>
        <div class="stat-item">
            <h6 class="fontweigh">RTD</h6> <strong><?= $rtd ?></strong></div>
        <div class="stat-item">
            <h6 class="fontweigh">Process</h6> <b><?= $process; ?></b></div>
        <div class="stat-item">
            <h6 class="fontweigh">Manifest</h6> <strong><?= $manifest ?></strong></div>
    </div>
</div>