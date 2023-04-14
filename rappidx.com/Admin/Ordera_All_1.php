<?php
    include "Layout_Header.php";
?>

<!-- Page Content -->


     <aside class="">



        <!--section ends-->


<!-- *  *   *   *   *   Download Functions  *   *   *   *   *    -->
<div class="container-fluid"><br>
<div class="col-md-12 white-box fontweighlight">
<div class="col-md-4">
    <select class="form-control" onchange="ManageOrders(this.value)" style="border-radius:20px">
        <option value="0">- -   - Download Your Orders -  -   -</option>
        <option value="Last24HourOrders">24 Hour/Today Orders</option>
        <option value="CurrentMonthOrders">Current Month Orders</option>
        <option value="LastMonthOrders">Last Month Orders</option>
        <option value="AllOrders">All Orders</option>
        <option value="CustomOrdersIs">Custom Date Range</option>
    </select>
</div>

<script type="text/javascript">
function ManageOrders(val){
    // alert(val)
    if(val == "Last24HourOrders"){
document.getElementById("AWBNumber").style.display = "none";
document.getElementById("OrderNumber").style.display = "none";
document.getElementById("All_Records").style.display = "none";
document.getElementById("AllOrders").style.display = "none";
            document.getElementById("CurrentMonth").style.display = "none";
            document.getElementById("LastMonth").style.display = "none";
            document.getElementById("CustomOrders").style.display = "none";
        document.getElementById("TodayOrders").style.display = "block";
    }else if(val == "CurrentMonthOrders"){
document.getElementById("AWBNumber").style.display = "none";
document.getElementById("OrderNumber").style.display = "none";
document.getElementById("All_Records").style.display = "none";
document.getElementById("AllOrders").style.display = "none";
            document.getElementById("TodayOrders").style.display = "none";
            document.getElementById("LastMonth").style.display = "none";
            document.getElementById("CustomOrders").style.display = "none";
        document.getElementById("CurrentMonth").style.display = "block";
    }else if(val == "LastMonthOrders"){
document.getElementById("AWBNumber").style.display = "none";
document.getElementById("OrderNumber").style.display = "none";
document.getElementById("All_Records").style.display = "none";
document.getElementById("AllOrders").style.display = "none";
            document.getElementById("TodayOrders").style.display = "none";
            document.getElementById("CurrentMonth").style.display = "none";
            document.getElementById("CustomOrders").style.display = "none";
        document.getElementById("LastMonth").style.display = "block";
    }else if(val == "CustomOrdersIs"){
document.getElementById("AWBNumber").style.display = "none";
document.getElementById("OrderNumber").style.display = "none";
document.getElementById("All_Records").style.display = "none";
document.getElementById("AllOrders").style.display = "none";
            document.getElementById("TodayOrders").style.display = "none";
            document.getElementById("CurrentMonth").style.display = "none";
            document.getElementById("LastMonth").style.display = "none";
        document.getElementById("CustomOrders").style.display = "block";
    }else if(val == "AllOrders"){
document.getElementById("AWBNumber").style.display = "none";
document.getElementById("OrderNumber").style.display = "none";
document.getElementById("All_Records").style.display = "none";
            document.getElementById("CurrentMonth").style.display = "none";
            document.getElementById("LastMonth").style.display = "none";
            document.getElementById("CustomOrders").style.display = "none";
            document.getElementById("TodayOrders").style.display = "none";
        document.getElementById("AllOrders").style.display = "block";
    }else{
document.getElementById("AWBNumber").style.display = "none";
document.getElementById("OrderNumber").style.display = "none";
document.getElementById("All_Records").style.display = "none";
document.getElementById("AllOrders").style.display = "none";
            document.getElementById("TodayOrders").style.display = "none";
            document.getElementById("CurrentMonth").style.display = "none";
            document.getElementById("LastMonth").style.display = "none";
            document.getElementById("CustomOrders").style.display = "none";
    }
}
</script>

