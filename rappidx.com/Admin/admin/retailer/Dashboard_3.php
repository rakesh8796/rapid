<?php
include "Layout_Header.php";
?>

<!-- Page Content -->



<style>
/*div.card {
  width: 250px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  text-align: center;
}*/
.white-box{
  padding:15px !important;
  border-radius:10px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19) !important;
}
.fontweigh{
    font-weight:900 !important;
}
body{
  background-color:#EAEEF2 !important;
}
</style>





















<div class="col-md-12" style="background-color:#EAEEF2 !important;">
<div class="row">
    <!-- *  *   *   *   *   Download Functions  *   *   *   *   *    -->
<!-- <div class="container-fluid"> -->
<div class="">
<div class="col-md-1"></div>
<div class="col-md-2 text-center">
    <strong>Filter</strong>
</div>
<div class="col-md-2 text-left">
    <select class="" onchange="ManageOrders(this.value)" style="border-radius:20px">
        <option value="0">- - - Select - - -</option>
        <option value="TodayDay" selected="">Today</option>
        <option value="Last7Days">Last 7 Days</option>
        <option value="Last30Days">Last 30 Days</option>
        <option value="Last90Days">Last 90 Days</option>
        <!--<option value="CustomOrdersIs">Custom Date Range</option>-->
    </select>
</div>
<div class="col-md-7 text-left">
</div>

<?php
    $stdate = date("d-m-Y");
    $e7days = date('d-m-Y',strtotime("-7 Days"));
    $e30days = date('d-m-Y',strtotime("-30 Days"));
    $e90days = date('d-m-Y',strtotime("-90 Days"));
?>

<input type="hidden" name="todaydatecal" id="todaydatecal" value="<?= $stdate ?>">
<input type="hidden" name="last7dayscal" id="last7dayscal" value="<?= $e7days ?>">
<input type="hidden" name="last30dayscal" id="last30dayscal" value="<?= $e30days ?>">
<input type="hidden" name="last90dayscal" id="last90dayscal" value="<?= $e90days ?>">

<script type="text/javascript">
function ManageOrders(val){
    // alert(val);
    if(val == "TodayDay"){
        var enddatefrom = $("#todaydatecal").val();
        var startdatefrom = $("#todaydatecal").val();
        $.ajax({
        type: "GET",
        url: 'Dashboard/Dashboard.php',
        data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom,val:"Todays "},
        success: function (data){
          $("#All_Records").html(data);
        },
        error: function (data) {
          console.log('Error:', data);
        }
        });
        $.ajax({
        type: "GET",
        url: 'Dashboard/Dashboard.php',
        data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom,val:"Todays "},
        success: function (data){
          $("#All_Records").html(data);
        },
        error: function (data) {
          console.log('Error:', data);
        }
        });
        
        $.ajax({
        type: "GET",
        url: 'Dashboard/Dashboard.php',
        data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom,val:"Todays "},
        success: function (data){
          $("#All_Records").html(data);
        },
        error: function (data) {
          console.log('Error:', data);
        }
        });
    }
    if(val == "Last7Days"){
        var enddatefrom = $("#todaydatecal").val();
        var startdatefrom = $("#last7dayscal").val();
        $.ajax({
        type: "GET",
        url: 'Dashboard/Dashboard.php',
        data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom,val:"7 Days"},
        success: function (data){
          $("#All_Records").html(data);
        },
        error: function (data) {
          console.log('Error:', data);
        }
        });
        $.ajax({
        type: "GET",
        url: 'Dashboard/Dashboard.php',
        data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom,val:"7 Days"},
        success: function (data){
          $("#All_Records").html(data);
        },
        error: function (data) {
          console.log('Error:', data);
        }
        });
        $.ajax({
        type: "GET",
        url: 'Dashboard/Dashboard.php',
        data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom,val:"7 Days"},
        success: function (data){
          $("#All_Records").html(data);
        },
        error: function (data) {
          console.log('Error:', data);
        }
        });
    }
    if(val == "Last30Days"){
        var enddatefrom = $("#todaydatecal").val();
        var startdatefrom = $("#last30dayscal").val();
        $.ajax({
        type: "GET",
        url: 'Dashboard/Dashboard.php',
        data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom,val:"30 Days"},
        success: function (data){
          $("#All_Records").html(data);
        },
        error: function (data) {
          console.log('Error:', data);
        }
        });
        $.ajax({
        type: "GET",
        url: 'Dashboard/Dashboard.php',
        data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom,val:"30 Days"},
        success: function (data){
          $("#All_Records").html(data);
        },
        error: function (data) {
          console.log('Error:', data);
        }
        });
        $.ajax({
        type: "GET",
        url: 'Dashboard/Dashboard.php',
        data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom,val:"30 Days"},
        success: function (data){
          $("#All_Records").html(data);
        },
        error: function (data) {
          console.log('Error:', data);
        }
        });
    }
    if(val == "Last90Days"){
        var enddatefrom = $("#todaydatecal").val();
        var startdatefrom = $("#last90dayscal").val();
        $.ajax({
        type: "GET",
        url: 'Dashboard/Dashboard.php',
        data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom,val:"90 Days"},
        success: function (data){
          $("#All_Records").html(data);
        },
        error: function (data) {
          console.log('Error:', data);
        }
        });
        $.ajax({
        type: "GET",
        url: 'Dashboard/Dashboard.php',
        data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom,val:"90 Days"},
        success: function (data){
          $("#All_Records").html(data);
        },
        error: function (data) {
          console.log('Error:', data);
        }
        });
        $.ajax({
        type: "GET",
        url: 'Dashboard/Dashboard.php',
        data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom,val:"90 Days"},
        success: function (data){
          $("#All_Records").html(data);
        },
        error: function (data) {
          console.log('Error:', data);
        }
        });
    }
    if(val == "CustomOrdersIs"){
        $("#All_Records").html("<br><center><h4>Loading...<h4></center>");
    }
}
</script>


