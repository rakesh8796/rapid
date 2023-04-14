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
<style>

</style>

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
            <form class="form-inline mr-auto" action="summary_s.php" method="Get">
                <div class="search-element">
                  <input class="form-control" type="search" placeholder="Search AWB numbers" aria-label="Search" data-width="200" name="cateis">
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
          <!--    <div class="dropdown-title">Hello Sarah Smith</div>-->
          <!--    <a href="profile.html" class="dropdown-item has-icon"> <i class="far-->
										<!--fa-user"></i> Profile-->
          <!--    </a> <a href="timeline.html" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i>-->
          <!--      Activities-->
          <!--    </a> <a href="#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>-->
          <!--      Settings-->
          <!--    </a>-->
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
      <!-- Main Content -->

      <div class="main-content">

        <section class="section">

          <div class="row ">

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Today</h5>
                          <h2 class="mb-3 font-18">258</h2>
                          <p class="mb-0"><span class="col-green">10%</span> Increase</p>
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
                          <h5 class="font-15"> Delivered </h5>
                          <h2 class="mb-3 font-18">0</h2>
                          <p class="mb-0"><span class="col-orange">09%</span> Decrease</p>
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
                          <h5 class="font-15">COD Balance</h5>
                          <h2 class="mb-3 font-18">₹0.00</h2>
                          <p class="mb-0"><span class="col-green">18%</span>
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
                          <h5 class="font-15">Wallet Balance</h5>
                          <h2 class="mb-3 font-18">₹0</h2>
                          <p class="mb-0"><span class="col-green">42%</span> Increase</p>
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
          <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
              <div class="card">
                <div class="card-header">
                  <div class="row">
                    <div class="col-md-12">
                      <select class=" form-control">
                        <option value="---Download Your Order---">---Select Range---</option>
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

                <div class="card-body">



                  <ul class="nav nav-pills" id="myTab3" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true">Over All Performnce </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#profile2" role="tab" aria-controls="profile" aria-selected="false">Zone Wise Performance</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false">Voulume Trend </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#profile4" role="tab" aria-controls="profile" aria-selected="false">Courier Wise Performance</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="profile-tab5" data-toggle="tab" href="#profile5" role="tab" aria-controls="profile" aria-selected="false">State Wise </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="profile-tab6" data-toggle="tab" href="#profile6" role="tab" aria-controls="profile" aria-selected="false">SKU Wise</a>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link" id="profile-tab7" data-toggle="tab" href="#profile7" role="tab" aria-controls="profile" aria-selected="false">TAT Wise</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="profile-tab8" data-toggle="tab" href="#profile8" role="tab" aria-controls="profile" aria-selected="false">Service Type</a>
                    </li>


                  </ul>
                  <div class="tab-content" id="myTabContent2">
                    <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                      <table class="table ">
                        <thead>
                          <tr>
                            <th scope="col">Over All Performnce</th>
                            <th scope="col">Date </th>
                            <th scope="col">Count</th>
                            <th scope="col">Delivered</th>
                            <th scope="col">Intransit </th>
                            <th scope="col">Undelivered / Expection</th>
                            <th scope="col">RTO</th>
                            <th scope="col">Percentage </th>
                            <th scope="col">Delivered</th>
                            <th scope="col">Intransit</th>
                            <th scope="col">Undelivered / Expection </th>
                            <th scope="col">RTO </th>
                          </tr>
                        </thead>

                      </table>
                    </div>
                    <div class="tab-pane fade" id="profile2" role="tabpanel" aria-labelledby="profile-tab2">
                      <table class="table ">

                        <thead>
                          <tr>

                            <th>Zone</th>
                            <th scope="col">Count</th>
                            <th scope="col">Delivered</th>
                            <th scope="col">Intransit </th>
                            <th scope="col">Undelivered / Expection</th>
                            <th scope="col">RTO</th>
                            <th scope="col">Percentage </th>
                            <th scope="col">Delivered</th>
                            <th scope="col">Intransit</th>
                            <th scope="col">Undelivered / Expection </th>
                            <th scope="col">RTO </th>
                          </tr>

                          <tr>

                            <td>East</td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"> </td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"> </td>

                          </tr>

                          <tr>

                            <th>West</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"> </th>
                            <th scope="col"> </th>
                            <th scope="col"></th>
                            <th scope="col"> </th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"> </th>
                            <th scope="col"> </th>

                          </tr>

                          <tr>

                            <td>North</td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"> </td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"> </td>

                          </tr>
                          <tr>

                            <th>South</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"> </th>
                            <th scope="col"> </th>
                            <th scope="col"></th>
                            <th scope="col"> </th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"> </th>
                            <th scope="col"> </th>

                          </tr>
                          <tr>

                            <td>Central</td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"> </td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"> </td>

                          </tr>
                          <tr>

                            <th>North east</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"> </th>
                            <th scope="col"> </th>
                            <th scope="col"></th>
                            <th scope="col"> </th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"> </th>
                            <th scope="col"> </th>
                          </tr>
                        </thead>
                      </table>
                    </div>
                    <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
                      <table class="table  ">
                        <tbody>
                          <tr>


                            <th scope="col">Mode</th>
                            <th scope="col">Delivered</th>
                            <th scope="col">Intransit </th>
                            <th scope="col">Undelivered / Expection</th>
                            <th scope="col">RTO</th>
                            <th scope="col">Percentage </th>
                            <th scope="col">Delivered</th>
                            <th scope="col">Intransit</th>
                            <th scope="col">Undelivered / Expection </th>
                            <th scope="col">RTO </th>
                          </tr>
                          <tr>

                            <td scope="col"> COD</td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"> </td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"> </td>
                          </tr>
                          <tr>

                            <td scope="col">Prepaid</td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"> </td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"> </td>
                          </tr>
                          <tr>

                            <td scope="col"> RVP</td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"> </td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"> </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="tab-pane fade" id="profile4" role="tabpanel" aria-labelledby="profile-tab4">
                      <table class="table ">
                        <tbody>
                          <tr>

                            <th>Courier </th>
                            <th scope="col">Count</th>
                            <th scope="col">Delivered</th>
                            <th scope="col">Intransit </th>
                            <th scope="col">Undelivered / Expection</th>
                            <th scope="col">RTO</th>
                            <th scope="col">Percentage </th>
                            <th scope="col">Delivered</th>
                            <th scope="col">Intransit</th>
                            <th scope="col">Undelivered / Expection </th>
                            <th scope="col">RTO </th>
                          </tr>
                          <tr>

                            <td>Amazon</td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"> </td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"> </td>

                          </tr>
                          <tr>

                            <td>Blue Dart</td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"> </td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"> </td>

                          </tr>
                          <tr>

                            <td>Delhivery Surface</td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"> </td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"> </td>

                          </tr>
                          <tr>

                            <td>Delhivery Air</td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"> </td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"> </td>

                          </tr>
                          <tr>

                            <td>Delhivery Bulky 5Kg</td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"> </td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"> </td>

                          </tr>
                          <tr>

                            <td>Delhivery Bulky 10 Kg</td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"> </td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"> </td>

                          </tr>
                          <tr>

                            <td>Ekart </td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"> </td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"> </td>

                          </tr>
                          <tr>

                            <td>Shree Maruti Courier Air</td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"> </td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"> </td>

                          </tr>
                          <tr>

                            <td>Shree Maruti Courier Surface</td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"> </td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"> </td>

                          </tr>
                          <tr>

                            <td>Shadowfax</td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"> </td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"> </td>

                          </tr>
                          <tr>

                            <td>pressbees Surface</td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"> </td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"> </td>

                          </tr>
                          <tr>

                            <td>Xpressbees Air</td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"> </td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"> </td>

                          </tr>
                          <tr>

                            <td>Xpressbees Bulky</td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"> </td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"> </td>

                          </tr>

                        </tbody>
                      </table>
                    </div>
                    <div class="tab-pane fade" id="profile5" role="tabpanel" aria-labelledby="profile-tab5">
                      <table class="table ">
                        <thead>
                          <tr>
                            <th scope="col">State Wise </th>
                            <th scope="col">State </th>
                            <th scope="col">Count</th>
                            <th scope="col">Delivered</th>
                            <th scope="col">Intransit </th>
                            <th scope="col">Undelivered / Expection</th>
                            <th scope="col">RTO</th>
                            <th scope="col">Percentage </th>
                            <th scope="col">Delivered</th>
                            <th scope="col">Intransit</th>
                            <th scope="col">Undelivered / Expection </th>
                            <th scope="col">RTO </th>
                          </tr>
                        </thead>
                        <tbody>

                          <tr>


                          </tr>


                        </tbody>
                      </table>
                    </div>
                    <div class="tab-pane fade" id="profile6" role="tabpanel" aria-labelledby="profile-tab6">
                      <table class="table ">
                        <thead>
                          <tr>
                            <th scope="col">KU Wise </th>
                            <th scope="col">Product</th>
                            <th scope="col">Count</th>
                            <th scope="col">Delivered</th>
                            <th scope="col">Intransit </th>
                            <th scope="col">Undelivered / Expection</th>
                            <th scope="col">RTO</th>
                            <th scope="col">Percentage </th>
                            <th scope="col">Delivered</th>
                            <th scope="col">Intransit</th>
                            <th scope="col">Undelivered / Expection </th>
                            <th scope="col">RTO </th>
                          </tr>
                        </thead>
                        <tbody>

                          <tr>


                          </tr>


                        </tbody>
                      </table>
                    </div>
                    <div class="tab-pane fade" id="profile7" role="tabpanel" aria-labelledby="profile-tab7">
                      <table class="table ">
                        <tbody>
                          <tr>



                            <th scope="col">Count</th>
                            <th scope="col">A</th>
                            <th scope="col">B </th>
                            <th scope="col"> C</th>
                            <th scope="col">D</th>
                            <th scope="col">E </th>
                            <th scope="col">F</th>
                            <th scope="col">Percentage</th>
                            <th scope="col">A</th>
                            <th scope="col">B </th>
                            <th scope="col"> C</th>
                            <th scope="col">D</th>
                            <th scope="col">E </th>
                            <th scope="col">F</th>
                          </tr>



                          <tr>

                            <td>Before TAT</td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"> </td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"> </td>

                          </tr>
                          <tr>

                            <td>On TAT</td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"> </td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"> </td>

                          </tr>
                          <tr>

                            <td>Out of TAT</td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"> </td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"> </td>

                          </tr>

                        </tbody>
                      </table>
                    </div>
                    <div class="tab-pane fade" id="profile8" role="tabpanel" aria-labelledby="profile-tab8">
                      <table class="table ">
                        <tbody>
                          <tr>



                            <th scope="col">Priority</th>
                            <th scope="col">Count </th>
                            <th scope="col">Before TAT </th>
                            <th scope="col"> On TAT</th>
                            <th scope="col">Out of TAT</th>
                            <th scope="col">Percentage </th>
                            <th scope="col">Before TAT</th>
                            <th scope="col">On TAT</th>
                            <th scope="col">Out of TAT</th>

                          </tr>



                          <tr>

                            <td>SDD</td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"> </td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"> </td>

                          </tr>
                          <tr>

                            <td>NDD</td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"> </td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"> </td>

                          </tr>
                          <tr>

                            <td>Statndard</td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"> </td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"> </td>
                            <td scope="col"> </td>

                          </tr>

                        </tbody>
                      </table>
                    </div>


                  </div>

                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
              <div class="card ">
                <div class="card-header">
                  <div class="row">
                    <div class="col-md-6">
                      <select class="form-control  ">
                        <option value="---Download Your Order---">---Select Range---</option>
                        <option value="Last seven days orders">Over All Performnce</option>
                        <option value="Current Month Order">Zone Wise Performance</option>
                        <option value="Last Month Order">Voulume Trend </option>
                        <option value="All Time Order">Courier Wise Performance</option>
                        <option value="Custom Date Range">State Wise</option>
                        <option value="Custom Date Range">SKU Wise </option>
                        <option value="Custom Date Range">TAT Wise</option>
                        <option value="Custom Date Range">Service Type</option>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <select class="form-control " id="type">
                        <option value="---Download Your Order---">---Select Range---</option>
                        <option value="Last seven days orders">Last seven days orders</option>
                        <option value="Current Month Order">Current Month Order</option>
                        <option value="Last Month Order">Last Month Order</option>
                        <option value="All Time Order">All Time
                          Order</option>
                        <option value="Custom Date Range">Custom Date Range</option>
                      </select>
                    </div>
                  </div>



                </div>
                <div class="card-body">
                  <div class="row">

                    <div class="col-lg-9">
                      <h6>Over All Performnce</h6>
                      <div id="chart1"></div>
                      <div class="row mb-0">

                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="row mt-5">
                        <div class="col-7 col-xl-7 mb-3">Date </div>
                        <div class="col-5 col-xl-5 mb-3">
                          <span class="text-big">8,257</span>
                          <sup class="col-green">+09%</sup>
                        </div>
                        <div class="col-7 col-xl-7 mb-3">Count</div>
                        <div class="col-5 col-xl-5 mb-3">
                          <span class="text-big">$9,857</span>
                          <sup class="text-danger">-18%</sup>
                        </div>
                        <div class="col-7 col-xl-7 mb-3">Delivered</div>
                        <div class="col-5 col-xl-5 mb-3">
                          <span class="text-big">28</span>
                          <sup class="col-green">+16%</sup>
                        </div>
                        <div class="col-7 col-xl-7 mb-3">Intransit</div>
                        <div class="col-5 col-xl-5 mb-3">
                          <span class="text-big">$6,287</span>
                          <sup class="col-green">+09%</sup>
                        </div>
                        <div class="col-7 col-xl-7 mb-3">Undelivered / Expection</div>
                        <div class="col-5 col-xl-5 mb-3">
                          <span class="text-big">684</span>
                          <sup class="col-green">+22%</sup>
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
        </div>
        <div class="footer-right">
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
          <hr style="border-top:1px solid gray ;" class="my-0">
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