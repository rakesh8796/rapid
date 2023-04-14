<!--  Header  -->
<?php
  include "layout-retailer/header-bulk.php";
?>
<!--  Header  -->



<body>
  
  
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
  

<!--  topbar  -->
<?php
  include "layout-retailer/header-topbar.php";
?>
<!--  topbar  -->


    <div class="main-sidebar sidebar-style-2">
 

 <!--  Sidebar  -->
<?php
  include "layout-retailer/sidebar.php";
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

                                    <textarea class="form-control"  placeholder="Search Order Details Write AWB Number"></textarea>
                                </div>
                                <div class="my-3 col-md-2  "> 
                                <a href="#" class="btn btn-primary form-control">&nbsp;Track Order Now</i></a>
                                        
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
  include "layout-retailer/footer-bulk.php";
?>
<!--  Footer  -->