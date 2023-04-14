<?php
$conn=mysqli_connect("localhost","badmagwl_rappidx","uJ&4_t)kD@&d","badmagwl_rappidx");
$user_id = $_POST['id'];
$zonecheckquery = "SELECT * FROM `asitfa_user` WHERE `User_Id`='$user_id'";
$zonedata = mysqli_query($conn,$zonecheckquery);
$zoneresult = mysqli_fetch_assoc($zonedata);
echo $zoneresult['Rto_a'];
?>