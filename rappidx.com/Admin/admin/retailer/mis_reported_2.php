<?php
    include "Layout_Header.php";
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Page Content -->


<style type="text/css">
.misreportclass {
    font-size: 13px;
}
</style>









<section class="content">
  <div class="col-md-12" style="background-color:#E7EBEF">
<div class="col-md-12">




    <div class=" white-box fontweighlight">
          <div class="">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                  <h5 class="fontweighlight" style="background-color:#33333373;padding:5px">MIS Reports (Last 10 Days)
                  <span class="pull-right">
                    <?php
                    if($_GET['excelfile'] == 'Update'){
                        echo "<div class='success' style='color:black;margin-right:450px'>File Upload Successfully</div>";
                    }elseif($_GET['excelfile'] == 'No Update'){
                        echo "<div class='success' style='color:black;margin-right:450px'>File Not Upload</div>";
                    }elseif($_GET['excelfile'] == 'MIS Delete'){
                        echo "<div class='success' style='color:black;margin-right:450px'>MIS Record Delete Successfully</div>";
                    }elseif($_GET['excelfile'] == 'MIS Not Delete'){
                        echo "<div class='success' style='color:black;margin-right:450px'>MIS Record Not Deleted</div>";
                    }elseif($_GET['excelfile'] == 'Not Working'){
                        echo "<div class='success' style='color:black;margin-right:450px'>No Response</div>";
                    }
                    ?>
                  </span>
                  </h5>
                 </div>
          </div>



<script type="text/javascript">
$(document).ready(function(){
  // alert('work');
  $("#last10daymisreports").html("Loading...");
  $.ajax({
  type: "GET",
  url: 'misreports/edmis.php',
  data:{val:"Today "},
  success: function (data){
    $("#last10daymisreports").html(data);
  },
  error: function (data) {
    console.log('Error:', data);
  }
  });
});
</script>
<div class="panel-body" id="last10daymisreports">
  <!-- No Data -->
</div>



<style type="text/css">
.uploadbutton{
    margin-top: -5px !important;
    color: #428bca  !important;
    background-color: #fff0 !important;
    border-color: #fff0 !important;
    outline: 0px auto -webkit-focus-ring-color !important;
    outline-offset: -0px !important;
    font-size: 14px !important;
}
.uploadbuttondwn{
    font-size: 13px !important;
}
</style>


<style>
.white-box1{
  padding:15px !important;
  border-radius:10px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19) !important;
}
.fontweighlight{
  font-size:13px !important;
}
.uploadbutton{
  font-size:11px !important;
}
.uploadbuttondwn{
  font-size:11px !important;
}
</style>










<section class="content">
<div class="row" style="padding:0px">
<div class="col-md-12" style="padding:0px">
<div class="panel white-box1" style="background:#fff;color:white !important;padding:0px">
<div class="panel-heading">
<h3 class="panel-title text-center fontweighlight" style="font-size:14px !important;background:#b5b5b5;border-radius:20px;color:#333131">&ensp;&ensp;Upload MIS Report in CSV Format &ensp; (<span style='color:brown'> *Date Format dd/mm/yyyy </span>) </h3>
</div>
<div class="panel-body" style="padding:0px">
<div class="col-md-12" style="padding:0px;font-size:10px">


<!-- Standerd -->
<div class="col-md-3" style="border-right:1px solid #33333373;border-left:1px solid #33333373">
  <h4 class="panel-title text-center fontweighlight" style="background:#b5b5b5;border-radius:20px;color:#333131">&ensp;&ensp;Rappidx Standard</h4><br>
  <form method="post" enctype="multipart/form-data" class="text-center">
    <div class="col-md-12"><br>
        <input type="file" name="bulkorderfile" required="" style="width:100%;color:black">
    </div>
    <div class="col-md-12"><br>
       <button class="btn uploadbutton" name="importSubmit"><span style="color:#333131;"><i class="fa fa-upload" aria-hidden="true"></i> UPLOAD  &ensp; </span></button>
    </div>
    <div class="col-md-12"><br><br>
      <a href="BulkExcelFiles/MisReports/Sample/Data2.csv" class="uploadbuttondwn" style="color:#333131"><b>CSV File With Sample Data</b></a>
    </div>
    <div class="col-md-12"><br>
        <a href="BulkExcelFiles/MisReports/Sample/Mis_Report_Sample2.csv" class="uploadbuttondwn" style="color:#333131"><b>CSV File Without Sample Data</b></a>
    </div>
  </form>

