<?php
error_reporting(1);
extract($_REQUEST);
// $conn=mysqli_connect("localhost","root","","philon_rappidx");
$conn=mysqli_connect("localhost","rappidx","UCjZV0l[TJGY","rappidx");
// $conn=mysqli_connect("localhost","test_rappidx","?x53w{L_l1_r","test_rappidx");
date_default_timezone_set('Asia/Kolkata');

$query = "INSERT INTO `asitfa_user_website`(`emailid`, `requestdate`, `formstatus`) VALUES ('$email',now(),'Pending')";
if(mysqli_query($conn,$query))
{
  echo "Yes";
}else
{
  echo "No";
}


 ?>
