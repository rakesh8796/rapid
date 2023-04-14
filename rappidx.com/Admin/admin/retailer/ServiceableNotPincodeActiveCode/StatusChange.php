<?php 
include("../config/dbcon.php");
extract($_REQUEST);

// echo $clientidisause;


if($serviename=="XB"){
// XpressBees
	$query = "SELECT * FROM `serviceable_pincodes` WHERE `pinsid`='$idisa'";
	$fdata=mysqli_query($conn,$query);
	$result = mysqli_fetch_assoc($fdata);
	if($result['xpressbee']){
		$queryn = "UPDATE `serviceable_pincodes` SET `xpressbee`='0' WHERE `pinsid`='$idisa'";
		mysqli_query($conn,$queryn);
	}else{
		$queryn = "UPDATE `serviceable_pincodes` SET `xpressbee`='1' WHERE `pinsid`='$idisa'";
		mysqli_query($conn,$queryn);
	}
// XpressBees
}elseif($serviename=="DL"){
// Delhivery
	$query = "SELECT * FROM `serviceable_pincodes` WHERE `pinsid`='$idisa'";
	$fdata=mysqli_query($conn,$query);
	$result = mysqli_fetch_assoc($fdata);
	if($result['delhivery']){
		$queryn = "UPDATE `serviceable_pincodes` SET `delhivery`='0' WHERE `pinsid`='$idisa'";
		mysqli_query($conn,$queryn);
	}else{
		$queryn = "UPDATE `serviceable_pincodes` SET `delhivery`='1' WHERE `pinsid`='$idisa'";
		mysqli_query($conn,$queryn);
	}
// Delhivery
}elseif($serviename=="SF"){
// ShadowFax
	$query = "SELECT * FROM `serviceable_pincodes` WHERE `pinsid`='$idisa'";
	$fdata=mysqli_query($conn,$query);
	$result = mysqli_fetch_assoc($fdata);
	if($result['shadowfax']){
		$queryn = "UPDATE `serviceable_pincodes` SET `shadowfax`='0' WHERE `pinsid`='$idisa'";
		mysqli_query($conn,$queryn);
	}else{
		$queryn = "UPDATE `serviceable_pincodes` SET `shadowfax`='1' WHERE `pinsid`='$idisa'";
		mysqli_query($conn,$queryn);
	}
// ShadowFax
}elseif($serviename=="DC"){
// DTDC
	$query = "SELECT * FROM `serviceable_pincodes` WHERE `pinsid`='$idisa'";
	$fdata=mysqli_query($conn,$query);
	$result = mysqli_fetch_assoc($fdata);
	if($result['dtdc']){
		$queryn = "UPDATE `serviceable_pincodes` SET `dtdc`='0' WHERE `pinsid`='$idisa'";
		mysqli_query($conn,$queryn);
	}else{
		$queryn = "UPDATE `serviceable_pincodes` SET `dtdc`='1' WHERE `pinsid`='$idisa'";
		mysqli_query($conn,$queryn);
	}
// DTDC
}


?>