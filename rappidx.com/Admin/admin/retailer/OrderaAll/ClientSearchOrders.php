<?php
session_start();
error_reporting(1);
extract($_REQUEST);
include "../config/dbcon.php";
date_default_timezone_set('Asia/Calcutta');

if(empty($_SESSION['usertype']))
{
echo "<script>window.location.assign('index.php')</script> ";
}

$username = $_SESSION['username'];
$user_id = $_SESSION['useridis'];
$user_type = $_SESSION['usertype'];
$paneltitle = $_SESSION['paneltitle'];

// $result = $db->prepare("SELECT * FROM asitfa_user where User_id = '$user_id'");
// $result->execute();
// for($i=0; $row = $result->fetch(); $i++){

// $userid = $row['User_Email'];

$username = $_SESSION['username'];

$headerquery = "SELECT * FROM `asitfa_user` WHERE `User_Id`='$user_id'";
$headerfdata = mysqli_query($conn,$headerquery);
$hresult = mysqli_fetch_assoc($headerfdata);
// $hresult['Company_Name'];

?>

<head>
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <link href="plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    <!-- Menu CSS -->
    <link href="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/megna.css" id="theme" rel="stylesheet">
    <style media="screen">
.success {
  -webkit-animation: seconds 1.0s forwards;
  -webkit-animation-iteration-count: 1;
  -webkit-animation-delay: 5s;
  animation: seconds 1.0s forwards;
  animation-iteration-count: 1;
  animation-delay: 5s;
  position: relative;

}
@-webkit-keyframes seconds {
  0% {
    opacity: 1;
  }
  100% {
    opacity: 0;
    left: -9999px;
    position: absolute;
  }
}
@keyframes seconds {
  0% {
    opacity: 1;
  }
  100% {
    opacity: 0;
    left: -9999px;
    position: absolute;
  }
}


</style>
</head>




<?php
// session_start();
// error_reporting(1);
// extract($_REQUEST);
// include "../config/dbcon.php";
// date_default_timezone_set('Asia/Calcutta');
// // echo $param;
?>

<?php
    // include "../Layout_Header_Folder.php";
?>



<!-- *  *   *   *   *   Download Functions  *   *   *   *   *    -->
<div class="container-fluid"><br>
<div class="col-md-12 white-box fontweighlight">
<div class="col-md-4">
    <select class="form-control" onchange="ManageOrders(this.value)" style="border-radius:20px">
        <option value="0">- -   - Download Your Orders -  -   -</option>
        <!-- <option value="Last24HourOrders">24 Hour/Today Orders</option> -->
        <option value="Last7DaysOrders">Last 7 Days Orders</option>
        <option value="CurrentMonthOrders">Current Month Orders</option>
        <option value="LastMonthOrders">Last Month Orders</option>
        <option value="CustomOrdersIs">Custom Date Range</option>
    </select>
</div>

