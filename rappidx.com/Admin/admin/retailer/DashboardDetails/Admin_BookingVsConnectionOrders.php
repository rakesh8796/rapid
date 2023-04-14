<?php
session_start();
error_reporting(1);
extract($_REQUEST);
include "../config/dbcon.php";
date_default_timezone_set('Asia/Calcutta');
?>


<style type="text/css">
th,td{
    padding:5px !important;
    font-size: 12px;
}
</style>

<div class="row">
<div class="col-sm-6">
<div class="white-box">
<span style="color:black;font-weight:400"><center>Month Wise Booking Orders</center></span>
<div class="table-responsive color-bordered-table muted-bordered-table fontweigh">
 <table class="table ">
    <thead>
      <tr>
        <th title="Month Wise">Month</th>
        <th title="Booking Count">Booking</th>
        <th title="Connection Count">Connection</th>
      </tr>
    </thead>
    <tbody>
       <!--  <tr>
            <td>August</td>
            <td>00</td>
            <td>00</td>
        </tr>
        <tr>
            <td>July</td>
            <td>00</td>
            <td>00</td>
        </tr>
        <tr>
            <td>June</td>
            <td>00</td>
            <td>00</td>
        </tr>
        <tr>
            <td>May</td>
            <td>00</td>
            <td>00</td>
        </tr>
        <tr>
            <td>April</td>
            <td>00</td>
            <td>00</td>
        </tr> -->
<!--  -->

<!--  -->

<?php
$tdate = date('Y-m-d');
$tdate1 = date('Y-m-d',strtotime("-1 month"));
$tdate2 = date('Y-m-d',strtotime("-2 month"));
$tdate3 = date('Y-m-d',strtotime("-3 month"));
$tdate4 = date('Y-m-d',strtotime("-4 month"));
$tdate5 = date('Y-m-d',strtotime("-5 month"));
$tdate6 = date('Y-m-d',strtotime("-6 month"));
$tdate7 = date('Y-m-d',strtotime("-7 month"));
$tdate8 = date('Y-m-d',strtotime("-8 month"));
$tdate9 = date('Y-m-d',strtotime("-9 month"));
$tdate10 = date('Y-m-d',strtotime("-10 month"));
$tdate11 = date('Y-m-d',strtotime("-11 month"));
$tdate12 = date('Y-m-d',strtotime("-12 month"));


//  01 Month     *   *   *   Start
    // Cod Orders
$codorders = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND `Order_Type`='COD' AND MONTH(`Rec_Time_Date`) = MONTH('$tdate') AND YEAR(`Rec_Time_Date`) = YEAR('$tdate')";
$codordersrun = mysqli_query($conn, $codorders);
$codordersres = mysqli_fetch_assoc($codordersrun);
$codordersresis = $codordersres["count('Single_Order_Id')"];
// echo "<br>;";
    // Cod Orders
    // Prepaid Orders
$prepaidorders = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND `Order_Type`='Prepaid' AND MONTH(`Rec_Time_Date`) = MONTH('$tdate') AND YEAR(`Rec_Time_Date`) = YEAR('$tdate')";
$prepaidordersrun = mysqli_query($conn, $prepaidorders);
$prepaidordersres = mysqli_fetch_assoc($prepaidordersrun);
$prepaidordersresis = $prepaidordersres["count('Single_Order_Id')"];
// echo "&ensp;";
    // Prepaid Orders
    // Connection Stabilish
$currentmont = "SELECT count(DISTINCT(`awbno`)) FROM `spark_mis_report` WHERE MONTH(`pickupdate`) = MONTH('$tdate') AND YEAR(`pickupdate`) = YEAR('$tdate') ORDER BY `mis_id` DESC";
$currentmontrun = mysqli_query($conn, $currentmont);
$currentmontres = mysqli_fetch_assoc($currentmontrun);
$currentmontresis = $currentmontres["count(DISTINCT(`awbno`))"];
    // Connection Stabilish
//  01 Month     *   *   *   End


//  02 Month     *   *   *   Start
    // Cod Orders
$codorders2 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND `Order_Type`='COD' AND MONTH(`Rec_Time_Date`) = MONTH('$tdate1') AND YEAR(`Rec_Time_Date`) = YEAR('$tdate1')";
$codordersrun2 = mysqli_query($conn, $codorders2);
$codordersres2 = mysqli_fetch_assoc($codordersrun2);
$codordersresis2 = $codordersres2["count('Single_Order_Id')"];
// echo "<br>;";
    // Cod Orders
    // Prepaid Orders
$prepaidorders2 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND `Order_Type`='Prepaid' AND MONTH(`Rec_Time_Date`) = MONTH('$tdate1') AND YEAR(`Rec_Time_Date`) = YEAR('$tdate1')";
$prepaidordersrun2 = mysqli_query($conn, $prepaidorders2);
$prepaidordersres2 = mysqli_fetch_assoc($prepaidordersrun2);
$prepaidordersresis2 = $prepaidordersres2["count('Single_Order_Id')"];
// echo "&ensp;";
    // Prepaid Orders
    // Connection Stabilish
$currentmont2 = "SELECT count(DISTINCT(`awbno`)) FROM `spark_mis_report` WHERE MONTH(`pickupdate`) = MONTH('$tdate1') AND YEAR(`pickupdate`) = YEAR('$tdate1') ORDER BY `mis_id` DESC";
$currentmontrun2 = mysqli_query($conn, $currentmont2);
$currentmontres2 = mysqli_fetch_assoc($currentmontrun2);
$currentmontresis2 = $currentmontres2["count(DISTINCT(`awbno`))"];
    // Connection Stabilish
//  02 Month     *   *   *   End


//  03 Month     *   *   *   Start
    // Cod Orders
