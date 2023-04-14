<?php
    session_start();
    error_reporting(1);
    extract($_REQUEST);
    include "../config/dbcon.php";
    date_default_timezone_set('Asia/Calcutta');
    $user_id = $_SESSION['useridis'];
?>

<?php
$startdatefrom = date('Y-m-d',strtotime($stdate));
// echo "<br>";
$enddatefrom = date('Y-m-d',strtotime($stdate));

$stdate = date("d-m-Y");
$currentmonthcheck = date('Y-m-d',strtotime($stdate));

$deliveredq = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND MONTH(`delivereddate`) = MONTH('$currentmonthcheck') AND YEAR(`delivereddate`) = YEAR('$currentmonthcheck')";
$deliveredr = mysqli_query($conn, $deliveredq);
$deliveredres = mysqli_fetch_assoc($deliveredr);
$delivered = $deliveredres["count('Single_Order_Id')"];
// echo "<br><br>";
$rtdq = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND MONTH(`rtodate`) = MONTH('$currentmonthcheck') AND YEAR(`rtodate`) = YEAR('$currentmonthcheck')";
$rtdr = mysqli_query($conn, $rtdq);
$rtdres = mysqli_fetch_assoc($rtdr);
$rtd = $rtdres["count('Single_Order_Id')"];
// echo "<br><br>";
$processq = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND (`delivereddate`='0000-00-00' OR `delivereddate` IS NULL) AND (`rtodate`='0000-00-00' OR `rtodate` IS NULL) AND
MONTH(`Rec_Time_Date`) = MONTH('$currentmonthcheck') AND YEAR(`Rec_Time_Date`) = YEAR('$currentmonthcheck')";
$processr = mysqli_query($conn, $processq);
$processres = mysqli_fetch_assoc($processr);
$process = $processres["count('Single_Order_Id')"];



// echo "<br>Current Details<br>";
$querytotaltodayorders = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_cancel` IS NULL AND MONTH(`Rec_Time_Date`) = MONTH('$currentmonthcheck') AND YEAR(`Rec_Time_Date`) = YEAR('$currentmonthcheck')";
$querytotaltodayordersr = mysqli_query($conn, $querytotaltodayorders);
$querytotaltodayordersres = mysqli_fetch_assoc($querytotaltodayordersr);
$currenmonth = $querytotaltodayordersres["count('Single_Order_Id')"];
// echo "<br><br>";
$querytotaltodayocod = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$user_id' AND `User_Id`!='0' AND `Awb_Number`!='' AND `order_cancel` IS NULL  AND MONTH(`Rec_Time_Date`) = MONTH('$currentmonthcheck') AND YEAR(`Rec_Time_Date`) = YEAR('$currentmonthcheck')";
$querytotaltodayocodr = mysqli_query($conn, $querytotaltodayocod);
$querytotaltodayocodres = mysqli_fetch_assoc($querytotaltodayocodr);
$cod = $querytotaltodayocodres["count('Single_Order_Id')"];
// echo "<br><br>";
$querytotaltodayprepaid = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$user_id' AND `Order_Type`='Prepaid' AND `Awb_Number`!='' AND `order_cancel` IS NULL  AND MONTH(`Rec_Time_Date`) = MONTH('$currentmonthcheck') AND YEAR(`Rec_Time_Date`) = YEAR('$currentmonthcheck')";
$querytotaltodayprepaidr = mysqli_query($conn, $querytotaltodayprepaid);
$querytotaltodayprepaidres = mysqli_fetch_assoc($querytotaltodayprepaidr);
$prepaid = $querytotaltodayprepaidres["count('Single_Order_Id')"];
// echo "<br><br>";
?>

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
