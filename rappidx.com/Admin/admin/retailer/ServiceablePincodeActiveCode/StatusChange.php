<?php 
include("../config/dbcon.php");
extract($_REQUEST);

// echo $clientidisause;

$query = "SELECT * FROM `asitfa_user` WHERE `User_Id`='$clientidisause'";
$fdata=mysqli_query($conn,$query);
$result = mysqli_fetch_assoc($fdata);

if($result['Active']){
	$queryn = "UPDATE `asitfa_user` SET `Active`='0' WHERE `User_Id`='$clientidisause'";
	mysqli_query($conn,$queryn);
}else{
	$queryn = "UPDATE `asitfa_user` SET `Active`='1' WHERE `User_Id`='$clientidisause'";
	mysqli_query($conn,$queryn);
}

?>