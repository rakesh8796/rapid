<?php
    session_start();
    error_reporting(1);
    extract($_REQUEST);
    include "../config/dbcon.php";
    date_default_timezone_set('Asia/Calcutta');
    $user_id = $_SESSION['useridis'];
	
	$uniqueidno = $_SESSION['useruinqueidno'];
	$companyname = $_SESSION['username'];



    //  $Starting = date('Y-m-d', strtotime("last Thursday"));
    // echo "<br>";
    //  $Ending = date('Y-m-d', strtotime("next Wednesday"));
     
    if(date('D')=="Thu"){
      $Starting = date('Y-m-d');
      $startd = date('d');
      $startm = date('m');
      $starty = date('y');
    }else{
      $Starting = date('Y-m-d', strtotime("last Thursday"));
      $startd = date('d', strtotime("last Thursday"));
      $startm = date('m', strtotime("last Thursday"));
      $starty = date('y', strtotime("last Thursday"));
    }
    // echo "<br>";
    if(date('D')=="Wed"){
      $Ending = date('Y-m-d');
      $endd = date('d');
      $endm = date('m');
      $endy = date('y');
    }else{
      $Ending = date('Y-m-d', strtotime("next Wednesday"));
      $endd = date('d', strtotime("next Wednesday"));
      $endm = date('m', strtotime("next Wednesday"));
      $endy = date('y', strtotime("next Wednesday"));
    }
     
    $qcodremmmit = "SELECT sum(`Cod_Amount`) FROM `spark_single_order` WHERE `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_status_show`='Delivered' AND `delivereddate` BETWEEN '$Starting' AND '$Ending'";
    $qcodremmmitr = mysqli_query($conn, $qcodremmmit);
    $qcodremmmitru = mysqli_fetch_assoc($qcodremmmitr);
    $qcodremmmitruis = $qcodremmmitru["sum(`Cod_Amount`)"];
    if(empty($qcodremmmitruis)){  $qcodremmmitruis = 0; }
    // $qcodremmmitruis = 0;


$srnoisa = "RPDXREMIT".$startd.$startm.$starty.$endd.$endm.$endy;

$lastcodbal = "SELECT * FROM `remittancecodamount` ORDER BY `remmitid` DESC";
$lastcodbalr = mysqli_query($conn, $lastcodbal);
$lastcodbalres = mysqli_fetch_assoc($lastcodbalr);
$lastcodbalsrno = $lastcodbalres['serinalno'];

if($lastcodbalsrno==$srnoisa){
// Update Entry
	// if(date('D')=="Wed"){
 //      $Ending = date('Y-m-d');
 //      $endd = date('d');
 //      $endm = date('m');
 //      $endy = date('y');
 //    }else{
 //      $Ending = date('Y-m-d', strtotime("next Wednesday"));
 //      $endd = date('d', strtotime("next Wednesday"));
 //      $endm = date('m', strtotime("next Wednesday"));
 //      $endy = date('y', strtotime("next Wednesday"));
 //    }

$last_id = $lastcodbalres['remmitid'];

$codbal = "UPDATE `remittancecodamount` SET `startdate`='$Starting',`startdatetime`='$Starting',`duedate`='$Ending',`duedatetime`='$Ending',`totalamount`='$qcodremmmitruis',`status`='Pending',`userid`='$user_id',`uniqueidno`='$uniqueidno',`usercompany`='$companyname',`noofdaycovered`='7' WHERE `serinalno`='$srnoisa')";
mysqli_query($conn, $codbal);
$last_id = mysqli_insert_id($conn);

$codbaldetails = "SELECT * FROM `spark_single_order` WHERE `User_Id`='$user_id' AND `Awb_Number`!='' AND `order_status_show`='Delivered' AND `delivereddate` BETWEEN '$Starting' AND '$Ending'";
$codbaldetailsr = mysqli_query($conn, $codbaldetails);
while($res=mysqli_fetch_assoc($codbaldetailsr)){

	$productname = $res['Item_Name'];
	$paymentmode = $res['Order_Type'];
	$clientname = $res['Name'];
	$pincode = $res['Pincode'];
	$amountpayable = $res['Total_Amount'];
	$city = $res['City'];
	$status = $res['State'];
	$codamount = $res['Cod_Amount'];
	$orderno = $res['orderno'];
	$awbno = $res['Awb_Number'];

		$codbaldetailsupdate = "INSERT INTO `remittancecodamountdetails`(
		`remmitid`, `serinalno`, `productname`, `paymentmode`, `clientname`, `pincode`, 
		`amountpayable`, `city`, `status`, `codamount`, `orderno`, `awbno`) VALUES (
		'$last_id','$srnoisa','$productname','$paymentmode','$clientname','$pincode',
		'$amountpayable','$city','$status','$codamount','$orderno','$awbno')";
		mysqli_query($conn, $codbaldetailsupdate);
}

// Update Entry
}else{
// New Entry
	$codbal = "INSERT INTO `remittancecodamount`(
`serinalno`, `startdate`, `startdatetime`, `duedate`, `duedatetime`, `totalamount`, 
`status`, `userid`, `uniqueidno`, `usercompany`, `noofdaycovered`) VALUES (
'$srnoisa','$Starting','$Starting','$Ending','$Ending','$qcodremmmitruis',
'Pending','$user_id','$uniqueidno','$companyname','7')";
mysqli_query($conn, $codbal);


// New Entry
}



?>