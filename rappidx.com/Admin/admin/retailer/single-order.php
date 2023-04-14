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
</div>       <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            
           <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>SINGLE ORDERS</h4>
                  </div>
                  <div class="card-body">
                    <div>
                    <ul class="list-inline text-right">
                    <li class="list-inline-item p-r-10 text-center "><a href="#" class="">
                        <i data-feather="arrow-down-circle" class="col-orange text-center"></i></a>
                        <h5 class="m-b-0 text-center">Download</h5>
                        <p class="text-muted font-14 m-b-0"> Download fail Order</p>
                      </li>
                      
                      <li class="list-inline-item p-r-10 text-center"><a href="#"><i data-feather="arrow-down-circle" class="col-orange"></i></a>
                        <h5 class="m-b-0">Download</h5>
                        <p class="text-muted font-14 m-b-0">Download successfull order</p>
                      </li>
                      
                    </ul>
                    </div>
                    
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                        <thead>
                        <tr>
                            <th>AWB Number</th>
                            <th>Customer Name</th>
                            <th>Customer Mobile</th>
                            <th>Customer Address</th>
                            <th>Customer State</th>
                            <th>Customer City</th>
                            <th>Customer Pincode</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>L/W/H</th>
                            <th>Weight</th>
                            <th>Total Amt</th>
                            <th>COD Amt</th>
                            <th>Additional Type</th>
                            <th>Upload Time</th>
                            <th>Pickup id</th>
                            <th>Pickup Name</th>
                            <th>Pickup Mobile</th>
                            <th>Pickup State</th>
                            <th>Pickup City</th>
                            <th>Pickup Pincode</th>
                            <th>Order Status</th>
                          </tr>
                        </thead>
                       <tbody></tbody>
                      </table>
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