$codorders3 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND `Order_Type`='COD' AND MONTH(`Rec_Time_Date`) = MONTH('$tdate2') AND YEAR(`Rec_Time_Date`) = YEAR('$tdate2')";
$codordersrun3 = mysqli_query($conn, $codorders3);
$codordersres3 = mysqli_fetch_assoc($codordersrun3);
$codordersresis3 = $codordersres3["count('Single_Order_Id')"];
// echo "<br>;";
    // Cod Orders
    // Prepaid Orders
$prepaidorders3 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND `Order_Type`='Prepaid' AND MONTH(`Rec_Time_Date`) = MONTH('$tdate2') AND YEAR(`Rec_Time_Date`) = YEAR('$tdate2')";
$prepaidordersrun3 = mysqli_query($conn, $prepaidorders3);
$prepaidordersres3 = mysqli_fetch_assoc($prepaidordersrun3);
$prepaidordersresis3 = $prepaidordersres3["count('Single_Order_Id')"];
// echo "&ensp;";
    // Prepaid Orders
    // Connection Stabilish
$currentmont3 = "SELECT count(DISTINCT(`awbno`)) FROM `spark_mis_report` WHERE MONTH(`pickupdate`) = MONTH('$tdate2') AND YEAR(`pickupdate`) = YEAR('$tdate2') ORDER BY `mis_id` DESC";
$currentmontrun3 = mysqli_query($conn, $currentmont3);
$currentmontres3 = mysqli_fetch_assoc($currentmontrun3);
$currentmontresis3 = $currentmontres3["count(DISTINCT(`awbno`))"];
    // Connection Stabilish
//  03 Month     *   *   *   End


//  04 Month     *   *   *   Start
    // Cod Orders
$codorders4 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND `Order_Type`='COD' AND MONTH(`Rec_Time_Date`) = MONTH('$tdate3') AND YEAR(`Rec_Time_Date`) = YEAR('$tdate3')";
$codordersrun4 = mysqli_query($conn, $codorders4);
$codordersres4 = mysqli_fetch_assoc($codordersrun4);
$codordersresis4 = $codordersres4["count('Single_Order_Id')"];
// echo "<br>;";
    // Cod Orders
    // Prepaid Orders
$prepaidorders4 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND `Order_Type`='Prepaid' AND MONTH(`Rec_Time_Date`) = MONTH('$tdate3') AND YEAR(`Rec_Time_Date`) = YEAR('$tdate3')";
$prepaidordersrun4 = mysqli_query($conn, $prepaidorders4);
$prepaidordersres4 = mysqli_fetch_assoc($prepaidordersrun4);
$prepaidordersresis4 = $prepaidordersres4["count('Single_Order_Id')"];
// echo "&ensp;";
    // Prepaid Orders
    // Connection Stabilish
$currentmont4 = "SELECT count(DISTINCT(`awbno`)) FROM `spark_mis_report` WHERE MONTH(`pickupdate`) = MONTH('$tdate3') AND YEAR(`pickupdate`) = YEAR('$tdate3') ORDER BY `mis_id` DESC";
$currentmontrun4 = mysqli_query($conn, $currentmont4);
$currentmontres4 = mysqli_fetch_assoc($currentmontrun4);
$currentmontresis4 = $currentmontres4["count(DISTINCT(`awbno`))"];
    // Connection Stabilish
//  04 Month     *   *   *   End


//  05 Month     *   *   *   Start
    // Cod Orders
$codorders5 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND `Order_Type`='COD' AND MONTH(`Rec_Time_Date`) = MONTH('$tdate4') AND YEAR(`Rec_Time_Date`) = YEAR('$tdate4')";
$codordersrun5 = mysqli_query($conn, $codorders5);
$codordersres5 = mysqli_fetch_assoc($codordersrun5);
$codordersresis5 = $codordersres5["count('Single_Order_Id')"];
// echo "<br>;";
    // Cod Orders
    // Prepaid Orders
$prepaidorders5 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND `Order_Type`='Prepaid' AND MONTH(`Rec_Time_Date`) = MONTH('$tdate4') AND YEAR(`Rec_Time_Date`) = YEAR('$tdate4')";
$prepaidordersrun5 = mysqli_query($conn, $prepaidorders5);
$prepaidordersres5 = mysqli_fetch_assoc($prepaidordersrun5);
$prepaidordersresis5 = $prepaidordersres5["count('Single_Order_Id')"];
// echo "&ensp;";
    // Prepaid Orders
    // Connection Stabilish
$currentmont5 = "SELECT count(DISTINCT(`awbno`)) FROM `spark_mis_report` WHERE MONTH(`pickupdate`) = MONTH('$tdate4') AND YEAR(`pickupdate`) = YEAR('$tdate4') ORDER BY `mis_id` DESC";
$currentmontrun5 = mysqli_query($conn, $currentmont5);
$currentmontres5 = mysqli_fetch_assoc($currentmontrun5);
$currentmontresis5 = $currentmontres5["count(DISTINCT(`awbno`))"];
    // Connection Stabilish
//  05 Month     *   *   *   End


//  06 Month     *   *   *   Start
    // Cod Orders
$codorders6 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND `Order_Type`='COD' AND MONTH(`Rec_Time_Date`) = MONTH('$tdate5') AND YEAR(`Rec_Time_Date`) = YEAR('$tdate5')";
$codordersrun6 = mysqli_query($conn, $codorders6);
$codordersres6 = mysqli_fetch_assoc($codordersrun6);
$codordersresis6 = $codordersres6["count('Single_Order_Id')"];
// echo "<br>;";
    // Cod Orders
    // Prepaid Orders
$prepaidorders6 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND `Order_Type`='Prepaid' AND MONTH(`Rec_Time_Date`) = MONTH('$tdate5') AND YEAR(`Rec_Time_Date`) = YEAR('$tdate5')";
$prepaidordersrun6 = mysqli_query($conn, $prepaidorders6);
$prepaidordersres6 = mysqli_fetch_assoc($prepaidordersrun6);
$prepaidordersresis6 = $prepaidordersres6["count('Single_Order_Id')"];
// echo "&ensp;";
    // Prepaid Orders
