<!DOCTYPE html>
<html>

<?php 
    include '../Header.php';
?>
<?php 
    include '../LeftPanel.php';
?>
     <aside class="right-side">
        
<section class="content">
<div class="row">
<div class="col-lg-6">
<div class="panel panel-success filterable">
<div class="panel-heading">
    <h3 class="panel-title">
        Order Tracking/Real Time
    </h3>
</div>

<!-- <form method="post" action="Trackorder.php"> -->
    <div class="panel-body">
        <div class="row m-t-10">
            <div class="col-md-12">
                <div class="input-group">
<textarea rows="5" class="form-control" name="airwaybillnumber" id="airwaybillnumber" placeholder="AWB Number (Use Comma(,) Between 2 AWB Numbers) [Max-20]    [ Please Not Use New-Line And Space( ) ]"></textarea>
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
    url: "OrderTrack/MyOrderTracking.php",
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






















             
    </aside>
</div>
<!-- ./wrapper -->
<!-- global js -->

<!-- end of page level js -->
<?php 
    include '../Footer.php';
?>
</body>


</html>