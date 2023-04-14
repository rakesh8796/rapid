<?php
  extract($_REQUEST);
  error_reporting(1);
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

<body style="background-color:#ffe141">
    <!-- <h1 class="error">Allied Login Form</h1> --><br>
    <div class="w3layouts-two-grids" style="border-radius:20px">
        <div class="mid-class">
                        
<div class="img-right-side" style="border-top-left-radius: 20px;border-bottom-left-radius: 28px;">
    
    <h3><a href="index.php" style="color:black">Welcome To Rappidx</a></h3>
    <!-- <p>Serving Happiness</p> -->
    <img src="images/b11.png" class="img-fluid" alt="">

<?php 
if(@$_GET['msg']=="Yes")
{
?>
    <h4><br><a href="#" style="color:green">Your Query Was Sent Successfully.<br> We Will Contact You Soon</a></h4>
<?php
}elseif(@$_GET['msg']=="No"){
?>
    <h4><br><a href="#" style="color:red">Please Try Again</a></h4>
<?php
}
?>

</div>
<div class="txt-left-side" style="background-color:#1a1a1a;border-top-right-radius: 28px;border-bottom-right-radius: 28px;">
    <h2> Sign Up </h2>



<style type="text/css">
input[type="text" i] {
    padding: 1px 2px;
}   
</style>

<style type="text/css">
.singnupform{
    width:100%;
    background-color:#1a1a1a;
    color:white
}
</style>

<form action="SignupNew.php" method="POST">
    <div class="form-left-to-w3l">
        <span class="fa fa-user" aria-hidden="true"></span>
        <input type="text" name="name" class="from-control singnupform" placeholder="Name *" autocomplete="off" required="">
        <div class="clear"></div>
    </div>

    <div class="form-left-to-w3l">
        <span class="fa fa-mobile" aria-hidden="true"></span>
        <input type="text" name="mobile" class="from-control singnupform" placeholder="Mobile *" autocomplete="off" required="">
        <div class="clear"></div>
    </div>

    <div class="form-left-to-w3l">
        <span class="fa fa-envelope-o" aria-hidden="true"></span>
        <input type="email" name="email" placeholder="Email" value="<?= $text1 ?>" autocomplete="off" required="">
        <div class="clear"></div>
    </div>

    <div class="form-left-to-w3l">
        <span class="fa fa-university" aria-hidden="true"></span>
        <input type="text" name="companystorename" class="from-control singnupform" placeholder="Company/ Store Name *" autocomplete="off" required="">
        <div class="clear"></div>
    </div>

    <div class="form-left-to-w3l">
        <span class="fa fa-filter" aria-hidden="true"></span>
        <select class="from-control singnupform" name="sellertype">
            <option value="">Select Seller Type *</option>
            <option value="Online Store / D2C">Online Store / D2C</option>
            <option value="Market Place">Market Place</option>
            <option value="Franchise">Franchise</option>
            <option value="Others">Others</option>
        </select>
        <div class="clear"></div>
    </div>

    <!--<div class="form-left-to-w3l">-->
    <!--    <span class="fa fa-lock" aria-hidden="true"></span>-->
    <!--    <input type="password" name="password" placeholder="Password *" required="">-->
    <!--    <div class="clear"></div>-->
    <!--</div>-->

    <!-- <div class="main-two-w3ls">
        <div class="left-side-forget">
            <input type="checkbox" class="checked">
            <span class="remenber-me">Remember me </span>
        </div>
        <div class="right-side-forget">
            <a href="#" class="for">Forgot password...?</a>
        </div>
    </div> -->

    <div class="btnn">
        <button type="submit" style="margin:0px">Sign up </button>
    </div>
</form>



<div class="w3layouts_more-buttn">
    <h3>Already Have an account..? <a href="Login.php"> Sign In Here</a></h3>
</div>
                


            </div>
        </div>
    </div>
    <!-- <footer class="copyrigh-wthree">
        <p>
            © 2019 Allied Login Form. All Rights Reserved | Design by
            <a href="#" target="_blank">W3Layouts</a>
        </p>
    </footer> -->
</body>

</html>