//  06 Month     *   *   *   End


//  07 Month     *   *   *   Start
    // Cod Orders
$codorders7 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND `Order_Type`='COD' AND MONTH(`Rec_Time_Date`) = MONTH('$tdate6') AND YEAR(`Rec_Time_Date`) = YEAR('$tdate6')";
$codordersrun7 = mysqli_query($conn, $codorders7);
$codordersres7 = mysqli_fetch_assoc($codordersrun7);
$codordersresis7 = $codordersres7["count('Single_Order_Id')"];
// echo "<br>;";
    // Cod Orders
    // Prepaid Orders
$prepaidorders7 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND `Order_Type`='Prepaid' AND MONTH(`Rec_Time_Date`) = MONTH('$tdate6') AND YEAR(`Rec_Time_Date`) = YEAR('$tdate6')";
$prepaidordersrun7 = mysqli_query($conn, $prepaidorders7);
$prepaidordersres7 = mysqli_fetch_assoc($prepaidordersrun7);
$prepaidordersresis7 = $prepaidordersres7["count('Single_Order_Id')"];
// echo "&ensp;";
    // Prepaid Orders
//  07 Month     *   *   *   End


//  08 Month     *   *   *   Start
    // Cod Orders
$codorders8 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND `Order_Type`='COD' AND MONTH(`Rec_Time_Date`) = MONTH('$tdate7') AND YEAR(`Rec_Time_Date`) = YEAR('$tdate7')";
$codordersrun8 = mysqli_query($conn, $codorders8);
$codordersres8 = mysqli_fetch_assoc($codordersrun8);
$codordersresis8 = $codordersres8["count('Single_Order_Id')"];
// echo "<br>;";
    // Cod Orders
    // Prepaid Orders
$prepaidorders8 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND `Order_Type`='Prepaid' AND MONTH(`Rec_Time_Date`) = MONTH('$tdate7') AND YEAR(`Rec_Time_Date`) = YEAR('$tdate7')";
$prepaidordersrun8 = mysqli_query($conn, $prepaidorders8);
$prepaidordersres8 = mysqli_fetch_assoc($prepaidordersrun8);
$prepaidordersresis8 = $prepaidordersres8["count('Single_Order_Id')"];
// echo "&ensp;";
    // Prepaid Orders
//  08 Month     *   *   *   End


//  09 Month     *   *   *   Start
    // Cod Orders
$codorders9 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND `Order_Type`='COD' AND MONTH(`Rec_Time_Date`) = MONTH('$tdate8') AND YEAR(`Rec_Time_Date`) = YEAR('$tdate8')";
$codordersrun9 = mysqli_query($conn, $codorders9);
$codordersres9 = mysqli_fetch_assoc($codordersrun9);
$codordersresis9 = $codordersres9["count('Single_Order_Id')"];
// echo "<br>;";
    // Cod Orders
    // Prepaid Orders
$prepaidorders9 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND `Order_Type`='Prepaid' AND MONTH(`Rec_Time_Date`) = MONTH('$tdate8') AND YEAR(`Rec_Time_Date`) = YEAR('$tdate8')";
$prepaidordersrun9 = mysqli_query($conn, $prepaidorders9);
$prepaidordersres9 = mysqli_fetch_assoc($prepaidordersrun9);
$prepaidordersresis9 = $prepaidordersres9["count('Single_Order_Id')"];
// echo "&ensp;";
    // Prepaid Orders
//  9 Month     *   *   *   End


//  10 Month     *   *   *   Start
    // Cod Orders
$codorders10 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND `Order_Type`='COD' AND MONTH(`Rec_Time_Date`) = MONTH('$tdate9') AND YEAR(`Rec_Time_Date`) = YEAR('$tdate9')";
$codordersrun10 = mysqli_query($conn, $codorders10);
$codordersres10 = mysqli_fetch_assoc($codordersrun10);
$codordersresis10 = $codordersres10["count('Single_Order_Id')"];
// echo "<br>;";
    // Cod Orders
    // Prepaid Orders
$prepaidorders10 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND `Order_Type`='Prepaid' AND MONTH(`Rec_Time_Date`) = MONTH('$tdate9') AND YEAR(`Rec_Time_Date`) = YEAR('$tdate9')";
$prepaidordersrun10 = mysqli_query($conn, $prepaidorders10);
$prepaidordersres10 = mysqli_fetch_assoc($prepaidordersrun10);
$prepaidordersresis10 = $prepaidordersres10["count('Single_Order_Id')"];
// echo "&ensp;";
    // Prepaid Orders
//  10 Month     *   *   *   End


//  11 Month     *   *   *   Start
    // Cod Orders
$codorders11 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND `Order_Type`='COD' AND MONTH(`Rec_Time_Date`) = MONTH('$tdate10') AND YEAR(`Rec_Time_Date`) = YEAR('$tdate10')";
$codordersrun11 = mysqli_query($conn, $codorders11);
$codordersres11 = mysqli_fetch_assoc($codordersrun11);
$codordersresis11 = $codordersres11["count('Single_Order_Id')"];
// echo "<br>;";
    // Cod Orders
    // Prepaid Orders
$prepaidorders11 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND `Order_Type`='Prepaid' AND MONTH(`Rec_Time_Date`) = MONTH('$tdate10') AND YEAR(`Rec_Time_Date`) = YEAR('$tdate10')";
$prepaidordersrun11 = mysqli_query($conn, $prepaidorders11);
$prepaidordersres11 = mysqli_fetch_assoc($prepaidordersrun11);
$prepaidordersresis11 = $prepaidordersres11["count('Single_Order_Id')"];
// echo "&ensp;";
    // Prepaid Orders
//  11 Month     *   *   *   End


