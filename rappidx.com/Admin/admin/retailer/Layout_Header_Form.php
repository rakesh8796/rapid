<?php
session_start();
error_reporting(1);
extract($_REQUEST);
include "config/dbcon.php";
date_default_timezone_set('Asia/Calcutta');

if(empty($_SESSION['usertype']))
{
echo "<script>window.location.assign('index.php')</script> ";
}

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
$headerfdata = mysqli_query($conn,$headerquery);
$hresult = mysqli_fetch_assoc($headerfdata);
// $hresult['Company_Name'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/favicon.jpg" type="image/gif" sizes="16x16">
    <title><?= $paneltitle ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">

    <!-- color CSS -->
    <link href="css/colors/megna.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<style media="screen">
.success {
  -webkit-animation: seconds 1.0s forwards;
  -webkit-animation-iteration-count: 1;
  -webkit-animation-delay: 5s;
  animation: seconds 1.0s forwards;
  animation-iteration-count: 1;
  animation-delay: 5s;
  position: relative;

}
@-webkit-keyframes seconds {
  0% {
    opacity: 1;
  }
  100% {
    opacity: 0;
    left: -9999px;
    position: absolute;
  }
}
@keyframes seconds {
  0% {
    opacity: 1;
  }
  100% {
    opacity: 0;
    left: -9999px;
    position: absolute;
  }
}


</style>
</head>





















<body>
<!-- Preloader -->
<div class="">
<!--<div class="cssload-speeding-wheel"></div>-->
</div>
<div id="wrapper">
<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top m-b-0">
  <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>

<div class="top-left-part">
<a class="logo" href="index.php">
<b><img src="img/reppidxlogoicon.png" alt="Rappidx" title="Rappidx" style="width:50%" /></b>
<!-- <span class="hidden-xs"><strong>elite</strong>hospital</span> -->
<span class="hidden-xs"><img src="img/reppidxlogo.png" alt="Rappidx" title="Rappidx" style="width:50%" /></span>

</a>
</div>

      <ul class="nav navbar-top-links navbar-left hidden-xs">
          <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
          <!-- <li>
              <form role="search" class="app-search hidden-xs">
                  <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a> </form>
          </li> -->
      </ul>
      <ul class="nav navbar-top-links navbar-right pull-right">

