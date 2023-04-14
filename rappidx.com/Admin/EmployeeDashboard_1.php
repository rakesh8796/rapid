<?php
    include "Layout_Header.php";
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
        <option value="TodayDay">Today</option>
        <option value="YesterDay">Yesterday</option>
        <option value="CurrentMonthFilter">Current Month</option>
        <option value="LastMonthFilter">Last Month</option>
        <option value="Last7Days">Last 7 Days</option>
        <option value="Last30Days">Last 30 Days</option>
        <option value="Last90Days">Last 90 Days</option>
        <!--<option value="CustomOrdersIs">Custom Date Range</option>-->
        <!--<option value="AllDays">All Orders</option>-->
    </select>
</div>
<div class="col-md-7 text-left">
</div>

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
// *  * * * *
if(val == "AllDays"){
    var enddatefrom = $("#todaydatecal").val();
    var startdatefrom = $("#enddatecal").val();
    $.ajax({
    type: "GET",
    url: 'Dashboard/EmployeeDashboard.php',
    data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom,val:"All "},
    success: function (data){
      $("#All_Records").html(data);
    },
    error: function (data) {
      console.log('Error:', data);
    }
    });
    $.ajax({
    type: "GET",
    url: 'Dashboard/EmployeeDashboard.php',
    data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom,val:"All "},
    success: function (data){
      $("#All_Records").html(data);
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
        $.ajax({
        type: "GET",
        url: 'Dashboard/EmployeeDashboard.php',
        data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom,val:"Today "},
        success: function (data){
          $("#All_Records").html(data);
        },
        error: function (data) {
          console.log('Error:', data);
        }
        });
        $.ajax({
        type: "GET",
        url: 'Dashboard/EmployeeDashboard.php',
        data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom,val:"Today "},
        success: function (data){
          $("#All_Records").html(data);
        },
        error: function (data) {
          console.log('Error:', data);
        }
        });
    }
    if(val == "YesterDay"){
        var enddatefrom = $("#yesterdayfdate").val();
        var startdatefrom = $("#yesterdayfdate").val();
        $.ajax({
        type: "GET",
        url: 'Dashboard/EmployeeDashboard.php',
        data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom,val:"YesterDay "},
        success: function (data){
          $("#All_Records").html(data);
        },
        error: function (data) {
          console.log('Error:', data);
        }
        });
        $.ajax({
        type: "GET",
        url: 'Dashboard/EmployeeDashboard.php',
        data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom,val:"YesterDay "},
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
        url: 'Dashboard/EmployeeDashboard.php',
        data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom,val:"Last 7 Days "},
        success: function (data){
          $("#All_Records").html(data);
        },
        error: function (data) {
          console.log('Error:', data);
        }
        });
        $.ajax({
        type: "GET",
        url: 'Dashboard/EmployeeDashboard.php',
        data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom,val:"Last 7 Days "},
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
        url: 'Dashboard/EmployeeDashboard.php',
        data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom,val:"Last 30 Days "},
        success: function (data){
          $("#All_Records").html(data);
        },
        error: function (data) {
          console.log('Error:', data);
        }
        });
        $.ajax({
        type: "GET",
        url: 'Dashboard/EmployeeDashboard.php',
        data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom,val:"Last 30 Days "},
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
        url: 'Dashboard/EmployeeDashboard.php',
        data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom,val:"Last 90 Days "},
        success: function (data){
          $("#All_Records").html(data);
        },
        error: function (data) {
          console.log('Error:', data);
        }
        });
        $.ajax({
        type: "GET",
        url: 'Dashboard/EmployeeDashboard.php',
        data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom,val:"Last 90 Days "},
        success: function (data){
          $("#All_Records").html(data);
        },
        error: function (data) {
          console.log('Error:', data);
        }
        });
    }
    if(val == "CurrentMonthFilter"){
        var enddatefrom = $("#crtmonthfstart").val();
        var startdatefrom = $("#crtmonthfend").val();
        $.ajax({
        type: "GET",
        url: 'Dashboard/EmployeeDashboard.php',
        data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom,val:"Current Month "},
        success: function (data){
          $("#All_Records").html(data);
        },
        error: function (data) {
          console.log('Error:', data);
        }
        });
        $.ajax({
        type: "GET",
        url: 'Dashboard/EmployeeDashboard.php',
        data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom,val:"Current Month "},
        success: function (data){
          $("#All_Records").html(data);
        },
        error: function (data) {
          console.log('Error:', data);
        }
        });
    }
    if(val == "LastMonthFilter"){
        var enddatefrom = $("#lastmonthfstart").val();
        var startdatefrom = $("#lastmonthfend").val();
        $.ajax({
        type: "GET",
        url: 'Dashboard/EmployeeDashboard.php',
        data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom,val:"Last Month "},
        success: function (data){
          $("#All_Records").html(data);
        },
        error: function (data) {
          console.log('Error:', data);
        }
        });
        $.ajax({
        type: "GET",
        url: 'Dashboard/EmployeeDashboard.php',
        data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom,val:"Last Month "},
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









<script type="text/javascript">
$(document).ready(function(){
//   alert('work');
    var enddatefrom = $("#todaydatecal").val();
        var startdatefrom = $("#todaydatecal").val();
        $.ajax({
        type: "GET",
        url: 'Dashboard/EmployeeDashboard.php',
        data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom,val:"Today "},
        success: function (data){
          $("#All_Records").html(data);
        },
        error: function (data) {
          console.log('Error:', data);
        }
    });
});
</script>