//  12 Month     *   *   *   Start
    // Cod Orders
$codorders12 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND `Order_Type`='COD' AND MONTH(`Rec_Time_Date`) = MONTH('$tdate11') AND YEAR(`Rec_Time_Date`) = YEAR('$tdate11')";
$codordersrun12 = mysqli_query($conn, $codorders12);
$codordersres12 = mysqli_fetch_assoc($codordersrun12);
$codordersresis12 = $codordersres12["count('Single_Order_Id')"];
// echo "<br>;";
    // Cod Orders
    // Prepaid Orders
$prepaidorders12 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND `Order_Type`='Prepaid' AND MONTH(`Rec_Time_Date`) = MONTH('$tdate11') AND YEAR(`Rec_Time_Date`) = YEAR('$tdate11')";
$prepaidordersrun12 = mysqli_query($conn, $prepaidorders12);
$prepaidordersres12 = mysqli_fetch_assoc($prepaidordersrun12);
$prepaidordersresis12 = $prepaidordersres12["count('Single_Order_Id')"];
// echo "&ensp;";
    // Prepaid Orders
//  12 Month     *   *   *   End
?>

<tr>
    <td><?= $tdate1 = date('M - Y'); ?></td>
    <td><?= $tmonth1 = $codordersresis + $prepaidordersresis ?></td>
    <td><?= $currentmontresis ?></td>
</tr>
<tr>
    <td><?= $tdate2 = date('M - Y',strtotime("-1 month")); ?></td>
    <td><?= $tmonth2 = $codordersresis2 + $prepaidordersresis2 ?></td>
    <td><?= $currentmontresis2 ?></td>
</tr>
<tr>
    <td><?= $tdate3 = date('M - Y',strtotime("-2 month")); ?></td>
    <td><?= $tmonth3 = $codordersresis3 + $prepaidordersresis3 ?></td>
    <td><?= $currentmontresis3 ?></td>
</tr>
<tr>
    <td><?= $tdate4 = date('M - Y',strtotime("-3 month")); ?></td>
    <td><?= $tmonth4 = $codordersresis4 + $prepaidordersresis4 ?></td>
    <td><?= $currentmontresis4 ?></td>
</tr>
<tr>
    <td><?= $tdate5 = date('M - Y',strtotime("-4 month")); ?></td>
    <td><?= $tmonth5 = $codordersresis5 + $prepaidordersresis5 ?></td>
    <td><?= $currentmontresis5 ?></td>
</tr>
<!-- <tr>
    <td><?= $tdate6 = date('M - Y',strtotime("-5 month")); ?></td>
    <td><?= $codordersresis6 ?></td>
    <td><?= $prepaidordersresis6 ?></td>
    <td><?= $tmonth6 = $codordersresis6 + $prepaidordersresis6 ?></td>
</tr>
<tr>
    <td><?= $tdate7 = date('M - Y',strtotime("-6 month")); ?></td>
    <td><?= $codordersresis7 ?></td>
    <td><?= $prepaidordersresis7 ?></td>
    <td><?= $tmonth7 = $codordersresis7 + $prepaidordersresis7 ?></td>
</tr>
<tr>
    <td><?= $tdate8 = date('M - Y',strtotime("-7 month")); ?></td>
    <td><?= $codordersresis8 ?></td>
    <td><?= $prepaidordersresis8 ?></td>
    <td><?= $tmonth8 = $codordersresis8 + $prepaidordersresis8 ?></td>
</tr>
<tr>
    <td><?= $tdate9 = date('M - Y',strtotime("-8 month")); ?></td>
    <td><?= $codordersresis9 ?></td>
    <td><?= $prepaidordersresis9 ?></td>
    <td><?= $tmonth9 = $codordersresis9 + $prepaidordersresis9 ?></td>
</tr>
<tr>
    <td><?= $tdate10 = date('M - Y',strtotime("-9 month")); ?></td>
    <td><?= $codordersresis10 ?></td>
    <td><?= $prepaidordersresis10 ?></td>
    <td><?= $tmonth10 = $codordersresis10 + $prepaidordersresis10 ?></td>
</tr>
<tr>
    <td><?= $tdate11 = date('M - Y',strtotime("-10 month")); ?></td>
    <td><?= $codordersresis11 ?></td>
    <td><?= $prepaidordersresis11 ?></td>
    <td><?= $tmonth11 = $codordersresis11 + $prepaidordersresis11 ?></td>
</tr>
<tr>
    <td><?= $tdate12 = date('M - Y',strtotime("-11 month")); ?></td>
    <td><?= $codordersresis12 ?></td>
    <td><?= $prepaidordersresis12 ?></td>
    <td><?= $tmonth12 = $codordersresis12 + $prepaidordersresis12 ?></td>
</tr> -->
<!--  -->
<!--  -->
    </tbody>
  </table>
</div>
<!--<h5 class="text-center"><u><b><a href="ABooking&Connection_CMonth.php">Current Month View All</a></b></u></h5>-->
</div>
</div>
<div class="col-sm-6">
<div class="white-box">
<span style="color:black;font-weight:400"><center>Current Month Booking</center></span>
<div class="table-responsive color-bordered-table muted-bordered-table fontweigh">
  <table class="table">
    <thead>
      <tr>
        <th title="Current Dates">Date</th>
        <th title="Booking Count">Booking</th>
        <th title="Connection Count">Connection</th>
      </tr>
    </thead>
    <tbody>
<!--          <tr>
            <td>11/08/211</td>
            <td>010</td>
            <td>010</td>
        </tr>
        <tr>
            <td>101/08/21</td>
            <td>001</td>
            <td>010</td>
        </tr>
        <tr>
            <td>09/08/21</td>
            <td>00</td>
            <td>00</td>
        </tr>
        <tr>
            <td>08/08/21</td>
            <td>00</td>
            <td>00</td>
        </tr>
        <tr>
            <td>07/08/21</td>
            <td>00</td>
            <td>00</td>
        </tr> -->
