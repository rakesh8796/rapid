<?php
    include "Layout_Header.php";
    error_reporting(1);
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Page Content -->


<script type="text/javascript">
$(document).ready(function(){
  // alert('work');
  // $("#last10daymisreports").html("Loading...");
  // $.ajax({
  // type: "GET",
  // url: 'misreports/emis.php',
  // data:{val:"Today "},
  // success: function (data){
  //   $("#last10daymisreports").html(data);
  // },
  // error: function (data) {
  //   console.log('Error:', data);
  // }
  // });
});
</script>

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
<div class="col-md-12">
    <!-- *  *   *   *   *   Download Functions  *   *   *   *   *    -->
<!-- <div class="container-fluid"> -->



<div class="col-md-12" style="margin-bottom:10px">
<br>
<div class="col-md-1 text-center">
    <center><strong>Filter</strong></center>
</div>
<div class="col-md-2 text-left">
    <select class="" onchange="ManageOrders(this.value)" style="box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%) !important;border-radius:20px;width:100%;">
        <option value="TodayDay">- - - Select - - -</option>
        <option value="TodayDay">Today</option>
        <option value="YesterDay">YesterDay</option>
        <option value="CurrentMonthFilter">Current Month</option>
        <option value="LastMonthFilter">Last Month</option>
        <option value="Last7Days">Last 7 Days</option>
        <option value="Last30Days">Last 30 Days</option>
        <option value="Last90Days">Last 90 Days</option>
        <!--<option value="CustomOrdersIs">Custom Date Range</option>-->
        <!--<option value="AllDays">All Orders</option>-->
    </select>
</div>
<div class="col-md-3 col-sm-6">

</div>
<div class="col-md-6 col-sm-6" title="Client Account Details">
<!--<div class="col-md-12" style="background:white">-->
<!--  <div class="container-fluid"  style="box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%) !important;padding: 1px 1px 1px 5px;background:white;">-->
<!--        <div class="">-->

<!--<div class="col-md-4" title="Total Clients">-->
<!--    <i class="fa fa-users" aria-hidden="true" style="font-size:17px;"></i> &ensp; <strong>5</strong>-->
<!--</div>-->
<!--<div class="col-md-4" title="Active Client Accounts">-->
<!--    Active <strong>5</strong>-->
<!--</div>-->
<!--<div class="col-md-4" title="Deactive Client Accounts">-->
<!--    Deactive <strong>5</strong>-->
<!--</div>-->

<!--        </div>-->
<!--  </div>-->
<!--</div>-->
</div>
<!-- <div class="col-md-3 col-sm-6">
  <div class="white-box">
        <div class="">
          <span class="text-muted">Clients |  <strong>10</strong></span>
          <h5 style="font-size:10px" class=" fontweigh">Active <strong>5</strong> &ensp;|&ensp;
             Deactive <strong>5</strong></h5>
        </div>
  </div>
</div> -->



<?php
// Current Month
  $crtmonth = date("m");
  $crtyear = date("Y");
  $crtmdays = cal_days_in_month(CAL_GREGORIAN, $crtmonth, $crtyear);
  $currentmonthstart ="1-$crtmonth-$crtyear";
  $currentmonthstend ="$crtmdays-$crtmonth-$crtyear";
  $currentmonthstart = date('d-m-Y',strtotime($currentmonthstart));
  // echo "&ensp;:&ensp;";
  $currentmonthstend = date('d-m-Y',strtotime($currentmonthstend));
// Current Month
  // echo "&ensp;&ensp;&ensp;&ensp;";
// Last Month
  $lstmonth = date("m",strtotime("-1 Month"));
  $lstyear = date("Y");
  $lstmdays = cal_days_in_month(CAL_GREGORIAN, $lstmonth, $lstyear);
  $lastmonthstart ="1-$lstmonth-$lstyear";
  $lastmonthstend ="$lstmdays-$lstmonth-$lstyear";
  $lastmonthstart = date('d-m-Y',strtotime($lastmonthstart));
  // echo "&ensp;:&ensp;";
  $lastmonthstend = date('d-m-Y',strtotime($lastmonthstend));
// Last Month
// YesterDay
    $yesterdaydate = date('d-m-Y',strtotime("-1 Days"));
