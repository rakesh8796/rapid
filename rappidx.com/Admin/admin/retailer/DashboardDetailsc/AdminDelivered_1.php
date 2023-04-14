<?php
    session_start();
    error_reporting(1);
    extract($_REQUEST);
    include "../config/dbcon.php";
    date_default_timezone_set('Asia/Calcutta');
    $user_id = $_SESSION['useridis'];
?>


<?php
// $startdatefrom = date("d-m-Y");
// $enddatefrom = date("d-m-Y");

$startdatefrom = date('Y-m-d',strtotime($startdatefrom));
// echo "<br>";
$enddatefrom = date('Y-m-d',strtotime($enddatefrom));



// COD Orders
if($selectedname=="CurrentMonthData" OR $selectedname=="LastMonthData"){
    $deliveredcodq = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Order_Type`='COD' AND `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_status_show`='Rec_Time_Date' AND `order_cancel` IS NULL AND `delivereddate` BETWEEN '$startdatefrom' AND '$enddatefrom'";
}else{
    $deliveredcodq = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Order_Type`='COD' AND `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_status_show`='Delivered' AND `order_cancel` IS NULL AND `delivereddate` BETWEEN '$startdatefrom' AND '$enddatefrom'";
}
$deliveredcodr = mysqli_query($conn, $deliveredcodq);
$deliveredcodres = mysqli_fetch_assoc($deliveredcodr);
$deliveredcod = $deliveredcodres["count('Single_Order_Id')"];
// COD Orders
// Prepaid Orders
if($selectedname=="CurrentMonthData" OR $selectedname=="LastMonthData"){
    $deliveredpreq = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Order_Type`='Prepaid' AND `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_status_show`='Rec_Time_Date' AND `order_cancel` IS NULL AND `delivereddate` BETWEEN '$startdatefrom' AND '$enddatefrom'";
}else{
    $deliveredpreq = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Order_Type`='Prepaid' AND `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_status_show`='Delivered' AND `order_cancel` IS NULL AND `delivereddate` BETWEEN '$startdatefrom' AND '$enddatefrom'";
}
$deliveredprer = mysqli_query($conn, $deliveredpreq);
$deliveredpreres = mysqli_fetch_assoc($deliveredprer);
$deliveredpre = $deliveredpreres["count('Single_Order_Id')"];
// Prepaid Orders

?>

<div class="">
   <span class="text-muted">Delivered &ensp;|&ensp;  <strong><?= $deliveredcod+$deliveredpre ?></strong></span>
   <h5 style="font-size:10px" class=" fontweigh">Prepaid &ensp;&ensp;-&ensp;&ensp;<strong><?= $deliveredpre ?></strong></strong></h5>
   <h5 style="font-size:10px" class=" fontweigh">COD&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;-&ensp;&ensp;<strong><?= $deliveredcod ?></strong></h5>
</div>

