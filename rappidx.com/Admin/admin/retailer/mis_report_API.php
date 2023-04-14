<?php
  session_start();
  include("config/dbcon.php");
  extract($_REQUEST);
  error_reporting(1);
  // $orderdata = date('Y-m-d H:i:s');
?>


<?php


$tudate = date('Y-m-d');
echo $crttime = date("H:i:s");
echo "<br>";


$upcrttime = date("H:i:s");
$tudate = date('Y-m-d');
$crttime = date("H:i:s");
// echo "<br>";


// Time InterVal Same Between 5 Minute Gap  (1 Min Gap Is 60)
$lastquerytime = "SELECT * FROM `spark_mis_report_file` WHERE `apihitornot`='1' ORDER BY `misfildid` DESC LIMIT 1";
$lastquerytimer = mysqli_query($conn,$lastquerytime);
$lastquerytimerd = mysqli_fetch_assoc($lastquerytimer);
$lastuploaddate = $lastquerytimerd['uploaddate'];
$lastuploadtime = $lastquerytimerd['uploadtime'];

if($tudate==$lastuploaddate){
  // $date1 = strtotime("$lastuploadtime");
  // $date2 = strtotime("$crttime");
  // $diff = abs($date2 - $date1);
  // if($diff<1200){  $upcrttime = $lastuploadtime; }else{  $upcrttime = date("H:i:s");  }
  // echo "3 : ".$upcrttime = date("H:i:s");
  // echo "<br>";
  $time1 = new DateTime($lastuploadtime);
  $time2 = new DateTime($crttime);
  $interval = $time1->diff($time2);
  $hours = $interval->format('%H minute(h)');
  // echo "<br>";  
  // echo "3m : ".$minutes = $interval->format('%i minute(m)');
  // echo "<br>";  
  if($hours < 02){
    // echo "Below 1";
    $upcrttime = $lastuploadtime;
  }else{
    // echo "Above 1";
    $upcrttime = date("H:i:s");
  }
}else{
    $upcrttime = date("H:i:s");
}




// $upcrttime = "11:10:02";


// // Time InterVal Same Between 5 Minute Gap  (1 Min Gap Is 60)
// $lastquerytime = "SELECT * FROM `spark_mis_report` ORDER BY `mis_id` DESC LIMIT 1";
// $lastquerytimer = mysqli_query($conn,$lastquerytime);
// $lastquerytimerd = mysqli_fetch_assoc($lastquerytimer);
// $lastuploadtime = $lastquerytimerd['uploadtime'];
// // echo "<br>";
// $crttime = date("H:i:s");
// // echo "<br><br>";
// $date1 = strtotime("$lastuploadtime");
// $date2 = strtotime("$crttime");
// $diff = abs($date2 - $date1);
// if($diff<4200){  $upcrttime = $lastuploadtime; }else{  $upcrttime = date("H:i:s");  }
// // Time InterVal Same Between 5 Minute Gap
// // $upcrttime = date("H:i:s");
// // echo $upcrttime;




// $tudate = date('Y-m-d');
// Check MIS API Loop
$misquery = "SELECT * FROM `spark_mis_report_file` WHERE `apihitornot`='0'  ORDER BY `misfildid` LIMIT 1";
$misqueryr = mysqli_query($conn,$misquery);
$crtnois = 1;
while ($misres = mysqli_fetch_assoc($misqueryr)){
// Check MIS API Loop


      $srnois = $misres['misfildid'];
      $processquery = "UPDATE `spark_mis_report_file` SET `apihitornot`='1',`uploadtime`='$upcrttime' WHERE `misfildid`='$srnois'";
      mysqli_query($conn,$processquery);
    //   echo "<br>";
      $couriernameis = $misres['couriername'];
    //   echo "<br>";
      $bannername = $misres['filename'];
    //   echo "<br>";
    //   echo "<br>";






// <!--    Upload MIS Report (Rappidx Standard Format)  -->
if($couriernameis=="Standard"){
    $user_id = $_SESSION['useridis'];
    try {
    //
    $fileD = fopen("BulkExcelFiles/MisReports/$bannername","r");
    
    $column=fgetcsv($fileD);
    while(!feof($fileD)){
     $rowData[]=fgetcsv($fileD);
    }
    
    
   foreach($rowData as $key => $value){
    if($value[0]==""){  continue;   }
    $tdate = date("Y-m-d");

    if(!empty($value[8])){
      $date = substr($value[8], 0,8);
      $date = explode('-',$date);
      $d = $date[0];
      $m = $date[1];
      $Y = $date[2];
      $value[8] = $Y.'-'.$m.'-'.$d;
      $value[8] = date("Y-m-d", strtotime($value[8]));
    }

    if(!empty($value[21])){
      $date = substr($value[21], 0,8);
      $date = explode('-',$date);
      $d = $date[0];
      $m = $date[1];
      $Y = $date[2];
      $value[21] = $Y.'-'.$m.'-'.$d;
      $value[21] = date("Y-m-d", strtotime($value[21]));
    }

    if(!empty($value[4])){
      $date = substr($value[4], 0,8);
      $date = explode('-',$date);
      $d = $date[0];
      $m = $date[1];
      $Y = $date[2];
      $value[4] = $Y.'-'.$m.'-'.$d;
      $value[4] = date("Y-m-d", strtotime($value[4]));
    }

    // Order ageing
    $nowtime = time();
    $pickupdate = $value[4];
    $pickupdate = date("Y-m-d", strtotime($pickupdate."1 Days"));
    $pickupdate = strtotime($pickupdate);
    $orderageing = $nowtime - $pickupdate;
    $orderageing = round($orderageing / (60 * 60 * 24));
    // Order ageing


    $misupdated = "INSERT INTO `spark_mis_report`(
    `user_id`, `productname`, `awbno`, `orderno`, `pickupdate`, 
    `orderstatus`, `courierremark`,`deliverydate`, `origincity`, `originpincode`, 
    `destinationcity`, `destinationpincode`, `customername`, `customercontact`, `clientname`,
    `paymentmode`, `codamt`, `orderageing`, `attemptcount`, `couriername`, 
    `rtodate`, `uploaddate`, `uploadtime`) VALUES (
    '$value[0]','$value[1]','$value[2]','$value[3]','$value[4]'
    ,'$value[5]','$value[6]','$value[8]','$value[10]','$value[11]'
    ,'$value[12]','$value[13]','$value[14]','$value[15]','$value[16]'
    ,'$value[17]','$value[18]','$orderageing','$value[19]','$value[20]'
    ,'$value[21]','$tudate','$upcrttime'
    )";
    mysqli_query($conn,$misupdated);

  }

                  exit();
          //
          } catch (Exception $e) {
                  // echo "<script> window.location.assign('mis_report.php?excelfile=No Update')</script>";
                  exit();
          }

          }
