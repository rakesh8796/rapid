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
           <div class="col-12 col-sm-12 col-lg-12">
                <div class="card ">
                    <div class="card-header">
                        <h4>Wallet Details</h4>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <h6>
                                    TOTAL BALANCE</h6>
                            </div>
                            <div class="col-md-3"><i class="fa fa-wallet " style="font-size:30px">&nbsp;₹&nbsp;29</i></div>

                        </div>
                        <div class="row my-4">
                            <div class="col-md-4">
                                <h6>ADD BALANCE</h6>
                            </div>
                            <div class="col-md-3">

                                <input type="text" placeholder="0.0" class="form-control" style="border-color:#33333373;border-radius:20px" required="">

                            </div>
                            <div class="col-md-3">
                                <div class="buttons ">
                                    <a href="#" class="btn btn-primary badge">Add Amount</i></a>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h6></h6>
                  </div>
                  <div class="card-body">
                   
                    
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                        <thead>
                        <tr>
                            <th>Order No</th>
                            <th>Txn No</th>
                            <th>Date/Time</th>
                            <th>Last Amount</th>
                            <th>Update Amount</th>
                            <th>Total Amount</th>
                            <th>Status</th>
                           
                          </tr>
                        </thead>
                       <tbody>
                        <tr>
                            <td>RPWLN7</td>
                            <td>RPDX0054011</td>
                            <td>2022-04-05 17:15:03</td>
                            <td>249.75</td>
                            <td>10</td>
                            <td>239.75</td>
                            <td>- TXN_SUCCESS</td>
                        </tr>

                       </tbody>
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
