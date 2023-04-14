<!DOCTYPE html>
<html lang="en">


<!-- datatables.html  21 Nov 2019 03:55:21 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Rappidx</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('assets/css/app.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/bundles/datatables/datatables.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
  <link rel='shortcut icon' type='image/x-icon' href='{{asset("assets/img/reppidxlogoicon.png")}}' />
</head>
<body>
  
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      @include("retailer/layouts/navbar")
      @include("retailer/layouts/sidebar")
       <!-- Main Content -->
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
                    <li class="list-inline-item p-r-10 text-center "><a href="" class="">
                        <i data-feather="arrow-down-circle" class="col-orange text-center"></i></a>
                        <h5 class="m-b-0 text-center">Download</h5>
                        <p class="text-muted font-14 m-b-0"> Download fail Order</p>
                      </li>
                      
                      <li class="list-inline-item p-r-10 text-center"><a href=""><i data-feather="arrow-down-circle" class="col-orange"></i></a>
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
  <!-- JS Libraies -->
  <script src="{{asset('assets/bundles/datatables/datatables.min.js')}}"></script>
  <script src="{{asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('assets/bundles/jquery-ui/jquery-ui.min.js')}}"></script>
  <!-- Page Specific JS File -->
  <script src="{{asset('assets/js/page/datatables.js')}}"></script>
  <!-- Template JS File -->
  <script src="{{asset('assets/js/scripts.js')}}"></script>
  <!-- Custom JS File -->
  <script src="{{asset('assets/js/custom.js')}}"></script>
</body>


<!-- datatables.html  21 Nov 2019 03:55:25 GMT -->
</html>