<div class="col-md-12" id="All_Records" style="background-color:#EAEEF2 !important;">
<!-- Default Today Details -->

<div class="container-fluid">

<!--  Today / Delivered  / COD Remmitance / Wallet -->
<script type="text/javascript">
$(document).ready(function(){
  $(".notshowdatatdcw").html("<center><img src='DashboardDetails/loader.gif' alt='Loading...' style='width:20px'></center>");
  // alert('work');
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
        <div class="bodystate fontweigh notshowdatatdcw">
          <!-- No Data -->
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
              <span class="text-muted">COD Balance</span>
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
              <span class="text-muted">Outstanding Bill</span>
          </div>
      </div>
  </div>
</div>
</div>
<!--  Today / Delivered  / COD Remmitance / Wallet -->

<!-- Today Orders / Current Month / Last Month Orders -->
<script type="text/javascript">
$(document).ready(function(){
  $(".notshowdatatcl").html("<center><img src='DashboardDetails/loader.gif' alt='Loading...' style='width:30px'></center>");
});
</script>
<!-- .row -->
<div class="row">
<div class="col-md-4 col-sm-12 col-xs-12">
  <div class="white-box">
      <h3 class="box-title"> Today Orders</h3>
      <div class="stats-row notshowdatatcl">
          <!-- No Data -->
      </div>
  </div>
</div>
<div class="col-md-4 col-sm-12 col-xs-12">
  <div class="white-box">
      <h3 class="box-title fontweigh">Current(<?= date('M'); ?>) Month</h3>
      <div class="stats-row notshowdatatcl" id="currentmonthdata">
        <!-- No Data -->
      </div>
  </div>
</div>
<div class="col-md-4 col-sm-12 col-xs-12">
  <div class="white-box">
      <h3 class="box-title fontweigh">Last(<?= date('F',strtotime("-1 Month")); ?>) Month</h3>
      <div class="stats-row notshowdatatcl" id="lastmonthdata">
        <!-- No Data -->
      </div>
  </div>
</div>
</div>
<!-- /.row -->
<!-- Today Orders / Current Month / Last Month Orders -->

<!-- Shipment Weignt / Performance / Volume Trend -->
<script type="text/javascript">
$(document).ready(function(){
    $(".notshowdataspv").html("<img src='DashboardDetails/loader.gif' alt='Loading...' style='width:50px'>");
});
</script>
<!-- .row -->
<div class="row" >
<!-- Shipment Weight -->
<div class="col-md-4 col-sm-12 col-xs-12">
    <div class="white-box">
        <h5 style="margin:0px;padding:0px" class="text-center"><b>Shipment Weight</b></h5><br>
        <div class="row">
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
        <div class="row">
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
        <div class="row">
          <div class='col-md-12 text-center notshowdataspv' style='margin-top:122px;margin-bottom:92px'>
            <!-- No Data -->
          </div>
        </div>
    </div>
</div>
<!-- Volume Trend -->
</div>
<!-- Shipment Weignt / Performance / Volume Trend -->

</div>
<!-- /.container-fluid -->





<!-- Default Today Details -->
</div>





















<!-- /#page-wrapper -->

<?php
include "Layout_Footer.php";
?>