</div>
</div>
<!-- *  *   *   *   *   //Download Functions  *   *   *   *   *    -->
</div>


<div class="col-md-12" id="All_Records" style="background-color:#EAEEF2 !important;">
<!-- Default Today Details -->

    <!--  --><!--  -->
    <?php
    $stdate = date("d-m-Y");
    // echo $startdatefrom = date('Y-m-d',strtotime($startdatefrom));
    // echo "<br>";
    // echo $enddatefrom = date('Y-m-d',strtotime($enddatefrom));

    // echo $startdatefrom = "2021-05-01";
    // echo "<br>";
    // echo $enddatefrom = "2021-08-13";

    $startdatefrom = date('Y-m-d',strtotime($stdate));
    // echo "<br>";
    $enddatefrom = date('Y-m-d',strtotime($stdate));

    $useruinqueidno = $_SESSION['useruinqueidno'];
    $user_id = $_SESSION['useridis'];
    // Name Declare To Use in Loop
    $tprepaidordersres = 0;
    $tcodordersres = 0;

    $tdeliveredorders = 0;
    $trtoorders = 0;
    $tundeliveredorders = 0;
    $tintransitorders = 0;
    $tlostorders = 0;

    $tgm500 = 0;
    $tkg1 = 0;
    $tkg2 = 0;
    $tkg5 = 0;
    $tkg10 = 0;

    $tcodbalance = 0;
    // Name Declare To Use in Loop

    // User ParentID Check
    $allclients = "SELECT DISTINCT `useruinqueparentid` FROM asitfa_user WHERE `usertype`='client' AND `Active`='1' ORDER BY `User_Id` ASC";
    $allclientsr=mysqli_query($conn,$allclients);
    while($clientres = mysqli_fetch_assoc($allclientsr)){
    // User ParentID Check
    $useruinqueidno = $clientres['useruinqueparentid'];


    $queryall="SELECT * FROM `asitfa_user` WHERE `useruinqueparentid`='$useruinqueidno' AND `Active`='1'";
    $fdataall=mysqli_query($conn,$queryall);
    $numrowall=mysqli_num_rows($fdataall);

    while($resultall = mysqli_fetch_assoc($fdataall)){
    // echo $resultall['useruinqueparentid'];
    // echo "Id : ";
    $checkuserids = $resultall['User_Id'];

    // COD & Prepaid Orders
    // echo "<br><br>";
    // echo "/ &ensp; Totalorder : ";
    // echo "<br><br>1 :";
    $totalorders = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$checkuserids' AND `Awb_Number`!='' AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
    // echo "<br><br>";
    // echo "<br><br>";
    $totalordersrun = mysqli_query($conn, $totalorders);
    $totalordersres = mysqli_fetch_assoc($totalordersrun);
    $totalordersres["count('Single_Order_Id')"];


    // echo "/ &ensp; Prepaid : ";
    // echo "<br><br> 2 :";
    $prepaidorders = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$checkuserids' AND `Awb_Number`!='' AND `Order_Type`='Prepaid' AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
    // echo "<br><br>";
    $prepaidordersrun = mysqli_query($conn, $prepaidorders);
    $prepaidordersres = mysqli_fetch_assoc($prepaidordersrun);
    $tprepaidordersres+= $prepaidordersres["count('Single_Order_Id')"];

    // echo "/ &ensp; COD : ";
    // echo "<br><br>3 : ";
    $codorders = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$checkuserids' AND `Awb_Number`!='' AND `Order_Type`='COD' AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
    // echo "<br><br>";
    $codordersrun = mysqli_query($conn, $codorders);
    $codordersres = mysqli_fetch_assoc($codordersrun);
    $tcodordersres+= $codordersres["count('Single_Order_Id')"];


    // echo " Delivered Orders : ";
    // echo "<br><br>4 :";
    $deliveredorder = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$checkuserids' AND `Awb_Number`!='' AND `order_status_show`='RTO Delivered' AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
    // echo "<br><br>";
    $deliveredorderrun = mysqli_query($conn, $deliveredorder);
    $deliveredorderres = mysqli_fetch_assoc($deliveredorderrun);
    $tdeliveredorders+= $deliveredorderres["count('Single_Order_Id')"];


    // echo " RTO Orders : ";
    // echo "<br><br>4 :";
    $rtodorder = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$checkuserids' AND `Awb_Number`!='' AND `order_status_show`='RTO In Transit' AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
    // echo "<br><br>";
    $rtoorderrun = mysqli_query($conn, $rtodorder);
    $rtoorderres = mysqli_fetch_assoc($rtoorderrun);
    $trtoorders+= $rtoorderres["count('Single_Order_Id')"];


    // echo " Undelivered Orders : ";
    // echo "<br><br>4 :";
    $undeliveredorder = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$checkuserids' AND `Awb_Number`!='' AND `order_status_show`='Undelivered' AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
    // echo "<br><br>";
    $undeliveredorderrun = mysqli_query($conn, $undeliveredorder);
    $undeliveredorderres = mysqli_fetch_assoc($undeliveredorderrun);
    $tundeliveredorders+= $undeliveredorderres["count('Single_Order_Id')"];


    // echo " In Transit Orders : ";
    // echo "<br><br>4 :";
    $intransitdorder = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$checkuserids' AND `Awb_Number`!='' AND `order_status_show`='In Transit' AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
    // echo "<br><br>";
    $intransitdorderun = mysqli_query($conn, $intransitdorder);
    $intransitdorderes = mysqli_fetch_assoc($intransitdorderun);
    $tintransitorders+= $intransitdorderes["count('Single_Order_Id')"];


    // echo " In Lost Orders : ";
    // echo "<br><br>4 :";
    $lostorder = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$checkuserids' AND `Awb_Number`!='' AND `order_status_show`='Lost' AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
    // echo "<br><br>";
    $lostorderun = mysqli_query($conn, $lostorder);
    $lostorderes = mysqli_fetch_assoc($lostorderun);
    $tlostorders+= $lostorderes["count('Single_Order_Id')"];


    // COD & Prepaid Orders
    // echo "<br>";
    // COD Balance
    // echo " COD Balance : ";
    // echo "<br><br>4 :";
    $codbalance = "SELECT * FROM `spark_single_order` WHERE `User_Id`='$checkuserids' AND `Awb_Number`!='' AND `Order_Type`='COD' AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
    // echo "<br><br>";
    $codbalancerun = mysqli_query($conn, $codbalance);
    while($codbalanceres = mysqli_fetch_assoc($codbalancerun)){
    $tcodbalance+= $codbalanceres["Cod_Amount"];
    }

    // Weight Shipment

    if($resultall['commercialstype']=="gm500" AND $resultall['Active']=="1"){
    // echo "/ &ensp; Total 500GM : ";
    // echo "<br><br>500Gm : ";
    $weighttotal = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$checkuserids' AND `Awb_Number`!='' AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
    // echo "<br><br>";
    $weighttotalrun = mysqli_query($conn, $weighttotal);
    $weighttotalres = mysqli_fetch_assoc($weighttotalrun);
    $tgm500+= $weighttotalres["count('Single_Order_Id')"];
    // $tgm500+= 0;
    }
    if($resultall['commercialstype']=="kg1" AND $resultall['Active']=="1"){
    // echo "/ &ensp; Total 1KG : ";
    // echo "<br><br>1KG : ";
    $weighttotal = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$checkuserids' AND `Awb_Number`!='' AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
    // echo "<br><br>";
    $weighttotalrun = mysqli_query($conn, $weighttotal);
    $weighttotalres = mysqli_fetch_assoc($weighttotalrun);
    $tkg1+= $weighttotalres["count('Single_Order_Id')"];
    // $tkg1+= 0;
    }
    if($resultall['commercialstype']=="kg2" AND $resultall['Active']=="1"){
    // echo "/ &ensp; Total 2KG : ";
    // echo "<br><br>2KG :";
    $weighttotal = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$checkuserids' AND `Awb_Number`!='' AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
    // echo "<br><br>";
    $weighttotalrun = mysqli_query($conn, $weighttotal);
    $weighttotalres = mysqli_fetch_assoc($weighttotalrun);
    $tkg2+= $weighttotalres["count('Single_Order_Id')"];
    // $tkg2+= 0;
    }
    if($resultall['commercialstype']=="kg5" AND $resultall['Active']=="1"){
    // echo "/ &ensp; Total 5KG : ";
    $weighttotal = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$checkuserids' AND `Awb_Number`!='' AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
    $weighttotalrun = mysqli_query($conn, $weighttotal);
    $weighttotalres = mysqli_fetch_assoc($weighttotalrun);
    $tkg5+= $weighttotalres["count('Single_Order_Id')"];
    // $tkg5+= 0;
    }
    if($resultall['commercialstype']=="kg10" AND $resultall['Active']=="1"){
    // echo "/ &ensp; Total 10KG : ";
    $weighttotal = "SELECT count('Single_Order_Id') FROM `spark_single_order` WHERE `User_Id`='$checkuserids' AND `Awb_Number`!='' AND `Rec_Time_Date` BETWEEN '$startdatefrom' AND '$enddatefrom'";
    $weighttotalrun = mysqli_query($conn, $weighttotal);
    $weighttotalres = mysqli_fetch_assoc($weighttotalrun);
    $tkg10+= $weighttotalres["count('Single_Order_Id')"];
    // $tkg10+= 0;
    }
    // echo "<br><br>";
    }

    // User ParentID Check
    }
    // User ParentID Check

    ?>
    <!--  --><!--  -->
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
    <!-- Performance -->
    <?php
        $tlostorders = 0;
        $tperforms = $tdeliveredorders + $trtoorders + $tundeliveredorders + $tintransitorders + $tlostorders;
        $deliveredpercent = ($tdeliveredorders/$tperforms)*100;
        $deliveredpercent = round($deliveredpercent,1);
        $rtopercent = ($trtoorders/$tperforms)*100;
        $rtopercent = round($rtopercent,1);
        $undeliveredpercent = ($tundeliveredorders/$tperforms)*100;
        $undeliveredpercent = round($undeliveredpercent,1);
        $intransitpercent = ($tintransitorders/$tperforms)*100;
        $intransitpercent = round($intransitpercent,1);
        $lostpercent = ($tlostorders/$tperforms)*100;
        $lostpercent = round($lostpercent,1);
    ?>
    <!-- Performance -->
    <!-- Volume Trend -->
    <?php
        $totalorders = $tprepaidordersres + $tcodordersres;
        $prepaidpercentage = ($tprepaidordersres/$totalorders)*100;
        $prepaidpercentage = round($prepaidpercentage,1);
        $codpercentage = ($tcodordersres/$totalorders)*100;
        $codpercentage = round($codpercentage,1);
    ?>
    <!-- Volume Trend -->

    <div class="container-fluid">
    <!--row -->
    <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="white-box">
                <div class="r-icon-stats">
                  <i class="fa fa-shopping-cart" aria-hidden="true" style="background-color:#5A5A5A !important;width:41px;height:41px;padding:8px 0px 0px 0px"></i>
                    <div class="bodystate fontweigh">
                      <span class="text-muted fontweigh">Today &ensp;|&ensp; <strong>0</strong></span>
                      <h5 style="font-size:10px" class=" fontweigh">Prepaid &ensp;&ensp;-&ensp;&ensp; --- </h5>
                      <h5 style="font-size:10px" class=" fontweigh">COD&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;-&ensp;&ensp;  ---</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="white-box">
                <div class="r-icon-stats">
                  <i class="fa fa-shopping-cart" aria-hidden="true" style="background-color:#5A5A5A !important;width:41px;height:41px;padding:8px 0px 0px 0px"></i>
                  <div class="bodystate fontweigh">
                    <span class="text-muted">Delivered &ensp;|&ensp;  <strong>---</strong></span>
                    <h5 style="font-size:10px" class=" fontweigh">Prepaid &ensp;&ensp;-&ensp;&ensp;<strong>---</strong></strong></h5>
                    <h5 style="font-size:10px" class=" fontweigh">COD&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;-&ensp;&ensp;<strong>---</strong></h5>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="white-box">
                <div class="r-icon-stats">
            <i class="fa fa-money" aria-hidden="true" style="background-color:#A1A1A1 !important;width:41px;height:41px;padding:8px 0px 0px 0px"></i>
                    <div class="bodystate fontweigh">
                        <h4>00.00</h4>
                        <span class="text-muted">COD Balance</span><br>
                        <a href="#" style="font-size:10px">Outstanding Freight</a> 0.0
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="white-box">
                <div class="r-icon-stats">
            <i class="fa fa-money" aria-hidden="true" style="background-color:#A1A1A1 !important;width:41px;height:41px;padding:8px 0px 0px 0px"></i>
                    <div class="bodystate fontweigh">
                      <h4>
                     <?php
                         $query1 = "SELECT * FROM `spark_wallet_details` WHERE `user_id`='$user_id' AND `status`='TXN_SUCCESS' ORDER BY `wallet_id` desc";
                         $data1 = mysqli_query($conn,$query1);
                         $res1 = mysqli_fetch_assoc($data1);
                         if(empty($res1['crt_amt']))
                         {
                             $tamt = 0;
                         }else
                         {
                             $tamt = $res1['crt_amt'];
                         }
                     ?>
                     <?= number_format($tamt,2) ?>
                     </h4>
                        <span class="text-muted">Wallet Balance</span><br>
                        <a href="add_balance.php" style="font-size:11px">Recharge Wallet</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/row -->
    <!-- .row -->
    <div class="row">
        <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="white-box">
                <h3 class="box-title"> Todays Orders</h3>
                <div class="stats-row">
                    <div class="stat-item">
                        <h6 class="fontweigh">Total</h6> <b><?= $totalorders; ?></b></div>
                    <div class="stat-item">
                        <h6 class="fontweigh">Delivered</h6> <strong>---</strong></div>
                    <div class="stat-item">
                        <h6 class="fontweigh">RTO</h6> <strong>---</strong></div>
                    <div class="stat-item">
                        <h6 class="fontweigh">Process</h6> <strong>---</strong></div>
                </div>
                <!-- <div id="sparkline8" class="minus-mar"></div> -->
            </div>
        </div>
        <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="white-box">
                <h3 class="box-title fontweigh">Current Month</h3>
                <div class="stats-row">
                    <div class="stat-item">
                        <h6 class="fontweigh">Total</h6> <b class="fontweigh">---</b></div>
                    <div class="stat-item">
                        <h6 class="fontweigh">Delivered</h6> <b class="fontweigh">---</b></div>
                    <div class="stat-item">
                        <h6 class="fontweigh">Process</h6> <b class="fontweigh">---</b></div>
                </div>
                <!-- <div id="sparkline9" class="minus-mar"></div> -->
            </div>
        </div>
        <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="white-box">
                <h3 class="box-title fontweigh">Last Month</h3>
                <div class="stats-row">
                    <div class="stat-item">
                        <h6 class="fontweigh">Total</h6> <b>---</b></div>
                    <div class="stat-item">
                        <h6 class="fontweigh">Delivered</h6> <b>---</b></div>
                    <div class="stat-item">
                        <h6 class="fontweigh">Process</h6> <b>---</b></div>
                </div>
                <!-- <div id="sparkline10" class="minus-mar"></div> -->
            </div>
        </div>
    </div>
    <!-- /.row -->
    <!-- .row -->
    <div class="row" >
        <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="white-box">

              <!--  -->
              <!--  -->
                <div class="">
                <div class="">
                  <!-- <h5 style="" class="text-center"><b></b></h5> -->
                  <h5 style="margin:0px;padding:0px" class="text-center"><b>Shipment Weight</b></h5><br>
                <div class="row" style="">
    <!-- Shipment Weight -->
    <!-- Shipment Weight -->
                            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
                        </div>

                </div>
              </div>
                <!--  -->
                <!--  -->
            </div>
        </div>
        <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="white-box">
              <!--  -->
              <!--  -->
              <h5 style="margin:0px;padding:0px" class="text-center"><b>Performance</b></h5><br>

              <div class="">
    <div class="" style="background-color:white;">
      <!-- Performance -->
    <!-- Performance -->
                <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
    <?php
    if(empty($tdeliveredorders) AND empty($trtoorders) AND empty($tundeliveredorders) AND empty($tintransitorders) AND empty($tlostorders)){
        echo "<div class='col-md-12 text-center' style='margin-top:122px;margin-bottom:75px'>Loading...</div>";
    }else{
        echo "<canvas id='myChartt3' style='height:250px !important'></canvas>";
    }
    ?>

                <script type="text/javascript">
                    const type3 = "doughnut";
                    const data3 = {
                    labels: ['Delivered(<?= $deliveredpercent ?>%)','RTO(<?= $rtopercent ?>%)','Undelivered(<?= $undeliveredpercent ?>%)','Intrasit(<?= $intransitpercent ?>%)','Lost(<?= $lostpercent ?>%)'],
                    // labels: ['Delivered','RTO','Undelivered','Intrasit','Lost'],
                    datasets: [{
                    // label: 'My First Dataset',
                    data: [<?= $tdeliveredorders ?>,<?= $trtoorders ?>,<?= $tundeliveredorders ?>,<?= $tintransitorders ?>,<?= $tlostorders ?>],
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

                    var ctx = document.getElementById('myChartt3');
                    var myChart = new Chart(ctx, {
                        type: type3,
                        data: data3,
                    });
                </script>
                &ensp;
            </div>

        </div>
              <!--  -->
              <!--  -->
            </div>
        </div>
        <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="white-box">
              <!--  -->
              <!--  -->
              <h5 style="margin:0px;padding:0px" class="text-center"><b>Volume Trend</b></h5><br>
              <div class="">
              <div class="">
    <!-- Volume Trend -->
    <!-- Volume Trend -->
              <div class="row" style="background-color:white;">
              <div class="col-md-12" style="">
              <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
              </div>
              <!--  -->
              <!--  -->
            </div>
        </div>
    </div>
    <!-- /.row -->
    </div>
    <!-- /.container-fluid -->

<!-- Default Today Details -->
</div>






















<style>
.white-box{
  padding:15px !important;
  border-radius:10px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19) !important;
}
</style>




<!-- /#page-wrapper -->
<?php
  // include "Layout_Header.php";
include "Layout_Footer.php";
?>
