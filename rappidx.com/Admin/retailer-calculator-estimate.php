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

// $param = "A";
// $freightWeightare = 10;

// param:zone
// paymode:paymode
// prodamt:prodamt
// freightWeightare:freightWeightare


if(empty($param)){
  echo "<center>Please enter valid pincodes</center>";
  exit();
}





// // Main Courier Permissions
// $courirpermissions = "SELECT * FROM `retailer-rate-list-couriers-permissions` WHERE `status`='1'";
// $courirpermission=mysqli_query($conn,$courirpermissions);
// while($courirpermissi = mysqli_fetch_assoc($courirpermission)){
// // Main Courier Permissions
// $courirpermissids = $courirpermissi['courier_id'];


// Main Courier Permissions
$courirpermissions = "SELECT * FROM `retailer-rate-list-couriers` WHERE `status`='1'";
$courirpermission=mysqli_query($conn,$courirpermissions);
while($courirpermissi = mysqli_fetch_assoc($courirpermission)){
// Main Courier Permissions
// echo "<br>_________<br>";
// echo "Courier Name : ";
$courirpermissionname = $courirpermissi['Courier'];


$courirpermiss = "SELECT * FROM `retailer-rate-list-couriers-permissions` WHERE `Courier`='$courirpermissionname' ANd `status`='1'";
$courirpermis=mysqli_query($conn,$courirpermiss);
// $courirpermi = mysqli_fetch_assoc($courirpermis);
while($courirpermi = mysqli_fetch_assoc($courirpermis)){


    // echo "<br> CID - ";
    $courirpermissids = $courirpermi['courier_id'];
    // echo " : Up-Weight - ";
    $couriersweight = $courirpermi['upto_weight'];
    // echo " ****  ";
    if($freightWeightare <= $couriersweight){
        // echo 'if';
        break;
    }else{
        // echo 'else';
    }
    // // if main show


}


// echo "<br> * - * - * - * - ";
// echo "<br> CID - ";
// echo $courirpermissids;
// echo " : Up-Weight - ";
// echo $couriersweight;


if($param=="A"){
    $singleproquery = "SELECT `id`, `Courier`, `Weight`, `upto_weight`, `weight_type`, `A` AS Zone, `COD`, `COD%` FROM `retailer-rate-list` WHERE `courier_id`='$courirpermissids' AND `status`='1'";
}elseif($param=="B"){
    $singleproquery = "SELECT `id`, `Courier`, `Weight`, `upto_weight`, `weight_type`, `B` AS Zone, `COD`, `COD%` FROM `retailer-rate-list` WHERE `courier_id`='$courirpermissids' AND `status`='1'";
}elseif($param=="C"){
    $singleproquery = "SELECT `id`, `Courier`, `Weight`, `upto_weight`, `weight_type`, `C` AS Zone, `COD`, `COD%` FROM `retailer-rate-list` WHERE `courier_id`='$courirpermissids' AND `status`='1'";
}elseif($param=="D"){
    $singleproquery = "SELECT `id`, `Courier`, `Weight`, `upto_weight`, `weight_type`, `D` AS Zone, `COD`, `COD%` FROM `retailer-rate-list` WHERE `courier_id`='$courirpermissids' AND `status`='1'";
}elseif($param=="E"){
    $singleproquery = "SELECT `id`, `Courier`, `Weight`, `upto_weight`, `weight_type`, `E` AS Zone, `COD`, `COD%` FROM `retailer-rate-list` WHERE `courier_id`='$courirpermissids' AND `status`='1'";
}elseif($param=="F"){
    $singleproquery = "SELECT `id`, `Courier`, `Weight`, `upto_weight`, `weight_type`, `F` AS Zone, `COD`, `COD%` FROM `retailer-rate-list` WHERE `courier_id`='$courirpermissids' AND `status`='1'";
}

// echo "<br>";
// echo $singleproquery;

$singleproqueryr=mysqli_query($conn,$singleproquery);
if(empty(mysqli_num_rows($singleproqueryr))){
  echo "<center>Not In Service</center>";
}
$modelid = 0;
?>






<?php
while($row = mysqli_fetch_assoc($singleproqueryr))
{
$newcodchange = 0;
$newtotalamt = 0;

// param:zone
// paymode:paymode
// prodamt:prodamt
// freightWeightare:freightWeightare





$courierschage = $row['Zone'];
$codpercent = $row['COD%'];
$codstandartdcharge = $row['COD'];
$codaccordingtocodamt = ($prodamt * $codpercent)/100;

$newcodchange = $codstandartdcharge;
if($codstandartdcharge<$codaccordingtocodamt){
    $newcodchange = $codaccordingtocodamt;
}

if($paymode=="prepaid"){
    $newcodchange = 0;    
}

$newtotalamt = $courierschage+$newcodchange;

// if main show
if($row['weight_type']=="additional"){
    continue;
}
// if main show

$addionalweightadd = 0;
$additionalweightcalci = 0;
$crtwiht = $row['upto_weight'];
$freightWeightare;

// Additional Charges
if($freightWeightare>$crtwiht){


    $additionalweightcalci = (int)$freightWeightare/$crtwiht;
    $additionalweightcalci = $additionalweightcalci-1;

    $parentidno = $row['id'];
    if($param=="A"){
        $addtionalcharge ="SELECT `id`, `Courier`, `Weight`, `upto_weight`, `weight_type`, `A` AS Zone1, `COD`, `COD%` FROM `retailer-rate-list-additonal` WHERE `status`='1' AND  `id`='$parentidno'";
    }elseif($param=="B"){
        $addtionalcharge = "SELECT `id`, `Courier`, `Weight`, `upto_weight`, `weight_type`, `B` AS Zone1, `COD`, `COD%` FROM `retailer-rate-list-additonal` WHERE `status`='1' AND  `id`='$parentidno'";
    }elseif($param=="C"){
        $addtionalcharge = "SELECT `id`, `Courier`, `Weight`, `upto_weight`, `weight_type`, `C` AS Zone1, `COD`, `COD%` FROM `retailer-rate-list-additonal` WHERE `status`='1' AND  `id`='$parentidno'";
    }elseif($param=="D"){
        $addtionalcharge = "SELECT `id`, `Courier`, `Weight`, `upto_weight`, `weight_type`, `D` AS Zone1, `COD`, `COD%` FROM `retailer-rate-list-additonal` WHERE `status`='1' AND  `id`='$parentidno'";
    }elseif($param=="E"){
        $addtionalcharge = "SELECT `id`, `Courier`, `Weight`, `upto_weight`, `weight_type`, `E` AS Zone1, `COD`, `COD%` FROM `retailer-rate-list-additonal` WHERE `status`='1' AND  `id`='$parentidno'";
    }elseif($param=="F"){
        $addtionalcharge = "SELECT `id`, `Courier`, `Weight`, `upto_weight`, `weight_type`, `F` AS Zone1, `COD`, `COD%` FROM `retailer-rate-list-additonal` WHERE `status`='1' AND  `id`='$parentidno'";
    }


    $addtionalcharg=mysqli_query($conn,$addtionalcharge);
    if(mysqli_num_rows($addtionalcharg)){
        $addirow = mysqli_fetch_assoc($addtionalcharg);



        $addinlwetare = $addirow['Zone1'];
        $addionalweightadd = $addinlwetare*$additionalweightcalci;
    }else{
        continue;
    }
    $newtotalamt = $newtotalamt+$addionalweightadd;
}
// Additional Charges
$modelid++;



$courierpermissions[] = array('inno' => $modelid,'courier'=>$row['Courier'],'weight' =>$row['Weight'],'courierschage' => $courierschage,'newcodchange' => $newcodchange,'newtotalamt'=>$newtotalamt );


}
?>






<?php


// Main Courier Permissions
}
// Main Courier Permissions


// echo $modelid;
?>





<!--
<div class="card-header">
    <h4>Serviceable courier services</h4>
</div>
-->
<div class="card-body">
<div class="table-responsive">
<table class="table table-bordered table-md">
    <tr>
        <th>S.no</th>
        <th>Courier</th>
        <th>Weight </th>
        <th>Courier Charges</th>
        <th>COD  Charges</th>
        <th>Total Amount</th>
    </tr>
<?php
    $modelid=0;
    foreach ($courierpermissions as $courierpermission){
    $modelid++;
?>
    <tr>
        <td><?= $modelid ?></td>
        <td><?= $courierpermission['courier'] ?></td>
        <td>
            <?php 
                // $courierpermission['weight'];
            ?>
            <?= $freightWeightare ?>
        </td>
        <td><?= $courierpermission['courierschage'] ?></td>
        <td><?= $courierpermission['newcodchange'] ?></td>
        <td><?= $courierpermission['newtotalamt'] ?></td>
    </tr>
<?php
    }
?>
</table>
</div>
</div>


