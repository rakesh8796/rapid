<?php

// session_start();

error_reporting(1);

extract($_REQUEST);

include "config/dbcon.php";

date_default_timezone_set('Asia/Calcutta');



// if(empty($_SESSION['usertype']))

// {

// echo "<script>window.location.assign('index.php')</script> ";

// }



$username = $_SESSION['username'];

$user_id = $_SESSION['useridis'];

$user_type = $_SESSION['usertype'];

$paneltitle = $_SESSION['paneltitle'];



// $result = $db->prepare("SELECT * FROM asitfa_user where User_id = '$user_id'");

// $result->execute();

// for($i=0; $row = $result->fetch(); $i++){



// $userid = $row['User_Email'];



$username = $_SESSION['username'];



$headerquery = "SELECT * FROM `asitfa_user` WHERE `User_Id`='$user_id'";

$headerfdata = mysqli_query($conn, $headerquery);

$hresult = mysqli_fetch_assoc($headerfdata);

// $hresult['Company_Name'];



?>

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
 
  <link rel="stylesheet" href="assets/bundles/pretty-checkbox/pretty-checkbox.min.css">
  <link rel="stylesheet" href="assets/css/custom.css">
  <!-- <link rel='shortcut icon' type='image/x-icon' href='assets/img/reppidxlogoicon.png' /> -->
</head>
<style>

</style>

<body>
  <!-- <div class="loader"></div> -->
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
              <div class="dropdown-title">Hello Sarah Smith</div>
              <a href="profile.html" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Profile
              </a> <a href="timeline.html" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i>
                Activities
              </a> <a href="#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="auth-login.html" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>

      </nav>
      <div class="text-right" style="margin-right: 2%;margin-top: 5%;margin-left:20%;margin-bottom:-7%;">
        <i class="fa fa-envelope"></i> <strong>Email:</strong>
        customersupport@rappidx.com&nbsp; &nbsp; &nbsp; &nbsp;
        <i class="fa fa-phone"></i> <strong>Connect us at:</strong> +91 9289013918
      </div>


      <?php include_once("sidebar.php");   ?>