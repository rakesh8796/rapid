<?php
    session_start();
    error_reporting(1);
    extract($_REQUEST);
    include "../config/dbcon.php";
    date_default_timezone_set('Asia/Calcutta');
?>









<!-- Shipment Weight -->
<?php

$tgm500 = 0;
$tkg1 = 0;
$tkg2 = 0;
$tkg5 = 0;
$tkg10 = 0;

// $enddatefrom = date('d-m-Y');
// $startdatefrom = date('d-m-Y',strtotime("-7 Days"));
$startdatefrom = date('Y-m-d',strtotime($startdatefrom));
// echo "<br>";
$enddatefrom = date('Y-m-d',strtotime($enddatefrom));
// echo "<br>";

$startdatefrom = date('Y-m-d',strtotime($startdatefrom));
// echo "<br>";
$enddatefrom = date('Y-m-d',strtotime($enddatefrom));

if($selectedname=="CurrentMonthData" OR $selectedname=="LastMonthData"){
    $deliveredq = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`!='0' AND `Awb_Number`!='' AND `order_status_show`='Delivered' AND `order_cancel` IS NULL AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
}else{
    $deliveredq = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`!='0' AND `Awb_Number`!='' AND `order_status_show`='Delivered' AND `order_cancel` IS NULL AND `delivereddate` BETWEEN '$startdatefrom' AND '$enddatefrom'";
}
$deliveredr = mysqli_query($conn, $deliveredq);
$deliveredres = mysqli_fetch_assoc($deliveredr);
$delivered = $deliveredres["count('Single_Order_Id')"];
// echo "<br><br>";
if($selectedname=="CurrentMonthData" OR $selectedname=="LastMonthData"){
    $rtdq = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`!='0' AND `Awb_Number`!='' AND `order_status_show`='RTO Delivered' AND `order_cancel` IS NULL AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
}else{
    $rtdq = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`!='0' AND `Awb_Number`!='' AND `order_status_show`='RTO Delivered' AND `order_cancel` IS NULL AND `rtodate` BETWEEN '$startdatefrom' AND '$enddatefrom'";
}
$rtdr = mysqli_query($conn, $rtdq);
$rtdres = mysqli_fetch_assoc($rtdr);
$rtd = $rtdres["count('Single_Order_Id')"];
// echo "<br><br>";
$processq = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`!='0' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND (`order_status_show`!='Delivered' AND `order_status_show`!='RTO Delivered')
AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
$processr = mysqli_query($conn, $processq);
$processres = mysqli_fetch_assoc($processr);
$process = $processres["count('Single_Order_Id')"];




$tgm500 = $delivered+$rtd+$process;



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




<div class="">
<div class="row" style="background-color:white;">
<div class="col-md-12" style="">
<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
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
  &ensp;
</div>
</div>
</div>
