<?php
session_start();
error_reporting(1);
extract($_REQUEST);
include "config/dbcon.php";
date_default_timezone_set('Asia/Calcutta');

// echo $param;
?>
<hr style="border-bottom:2px solid gold">
<?php
if(empty($param))
{
  echo "<center><h3>Waiting For PinCode Input</h3></center><hr style='border-bottom:2px solid gold'>";
  exit();
}
$singleproquery = "SELECT * FROM `serviceable_pincodes` WHERE `pincode` LIKE '$param%'";
$singleproqueryr=mysqli_query($conn,$singleproquery);
if(empty(mysqli_num_rows($singleproqueryr))){
  echo "<center><h3>$param Is Not In Service</h3></center><hr style='border-bottom:2px solid gold'>";
}

while($row = mysqli_fetch_assoc($singleproqueryr))
{


$crtusers = explode(",",$row['disableclientids']);
if(in_array($weightcategory,$crtusers)){
?>

    <div class="col-md-12" style="font-size:18px;border-bottom:2px solid gold">
    <div class="col-md-12">
        <strong>PinCode : </strong> <?= $row['pincode'] ?> ( Not In Service )
    </div><br>&ensp;</div>

<?php
}elseif($row['xpressbee']=='1' AND $row['delhivery']=='1' AND $row['shadowfax']=='1' AND $row['dtdc']=='1'){
?>

    <div class="col-md-12" style="font-size:18px;border-bottom:2px solid gold">
    <div class="col-md-12">
        <strong>PinCode : </strong> <?= $row['pincode'] ?> ( Not In Service )
    </div><br>&ensp;</div>

<?php
    }else{
?>


<div class="col-md-12" style="font-size:18px;border-bottom:2px solid gold">
  <div class="col-md-6">
    <strong>PinCode : </strong> <?= $row['pincode'] ?>
  </div>
  <div class="col-md-6">
    <strong>Area Code : </strong> <?= $row['areacode'] ?>
  </div>
  <div class="col-md-6">
    <strong>Progress Code : </strong> <?= $row['processcode'] ?>
  </div>
  <div class="col-md-6">
    <strong>Hub Zone Name : </strong> <?= $row['hubzonename'] ?>
  </div>
  <div class="col-md-6">
    <strong>Hub City : </strong> <?= $row['hubcity'] ?>
  </div>
  <div class="col-md-6">
    <strong>Hub State : </strong> <?= $row['hubstate'] ?>
  </div>
  <div class="col-md-6">
    <strong>COD : </strong> <?= $row['cod'] ?>
  </div>
  <div class="col-md-6">
    <strong>Prepaid : </strong> <?= $row['prepaid'] ?>
  </div>
  <div class="col-md-6">
    <strong>Has Reverse Pickup Service : </strong> <?= $row['hasreversepickupservice'] ?>
  </div>
  <div class="col-md-6"></div>
</div>

<?php
    }
?>





<?php
}
?>