<!--  -->
<!--  -->
<?php
$tdate = date('Y-m-d');
$tdate1 = date('Y-m-d',strtotime("-1 day"));
$tdate2 = date('Y-m-d',strtotime("-2 day"));
$tdate3 = date('Y-m-d',strtotime("-3 day"));
$tdate4 = date('Y-m-d',strtotime("-4 day"));
$tdate5 = date('Y-m-d',strtotime("-5 day"));
$tdate6 = date('Y-m-d',strtotime("-6 day"));
$tdate7 = date('Y-m-d',strtotime("-7 day"));
$tdate8 = date('Y-m-d',strtotime("-8 day"));
$tdate9 = date('Y-m-d',strtotime("-9 day"));
$tdate10 = date('Y-m-d',strtotime("-10 day"));
$tdate11 = date('Y-m-d',strtotime("-11 day"));
$tdate12 = date('Y-m-d',strtotime("-12 day"));


//  01 DAY     *   *   *   Start
    // Cod Orders
$codorders = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND `Order_Type`='COD' AND DAY(`Rec_Time_Date`) = DAY('$tdate') AND MONTH(`Rec_Time_Date`) = MONTH('$tdate') AND YEAR(`Rec_Time_Date`) = YEAR('$tdate')";
$codordersrun = mysqli_query($conn, $codorders);
$codordersres = mysqli_fetch_assoc($codordersrun);
$codordersresis = $codordersres["count('Single_Order_Id')"];
// echo "<br>;";
    // Cod Orders
    // Prepaid Orders
$prepaidorders = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND `Order_Type`='Prepaid' AND DAY(`Rec_Time_Date`) = DAY('$tdate') AND MONTH(`Rec_Time_Date`) = MONTH('$tdate') AND YEAR(`Rec_Time_Date`) = YEAR('$tdate')";
$prepaidordersrun = mysqli_query($conn, $prepaidorders);
$prepaidordersres = mysqli_fetch_assoc($prepaidordersrun);
$prepaidordersresis = $prepaidordersres["count('Single_Order_Id')"];
// echo "&ensp;";
    // Prepaid Orders
    // Connection Stabilish
$currentmont = "SELECT count(DISTINCT(`awbno`)) FROM `spark_mis_report` WHERE DAY(`pickupdate`) = DAY('$tdate') AND MONTH(`pickupdate`) = MONTH('$tdate') AND YEAR(`pickupdate`) = YEAR('$tdate') ORDER BY `mis_id` DESC";
$currentmontrun = mysqli_query($conn, $currentmont);
$currentmontres = mysqli_fetch_assoc($currentmontrun);
$currentmontresis = $currentmontres["count(DISTINCT(`awbno`))"];
    // Connection Stabilish
//  01 DAY     *   *   *   End


//  02 DAY     *   *   *   Start
    // Cod Orders
$codorders2 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND `Order_Type`='COD' AND DAY(`Rec_Time_Date`) = DAY('$tdate1') AND MONTH(`Rec_Time_Date`) = MONTH('$tdate1') AND YEAR(`Rec_Time_Date`) = YEAR('$tdate1')";
$codordersrun2 = mysqli_query($conn, $codorders2);
$codordersres2 = mysqli_fetch_assoc($codordersrun2);
$codordersresis2 = $codordersres2["count('Single_Order_Id')"];
// echo "<br>;";
    // Cod Orders
    // Prepaid Orders
$prepaidorders2 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND `Order_Type`='Prepaid' AND DAY(`Rec_Time_Date`) = DAY('$tdate1') AND MONTH(`Rec_Time_Date`) = MONTH('$tdate1') AND YEAR(`Rec_Time_Date`) = YEAR('$tdate1')";
$prepaidordersrun2 = mysqli_query($conn, $prepaidorders2);
$prepaidordersres2 = mysqli_fetch_assoc($prepaidordersrun2);
$prepaidordersresis2 = $prepaidordersres2["count('Single_Order_Id')"];
// echo "&ensp;";
    // Prepaid Orders
    // Connection Stabilish
$currentmont2 = "SELECT count(DISTINCT(`awbno`)) FROM `spark_mis_report` WHERE DAY(`pickupdate`) = DAY('$tdate1') AND MONTH(`pickupdate`) = MONTH('$tdate1') AND YEAR(`pickupdate`) = YEAR('$tdate1') ORDER BY `mis_id` DESC";
$currentmontrun2 = mysqli_query($conn, $currentmont2);
$currentmontres2 = mysqli_fetch_assoc($currentmontrun2);
$currentmontresis2 = $currentmontres2["count(DISTINCT(`awbno`))"];
    // Connection Stabilish
//  02 DAY     *   *   *   End


//  03 DAY     *   *   *   Start
    // Cod Orders
$codorders3 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND `Order_Type`='COD' AND DAY(`Rec_Time_Date`) = DAY('$tdate2') AND MONTH(`Rec_Time_Date`) = MONTH('$tdate2') AND YEAR(`Rec_Time_Date`) = YEAR('$tdate2')";
$codordersrun3 = mysqli_query($conn, $codorders3);
$codordersres3 = mysqli_fetch_assoc($codordersrun3);
$codordersresis3 = $codordersres3["count('Single_Order_Id')"];
// echo "<br>;";
    // Cod Orders
    // Prepaid Orders
$prepaidorders3 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND `Order_Type`='Prepaid' AND DAY(`Rec_Time_Date`) = DAY('$tdate2') AND MONTH(`Rec_Time_Date`) = MONTH('$tdate2') AND YEAR(`Rec_Time_Date`) = YEAR('$tdate2')";
$prepaidordersrun3 = mysqli_query($conn, $prepaidorders3);
$prepaidordersres3 = mysqli_fetch_assoc($prepaidordersrun3);
$prepaidordersresis3 = $prepaidordersres3["count('Single_Order_Id')"];
// echo "&ensp;";
    // Prepaid Orders
    // Connection Stabilish
