<?php
    session_start();
    error_reporting(1);
    extract($_REQUEST);
    include "../config/dbcon.php";
    date_default_timezone_set('Asia/Calcutta');
    $user_id = $_SESSION['useridis'];
?>





<!-- Performance -->

<?php
$deliveredorders = 0;
$rtdorders = 0;
$undeliveredorders = 0;
$rtointransitorders = 0;
$intransitorders = 0;
$ofdorders = 0;
$radorders = 0;
$lostorders = 0;


$startdatefrom = date('Y-m-d',strtotime($startdatefrom));
// echo "<br>";
$enddatefrom = date('Y-m-d',strtotime($enddatefrom));
// echo "<br>";

// Delivered Orders
if($selectedname=="CurrentMonthData" OR $selectedname=="LastMonthData"){
  $deliveredqp = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_status_show`='Delivered' AND `order_cancel` IS NULL AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
}else{
  $deliveredqp = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_status_show`='Delivered' AND `order_cancel` IS NULL AND `delivereddate` BETWEEN '$startdatefrom' AND '$enddatefrom'";
}
  $deliveredrp = mysqli_query($conn, $deliveredqp);
  $delres=mysqli_fetch_assoc($deliveredrp);
  // echo "<br>Delivered : ";
  $deliveredorders = $delres["count('Single_Order_Id')"];
  // echo "<br>";
// Delivered Orders
// RTO Orders
if($selectedname=="CurrentMonthData" OR $selectedname=="LastMonthData"){
  $rtdqp = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_status_show`='RTO Delivered' AND `order_cancel` IS NULL AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
}else{
  $rtdqp = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_status_show`='RTO Delivered' AND `order_cancel` IS NULL AND `rtodate` BETWEEN '$startdatefrom' AND '$enddatefrom'";
}
    $rtdrp = mysqli_query($conn, $rtdqp);
    $rtdresp = mysqli_fetch_assoc($rtdrp);
    // echo "<br> RTO : ";
    $rtdorders = $rtdresp["count('Single_Order_Id')"];
    // echo "<br>";
// RTO Orders
// Process Orders
    $performprocess = "SELECT DISTINCT(`order_status_show`) FROM `spark_single_order` WHERE `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND (`order_status_show`!='Delivered' AND `order_status_show`!='RTO Delivered')
    AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
    $performprocessr = mysqli_query($conn, $performprocess);
    while($performprocessres=mysqli_fetch_assoc($performprocessr)){
      // echo "<br>Status Is : ";
      $performstatus = $performprocessres['order_status_show'];
      // echo " ---";
      // echo "<br>";
        if($performstatus=="Undelivered"){
            $status = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND `order_status_show`='Undelivered' AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
            $status = mysqli_query($conn, $status);
            $status = mysqli_fetch_assoc($status);
            $undeliveredorders+=$status["count('Single_Order_Id')"];
        }elseif($performstatus=="RTO InTransit"){
            $status = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND `order_status_show`='RTO InTransit' AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
            $status = mysqli_query($conn, $status);
            $status = mysqli_fetch_assoc($status);
            $rtointransitorders+=$status["count('Single_Order_Id')"];
        }elseif($performstatus=="RTO In Transit"){
            $status = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND `order_status_show`='RTO In Transit' AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
            $status = mysqli_query($conn, $status);
            $status = mysqli_fetch_assoc($status);
            $rtointransitorders+=$status["count('Single_Order_Id')"];
        }elseif($performstatus=="In Transit"){
            $status = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND `order_status_show`='In Transit' AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
            $status = mysqli_query($conn, $status);
            $status = mysqli_fetch_assoc($status);
            $intransitorders+=$status["count('Single_Order_Id')"];
        }elseif($performstatus=="Out For Delivery"){
            $status = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND `order_status_show`='Out For Delivery' AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
            $status = mysqli_query($conn, $status);
            $status = mysqli_fetch_assoc($status);
            $ofdorders+=$status["count('Single_Order_Id')"];
        }elseif($performstatus=="OFD"){
            $status = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND `order_status_show`='OFD' AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
            $status = mysqli_query($conn, $status);
            $status = mysqli_fetch_assoc($status);
            $ofdorders+=$status["count('Single_Order_Id')"];
        }elseif($performstatus=="Reached At Destination"){
            $status = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND `order_status_show`='Reached At Destination' AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
            $status = mysqli_query($conn, $status);
            $status = mysqli_fetch_assoc($status);
            $radorders+=$status["count('Single_Order_Id')"];
        }elseif($performstatus=="RAD"){
            $status = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND `order_status_show`='RAD' AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
            $status = mysqli_query($conn, $status);
            $status = mysqli_fetch_assoc($status);
            $radorders+=$status["count('Single_Order_Id')"];
        }elseif($performstatus=="LOST"){
            $status = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND `order_status_show`='LOST' AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
            $status = mysqli_query($conn, $status);
            $status = mysqli_fetch_assoc($status);
            $lostorders+=$status["count('Single_Order_Id')"];
        }elseif($performstatus=="Lost"){
            $status = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND `order_status_show`='Lost' AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
            $status = mysqli_query($conn, $status);
            $status = mysqli_fetch_assoc($status);
            $lostorders+=$status["count('Single_Order_Id')"];
        }else{
            $status = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND `order_status_show`='$performstatus' AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
            $status = mysqli_query($conn, $status);
            $status = mysqli_fetch_assoc($status);
            $intransitorders+=$status["count('Single_Order_Id')"];
        }
    }
    echo "<br>";
