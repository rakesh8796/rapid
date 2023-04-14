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
    <div class="loader"></div>

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
                    <div class="section-body">
                        <div class="row">

                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Orders</h4>
                                        <div style="margin-left:25% ;">
                                            <div class="selectgroup w-100">
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="radio1" value="1" class="selectgroup-input-radio" checked>
                                                    <span class="selectgroup-button">&nbsp;&nbsp;B2C&nbsp;&nbsp;</span>
                                                </label>
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="radio1" value="2" class="selectgroup-input-radio">
                                                    <span class="selectgroup-button">&nbsp;&nbsp;B2B&nbsp;&nbsp;</span>
                                                </label>
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="radio1" value="3" class="selectgroup-input-radio">
                                                    <span class="selectgroup-button">International</span>
                                                </label>
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="radio1" value="4" class="selectgroup-input-radio">
                                                    <span class="selectgroup-button">Hyperlocal</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="card-header-form">
                                        <div class=" text-right " style="margin-right:2% ;">
                                            <a href="shipment.php" class="btn btn-outline-primary ">&nbsp;&nbsp; ship &nbsp;&nbsp;</i></a>
                                            <a href="singleorder.php" class="btn btn-outline-primary">Create Order</i></a>
                                            <a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModalCenter200">Bulk Upload</i></a>
                                            <a href="#" class="btn btn-outline-primary">change Courier </i></a>
                                            <a href="#" class="btn btn-outline-primary" type="reset">&nbsp;Refresh &nbsp;</i></a>
                                            <a href="#" class="btn btn-outline-primary" onclick="myFunction()">&nbsp;Filtter&nbsp;</i></a>
                                            <a href="#" class="btn btn-outline-primary">&nbsp;Report&nbsp;</i></a>
                                            <a href="#" class="btn btn-outline-primary">&nbsp;Cancel&nbsp;</i></a>
                                            <a href="#" class="btn btn-outline-primary">&nbsp;Print Label&nbsp;</i></a>
                                            <a href="manifest.php" class="btn btn-outline-primary">&nbsp;Manifest&nbsp;</i></a>
                                        </div>

                                    </div>
                                    <div class="col-md-12 my-2 " id="myDIV" style="display: none;">
                                        <div class="card  ">
                                            <div class="card-header">
                                                <h4>Filtter</h4>
                                                <div class="card-header-action">
                                                </div>
                                            </div>
                                            <div class="card-body  " style="background-color: #bfbfbf;">
                                                <div class="row">

                                                    <div class="col-md-3  ">
                                                        <label class="form-label" style="color:#0d0d0d ;">Date Range</label>
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
                                                    <div class="col-md-3 ">
                                                        <label class="form-label" style="color:#0d0d0d ;">Customer Name</label>
                                                        <form>
                                                            <div class="input-group ">
                                                                <input type="text" class="form-control " placeholder="Search by customer name">

                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="col-md-3 ">
                                                        <label class="form-label" style="color:#0d0d0d ;">Order Id</label>
                                                        <form>
                                                            <div class="input-group ">
                                                                <input type="text" class="form-control " placeholder="Search by Order Id">

                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="col-md-3 ">
                                                        <label class="form-label" style="color:#0d0d0d ;">Mobile No</label>
                                                        <form>
                                                            <div class="input-group ">
                                                                <input type="text" class="form-control " placeholder="Search by Mobile no">

                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="col-md-3 ">
                                                        <label class="form-label" style="color:#0d0d0d ;">Product Name</label>
                                                        <form>
                                                            <div class="input-group ">
                                                                <input type="text" class="form-control " placeholder="Search by Product name">

                                                            </div>
                                                        </form>
                                                    </div>


                                                    <div class="col-md-2">
                                                        <label class="form-label" style="color:#0d0d0d ;">Payment Mode*</label>
                                                        <div class="form-group">
                                                            <select class="form-control" id="paymentmode" name="ordertype" onchange="calculateraterefresh(),yesnoCheck(this)" required="">
                                                                <option value="">Select</option>
                                                                <option value="Prepaid">Prepaid</option>
                                                                <option value="COD">COD</option>
                                                                <option value="COD">COD/Prepaid</option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-3 my-2">
                                                        <label class="form-label"></label>
                                                        <div class="form-group" style="margin-top:1% ;">
                                                            <input type="submit" class="btn btn-outline-primary" value="Search">

                                                        </div>

                                                    </div>



                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        function myFunction() {
                                            var x = document.getElementById("myDIV");
                                            if (x.style.display === "none") {
                                                x.style.display = "block";
                                            } else {
                                                x.style.display === "none";
                                            }
                                        }
                                    </script>


                                    <div class="card-body " style="margin-top:2%;">
                                        <ul class="nav nav-pills" id="myTab3" role="tablist" style="margin-left:2% ;">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true">All Orders</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false" onclick="myFunction()">Not Shipped</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#contact3" role="tab" aria-controls="contact" aria-selected="false" onclick="myFunction()">Booked</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="contact-tab4" data-toggle="tab" href="#contact4" role="tab" aria-controls="contact4" aria-selected="false" onclick="myFunction()">Cancelled</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="contact-tab5" data-toggle="tab" href="#contact5" role="tab" aria-controls="contact5" aria-selected="false" onclick="myFunction()">Failed</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content  " id="myTabContent2">
                                            <div class="tab-pane fade show active my-2" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                                                <div class="table-responsive">
                                                    <table class="table table-striped">
                                                        <tr>
                                                            <th class="text-center">
                                                                <div class="custom-checkbox custom-checkbox-table custom-control">
                                                                    <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                                                    <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                                                </div>
                                                            </th>
                                                            <th>Order Id</th>
                                                            <th>Date</th>
                                                            <th>Customer </th>
                                                            <th>Mobile</th>
                                                            <th>Courier</th>
                                                            <th>City</th>
                                                            <th>Pincode</th>
                                                            <th>Type</th>
                                                            <!-- <th>Mode</th> -->
                                                            <th>Product</th>
                                                            <th>Weight</th>
                                                            <th>Status</th>

                                                            <th>Remark</th>
                                                            <th>Action</th>

                                                        </tr>
                                                        <tr>
                                                            <td class="p-0 text-center">
                                                                <div class="custom-checkbox custom-control">
                                                                    <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                                                                    <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                                                                </div>
                                                            </td>
                                                            <td>100457 </td>
                                                            <td>2018-01-20</td>
                                                            <td class="align-middle">
                                                                raj
                                                            </td>
                                                            <td>
                                                                98562374
                                                            </td>
                                                            <td>
                                                                Shree Maruti Courier
                                                            </td>

                                                            <td>
                                                                Delhi
                                                            </td>
                                                            <td>
                                                                110001
                                                            </td>
                                                            <td>
                                                                COD
                                                            </td>
                                                            <td>
                                                                hello
                                                            </td>
                                                            <td>
                                                                0.5kg
                                                            </td>
                                                            <th>pending</th>

                                                            <!-- <td><a href="#" class="btn btn-primary">view</a></td> -->
                                                            <td>hello</td>
                                                            <td>
                                                                <div class="dropdown d-inline">
                                                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        Action
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item has-icon" href="#"> Edit</a>
                                                                        <a class="dropdown-item has-icon" href="order-shipping.php"> Print Label </a>
                                                                        <a class="dropdown-item has-icon" href="#">Cancel</a>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                        </tr>


                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade my-2" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
                                                <div class="table-responsive">
                                                    <table class="table table-striped">
                                                        <tr>
                                                            <th class="text-center">
                                                                <div class="custom-checkbox custom-checkbox-table custom-control">
                                                                    <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                                                    <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                                                </div>
                                                            </th>
                                                            <th>Order Id</th>
                                                            <th>Date</th>
                                                            <th>Customer </th>
                                                            <th>Mobile</th>
                                                            <th>Courier</th>
                                                            <th>City</th>
                                                            <th>Pincode</th>
                                                            <th>Type</th>
                                                            <!-- <th>Mode</th> -->
                                                            <th>Product</th>
                                                            <th>Weight</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        <tr>
                                                            <td class="p-0 text-center">
                                                                <div class="custom-checkbox custom-control">
                                                                    <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                                                                    <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                                                                </div>
                                                            </td>
                                                            <td>100457 </td>
                                                            <td>2018-01-20</td>
                                                            <td class="align-middle">
                                                                raj
                                                            </td>
                                                            <td>
                                                                98562374
                                                            </td>
                                                            <td>
                                                                Shree Maruti Courier
                                                            </td>

                                                            <td>
                                                                Delhi
                                                            </td>
                                                            <td>
                                                                110001
                                                            </td>
                                                            <td>
                                                                COD
                                                            </td>
                                                            <td>
                                                                hello
                                                            </td>
                                                            <td>
                                                                0.5kg
                                                            </td>
                                                            <th>pending</th>
                                                            <td><a href="#" class="btn btn-primary">view</a></td>
                                                        </tr>


                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade my-2" id="contact3" role="tabpanel" aria-labelledby="contact-tab3">
                                                <div class="table-responsive">
                                                    <table class="table table-striped">
                                                        <tr>
                                                            <th class="text-center">
                                                                <div class="custom-checkbox custom-checkbox-table custom-control">
                                                                    <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                                                    <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                                                </div>
                                                            </th>
                                                            <th>Order Id</th>
                                                            <th>Date</th>
                                                            <th>Customer </th>
                                                            <th>Mobile</th>
                                                            <th>Courier</th>
                                                            <th>City</th>
                                                            <th>Pincode</th>
                                                            <th>Type</th>
                                                            <!-- <th>Mode</th> -->
                                                            <th>Product</th>
                                                            <th>Weight</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        <tr>
                                                            <td class="p-0 text-center">
                                                                <div class="custom-checkbox custom-control">
                                                                    <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                                                                    <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                                                                </div>
                                                            </td>
                                                            <td>100457 </td>
                                                            <td>2018-01-20</td>
                                                            <td class="align-middle">
                                                                raj
                                                            </td>
                                                            <td>
                                                                98562374
                                                            </td>
                                                            <td>
                                                                Shree Maruti Courier
                                                            </td>

                                                            <td>
                                                                Delhi
                                                            </td>
                                                            <td>
                                                                110001
                                                            </td>
                                                            <td>
                                                                COD
                                                            </td>
                                                            <td>
                                                                hello
                                                            </td>
                                                            <td>
                                                                0.5kg
                                                            </td>
                                                            <th>pending</th>
                                                            <td><a href="#" class="btn btn-primary">view</a></td>
                                                        </tr>


                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade my-2" id="contact4" role="tabpanel" aria-labelledby="contact-tab4">
                                                <div class="table-responsive">
                                                    <table class="table table-striped">
                                                        <tr>
                                                            <th class="text-center">
                                                                <div class="custom-checkbox custom-checkbox-table custom-control">
                                                                    <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                                                    <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                                                </div>
                                                            </th>
                                                            <th>Order Id</th>
                                                            <th>Date</th>
                                                            <th>Customer </th>
                                                            <th>Mobile</th>
                                                            <th>Courier</th>
                                                            <th>City</th>
                                                            <th>Pincode</th>
                                                            <th>Type</th>
                                                            <!-- <th>Mode</th> -->
                                                            <th>Product</th>
                                                            <th>Weight</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        <tr>
                                                            <td class="p-0 text-center">
                                                                <div class="custom-checkbox custom-control">
                                                                    <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                                                                    <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                                                                </div>
                                                            </td>
                                                            <td>100457 </td>
                                                            <td>2018-01-20</td>
                                                            <td class="align-middle">
                                                                raj
                                                            </td>
                                                            <td>
                                                                98562374
                                                            </td>
                                                            <td>
                                                                Shree Maruti Courier
                                                            </td>

                                                            <td>
                                                                Delhi
                                                            </td>
                                                            <td>
                                                                110001
                                                            </td>
                                                            <td>
                                                                COD
                                                            </td>
                                                            <td>
                                                                hello
                                                            </td>
                                                            <td>
                                                                0.5kg
                                                            </td>
                                                            <th>pending</th>
                                                            <td><a href="#" class="btn btn-primary">view</a></td>
                                                        </tr>


                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade my-2" id="contact5" role="tabpanel" aria-labelledby="contact-tab5">
                                                <div class="table-responsive">
                                                    <table class="table table-striped">
                                                        <tr>
                                                            <th class="text-center">
                                                                <div class="custom-checkbox custom-checkbox-table custom-control">
                                                                    <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                                                    <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                                                </div>
                                                            </th>
                                                            <th>Order Id</th>
                                                            <th>Date</th>
                                                            <th>Customer </th>
                                                            <th>Mobile</th>
                                                            <th>Courier</th>
                                                            <th>City</th>
                                                            <th>Pincode</th>
                                                            <th>Type</th>
                                                            <!-- <th>Mode</th> -->
                                                            <th>Product</th>
                                                            <th>Weight</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        <tr>
                                                            <td class="p-0 text-center">
                                                                <div class="custom-checkbox custom-control">
                                                                    <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                                                                    <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                                                                </div>
                                                            </td>
                                                            <td>100457 </td>
                                                            <td>2018-01-20</td>
                                                            <td class="align-middle">
                                                                raj
                                                            </td>
                                                            <td>
                                                                98562374
                                                            </td>
                                                            <td>
                                                                Shree Maruti Courier
                                                            </td>

                                                            <td>
                                                                Delhi
                                                            </td>
                                                            <td>
                                                                110001
                                                            </td>
                                                            <td>
                                                                COD
                                                            </td>
                                                            <td>
                                                                hello
                                                            </td>
                                                            <td>
                                                                0.5kg
                                                            </td>
                                                            <th>pending</th>
                                                            <td><a href="#" class="btn btn-primary">view</a></td>
                                                        </tr>


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
            <!-- Bulkorder popup Center -->
            <div class="modal fade" id="exampleModalCenter200" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">UPLOAD BULK ORDERS</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">

                                <label>Upload orders via excel file<span class="text-danger">*</span></label>

                            </div>
                            <hr>
                            <h6>CSV File With Sample Data: <a href="BulkExcelFiles/BulkOrdersSample/Sample_With_Data.csv">Download</a></h6>
                            <hr>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Upload CSV File</label>
                            </div>
                            <label>Please remove sample data before proceed<span class="text-danger">*</span></label>
                        </div>

                        <div class="modal-footer bg-whitesmoke br">
                            <button type="button" class="btn btn-primary">Upload</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
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