// YesterDay

    $stdate = date("d-m-Y");

    $e7days = date('d-m-Y',strtotime("-7 Days"));
    $e30days = date('d-m-Y',strtotime("-30 Days"));
    $e90days = date('d-m-Y',strtotime("-90 Days"));

    $enddate = '06-05-2021';
    // $enddate = date('d-m-Y',strtotime("-7 Days"));
?>

<input type="hidden" name="todaydatecal" id="todaydatecal" value="<?= $stdate ?>">
<input type="hidden" name="last7dayscal" id="last7dayscal" value="<?= $e7days ?>">
<input type="hidden" name="last30dayscal" id="last30dayscal" value="<?= $e30days ?>">
<input type="hidden" name="last90dayscal" id="last90dayscal" value="<?= $e90days ?>">
<!-- YesterDay -->
<input type="hidden" name="yesterdayfdate" id="yesterdayfdate" value="<?= $yesterdaydate ?>">
<!-- YesterDay -->
<!-- Current -->
<input type="hidden" name="crtmonthfstart" id="crtmonthfstart" value="<?= $currentmonthstend ?>">
<input type="hidden" name="crtmonthfend" id="crtmonthfend" value="<?= $currentmonthstart ?>">
<!-- Current -->
<!-- Last -->
<input type="hidden" name="lastmonthfstart" id="lastmonthfstart" value="<?= $lastmonthstend ?>">
<input type="hidden" name="lastmonthfend" id="lastmonthfend" value="<?= $lastmonthstart ?>">
<!-- Last -->

<input type="hidden" name="enddatecal" id="enddatecal" value="<?= $enddate ?>">

<script type="text/javascript">
function ManageOrders(val){
    // alert(val);
    var enddatefrom;
    var startdatefrom;
// *  * * * *
if(val == "AllDays"){
    var enddatefrom = $("#todaydatecal").val();
    var startdatefrom = $("#enddatecal").val();
    $.ajax({
    type: "GET",
    url: 'DashboardDetailsr/AdminChangeDatas.php',
    data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom,val:"All "},
    success: function (data){
      $("#changeablediv").html(data);
    },
    error: function (data) {
      console.log('Error:', data);
    }
    });
}
//  - - - - -

    if(val == "TodayDay"){
        var enddatefrom = $("#todaydatecal").val();
        var startdatefrom = $("#todaydatecal").val();
        var selectedname = "TodayData";
        $.ajax({
        type: "GET",
        url: 'DashboardDetailsr/AdminChangeDatas.php',
        data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom,val:"Today "},
        success: function (data){
          $("#changeablediv").html(data);
        },
        error: function (data) {
          console.log('Error:', data);
        }
        });
    }
    if(val == "YesterDay"){
        var enddatefrom = $("#yesterdayfdate").val();
        var startdatefrom = $("#yesterdayfdate").val();
        var selectedname = "YesterdayData";
        $.ajax({
        type: "GET",
        url: 'DashboardDetailsr/AdminChangeDatas.php',
        data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom,val:"YesterDay "},
        success: function (data){
          $("#changeablediv").html(data);
        },
        error: function (data) {
          console.log('Error:', data);
        }
        });
    }
    if(val == "Last7Days"){
        var enddatefrom = $("#todaydatecal").val();
        var startdatefrom = $("#last7dayscal").val();
        var selectedname = "Last7DaysData";
        $.ajax({
        type: "GET",
        url: 'DashboardDetailsr/AdminChangeDatas.php',
        data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom,val:"Last 7 Days "},
        success: function (data){
          $("#changeablediv").html(data);
        },
        error: function (data) {
          console.log('Error:', data);
        }
        });
    }
    if(val == "Last30Days"){
        var enddatefrom = $("#todaydatecal").val();
        var startdatefrom = $("#last30dayscal").val();
        var selectedname = "Last30DaysData";
        $.ajax({
        type: "GET",
        url: 'DashboardDetailsr/AdminChangeDatas.php',
        data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom,val:"Last 30 Days "},
        success: function (data){
          $("#changeablediv").html(data);
        },
        error: function (data) {
          console.log('Error:', data);
        }
        });
    }
    if(val == "Last90Days"){
        var enddatefrom = $("#todaydatecal").val();
        var startdatefrom = $("#last90dayscal").val();
        var selectedname = "Last90DaysData";
        $.ajax({
        type: "GET",
        url: 'DashboardDetailsr/AdminChangeDatas.php',
        data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom,val:"Last 90 Days "},
        success: function (data){
          $("#changeablediv").html(data);
        },
        error: function (data) {
          console.log('Error:', data);
        }
        });
    }
    if(val == "CurrentMonthFilter"){
        var enddatefrom = $("#crtmonthfstart").val();
        var startdatefrom = $("#crtmonthfend").val();
        var selectedname = "CurrentMonthData";
        $.ajax({
        type: "GET",
        url: 'DashboardDetailsr/AdminChangeDatasCurtMonth.php',
        data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom,val:"Current Month "},
        success: function (data){
          $("#changeablediv").html(data);
        },
        error: function (data) {
          console.log('Error:', data);
        }
        });
    }
    if(val == "LastMonthFilter"){
        var enddatefrom = $("#lastmonthfstart").val();
        var startdatefrom = $("#lastmonthfend").val();
        var selectedname = "LastMonthData";
        $.ajax({
        type: "GET",
        url: 'DashboardDetailsr/AdminChangeDatasLastMonth.php',
        data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom,val:"Last Month "},
        success: function (data){
          $("#changeablediv").html(data);
        },
        error: function (data) {
          console.log('Error:', data);
        }
        });
    }
    if(val == "CustomOrdersIs"){
        $("#All_Records").html("<br><center><h4>Loading...<h4></center>");
    }


