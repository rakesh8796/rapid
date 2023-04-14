<?php
    session_start();
    error_reporting(1);
    extract($_REQUEST);
    include "../config/dbcon.php";
    date_default_timezone_set('Asia/Calcutta');
?>








<?php
$stdate = date("d-m-Y");
$startdatefrom = date('Y-m-d',strtotime($stdate));
// echo "<br>";
$enddatefrom = date('Y-m-d',strtotime($stdate));

// echo "<br>";
$stdate = date("d-m-Y");
$currentmonthcheck = date('Y-m-d',strtotime($stdate));



$deliveredq = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`!='0' AND `Awb_Number`!='' AND `order_status_show`='Delivered' AND `order_cancel` IS NULL AND MONTH(`Rec_Time_Date`) = MONTH('$currentmonthcheck') AND YEAR(`delivereddate`) = YEAR('$currentmonthcheck')";
$deliveredr = mysqli_query($conn, $deliveredq);
$deliveredres = mysqli_fetch_assoc($deliveredr);
$delivered = $deliveredres["count('Single_Order_Id')"];
// echo "<br><br>";
$rtdq = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`!='0' AND `Awb_Number`!='' AND `order_status_show`='RTO Delivered' AND `order_cancel` IS NULL AND MONTH(`Rec_Time_Date`) = MONTH('$currentmonthcheck') AND YEAR(`rtodate`) = YEAR('$currentmonthcheck')";
$rtdr = mysqli_query($conn, $rtdq);
$rtdres = mysqli_fetch_assoc($rtdr);
$rtd = $rtdres["count('Single_Order_Id')"];
// echo "<br><br>";
$processq = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`!='0' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND (`order_status_show`!='Delivered' AND `order_status_show`!='RTO Delivered')
AND MONTH(`Rec_Time_Date`) = MONTH('$currentmonthcheck') AND YEAR(`Rec_Time_Date`) = YEAR('$currentmonthcheck')";
$processr = mysqli_query($conn, $processq);
$processres = mysqli_fetch_assoc($processr);
$process = $processres["count('Single_Order_Id')"];

?>






  <div class="">
      <h3 class="box-title fontweigh">Current(<?= date('M'); ?>) Month</h3>
      <div class="stats-row">
      <div class="stat-item">
          <h6 class="fontweigh">Delivered</h6> <strong><?= $delivered ?></strong></div>
      <div class="stat-item">
          <h6 class="fontweigh">RTD</h6> <strong><?= $rtd ?></strong></div>
      <div class="stat-item">
          <h6 class="fontweigh">Process</h6> <strong><?= $process ?></strong></div>
      <div class="stat-item">
          <h6 class="fontweigh">Total</h6> <strong><?= $delivered+$rtd+$process ?></strong></div>
      </div>
  </div>