</div>
<!-- Standerd -->
<!-- Rappidx -->
<div class="col-md-3" style="border-right:1px solid #33333373">
  <h4 class="panel-title text-center fontweighlight" style="background:#b5b5b5;border-radius:20px;color:#333131">&ensp;&ensp;XpressBees</h4><br>
    <form method="post" enctype="multipart/form-data" class="text-center">
        <div class="col-md-12"><br>
            <input type="file" name="bulkorderfile" required="" style="width:100%;color:black">
        </div>
        <div class="col-md-12"><br>
            <button class="btn uploadbutton" name="XBMailimportSubmit"><span style="color:#333131"><i class="fa fa-upload" aria-hidden="true"></i> UPLOAD &ensp; </span></button>
        </div>
    </form>
    <div class="col-md-12"><br><br>
      <a href="BulkExcelFiles/MisReports/Sample/XpressBees/XB_Final.csv" class="uploadbuttondwn" style="color:#333131"><b>CSV-Uploading Sample File</b></a>
    </div><br><br>&esnsp;<br>&ensp;


</div>
<!-- Rappidx -->
<!-- DTDC -->
<div class="col-md-3" style="border-right:1px solid #33333373">
  <h4 class="panel-title text-center fontweighlight" style="background:#b5b5b5;border-radius:20px;color:#333131">&ensp;&ensp;DTDC</h4><br>
    <form method="post" enctype="multipart/form-data" class="text-center">
        <div class="col-md-12"><br>
            <input type="file" name="bulkorderfile" required="" style="width:100%;color:black">
        </div>
        <div class="col-md-12"><br>
            <button class="btn uploadbutton" name="DTDCMailFormat"><span style="color:#333131"><i class="fa fa-upload" aria-hidden="true"></i> UPLOAD &ensp;&ensp;&ensp;</span></button>
        </div>
    </form>
    <div class="col-md-12"><br><br>
        <a href="BulkExcelFiles/MisReports/Sample/DTDC/DTDC_Final.csv" class="uploadbuttondwn" style="color:#333131"><b>CSV-Uploading Sample File</b></a>
    </div><br><br>&esnsp;<br>&ensp;

</div>
<!-- DTDC -->
<!-- Delhivery -->
<div class="col-md-3" style="border-right:1px solid #33333373">
    <h4 class="panel-title text-center fontweighlight" style="background:#b5b5b5;border-radius:20px;color:#333131">&ensp;&ensp;Delhivery</h4><br>
    <form method="post" enctype="multipart/form-data" class="text-center">
        <div class="col-md-12"><br>
            <input type="file" name="bulkorderfile" required="" style="width:100%;color:black;font-size:10px">
        </div>
        <div class="col-md-12"><br>
            <button class="btn uploadbutton" name="DelhiveryMailimportSubmit"><span style="color:#333131;"><i class="fa fa-upload" aria-hidden="true"></i> UPLOAD</span></button>
        </div>
    </form>
    <div class="col-md-12"><br><br>
        <a href="BulkExcelFiles/MisReports/Sample/Delhivery/Delhivery_Final.csv" class="uploadbuttondwn" style="color:#333131"><b>CSV-Uploading Sample File</b></a>
    </div><br><br>&esnsp;<br>&ensp;

</div>
<!-- Delhivery -->


</div>
</div>


</div>
</div>
</div>
</section>












































<!--    Upload MIS Report (Rappidx Standard Format)  -->
<?php
$tudate = date('Y-m-d');
if(isset($importSubmit))
{
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
if($diff<3600){  $upcrttime = $lastuploadtime; }else{  $upcrttime = date("H:i:s");  }
// Time InterVal Same Between 5 Minute Gap
// $upcrttime = date("H:i:s");


          $user_id = $_SESSION['useridis'];
          try {
          //

// File Extention Check
$path = $_FILES['bulkorderfile']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
if($ext!="csv"){
  echo "<script> window.location.assign('mis_reported.php?excelfile=CSV Required')</script>";
}
// File Extention Check

                  $bannername = $_FILES["bulkorderfile"]["name"];
                  $bannertmp =$_FILES["bulkorderfile"]["tmp_name"];
                  move_uploaded_file($bannertmp,"BulkExcelFiles/MisReports/$bannername");

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


$uploadorderstatus = "UPDATE `spark_single_order` SET `order_status1`='$value[4]',`order_status`='$value[5]',`order_status_show`='$statushow' WHERE `orderno`='$value[2]'";
mysqli_query($conn,$uploadorderstatus);

            $singlequery = "INSERT INTO `spark_mis_report`(`user_id`,`awbno`, `orderno`, `pickupdate`, `orderstatus`, `courierremark`, `laststatusdate`, `deliverydate`, `firstscandate`, `firstscantime`, `firstattemptdate`, `edd`, `origincity`, `originpincode`, `destinationcity`, `destinationpincode`, `customername`, `customercontact`, `clientname`, `paymentmode`, `codamt`, `orderageing`, `attemptcount`, `couriername`, `rtodate`, `rtoreason`, `zonename`, `lastofddate`, `ndrinstructions`,`uploaddate`,`uploadtime`) VALUES ('$value[0]','$value[1]','$value[2]','$value[3]','$value[4]','$value[5]','$value[6]','$value[7]','$value[8]','$value[9]','$value[10]','$value[11]','$value[12]','$value[13]','$value[14]','$value[15]','$value[16]','$value[17]','$value[18]','$value[19]','$value[20]','$value[21]','$value[22]','$value[23]','$value[24]','$value[25]','$value[26]','$value[27]','$value[28]','$tudate','$upcrttime')";
            mysqli_query($conn,$singlequery);
                        // echo "<br><br>";

                    }
                  }