// <!--    Upload MIS Report (Rappidx Standard Format)  -->















// <!-- XpressBees -->
// <!--  -->
// Mail MIS Report
if($couriernameis=="XpressBees"){

  $user_id = $_SESSION['useridis'];
  try {

$fileD = fopen("BulkExcelFiles/MisReports/$bannername","r");

$column=fgetcsv($fileD);
while(!feof($fileD)){
$rowData[]=fgetcsv($fileD, 1000, ",");
}
// echo "<pre>";
// print_r($rowData);
// exit();
      foreach($rowData as $key => $value){


$value[1] = trim($value[1]);
$value[1] = mysqli_real_escape_string($conn, $value[1]);
$value[2] = trim($value[2]);
$value[2] = mysqli_real_escape_string($conn, $value[2]);

        if($value[1]==""){  continue;   }
        // $singlequery1 = "SELECT * FROM `spark_single_order` WHERE `Awb_Number`='$value[1]'";
        $singlequery1 = "SELECT `User_Id`,`Item_Name`,`pickup_name`,`Mobile` FROM `spark_single_order` WHERE `Awb_Number`='$value[1]' AND `orderno`='$value[2]'";
        $queryrunis = mysqli_query($conn,$singlequery1);
        if(mysqli_num_rows($queryrunis)){
        $crtdata = mysqli_fetch_assoc($queryrunis);
        $tdate = date("Y-m-d");

$useridisa = $crtdata['User_Id'];
$usernameisq = "SELECT * FROM `asitfa_user` WHERE `User_Id`='$useridisa'";
$usernameisq1 = mysqli_query($conn,$usernameisq);
$usernameisq2 = mysqli_fetch_assoc($usernameisq1);
$useridname = $usernameisq2['Company_Name'];

// First Attempt Date
if(!empty($value[30])){
    $lastupdate = $value[30];
$dated = substr($lastupdate,0,2);
$datem = substr($lastupdate,3,2);
$datey = substr($lastupdate,6,4);
$value[30] = $datey."-".$datem."-".$dated;
}

// PDD == EDD
if(!empty($value[53])){
    $lastupdate = $value[53];
$dated = substr($lastupdate,0,2);
$datem = substr($lastupdate,3,2);
$datey = substr($lastupdate,6,4);
$value[53] = $datey."-".$datem."-".$dated;
}

// Delivery Date
if(!empty($value[14])){
    $lastupdate = $value[14];
$dated = substr($lastupdate,0,2);
$datem = substr($lastupdate,3,2);
$datey = substr($lastupdate,6,4);
$value[14] = $datey."-".$datem."-".$dated;
}

// Last Status Date
if(!empty($value[28])){
    $lastupdate = $value[28];
$dated = substr($lastupdate,0,2);
$datem = substr($lastupdate,3,2);
$datey = substr($lastupdate,6,4);
$value[28] = $datey."-".$datem."-".$dated;
}

// Manifestation Date == Pickup Date
if(!empty($value[12])){
    $lastupdate = $value[12];
$dated = substr($lastupdate,0,2);
$datem = substr($lastupdate,3,2);
$datey = substr($lastupdate,6,4);
$value[12] = $datey."-".$datem."-".$dated;
}

// RTO Date
if(!empty($value[35])){
    $lastupdate = $value[35];
$dated = substr($lastupdate,0,2);
$datem = substr($lastupdate,3,2);
$datey = substr($lastupdate,6,4);
$value[35] = $datey."-".$datem."-".$dated;
}

// Order ageing
$nowtime = time();
$pickupdate = $value[12];
$pickupdate = date("Y-m-d", strtotime($pickupdate."1 Days"));
$pickupdate = strtotime($pickupdate);
$orderageing = $nowtime - $pickupdate;
$orderageing = round($orderageing / (60 * 60 * 24));
// Order ageing


// echo "<pre>";
// print_r($rowData);
// exit();
if(empty($value[24])){  $value[24]=0; }

$statushow = $value[26];
// echo "<br><br>";
if($value[26]=="RTD"){
  $statushow = "RTO Delivered";
}elseif($value[26]=="Delivered"){
  $statushow = "Delivered";
}elseif($value[26]=="In Transit"){
  $statushow = "In Transit";
}else{
  if($value[26]=="ConnectionPending" AND $value[25]=="Customer Refused To Accept"){
    $statushow = "Undelivered";
  }elseif($value[26]=="ConnectionPending" AND $value[25]=="Customer not available"){
    $statushow = "Undelivered";
  }elseif($value[26]=="ConnectionPending" AND $value[25]=="Customer Wants Open Delivery"){
    $statushow = "Undelivered";
  }elseif($value[26]=="ConnectionPending" AND $value[25]=="Shipment Missroute"){
    $statushow = "In Transit";
  }elseif($value[26]=="RTO" OR $value[26]=="Delivered"){
    $statushow = "RTO Delivered";
  }elseif($value[26]=="ConnectionPending" OR $value[26]=="In Transit" OR $value[26]=="LH Fwd Intransit" OR $value[26]=="Local Fwd Intransit"){
    $statushow = "In Transit";
  }elseif($value[26]=="CSAW Pending" OR $value[26]=="CSAW" OR $value[26]=="Re-Attempt" OR $value[26]=="Undelivered" OR $value[26]=="Not Delivered" OR $value[26]=="CSAW-ReAttempt"){
    $statushow = "Undelivered";
  }elseif($value[26]=="LH RTO Intransit" OR $value[26]=="RT" OR $value[26]=="RTO Connection Pending" OR $value[26]=="RTO In Transit" OR $value[26]=="RTO Notified" OR $value[26]=="RTO Undelivered" OR $value[26]=="WHHandover Pending"){
    $statushow = "RTO In Transit";
  }elseif($value[26]=="Undelivered – Multiple Attempt" OR $value[26]=="Undelivered ? Multiple Attempt"){
    $statushow = "Undelivered";
  }elseif($value[26]=="" OR $value[26]==" " OR empty($value[26])){
    $statushow = "Undelivered";
  }else{
    $statushow = $value[26];
  }
}

$statushow = trim($statushow);
if($value[26]=="Undelivered" AND $value[24]==0){
    $statushow = "In Transit";
}
// if(empty($statushow)){ $statushow="Undelivered"; }


$value[5] = trim($value[5]);
$value[5] = mysqli_real_escape_string($conn, $value[5]);
$value[8] = trim($value[8]);
$value[8] = mysqli_real_escape_string($conn, $value[8]);
$value[12] = trim($value[12]);
$value[12] = mysqli_real_escape_string($conn, $value[12]);
$value[14] = trim($value[14]);
$value[14] = mysqli_real_escape_string($conn, $value[14]);
$value[16] = trim($value[16]);
$value[16] = mysqli_real_escape_string($conn, $value[16]);
$value[17] = trim($value[17]);
$value[17] = mysqli_real_escape_string($conn, $value[17]);
$value[19] = trim($value[19]);
$value[19] = mysqli_real_escape_string($conn, $value[19]);
$value[24] = trim($value[24]);
$value[24] = mysqli_real_escape_string($conn, $value[24]);
$value[25] = trim($value[25]);
$value[25] = mysqli_real_escape_string($conn, $value[25]);
$value[26] = trim($value[26]);
$value[26] = mysqli_real_escape_string($conn, $value[26]);
$value[28] = trim($value[28]);
$value[28] = mysqli_real_escape_string($conn, $value[28]);
$value[30] = trim($value[30]);
$value[30] = mysqli_real_escape_string($conn, $value[30]);
$value[34] = trim($value[34]);
$value[34] = mysqli_real_escape_string($conn, $value[34]);
$value[35] = trim($value[35]);
$value[35] = mysqli_real_escape_string($conn, $value[35]);
$value[37] = trim($value[37]);
$value[37] = mysqli_real_escape_string($conn, $value[37]);
$value[39] = trim($value[39]);
$value[39] = mysqli_real_escape_string($conn, $value[39]);
$value[40] = trim($value[40]);
$value[40] = mysqli_real_escape_string($conn, $value[40]);
$value[41] = trim($value[41]);
$value[41] = mysqli_real_escape_string($conn, $value[41]);
$value[44] = trim($value[44]);
$value[44] = mysqli_real_escape_string($conn, $value[44]);
$value[49] = trim($value[49]);
$value[49] = mysqli_real_escape_string($conn, $value[49]);
$value[53] = trim($value[53]);
$value[53] = mysqli_real_escape_string($conn, $value[53]);



$uploadorderstatus = "UPDATE `spark_single_order` SET
`Last_Time_Stamp`='$laststatusdatetime',
`pickupdate`='$value[12]',`pickupdatetime`='$pickupdatetime',
`delivereddate`='$value[14]',`delivereddatetime`='$deliverydatetime',
`rtodate`='$value[35]',`rtodatetime`='$rtodatetime',
`order_status1`='$value[26]',`order_status`='$value[25]',`order_status_show`='$statushow',`attemptcount`='$value[24]'
WHERE `orderno`='$value[2]'";
mysqli_query($conn,$uploadorderstatus);

$singlequery = "INSERT INTO `spark_mis_report`(
`user_id`,`awbno`,`productname`, `orderno`, `pickupdate`,`pickuptime`,
`orderstatus`, `courierremark`,`orderstatusnull`,`ordersremark1`,`ordersremark2`,`ordersremark3`,
`laststatusdate`, `laststatustime`, `deliverydate`,
`firstscandate`, `firstscantime`, `firstattemptdate`, `edd`,`origincity`,
`originpincode`, `destinationcity`, `destinationpincode`, `customername`, `customercontact`,
`clientname`, `paymentmode`, `codamt`, `orderageing`, `attemptcount`,
`couriername`,`rtodate`, `rtoreason`,  `zonename`, `lastofddate`,
`ndrinstructions`,`uploaddate`,`uploadtime`) VALUES (
'$crtdata[User_Id]','$value[1]','$crtdata[Item_Name]','$value[2]','$value[12]','$time12',
'$statushow','$value[25]','$value[17]','$value[39]','$value[40]','$value[41]',
'$value[28]','$time28','$value[14]',
'$value[12]','$time30','$value[30]','$value[53]','$value[5]',
'$value[37]','$value[8]','$value[16]','$useridname','$crtdata[Mobile]',
'$value[44]','$value[19]','$value[34]','$orderageing','$value[24]',
'XpressBees','$value[35]','$value[49]','','',
'','$tudate','$upcrttime')";
mysqli_query($conn,$singlequery);
           // echo "<br><br>";
       }
      }

    //   echo "<script> window.location.assign('mis_report.php?excelfile=Update')</script>";
    //   exit();
  } catch (Exception $e) {
    //   echo "<script> window.location.assign('mis_report.php?excelfile=No Update')</script>";
    // exit();
  }
}
// Mail MIS Report
// <!--  -->
// <!-- XpressBees -->

























