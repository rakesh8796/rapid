<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand" style="background-color:yellow ;">
      <a href="index.html"> <img alt="image" src="assets/img/reppidxlogoicon.png" class="header-logo" /> <span class="logo-name"><img alt="image" src="assets/img/logo.png" class="header-logo" /></span>
      </a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Main</li>
      <li class="dropdown active">
        <a href="{{asset('/retailer" class="nav-link"><i data-feather="monitor"></i><span>Franchise</span></a>
      </li>
      <li class="dropdown">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="briefcase"></i><span>Orders Off</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="{{('/retailer/orders">Orders</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="command"></i><span>Upload Orders</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="bulk-order">Bulk Order</a></li>
          <li><a class="nav-link" href="3" data-toggle="modal" data-target="#exampleModalCenter">Book Single Orders</a></li>

          <li><a class="nav-link" href="single-order">Today Single Order</a></li>

        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>Reports</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="mis-order">MIS</a></li>

        </ul>
      </li>
      <li><a class="nav-link" href="calculator"><i data-feather="layout"></i><span>Calculator off</span></a></li>
      <li><a class="nav-link" href="wallet"><i class="fa fa-wallet "></i><span>Wallet</span></a></li>
      <li><a class="nav-link" href="pincode"><i data-feather="map-pin"></i><span>Pincode</span></a></li>
      <li><a class="nav-link" href="print-shipping-label"><i data-feather="copy"></i><span>Print Shipping Labels</span></a></li>
      <li><a class="nav-link" href="order-tracking"><i data-feather="map"></i><span>Order Tracking</span></a></li>

    </ul>
  </aside>

</div>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<form action="" >
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
      <a href="book-single-order"> <button type="button" class="btn btn-primary">Save </button></a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
   
  </div>
  </form>
</div>