<?php
include("../config/dbcon.php");
include("../Layout_Header_Folder.php");
extract($_REQUEST);


// echo $username;
// echo "<br>";
// echo $user_id;
// echo "<br>";
// echo $user_type;
// echo "<br>";
if($user_type=="employee"){
    $lastupduserno = "RPEMP".$user_id;
}elseif($user_type=="admin"){
  $lastupduserno = "Admin";
}else{
  $lastupduserno = $user_id;
}
// echo $lastupduserno;
// echo "<br>";
echo $clientidisause;
// echo $crtidno;
$queryn = "UPDATE `asitfa_user_website` SET
`formstatus`='$clientidisause',`lastupdusertype`='$user_type',
`lastupduid`='$user_id',`lastupduserno`='$lastupduserno',
`lastusername`='$username'
 WHERE `websitejoinid`='$crtidno'";
mysqli_query($conn,$queryn);

// $query = "SELECT * FROM `asitfa_user` WHERE `User_Id`='$clientidisause'";
// $fdata=mysqli_query($conn,$query);
// $result = mysqli_fetch_assoc($fdata);
//
// if($result['Active']){
// 	$queryn = "UPDATE `asitfa_user` SET `Active`='0' WHERE `User_Id`='$clientidisause'";
// 	mysqli_query($conn,$queryn);
// }else{
// 	$queryn = "UPDATE `asitfa_user` SET `Active`='1' WHERE `User_Id`='$clientidisause'";
// 	mysqli_query($conn,$queryn);
// }

?>
