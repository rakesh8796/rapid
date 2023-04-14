<?php
  session_start();
  include("config/dbcon.php");
  extract($_REQUEST);
  error_reporting(1);
  // $orderdata = date('Y-m-d H:i:s');


$tudate = date('Y-m-d');
echo $crttime = date("H:i:s");
echo "<br>";

echo "<br>Upload Time : ";
echo $upcrttime = date("H:i:s");
echo "<br> Upload Date : ";
echo $tudate = date('Y-m-d');
echo "<br> Crttime : ";
echo $crttime = date("H:i:s");
echo "<br>";

$tudateupcrttime = $tudate." ".$upcrttime;

echo "<br> SelectQuery : ";
echo $misquery = "SELECT * FROM `spark_mis_report_file` WHERE `fileuploadin_single_orders`='2'  ORDER BY `misfildid` LIMIT 1";
$misqueryr = mysqli_query($conn,$misquery);
$crtnois = 1;

$misres = mysqli_fetch_assoc($misqueryr);
$srnois = $misres['misfildid'];

echo "<br> UpdateQuery : ";
echo $processquery = "UPDATE `spark_mis_report_file` SET `fileuploadin_single_orders`='1' WHERE `misfildid`='$srnois'";
mysqli_query($conn,$processquery);

echo "<br> Couriername : ";
$couriernameis = $misres['couriername'];
echo "<br> Filename : ";
echo $bannername = $misres['filename'];
echo "<br>";






// Bluedart Courier
// <!--  -->

  $fileD = fopen("BulkExcelFiles/MisReports/$bannername","r");
  $column=fgetcsv($fileD);
  // $i=1;
  while(!feof($fileD)){
   $rowData[]=fgetcsv($fileD, 1000, ",");
   // $i++;
  }