$currentmont3 = "SELECT count(DISTINCT(`awbno`)) FROM `spark_mis_report` WHERE DAY(`pickupdate`) = DAY('$tdate2') AND MONTH(`pickupdate`) = MONTH('$tdate2') AND YEAR(`pickupdate`) = YEAR('$tdate2') ORDER BY `mis_id` DESC";
$currentmontrun3 = mysqli_query($conn, $currentmont3);
$currentmontres3 = mysqli_fetch_assoc($currentmontrun3);
$currentmontresis3 = $currentmontres3["count(DISTINCT(`awbno`))"];
    // Connection Stabilish
//  03 DAY     *   *   *   End


//  04 DAY     *   *   *   Start
    // Cod Orders
$codorders4 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND `Order_Type`='COD' AND DAY(`Rec_Time_Date`) = DAY('$tdate3') AND MONTH(`Rec_Time_Date`) = MONTH('$tdate3') AND YEAR(`Rec_Time_Date`) = YEAR('$tdate3')";
$codordersrun4 = mysqli_query($conn, $codorders4);
$codordersres4 = mysqli_fetch_assoc($codordersrun4);
$codordersresis4 = $codordersres4["count('Single_Order_Id')"];
// echo "<br>;";
    // Cod Orders
    // Prepaid Orders
$prepaidorders4 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND `Order_Type`='Prepaid' AND DAY(`Rec_Time_Date`) = DAY('$tdate3') AND MONTH(`Rec_Time_Date`) = MONTH('$tdate3') AND YEAR(`Rec_Time_Date`) = YEAR('$tdate3')";
$prepaidordersrun4 = mysqli_query($conn, $prepaidorders4);
$prepaidordersres4 = mysqli_fetch_assoc($prepaidordersrun4);
$prepaidordersresis4 = $prepaidordersres4["count('Single_Order_Id')"];
// echo "&ensp;";
    // Prepaid Orders
    // Connection Stabilish
$currentmont4 = "SELECT count(DISTINCT(`awbno`)) FROM `spark_mis_report` WHERE DAY(`pickupdate`) = DAY('$tdate3') AND MONTH(`pickupdate`) = MONTH('$tdate3') AND YEAR(`pickupdate`) = YEAR('$tdate3') ORDER BY `mis_id` DESC";
$currentmontrun4 = mysqli_query($conn, $currentmont4);
$currentmontres4 = mysqli_fetch_assoc($currentmontrun4);
$currentmontresis4 = $currentmontres4["count(DISTINCT(`awbno`))"];
// echo "<br>";
    // Connection Stabilish
//  04 DAY     *   *   *   End


//  05 DAY     *   *   *   Start
    // Cod Orders
$codorders5 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND `Order_Type`='COD' AND DAY(`Rec_Time_Date`) = DAY('$tdate4') AND MONTH(`Rec_Time_Date`) = MONTH('$tdate4') AND YEAR(`Rec_Time_Date`) = YEAR('$tdate4')";
$codordersrun5 = mysqli_query($conn, $codorders5);
$codordersres5 = mysqli_fetch_assoc($codordersrun5);
$codordersresis5 = $codordersres5["count('Single_Order_Id')"];
// echo "<br>;";
    // Cod Orders
    // Prepaid Orders
$prepaidorders5 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND `Order_Type`='Prepaid' AND DAY(`Rec_Time_Date`) = DAY('$tdate4') AND MONTH(`Rec_Time_Date`) = MONTH('$tdate4') AND YEAR(`Rec_Time_Date`) = YEAR('$tdate4')";
$prepaidordersrun5 = mysqli_query($conn, $prepaidorders5);
$prepaidordersres5 = mysqli_fetch_assoc($prepaidordersrun5);
$prepaidordersresis5 = $prepaidordersres5["count('Single_Order_Id')"];
// echo "&ensp;";
    // Prepaid Orders
    // Connection Stabilish
$currentmont5 = "SELECT count(DISTINCT(`awbno`)) FROM `spark_mis_report` WHERE DAY(`pickupdate`) = DAY('$tdate4') AND MONTH(`pickupdate`) = MONTH('$tdate4') AND YEAR(`pickupdate`) = YEAR('$tdate4') ORDER BY `mis_id` DESC";
$currentmontrun5 = mysqli_query($conn, $currentmont5);
$currentmontres5 = mysqli_fetch_assoc($currentmontrun5);
$currentmontresis5 = $currentmontres5["count(DISTINCT(`awbno`))"];
    // Connection Stabilish
//  05 DAY     *   *   *   End


//  06 DAY     *   *   *   Start
    // Cod Orders
$codorders6 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND `Order_Type`='COD' AND DAY(`Rec_Time_Date`) = DAY('$tdate5') AND MONTH(`Rec_Time_Date`) = MONTH('$tdate5') AND YEAR(`Rec_Time_Date`) = YEAR('$tdate5')";
$codordersrun6 = mysqli_query($conn, $codorders6);
$codordersres6 = mysqli_fetch_assoc($codordersrun6);
$codordersresis6 = $codordersres6["count('Single_Order_Id')"];
// echo "<br>;";
    // Cod Orders
    // Prepaid Orders
$prepaidorders6 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND `Order_Type`='Prepaid' AND DAY(`Rec_Time_Date`) = DAY('$tdate5') AND MONTH(`Rec_Time_Date`) = MONTH('$tdate5') AND YEAR(`Rec_Time_Date`) = YEAR('$tdate5')";
$prepaidordersrun6 = mysqli_query($conn, $prepaidorders6);
$prepaidordersres6 = mysqli_fetch_assoc($prepaidordersrun6);
$prepaidordersresis6 = $prepaidordersres6["count('Single_Order_Id')"];
// echo "&ensp;";
    // Prepaid Orders
