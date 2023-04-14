<?php
    include "Layout_Header.php";
?>

<!-- Page Content -->





<div class="col-md-12">
<div class="row bg-title">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <h4 class="page-title">Real Time Tracking</h4>
  </div>
</div>


<section class="content">
<div class="row">
<div class="col-lg-6">
<div class="panel">


<!-- <form method="post" action="Trackorder.php"> -->
    <div class="panel-body">
        <div class="row m-t-10">
            <div class="col-md-12">
                <div class="input-group">
<textarea rows="5" class="form-control" name="airwaybillnumber" id="airwaybillnumber" placeholder="Search Order Details Enter AWB Number"></textarea>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <input type="submit" class="btn btn-theme" name="TrackOrder" onclick="TrackMyOrder()" value="Track Order Now">
        </div>
    </div>
<!-- </form> -->
</div>
</div>
</div>
</section>

<script type="text/javascript">
function TrackMyOrder() {
    $("#TrackingData").html("<center><img src='OrderTrack/loading.gif' style='width:100px'></center>");
    var airwaybillnumber = $("#airwaybillnumber").val();

    $.ajax({
    type: "GET",
    url: "OrderTrack/OrderTracking.php",
    data:{airwaybillnumber:airwaybillnumber},
    success: function (data) {
        // alert(data);
        // $("#Changeabletext").html("<center><span style='color:#243c4f'><b>We Contact Very Soon</b></span></center>");
        $("#TrackingData").html(data);
    },
    error: function (data) {
      console.log('Error:', data);
    }
    });
    return true;
    }
</script>




























<div class="row" id="TrackingData">

</div>























</div>
<!-- ./wrapper -->
<!-- global js -->


</div>
<!-- /#page-wrapper -->
<?php
    include "Layout_Footer.php";
?>