// echo "<pre>";
// print_r($rowData);
// exit();

      foreach($rowData as $key => $value){

       if($value[0]==""){  continue;   }
       if($value[2]=="NOT ASSIGNED"){  continue;   }
       if($value[14]=="Cancelled By Client"){  continue;   }
// $singlequery1 = "SELECT * FROM `spark_single_order` WHERE `Awb_Number`='$value[0]' AND `orderno`='$value[3]'";
$singlequery1 = "SELECT * FROM `asitfa_user` WHERE `Company_Name`='$value[25]'";
$queryrunis = mysqli_query($conn,$singlequery1);
if(mysqli_num_rows($queryrunis)){
   $tdate = date("Y-m-d");
$crtdata = mysqli_fetch_assoc($queryrunis);
$uploaduser = "SELECT * FROM `asitfa_user` WHERE `User_Id`='$crtdata[User_Id]'";
$uploaduserr = mysqli_query($conn,$uploaduser);
$userd = mysqli_fetch_assoc($uploaduserr);

$value[17] = trim($value[17]);
$value[17] = mysqli_real_escape_string($conn, $value[17]);
$value[26] = trim($value[26]);
$value[26] = mysqli_real_escape_string($conn, $value[26]);


$value[1] = trim($value[1]);
$value[1] = mysqli_real_escape_string($conn, $value[1]);
$value[2] = trim($value[2]);
$value[2] = mysqli_real_escape_string($conn, $value[2]);
$value[5] = trim($value[5]);
$value[5] = mysqli_real_escape_string($conn, $value[5]);
$value[8] = trim($value[8]);
$value[8] = mysqli_real_escape_string($conn, $value[8]);
$value[9] = trim($value[9]);
$value[9] = mysqli_real_escape_string($conn, $value[9]);
$value[10] = trim($value[10]);
$value[10] = mysqli_real_escape_string($conn, $value[10]);
$value[14] = trim($value[14]);
$value[14] = mysqli_real_escape_string($conn, $value[14]);
$value[16] = trim($value[16]);
$value[16] = mysqli_real_escape_string($conn, $value[16]);
$value[18] = trim($value[18]);
$value[18] = mysqli_real_escape_string($conn, $value[18]);
$value[19] = trim($value[19]);
$value[19] = mysqli_real_escape_string($conn, $value[19]);
$value[20] = trim($value[20]);
$value[20] = mysqli_real_escape_string($conn, $value[20]);

$value[21] = trim($value[21]);
$value[21] = mysqli_real_escape_string($conn, $value[21]);
$value[25] = trim($value[25]);
$value[25] = mysqli_real_escape_string($conn, $value[25]);
$value[26] = trim($value[26]);
$value[26] = mysqli_real_escape_string($conn, $value[26]);
$value[27] = trim($value[27]);
$value[27] = mysqli_real_escape_string($conn, $value[27]);
$value[28] = trim($value[28]);
$value[28] = mysqli_real_escape_string($conn, $value[28]);
$value[29] = trim($value[29]);
$value[29] = mysqli_real_escape_string($conn, $value[29]);
$value[30] = trim($value[30]);
$value[30] = mysqli_real_escape_string($conn, $value[30]);
$value[32] = trim($value[32]);
$value[32] = mysqli_real_escape_string($conn, $value[32]);
$value[37] = trim($value[37]);
$value[37] = mysqli_real_escape_string($conn, $value[37]);
$value[42] = trim($value[42]);
$value[42] = mysqli_real_escape_string($conn, $value[42]);
$value[46] = trim($value[46]);
$value[46] = mysqli_real_escape_string($conn, $value[46]);


// Pickup Date
if(!empty($value[12])){
  $lastupdate = $value[12];
  $dated = substr($lastupdate,0,2);
  $datem = substr($lastupdate,3,2);
  $datey = substr($lastupdate,6,4);
  $value[12] = $datey."-".$datem."-".$dated;
}

// Pickup Date
if(!empty($value[13])){
  $lastupdate = $value[13];
  $dated = substr($lastupdate,0,2);
  $datem = substr($lastupdate,3,2);
  $datey = substr($lastupdate,6,4);
  $value[13] = $datey."-".$datem."-".$dated;
}

// Upload Date
if(!empty($value[11])){
  $lastupdate = $value[11];
  $dated = substr($lastupdate,0,2);
  $datem = substr($lastupdate,3,2);
  $datey = substr($lastupdate,6,4);
  $value[11] = $datey."-".$datem."-".$dated;
}

// Firstattempt Date
if(!empty($value[31])){
  $lastupdate = $value[31];
  $dated = substr($lastupdate,0,2);
  $datem = substr($lastupdate,3,2);
  $datey = substr($lastupdate,6,4);
  $value[31] = $datey."-".$datem."-".$dated;
}


// Lastupdate Date 
if(!empty($value[15])){
  $lastupdate = $value[15];
  $dated = substr($lastupdate,0,2);
  $datem = substr($lastupdate,3,2);
  $datey = substr($lastupdate,6,4);
  $value[15] = $datey."-".$datem."-".$dated;
}

// Order ageing
$nowtime = time();
$pickupdate = $value[12];
$pickupdate = date("Y-m-d", strtotime($pickupdate."1 Days"));
$pickupdate = strtotime($pickupdate);
$orderageing = $nowtime - $pickupdate;
$orderageing = round($orderageing / (60 * 60 * 24));
// Order ageing

$rtodate = '0000-00-00';
$deldate = '0000-00-00';


$value[46] = trim($value[46]);
$statushow = $value[14];
$statushow = trim($statushow);
if(empty($statushow)){ $statushow="In Transit"; }

$value[32] = trim($value[32]);
$statusremark = $value[32];
$value[37] = trim($value[37]);
$value[42] = trim($value[42]);
if(empty($value[32])){
  $statusremark = $value[37];
  if(empty($value[37])){
    $statusremark = $value[42];
  }
}

if($statushow=="Delivered"){
    $statushow = "Delivered";
    $statusremark = "Delivered";
    if($value[46]=="0"){ $value[46] = "1";    }
    // Delivery Date
    $deldate = $value[15];
}elseif($statushow=="Shipped"){
    $statushow = "In Transit";
}elseif($statushow=="RTO Delivered To Shipper"){
    $statushow = "RTO Delivered";
    if($value[46]=="0"){ $value[46] = "1";    }
    // RTO Date
    if(!empty($value[15])){      $rtodate = $value[15];    }
}elseif($statushow=="Return To Origin"){
    $statushow = "RTO In Transit";
    if($value[46]=="0"){ $value[46] = "1";    }
}elseif($statushow=="Out For Delivery"){
    $statushow = "OFD";
    $statusremark = "Out For Delivery";
    if($value[46]=="0"){ $value[46] = "1";    }
}elseif(strpos($statushow, 'Delivery Attempted') !== false){
    $statushow = "Undelivered";
    if($value[46]=="0"){ $value[46] = "1";    }
}


$value[5] = strtoupper($value[5]);
$value[2] = trim($value[2]);


// $tdate = date("Y-m-d");

$checkawbexists = "SELECT * FROM `spark_single_order` WHERE `Awb_Number`='$value[2]'";
$awbeixtornot = mysqli_query($conn,$checkawbexists);
if(mysqli_num_rows($awbeixtornot)>0){
    echo "<br>$value[2] : Awb Exit";
    $updatestatus = "UPDATE `spark_single_order` SET 
    `Last_Stamp_Date`='$value[15]',`pickupdate`='$value[12]',`delivereddate`='$deldate',
    `rtodate`='$rtodate',`attemptcount`='$value[46]',
    `order_status`='$value[14]',`order_status1`='$statusremark',`order_status_show`='$statushow' 
    WHERE `Awb_Number`='$value[2]'";
    mysqli_query($conn,$updatestatus);
}else{
    echo "<br>$value[2] : Awb Not Exitst";
    $singlequery = "INSERT INTO `spark_single_order`(
    `Order_Type`, `User_Id`, `Name`, 
    `orderno`, `Awb_Number`, `awb_gen_by`, 
    `Address`, `State`, `City`, `Mobile`, `Pincode`, 
    `Item_Name`, `Quantity`, `Width`, `Height`, `Length`, `Actual_Weight`, 
    `Total_Amount`, `Invoice_Value`, `Cod_Amount`,`additionaltype`,
    `Rec_Time_Date`,`Last_Stamp_Date`,`pickupdate`,`delivereddate`,`rtodate`,`uploadtype`,
    `pickup_id`,`Address_Id`, `pickup_name`,`pickup_mobile`,`pickup_pincode`,
    `pickup_gstin`,`pickup_address`,`pickup_state`,`pickup_city`,`attemptcount`,
    `order_status`,`order_status1`,`order_status_show`,`apihitornot`,`uploaddate`,`uploadtime`
    ) VALUES (
    '$value[5]','$crtdata[User_Id]','$value[16]',
    '$value[1]','$value[2]','Bluedart',
    '$value[17]','$value[19]','$value[18]','$value[21]','$value[20]',
    '$value[9]','$value[8]','','','','$value[10]',
    '$value[4]','$value[4]','$value[6]','',
    '$value[11]','$value[15]','$value[13]','$deldate','$rtodate','Excel',
    '','','$value[25]','$value[30]','$value[29]',
    '','$value[26]','$value[28]','$value[27]','$value[46]',
    '$value[14]','$statusremark','$statushow','1','$tudate','$upcrttime'
    )";
    mysqli_query($conn,$singlequery);
    echo "<br>";
    echo $singlequery;
    echo "<br>";
}


// Last Insert ID
// echo "<br><br>";
// $orderidcreate = "RPDX00".$last_id;
// // echo "<br><br>";
// $value[4] = $orderidcreate;
// // echo "<br><br>";
// $updateorderid = "UPDATE `spark_single_order` SET `orderno`='$orderidcreate' WHERE `Single_Order_Id`='$last_id'";
// // echo "<br><br>";
// mysqli_query($conn,$updateorderid);
// Last Insert ID




// $singlequery = "INSERT INTO `spark_mis_report`(
// `user_id`,`productname`,`awbno`, `orderno`, `pickupdate`, 
// `orderstatus`,`courierremark`,
// `laststatusdate`,`deliverydate`,`firstattemptdate`,
// `origincity`, `originpincode`, `destinationcity`,
// `destinationpincode`, `customername`, 
// `customercontact`, `clientname`, `paymentmode`,
// `codamt`, `orderageing`, `attemptcount`, `couriername`, `rtodate`,
// `rtoreason`, `zonename`, `lastofddate`, `ndrinstructions`,`uploaddate`,`uploadtime`
// ) VALUES (
// '$crtdata[User_Id]','$value[9]','$value[2]','$value[1]','$value[12]',
// '$statushow','$statusremark',
// '$value[15]','$deldate','$value[31]',
// '$value[27]','$value[29]','$value[18]',
// '$value[20]','$userd[Company_Name]',
// '$value[21]','$value[16]','$value[5]',
// '$value[6]','$orderageing','$value[46]','Bluedart','$rtodate',
// '','','','','$tudate','$upcrttime')";
// mysqli_query($conn,$singlequery);
// echo "<br><br>";
        }
    }