// echo "<pre>";
// print_r($rowData);
// exit();
                  echo "<script> window.location.assign('mis_reported.php?excelfile=Update')</script>";
          //
          } catch (Exception $e) {
                  echo "<script> window.location.assign('mis_reported.php?excelfile=No Update')</script>";
          }

          }
          ?>
<!--    Upload MIS Report (Rappidx Standard Format)  -->













<!-- XpressBees -->
<!--  -->
<?php
$tudate = date('Y-m-d');
// Mail MIS Report
if(isset($XBMailimportSubmit))
{

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
if($diff<3600){  $upcrttime = $lastuploadtime; }else{  $upcrttime = date("H:i:s");  }
// Time InterVal Same Between 5 Minute Gap
// $upcrttime = date("H:i:s");

  $user_id = $_SESSION['useridis'];
  try {

// File Extention Check
$path = $_FILES['bulkorderfile']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
if($ext!="csv"){
  echo "<script> window.location.assign('mis_reported.php?excelfile=CSV Required')</script>";
}
// File Extention Check

$bannername = $_FILES["bulkorderfile"]["name"];
$bannertmp =$_FILES["bulkorderfile"]["tmp_name"];
move_uploaded_file($bannertmp,"BulkExcelFiles/MisReports/$bannername");

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
//     $date = str_replace('/', '-', $lastupdate);
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
//     $date = str_replace('/', '-', $lastupdate);
// $value[12] = date("Y-m-d", strtotime($date));
// $time12 = date("H:i:s",strtotime($date));
// $pickupdatetime = date("Y-m-d H:i:s",strtotime($date));
$dated = substr($lastupdate,0,2);
$datem = substr($lastupdate,3,2);
$datey = substr($lastupdate,6,4);
$value[12] = $datey."-".$datem."-".$dated;
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


if(empty($value[24])){  $value[24]=0;   }
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
  }elseif($value[26]=="" OR $value[26]==" " OR empty($value[26]) AND $value[24]!=0){
    $statushow = "Undelivered";
  }else{
    $statushow = $value[26];
  }
}
$statushow = trim($statushow);
if($value[26]=="Undelivered" AND $value[24]==0){
    $statushow = "In Transit";
}elseif($statushow=="OFD"){
    $statushow = "Out For Delivery";
}elseif($statushow=="RAD"){
    $statushow = "Reached At Destination";
}
// if(empty($statushow)){ $statushow="Undelivered"; }

// $uploadorderstatus = "UPDATE `spark_single_order` SET `order_status1`='$value[26]',`order_status`='$value[25]',`order_status_show`='$statushow' WHERE `orderno`='$value[2]'";
// mysqli_query($conn,$uploadorderstatus);
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

     echo "<script> window.location.assign('mis_reported.php?excelfile=Update')</script>";
      // exit();
  } catch (Exception $e) {
     echo "<script> window.location.assign('mis_reported.php?excelfile=No Update')</script>";
    // exit();
  }
}
// Mail MIS Report
?>
<!--  -->
<!-- XpressBees -->




















<!-- DTDC -->
<!--  -->
<?php
$tudate = date('Y-m-d');
if(isset($DTDCMailFormat))
{

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
if($diff<3600){  $upcrttime = $lastuploadtime; }else{  $upcrttime = date("H:i:s");  }
// Time InterVal Same Between 5 Minute Gap
// $upcrttime = date("H:i:s");


$user_id = $_SESSION['useridis'];
try {
//

// File Extention Check
$path = $_FILES['bulkorderfile']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
if($ext!="csv"){
  echo "<script> window.location.assign('mis_reported.php?excelfile=CSV Required')</script>";
}
// File Extention Check


$bannername = $_FILES["bulkorderfile"]["name"];
$bannertmp =$_FILES["bulkorderfile"]["tmp_name"];
move_uploaded_file($bannertmp,"BulkExcelFiles/MisReports/$bannername");

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
if(empty($statushow)){ $statushow=$value[15]; }
// if(empty($statushow)){ $statushow="Undelivered"; }

$uploadorderstatus = "UPDATE `spark_single_order` SET `order_status1`='$value[15]',`order_status`='$value[16]',`order_status_show`='$statushow' WHERE `orderno`='$value[2]'";
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
  echo "<script> window.location.assign('mis_reported.php?excelfile=Update')</script>";
  //
  // exit();
  } catch (Exception $e) {
    // exit();
  echo "<script> window.location.assign('mis_reported.php?excelfile=No Update')</script>";
  }

}
?>
<!--  -->
<!-- DTDC -->