<script type="text/javascript">
function ManageOrders(val){
    // alert(val)
    if(val == "Last24HourOrders"){
document.getElementById("AWBNumber").style.display = "none";
document.getElementById("OrderNumber").style.display = "none";
document.getElementById("All_RecordsClients").style.display = "none";
            document.getElementById("CurrentMonth").style.display = "none";
            document.getElementById("LastMonth").style.display = "none";
            document.getElementById("CustomOrders").style.display = "none";
            document.getElementById("Last7Days").style.display = "none";
        document.getElementById("TodayOrders").style.display = "block";
    }else if(val == "Last7DaysOrders"){
document.getElementById("AWBNumber").style.display = "none";
document.getElementById("OrderNumber").style.display = "none";
document.getElementById("All_RecordsClients").style.display = "none";
            document.getElementById("TodayOrders").style.display = "none";
            document.getElementById("LastMonth").style.display = "none";
            document.getElementById("CustomOrders").style.display = "none";
            document.getElementById("CurrentMonth").style.display = "none";
        document.getElementById("Last7Days").style.display = "block";
      }else if(val == "CurrentMonthOrders"){
  document.getElementById("AWBNumber").style.display = "none";
  document.getElementById("OrderNumber").style.display = "none";
  document.getElementById("All_RecordsClients").style.display = "none";
              document.getElementById("TodayOrders").style.display = "none";
              document.getElementById("LastMonth").style.display = "none";
              document.getElementById("CustomOrders").style.display = "none";
              document.getElementById("Last7Days").style.display = "none";
          document.getElementById("CurrentMonth").style.display = "block";
    }else if(val == "LastMonthOrders"){
document.getElementById("AWBNumber").style.display = "none";
document.getElementById("OrderNumber").style.display = "none";
document.getElementById("All_RecordsClients").style.display = "none";
            document.getElementById("TodayOrders").style.display = "none";
            document.getElementById("CurrentMonth").style.display = "none";
            document.getElementById("CustomOrders").style.display = "none";
            document.getElementById("Last7Days").style.display = "none";
        document.getElementById("LastMonth").style.display = "block";
    }else if(val == "CustomOrdersIs"){
document.getElementById("AWBNumber").style.display = "none";
document.getElementById("OrderNumber").style.display = "none";
document.getElementById("All_RecordsClients").style.display = "none";
            document.getElementById("TodayOrders").style.display = "none";
            document.getElementById("CurrentMonth").style.display = "none";
            document.getElementById("LastMonth").style.display = "none";
            document.getElementById("Last7Days").style.display = "none";
        document.getElementById("CustomOrders").style.display = "block";
    }else{
document.getElementById("AWBNumber").style.display = "none";
document.getElementById("OrderNumber").style.display = "none";
document.getElementById("All_RecordsClients").style.display = "none";
            document.getElementById("TodayOrders").style.display = "none";
            document.getElementById("CurrentMonth").style.display = "none";
            document.getElementById("LastMonth").style.display = "none";
            document.getElementById("CustomOrders").style.display = "none";
            document.getElementById("Last7Days").style.display = "none";
    }
}
</script>

<!-- Show According Selection -->
<div class="col-md-4 text-center" style="border-left:1px solid #5A5A5A;border-right:1px solid #5A5A5A">
<!-- 24/Today Orders Start -->
<div class="row" id="TodayOrders" style="display:none;">
    <a href="OrderaAllExcel/Client_All_Excel.php?OrderManageBy=Today" class="btn" style="font-size:15px"><u>Download Today Orders</u></a>
</div>
<!-- 24/Today Orders  End-->
<!-- 7 Days Orders Start -->
<div class="row" id="Last7Days" style="display:none;">
    <a href="OrderaAllExcel/Client_Last_7_Day_Excel.php?OrderManageBy=Last7Days" class="btn" style="font-size:15px"><u>Download 7 Days Orders</u></a>
</div>
<!-- 7 Days Orders  End-->
<!-- This Month Orders Start -->
<div class="row" id="CurrentMonth" style="display:none;">
    <a href="OrderaAllExcel/Client_Current_Month_Excel.php?OrderManageBy=Current" class="btn" style="font-size:15px"><u>Download Current Month Order</u></a>
</div>
<!-- This Month Orders End -->
<!-- Last Month Orders Start -->
<div class="row" id="LastMonth" style="display:none;">
    <a href="OrderaAllExcel/Client_Last_Month_Excel.php?OrderManageBy=Last" class="btn" style="font-size:15px"><u>Download Last Month Order</u></a>
</div>
<!-- Last Month Orders End -->
<!-- Custom Orders Start -->
<div class="row" id="CustomOrders" style="display:none;">
    <form action="OrderaAllExcel/Client_All_Month_Excel.php" action="POST">
        <div class="col-md-2 col-sm-2 text-right"><h5><strong>From</strong></h5></div>
        <div class="col-md-10 col-sm-10 text-left">
            <input type="date" name="startdatefrom" class="form-control" style="border-radius:20px">
        </div>
        &ensp;<br>
        <div class="col-md-2 col-sm-2 text-right"><h5><strong>To</strong></h5></div>
        <div class="col-md-10 col-sm-10 text-left">
            <input type="date" name="enddatefrom" class="form-control" style="border-radius:20px">
        </div>
        &ensp;
        <div class="col-md-12 col-sm-12 text-center">
            <div class="row">
                <div class="col-md-2 text-right"></div>
                <div class="col-md-10">
                    <input type="hidden" name="OrderManageBy" value="Custom">
                    <input type="submit" name="downloadfile" value="Download Filter Excel Orders" class="btn btn-default" style="border-radius:20px;background:#5A5A5A;color:#fff;">
                </div>
            </div>
        </div>
    </form>
    <br>&ensp;<br>