// Bluedart Courier
?>












<!-- 500 Gram Start -->
<?php

/*
if(isset($importSubmit5gm))
{
$user_id = $selectedweightidis;
try {
    $bannername = $_FILES["bulkorderfile"]["name"];
    $bannertmp =$_FILES["bulkorderfile"]["tmp_name"];
    move_uploaded_file($bannertmp,"BulkExcelFiles/$bannername");
    $fileD = fopen("BulkExcelFiles/$bannername","r");
    $column=fgetcsv($fileD);
    while(!feof($fileD)){
    $rowData[]=fgetcsv($fileD);
    }

foreach($rowData as $key => $value){
    if($value[0]==""){  continue;   }
    if(empty($value[17]) AND empty($value[18]))
    {
        echo "<script> window.location.assign('bulkorderupload.php?excelfile=invalid Details')</script>";
    }
}


foreach($rowData as $key => $value){
if($value[0]==""){  continue;   }

$value[0] = trim($value[0]);
$value[0] = mysqli_real_escape_string($conn, $value[0]);
$value[1] = trim($value[1]);
$value[1] = mysqli_real_escape_string($conn, $value[1]);
$value[2] = trim($value[2]);
$value[2] = mysqli_real_escape_string($conn, $value[2]);
$value[3] = trim($value[3]);
$value[3] = mysqli_real_escape_string($conn, $value[3]);
$value[4] = trim($value[4]);
$value[4] = mysqli_real_escape_string($conn, $value[4]);
$value[5] = trim($value[5]);
$value[5] = mysqli_real_escape_string($conn, $value[5]);
$value[6] = trim($value[6]);
$value[6] = mysqli_real_escape_string($conn, $value[6]);
$value[7] = trim($value[7]);
$value[7] = mysqli_real_escape_string($conn, $value[7]);
$value[8] = trim($value[8]);
$value[8] = mysqli_real_escape_string($conn, $value[8]);
$value[9] = trim($value[9]);
$value[9] = mysqli_real_escape_string($conn, $value[9]);
$value[10] = trim($value[10]);
$value[10] = mysqli_real_escape_string($conn, $value[10]);
$value[11] = trim($value[11]);
$value[11] = mysqli_real_escape_string($conn, $value[11]);
$value[12] = trim($value[12]);
$value[12] = mysqli_real_escape_string($conn, $value[12]);
$value[13] = trim($value[13]);
$value[13] = mysqli_real_escape_string($conn, $value[13]);
$value[14] = trim($value[14]);
$value[14] = mysqli_real_escape_string($conn, $value[14]);
$value[15] = trim($value[15]);
$value[15] = mysqli_real_escape_string($conn, $value[15]);
$value[16] = trim($value[16]);
$value[16] = mysqli_real_escape_string($conn, $value[16]);
$value[17] = trim($value[17]);
$value[17] = mysqli_real_escape_string($conn, $value[17]);
$value[18] = trim($value[18]);
$value[18] = mysqli_real_escape_string($conn, $value[18]);
$value[19] = trim($value[19]);
$value[19] = mysqli_real_escape_string($conn, $value[19]);
$value[20] = trim($value[20]);
$value[20] = mysqli_real_escape_string($conn, $value[20]);
$value[21] = trim($value[21]);
$value[21] = mysqli_real_escape_string($conn, $value[21]);
if(empty($value[21])){    $value[21] = "";    }
$value[22] = trim($value[22]);
$value[22] = mysqli_real_escape_string($conn, $value[22]);
$value[23] = trim($value[23]);
$value[23] = mysqli_real_escape_string($conn, $value[23]);
$value[24] = trim($value[24]);
$value[24] = mysqli_real_escape_string($conn, $value[24]);

    $tdate = date("Y-m-d");
    $singlequery = "INSERT INTO `spark_single_order`(`Order_Type`, `User_Id`,`Name`, `Address`, `State`, `City`, `Mobile`, `Pincode`, `Item_Name`, `Quantity`, `Width`, `Height`, `Length`, `Actual_Weight`, `Total_Amount`, `Invoice_Value`, `Cod_Amount`,`additionaltype`,`Rec_Time_Date`,`uploadtype`,`pickup_id`,`Address_Id`, `pickup_name`,`pickup_mobile`,`pickup_pincode`,`pickup_gstin`,`pickup_address`,`pickup_state`,`pickup_city`,`order_status`,`order_status1`,`order_status_show`) VALUES ('$value[25]','$user_id','$value[0]','$value[1]','$value[12]','$value[13]','$value[2]','$value[3]','$value[5]','$value[6]','$value[7]','$value[8]','$value[9]','$value[15]','$value[16]','$value[10]','$value[11]','$value[14]','$tdate','Excel','$value[17]','$value[17]','$value[18]','$value[19]','$value[20]','$value[21]','$value[22]','$value[23]','$value[24]','Pending','Pending','Upload')";
    if(mysqli_query($conn,$singlequery)){
      // echo "<br><br>";
      $last_id = mysqli_insert_id($conn);
    }
// Last Insert ID
// echo "<br><br>";
$orderidcreate = "RPDX00".$last_id;
// echo "<br><br>";
$value[4] = $orderidcreate;
// echo "<br><br>";
$updateorderid = "UPDATE `spark_single_order` SET `orderno`='$orderidcreate' WHERE `Single_Order_Id`='$last_id'";
// echo "<br><br>";
mysqli_query($conn,$updateorderid);
// Last Insert ID
}

// echo "<script> window.location.assign('bulkorderupload.php?excelfile=Update')</script>";
// exit();

} catch (Exception $e) {
// echo "<script>window.location.assign('bulkorderupload.php?excelfile=No Update')</script>";
}


}
*/
?>
<!-- 500 Gram End -->
