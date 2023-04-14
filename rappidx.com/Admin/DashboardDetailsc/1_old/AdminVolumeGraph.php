<?php
session_start();
error_reporting(1);
extract($_REQUEST);
include "../config/dbcon.php";
date_default_timezone_set('Asia/Calcutta');
$user_id = $_SESSION['useridis'];
?>



<!-- Volume Trend -->
<?php
// $enddatefrom = date('d-m-Y');
// $startdatefrom = date('d-m-Y',strtotime("-7 Days"));
$startdatefrom = date('Y-m-d',strtotime($startdatefrom));
// echo "<br>";
$enddatefrom = date('Y-m-d',strtotime($enddatefrom));
// echo "<br>";

// Delivered Orders
  // COD Delivered Orders
  if($selectedname=="CurrentMonthData" OR $selectedname=="LastMonthData"){
    $deliveredq = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Order_Type`='COD' AND `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_status_show`='Delivered' AND `order_cancel` IS NULL AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
  }else{
    $deliveredq = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Order_Type`='COD' AND `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_status_show`='Delivered' AND `order_cancel` IS NULL AND `delivereddate` BETWEEN '$startdatefrom' AND '$enddatefrom'";
  }
    $deliveredr = mysqli_query($conn, $deliveredq);
    $deliveredres = mysqli_fetch_assoc($deliveredr);
    // echo "<br>";
    // echo "DL-COD : ";
    $delivered = $deliveredres["count('Single_Order_Id')"];
  // COD Delivered Orders
  // Prepaid Delivered Orders
  if($selectedname=="CurrentMonthData" OR $selectedname=="LastMonthData"){
    $deliveredqp = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Order_Type`='Prepaid' AND `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_status_show`='Delivered' AND `order_cancel` IS NULL AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
  }else{
    $deliveredqp = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Order_Type`='Prepaid' AND `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_status_show`='Delivered' AND `order_cancel` IS NULL AND `delivereddate` BETWEEN '$startdatefrom' AND '$enddatefrom'";
  }
    $deliveredrp = mysqli_query($conn, $deliveredqp);
    $deliveredresp = mysqli_fetch_assoc($deliveredrp);
    // echo "<br>";
    // echo "DL-Pre : ";
    $deliveredp = $deliveredresp["count('Single_Order_Id')"];
    // echo "<br>";
    // echo "<br>";
  // Prepaid Delivered Orders
// Delivered Orders
// RTO Orders
  // COD RTO Orders
  if($selectedname=="CurrentMonthData" OR $selectedname=="LastMonthData"){
    $rtdq = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Order_Type`='COD' AND `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_status_show`='RTO Delivered' AND `order_cancel` IS NULL AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
  }else{
    $rtdq = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Order_Type`='COD' AND `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_status_show`='RTO Delivered' AND `order_cancel` IS NULL AND `rtodate` BETWEEN '$startdatefrom' AND '$enddatefrom'";
  }
    $rtdr = mysqli_query($conn, $rtdq);
    $rtdres = mysqli_fetch_assoc($rtdr);
    // echo "<br>";
    // echo "RTO-COD : ";
    $rtd = $rtdres["count('Single_Order_Id')"];
  // COD RTO Orders
  // Prepaid RTO Orders
  if($selectedname=="CurrentMonthData" OR $selectedname=="LastMonthData"){
    $rtdqp = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Order_Type`='Prepaid' AND `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_status_show`='RTO Delivered' AND `order_cancel` IS NULL AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
  }else{
    $rtdqp = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Order_Type`='Prepaid' AND `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_status_show`='RTO Delivered' AND `order_cancel` IS NULL AND `rtodate` BETWEEN '$startdatefrom' AND '$enddatefrom'";
  }
    $rtdrp = mysqli_query($conn, $rtdqp);
    $rtdresp = mysqli_fetch_assoc($rtdrp);
    // echo "<br>";
    // echo "RTO-Pre : ";
    $rtdp = $rtdresp["count('Single_Order_Id')"];
  // Prepaid RTO Orders
// RTO Orders
// Process Orders
  // COD Process Orders
    $processq = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Order_Type`='COD' AND `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND (`order_status_show`!='Delivered' AND `order_status_show`!='RTO Delivered')
    AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
    $processr = mysqli_query($conn, $processq);
    $processres = mysqli_fetch_assoc($processr);
    // echo "<br>";
    // echo "Proce-COD : ";
    $process = $processres["count('Single_Order_Id')"];
  // COD Process Orders
  // Prepaid Process Orders
    $processqp = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Order_Type`='Prepaid' AND `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND (`order_status_show`!='Delivered' AND `order_status_show`!='RTO Delivered')
    AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
    $processrp = mysqli_query($conn, $processqp);
    $processresp = mysqli_fetch_assoc($processrp);
    // echo "<br>";
    // echo "Proce-Pre : ";
    $processp = $processresp["count('Single_Order_Id')"];
  // Prepaid Process Orders
// Process Orders




// $startdatefrom = date('Y-m-d',strtotime($startdatefrom));
// // echo "<br>";
// $enddatefrom = date('Y-m-d',strtotime($enddatefrom));
//
//
// // COD Orders
// $deliveredcodq = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Order_Type`='COD' AND `User_Id`!='0' AND `Awb_Number`!='' AND `order_status_show`='Delivered' AND `order_cancel` IS NULL AND `delivereddate` BETWEEN '$startdatefrom' AND '$enddatefrom'";
// $deliveredcodr = mysqli_query($conn, $deliveredcodq);
// $deliveredcodres = mysqli_fetch_assoc($deliveredcodr);
// $deliveredcod = $deliveredcodres["count('Single_Order_Id')"];
// // COD Orders
// // Prepaid Orders
// $deliveredpreq = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Order_Type`='Prepaid' AND `User_Id`!='0' AND `Awb_Number`!='' AND `order_status_show`='Delivered' AND `order_cancel` IS NULL AND `delivereddate` BETWEEN '$startdatefrom' AND '$enddatefrom'";
// $deliveredprer = mysqli_query($conn, $deliveredpreq);
// $deliveredpreres = mysqli_fetch_assoc($deliveredprer);
// $deliveredpre = $deliveredpreres["count('Single_Order_Id')"];
// // Prepaid Orders


$tprepaidordersres = $deliveredp+$rtdp+$processp;
// echo "<br>";
$tcodordersres = $delivered+$rtd+$process;
// echo "<br>";
$totalorders = $tprepaidordersres+$tcodordersres;
// $tprepaidordersres = $deliveredpre;
// $tcodordersres = $deliveredcod;
// $totalorders = $deliveredpre + $deliveredcod;
$prepaidpercentage = ($tprepaidordersres/$totalorders)*100;
$prepaidpercentage = round($prepaidpercentage,1);
$codpercentage = ($tcodordersres/$totalorders)*100;
$codpercentage = round($codpercentage,1);
?>
<!-- Volume Trend -->



<div class="">
<div class="row" style="background-color:white;">
<div class="col-md-12" style="">
<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
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
