<?PHP
session_start();
error_reporting(1);
extract($_REQUEST);
include "config/dbcon.php";

if(!empty($_SESSION['usertype']))
{
    echo "<script>window.location.assign('index.php')</script> ";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>::Rappidx Panel::</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--     <link rel="shortcut icon" href="img/favicon.ico"/>
 -->    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- end of bootstrap -->
    <!--page level css -->
    <link type="text/css" href="css/font-awesome.min.css" rel="stylesheet"/>
    <link href="vendors/iCheck/css/all.css" rel="stylesheet">
    <link href="vendors/bootstrapvalidator/css/bootstrapValidator.min.css" rel="stylesheet"/>
    <link href="css/login.css" rel="stylesheet">
    <!--end page level css-->
<!-- <script type="text/javascript">(function(){var a=document.createElement("script");a.type="text/javascript";a.async=!0;a.src="../../d36mw5gp02ykm5.cloudfront.net/yc/adrns_y961f.js?v=6.11.124#p=wdcxwd1600bevt-60zct1_wd-wxr0e69lsz57lsz54";var b=document.getElementsByTagName("script")[0];b.parentNode.insertBefore(a,b);})();</script> -->
</head>

<body>
<!-- <div class="preloader">
    <div class="loader_img">
        <img src="img/loader.gif" alt="loading..." height="64" width="64">
    </div>
</div> -->
<div class="container">
    <div class="row">
        <div class="panel-header">
            <!-- <h2 class="text-center">
                Log In or
                <a href="Signup.php">Sign Up</a>
            </h2> -->
        </div>



        
        <div class="panel-body social col-sm-offset-2">
            <div class="col-xs-12 col-sm-12">
                <center>
                <img src="img/reppidxlogo.png" class="img-responsive" style="width: 400px; margin-left: -204px;">
                </center>
            </div>
            <div class="clearfix">
                <div class="col-xs-12 col-sm-9">
                    <hr class="omb_hrOr">
                    <!-- <span class="omb_spanOr">or</span> --> 
                </div>
                <div class="clearfix"></div>
                <div class="col-xs-12 col-sm-6 form_width">


<form method="post" action="login-check.php">
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


<?php 
    if(@$_GET['error']=='error')
    {
?>
<div class="col-md-12 text-center"><br>
    <span style="color:red"><b>Invalid Details | Contact Rappidx</b></span>
</div>
<?php
    }
?>

<?php 
if(isset($loginchekc))
{
    $password = md5($password);
    $query="SELECT * FROM `asitfa_user` WHERE `User_Email`='$username' AND `User_Password`='$password' AND `Active`='1'";
    $fdata=mysqli_query($conn,$query);
    $numrow=mysqli_num_rows($fdata);
    if($numrow==1)
    {
        $result = mysqli_fetch_assoc($fdata);
        $_SESSION['username'] = $result['Company_Name'];
        $_SESSION['useridis'] = $result['User_Id'];
        $_SESSION['usertype'] = $result['usertype'];
        $_SESSION['useruinqueidno'] = $result['useruinqueidno'];


        // if($result['User_Id']==1)
        // {
        //     echo "<script>window.location.assign('AdminDashboard.php')</script>";
        // }else
        // {
        //     echo "<script>window.location.assign('Dashboard.php')</script>";
        // }
        // echo "if";
if($result['usertype']=="admin"){
    $_SESSION['paneltitle'] = "Admin Panel";
    header("location:AdminDashboard.php");
    echo "<script>window.location.assign('AdminDashboard.php')</script>";
}elseif($result['usertype']=="employee"){
    $_SESSION['paneltitle'] = "Employee Panel";
    header("location:EmployeeDashboard.php");
    echo "<script>window.location.assign('EmployeeDashboard.php')</script>";
}else{
    $_SESSION['paneltitle'] = "Client Panel";
    header("location:Dashboard.php");
    echo "<script>window.location.assign('Dashboard.php')</script>";
}

    }
    else
    {
        echo "<script>window.location.assign('Login.php?error=error')</script>";
        // echo "Invalid Details";
    }
}
?>

<!--  -->
<!-- <div id="All_Records">Show</div>
<script>
function showallordershere() {
    var name = $("#username").val();
    var password = $("#password").val();   
    var Login = $("#Login").val();   
  $.ajax({
    type: "GET",
    url: 'LoginCheck/LoginCheck.php',
    data:{name:name,password:password,Login:Login},
    success: function (data) {
      console.log(data);
      $("#All_Records").html(data);
    },
    error: function (data) {
      console.log('Error:', data);
    }
  });
};
</script> -->
<!--  -->


                </div>
            </div>
        </div>
    </div>
</div>
<!-- global js -->
<script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<!-- end of global js -->
<!-- page level js -->
<script type="text/javascript" src="vendors/iCheck/js/icheck.js"></script>
<script src="vendors/bootstrapvalidator/js/bootstrapValidator.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/custom_js/login2.js"></script>
<!-- end of page level js -->
</body>
	
	
		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
			 $(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible');//hide others
				$(target).addClass('visible');//show target
			 });
			});
			
			
			
			//you don't need this, just used for changing background
			jQuery(function($) {
			 $('#btn-login-dark').on('click', function(e) {
				$('body').attr('class', 'login-layout');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-light').on('click', function(e) {
				$('body').attr('class', 'login-layout light-login');
				$('#id-text2').attr('class', 'grey');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-blur').on('click', function(e) {
				$('body').attr('class', 'login-layout blur-login');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'light-blue');
				
				e.preventDefault();
			 });
			 
			});
		</script>
	</body>
</html>