</div>
<!-- Custom Orders End -->
<!-- Order Number Start -->
<div class="row" id="OrderNumber" style="display:none;"><center>
    <input type="text" id="OSearchBox" onkeyup="checkpincode(this.value,'orderno')" class="form-control" placeholder="Search Order Number" style="border-radius:20px;width:80%" autocomplete="off">
</center></div>
<!-- Order Number  End-->
<!-- AWN Number Start -->
<div class="row" id="AWBNumber" style="display:none;"><center>
    <input type="text" id="ASearchBox" onkeyup="checkpincode(this.value,'awbno')" class="form-control" placeholder="Search AWB Number" style="border-radius:20px;width:80%" autocomplete="off">
</center></div>
<!-- AWB Number End -->

</div>
<div class="col-md-4">
    <!-- <select class="form-control" onchange="SearchOrders(this.value)" style="border-radius:20px">
        <option value="0">- -   - Search By Order/AWB Number -  -   -</option>
        <option value="OrderNumber">Order Number</option>
        <option value="AWBNumber">AWB Number</option>
    </select> -->
</div>

<!-- Show According Selection -->

</div>
</div>
<!-- *  *   *   *   *   //Download Functions  *   *   *   *   *    -->

<!-- *  *   *   *   *   Search Functions  *   *   *   *   *    -->


<script type="text/javascript">
function SearchOrders(val){
    // alert(val)
    if(val == "OrderNumber"){

document.getElementById("TodayOrders").style.display = "none";
document.getElementById("CurrentMonth").style.display = "none";
document.getElementById("LastMonth").style.display = "none";
document.getElementById("CustomOrders").style.display = "none";
document.getElementById("Last7Days").style.display = "none";
            document.getElementById("All_RecordsClients").style.display = "none";
            document.getElementById("AWBNumber").style.display = "none";
        document.getElementById("OrderNumber").style.display = "block";
    }else if(val == "AWBNumber"){
document.getElementById("TodayOrders").style.display = "none";
document.getElementById("CurrentMonth").style.display = "none";
document.getElementById("LastMonth").style.display = "none";
document.getElementById("CustomOrders").style.display = "none";
document.getElementById("Last7Days").style.display = "none";
            document.getElementById("All_RecordsClients").style.display = "none";
            document.getElementById("OrderNumber").style.display = "none";
        document.getElementById("AWBNumber").style.display = "block";
    }else{
document.getElementById("TodayOrders").style.display = "none";
document.getElementById("CurrentMonth").style.display = "none";
document.getElementById("LastMonth").style.display = "none";
document.getElementById("CustomOrders").style.display = "none";
document.getElementById("Last7Days").style.display = "none";
        document.getElementById("AWBNumber").style.display = "none";
        document.getElementById("OrderNumber").style.display = "none";
        document.getElementById("All_RecordsClients").style.display = "none";
    }
}
</script>

<script type="text/javascript">
function checkpincode(param,cateis){
document.getElementById("All_RecordsClients").style.display = "block";
var newtext = param.substr(0,5);
var maxlength = 9;
if(newtext == "I0308"){
    maxlength = 9;
}else if(newtext == "D7822"){
    maxlength = 9;
}else if(newtext == "RPDX0"){
    maxlength = 9;
}else if(newtext == "14315"){
    maxlength = 14;
}else if(newtext == "84451"){
    maxlength = 13;
}else{
    maxlength = 9;
}
// alert(maxlength);
var resultis = param.length ;
if(resultis<maxlength){
    // alert(param);
    $("#All_RecordsClients").html("<center><h5>Not Found AWB/Order Number</h5></center>");
}else{
  $("#All_RecordsClients").html("<center><h4>Loading...</h4></center>");
  $.ajax({
    type: "GET",
    url: 'OrderaAll/Search_Order.php',
    data:{param:param,cateis:cateis},
    success: function (data) {
      // console.log(data);
      $("#All_RecordsClients").html(data);
      // $("#OSearchBox").val('');
      // $("#ASearchBox").val('');

    },
    error: function (data) {
      console.log('Error:', data);
    }
  });
}
}
</script>

<!--  -->
<div class="col-md-12">

<!-- <div class="col-md-12 white-box"> -->
<div class="col-md-12">
  <div id="All_RecordsClients">  </div>
</div>

</div>
<!--  -->

<!-- *  *   *   *   *   Search Functions  *   *   *   *   *    -->



<?php
    include "../Layout_Footer_Table.php";
?>