// Delivered Orders
    $.ajax({
    type: "GET",
    url: 'DashboardDetailsr/AdminDelivered.php',
    data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom,val:"Delivered ",selectedname:selectedname},
    success: function (data){
      $("#deliveredorders").html(data);
    },
    error: function (data) {
      console.log('Error:', data);
    }
    });
// Delivered Orders
// Shipment Weight Orders
    $.ajax({
    type: "GET",
    url: 'DashboardDetailsr/AdminShipmentWeightGraph.php',
    data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom,val:"Shipment ",selectedname:selectedname},
    success: function (data){
      $("#ShipmentWeightGraph").html(data);
    },
    error: function (data) {
      console.log('Error:', data);
    }
    });
// Shipment Weight Orders
// Performance Orders
    $.ajax({
    type: "GET",
    url: 'DashboardDetailsr/AdminPerformanceGraph.php',
    data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom,val:"Shipment ",selectedname:selectedname},
    success: function (data){
      $("#PerformanceGraph").html(data);
    },
    error: function (data) {
      console.log('Error:', data);
    }
    });
// Performance Orders
// Volume Trend Orders
    $.ajax({
    type: "GET",
    url: 'DashboardDetailsr/AdminVolumeGraph.php',
    data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom,val:"Volume ",selectedname:selectedname},
    success: function (data){
      $("#VolumeTrendGraph").html(data);
    },
    error: function (data) {
      console.log('Error:', data);
    }
    });
// Volume Trend Orders

}
</script>


</div>
</div>
<!-- *  *   *   *   *   //Download Functions  *   *   *   *   *    -->
</div>


<div class="col-md-12" id="All_Records" style="background-color:#EAEEF2 !important;">
<!-- Default Today Details -->







<div class="container-fluid">




<!--  Today / Delivered  / COD Remmitance / Wallet -->
<script type="text/javascript">
$(document).ready(function(){
  $(".notshowdatatdcw").html("<center><img src='DashboardDetailsr/loader.gif' alt='Loading...' style='width:20px'></center>");
  // alert('work');
// Today Orders
  $.ajax({
  type: "GET",
  url: 'DashboardDetailsr/AdminToday.php',
  data:{val:"Today "},
  success: function (data){
    $("#todaydetails").html(data);
  },
  error: function (data) {
    console.log('Error:', data);
  }
  });
// Today Orders
// Delivered Orders
    var enddatefrom = $("#todaydatecal").val();
    var startdatefrom = $("#todaydatecal").val();
    $.ajax({
    type: "GET",
    url: 'DashboardDetailsr/AdminDelivered.php',
    data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom,val:"Delivered "},
    success: function (data){
      $("#deliveredorders").html(data);
    },
    error: function (data) {
      console.log('Error:', data);
    }
    });
// Delivered Orders
});
</script>
<div class="row">
<div class="col-md-3 col-sm-6">
  <div class="white-box">
      <div class="r-icon-stats">
        <i class="fa fa-shopping-cart" aria-hidden="true" style="background-color:#5A5A5A !important;width:41px;height:41px;padding:8px 0px 0px 0px"></i>
          <div class="bodystate fontweigh notshowdatatdcw" id="todaydetails">
            <!-- No Data -->
          </div>
      </div>
  </div>
