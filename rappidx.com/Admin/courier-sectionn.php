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
              <!--<div class="dropdown-title">Hello Sarah Smith</div>-->
              <!--<a href="profile.html" class="dropdown-item has-icon"> <i class="far-->
              <!--                          fa-user"></i> Profile-->
              <!--</a> <a href="timeline.html" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i>-->
              <!--  Activities-->
              <!--</a> <a href="#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>-->
              <!--  Settings-->
              <!--</a>-->
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
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Select Courier Priority </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-2">
                                <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab4" data-toggle="tab" href="#home4" role="tab" aria-controls="home" aria-selected="true">Courier Wise </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#profile4" role="tab" aria-controls="profile" aria-selected="false">Lane wise </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-12 col-sm-12 col-md-8">
                                <div class="tab-content no-padding" id="myTab2Content">
                                    <div class="tab-pane fade show active" id="home4" role="tabpanel" aria-labelledby="home-tab4">
                                        <div class="card-body">
                                            <ul class="nav nav-pills" id="myTab3" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true">Recommended By Rappidx</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false">Customize</a>
                                                </li>

                                            </ul>
                                            <div class="tab-content" id="myTabContent2">
                                                <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                                    cillum dolore eu fugiat nulla pariatur.
                                                </div>
                                                <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">

                                                    <div class="">
                                                        <div class="">
                                                            <div class="card-header">
                                                                <h4>Drag & Drop Row </h4>
                                                                <div class="card-header-action">

                                                                </div>
                                                            </div>
                                                            <div class="card-body p-0">
                                                                <div class="table-responsive">
                                                                    <table class="table table-striped" id="sortable-table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="text-center">
                                                                                    <i class="fas fa-th"></i>
                                                                                </th>
                                                                                <th>Courier Name</th>
                                                                                <th>Progress</th>
                                                                                <th>Members</th>
                                                                                <th>Due Date</th>
                                                                                <th>Status</th>
                                                                               
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    <div class="sort-handler">
                                                                                        <i class="fas fa-th"></i>
                                                                                    </div>
                                                                                </td>
                                                                                <td>maruti courier</td>
                                                                                <td class="align-middle">
                                                                                    <div class="progress" data-height="4" data-toggle="tooltip" title="100%">
                                                                                        <div class="progress-bar bg-success" data-width="100"></div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <img alt="image" src="assets/img/users/user-5.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Wildan Ahdian">
                                                                                </td>
                                                                                <td>2018-01-20</td>
                                                                                <td>
                                                                                    <div class="badge badge-success">Completed</div>
                                                                                </td>
                                                                               
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <div class="sort-handler">
                                                                                        <i class="fas fa-th"></i>
                                                                                    </div>
                                                                                </td>
                                                                                <td>delivery</td>
                                                                                <td class="align-middle">
                                                                                    <div class="progress" data-height="4" data-toggle="tooltip" title="40%">
                                                                                        <div class="progress-bar" data-width="40"></div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <img alt="image" src="assets/img/users/user-1.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Nur Alpiana">
                                                                                    <img alt="image" src="assets/img/users/user-3.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Hariono Yusup">
                                                                                    <img alt="image" src="assets/img/users/user-4.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Bagus Dwi Cahya">
                                                                                </td>
                                                                                <td>2018-04-10</td>
                                                                                <td>
                                                                                    <div class="badge badge-info">Todo</div>
                                                                                </td>
                                                                                
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <div class="sort-handler">
                                                                                        <i class="fas fa-th"></i>
                                                                                    </div>
                                                                                </td>
                                                                                <td>delivery1</td>
                                                                                <td class="align-middle">
                                                                                    <div class="progress" data-height="4" data-toggle="tooltip" title="70%">
                                                                                        <div class="progress-bar bg-warning" data-width="70"></div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <img alt="image" src="assets/img/users/user-1.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Rizal Fakhri">
                                                                                    <img alt="image" src="assets/img/users/user-2.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Hasan Basri">
                                                                                </td>
                                                                                <td>2018-01-29</td>
                                                                                <td>
                                                                                    <div class="badge badge-warning">In Progress</div>
                                                                                </td>
                                                                               
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <div class="sort-handler">
                                                                                        <i class="fas fa-th"></i>
                                                                                    </div>
                                                                                </td>
                                                                                <td>delivery3/td>
                                                                                <td class="align-middle">
                                                                                    <div class="progress" data-height="4" data-toggle="tooltip" title="100%">
                                                                                        <div class="progress-bar bg-success" data-width="100"></div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <img alt="image" src="assets/img/users/user-2.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Rizal Fakhri">
                                                                                    <img alt="image" src="assets/img/users/user-5.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Isnap Kiswandi">
                                                                                    <img alt="image" src="assets/img/users/user-4.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Yudi Nawawi">
                                                                                    <img alt="image" src="assets/img/users/user-1.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Khaerul Anwar">
                                                                                </td>
                                                                                <td>2018-01-16</td>
                                                                                <td>
                                                                                    <div class="badge badge-success">Completed</div>
                                                                                </td>
                                                                                
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <td><a href="#" class="btn btn-primary">save</a></td>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="profile4" role="tabpanel" aria-labelledby="profile-tab4">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <tr>
                                                    <th>
                                                        courier
                                                    </th>
                                                    <th>
                                                        <div class="custom-checkbox custom-checkbox-table custom-control">
                                                            <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input">
                                                            <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                                        </div>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        courier1
                                                    </td>
                                                    <th>
                                                        <div class="custom-checkbox custom-checkbox-table custom-control">
                                                            <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input">
                                                            <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                                        </div>
                                                    </th>
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
        </div>
    </section>
</div>
<!-- General JS Scripts -->
<script src="assets/js/app.min.js"></script>
<!-- JS Libraies -->
<script src="assets/bundles/jquery-ui/jquery-ui.min.js"></script>
<!-- Page Specific JS File -->
<script src="assets/js/page/advance-table.js"></script>
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