<?php
    include "Layout_Header.php";
?>

<!-- Page Content -->




<aside class="right-side" style="opacity:5;">
<!-- <aside class="right-side" style="background-color:#F1F3F4;opacity:5;"> -->


<section class="content">




























<div class="row">
    <!-- *  *   *   *   *   Download Functions  *   *   *   *   *    -->
<div class="container-fluid">
<div class="col-md-12">

<div class="col-md-1 text-center">
    <h4><strong>Filter</strong></h4>
</div>
<div class="col-md-2 text-left">
    <select class="form-control" onchange="ManageOrders(this.value)" style="border-radius:20px">
        <option value="0">- - - Select - - -</option>
        <option value="TodayDay">Today</option>
        <option value="Last7Days">Last 7 Days</option>
        <option value="Last30Days">Last 30 Days</option>
        <option value="Last90Days">Last 90 Days</option>
        <option value="CustomOrdersIs">Custom Date Range</option>
    </select>
</div>
<div class="col-md-9 text-left">
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
$( document ).ready(function() {
    var enddatefrom = $("#todaydatecal").val();
    var startdatefrom = $("#todaydatecal").val();
    $.ajax({
    type: "GET",
    url: 'Dashboard/Dashboard.php',
    data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom},
    success: function (data){
      // console.log(data);
      $("#All_Records").html(data);
    },
    error: function (data) {
      console.log('Error:', data);
    }
    });
    $.ajax({
    type: "GET",
    url: 'Dashboard/Dashboard.php',
    data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom},
    success: function (data){
      // console.log(data);
      $("#All_Records").html(data);
    },
    error: function (data) {
      console.log('Error:', data);
    }
    });
});
function ManageOrders(val){
    // alert(val)
    if(val == "TodayDay"){
        var enddatefrom = $("#todaydatecal").val();
        var startdatefrom = $("#todaydatecal").val();
        $.ajax({
        type: "GET",
        url: 'Dashboard/Dashboard.php',
        data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom},
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
        data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom},
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
        data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom},
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
        data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom},
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
        data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom},
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
        data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom},
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
        data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom},
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
        data:{startdatefrom:startdatefrom,enddatefrom:enddatefrom},
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




<div class="col-md-12" id="All_Records">

</div>





































            <!-- /#right --> </section>
        <!-- /.content --> </aside>
    <!-- /.right-side --> </div>
<!-- ./wrapper -->
<!-- global js -->




<!-- /#page-wrapper -->

<?php
    include "Layout_Footer.php";
?>
