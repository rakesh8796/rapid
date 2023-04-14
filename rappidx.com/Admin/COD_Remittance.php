<!DOCTYPE html>
<html lang="en">


<!-- form-wizard.html  21 Nov 2019 03:55:16 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Rappidx</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/css/app.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">

    <!-- Custom style CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='assets/img/reppidxlogoicon.png' />


</head>
<style>

</style>

<body>


    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar sticky">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
                        <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                                <i data-feather="maximize"></i>
                            </a></li>
                        <li>
                            <form class="form-inline mr-auto">
                                <div class="search-element">
                                    <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
                                    <button class="btn" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </li>
                    </ul>
                </div>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle"><i data-feather="mail"></i>
                            <span class="badge headerBadge1">
                                6 </span> </a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                            <div class="dropdown-header">
                                Messages
                                <div class="float-right">
                                    <a href="#">Mark All As Read</a>
                                </div>
                            </div>
                            <div class="dropdown-list-content dropdown-list-message">
                                <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar
											text-white"> <img alt="image" src="assets/img/users/user-1.png" class="rounded-circle">
                                    </span> <span class="dropdown-item-desc"> <span class="message-user">John
                                            Deo</span>
                                        <span class="time messege-text">Please check your mail !!</span>
                                        <span class="time">2 Min Ago</span>
                                    </span>
                                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                                        <img alt="image" src="assets/img/users/user-2.png" class="rounded-circle">
                                    </span> <span class="dropdown-item-desc"> <span class="message-user">Sarah
                                            Smith</span> <span class="time messege-text">Request for leave
                                            application</span>
                                        <span class="time">5 Min Ago</span>
                                    </span>
                                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                                        <img alt="image" src="assets/img/users/user-5.png" class="rounded-circle">
                                    </span> <span class="dropdown-item-desc"> <span class="message-user">Jacob
                                            Ryan</span> <span class="time messege-text">Your payment invoice is
                                            generated.</span> <span class="time">12 Min Ago</span>
                                    </span>
                                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                                        <img alt="image" src="assets/img/users/user-4.png" class="rounded-circle">
                                    </span> <span class="dropdown-item-desc"> <span class="message-user">Lina
                                            Smith</span> <span class="time messege-text">hii John, I have upload
                                            doc
                                            related to task.</span> <span class="time">30
                                            Min Ago</span>
                                    </span>
                                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                                        <img alt="image" src="assets/img/users/user-3.png" class="rounded-circle">
                                    </span> <span class="dropdown-item-desc"> <span class="message-user">Jalpa
                                            Joshi</span> <span class="time messege-text">Please do as specify.
                                            Let me
                                            know if you have any query.</span> <span class="time">1
                                            Days Ago</span>
                                    </span>
                                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                                        <img alt="image" src="assets/img/users/user-2.png" class="rounded-circle">
                                    </span> <span class="dropdown-item-desc"> <span class="message-user">Sarah
                                            Smith</span> <span class="time messege-text">Client Requirements</span>
                                        <span class="time">2 Days Ago</span>
                                    </span>
                                </a>
                            </div>
                            <div class="dropdown-footer text-center">
                                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg"><i data-feather="bell" class="bell"></i>
                        </a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                            <div class="dropdown-header">
                                Notifications
                                <div class="float-right">
                                    <a href="#">Mark All As Read</a>
                                </div>
                            </div>
                            <div class="dropdown-list-content dropdown-list-icons">
                                <a href="#" class="dropdown-item dropdown-item-unread"> <span class="dropdown-item-icon bg-primary text-white"> <i class="fas
												fa-code"></i>
                                    </span> <span class="dropdown-item-desc"> Template update is
                                        available now! <span class="time">2 Min
                                            Ago</span>
                                    </span>
                                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-info text-white"> <i class="far
												fa-user"></i>
                                    </span> <span class="dropdown-item-desc"> <b>You</b> and <b>Dedik
                                            Sugiharto</b> are now friends <span class="time">10 Hours
                                            Ago</span>
                                    </span>
                                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-success text-white"> <i class="fas
												fa-check"></i>
                                    </span> <span class="dropdown-item-desc"> <b>Kusnaedi</b> has
                                        moved task <b>Fix bug header</b> to <b>Done</b> <span class="time">12
                                            Hours
                                            Ago</span>
                                    </span>
                                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-danger text-white"> <i class="fas fa-exclamation-triangle"></i>
                                    </span> <span class="dropdown-item-desc"> Low disk space. Let's
                                        clean it! <span class="time">17 Hours Ago</span>
                                    </span>
                                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-info text-white"> <i class="fas
												fa-bell"></i>
                                    </span> <span class="dropdown-item-desc"> Welcome to Otika
                                        template! <span class="time">Yesterday</span>
                                    </span>
                                </a>
                            </div>
                            <div class="dropdown-footer text-center">
                                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="assets/img/user.png" class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
                        <div class="dropdown-menu dropdown-menu-right pullDown">
          <!--                  <div class="dropdown-title">Hello Sarah Smith</div>-->
          <!--                  <a href="profile.html" class="dropdown-item has-icon"> <i class="far-->
										<!--fa-user"></i> Profile-->
          <!--                  </a> <a href="timeline.html" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i>-->
          <!--                      Activities-->
          <!--                  </a> <a href="#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>-->
          <!--                      Settings-->
          <!--                  </a>-->
                            <div class="dropdown-divider"></div>
                            <a href="Logout.php" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="text-right" style="margin-top: 5%;margin-left:20%;margin-bottom:-7%">
                <i class="fa fa-envelope"></i> <strong>Email:</strong>
                customersupport@rappidx.com&nbsp; &nbsp; &nbsp; &nbsp;
                <i class="fa fa-phone"></i> <strong>Connect us at:</strong> +91 9289013918
            </div>
            <?php include_once("sidebar.php");   ?>
            <div class="main-content">
                <section class="section">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-lg-12">
                            <div class="card ">
                                <div class="card-header">
                                    <h4>COD Remittance </h4>
                                    <div class="card-header-action">

                                    </div>
                                </div>

                                <div class="card-body " style="background-color: #bfbfbf;">
                                    <div class="row ">
                                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="card">
                                                <div class="card-statistic-4">
                                                    <div class="align-items-center justify-content-between">
                                                        <div class="row ">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                                                <div class="card-content">
                                                                    <h5 class="font-15">Total COD</h5>
                                                                    <h2 class="mb-3 font-18">---</h2>
                                                                    <p class="mb-0"><span class="col-green">0%</span> Increase</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                                                <div class="banner-img">
                                                                    <img src="assets/img/banner/1.png" alt="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="card">
                                                <div class="card-statistic-4">
                                                    <div class="align-items-center justify-content-between">
                                                        <div class="row ">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                                                <div class="card-content">
                                                                    <h5 class="font-15">Remitted COD</h5>
                                                                    <h2 class="mb-3 font-18">---</h2>
                                                                    <p class="mb-0"><span class="col-orange">0%</span> Decrease</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                                                <div class="banner-img">
                                                                    <img src="assets/img/banner/2.png" alt="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="card">
                                                <div class="card-statistic-4">
                                                    <div class="align-items-center justify-content-between">
                                                        <div class="row ">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                                                <div class="card-content">
                                                                    <h5 class="font-15">Total COD Due</h5>
                                                                    <h2 class="mb-3 font-18">---</h2>
                                                                    <p class="mb-0"><span class="col-green">0%</span>
                                                                        Increase</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                                                <div class="banner-img">
                                                                    <img src="assets/img/banner/3.png" alt="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="card">
                                                <div class="card-statistic-4">
                                                    <div class="align-items-center justify-content-between">
                                                        <div class="row ">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                                                <div class="card-content">
                                                                    <h5 class="font-15">Revenue</h5>
                                                                    <h2 class="mb-3 font-18">---</h2>
                                                                    <p class="mb-0"><span class="col-green">0%</span> Increase</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                                                <div class="banner-img">
                                                                    <img src="assets/img/banner/4.png" alt="">
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

                            <div class="   " style="background-color:  #ffffff;">
                                <div class="row">
                                    <div class="col-lg-12 my-3" style="margin-left:2%">

                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                                                <thead>
                                                    <tr>
                                                        <th>Remittance ID </th>
                                                        <th>Due date</th>
                                                        <th>Estimated Amount</th>
                                                        <th>Freight Deduction </th>
                                                        <th>Remittance Amount</th>

                                                        <th>Transaction ID</th>
                                                        <th>Report</th>

                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    
                                                </tbody>
                                            </table>
                                        </div>




                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
            </div>
            </section>
        </div>



        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                $("#type").change(function() {
                    var val = $(this).val();
                    if (val == "Last seven days orders") {
                        $("#size").html("<i class='fa fa-download'></i><a value='Last seven days orders' ></a>");
                    } else if (val == "Current Month Order") {
                        $("#size").html("<i class='fa fa-download'></i><a value='Current Month Order'>Report</a>");
                    } else if (val == "Last Month Order") {
                        $("#size").html("<i class='fa fa-download'></i><a value='Download Last Month Order'>Report</a>");
                    } else if (val == "All Time Order") {
                        $("#size").html("<i class='fa fa-download'></i><a value='All Time Order'>Report</a>");
                    } else if (val == "Custom Date Range") {
                        $("#size").html("<i class='fa fa-download'></i><a value='Download Custom Date Range'>Custom Date Range</a>");
                    } else if (val == "---Download Your Order---") {
                        $("#size").html("");
                    }

                });
            });
        </script>


    </div>
    </div>

    <!-- General JS Scripts -->
    <script src="assets/js/app.min.js"></script>
    <script src="assets/bundles/jquery-validation/dist/jquery.validate.min.js"></script>
    <!-- JS Libraies -->
    <script src="assets/bundles/jquery-steps/jquery.steps.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="assets/js/page/form-wizard.js"></script>
    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="assets/js/custom.js"></script>


</body>


<!-- form-wizard.html  21 Nov 2019 03:55:20 GMT -->

</html>