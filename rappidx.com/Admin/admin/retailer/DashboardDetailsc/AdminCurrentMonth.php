<?php
    session_start();
    error_reporting(1);
    extract($_REQUEST);
    include "../config/dbcon.php";
    date_default_timezone_set('Asia/Calcutta');
    $user_id = $_SESSION['useridis'];
?>





<?php
$stdate = date("d-m-Y");
$startdatefrom = date('Y-m-d',strtotime($stdate));
// echo "<br>";
$enddatefrom = date('Y-m-d',strtotime($stdate));

// echo "<br>";
$stdate = date("d-m-Y");
$currentmonthcheck = date('Y-m-d',strtotime($stdate));



// Delivered
$deliveredq = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND `order_status_show`='Delivered' AND MONTH(`Rec_Time_Date`) = MONTH('$currentmonthcheck') AND YEAR(`Rec_Time_Date`) = YEAR('$currentmonthcheck')";
$deliveredr = mysqli_query($conn, $deliveredq);
$deliveredres = mysqli_fetch_assoc($deliveredr);
$delivered = $deliveredres["count('Single_Order_Id')"];
// Delivered
// echo "<br><br>";
// RTD
$rtdq = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND `order_status_show`='RTO Delivered' AND MONTH(`Rec_Time_Date`) = MONTH('$currentmonthcheck') AND YEAR(`Rec_Time_Date`) = YEAR('$currentmonthcheck')";
$rtdr = mysqli_query($conn, $rtdq);
$rtdres = mysqli_fetch_assoc($rtdr);
$rtd = $rtdres["count('Single_Order_Id')"];
// RTD
// echo "<br><br>";


// Process
$processq = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND (`order_status_show`!='Delivered' AND `order_status_show`!='RTO Delivered' AND `order_status_show`!='Manifested' AND `order_status_show`!='Data Received' AND `order_status_show`!='Not Picked' AND `order_status_show`!='Upload' AND `order_status_show`!='Pending')
AND MONTH(`Rec_Time_Date`) = MONTH('$currentmonthcheck') AND YEAR(`Rec_Time_Date`) = YEAR('$currentmonthcheck')";
$processr = mysqli_query($conn, $processq);
$processres = mysqli_fetch_assoc($processr);
$process = $processres["count('Single_Order_Id')"];
// Process
// echo "<br><br>";
// Manifest
$maniq = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND (`order_status_show`='Manifested' OR `order_status_show`='Data Received' OR `order_status_show`='Not Picked' OR `order_status_show`='Upload' OR `order_status_show`='Pending')
AND MONTH(`Rec_Time_Date`) = MONTH('$currentmonthcheck') AND YEAR(`Rec_Time_Date`) = YEAR('$currentmonthcheck')";
$manir = mysqli_query($conn, $maniq);
$manires = mysqli_fetch_assoc($manir);
$manifest = $manires["count('Single_Order_Id')"];
// Manifest

?>






  <div class="">
      <h3 class="box-title fontweigh">Current(<?= date('M'); ?>) Month 
        <span style="float:right;" title="Delivered + RTD + Process">Total : <b><?= $delivered+$rtd+$process ?></b></span>
      </h3>
      <div class="stats-row">
      <div class="stat-item">
          <h6 class="fontweigh">Delivered</h6> <strong><?= $delivered ?></strong></div>
      <div class="stat-item">
          <h6 class="fontweigh">RTD</h6> <strong><?= $rtd ?></strong></div>
      <div class="stat-item">
          <h6 class="fontweigh">Process</h6> <strong><?= $process ?></strong></div>
      <div class="stat-item">
          <h6 class="fontweigh">Manifest</h6> <strong><?= $manifest ?></strong></div>
      </div>
  </div>