<!-- Notifications  -->
<?php
// Admin Panel Only
if($user_type=="admin"){
$websitqueyr = "SELECT count(`websitejoinid`) FROM `asitfa_user_website` WHERE `formstatus`='Pending' ORDER BY `websitejoinid` DESC";
$websitqueyru = mysqli_query($conn,$websitqueyr);
$websitqueyre = mysqli_fetch_assoc($websitqueyru);
?>
<li class="dropdown">
  <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#" style="font-size:21px">
    <i class="icon-envelope" style="color:black;"></i>
    <?php
      if($websitqueyre["count(`websitejoinid`)"]){
    ?>
        <div class="notify">
          <span class="heartbit" style="top:-25px !important"></span>
          <span class="point" style="top:-15px !important"></span>
        </div>
    <?php
      }
    ?>
  </a>
<ul class="dropdown-menu mailbox animated bounceInDown">
  <li>
        <div class="drop-title">You have <?= $websitqueyre["count(`websitejoinid`)"]; ?> new messages</div>
    </li>
    <li>
        <div class="message-center">
<?php
$websitqueyr = "SELECT * FROM `asitfa_user_website` WHERE `formstatus`='Pending' ORDER BY `websitejoinid` DESC";
$websitqueyru = mysqli_query($conn,$websitqueyr);
$normals = 1;
while($websitqueyre = mysqli_fetch_assoc($websitqueyru)){
if($normals<6){
?>
<a href="Website_All.php">
  <div class="user-img"> <img src="img/notification_msg.png" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
  <div class="mail-contnet">
      <h5><?= $websitqueyre['name'] ?></h5>
      <!-- <span class="mail-desc">Just see the my admin!</span> -->
      <span class="time"><?= $websitqueyre['requestdate'] ?></span>
  </div>
</a>
<?php
}
$normals++;
}
?>
        </div>
    </li>
    <?php
      if($normals>6){
    ?>
      <li>
        <a class="text-center" href="Website_All.php"> <strong>See All </strong> <i class="fa fa-angle-right"></i> </a>
      </li>
    <?php
      }
     ?>
</ul>
</li>
<?php
// Admin Panel Only
}elseif($user_type=="employee"){
// Employee
$empall = "SELECT * FROM `asitfa_user_access` WHERE `loginuser_id`='$user_id'";
$empallr = mysqli_query($conn,$empall);
$empallres = mysqli_fetch_assoc($empallr);
// Employee
// Permission Grandted
if($empallres['emp_websiterequest']){
// Permission Grandted
$websitqueyr = "SELECT count(`websitejoinid`) FROM `asitfa_user_website` WHERE `formstatus`='Pending' ORDER BY `websitejoinid` DESC";
$websitqueyru = mysqli_query($conn,$websitqueyr);
$websitqueyre = mysqli_fetch_assoc($websitqueyru);
?>
<li class="dropdown">
  <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#" style="font-size:21px">
    <i class="icon-envelope" style="color:black;"></i>
    <?php
      if($websitqueyre["count(`websitejoinid`)"]){
    ?>
        <div class="notify">
          <span class="heartbit" style="top:-25px !important"></span>
          <span class="point" style="top:-15px !important"></span>
        </div>
    <?php
      }
    ?>
  </a>
<ul class="dropdown-menu mailbox animated bounceInDown">
  <li>
        <div class="drop-title">You have <?= $websitqueyre["count(`websitejoinid`)"]; ?> new messages</div>
    </li>
    <li>
        <div class="message-center">
<?php
$websitqueyr = "SELECT * FROM `asitfa_user_website` WHERE `formstatus`='Pending' ORDER BY `websitejoinid` DESC";
$websitqueyru = mysqli_query($conn,$websitqueyr);
$normals = 1;
while($websitqueyre = mysqli_fetch_assoc($websitqueyru)){
if($normals<6){
?>
<a href="Website_Request.php">
  <div class="user-img"> <img src="img/notification_msg.png" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
  <div class="mail-contnet">
      <h5><?= $websitqueyre['name'] ?></h5>
      <!-- <span class="mail-desc">Just see the my admin!</span> -->
      <span class="time"><?= $websitqueyre['requestdate'] ?></span>
  </div>
</a>
<?php
}
$normals++;
}
?>
        </div>
    </li>
    <?php
      if($normals>6){
    ?>
      <li>
        <a class="text-center" href="Website_Request.php"> <strong>See All </strong> <i class="fa fa-angle-right"></i> </a>
      </li>
    <?php
      }
     ?>
</ul>
</li>
<?php
// Permission Grandted
}
// Permission Grandted
}
?>
<!-- Notifications  -->



          <!-- /.dropdown -->
          <li class="dropdown">
              <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="img/user.png" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"><?= $hresult['Company_Name'] ?></b>&ensp;<i class="fa fa-sort-desc"></i> &ensp; </a>
              <ul class="dropdown-menu dropdown-user animated flipInY">
                  <li><a href="ChangePassword.php"><i class="ti-settings"></i>  Change Password </a></li>
                  <li><a href="Logout.php"><i class="fa fa-power-off"></i>  Logout</a></li>
              </ul>
              <!-- /.dropdown-user -->
          </li>
      </ul>
  </div>
  <!-- /.navbar-header -->
  <!-- /.navbar-top-links -->
  <!-- /.navbar-static-side -->
</nav>
<!-- Left navbar-header -->
<div class="navbar-default sidebar" role="navigation" style="background:#ffe141">
  <div class="sidebar-nav navbar-collapse slimscrollsidebar">
      <ul class="nav" id="side-menu" style="font-weight:400">

          <!-- <li class="sidebar-search hidden-sm hidden-md hidden-lg">
              <div class="input-group custom-search-form">
                  <input type="text" class="form-control" placeholder="Search..."> <span class="input-group-btn">
                  <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
                </span> </div>
          </li> -->
















