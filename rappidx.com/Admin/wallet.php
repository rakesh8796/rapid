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
                    <!--        <div class="dropdown-title">Hello Sarah Smith</div>-->
                    <!--        <a href="profile.html" class="dropdown-item has-icon"> <i class="far-->
                    <!--fa-user"></i> Profile-->
                    <!--        </a> <a href="timeline.html" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i>-->
                    <!--            Activities-->
                    <!--        </a> <a href="#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>-->
                    <!--            Settings-->
                    <!--        </a>-->
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
                    <div class="section-body">

                        <div class="row">
                            <div class="col-12 col-sm-12 col-lg-12 ">
                                <h4>Wallet</h4>
                                <div class=" card">
                                    <div class="row">
                                        <div class="col-md-10 my-1 ">
                                            <div class="" style="margin-left:3%;"><i class="fas fa-wallet my-1" style="color:blue;border-radius: 50%;background-color: white;font-size:20px"></i><span style="font-size:15px"></i>
                                                    <strong style="font-size: 12px;">Total Balance</strong> &nbsp;₹&nbsp;29</div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="my-1"><button type="button" class="btn " style="background-color:#00cc00;
                      border-radius: 5%;" data-toggle="modal" data-target="#basicModal"><i class="fa fa-exclamation" style="font-size: 12px;"></i>&nbsp;Recharge
                                                </button></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 my-1">
                                <div class="row">
                                    <div class="col-md-3  ">
                                        <!-- <label class="form-label" style="color:#0d0d0d ;">Date Range</label> -->
                                        <div class="list-inline text-center">
                                            <div class="form-group ">
                                                <select class="form-control " id="type">
                                                    <option value="---Download Your Order---">---Select Data Range---</option>
                                                    <option value="Last seven days orders">Today</option>
                                                    <option value="Last seven days orders">Yesterday</option>
                                                    <option value="Last seven days orders">Last seven days </option>
                                                    <option value="Current Month Order">Current Month </option>
                                                    <option value="Last Month Order">Last Month </option>
                                                    <option value="All Time Order">All Time
                                                    </option>
                                                    <option value="Custom Date Range">Custom Date Range</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search">
                                                <div class="">
                                                    <button class="btn btn-primary"><i class="fas fa-search" style="height: 25px;"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="row">

                                            <div class="col-md-9"></div>

                                        </div>
                                        <div class="card">
                                            <div class="" style="margin-left:3%">
                                                <h6 class="my-1">Opening Balance</h6> <i class="fas fa-wallet" style="color:blue;border-radius: 50%;background-color: white;font-size:15px;margin-left:1%"></i>
                                                <span style="font-size:15px">₹&nbsp;<?= $tamt ?>9</i></span>
                                            </div>


                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-12 ">
                                <div class="card">

                                    <div class="card-body">
                                        <ul class="nav nav-pills" id="myTab3" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true">Deduction</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false">Recharge</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#contact3" role="tab" aria-controls="contact" aria-selected="false">Refunds</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent2">
                                            <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                                                <div class="">
                                                    <table class="table table-striped table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Date/Time</th>
                                                                <th>AWB</th>
                                                                <th>Amount</th>
                                                                <th>GST</th>
                                                                <th>Agent Fee</th>
                                                                <th>Total Deduction</th>
                                                                <th>Weight</th>
                                                                <th>Zone</th>
                                                                <th>Order status</th>
                                                                <th>Type</th>
                                                                <th>Transaction Id</th>
                                                                <th>status</th>



                                                            </tr>
                                                        </thead>
                                                        
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
                                                <div class="table-responsive">
                                                    <table class="table table-striped ">
                                                        <thead>
                                                            <tr>
                                                                <th>Date/Time</th>
                                                                <th>Amount</th>
                                                                <th>Transaction ID</th>
                                                                <th>Bank Transaction ID</th>
                                                                <th>Type</th>

                                                                <th>Status</th>
                                                                <th>Recharge</th>


                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>

                                                            </tr>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="contact3" role="tabpanel" aria-labelledby="contact-tab3">
                                                <div class="table-responsive">
                                                    <table class="table table-striped ">
                                                        <thead>
                                                            <tr>
                                                                <th>Date/Time</th>
                                                                <th>Amount</th>
                                                                <th>Transaction ID</th>
                                                                <th>Bank Transaction ID</th>
                                                                <th>Type</th>

                                                                <th>Status</th>
                                                                <th>Recharge</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>

                                                            </tr>

                                                        </tbody>
                                                    </table>
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
            <script>
                function yesnoCheck(that) {

                    if (that.value == "COD") {



                        document.getElementById("ifYes").style.display = "block";

                    } else {

                        document.getElementById("ifYes").style.display = "none";

                    }

                }
            </script>
            <footer class="main-footer">
                <div class="footer-left">
                    <a href="templateshub.net">Templateshub</a></a>
                    < </div>
                        <div class="footer-right">
                        </div>
            </footer>
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