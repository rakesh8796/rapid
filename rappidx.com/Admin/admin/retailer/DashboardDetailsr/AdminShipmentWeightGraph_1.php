<?php
    session_start();
    error_reporting(1);
    extract($_REQUEST);
    include "../config/dbcon.php";
    date_default_timezone_set('Asia/Calcutta');
    $user_id = $_SESSION['useridis'];
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

// Delivered Orders
  $deliveredqp = "SELECT DISTINCT(`User_Id`) FROM `spark_single_order` WHERE `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_status_show`='Delivered' AND `order_cancel` IS NULL AND `delivereddate` BETWEEN '$startdatefrom' AND '$enddatefrom'";
  // echo "<br>";
  $deliveredrp = mysqli_query($conn, $deliveredqp);
  while($delres=mysqli_fetch_assoc($deliveredrp)){
    // echo "<br>Delivered ID Is : ";
    $useridisa = $delres['User_Id'];
    // echo " ---";
    $weightcheck = "SELECT `commercialstype` FROM `asitfa_user` WHERE `User_Id`='$useridisa'";
    $weightcheckr = mysqli_query($conn, $weightcheck);
    $weightcheckres = mysqli_fetch_assoc($weightcheckr);
    $weighcateisa = $weightcheckres['commercialstype'];
    // echo "<br>";
    if($weighcateisa=="gm500"){
      // echo "work";
      $weight5gm = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$useridisa' AND `Awb_Number`!='' AND `order_status_show`='Delivered' AND `order_cancel` IS NULL AND `delivereddate` BETWEEN '$startdatefrom' AND '$enddatefrom'";
      $weight5gmr = mysqli_query($conn, $weight5gm);
      $weight5gmres = mysqli_fetch_assoc($weight5gmr);
      // echo " <br> ";
      // echo $weight5gmr = $weight5gmres["count('Single_Order_Id')"];
      // echo " : ";
      // echo $tgm500+=$weight5gmr;
      $tgm500+=$weight5gmres["count('Single_Order_Id')"];
      // echo " <br> ";
    }elseif($weighcateisa=="kg1"){
      $weight5gm01 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$useridisa' AND `Awb_Number`!='' AND `order_status_show`='Delivered' AND `order_cancel` IS NULL AND `delivereddate` BETWEEN '$startdatefrom' AND '$enddatefrom'";
      $weight5gmr01 = mysqli_query($conn, $weight5gm01);
      $weight5gmres01 = mysqli_fetch_assoc($weight5gmr01);
      $tkg1+=$weight5gmres01["count('Single_Order_Id')"];
    }elseif($weighcateisa=="kg2"){
      $weight5gm02 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$useridisa' AND `Awb_Number`!='' AND `order_status_show`='Delivered' AND `order_cancel` IS NULL AND `delivereddate` BETWEEN '$startdatefrom' AND '$enddatefrom'";
      $weight5gmr02 = mysqli_query($conn, $weight5gm02);
      $weight5gmres02 = mysqli_fetch_assoc($weight5gmr02);
      $tkg2+=$weight5gmres02["count('Single_Order_Id')"];
    }elseif($weighcateisa=="kg5"){
      $weight5gm05 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$useridisa' AND `Awb_Number`!='' AND `order_status_show`='Delivered' AND `order_cancel` IS NULL AND `delivereddate` BETWEEN '$startdatefrom' AND '$enddatefrom'";
      $weight5gmr05 = mysqli_query($conn, $weight5gm05);
      $weight5gmres05 = mysqli_fetch_assoc($weight5gmr05);
      $tkg5+=$weight5gmres05["count('Single_Order_Id')"];
    }elseif($weighcateisa=="kg10"){
      $weight5gm010 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$useridisa' AND `Awb_Number`!='' AND `order_status_show`='Delivered' AND `order_cancel` IS NULL AND `delivereddate` BETWEEN '$startdatefrom' AND '$enddatefrom'";
      $weight5gmr010 = mysqli_query($conn, $weight5gm010);
      $weight5gmres010 = mysqli_fetch_assoc($weight5gmr010);
      $tkg10+=$weight5gmres010["count('Single_Order_Id')"];
    }else {
      // echo "Not";
    }
  }
  // echo "<br>";
  // echo "<br>";