// Process Orders




// echo "<br>";
// echo "<br>";
// echo "Delvd : ";
// echo $deliveredorders;
// echo "<br>";
// echo "RTD : ";
// echo $rtdorders;
// echo "<br>";
// echo "UNLD : ";
// echo $undeliveredorders;
// echo "<br>";
// echo "RTO : ";
// echo $rtointransitorders;
// echo "<br>";
// echo "Intransit : ";
// echo $intransitorders;
// echo "<br>";
// echo "OFD : ";
// echo $ofdorders;
// echo "<br>";
// echo "RAD : ";
// echo $radorders;
// echo "<br>";
// echo "Lost : ";
// echo $lostorders;
// echo "<br>";


  $tperforms = $deliveredorders+$rtdorders+$undeliveredorders+$rtointransitorders+$intransitorders+$ofdorders+$radorders+$lostorders;

    $deliveredpercent = ($deliveredorders/$tperforms)*100;
    $deliveredpercent = round($deliveredpercent,1);
    $rtodlvdpercent = ($rtdorders/$tperforms)*100;
    $rtodlvdpercent = round($rtodlvdpercent,1);
    $undeliveredpercent = ($undeliveredorders/$tperforms)*100;
    $undeliveredpercent = round($undeliveredpercent,1);
    $rtopercent = ($rtointransitorders/$tperforms)*100;
    $rtopercent = round($rtopercent,1);
    $intransitpercent = ($intransitorders/$tperforms)*100;
    $intransitpercent = round($intransitpercent,1);
    $ofdpercent = ($ofdorders/$tperforms)*100;
    $ofdpercent = round($ofdpercent,1);
    $radpercent = ($radorders/$tperforms)*100;
    $radpercent = round($radpercent,1);
    $lostpercent = ($lostorders/$tperforms)*100;
    $lostpercent = round($lostpercent,1);
?>
<!-- Performance -->









<div class="">
<div class="row" style="background-color:white;">
<div class="col-md-12" style="">
<?php
if(empty($deliveredorders) AND empty($rtdorders) AND empty($rtointransitorders) AND empty($undeliveredorders) AND empty($intransitorders) AND empty($lostorders) AND empty($ofdorders) AND empty($radorders)){
  echo "<div class='col-md-12 text-center' style='margin-top:122px;margin-bottom:75px'>Loading...</div>";
}else{
  echo "<canvas id='myChartt3'></canvas>";
}
?>

  <script type="text/javascript">
      const type3 = "doughnut";
      const data3 = {

labels: ['Delivered(<?= $deliveredpercent ?>%)','RTD(<?= $rtodlvdpercent ?>%)','Undelivered(<?= $undeliveredpercent ?>%)','RTO(<?= $rtopercent ?>%)','Intransit(<?= $intransitpercent ?>%)','OFD(<?= $ofdpercent ?>%)','RAD(<?= $radpercent ?>%)','Lost(<?= $lostpercent ?>%)'],
datasets: [{
data: [<?= $deliveredorders ?>,<?= $rtdorders ?>,<?= $undeliveredorders ?>,<?= $rtointransitorders ?>,<?= $intransitorders ?>,<?= $ofdorders ?>,<?= $radorders ?>,<?= $lostorders ?>],
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
</div>
