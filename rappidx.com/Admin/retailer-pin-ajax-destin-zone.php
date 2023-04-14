<?php
error_reporting(1);
extract($_REQUEST);
include "config/dbcon.php";
date_default_timezone_set('Asia/Calcutta');


$pincode = $pincode;




$pincityfetch = "SELECT * FROM `serviceable_pincodes` WHERE `pincode`='$pincode'";
$pincityfetc=mysqli_query($conn,$pincityfetch);
$pincityfet = mysqli_fetch_assoc($pincityfetc);

if($pincityfet['hubzonename']){
  echo $pincityfet['hubzonename'];
}else{
  echo '0';
}



