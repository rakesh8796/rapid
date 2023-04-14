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
    <title>India's smartest e-commerce logistics & shipping solutions | Courier Aggregator</title>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="Rappidx is India's best logistics solutions & cheapest courier company in India for e-commerce business Rappidx offers the best shipping rates with multiple courier partners & integrates easily with all e-commerce platforms." />
    <meta name="description" content="Rappidx is India's best logistics solutions & cheapest courier company in India for e-commerce business Rappidx offers the best shipping rates with multiple courier partners & integrates easily with all e-commerce platforms." />
    <meta name="author" content="Singhaniya" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />


    <link rel="icon" href="images/favicon.jpg" type="image/gif" sizes="16x16">
    <!-- <script>
        addEventListener("load", function () { setTimeout(hideURLbar, 0); }, false); function hideURLbar() { window.scrollTo(0, 1); }
    </script> -->
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
    <!-- <div class="main-two-w3ls"> -->
        <!-- <div class="left-side-forget">
            <input type="checkbox" class="checked">
            <span class="remenber-me">Remember me </span>
        </div> -->
        <div class="right-side-forget">
            <!-- <a href="#" class="for">Forgot password...?</a> -->
            <strong><a href="ForgetPassword.php" class="for" style="color:#60baaf">Forgot password...?</a></strong>
        </div>
    <!-- </div> -->
    <div class="btnn">
        <button type="submit" name="loginchekc">Sign In </button>
    </div>
</form>

<div class="w3layouts_more-buttn">
    <h3>Don't Have an account..? <a href="Signup.php"> Sign Up</a></h3>
</div>

<!--  -->

<?php
    if(@$_GET['error']=='error'){
?>
<div class="col-md-12 text-center"><br>
    <span style="color:#60baaf"><b>Invalid Details | Contact Rappidx</b></span>
</div>
<?php
}elseif(@$_GET['error']=='pschange'){
?>
<div class="col-md-12 text-center"><br>
    <span style="color:#60baaf"><b>Password Change Successfully</b></span>
</div>
<?php
  }elseif(@$_GET['error']=='noaterror'){
?>
<div class="col-md-12 text-center"><br>
    <span style="color:#60baaf"><b>Account Not Active | Contact Rappidx</b></span>
</div>
<?php
  }
?>


<?php
// if(isset($loginchekc))
// {
//     $password = md5($password);
//     $query="SELECT * FROM `asitfa_user` WHERE `User_Email`='$username' AND `User_Password`='$password' AND `Active`='1'";
//     $fdata=mysqli_query($conn,$query);
//     $numrow=mysqli_num_rows($fdata);
//     if($numrow==1)
//     {
//         $result = mysqli_fetch_assoc($fdata);
//         $_SESSION['username'] = $result['Company_Name'];
//         $_SESSION['useridis'] = $result['User_Id'];
//         $_SESSION['usertype'] = $result['usertype'];
//         if($result['usertype']=="user")
//         {
//             echo "<script>window.location.replace('Admin/Dashboard.php')</script>";
//             echo "<script>location.reload()</script>";
//             // header("location:Admin/Dashboard.php");
//         }

//     }
//     else
//     {
//         header("location:Login.php?error=error");
//         // echo "<script>window.location.assign('Login.php?error=error')</script>";
//         // echo "Invalid Details";
//     }
// }
?>
<!--  -->



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
