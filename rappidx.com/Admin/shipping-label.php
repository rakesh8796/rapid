<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Rappidx- User Dashboard</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/css/app.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="assets/css/custom.css">
    <!-- <link rel='shortcut icon' type='image/x-icon' href='assets/img/reppidxlogoicon.png' /> -->
</head>


<body>
    <div class="loader"></div>
    <div id="app">

        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg">

            </div>

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
                                    <input class="form-control" type="search" placeholder="Search AWB numbers" aria-label="Search" data-width="200">
                                    <button class="btn" type="submit">
                                        <i class="fas fa-search"></i>

                                    </button>
                                </div>

                            </form>

                        </li>
                    </ul>
                </div>
                <ul class="navbar-nav navbar-right">
                    <div class="buttons ">

                        <a href="#" class="btn btn-icon icon-left btn-primary " style="background-color:#4d4dff;border-radius: 5%;"><i class="fa fa-bolt" style="font-size: 17px;"></i> Balance ₹ 0</a>
                        <a href="#" class="btn btn-icon icon-left btn-primary " style="background-color: #ffff00 ;color:black;border-radius: 5%;"><i class="fa fa-whatsapp" style="font-size: 17px;"></i>&nbsp;Rappidx</a>

                        <button type="button" class="btn " style="background-color:#00cc00;
                      border-radius: 5%;" data-toggle="modal" data-target="#basicModal"><i class="fa fa-exclamation" style="font-size: 17px;"></i>&nbsp;Recharge
                        </button>

                    </div>
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
                <!-- <div class="sidebar-brand  sticky " style="background-color:yellow ;">
          <a href="dashboard.php"> <img alt="image" src="assets/img/reppidxlogoicon.png" class="header-logo " /> <span class="logo-name "><img alt="image" src="assets/img/logo.png" class="header-logo" /></span>
          </a>
        </div> -->
            </nav>
            <div class="text-right" style="margin-top: 5%;margin-left:20%;margin-bottom:-7%">
                <i class="fa fa-envelope"></i> <strong>Email:</strong>
                customersupport@rappidx.com&nbsp; &nbsp; &nbsp; &nbsp;
                <i class="fa fa-phone"></i> <strong>Connect us at:</strong> +91 9289013918
            </div>
            <?php include_once("sidebar.php");   ?>
            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-lg-12">
                            <div class="card ">
                                <div class="card-header">
                                    <h4>Print Labels</h4>

                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 ">
                                            <div class="card-header">
                                                <h4>Print Shipping Labels</h4>

                                            </div>
                                            <div class="pretty p-switch">
                                                <input type="checkbox" />
                                                <div class="state p-primary">
                                                    <label>Mobile Show</label>
                                                </div>
                                            </div>
                                            <div class="list-inline my-3 ">


                                                <textarea class="form-control" placeholder="Search Order Details Write AWB Number" name="shippinglabelawbno" class="my-5"><?= trim($ordernos) ?></textarea>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 my-3">
                                                    <select class="form-control " name="printlabels">
                                                        <option value="A6 Size New">Select Page Size</option>

                                                        <option value="A4 Size">A4 Size</option>

                                                        <option value="4X6 Size">4*6 Size</option>

                                                        <option value="A6 Size">A6 Size</option>

                                                        <option value="A6 Size New">A6 Size New</option>


                                                    </select>
                                                </div>
                                                <div class="col-md-2  my-3">
                                                    <div class="buttons ">
                                                        <!-- <a href="#" class="btn btn-primary form-control"><i class="fa fa-print">&nbsp;&nbsp;Print</i></a> -->
                                                        <input type="submit" class="btn btn-primary form-control" value="Print">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-6 ">
                                            <div class="card-header">
                                                <h4>Print Manifest Labels</h4>

                                            </div>
                                            <div class="pretty p-switch">
                                                <input type="checkbox" />
                                                <div class="state p-primary">
                                                    <label>Mobile Show</label>
                                                </div>
                                            </div>
                                            <div class="list-inline my-3 ">


                                                <textarea class="form-control" placeholder="Search Order Details Write AWB Number" name="shippinglabelawbno" class="my-5"><?= trim($ordernos) ?></textarea>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 my-3">
                                                    <select class="form-control " name="printlabels">
                                                        <option value="A6 Size New">Select Page Size</option>

                                                        <option value="A4 Size">A4 Size</option>

                                                        <option value="4X6 Size">4*6 Size</option>

                                                        <option value="A6 Size">A6 Size</option>

                                                        <option value="A6 Size New">A6 Size New</option>


                                                    </select>
                                                </div>
                                                <div class="col-md-2  my-3">
                                                    <div class="buttons ">
                                                        <!-- <a href="#" class="btn btn-primary form-control"><i class="fa fa-print">&nbsp;&nbsp;Print</i></a> -->
                                                        <input type="submit" class="btn btn-primary form-control" value="Print">
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

            <footer class="main-footer">
                <div class="footer-left">


                </div>
                <div class="footer-right"><i class="fa fa-envelope"></i> <strong>Email:</strong>
                    customersupport@rappidx.com&nbsp; &nbsp; &nbsp; &nbsp;
                    <i class="fa fa-phone"></i> <strong>Connect us at:</strong> +91 9289013918
                </div>
            </footer>
        </div>
    </div>
    <!-- recharge model  -->
    <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="border:2px solid black ;">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="background-color:  #f2f2f2 ;border:2px solid black ;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b>Recharge Your Wallet</b> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>

                <div class="modal-body ">
                    <hr style="border-top:3px solid gray ;" class="my-0">
                    <h6>Enter the amount for your recharge</h6>
                    <div class="text-center ">
                        <div class="row my-4">
                            <div class="col-md-3 my-1">
                                <p> <strong>Amount</strong> </p>
                            </div>
                            <div class="col-md-6"><input type="text" placeholder="₹" class="form-control" style="border-color:#33333373;border-radius:20px" value="500" required=""></div>
                            <div class="col-md-3"></div>

                        </div>
                        <div class="text-center my-3">
                            <a href="#" class="btn btn-primary badge">500</i></a>
                            <a href="#" class="btn btn-primary badge">1000</i></a>
                            <a href="#" class="btn btn-primary badge">2000</i></a>
                            <a href="#" class="btn btn-primary badge">5000</i></a>
                            <a href="#" class="btn btn-primary badge">10000</i></a>
                        </div>



                        <a href="#" class="btn btn-success badge">Recharge</i></a>
                    </div>

                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <!-- <button type="button" class="btn btn-primary">Save changes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $("#nav a").click(function(e) {
            e.preventDefault();
            $(".toggle").hide();
            var toShow = $(this).attr('href');
            $(toShow).show();
        });
    </script>

    <!-- General JS Scripts -->
    <script src="assets/js/app.min.js"></script>
    <!-- JS Libraies -->
    <script src="assets/bundles/apexcharts/apexcharts.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="assets/js/page/index.js"></script>
    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/page/chart-amchart.js"></script>
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->

</html>