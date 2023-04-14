<?PHP
session_start();
error_reporting(1);
extract($_REQUEST);
include "Admin/config/dbcon.php";

if(!empty($_SESSION['usertype']))
{
    echo "<script>window.location.assign('Admin/index.php')</script> ";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Rappidx </title>
    <!-- Meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Rappidx"/>
    <link rel="icon" href="images/favicon.jpg" type="image/gif" sizes="16x16">
    <script>
        addEventListener("load", function () { setTimeout(hideURLbar, 0); }, false); function hideURLbar() { window.scrollTo(0, 1); }
    </script>
    <!-- Meta tags -->
    <!-- font-awesome icons -->
    <link href="Login/css/font-awesome.min.css" rel="stylesheet">
    <!-- //font-awesome icons -->
    <!--stylesheets-->
    <link href="Login/css/style.css" rel='stylesheet' type='text/css' media="all">
    <!--//style sheet end here-->
    <link href="//fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
</head>

<body style="background-color: gold">
    <!-- <h1 class="error">Allied Login Form</h1> --><br><br>
    <div class="w3layouts-two-grids" style="border-radius:20px">
        <div class="mid-class">
                        
<div class="img-right-side" style="border-top-left-radius: 20px;border-bottom-left-radius: 28px;">

    <h3><a href="index.php" style="color:black">Welcome To Rappidx</a></h3>
    <!-- <p>Serving Happiness</p> -->
    <img src="images/b11.png" class="img-fluid" alt="">

</div>
<div class="txt-left-side" style="background-color:#1a1a1a;border-top-right-radius: 28px;border-bottom-right-radius: 28px;">

<h2> Sign In </h2>
<form method="post" action="LoginCheck.php">
    <div class="form-left-to-w3l">
        <span class="fa fa-envelope-o" aria-hidden="true"></span>
        <input type="email" name="username" id="username" placeholder="Email" required="">

        <div class="clear"></div>
    </div>
    <div class="form-left-to-w3l ">

        <span class="fa fa-lock" aria-hidden="true"></span>
        <input type="password" name="password" id="password" placeholder="Password" required="">
        <div class="clear"></div>
    </div>
    <!--<div class="main-two-w3ls">-->
        <!-- <div class="left-side-forget">
            <input type="checkbox" class="checked">
            <span class="remenber-me">Remember me </span>
        </div> -->
        <!--<div class="right-side-forget">-->
        <!--    <a href="#" class="for">Forgot password...?</a>-->
        <!--</div>-->
    <!--</div>-->
    <div class="btnn">
        <button type="submit" name="loginchekc">Sign In </button>
    </div>
</form>

<div class="w3layouts_more-buttn">
    <h3>Don't Have an account..? <a href="Signup.php"> Sign Up</a></h3>
</div>
          
<?php 
    if(@$_GET['error']=='error')
    {
?>
<div class="col-md-12 text-center"><br>
    <span style="color:#60baaf"><b>Invalid Details | Contact Rappidx</b></span>
</div>
<?php
    }
?>      


            </div>
        </div>
    </div>
    <!-- <footer class="copyrigh-wthree">
        <p>
            © 2019 Allied Login Form. All Rights Reserved | Design by
            <a href="http://www.W3Layouts.com" target="_blank">W3Layouts</a>
        </p>
    </footer> -->
</body>

</html>