</div>
<div class="col-md-3 col-sm-6">
  <div class="white-box">
      <div class="r-icon-stats">
        <i class="fa fa-shopping-cart" aria-hidden="true" style="background-color:#5A5A5A !important;width:41px;height:41px;padding:8px 0px 0px 0px"></i>
        <div class="bodystate fontweigh notshowdatatdcw" id="deliveredorders">
          <!-- No Data -->
        </div>
      </div>
  </div>
</div>

<?php
    //  $laststartthursdaydate = date('Y-m-d', strtotime("last Thursday"));
    // echo "<br>";
    //  $nextwednesdaydate = date('Y-m-d', strtotime("next Wednesday"));
     
    if(date('D')=="Thu"){
      $laststartthursdaydate = date('Y-m-d');
    }else{
      $laststartthursdaydate = date('Y-m-d', strtotime("last Thursday"));
    }
    // echo "<br>";
    if(date('D')=="Wed"){
      $nextwednesdaydate = date('Y-m-d');
    }else{
      $nextwednesdaydate = date('Y-m-d', strtotime("next Wednesday"));
    }
     
    $qcodremmmit = "SELECT sum(`Cod_Amount`) FROM `spark_single_order` WHERE `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_status_show`='Delivered' AND `delivereddate` BETWEEN '$laststartthursdaydate' AND '$nextwednesdaydate'";
    $qcodremmmitr = mysqli_query($conn, $qcodremmmit);
    $qcodremmmitru = mysqli_fetch_assoc($qcodremmmitr);
    $qcodremmmitruis = $qcodremmmitru["sum(`Cod_Amount`)"];
    if(empty($qcodremmmitruis)){  $qcodremmmitruis = 0; }
    // $qcodremmmitruis = 0;
?>
<div class="col-md-3 col-sm-6">
    <div class="white-box">
        <div class="r-icon-stats">
    <i class="fa fa-money" aria-hidden="true" style="background-color:#A1A1A1 !important;width:41px;height:41px;padding:8px 0px 0px 0px"></i>
            <div class="bodystate fontweigh">
                <a href="Remittance.php">
                  <h4><spam class="fa fa-inr" aria-hidden="true"></spam> <?= number_format($qcodremmmitruis, 2, '.', ',') ?></h4>
                  <span class="text-muted" style="font-size:13px">COD Balance</span><span style="font-size:9px"><u> <?= date('d-m-Y', strtotime("next Wednesday")) ?></u></span><br>
                </a>
                <a href="Remittance.php" style="font-size:10px">Outstanding Freight</a> 0.0
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
<!--  Today / Delivered  / COD Remmitance / Wallet -->














<!-- Today Orders / Current Month / Last Month Orders -->
<script type="text/javascript">
$(document).ready(function(){
  // alert('work');
  $(".notshowdatatcl").html("<center><img src='DashboardDetailsr/loader.gif' alt='Loading...' style='width:30px'></center>");

// Today Month
  var enddatefrom = $("#todaydatecal").val();
  var startdatefrom = $("#todaydatecal").val();
  $.ajax({
  type: "GET",
  url: 'DashboardDetailsr/AdminChangeDatas.php',
  data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom,val:"Today "},
  success: function (data){
    $("#changeablediv").html(data);
  },
  error: function (data) {
    console.log('Error:', data);
  }
  });
// Today Month
// Current Month
  $.ajax({
  type: "GET",
  url: 'DashboardDetailsr/AdminCurrentMonth.php',
  data:{val:"Today "},
  success: function (data){
    $("#currentmonthdata").html(data);
  },
  error: function (data) {
    console.log('Error:', data);
  }
  });
// Current Month
// Last Month
  $.ajax({
  type: "GET",
  url: 'DashboardDetailsr/AdminLastMonth.php',
  data:{val:"Today "},
  success: function (data){
    $("#lastmonthdata").html(data);
  },
  error: function (data) {
    console.log('Error:', data);
  }
  });
// Last Month
});
</script>
<!-- .row -->
<div class="row">
<div class="col-md-4 col-sm-12 col-xs-12">
  <div class="white-box" id="changeablediv">
      <h3 class="box-title"> Today Orders</h3>
      <div class="stats-row notshowdatatcl">
          <!-- No Data -->
      </div>
  </div>