<?php
// if($user_id==1){
if($user_type=="admin"){
?>
    <li> <a href="AdminDashboard.php" class="waves-effect"><i class="ti-dashboard p-r-10"></i> <span class="hide-menu">Admin</span></a> </li>
    <li> <a href="javascript:void(0);" class="waves-effect"><i class="ti-calendar p-r-10"></i> <span class="hide-menu"> Orders <span class="fa arrow"></span></span></a>
        <ul class="nav nav-second-level">
            <li> <a href="Ordera_All.php">All Orders</a> </li>
            <li> <a href="BD_Ordera.php">Bluedart Orders</a> </li>
            <!-- <li> <a href="TodayOrdersa.php">Today Orders</a> </li> -->
        </ul>
    </li>
    <li> <a href="javascript:void(0);" class="waves-effect"><i class="icon-people p-r-10"></i> <span class="hide-menu"> Clients <span class="fa arrow"></span></span></a>
        <ul class="nav nav-second-level">
            <li> <a href="Client_Registration.php">Client Register</a> </li>
            <li> <a href="Client_All.php">All Clients</a> </li>
            <li> <a href="Website_All.php">Website Request</a> </li>
        </ul>
    </li>
    <li> <a href="javascript:void(0);" class="waves-effect"><i class="icon-people p-r-10"></i> <span class="hide-menu"> Retailers <span class="fa arrow"></span></span></a>
        <ul class="nav nav-second-level">
            <li> <a href="Retailer_Registration.php">Retailer Register</a> </li>
            <li> <a href="Retailer_All.php">All Retailers</a> </li>
        </ul>
    </li>
    <li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-user-md p-r-10"></i> <span class="hide-menu"> Employee <span class="fa arrow"></span></span></a>
        <ul class="nav nav-second-level">
            <li> <a href="Employee_Registration.php">Employee Register</a> </li>
            <li> <a href="Employee_All.php">All Employee</a> </li>
        </ul>
    </li>
    <li> <a href="javascript:void(0);" class="waves-effect"><i class="icon-chart p-r-10"></i> <span class="hide-menu"> Reports <span class="fa arrow"></span></span></a>
        <ul class="nav nav-second-level">
            <li> <a href="#">Closures</a></li>
            <li> <a href="mis_report.php">MIS</a></li>
            <li> <a href="#">Return POD's</a></li>
            <li> <a href="#">Daily Summary</a></li>
        </ul>
    </li>
    <li> <a href="addpincode.php" class="waves-effect"><i data-icon="P" class="fa fa-map-marker p-r-10"></i> <span class="hide-menu"> Pincode</span></a> </li>
    <li> <a href="#" class="waves-effect"><i data-icon="P" class="fa fa-bar-chart-o p-r-10"></i> <span class="hide-menu">NDR Management</span></a> </li>
    <li> <a href="Trackorder.php" class="waves-effect"><i data-icon="P" class="fa fa-search p-r-10"></i> <span class="hide-menu">Order Tracking</span></a> </li>



























<?php
}
elseif($user_type=="employee"){
// Employee
$allpermission = "SELECT * FROM `asitfa_user_access` WHERE `loginuser_id`='$user_id'";
$allpermissionr=mysqli_query($conn,$allpermission);
$permission = mysqli_fetch_assoc($allpermissionr);
// Employee
?>
<!-- Employee -->
<!-- Employee -->
<li> <a href="EmployeeDashboard.php" class="waves-effect"><i class="ti-dashboard p-r-10"></i> <span class="hide-menu">Employee</span></a> </li>

<?php
if($permission['emp_client']){    // Client
?>
<li> <a href="javascript:void(0);" class="waves-effect"><i class="icon-people p-r-10"></i> <span class="hide-menu"> Clients <span class="fa arrow"></span></span></a>
    <ul class="nav nav-second-level">
        <?php
        if($permission['emp_client_reg']){
          echo "<li> <a href='Client_Registratione.php'>Client Registration</a> </li>";
        }
        if($permission['emp_client_all']){
          echo "<li> <a href='Client_Alle.php'>All Clients</a> </li>";
        }
        if($permission['emp_websiterequest']){
          echo "<li> <a href='Website_Request.php'>Website Request</a> </li>";
        }
        ?>
    </ul>
</li>
<?php
}   // Client
?>
<!--  -->
<?php
if($permission['emp_all_orders']){    // Orders
?>
<li> <a href="javascript:void(0);" class="waves-effect"><i class="ti-calendar p-r-10"></i> <span class="hide-menu"> Orders <span class="fa arrow"></span></span></a>
    <ul class="nav nav-second-level">
        <li> <a href="Ordere_All.php">All Orders</a> </li>
        <!-- <li> <a href="Order_Emp_Today_C.php">Today Orders</a> </li>
        <li> <a href="Order_Emp_fPending.php">Pending Orders</a> </li>
        <li> <a href="Order_Emp_fProgress.php">Progress Orders</a> </li>
        <li> <a href="Order_Emp_fComplete.php">Complete Orders</a> </li>
        <li> <a href="Order_Emp_All_Month.php">All Orders</a> </li>
        <li> <a href="Ordere_All_Cancel.php">Cancel Orders</a> </li> -->
    </ul>
</li>
<?php
} // Orders
?>
<!--  -->
<?php
if($permission['emp_reports']){    // Reports
?>
<li> <a href="javascript:void(0);" class="waves-effect"><i class="icon-chart p-r-10"></i> <span class="hide-menu"> Reports <span class="fa arrow"></span></span></a>
    <ul class="nav nav-second-level">
<?php
if($permission['emp_codremities_show']){
  echo "<li> <a href='#'>Closures</a></li>";
}
if($permission['emp_mis_show']){
    if($permission['emp_mis_delete']){
      echo "<li> <a href='mis_reporte.php'>MIS</a></li>";
    }else{
      echo "<li> <a href='mis_reported.php'>MIS</a></li>";
    }
}
if($permission['emp_pod_show']){
  echo "<li> <a href='#'>Return POD's</a></li>";
}
if($permission['emp_cod_show']){
  echo "<li> <a href='#'>Daily Summary</a></li>";
}
?>
    </ul>
</li>
<?php
}     // Reports
?>

<?php   if($permission['emp_pincodeservice']){  ?>
      <li> <a href="Emp_pincode.php" class="waves-effect"><i data-icon="P" class="fa fa-map-marker p-r-10"></i> <span class="hide-menu"> Pincode</span></a> </li>
<?php } ?>
<?php   if($permission['emp_pickupaddress']){  ?>
      <li> <a href="Em_pickup_address.php" class="waves-effect"><i data-icon="P" class="fa fa-bar-chart-o p-r-10"></i> <span class="hide-menu">Pickup Address</span></a> </li>
<?php } ?>
<?php   if($permission['emp_tracking']){  ?>
      <li> <a href="Trackorder.php" class="waves-effect"><i data-icon="P" class="fa fa-search p-r-10"></i> <span class="hide-menu">Order Tracking</span></a> </li>
<?php } ?>
<li> <a href="Shipping_Labels_Check.php" class="waves-effect"><i data-icon="P" class="fa fa-print p-r-10"></i> <span class="hide-menu">Print Shipping Labels</span></a> </li>























<?php
}
elseif($user_type=="retailer"){
// Retailer
$allpermission = "SELECT * FROM `asitfa_user_access` WHERE `loginuser_id`='$user_id'";
$allpermissionr=mysqli_query($conn,$allpermission);
$permission = mysqli_fetch_assoc($allpermissionr);
// Retailer
?>
<!-- Retailer -->
<!-- Retailer -->
<li style="color:white !important">
  <a href="RetailerDashboard.php" class="waves-effect" style="color:white !important">
    <i class="ti-dashboard p-r-10"></i><span class="hide-menu" style="color:white !important">Retailer</span>
  </a>
</li>

<?php
if($permission['ordersshow']){    // Orders
?>
<li> <a href="javascript:void(0);" class="waves-effect"><i class="ti-calendar p-r-10"></i> <span class="hide-menu"> Orders <span class="fa arrow"></span></span></a>
    <ul class="nav nav-second-level">
        <li> <a href="Orderc_All.php">Orders</a> </li>
    </ul>
</li>
<?php
}  //Orders
?>

<li> <a href="Rcalculator.php" class="waves-effect"><i data-icon="P" class="fa fa-calculator p-r-10"></i> <span class="hide-menu">Calculator</span></a> </li>

<!--  -->
<?php
// if($permission['billing_show']){    // Upload Orders
?>
<li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-user-md p-r-10"></i> <span class="hide-menu"> Upload Orders <span class="fa arrow"></span></span></a>
<ul class="nav nav-second-level">
<?php
if($permission['bulkorderupload']){
    echo "<li> <a href='bulkorderupload.php'>Bulk Order</a> </li>";
}
if($permission['pickup_show']){
  echo "<li> <a href='pickup_address.php'>Pickup Address</a> </li>";
}
?>
<li> <a href="Rsingle_order_book.php">Book Single Order</a> </li>
<li> <a href="Rsingle_orders_all.php">Today Single Orders</a> </li>
</ul>
</li>
<?php
// }  //Upload Orders
?>
<!--  -->
<!--<li> <a href="javascript:void(0);" class="waves-effect"><i class="icon-people p-r-10"></i> <span class="hide-menu"> Clients <span class="fa arrow"></span></span></a>-->
<!--    <ul class="nav nav-second-level">-->
<!--        <li> <a href="Retailer_Client_Registration.php">Client Register</a> </li>-->
<!--        <li> <a href="Retailer_Client_All.php">All Clients</a> </li>-->
<!--    </ul>-->
<!--</li>-->
<!--  -->
<?php
if($permission['reports_show']){    // Report
?>
<li> <a href="javascript:void(0);" class="waves-effect"><i class="icon-chart p-r-10"></i> <span class="hide-menu"> Reports <span class="fa arrow"></span></span></a>
<ul class="nav nav-second-level">
<?php
if($permission['mis_show']){
  echo "<li> <a href='mis_report_client.php'>MIS</a></li>";
}
if($permission['pod_show']){
  echo "<li> <a href='#'>POD</a></li>";
}
if($permission['cod_show']){
  echo "<li> <a href='#'>COD Report</a></li>";
}
if($permission['codremities_show']){
  echo "<li> <a href='Remittance.php'>COD Remittance</a></li>";
}
?>
</ul>
</li>
<?php
} // Reports
?>
<!--  -->
<?php
if($permission['wallet_show']){    // Wallet
?>
    <li> <a href="add_balance.php" class="waves-effect"><i class="fa fa-inr p-r-10"></i> <span class="hide-menu">Wallet</span></a> </li>
<?php
} // Wallet
?>
<?php
if($permission['serviceablepincode_show']){    // Pincode
?>
    <li> <a href="pincode.php" class="waves-effect"><i data-icon="P" class="fa fa-map-marker p-r-10"></i> <span class="hide-menu">Pincode</span></a> </li>
<?php
} // Pincode
?>
<?php
if($permission['printshipping_show']){    // Print Shipping Labels
?>
  <li> <a href="Shipping_Labels_Check.php" class="waves-effect"><i data-icon="P" class="fa fa-print p-r-10"></i> <span class="hide-menu">Print Shipping Labels</span></a> </li>
<?php
} // Print Shipping Labels
?>
<?php
if($permission['ordertracking']){    // Wallet
?>
  <li> <a href="TrackMyOrder.php" class="waves-effect"><i data-icon="P" class="fa fa-search p-r-10"></i> <span class="hide-menu">Order Tracking</span></a> </li>
<?php
} // Wallet
?>

































<?php
}
else{
// User
    $allpermission = "SELECT * FROM `asitfa_user_access` WHERE `loginuser_id`='$user_id'";
    $allpermissionr=mysqli_query($conn,$allpermission);
    $permission = mysqli_fetch_assoc($allpermissionr);
// User
?>
<!-- Client -->
<!-- Client -->
<li style="color:white !important">
  <a href="Dashboard.php" class="waves-effect" style="color:white !important">
    <i class="ti-dashboard p-r-10"></i><span class="hide-menu" style="color:white !important">Dashboard</span>
  </a>
</li>

<?php
if($permission['ordersshow']){    // Orders
?>
<li> <a href="javascript:void(0);" class="waves-effect"><i class="ti-calendar p-r-10"></i> <span class="hide-menu"> Orders <span class="fa arrow"></span></span></a>
    <ul class="nav nav-second-level">
        <li> <a href="Orderc_All.php">Orders</a> </li>
        <!-- <li> <a href="Pending_order.php">Pending Order</a> </li>
        <li> <a href="Progress_order.php">Progress Order</a> </li>
        <li> <a href="Complete_order.php">Complete Order</a> </li>
        <li> <a href="Order_Last_7_Days_C.php">Last 7 Days</a> </li>
        <li> <a href="Order_Current_Month.php">Current Month</a> </li>
        <li> <a href="Order_Last_Month.php">Last Month</a> </li>
        <li> <a href="Order_All_Month.php">All Orders</a> </li> -->
    </ul>
</li>
<?php
}  //Orders
?>
<!--  -->
<?php
// if($permission['billing_show']){    // Upload Orders
?>
<li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-user-md p-r-10"></i> <span class="hide-menu"> Upload Orders <span class="fa arrow"></span></span></a>
<ul class="nav nav-second-level">
<?php
if($permission['bulkorderupload']){
    echo "<li> <a href='bulkorderupload.php'>Bulk Order</a> </li>";
}
if($permission['pickup_show']){
  echo "<li> <a href='pickup_address.php'>Pickup Address</a> </li>";
}
?>


<?php
if($user_id==27){
?>
 <li> <a href="single_order.php">Single Order</a> </li> 
 <li> <a href="singleorderupload.php">Today Single Orders</a> </li> 
<?php
}
?>



</ul>
</li>
<?php
// }  //Upload Orders
?>
<!--  -->
<?php
if($permission['billing_show']){    // Billing
?>
<li> <a href="javascript:void(0);" class="waves-effect"><i class="icon-people p-r-10"></i> <span class="hide-menu"> Billing <span class="fa arrow"></span></span></a>
<ul class="nav nav-second-level">
<?php
if($permission['invoice_show']){
  echo "<li> <a href='#'>Invoice</a> </li>";
}
if($permission['remities_show']){
  echo "<li> <a href='#'>Remittance</a> </li>";
}
?>
</ul>
</li>
<?php
} // Billing
?>
<!--  -->
<?php
if($permission['reports_show']){    // Report
?>
<li> <a href="javascript:void(0);" class="waves-effect"><i class="icon-chart p-r-10"></i> <span class="hide-menu"> Reports <span class="fa arrow"></span></span></a>
<ul class="nav nav-second-level">
<?php
if($permission['mis_show']){
  echo "<li> <a href='mis_report_client.php'>MIS</a></li>";
}
if($permission['pod_show']){
  echo "<li> <a href='#'>POD</a></li>";
}
if($permission['cod_show']){
  echo "<li> <a href='#'>COD Report</a></li>";
}
if($permission['codremities_show']){
  echo "<li> <a href='Remittance.php'>COD Remittance</a></li>";
}
?>
</ul>
</li>
<?php
} // Reports
?>
<!--  -->
<?php
if($permission['wallet_show']){    // Wallet
?>
    <li> <a href="add_balance.php" class="waves-effect"><i class="fa fa-inr p-r-10"></i> <span class="hide-menu">Wallet</span></a> </li>
<?php
} // Wallet
?>
<?php
if($permission['serviceablepincode_show']){    // Pincode
?>
    <li> <a href="pincode.php" class="waves-effect"><i data-icon="P" class="fa fa-map-marker p-r-10"></i> <span class="hide-menu">Pincode</span></a> </li>
<?php
} // Pincode
?>
<?php
if($permission['ndr_show']){    // NDR Management
?>
  <li> <a href="#" class="waves-effect"><i data-icon="P" class="fa fa-bar-chart-o p-r-10"></i> <span class="hide-menu">NDR Management</span></a> </li>
<?php
} // NDR Management
?>
<?php
if($permission['printshipping_show']){    // Print Shipping Labels
?>
  <li> <a href="Shipping_Labels_Check.php" class="waves-effect"><i data-icon="P" class="fa fa-print p-r-10"></i> <span class="hide-menu">Print Shipping Labels</span></a> </li>
<?php
} // Print Shipping Labels
?>
<?php
if($permission['ordertracking']){    // Wallet
?>
  <li> <a href="TrackMyOrder.php" class="waves-effect"><i data-icon="P" class="fa fa-search p-r-10"></i> <span class="hide-menu">Order Tracking</span></a> </li>
<?php
} // Wallet
?>











<?php
}
?>




      </ul>
  </div>
</div>
<!-- Left navbar-header end -->
<div id="page-wrapper">
