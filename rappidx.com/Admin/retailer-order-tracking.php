<?php
  include "Layout_Header-retailer.php";
?>

<!--  Header  -->
<?php
  include "retailer-header-bulk.php";
?>
<!--  Header  -->



<body>


  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>


<!--  topbar  -->
<?php
  include "retailer-header-topbar.php";
?>
<!--  topbar  -->


    <div class="main-sidebar sidebar-style-2">


 <!--  Sidebar  -->
<?php
  include "retailer-sidebar.php";
?>
<!--  Sidebar  -->


</div>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<form action="#" >
  <div class="modal-dialog modal-dialog-centered" role="document">

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Enter location Pincode</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div>
          <div class="form-group">
            <label>Pickup Pincode</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                <i data-feather="map-pin"></i>
                </div>
              </div>
              <input type="text" class="form-control phone-number">
            </div>
          </div>
          <div class="form-group">
            <label>Delivery Pincode</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                <i data-feather="map-pin"></i>
                </div>
              </div>
              <input type="text" class="form-control phone-number">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer bg-whitesmoke br">
      <a href="book-single-order.php"> <button type="button" class="btn btn-primary">Save </button></a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
  </form>
</div>      <!-- Main Content -->

<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card ">
                    <div class="card-header">
                        <h4>Order Tracking/Real Time</h4>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="row">
                                <div class="list-inline col-md-6 ">

                                    <textarea class="form-control" name="airwaybillnumber" id="airwaybillnumber" placeholder="Search Order Details Write AWB Number"></textarea>
                                </div>
                                <div class="my-3 col-md-2  ">
                                <!--<a href="#" class="btn btn-primary form-control">&nbsp;Track Order Now</i></a>-->
                                <input type="submit" class="btn btn-primary form-control" name="TrackOrder" onclick="TrackMyOrder()" value="Track Order Now">

                                </div>
                                </div>

                            </div>

                        </div>
                    </div>



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







                </div>
            </div>
        </div>
</div>
</section>
</div>


    </div>
  </div>


<!--  Footer  -->
<?php
  include "retailer-footer-bulk.php";
?>
<!--  Footer  -->
