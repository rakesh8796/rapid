<?php
  session_start();
  include("config/dbcon.php");
  extract($_REQUEST);
  error_reporting(1);
  // $orderdata = date('Y-m-d H:i:s');
?>


<?php
$tudate = date('Y-m-d');
// Check MIS API Loop
$misquery = "SELECT * FROM `spark_mis_report_file` WHERE `apihitornot`='0'  ORDER BY `misfildid` LIMIT 1";
$misqueryr = mysqli_query($conn,$misquery);
$crtnois = 1;
while ($misres = mysqli_fetch_assoc($misqueryr)){
// Check MIS API Loop


      echo $srnois = $misres['misfildid'];
      // $processquery = "UPDATE `spark_mis_report_file` SET `apihitornot`='1' WHERE `Single_Order_Id`='$srnois'";
      // mysqli_query($conn,$processquery);
      echo "<br>";
      echo $couriernameis = $misres['couriername'];
      echo "<br>";
      echo $bannername = $misres['filename'];
      echo "<br>";
      echo "<br>";






// <!--    Upload MIS Report (Rappidx Standard Format)  -->
if($couriernameis=="Standard"){
// Time InterVal Same Between 5 Minute Gap  (1 Min Gap Is 60)
$lastquerytime = "SELECT * FROM `spark_mis_report` ORDER BY `mis_id` DESC";
$lastquerytimer = mysqli_query($conn,$lastquerytime);
$lastquerytimerd = mysqli_fetch_assoc($lastquerytimer);
$lastuploadtime = $lastquerytimerd['uploadtime'];
// echo "<br>";
$crttime = date("H:i:s");
// echo "<br><br>";
$date1 = strtotime("$lastuploadtime");
$date2 = strtotime("$crttime");
$diff = abs($date2 - $date1);
if($diff<300){  $upcrttime = $lastuploadtime; }else{  $upcrttime = date("H:i:s");  }
// Time InterVal Same Between 5 Minute Gap
// $upcrttime = date("H:i:s");


          $user_id = $_SESSION['useridis'];
          try {
          //

// // File Extention Check
// $path = $_FILES['bulkorderfile']['name'];
// $ext = pathinfo($path, PATHINFO_EXTENSION);
// if($ext!="csv"){
// echo "<script> window.location.assign('mis_report.php?excelfile=CSV Required')</script>";
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
// exit();
                  foreach($rowData as $key => $value){
                    if($value[0]=="" OR $value[18]==""){  continue;   }
                    $singlequery1 = "SELECT * FROM `asitfa_user` WHERE `User_Id`='$value[0]' AND `Company_Name`='$value[18]'";
                    // echo "<br><br>";
                    $queryrunis = mysqli_query($conn,$singlequery1);
                    if(mysqli_num_rows($queryrunis)){
                        $tdate = date("Y-m-d");





$statushow = $value[4];
// echo "<br><br>";
if($value[4]=="Delivered" AND $value[5]=="RTO"){
  $statushow = "RTO Delivered";
}elseif($value[4]=="Undelivered" AND $value[5]=="In Transit"){
  $statushow = "In Transit";
}else{
  if($value[4]=="RTO" OR $value[4]=="Delivered"){
    $statushow = "RTO Delivered";
  }elseif($value[4]=="ConnectionPending" OR $value[4]=="In Transit" OR $value[4]=="LH Fwd Intransit"){
    $statushow = "In Transit";
  }elseif($value[4]=="CSAW Pending" OR $value[4]=="CSAW" OR $value[4]=="Re-Attempt" OR $value[4]=="Undelivered" OR $value[4]=="Not Delivered" OR $value[4]=="CSAW-ReAttempt"){
    $statushow = "Undelivered";
  }elseif($value[4]=="LH RTO Intransit" OR $value[4]=="RT" OR $value[4]=="RTO Connection Pending" OR $value[4]=="RTO In Transit" OR $value[4]=="RTO Notified" OR $value[4]=="RTO Undelivered" OR $value[4]=="WHHandover Pending"){
    $statushow = "RTO In Transit";
  }elseif($value[4]=="Undelivered – Multiple Attempt" OR $value[4]=="Undelivered ? Multiple Attempt"){
    $statushow = "Undelivered";
  }elseif($value[4]=="Not Delivered"){
    $statushow = "Undelivered";
  }elseif($value[4]=="" OR $value[4]==" " OR empty($value[4])){
    $statushow = "Undelivered";
  }else{
    $statushow = $value[4];
  }
}

$statushow = trim($statushow);
if(empty($statushow)){  echo $statushow="Undelivered"; }


$uploadorderstatus = "UPDATE `spark_single_order` SET `Last_Time_Stamp`='$value[6]',`pickupdate`='$value[3]',`deliverydate`='$value[7]',`rtodate`='$value[24]',`order_status1`='$value[4]',`order_status`='$value[5]',`order_status_show`='$statushow' WHERE `orderno`='$value[2]'";
mysqli_query($conn,$uploadorderstatus);

$singlequery = "INSERT INTO `spark_mis_report`(
  `user_id`,`awbno`, `orderno`, `pickupdate`, `orderstatus`,
  `courierremark`, `laststatusdate`, `deliverydate`, `firstscandate`, `firstscantime`,
  `firstattemptdate`, `edd`, `origincity`, `originpincode`, `destinationcity`,
  `destinationpincode`, `customername`, `customercontact`, `clientname`, `paymentmode`,
  `codamt`, `orderageing`, `attemptcount`, `couriername`, `rtodate`,
  `rtoreason`, `zonename`, `lastofddate`, `ndrinstructions`,`uploaddate`,`uploadtime`
)VALUES (
  '$value[0]','$value[1]','$value[2]','$value[3]','$value[4]',
  '$value[5]','$value[6]','$value[7]','$value[8]','$value[9]',
  '$value[10]','$value[11]','$value[12]','$value[13]','$value[14]',
  '$value[15]','$value[16]','$value[17]','$value[18]','$value[19]',
  '$value[20]','$value[21]','$value[22]','$value[23]','$value[24]',
  '$value[25]','$value[26]','$value[27]','$value[28]','$tudate','$upcrttime')";
mysqli_query($conn,$singlequery);
                        // echo "<br><br>";

                    }
                  }
// echo "<pre>";
// print_r($rowData);
// exit();
                  // echo "<script> window.location.assign('mis_report.php?excelfile=Update')</script>";
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

// Time InterVal Same Between 5 Minute Gap  (1 Min Gap Is 60)
$lastquerytime = "SELECT * FROM `spark_mis_report_file` ORDER BY `misfildid` DESC";
$lastquerytimer = mysqli_query($conn,$lastquerytime);
$lastquerytimerd = mysqli_fetch_assoc($lastquerytimer);
$lastuploadtime = $lastquerytimerd['uploadtime'];
// echo "<br>";
$crttime = date("H:i:s");
// echo "<br><br>";
$date1 = strtotime("$lastuploadtime");
$date2 = strtotime("$crttime");
$diff = abs($date2 - $date1);
if($diff<300){  $upcrttime = $lastuploadtime; }else{  $upcrttime = date("H:i:s");  }
// Time InterVal Same Between 5 Minute Gap
// $upcrttime = date("H:i:s");

  $user_id = $_SESSION['useridis'];
  try {

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


$row = 1;
if (($handle = fopen("BulkExcelFiles/MisReports/$bannername", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        echo "<p> $num fields in line $row: <br /></p>\n";
        $row++;
        for ($c=0; $c < $num; $c++) {
            echo $data[$c] . "<br />\n";
        }
    }
    fclose($handle);
}





$fileD = fopen("BulkExcelFiles/MisReports/$bannername","r");

$column=fgetcsv($fileD);
while(!feof($fileD)){
$rowData[]=fgetcsv($fileD);
}
// echo "<pre>";
// print_r($rowData);
// exit();
      foreach($rowData as $key => $value){

        if($value[1]==""){  continue;   }
        // $singlequery1 = "SELECT * FROM `spark_single_order` WHERE `Awb_Number`='$value[1]'";
        $singlequery1 = "SELECT * FROM `spark_single_order` WHERE `Awb_Number`='$value[1]' AND `orderno`='$value[2]'";
        $queryrunis = mysqli_query($conn,$singlequery1);
        if(mysqli_num_rows($queryrunis)){
        $crtdata = mysqli_fetch_assoc($queryrunis);
        $tdate = date("Y-m-d");

// First Attempt Date
if(!empty($value[30])){
    $lastupdate = $value[30];
//     $date = str_replace('/', '-', $lastupdate);
// $value[30] = date("Y-m-d", strtotime($date));
// $time30 = date("H:i:s",strtotime($date));
// $firstattemptdatetime = date("Y-m-d H:i:s",strtotime($date));

$dated = substr($lastupdate,0,2);
$datem = substr($lastupdate,3,2);
$datey = substr($lastupdate,6,4);
$value[30] = $datey."-".$datem."-".$dated;
}

// PDD == EDD
if(!empty($value[53])){
    $lastupdate = $value[53];
    // $date = str_replace('/', '-', $lastupdate);
// $value[53] = date("Y-m-d", strtotime($date));
// $time53 = date("H:i:s",strtotime($date));
// $edddatetime = date("Y-m-d H:i:s",strtotime($date));

$dated = substr($lastupdate,0,2);
$datem = substr($lastupdate,3,2);
$datey = substr($lastupdate,6,4);
$value[53] = $datey."-".$datem."-".$dated;
}

// Delivery Date
if(!empty($value[14])){
    $lastupdate = $value[14];
//     $date = str_replace('/', '-', $lastupdate);
// $value[14] = date("Y-m-d", strtotime($date));
// $time14 = date("H:i:s",strtotime($date));
// $deliverydatetime = date("Y-m-d H:i:s",strtotime($date));

$dated = substr($lastupdate,0,2);
$datem = substr($lastupdate,3,2);
$datey = substr($lastupdate,6,4);
$value[14] = $datey."-".$datem."-".$dated;
}

// Last Status Date
if(!empty($value[28])){
    $lastupdate = $value[28];
//     $date = str_replace('/', '-', $lastupdate);
// $value[28] = date("Y-m-d", strtotime($date));
// $time28 = date("H:i:s",strtotime($date));
// $laststatusdatetime = date("Y-m-d H:i:s",strtotime($date));

$dated = substr($lastupdate,0,2);
$datem = substr($lastupdate,3,2);
$datey = substr($lastupdate,6,4);
$value[28] = $datey."-".$datem."-".$dated;
}

// Manifestation Date == Pickup Date
if(!empty($value[12])){
    $lastupdate = $value[12];
    // $date = str_replace('/', '-', $lastupdate);
// $value[12] = date("Y-m-d", strtotime($date));
// $time12 = date("H:i:s",strtotime($date));
// $pickupdatetime = date("Y-m-d H:i:s",strtotime($date));

$dated = substr($lastupdate,0,2);
$datem = substr($lastupdate,3,2);
$datey = substr($lastupdate,6,4);
$value[12] = $datey."-".$datem."-".$dated;
// echo "&ensp;&ensp;:&ensp;&ensp;";
// $timeh = substr($lastupdate,0,2);
// $timem = substr($lastupdate,2,4);
// $time12 = $timeh.":".$timem;
// echo $pickupdatetime = $datey."-".$datem."-".$dated."&ensp;".$timeh.":".$timem;
}

// RTO Date
if(!empty($value[35])){
    $lastupdate = $value[35];
//     $date = str_replace('/', '-', $lastupdate);
// $value[35] = date("Y-m-d", strtotime($date));
// $time35 = date("H:i:s",strtotime($date));
// $rtodatetime = date("Y-m-d H:i:s", strtotime($date));

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

$uploadorderstatus = "UPDATE `spark_single_order` SET
`Last_Time_Stamp`='$laststatusdatetime',
`pickupdate`='$value[12]',`pickupdatetime`='$pickupdatetime',
`delivereddate`='$value[14]',`delivereddatetime`='$deliverydatetime',
`rtodate`='$value[35]',`rtodatetime`='$rtodatetime',
`order_status1`='$value[26]',`order_status`='$value[25]',`order_status_show`='$statushow'
WHERE `orderno`='$value[2]'";
mysqli_query($conn,$uploadorderstatus);

$singlequery = "INSERT INTO `spark_mis_report`(
`user_id`,`awbno`, `orderno`, `pickupdate`,`pickuptime`,
`orderstatus`, `courierremark`,`laststatusdate`, `laststatustime`, `deliverydate`,
`firstscandate`, `firstscantime`, `firstattemptdate`, `edd`,`origincity`,
`originpincode`, `destinationcity`, `destinationpincode`, `customername`, `customercontact`,
`clientname`, `paymentmode`, `codamt`, `orderageing`, `attemptcount`,
`couriername`,`rtodate`, `rtoreason`,  `zonename`, `lastofddate`,
`ndrinstructions`,`uploaddate`,`uploadtime`) VALUES (
'$crtdata[User_Id]','$value[1]','$value[2]','$value[12]','$time12',
'$statushow','$value[25]','$value[28]','$time28','$value[14]',
'$value[12]','$time30','$value[30]','$value[53]','$value[5]',
'$value[37]','$value[8]','$value[16]','$crtdata[pickup_name]','$crtdata[Mobile]',
'$value[44]','$value[19]','$value[34]','$orderageing','$value[24]',
'XpressBees','$value[35]','$value[49]','','',
'','$tudate','$upcrttime')";
mysqli_query($conn,$singlequery);
           // echo "<br><br>";
       }
      }

     // echo "<script> window.location.assign('mis_report.php?excelfile=Update')</script>";
      exit();
  } catch (Exception $e) {
     // echo "<script> window.location.assign('mis_report.php?excelfile=No Update')</script>";
    exit();
  }
}
// Mail MIS Report
// <!--  -->
// <!-- XpressBees -->




















// <!-- DTDC -->
// <!--  -->
if($couriernameis=="DTDC"){

// Time InterVal Same Between 5 Minute Gap  (1 Min Gap Is 60)
$lastquerytime = "SELECT * FROM `spark_mis_report` ORDER BY `mis_id` DESC";
$lastquerytimer = mysqli_query($conn,$lastquerytime);
$lastquerytimerd = mysqli_fetch_assoc($lastquerytimer);
$lastuploadtime = $lastquerytimerd['uploadtime'];
// echo "<br>";
$crttime = date("H:i:s");
// echo "<br><br>";
$date1 = strtotime("$lastuploadtime");
$date2 = strtotime("$crttime");
$diff = abs($date2 - $date1);
if($diff<300){  $upcrttime = $lastuploadtime; }else{  $upcrttime = date("H:i:s");  }
// Time InterVal Same Between 5 Minute Gap
// $upcrttime = date("H:i:s");


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

$uploadorderstatus = "UPDATE `spark_single_order` SET `Last_Time_Stamp`='$value[13]',`pickupdate`='$value[8]',`deliverydate`='',`rtodate`='',`order_status1`='$value[15]',`order_status`='$value[16]',`order_status_show`='$statushow' WHERE `orderno`='$value[2]'";
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
  exit();
  } catch (Exception $e) {
  // echo "<script> window.location.assign('mis_report.php?excelfile=No Update')</script>";
  exit();
  }

}
// <!--  -->
// <!-- DTDC -->









































// <!-- Delhivery -->
// <!--  -->
if($couriernameis=="Delhivery1"){
$user_id = $_SESSION['useridis'];
try {

  // $fileD = fopen("BulkExcelFiles/MisReports/$bannername","r");
  // $column=fgetcsv($fileD);
  // while(!feof($fileD)){
  //  $rowData[]=fgetcsv($fileD);
  // }
  // echo "<pre>";
  // print_r($rowData);
  // echo "</pre>";
  // echo "<br>";


  $fileD = fopen("BulkExcelFiles/MisReports/$bannername","r");
  $column=fgetcsv($fileD);
  $i=0;
  while(!feof($fileD)){
   $rowData[]=fgetcsv($fileD, 1000, ",");
   $i++;
  }
  echo "<pre>";
  // print_r($rowData);
  // print_r($rowData[2]);
  // for($c=0;$c<$num; $c++) {
  //     $data[$c]."<br />\n";
  // }
$j = 0;
foreach($rowData as $key => $value) {
  echo "<br>Sr.".$i." - AWB No Is : ".$value[0]." - Order No : ".$value[3]." - Status : ".$value[8];
  $j++;
}
  echo "</pre>";
  echo "<br>";

  // $row = 1;
  // if (($handle = fopen("BulkExcelFiles/MisReports/$bannername", "r")) !== FALSE) {
  //     while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
  //         $num = count($data);
  //         echo "<p> $num fields in line $row: <br /></p>\n";
  //         for($c=0;$c<$num; $c++) {
  //             echo $data[$c]."<br />\n";
  //         }
  //     $row++;
  //     }
  //     fclose($handle);
  // }







     // echo "<script> window.location.assign('mis_report.php?excelfile=Update')</script>";
     exit();
  } catch (Exception $e) {
     // echo "<script> window.location.assign('mis_report.php?excelfile=No Update')</script>";
     exit();
  }
}
// Mail MIS Report

// <!--  -->
// <!-- Delhivery -->







// <!-- Delhivery -->
// <!--  -->
if($couriernameis=="Delhivery"){


// Time InterVal Same Between 5 Minute Gap  (1 Min Gap Is 60)
$lastquerytime = "SELECT * FROM `spark_mis_report_file` ORDER BY `misfildid` DESC";
$lastquerytimer = mysqli_query($conn,$lastquerytime);
$lastquerytimerd = mysqli_fetch_assoc($lastquerytimer);
$lastuploadtime = $lastquerytimerd['uploadtime'];
// echo "<br>";
$crttime = date("H:i:s");
// echo "<br><br>";
$date1 = strtotime("$lastuploadtime");
$date2 = strtotime("$crttime");
$diff = abs($date2 - $date1);
if($diff<300){  $upcrttime = $lastuploadtime; }else{  $upcrttime = date("H:i:s");  }
// Time InterVal Same Between 5 Minute Gap
// $upcrttime = date("H:i:s");


$user_id = $_SESSION['useridis'];
try {

// // File Extention Check
// $path = $_FILES['bulkorderfile']['name'];
// $ext = pathinfo($path, PATHINFO_EXTENSION);
// if($ext!="csv"){
//   echo "<script> window.location.assign('mis_report.php?excelfile=CSV Required')</script>";
// }
// // File Extention Check
//      $bannername = $_FILES["bulkorderfile"]["name"];
//      $bannertmp =$_FILES["bulkorderfile"]["tmp_name"];
//      move_uploaded_file($bannertmp,"BulkExcelFiles/MisReports/$bannername");
     // $fileD = fopen("BulkExcelFiles/MisReports/$bannername","r");
     // $column=fgetcsv($fileD);
     // while(!feof($fileD)){
     //  $rowData[]=fgetcsv($fileD);
     // }
// echo "<pre>";
// print_r($rowData);
// echo "</pre>";
// exit();



  $fileD = fopen("BulkExcelFiles/MisReports/$bannername","r");
  $column=fgetcsv($fileD);
  // $i=1;
  while(!feof($fileD)){
   $rowData[]=fgetcsv($fileD, 1000, ",");
   // $i++;
  }





      foreach($rowData as $key => $value){

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
  // $value[4] = date("Y-m-d", strtotime($lastupdate));
  $dated = substr($lastupdate,0,2);
  $datem = substr($lastupdate,3,2);
  $datey = substr($lastupdate,6,4);
  $value[4] = $datey."-".$datem."-".$dated;
}
// Order Date
// Pickup Date
if(!empty($value[6])){
  $lastupdate = $value[6];
  // $value[6] = date("Y-m-d", strtotime($lastupdate));
  $dated = substr($lastupdate,0,2);
  $datem = substr($lastupdate,3,2);
  $datey = substr($lastupdate,6,4);
  $value[6] = $datey."-".$datem."-".$dated;
}
// Delhivery Date




// EDD
if(!empty($value[25])){
  $lastupdate = $value[25];
  // $value[25] = date("Y-m-d", strtotime($lastupdate));
  $dated = substr($lastupdate,0,2);
  $datem = substr($lastupdate,3,2);
  $datey = substr($lastupdate,6,4);
  $value[25] = $datey."-".$datem."-".$dated;
}
// EDD
// First Scan Date
if(!empty($value[27])){
  $lastupdate = $value[27];
  // $value[27] = date("Y-m-d", strtotime($lastupdate));
  $dated = substr($lastupdate,0,2);
  $datem = substr($lastupdate,3,2);
  $datey = substr($lastupdate,6,4);
  $value[27] = $datey."-".$datem."-".$dated;
}
// First Scan Date
// First Dispatch Date
if(!empty($value[28])){
  $lastupdate = $value[28];
  // $value[28] = date("Y-m-d", strtotime($lastupdate));
  $dated = substr($lastupdate,0,2);
  $datem = substr($lastupdate,3,2);
  $datey = substr($lastupdate,6,4);
  $value[28] = $datey."-".$datem."-".$dated;
}
// First Dispatch Date
// Manifest Date
if(!empty($value[30])){
  $lastupdate = $value[30];
  // $value[30] = date("Y-m-d", strtotime($lastupdate));
  $dated = substr($lastupdate,0,2);
  $datem = substr($lastupdate,3,2);
  $datey = substr($lastupdate,6,4);
  $value[30] = $datey."-".$datem."-".$dated;
}
// Delhivery Date
// Last Scan Date
if(!empty($value[31])){
  $lastupdate = $value[31];
  // $value[31] = date("Y-m-d", strtotime($lastupdate));
  $dated = substr($lastupdate,0,2);
  $datem = substr($lastupdate,3,2);
  $datey = substr($lastupdate,6,4);
  $value[31] = $datey."-".$datem."-".$dated;
}
// Last Scan Date








// Pickup Date
if(!empty($value[5])){
  $lastupdate = $value[5];
  // echo $value[5] = date("Y-m-d", strtotime($lastupdate));
  $dated = substr($lastupdate,0,2);
  $datem = substr($lastupdate,3,2);
  $datey = substr($lastupdate,6,4);
  $value[5] = $datey."-".$datem."-".$dated;
}
// Delhivery Date
if(!empty($value[24])){
  $lastupdate = $value[24];
  // $value[24] = date("Y-m-d", strtotime($lastupdate));
  $dated = substr($lastupdate,0,2);
  $datem = substr($lastupdate,3,2);
  $datey = substr($lastupdate,6,4);
  $value[24] = $datey."-".$datem."-".$dated;
}
// Estimate Delhivery Date
if(!empty($value[26])){
  $lastupdate = $value[26];
  // $value[26] = date("Y-m-d", strtotime($lastupdate));
  $dated = substr($lastupdate,0,2);
  $datem = substr($lastupdate,3,2);
  $datey = substr($lastupdate,6,4);
  $value[26] = $datey."-".$datem."-".$dated;
}
// Last Update Date
if(!empty($value[29])){
  $lastupdate = $value[29];
  // $value[29] = date("Y-m-d", strtotime($lastupdate));
  $dated = substr($lastupdate,0,2);
  $datem = substr($lastupdate,3,2);
  $datey = substr($lastupdate,6,4);
  $value[29] = $datey."-".$datem."-".$dated;
}
// echo "<br>";


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
  if($value[8]=="Undelivered" OR $value[22]=="Added to Bag"){
    $statushow = "In Transit";
    $value[22] = "In Transit";
  }elseif($value[8]=="Undelivered" OR $value[22]=="Bag Added To Trip"){
    $statushow = "In Transit";
    $value[22] = "In Transit";
  }elseif($value[8]=="Undelivered" OR $value[22]=="Bag Received at Facility"){
    $statushow = "In Transit";
    $value[22] = "In Transit";
  }elseif($value[8]=="Undelivered" OR $value[22]=="Manifest uploaded"){
    $statushow = "Manifest";
    $value[22] = "Manifest Upload";
  }elseif($value[8]=="Undelivered" OR $value[22]=="NDR Call - FE remark correct"){
    $statushow = "Undelivered";
    $value[22] = "Consignee refused to accept";
  }elseif($value[8]=="Undelivered" OR $value[22]=="Shipment Received at Facility"){
    $statushow = "In Transit";
    $value[22] = "In Transit";
  }elseif($value[8]=="Undelivered" OR $value[22]=="Trip Arrived"){
    $statushow = "In Transit";
    $value[22] = "In Transit";
  }elseif($value[8]=="Undelivered" OR $value[22]=="Vehicle delayed"){
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

$statushow = trim($statushow);
if(empty($statushow)){ $statushow="Undelivered"; }


$uploadorderstatus = "UPDATE `spark_single_order` SET
`Last_Time_Stamp`='$value[29]',
`pickupdate`='$value[5]',`pickupdatetime`='$pickupdatetime',
`delivereddate`='$deldate',`delivereddatetime`='$deldate',
`rtodate`='$rtodate',`rtodatetime`='$rtodate',
`order_status1`='$value[10]',`order_status`='$value[8]',`order_status_show`='$statushow'
WHERE `orderno`='$value[3]'";
mysqli_query($conn,$uploadorderstatus);
//
$singlequery = "INSERT INTO `spark_mis_report`(
`user_id`,`awbno`, `orderno`, `pickupdate`, `orderstatus`,
`courierremark`,`laststatusdate`, `deliverydate`, `firstscandate`, `firstscantime`,
`firstattemptdate`, `edd`, `origincity`, `originpincode`, `destinationcity`,
`destinationpincode`, `customername`, `customercontact`, `clientname`, `paymentmode`,
`codamt`, `orderageing`, `attemptcount`,`couriername`, `rtodate`,
`rtoreason`, `zonename`, `lastofddate`, `ndrinstructions`,`uploaddate`,`uploadtime`
) VALUES (
'$crtdata[User_Id]','$value[0]','$value[3]','$value[5]','$statushow',
'$value[22]','$value[29]','$deldate','$value[4]','',
'$value[28]','$value[26]','$origincity','$originpincode','$value[16]',
'$value[18]','$userd[Company_Name]','$crtdata[Mobile]','$crtdata[Name]','$value[7]',
'$value[15]','$orderageing','$value[12]','Delhivery','$rtodate',
'','','','','$tudate','$upcrttime')";
mysqli_query($conn,$singlequery);
// echo "<br><br>";
       }
      }

     // echo "<script> window.location.assign('mis_report.php?excelfile=Update')</script>";
     exit();
  } catch (Exception $e) {
     // echo "<script> window.location.assign('mis_report.php?excelfile=No Update')</script>";
     exit();
  }
}
// Mail MIS Report

// <!--  -->
// <!-- Delhivery -->







// Check MIS API Loop
$crtnois++;
}
// Check MIS API Loop
?>










<?php
    // include "Layout_Footer.php";
?>