<!-- Show According Selection -->
<div class="col-md-4 text-center" style="border-left:1px solid #22d69d;border-right:1px solid #22d69d">
<!-- 24/Today Orders Start -->
<div class="row" id="TodayOrders" style="display:none;">
    <a href="Ordera_All_Excel.php?OrderManageBy=Today" class="btn btn-link" style="font-size:15px;color:#595959;border-radius:20px">Download Today Orders</a>
</div>
<!-- 24/Today Orders  End-->
<!-- This Month Orders Start -->
<div class="row" id="CurrentMonth" style="display:none;">
    <a href="Ordera_All_Excel.php?OrderManageBy=Current" class="btn btn-link" style="font-size:15px;color:#595959;border-radius:20px">Download Current Month Order</a>
</div>
<!-- This Month Orders End -->
<!-- Last Month Orders Start -->
<div class="row" id="LastMonth" style="display:none;">
    <a href="Ordera_All_Excel.php?OrderManageBy=Last" class="btn btn-link" style="font-size:15px;color:#595959;border-radius:20px">Download Last Month Order</a>
</div>
<!-- Last Month Orders End -->
<!-- All Orders -->
<div class="row" id="AllOrders" style="display:none;">
    <!-- <form action="Ordera_All_Excel.php" action="POST"> -->
         <div class="col-md-12">
              <a href="Ordera_All_Excel.php?OrderManageBy=Custom" class="btn btn-link" style="font-size:15px;color:#595959;border-radius:20px">Download All Orders</a>
              <!-- <input type="hidden" name="OrderManageBy" value="Custom">
              <input type="submit" name="downloadfile" value="Download All Orders" class="btn btn-link" style="color:#595959;border-radius:20px"> -->
          </div>
    <!-- </form> -->
</div>
<!-- All Orders -->
<!-- Custom Orders Start -->
<div class="row" id="CustomOrders" style="display:none;">
    <form action="Ordera_All_Excel.php" action="POST">
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
                    <input type="submit" name="downloadfile" value="Download" class="btn btn-info" style="width:100%;border-color:#595959;background-color:#595959;border-radius:20px">
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
    <select class="form-control" onchange="SearchOrders(this.value)" style="border-radius:20px">
        <option value="0">- -   - Search By Order/AWB Number -  -   -</option>
        <option value="OrderNumber">Order Number</option>
        <option value="AWBNumber">AWB Number</option>
    </select>
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
            document.getElementById("All_Records").style.display = "none";
            document.getElementById("AWBNumber").style.display = "none";
        document.getElementById("OrderNumber").style.display = "block";
    }else if(val == "AWBNumber"){
document.getElementById("TodayOrders").style.display = "none";
document.getElementById("CurrentMonth").style.display = "none";
document.getElementById("LastMonth").style.display = "none";
document.getElementById("CustomOrders").style.display = "none";
            document.getElementById("All_Records").style.display = "none";
            document.getElementById("OrderNumber").style.display = "none";
        document.getElementById("AWBNumber").style.display = "block";
    }else{
document.getElementById("TodayOrders").style.display = "none";
document.getElementById("CurrentMonth").style.display = "none";
document.getElementById("LastMonth").style.display = "none";
document.getElementById("CustomOrders").style.display = "none";
        document.getElementById("AWBNumber").style.display = "none";
        document.getElementById("OrderNumber").style.display = "none";
        document.getElementById("All_Records").style.display = "none";
    }
}
</script>

<script type="text/javascript">
function checkpincode(param,cateis){
document.getElementById("All_Records").style.display = "block";
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
    $("#All_Records").html("<center><h5>Not Found AWB/Order Number</h5></center>");
}else{
  $("#All_Records").html("<center><h4>Loading...</h4></center>");
  $.ajax({
    type: "GET",
    url: 'OrderaAll/Search_Order.php',
    data:{param:param,cateis:cateis},
    success: function (data) {
      // console.log(data);
      $("#All_Records").html(data);
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

<div class="col-md-12 white-box">
  <div id="All_Records">  </div>
</div>

</div>
<!--  -->

<!-- *  *   *   *   *   Search Functions  *   *   *   *   *    -->



</aside>
</div>
<!-- ./wrapper -->
<!-- global js -->






<!-- /#page-wrapper -->

<?php
    include "Layout_Footer.php";
?>
