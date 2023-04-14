<?php
  include "Layout_Header-retailer.php";
?>

<!--  Header  -->
<?php
include "retailer-header-bulk.php";
?>
<!--  Header  -->

<body>
<div class="loader"></div>
<div id="app">
<div class="main-wrapper main-wrapper-1">
<div class="navbar-bg"></div>

<!-- Topbar -->
<?php
include "retailer-header-topbar.php";
?>
<!-- Topbar -->


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
</div>            <!-- Main Content -->
<div class="main-content">
<section class="section">
<div class="section-body">
<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="card">
<div class="card-header">
<h4>BOOK NEW ORDER</h4>
</div>
<div class="card-body">
<form id="wizard_with_validation" method="POST">
<h3> Product Details</h3>
<fieldset>
<div class="form-group form-float">
    <div class="form-line">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">

                    <select class="form-control">
                        <option>Product Category*</option>
                        <option>Apparel And Accessories</option>
                        <option>Automotives</option>
                        <option>Baby Care</option>
                        <option>Books And Stationery</option>
                        <option>Consumables FMCG</option>
                        <option>Documents</option>
                        <option>Electronics</option>
                        <option>Household Items</option>
                        <option>Sports Equipments</option>
                        <option>Covid Essentials</option>
                        <option>Other</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">

                    <input type="text" class="form-control" readonly="" value="order/item name">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group"><select class="form-control">
                        <option>Additional Details*</option>
                        <option>Dengerous Goods</option>
                        <option>Extra Care</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label class="form-label">Payment Mode*</label>
                <div class="form-group"><select class="form-control">

                        <option>COD</option>
                        <option>Prepaid</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3"><label class="form-label">COD Amount*</label>
                <input type="text" class="form-control" name="" required>
            </div>
            <div class="col-md-3"><label class="form-label">Actual Weight*</label>
                <input type="text" class="form-control" name="" required>
            </div>
            <div class="col-md-3"><label class="form-label">Total Amount*</label>
                <input type="text" class="form-control" name="" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label class="form-label">Product Length*</label>
                <input type="text" class="form-control" name="" required>
            </div>
            <div class="col-md-3"><label class="form-label">Product Breadth *</label>
                <input type="text" class="form-control" name="" required>
            </div>
            <div class="col-md-3"><label class="form-label">Product Height*</label>
                <input type="text" class="form-control" name="" required>
            </div>
            <div class="col-md-3"><label class="form-label">Volumetric Wt.*</label>
                <input type="text" class="form-control" name="" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label class="form-label">No of Quantity*</label>
                <input type="text" class="form-control" name="" required>
            </div>
            <div class="col-md-3"><label class="form-label">Invoice Value*</label>
                <input type="text" class="form-control" readonly="" value="Invoice Value">

            </div>

        </div>
    </div>


</fieldset>
<h3>Pickup Details</h3>
<fieldset>
<div class="form-group form-float">
    <div class="row">
        <div class="col-md-6">
            <label class="form-label">Name*</label>
            <input type="text" class="form-control" name="" required>
        </div>
        <div class="col-md-6"><label class="form-label">Mobile *</label>
            <input type="text" class="form-control" name="" required>

        </div>
    </div>
    <div class="form-group form-float">
        <div class="form-line">
            <label class="form-label">Address *</label>
            <textarea class="form-control" required=""></textarea>
        </div>
    </div>
    <div class="row">
            <div class="col-md-3">
                <label class="form-label">State*</label>
                <input type="text" class="form-control" name="" required>
            </div>
            <div class="col-md-3"><label class="form-label">City*</label>
                <input type="text" class="form-control" name="" required>
            </div>
            <div class="col-md-3"><label class="form-label">Pincode*</label>
                <input type="text" class="form-control" name="" required>
            </div>

        </div>


</fieldset>
<h3>Droppoint/ Destination Details</h3>
<fieldset>
<div class="form-group form-float">
<div class="form-group form-float">
        <div class="form-line">
            <label class="form-label">Address *</label>
            <textarea class="form-control" required=""></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label class="form-label">Name*</label>
            <input type="text" class="form-control" name="" required>
        </div>
        <div class="col-md-6"><label class="form-label">Mobile *</label>
            <input type="text" class="form-control" name="" required>

        </div>
    </div>

    <div class="row">
            <div class="col-md-3">
                <label class="form-label">State*</label>
                <input type="text" class="form-control" name="" required>
            </div>
            <div class="col-md-3"><label class="form-label">City*</label>
                <input type="text" class="form-control" name="" required>
            </div>
            <div class="col-md-3"><label class="form-label">Pincode*</label>
                <input type="text" class="form-control" name="" required>
            </div>

        </div>


</fieldset>
</form>
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
include "retailer-footer-single.php";
?>
<!--  Footer  -->