//  06 DAY     *   *   *   End


//  07 DAY     *   *   *   Start
    // Cod Orders
$codorders7 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND `Order_Type`='COD' AND DAY(`Rec_Time_Date`) = DAY('$tdate6') AND MONTH(`Rec_Time_Date`) = MONTH('$tdate6') AND YEAR(`Rec_Time_Date`) = YEAR('$tdate6')";
$codordersrun7 = mysqli_query($conn, $codorders7);
$codordersres7 = mysqli_fetch_assoc($codordersrun7);
$codordersresis7 = $codordersres7["count('Single_Order_Id')"];
// echo "<br>;";
    // Cod Orders
    // Prepaid Orders
$prepaidorders7 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND `Order_Type`='Prepaid' AND DAY(`Rec_Time_Date`) = DAY('$tdate6') AND MONTH(`Rec_Time_Date`) = MONTH('$tdate6') AND YEAR(`Rec_Time_Date`) = YEAR('$tdate6')";
$prepaidordersrun7 = mysqli_query($conn, $prepaidorders7);
$prepaidordersres7 = mysqli_fetch_assoc($prepaidordersrun7);
$prepaidordersresis7 = $prepaidordersres7["count('Single_Order_Id')"];
// echo "&ensp;";
    // Prepaid Orders
//  07 DAY     *   *   *   End


//  08 DAY     *   *   *   Start
    // Cod Orders
$codorders8 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND `Order_Type`='COD' AND DAY(`Rec_Time_Date`) = DAY('$tdate7') AND MONTH(`Rec_Time_Date`) = MONTH('$tdate7') AND YEAR(`Rec_Time_Date`) = YEAR('$tdate7')";
$codordersrun8 = mysqli_query($conn, $codorders8);
$codordersres8 = mysqli_fetch_assoc($codordersrun8);
$codordersresis8 = $codordersres8["count('Single_Order_Id')"];
// echo "<br>;";
    // Cod Orders
    // Prepaid Orders
$prepaidorders8 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND `Order_Type`='Prepaid' AND DAY(`Rec_Time_Date`) = DAY('$tdate7') AND MONTH(`Rec_Time_Date`) = MONTH('$tdate7') AND YEAR(`Rec_Time_Date`) = YEAR('$tdate7')";
$prepaidordersrun8 = mysqli_query($conn, $prepaidorders8);
$prepaidordersres8 = mysqli_fetch_assoc($prepaidordersrun8);
$prepaidordersresis8 = $prepaidordersres8["count('Single_Order_Id')"];
// echo "&ensp;";
    // Prepaid Orders
//  08 DAY     *   *   *   End


//  09 DAY     *   *   *   Start
    // Cod Orders
$codorders9 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND `Order_Type`='COD' AND DAY(`Rec_Time_Date`) = DAY('$tdate8') AND MONTH(`Rec_Time_Date`) = MONTH('$tdate8') AND YEAR(`Rec_Time_Date`) = YEAR('$tdate8')";
$codordersrun9 = mysqli_query($conn, $codorders9);
$codordersres9 = mysqli_fetch_assoc($codordersrun9);
$codordersresis9 = $codordersres9["count('Single_Order_Id')"];
// echo "<br>;";
    // Cod Orders
    // Prepaid Orders
$prepaidorders9 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND `Order_Type`='Prepaid' AND DAY(`Rec_Time_Date`) = DAY('$tdate8') AND MONTH(`Rec_Time_Date`) = MONTH('$tdate8') AND YEAR(`Rec_Time_Date`) = YEAR('$tdate8')";
$prepaidordersrun9 = mysqli_query($conn, $prepaidorders9);
$prepaidordersres9 = mysqli_fetch_assoc($prepaidordersrun9);
$prepaidordersresis9 = $prepaidordersres9["count('Single_Order_Id')"];
// echo "&ensp;";
    // Prepaid Orders
//  9 DAY     *   *   *   End


//  10 DAY     *   *   *   Start
    // Cod Orders
$codorders10 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND `Order_Type`='COD' AND DAY(`Rec_Time_Date`) = DAY('$tdate9') AND MONTH(`Rec_Time_Date`) = MONTH('$tdate9') AND YEAR(`Rec_Time_Date`) = YEAR('$tdate9')";
$codordersrun10 = mysqli_query($conn, $codorders10);
$codordersres10 = mysqli_fetch_assoc($codordersrun10);
$codordersresis10 = $codordersres10["count('Single_Order_Id')"];
// echo "<br>;";
    // Cod Orders
    // Prepaid Orders
$prepaidorders10 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND `Order_Type`='Prepaid' AND DAY(`Rec_Time_Date`) = DAY('$tdate9') AND MONTH(`Rec_Time_Date`) = MONTH('$tdate9') AND YEAR(`Rec_Time_Date`) = YEAR('$tdate9')";
$prepaidordersrun10 = mysqli_query($conn, $prepaidorders10);
$prepaidordersres10 = mysqli_fetch_assoc($prepaidordersrun10);
$prepaidordersresis10 = $prepaidordersres10["count('Single_Order_Id')"];
// echo "&ensp;";
    // Prepaid Orders
//  10 DAY     *   *   *   End


//  11 DAY     *   *   *   Start
    // Cod Orders
$codorders11 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND `Order_Type`='COD' AND DAY(`Rec_Time_Date`) = DAY('$tdate10') AND MONTH(`Rec_Time_Date`) = MONTH('$tdate10') AND YEAR(`Rec_Time_Date`) = YEAR('$tdate10')";
$codordersrun11 = mysqli_query($conn, $codorders11);
$codordersres11 = mysqli_fetch_assoc($codordersrun11);
$codordersresis11 = $codordersres11["count('Single_Order_Id')"];
// echo "<br>;";
    // Cod Orders
    // Prepaid Orders