// Delivered Orders
// RTO Orders

    // $rtdqp = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`!='0' AND `Awb_Number`!='' AND `order_status_show`='RTO Delivered' AND `order_cancel` IS NULL AND `rtodate` BETWEEN '$startdatefrom' AND '$enddatefrom'";
    // $rtdrp = mysqli_query($conn, $rtdqp);
    // $rtdresp = mysqli_fetch_assoc($rtdrp);
    // $rtdp = $rtdresp["count('Single_Order_Id')"];

    $deliveredqp1 = "SELECT DISTINCT(`User_Id`) FROM `spark_single_order` WHERE `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_status_show`='RTO Delivered' AND `order_cancel` IS NULL AND `rtodate` BETWEEN '$startdatefrom' AND '$enddatefrom'";
    $deliveredrp1 = mysqli_query($conn, $deliveredqp1);
    while($delres1=mysqli_fetch_assoc($deliveredrp1)){
      // echo "<br>RTO ID Is : ";
      $useridisa1 = $delres1['User_Id'];
      // echo " ---";
      $weightcheck1 = "SELECT `commercialstype` FROM `asitfa_user` WHERE `User_Id`='$useridisa1'";
      $weightcheckr1 = mysqli_query($conn, $weightcheck1);
      $weightcheckres1 = mysqli_fetch_assoc($weightcheckr1);
      $weighcateisa1 = $weightcheckres1['commercialstype'];
      // echo "<br>";
      if($weighcateisa1=="gm500"){
        // echo "work";
        $weight5gm1 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$useridisa1' AND `Awb_Number`!='' AND `order_status_show`='RTO Delivered' AND `order_cancel` IS NULL AND `rtodate` BETWEEN '$startdatefrom' AND '$enddatefrom'";
        $weight5gmr1 = mysqli_query($conn, $weight5gm1);
        $weight5gmres1 = mysqli_fetch_assoc($weight5gmr1);
        // echo " <br> ";
        // echo $weight5gmr1 = $weight5gmres1["count('Single_Order_Id')"];
        // echo " : ";
        // echo $tgm500+=$weight5gmr;
        $tgm500+=$weight5gmres1["count('Single_Order_Id')"];
        // echo " <br> ";
      }elseif($weighcateisa1=="kg1"){
        $weight5gm101 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$useridisa1' AND `Awb_Number`!='' AND `order_status_show`='RTO Delivered' AND `order_cancel` IS NULL AND `rtodate` BETWEEN '$startdatefrom' AND '$enddatefrom'";
        $weight5gmr101 = mysqli_query($conn, $weight5gm101);
        $weight5gmres101 = mysqli_fetch_assoc($weight5gmr101);
        $tkg1+=$weight5gmres101["count('Single_Order_Id')"];
      }elseif($weighcateisa1=="kg2"){
        $weight5gm102 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$useridisa1' AND `Awb_Number`!='' AND `order_status_show`='RTO Delivered' AND `order_cancel` IS NULL AND `rtodate` BETWEEN '$startdatefrom' AND '$enddatefrom'";
        $weight5gmr102 = mysqli_query($conn, $weight5gm102);
        $weight5gmres102 = mysqli_fetch_assoc($weight5gmr102);
        $tkg2+=$weight5gmres102["count('Single_Order_Id')"];
      }elseif($weighcateisa1=="kg5"){
        $weight5gm105 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$useridisa1' AND `Awb_Number`!='' AND `order_status_show`='RTO Delivered' AND `order_cancel` IS NULL AND `rtodate` BETWEEN '$startdatefrom' AND '$enddatefrom'";
        $weight5gmr105 = mysqli_query($conn, $weight5gm105);
        $weight5gmres105 = mysqli_fetch_assoc($weight5gmr105);
        $tkg5+=$weight5gmres105["count('Single_Order_Id')"];
      }elseif($weighcateisa1=="kg10"){
        $weight5gm1010 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$useridisa1' AND `Awb_Number`!='' AND `order_status_show`='RTO Delivered' AND `order_cancel` IS NULL AND `rtodate` BETWEEN '$startdatefrom' AND '$enddatefrom'";
        $weight5gmr1010 = mysqli_query($conn, $weight5gm1010);
        $weight5gmres1010 = mysqli_fetch_assoc($weight5gmr1010);
        $tkg10+=$weight5gmres1010["count('Single_Order_Id')"];
      }else {
        // echo "Not";
      }
    }
    // echo "<br>";
    // echo "<br>";
