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

// echo "<br><br>";
$querytoday = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
$querytodayr = mysqli_query($conn, $querytoday);
$querytodayres = mysqli_fetch_assoc($querytodayr);
$total = $querytodayres["count('Single_Order_Id')"];
// echo "<br><br>";
$querytodaycod = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Order_Type`='COD' AND `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
$querytodaycodr = mysqli_query($conn, $querytodaycod);
$querytodaycodres = mysqli_fetch_assoc($querytodaycodr);
$cod = $querytodaycodres["count('Single_Order_Id')"];
// echo "<br><br>";
$querytodayprepaid = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Order_Type`='Prepaid' AND `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
$querytodayprepaidr = mysqli_query($conn, $querytodayprepaid);
$querytodayprepaidres = mysqli_fetch_assoc($querytodayprepaidr);
$prepaid = $querytodayprepaidres["count('Single_Order_Id')"];
// echo "<br><br>";
 ?>


<div class="bodystate fontweigh">
    <span class="text-muted fontweigh">Today &ensp;|&ensp; <strong><?= $total ?></strong></span>
    <h5 style="font-size:10px" class=" fontweigh">Prepaid &ensp;&ensp;-&ensp;&ensp; <?= $prepaid ?> </h5>
    <h5 style="font-size:10px" class=" fontweigh">COD&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;-&ensp;&ensp;  <?= $cod ?></h5>
</div>