// <!-- Delhivery New -->
// <!--  -->
// Mail MIS Report
if($couriernameis=="Delhivery"){

  $tudate = date('Y-m-d');
  // Mail MIS Report

    $user_id = $_SESSION['useridis'];
    try {
       $fileD = fopen("BulkExcelFiles/MisReports/$bannername","r");
       $column=fgetcsv($fileD);
       while(!feof($fileD)){
        $rowData[]=fgetcsv($fileD);
       }
        foreach($rowData as $key => $value){
            
$value[0] = trim($value[0]);
$value[0] = mysqli_real_escape_string($conn, $value[0]);
$value[3] = trim($value[3]);
$value[3] = mysqli_real_escape_string($conn, $value[3]);

         if($value[0]==""){  continue;   }
         // $singlequery1 = "SELECT * FROM `spark_single_order` WHERE `Awb_Number`='$value[0]'";
         $singlequery1 = "SELECT * FROM `spark_single_order` WHERE `Awb_Number`='$value[0]' AND `orderno`='$value[3]'";
         $queryrunis = mysqli_query($conn,$singlequery1);
         if(mysqli_num_rows($queryrunis)){
             $tdate = date("Y-m-d");
  $crtdata = mysqli_fetch_assoc($queryrunis);
  $uploaduser = "SELECT * FROM `asitfa_user` WHERE `User_Id`='$crtdata[User_Id]'";
  $uploaduserr = mysqli_query($conn,$uploaduser);
  $userd = mysqli_fetch_assoc($uploaduserr);

  // Order Date
  if(!empty($value[4])){
    $lastupdate = $value[4];
    $dated = substr($lastupdate,0,2);
    $datem = substr($lastupdate,3,2);
    $datey = substr($lastupdate,6,4);
    $value[4] = $datey."-".$datem."-".$dated;
  }
  // Order Date
  // Pickup Date
  if(!empty($value[6])){
    $lastupdate = $value[6];
    $dated = substr($lastupdate,0,2);
    $datem = substr($lastupdate,3,2);
    $datey = substr($lastupdate,6,4);
    $value[6] = $datey."-".$datem."-".$dated;
  }
  // Delhivery Date
  // EDD
  if(!empty($value[25])){
    $lastupdate = $value[25];
    $dated = substr($lastupdate,0,2);
    $datem = substr($lastupdate,3,2);
    $datey = substr($lastupdate,6,4);
    $value[25] = $datey."-".$datem."-".$dated;
  }
  // EDD
  // First Scan Date
  if(!empty($value[27])){
    $lastupdate = $value[27];
    $dated = substr($lastupdate,0,2);
    $datem = substr($lastupdate,3,2);
    $datey = substr($lastupdate,6,4);
    $value[27] = $datey."-".$datem."-".$dated;
  }
  // First Scan Date
  // First Dispatch Date
  if(!empty($value[28])){
    $lastupdate = $value[28];
    $dated = substr($lastupdate,0,2);
    $datem = substr($lastupdate,3,2);
    $datey = substr($lastupdate,6,4);
    $value[28] = $datey."-".$datem."-".$dated;
  }
  // First Dispatch Date
  // Manifest Date
  if(!empty($value[30])){
    $lastupdate = $value[30];
    $dated = substr($lastupdate,0,2);
    $datem = substr($lastupdate,3,2);
    $datey = substr($lastupdate,6,4);
    $value[30] = $datey."-".$datem."-".$dated;
  }
  // Delhivery Date
  // Last Scan Date
  if(!empty($value[31])){
    $lastupdate = $value[31];
    $dated = substr($lastupdate,0,2);
    $datem = substr($lastupdate,3,2);
    $datey = substr($lastupdate,6,4);
    $value[31] = $datey."-".$datem."-".$dated;
  }
  // Last Scan Date
  // Pickup Date
  if(!empty($value[5])){
    $lastupdate = $value[5];
    $dated = substr($lastupdate,0,2);
    $datem = substr($lastupdate,3,2);
    $datey = substr($lastupdate,6,4);
    $value[5] = $datey."-".$datem."-".$dated;
  }
  // Delhivery Date
  if(!empty($value[24])){
    $lastupdate = $value[24];
    $dated = substr($lastupdate,0,2);
    $datem = substr($lastupdate,3,2);
    $datey = substr($lastupdate,6,4);
    $value[24] = $datey."-".$datem."-".$dated;
  }
  // Estimate Delhivery Date
  if(!empty($value[26])){
    $lastupdate = $value[26];
    $dated = substr($lastupdate,0,2);
    $datem = substr($lastupdate,3,2);
    $datey = substr($lastupdate,6,4);
    $value[26] = $datey."-".$datem."-".$dated;
  }
  // Last Update Date
  if(!empty($value[29])){
    $lastupdate = $value[29];
    $dated = substr($lastupdate,0,2);
    $datem = substr($lastupdate,3,2);
    $datey = substr($lastupdate,6,4);
    $value[29] = $datey."-".$datem."-".$dated;
  }
  // Origin City
  $origincity = $crtdata['pickup_city'];
  // Origin Pincode
  $originpincode = $crtdata['pickup_pincode'];
  // Order ageing
  $nowtime = time();
  $pickupdate = $value[5];
  $pickupdate = date("Y-m-d", strtotime($pickupdate."1 Days"));
  $pickupdate = strtotime($pickupdate);
  $orderageing = $nowtime - $pickupdate;
  $orderageing = round($orderageing / (60 * 60 * 24));
  // Order ageing

  $rtodate = '0000-00-00';
  $deldate = '0000-00-00';

  if(empty($value[12])){  $value[12]=0;   }
  $statushow = $value[8];
  
  
  // echo "<br><br>";
  if($value[10]=="Delivered" AND $value[8]=="RTO"){
    $rtodate = $value[24];
    $statushow = "RTO Delivered";
  }elseif($value[10]=="Undelivered" AND $value[8]=="In Transit"){
    $statushow = "In Transit";
  }elseif($value[10]=="Delivered" AND $value[8]=="Delivered"){
    $deldate = $value[24];
    $statushow = "Delivered";
  }else{
    if($value[8]=="Undelivered" AND $value[22]=="Added to Bag"){
      $statushow = "In Transit";
      $value[22] = "In Transit";
    }elseif($value[8]=="Undelivered" AND $value[22]=="Bag Added To Trip"){
      $statushow = "In Transit";
      $value[22] = "In Transit";
    }elseif($value[8]=="Undelivered" AND $value[22]=="Bag Received at Facility"){
      $statushow = "In Transit";
      $value[22] = "In Transit";
    }elseif($value[8]=="Undelivered" AND $value[22]=="Manifest uploaded"){
      $statushow = "Manifest";
      $value[22] = "Manifest Upload";
    }elseif($value[8]=="Undelivered" AND $value[22]=="NDR Call - FE remark correct"){
      $statushow = "Undelivered";
      $value[22] = "Consignee refused to accept";
    }elseif($value[8]=="Undelivered" AND $value[22]=="Shipment Received at Facility"){
      $statushow = "In Transit";
      $value[22] = "In Transit";
    }elseif($value[8]=="Undelivered" AND $value[22]=="Trip Arrived"){
      $statushow = "In Transit";
      $value[22] = "In Transit";
    }elseif($value[8]=="Undelivered" AND $value[22]=="Vehicle delayed"){
      $statushow = "In Transit";
      $value[22] = "In Transit";
    }elseif($value[10]=="RTO" OR $value[10]=="Delivered"){
      $statushow = "RTO Delivered";
    }elseif($value[10]=="ConnectionPending" OR $value[10]=="In Transit" OR $value[10]=="LH Fwd Intransit"){
      $statushow = "In Transit";
    }elseif($value[10]=="CSAW Pending" OR $value[10]=="CSAW" OR $value[10]=="Re-Attempt" OR $value[10]=="Undelivered" OR $value[10]=="Not Delivered"){
      $statushow = "Undelivered";
    }elseif($value[10]=="LH RTO Intransit" OR $value[10]=="RT" OR $value[10]=="RTO Connection Pending" OR $value[10]=="RTO In Transit" OR $value[10]=="RTO Notified" OR $value[10]=="RTO Undelivered" OR $value[10]=="WHHandover Pending"){
      $statushow = "RTO In Transit";
    }elseif($value[10]=="Undelivered – Multiple Attempt" OR $value[10]=="Undelivered ? Multiple Attempt"){
      $statushow = "Undelivered";
    }elseif($value[10]=="Not Delivered"){
      $statushow = "Undelivered";
    }elseif($value[10]=="" OR $value[10]==" " OR empty($value[10])){
      $statushow = "Undelivered";
    }elseif($value[10]==""){
      $statushow = "Undelivered";
    }else{
      $statushow = $value[8];
    }
  }



$value[7] = trim($value[7]);
$value[7] = mysqli_real_escape_string($conn, $value[7]);
$value[8] = trim($value[8]);
$value[8] = mysqli_real_escape_string($conn, $value[8]);
$value[10] = trim($value[10]);
$value[10] = mysqli_real_escape_string($conn, $value[10]);
$value[12] = trim($value[12]);
$value[12] = mysqli_real_escape_string($conn, $value[12]);
$value[15] = trim($value[15]);
$value[15] = mysqli_real_escape_string($conn, $value[15]);
$value[16] = trim($value[16]);
$value[16] = mysqli_real_escape_string($conn, $value[16]);
$value[18] = trim($value[18]);
$value[18] = mysqli_real_escape_string($conn, $value[18]);
$value[22] = trim($value[22]);
$value[22] = mysqli_real_escape_string($conn, $value[22]);



  $statushow = trim($statushow);
  // if(empty($statushow)){ $statushow=$value[8]; }
  if($value[10]=="Undelivered" AND $value[12]==0){
      $statushow = "In Transit";
  }
  if($value[8]=="Undelivered" AND $value[12]==0){
      $statushow = "In Transit";
  }elseif($statushow=="OFD"){
      $value[22] = "Out For Delivery";
  }elseif($statushow=="RAD"){
      $value[22] = "Reached At Destination";
  }
  
  if($value[8]=="Not Picked" AND $value[10]=="Undelivered" AND $value[12]==0 AND $value[22]=="Shipment not received from client"){
      $statushow = "Not Picked";
  }
  // if(empty($statushow)){ $statushow="Undelivered"; }
  // if(empty($statushow)){ $statushow="Undelivered"; }


  // $uploadorderstatus = "UPDATE `spark_single_order` SET `order_status1`='$value[10]',`order_status`='$value[8]',`order_status_show`='$statushow' WHERE `orderno`='$value[3]'";
  // mysqli_query($conn,$uploadorderstatus);

  $uploadorderstatus = "UPDATE `spark_single_order` SET
  `Last_Time_Stamp`='$value[29]',
  `pickupdate`='$value[5]',`pickupdatetime`='$pickupdatetime',
  `delivereddate`='$deldate',`delivereddatetime`='$deldate',
  `rtodate`='$rtodate',`rtodatetime`='$rtodate',
  `order_status1`='$value[10]',`order_status`='$value[8]',`order_status_show`='$statushow',`attemptcount`='$value[12]'
  WHERE `orderno`='$value[3]'";
  mysqli_query($conn,$uploadorderstatus);


  $singlequery = "INSERT INTO `spark_mis_report`(
  `user_id`,`awbno`, `productname`, `orderno`, `pickupdate`, `orderstatus`,
  `courierremark`,`laststatusdate`, `deliverydate`, `firstscandate`, `firstscantime`,
  `firstattemptdate`, `edd`, `origincity`, `originpincode`, `destinationcity`,
  `destinationpincode`, `customername`, `customercontact`, `clientname`, `paymentmode`,
  `codamt`, `orderageing`, `attemptcount`,`couriername`, `rtodate`,
  `rtoreason`, `zonename`, `lastofddate`, `ndrinstructions`,`uploaddate`,`uploadtime`
  ) VALUES (
  '$crtdata[User_Id]','$value[0]','$crtdata[Item_Name]','$value[3]','$value[5]','$statushow',
  '$value[22]','$value[29]','$deldate','$value[4]','',
  '$value[28]','$value[26]','$origincity','$originpincode','$value[16]',
  '$value[18]','$userd[Company_Name]','$crtdata[Mobile]','$crtdata[Name]','$value[7]',
  '$value[15]','$orderageing','$value[12]','Delhivery','$rtodate',
  '','','','','$tudate','$upcrttime')";
  mysqli_query($conn,$singlequery);
  // echo "<br><br>";
         }
        }
       echo "<script> window.location.assign('mis_reporte.php?excelfile=Update')</script>";
    } catch (Exception $e) {
       echo "<script> window.location.assign('mis_reporte.php?excelfile=No Update')</script>";
    }
  // Mail MIS Report

}
  // <!--  -->
  // <!-- Delhivery -->



















