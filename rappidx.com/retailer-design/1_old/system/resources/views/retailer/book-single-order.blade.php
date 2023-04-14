<!DOCTYPE html>
<html lang="en">


<!-- form-wizard.html  21 Nov 2019 03:55:16 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Rappidx</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset('assets/css/app.min.css')}}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
    <link rel='shortcut icon' type='image/x-icon' href='{{asset("assets/img/reppidxlogoicon.png")}}' />
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
        @include("retailer/layouts/navbar")
      @include("retailer/layouts/sidebar")
            <!-- Main Content -->
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
            <footer class="main-footer">
                <div class="footer-left">
                    <a href="templateshub.net">Templateshub</a></a>
                </div>
                <div class="footer-right">
                </div>
            </footer>
        </div>
    </div>
    <!-- General JS Scripts -->
    <script src="{{asset('assets/js/app.min.js')}}"></script>
    <script src="{{asset('assets/bundles/jquery-validation/dist/jquery.validate.min.js')}}"></script>
    <!-- JS Libraies -->
    <script src="{{asset('assets/bundles/jquery-steps/jquery.steps.min.js')}}"></script>
    <!-- Page Specific JS File -->
    <script src="{{asset('assets/js/page/form-wizard.js')}}"></script>
    <!-- Template JS File -->
    <script src="{{asset('assets/js/scripts.js')}}"></script>
    <!-- Custom JS File -->
    <script src="{{asset('assets/js/custom.js')}}"></script>
</body>


<!-- form-wizard.html  21 Nov 2019 03:55:20 GMT -->

</html>