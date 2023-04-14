<?php 
include("../config/dbcon.php");
extract($_REQUEST);

// echo $idisa;
// echo "--";
// echo $pincode;

$query = "SELECT * FROM `serviceable_pincodes` WHERE `pincode`='$pincode'";
$fdata=mysqli_query($conn,$query);
$result = mysqli_fetch_assoc($fdata);


// if(empty($result['disableclientids'])){

// $allidisa = $idisa;
// $queryn = "UPDATE `serviceable_pincodes` SET `disableclientids`='$allidisa' WHERE `pincode`='$pincode'";
// mysqli_query($conn,$queryn);
// echo "If-1";

// }else{
	// echo "SID : ".$idisa."<br>";
	$allidisa = explode(",",$result['disableclientids']);
	// echo "<br>";
	// print_r($allidisa);
	// echo "<br>";
	$tusers = count($allidisa);
	if($tusers==1){
		echo "<br> countno : ".$tusers."<br>";
		if($result['disableclientids']==$idisa){
$queryn = "UPDATE `serviceable_pincodes` SET `disableclientids`='0' WHERE `pincode`='$pincode'";
			mysqli_query($conn,$queryn);
		}else{
			$allidisa[] = $idisa;
			$allidisa = implode(",",$allidisa);
$queryn = "UPDATE `serviceable_pincodes` SET `disableclientids`='$allidisa' WHERE `pincode`='$pincode'";
			mysqli_query($conn,$queryn);
		}

	}elseif(array_search($idisa, $allidisa)){
// $allidisa = explode(",",$result['disableclientids']);
		echo $a = array_search($idisa, $allidisa);
		unset($allidisa["$a"]);
		$allidisa = implode(",",$allidisa);
$queryn = "UPDATE `serviceable_pincodes` SET `disableclientids`='$allidisa' WHERE `pincode`='$pincode'";
		mysqli_query($conn,$queryn);
		echo "If-2.1";
	}else{
// $allidisa = explode(",",$result['disableclientids']);
		$allidisa[] = $idisa;
		$allidisa = implode(",",$allidisa);
$queryn = "UPDATE `serviceable_pincodes` SET `disableclientids`='$allidisa' WHERE `pincode`='$pincode'";
		mysqli_query($conn,$queryn);
		echo "Else-2.2";
	}

// }














// if(empty($result['disableclientids'])){

// // If Empty User Box
// 	$crtusers = array();
// 	$crtusers[] = $idisa;
// 	$allidisa = implode(",",$crtusers);
// $queryn = "UPDATE `serviceable_pincodes` SET `disableclientids`='$allidisa' WHERE `pincode`='$pincode'";
// 	mysqli_query($conn,$queryn);
// // If Empty User Box

// }elseif(array_search($idisa, $allidisa)){

// // If User Exists In User Box
// 	$allidisa = explode(",",$result['disableclientids']);
// 	$a = array_search($idisa, $allidisa);
// 	unset($allidisa[$a]);
// 	// print_r($allidisa);
// $queryn = "UPDATE `serviceable_pincodes` SET `disableclientids`='$allidisa' WHERE `pincode`='$pincode'";
// 	mysqli_query($conn,$queryn);
// // If User Exists In User Box

// }else{

// // If New User In User Box
// 	$allidisa = explode(",",$result['disableclientids']);
// 	$crtusers[] = $idisa;
// 	$allidisa = implode(",",$crtusers);
// $queryn = "UPDATE `serviceable_pincodes` SET `disableclientids`='$allidisa' WHERE `pincode`='$pincode'";
// 	mysqli_query($conn,$queryn);
// // If New User In User Box

// }






?>