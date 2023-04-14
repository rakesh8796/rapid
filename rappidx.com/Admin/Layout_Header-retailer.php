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
