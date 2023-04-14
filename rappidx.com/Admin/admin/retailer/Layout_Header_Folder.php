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

<head>
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <link href="plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    <!-- Menu CSS -->
    <link href="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/megna.css" id="theme" rel="stylesheet">
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
