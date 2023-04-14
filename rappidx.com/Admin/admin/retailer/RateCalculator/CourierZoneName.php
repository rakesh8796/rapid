<?php
error_reporting(1);
include("../config/dbcon.php");
extract($_REQUEST);


$destinationcity = trim($destinationcity);
$origincity = trim($origincity);


$zonecheckquery = "SELECT * FROM `zone_citywise` WHERE `pickup_city`='$origincity' AND `destination_city`='$destinationcity'";
$zonedata = mysqli_query($conn,$zonecheckquery);
$zoneresult = mysqli_fetch_assoc($zonedata);
$zoneis = $zoneresult['zone_category'];
if(empty($zoneis)){
    echo "0";
}else{
    echo $zoneis;
}


?>