$prepaidorders11 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND `Order_Type`='Prepaid' AND DAY(`Rec_Time_Date`) = DAY('$tdate10') AND MONTH(`Rec_Time_Date`) = MONTH('$tdate10') AND YEAR(`Rec_Time_Date`) = YEAR('$tdate10')";
$prepaidordersrun11 = mysqli_query($conn, $prepaidorders11);
$prepaidordersres11 = mysqli_fetch_assoc($prepaidordersrun11);
$prepaidordersresis11 = $prepaidordersres11["count('Single_Order_Id')"];
// echo "&ensp;";
    // Prepaid Orders
//  11 DAY     *   *   *   End


//  12 DAY     *   *   *   Start
    // Cod Orders
$codorders12 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND `Order_Type`='COD' AND DAY(`Rec_Time_Date`) = DAY('$tdate11') AND MONTH(`Rec_Time_Date`) = MONTH('$tdate11') AND YEAR(`Rec_Time_Date`) = YEAR('$tdate11')";
$codordersrun12 = mysqli_query($conn, $codorders12);
$codordersres12 = mysqli_fetch_assoc($codordersrun12);
$codordersresis12 = $codordersres12["count('Single_Order_Id')"];
// echo "<br>;";
    // Cod Orders
    // Prepaid Orders
$prepaidorders12 = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `Awb_Number`!='' AND `Order_Type`='Prepaid' AND DAY(`Rec_Time_Date`) = DAY('$tdate11') AND MONTH(`Rec_Time_Date`) = MONTH('$tdate11') AND YEAR(`Rec_Time_Date`) = YEAR('$tdate11')";
$prepaidordersrun12 = mysqli_query($conn, $prepaidorders12);
$prepaidordersres12 = mysqli_fetch_assoc($prepaidordersrun12);
$prepaidordersresis12 = $prepaidordersres12["count('Single_Order_Id')"];
// echo "&ensp;";
    // Prepaid Orders
//  12 DAY     *   *   *   End
?>

<tr>
    <td><?= $tdate1 = date('d-M-y'); ?></td>
    <td><?= $tmonth1 = $codordersresis + $prepaidordersresis ?></td>
    <td><?= $currentmontresis ?></td>
</tr>
<tr>
    <td><?= $tdate2 = date('d-M-y',strtotime("-1 day")); ?></td>
    <td><?= $tmonth2 = $codordersresis2 + $prepaidordersresis2 ?></td>
    <td><?= $currentmontresis2 ?></td>
</tr>
<tr>
    <td><?= $tdate3 = date('d-M-y',strtotime("-2 day")); ?></td>
    <td><?= $tmonth3 = $codordersresis3 + $prepaidordersresis3 ?></td>
    <td><?= $currentmontresis3 ?></td>
</tr>
<tr>
    <td><?= $tdate4 = date('d-M-y',strtotime("-3 day")); ?></td>
    <td><?= $tmonth4 = $codordersresis4 + $prepaidordersresis4 ?></td>
    <td><?= $currentmontresis4 ?></td>
</tr>
<tr>
    <td><?= $tdate5 = date('d-M-y',strtotime("-4 day")); ?></td>
    <td><?= $tmonth5 = $codordersresis5 + $prepaidordersresis5 ?></td>
    <td><?= $currentmontresis5 ?></td>
</tr>
<!-- <tr>
    <td><?= $tdate6 = date('d-M-y',strtotime("-5 day")); ?></td>
    <td><?= $codordersresis6 ?></td>
    <td><?= $prepaidordersresis6 ?></td>
    <td><?= $tmonth6 = $codordersresis6 + $prepaidordersresis6 ?></td>
</tr>
<tr>
    <td><?= $tdate7 = date('d-M-y',strtotime("-6 day")); ?></td>
    <td><?= $codordersresis7 ?></td>
    <td><?= $prepaidordersresis7 ?></td>
    <td><?= $tmonth7 = $codordersresis7 + $prepaidordersresis7 ?></td>
</tr>
<tr>
    <td><?= $tdate8 = date('d-M-y',strtotime("-7 day")); ?></td>
    <td><?= $codordersresis8 ?></td>
    <td><?= $prepaidordersresis8 ?></td>
    <td><?= $tmonth8 = $codordersresis8 + $prepaidordersresis8 ?></td>
</tr>
<tr>
    <td><?= $tdate9 = date('d-M-y',strtotime("-8 day")); ?></td>
    <td><?= $codordersresis9 ?></td>
    <td><?= $prepaidordersresis9 ?></td>
    <td><?= $tmonth9 = $codordersresis9 + $prepaidordersresis9 ?></td>
</tr>
<tr>
    <td><?= $tdate10 = date('d-M-y',strtotime("-9 day")); ?></td>
    <td><?= $codordersresis10 ?></td>
    <td><?= $prepaidordersresis10 ?></td>
    <td><?= $tmonth10 = $codordersresis10 + $prepaidordersresis10 ?></td>
</tr>
<tr>
    <td><?= $tdate11 = date('d-M-y',strtotime("-10 day")); ?></td>
    <td><?= $codordersresis11 ?></td>
    <td><?= $prepaidordersresis11 ?></td>
    <td><?= $tmonth11 = $codordersresis11 + $prepaidordersresis11 ?></td>
</tr>
<tr>
    <td><?= $tdate12 = date('d-M-y',strtotime("-11 day")); ?></td>
    <td><?= $codordersresis12 ?></td>
    <td><?= $prepaidordersresis12 ?></td>
    <td><?= $tmonth12 = $codordersresis12 + $prepaidordersresis12 ?></td>
</tr> -->
<!--  -->
<!--  -->
    </tbody>
  </table>
</div>
<!--<h5 class="text-center"><u><b><a href="ABooking&Connection_Month.php">Month Wise View All</a></b></u></h5>-->
</div>
</div>
</div>
<!-- /.row -->