// <!-- DTDC -->
// <!--  -->
if($couriernameis=="DTDC"){

// // Time InterVal Same Between 5 Minute Gap  (1 Min Gap Is 60)
// $lastquerytime = "SELECT `uploadtime` FROM `spark_mis_report` ORDER BY `mis_id` DESC";
// $lastquerytimer = mysqli_query($conn,$lastquerytime);
// $lastquerytimerd = mysqli_fetch_assoc($lastquerytimer);
// $lastuploadtime = $lastquerytimerd['uploadtime'];
// // echo "<br>";
// $crttime = date("H:i:s");
// // echo "<br><br>";
// $date1 = strtotime("$lastuploadtime");
// $date2 = strtotime("$crttime");
// $diff = abs($date2 - $date1);
// if($diff<14400){  $upcrttime = $lastuploadtime; }else{  $upcrttime = date("H:i:s");  }
// // Time InterVal Same Between 5 Minute Gap
// // $upcrttime = date("H:i:s");


$user_id = $_SESSION['useridis'];
try {
//

// // File Extention Check
// $path = $_FILES['bulkorderfile']['name'];
// $ext = pathinfo($path, PATHINFO_EXTENSION);
// if($ext!="csv"){
//   echo "<script> window.location.assign('mis_report.php?excelfile=CSV Required')</script>";
// }
// // File Extention Check
// $bannername = $_FILES["bulkorderfile"]["name"];
// $bannertmp =$_FILES["bulkorderfile"]["tmp_name"];
// move_uploaded_file($bannertmp,"BulkExcelFiles/MisReports/$bannername");

$fileD = fopen("BulkExcelFiles/MisReports/$bannername","r");

$column=fgetcsv($fileD);
while(!feof($fileD)){
$rowData[]=fgetcsv($fileD);
}
  // echo "<pre>";
  // print_r($rowData);
  foreach($rowData as $key => $value){
   if($value[1]==""){  continue;   }
    // $singlequery1 = "SELECT * FROM `spark_single_order` WHERE `Awb_Number`='$value[1]'";
    $singlequery1 = "SELECT * FROM `spark_single_order` WHERE `Awb_Number`='$value[1]' AND `orderno`='$value[2]'";
    $queryrunis = mysqli_query($conn,$singlequery1);
    if(mysqli_num_rows($queryrunis)){

$crtdata = mysqli_fetch_assoc($queryrunis);
$uploaduser = "SELECT * FROM `asitfa_user` WHERE `User_Id`='$crtdata[User_Id]'";
$uploaduserr = mysqli_query($conn,$uploaduser);
$userd = mysqli_fetch_assoc($uploaduserr);

       $tdate = date("Y-m-d");
      // echo $value[13];
      // echo "&ensp;&ensp;---&ensp;&ensp;";
if(!empty($value[13])){
  $lastupdate = $value[13];
  $value[13] = date("Y-m-d", strtotime($lastupdate));
}

if(!empty($value[8])){
  $lastupdate = $value[8];
  $value[8] = date("Y-m-d", strtotime($lastupdate));
}


// Order ageing
$nowtime = time();
$pickupdate = $value[8];
$pickupdate = date("Y-m-d", strtotime($pickupdate."1 Days"));
$pickupdate = strtotime($pickupdate);
$orderageing = $nowtime - $pickupdate;
$orderageing = round($orderageing / (60 * 60 * 24));
// Order ageing

$statushow = $value[15];
$statushow = trim($statushow);
// echo "<br><br>";
if($value[15]=="RTD"){
  $statushow = "RTO Delivered";
}elseif($value[15]=="Delivered"){
  $statushow = "Delivered";
}elseif($value[15]=="Not Delivered"){
    $statushow = "Undelivered";
}elseif($value[15]=="Undelivered" OR $value[15]=="In Transit"){
  $statushow = "In Transit";
}else{
  if($value[15]=="RTO" OR $value[15]=="Delivered"){
    $statushow = "RTO Delivered";
  }elseif($value[15]=="ConnectionPending" OR $value[15]=="In Transit" OR $value[15]=="LH Fwd Intransit"){
    $statushow = "In Transit";
  }elseif($value[15]=="CSAW Pending" OR $value[15]=="CSAW" OR $value[15]=="Re-Attempt" OR $value[15]=="Undelivered" OR $value[15]=="Not Delivered"){
    $statushow = "Undelivered";
  }elseif($value[15]=="LH RTO Intransit" OR $value[15]=="RT" OR $value[15]=="RTO Connection Pending" OR $value[15]=="RTO In Transit" OR $value[15]=="RTO Notified" OR $value[15]=="RTO Undelivered" OR $value[15]=="WHHandover Pending"){
    $statushow = "RTO In Transit";
  }elseif($value[15]=="Undelivered – Multiple Attempt" OR $value[15]=="Undelivered ? Multiple Attempt"){
    $statushow = "Undelivered";
  }elseif($value[15]=="" OR $value[15]==" " OR empty($value[15])){
    $statushow = "Undelivered";
  }elseif($value[15]==""){
    $statushow = "Undelivered";
  }else{
    $statushow = $value[15];
  }
}

$statushow = trim($statushow);
if(empty($statushow)){ $statushow="Undelivered"; }

$uploadorderstatus = "UPDATE `spark_single_order` SET 
`Last_Time_Stamp`='$value[13]',`pickupdate`='$value[8]',`deliverydate`='',
`rtodate`='',`order_status1`='$value[15]',`order_status`='$value[16]',
`order_status_show`='$statushow'
WHERE `orderno`='$value[2]'";
mysqli_query($conn,$uploadorderstatus);

$singlequery = "INSERT INTO `spark_mis_report`(
`user_id`,`awbno`, `orderno`, `pickupdate`, `orderstatus`,
`courierremark`, `laststatusdate`, `laststatustime`, `deliverydate`, `firstscandate`,
`firstscantime`, `firstattemptdate`, `edd`, `origincity`, `originpincode`,
`destinationcity`, `destinationpincode`, `customername`, `customercontact`, `clientname`,
`paymentmode`, `codamt`, `orderageing`, `attemptcount`, `couriername`,
`rtodate`, `rtoreason`, `zonename`, `lastofddate`, `ndrinstructions`,
`uploaddate`,`uploadtime`
) VALUES (
'$crtdata[User_Id]','$value[1]','$value[2]','$value[8]','$statushow',
'$value[16]','$value[13]','$value[14]','','$value[8]',
'','','','$value[5]','$value[4]',
'$value[7]','$value[6]','$userd[Company_Name]','$crtdata[Mobile]','$crtdata[Name]',
'','','$orderageing','','DTDC',
'','','','','',
'$tudate','$upcrttime')";
mysqli_query($conn,$singlequery);
       // echo "<br><br>";
   }
  }
  // echo "<script> window.location.assign('mis_report.php?excelfile=Update')</script>";
//   exit();
  } catch (Exception $e) {
  // echo "<script> window.location.assign('mis_report.php?excelfile=No Update')</script>";
//   exit();
  }

}
// <!--  -->
// <!-- DTDC -->