<!-- Delhivery -->
<!--  -->
<?php
$tudate = date('Y-m-d');
// Mail MIS Report
if(isset($DelhiveryMailimportSubmit))
{

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
if($diff<3600){  $upcrttime = $lastuploadtime; }else{  $upcrttime = date("H:i:s");  }
// Time InterVal Same Between 5 Minute Gap
// $upcrttime = date("H:i:s");


  $user_id = $_SESSION['useridis'];
  try {

// File Extention Check
$path = $_FILES['bulkorderfile']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
if($ext!="csv"){
  echo "<script> window.location.assign('mis_reported.php?excelfile=CSV Required')</script>";
}
// File Extention Check

     $bannername = $_FILES["bulkorderfile"]["name"];
     $bannertmp =$_FILES["bulkorderfile"]["tmp_name"];
     move_uploaded_file($bannertmp,"BulkExcelFiles/MisReports/$bannername");
     $fileD = fopen("BulkExcelFiles/MisReports/$bannername","r");
     $column=fgetcsv($fileD);
     while(!feof($fileD)){
      $rowData[]=fgetcsv($fileD);
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
  // echo "&ensp;&ensp;--&ensp;&ensp;";
//   $value[5] = date("Y-m-d", strtotime($lastupdate));
  $dated = substr($lastupdate,0,2);
  $datem = substr($lastupdate,3,2);
  $datey = substr($lastupdate,6,4);
  $value[5] = $datey."-".$datem."-".$dated;
}
// Delhivery Date
if(!empty($value[24])){
  $lastupdate = $value[24];
  // echo "&ensp;&ensp;--&ensp;&ensp;";
//   $value[24] = date("Y-m-d", strtotime($lastupdate));
  $dated = substr($lastupdate,0,2);
  $datem = substr($lastupdate,3,2);
  $datey = substr($lastupdate,6,4);
  $value[24] = $datey."-".$datem."-".$dated;
}
// Estimate Delhivery Date
if(!empty($value[26])){
  $lastupdate = $value[26];
  // echo "&ensp;&ensp;--&ensp;&ensp;";
//   $value[26] = date("Y-m-d", strtotime($lastupdate));
  $dated = substr($lastupdate,0,2);
  $datem = substr($lastupdate,3,2);
  $datey = substr($lastupdate,6,4);
  $value[26] = $datey."-".$datem."-".$dated;
}
// Last Update Date
if(!empty($value[29])){
  $lastupdate = $value[29];
  // echo "&ensp;&ensp;--&ensp;&ensp;";
//   $value[29] = date("Y-m-d", strtotime($lastupdate));
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

$value[8] = mysqli_real_escape_string($conn, $value[8]);
$value[10] = mysqli_real_escape_string($conn, $value[10]);
$value[22] = mysqli_real_escape_string($conn, $value[22]);
$value[24] = mysqli_real_escape_string($conn, $value[24]);


$statushow = trim($statushow);
if(empty($statushow)){ $statushow=$value[8]; }
// if(empty($statushow)){ $statushow="Undelivered"; }


// $uploadorderstatus = "UPDATE `spark_single_order` SET `order_status1`='$value[10]',`order_status`='$value[8]',`order_status_show`='$statushow' WHERE `orderno`='$value[3]'";
// mysqli_query($conn,$uploadorderstatus);
$uploadorderstatus = "UPDATE `spark_single_order` SET 
`Last_Time_Stamp`='$value[29]',
`pickupdate`='$value[5]',`pickupdatetime`='$pickupdatetime',
`delivereddate`='$deldate',`delivereddatetime`='$deldate',
`rtodate`='$rtodate',`rtodatetime`='$rtodate',
`order_status1`='$value[10]',`order_status`='$value[8]',`order_status_show`='$statushow' 
WHERE `orderno`='$value[3]'";
mysqli_query($conn,$uploadorderstatus);


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

     echo "<script> window.location.assign('mis_reported.php?excelfile=Update')</script>";
  } catch (Exception $e) {
     echo "<script> window.location.assign('mis_reported.php?excelfile=No Update')</script>";
  }
}
// Mail MIS Report

?>
<!--  -->
<!-- Delhivery -->
























            </div>
        </div>
    </div>
</div>
</section>











</div>
<!-- ./wrapper -->
<!-- global js -->


<!-- /#page-wrapper -->

<?php
    include "Layout_Footer.php";
?>
