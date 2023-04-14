<!DOCTYPE html>
<html lang="en">


<!-- checkbox-and-radio.html  21 Nov 2019 03:51:00 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Otika - Admin Dashboard Template</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset('assets/css/app.min.css')}}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/bundles/pretty-checkbox/pretty-checkbox.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
    <link rel='shortcut icon' type='image/x-icon' href='{{asset("assets/img/favicon.ico")}}' />
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
                    <div class="row">
                        <div class="col-12 col-sm-12 col-lg-12">
                            <div class="card ">
                                <div class="card-header">
                                    <h4>Print Shipping Labels</h4>

                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 ">
                                            <div class="pretty p-switch">
                                                <input type="checkbox" />
                                                <div class="state p-primary">
                                                    <label>Mobile Show</label>
                                                </div>
                                            </div>
                                            <div class="list-inline my-3 ">


                                                <textarea class="form-control" placeholder="Search Order Details Write AWB Number" class="my-5"></textarea>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 my-3"> <select class="form-control badge">
                                                        <option>Select Page Size</option>
                                                        <option>A4 Size</option>
                                                        <option>4*6 Size</option>
                                                        <option>A6 Size</option>
                                                        <option>A6 Size New</option>


                                                    </select>
                                                </div>
                                             <div class="col-md-2  my-3">
                                                <div class="buttons ">
                                                    <a href="#" class="btn btn-primary form-control"><i class="fa fa-print">&nbsp;&nbsp;Print</i></a>
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
    <!-- Page Specific JS File -->
    <!-- Template JS File -->
    <script src="{{asset('assets/js/scripts.j')}}s"></script>
    <!-- Custom JS File -->
    <script src="{{asset('assets/js/custom.js')}}"></script>
</body>


<!-- checkbox-and-radio.html  21 Nov 2019 03:51:01 GMT -->

</html>