</div>
<div class="col-md-4 col-sm-12 col-xs-12">
  <div class="white-box" id="currentmonthdata">
      <div class="stats-row notshowdatatcl">
        <!-- No Data -->
      </div>
  </div>
</div>
<div class="col-md-4 col-sm-12 col-xs-12">
  <div class="white-box" id="lastmonthdata">
      <div class="stats-row notshowdatatcl">
        <!-- No Data -->
      </div>
  </div>
</div>
</div>
<!-- /.row -->
<!-- Today Orders / Current Month / Last Month Orders -->














<!-- Shipment Weignt / Performance / Volume Trend -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  // alert('work');
    $(".notshowdataspv").html("<img src='DashboardDetailsr/loader.gif' alt='Loading...' style='width:50px'>");
    var enddatefrom = $("#todaydatecal").val();
    var startdatefrom = $("#todaydatecal").val();
// Shipment Weight Orders
    $.ajax({
    type: "GET",
    url: 'DashboardDetailsr/AdminShipmentWeightGraph.php',
    data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom,val:"Shipment "},
    success: function (data){
      $("#ShipmentWeightGraph").html(data);
    },
    error: function (data) {
      console.log('Error:', data);
    }
    });
// Shipment Weight Orders
// Performance Orders
    $.ajax({
    type: "GET",
    url: 'DashboardDetailsr/AdminPerformanceGraph.php',
    data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom,val:"Shipment "},
    success: function (data){
      $("#PerformanceGraph").html(data);
    },
    error: function (data) {
      console.log('Error:', data);
    }
    });
// Performance Orders
// Volume Trend Orders
    $.ajax({
    type: "GET",
    url: 'DashboardDetailsr/AdminVolumeGraph.php',
    data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom,val:"Volume "},
    success: function (data){
      $(".notshowdataspv").html("<img src='DashboardDetailsr/loader.gif' alt='Loading...' style='width:50px'>");
      $("#VolumeTrendGraph").html(data);
    },
    error: function (data) {
      console.log('Error:', data);
    }
    });
// Volume Trend Orders

});
</script>
<!-- .row -->
<div class="row" >
<!-- Shipment Weight -->
<div class="col-md-4 col-sm-12 col-xs-12">
    <div class="white-box">
        <h5 style="margin:0px;padding:0px" class="text-center"><b>Shipment Weight</b></h5><br>
        <div class="row" id="ShipmentWeightGraph">
          <div class='col-md-12 text-center notshowdataspv' style='margin-top:122px;margin-bottom:92px'>
            <!-- No Data -->
          </div>
        </div>
    </div>
</div>
<!-- Shipment Weight -->
<!-- Performance -->
<div class="col-md-4 col-sm-12 col-xs-12">
    <div class="white-box">
        <h5 style="margin:0px;padding:0px" class="text-center"><b>Performance</b></h5><br>
        <div class="row" id="PerformanceGraph">
          <div class='col-md-12 text-center notshowdataspv' style='margin-top:122px;margin-bottom:92px'>
            <!-- No Data -->
          </div>
        </div>
    </div>
</div>
<!-- Performance -->
<!-- Volume Trend -->
<div class="col-md-4 col-sm-12 col-xs-12">
    <div class="white-box">
        <h5 style="margin:0px;padding:0px" class="text-center"><b>Volume Trend</b></h5><br>
        <div class="row" id="VolumeTrendGraph">
          <div class='col-md-12 text-center notshowdataspv' style='margin-top:122px;margin-bottom:92px'>
            <!-- No Data -->
          </div>
        </div>
    </div>
</div>
<!-- Volume Trend -->
</div>
<!-- /.row -->
<!-- Shipment Weignt / Performance / Volume Trend -->





</div>
<!-- /.container-fluid -->
<!-- Default Today Details -->
</div>












<!-- /#page-wrapper -->
<?php
  include "Layout_Footer.php";
?>
<script type="text/javascript">
  $(document).ready(function () {
    setTimeout(function () {
    //   alert('Reloading Page');
    //   location.reload(true);
    }, 90000);
  });
</script>