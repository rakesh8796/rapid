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
           
    