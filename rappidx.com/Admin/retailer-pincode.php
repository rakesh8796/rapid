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
                        <h4>All Orders</h4>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="row mb-0">

                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <div class="list-inline text-center">

                                            <div class="form-group ">

                                                <h5 class="bold"><b>Serviceable Pincodes</b></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <div class="list-inline text-center">

                                            <div class="form-group ">

<a href="retailer-pincode-excel.php" class="btn btn-info btn-block active" style="border-radius:20px">Download Serviceable PinCode</a>
                                           <!--<h4> <span class="badge badge-primary ">Download Serviceable Pincodes</span> </h4>-->


                                            </div>
                                        </div>
                                    </div>
                                    <div class=" col-md-4 col-sm-4 col-xs-4">
                                        <div class="list-inline text-center">
                                            <div class="form-group ">
                                                <div class="row">
                                                    <!--<div class="col-md-4"> <select class="form-control badge">-->
                                                    <!--<option>500GM</option>-->

                                                </select></div>
                                                    <div class="col-md-8 ">
                                                    <input type="text" onkeyup="checkpincode(this.value)" class="form-control" placeholder="Search Pincode Number" style="border-radius:20px">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


<script type="text/javascript">
function checkpincode(param){
    if(param.length>3){
        $("#All_Records").html("<br><center><h4>Loading...<h4></center>");
        var weightcategory = $("#weightcategory").val();
        // alert(weightcategory);
        $.ajax({
            type: "GET",
            url: 'pincode_fetchc.php',
            data:{param:param,weightcategory:weightcategory},
            success: function (data) {
              // console.log(data);
              $("#All_Records").html(data);
            },
            error: function (data) {
              console.log('Error:', data);
            }
        });
    }
}
</script>

<div class="col-md-12">
  <div id="All_Records">
    <!-- <br><b><center>Waiting For Input</center></b> -->
    <!-- <hr style='border-bottom:2px solid gold'>
    <center><h3>Waiting For PinCode Input</h3></center>
    <hr style='border-bottom:2px solid gold'> -->
  </div>
</div>

                                </div>
                            </div>
                        </div>

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