// RTO Orders
// Process Orders
    // $processqp = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`!='0' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND (`order_status_show`!='Delivered' AND `order_status_show`!='RTO Delivered')
    // AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
    // $processrp = mysqli_query($conn, $processqp);
    // $processresp = mysqli_fetch_assoc($processrp);
    // $processp = $processresp["count('Single_Order_Id')"];

    $deliveredqp2 = "SELECT DISTINCT(`User_Id`) FROM `spark_single_order` WHERE `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND (`order_status_show`!='Delivered' AND `order_status_show`!='RTO Delivered')
     AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
    // echo "<br>";
    $deliveredrp2 = mysqli_query($conn, $deliveredqp2);
    while($delres2=mysqli_fetch_assoc($deliveredrp2)){
      // echo "<br>Process ID Is : ";
      $useridisa2 = $delres2['User_Id'];
      // echo " ---";
      $weightcheck2 = "SELECT `commercialstype` FROM `asitfa_user` WHERE `User_Id`='$useridisa2'";
      $weightcheckr2 = mysqli_query($conn, $weightcheck2);
      $weightcheckres2 = mysqli_fetch_assoc($weightcheckr2);
      $weighcateisa2 = $weightcheckres2['commercialstype'];
      // echo "<br>";
      if($weighcateisa2=="gm500"){
        // echo "work";
        $weight5gm2 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$useridisa2' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND (`order_status_show`!='Delivered' AND `order_status_show`!='RTO Delivered')
         AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
        $weight5gmr2 = mysqli_query($conn, $weight5gm2);
        $weight5gmres2 = mysqli_fetch_assoc($weight5gmr2);
        // echo " <br> ";
        // echo $weight5gmr = $weight5gmres2["count('Single_Order_Id')"];
        // echo " : ";
        // echo $tgm500+=$weight5gmr2;
        $tgm500+=$weight5gmres2["count('Single_Order_Id')"];
        // echo " <br> ";
      }elseif($weighcateisa2=="kg1"){
        $weight5gm201 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$useridisa2' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND (`order_status_show`!='Delivered' AND `order_status_show`!='RTO Delivered')
         AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
        $weight5gmr201 = mysqli_query($conn, $weight5gm201);
        $weight5gmres201 = mysqli_fetch_assoc($weight5gmr201);
        $tkg1+=$weight5gmres201["count('Single_Order_Id')"];
      }elseif($weighcateisa2=="kg2"){
        $weight5gm202 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$useridisa2' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND (`order_status_show`!='Delivered' AND `order_status_show`!='RTO Delivered')
         AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
        $weight5gmr202 = mysqli_query($conn, $weight5gm202);
        $weight5gmres202 = mysqli_fetch_assoc($weight5gmr202);
        $tkg2+=$weight5gmres202["count('Single_Order_Id')"];
      }elseif($weighcateisa2=="kg5"){
        $weight5gm205 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$useridisa2' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND (`order_status_show`!='Delivered' AND `order_status_show`!='RTO Delivered')
         AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
        $weight5gmr205 = mysqli_query($conn, $weight5gm205);
        $weight5gmres205 = mysqli_fetch_assoc($weight5gmr205);
        $tkg5+=$weight5gmres205["count('Single_Order_Id')"];
      }elseif($weighcateisa2=="kg10"){
        $weight5gm2010 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$useridisa2' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND (`order_status_show`!='Delivered' AND `order_status_show`!='RTO Delivered')
         AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
        $weight5gmr201 = mysqli_query($conn, $weight5gm2010);
        $weight5gmres2010 = mysqli_fetch_assoc($weight5gmr2010);
        $tkg10+=$weight5gmres2010["count('Single_Order_Id')"];
      }else {
        // echo "Not";
      }
    }
    // echo "<br>";
// Process Orders


// echo "<br>";
// echo "<br>";
// echo "500Gm : ";
// echo $tgm500;
// echo "<br>";
// echo "1KG : ";
// echo $tkg1;
// echo "<br>";
// echo "2KG : ";
// echo $tkg2;
// echo "<br>";
// echo "5KG : ";
// echo $tkg5;
// echo "<br>";
// echo "10KG : ";
// echo $tkg10;
// echo "<br>";
?>
<!-- Shipment Weight -->




















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