// Bluedart Courier
// <!--  -->
if($couriernameis=="Bluedart"){
$user_id = $_SESSION['useridis'];
try {

  $fileD = fopen("BulkExcelFiles/MisReports/$bannername","r");
  $column=fgetcsv($fileD);
  // $i=1;
  while(!feof($fileD)){
   $rowData[]=fgetcsv($fileD, 1000, ",");
   // $i++;
  }

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

// Pickup Date
if(!empty($value[12])){
  $lastupdate = $value[12];
  $dated = substr($lastupdate,0,2);
  $datem = substr($lastupdate,3,2);
  $datey = substr($lastupdate,6,4);
  $value[12] = $datey."-".$datem."-".$dated;
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
    if(!empty($value[15])){
      $rtodate = $value[15];
    }
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

$singlequery = "INSERT INTO `spark_mis_report`(
`user_id`,`productname`,`awbno`, `orderno`, `pickupdate`, 
`orderstatus`,`courierremark`,
`laststatusdate`,`deliverydate`,`firstattemptdate`,
`origincity`, `originpincode`, `destinationcity`,
`destinationpincode`, `customername`, 
`customercontact`, `clientname`, `paymentmode`,
`codamt`, `orderageing`, `attemptcount`, `couriername`, `rtodate`,
`rtoreason`, `zonename`, `lastofddate`, `ndrinstructions`,`uploaddate`,`uploadtime`
) VALUES (
'$crtdata[User_Id]','$value[9]','$value[2]','$value[1]','$value[12]',
'$statushow','$statusremark',
'$value[15]','$deldate','$value[31]',
'$value[27]','$value[29]','$value[18]',
'$value[20]','$userd[Company_Name]',
'$value[21]','$value[16]','$value[5]',
'$value[6]','$orderageing','$value[46]','Bluedart','$rtodate',
'','','','','$tudate','$upcrttime')";
mysqli_query($conn,$singlequery);
// echo "<br><br>";
       }
      }
     // echo "<script> window.location.assign('mis_report.php?excelfile=Update')</script>";
    //  exit();
  } catch (Exception $e) {
     // echo "<script> window.location.assign('mis_report.php?excelfile=No Update')</script>";
    //  exit();
  }
}
// Mail MIS Report
// <!--  -->
// Bluedart Courier















// Check MIS API Loop
$crtnois++;
}
// Check MIS API Loop
?>










<?php
    // include "Layout_Footer.php";
?>
