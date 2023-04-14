<?php
  include "Layout_Header.php";
  // include "Layout_Footer.php";
?>

<?php
extract($_REQUEST);
error_reporting(1);
  // ob_start();
  // require_once('include/function/autoload.php');
  include('config/dbconnection.php');
  // $studentObj = new Student;
//
$tdate = date("Y-m-d");
if($_GET['m'])
{
    $useridis = $_GET['m'];
    $allclientquery = "SELECT * FROM `asitfa_user_access` WHERE `loginuser_id`='$useridis'";
    $allclientqueryr=mysqli_query($conn,$allclientquery);
    $row = mysqli_fetch_assoc($allclientqueryr);
    $useridis = $row['loginuser_id'];

    $client = $row['emp_client'];
    $clientreg = $row['emp_client_reg'];
    $clientall = $row['emp_client_all'];
    $allorders = $row['emp_all_orders'];
    $pickupaddress = $row['emp_pickupaddress'];
    $reports = $row['emp_reports'];
    $misshow = $row['emp_mis_show'];
    $podshow = $row['emp_pod_show'];
    $codshow = $row['emp_cod_show'];
    $codremitiesshow = $row['emp_codremities_show'];
    $pincodeservice = $row['emp_pincodeservice'];

// Name Only
    $clientname = "SELECT * FROM `asitfa_user` WHERE `User_Id`='$useridis'";
    $clientnamer=mysqli_query($conn,$clientname);
    $clientnamerd = mysqli_fetch_assoc($clientnamer);
    $nameonly = $clientnamerd['Company_Name'];
    $uniqueuid = $clientnamerd['User_Id'];
// Name Only
}else
{
    echo "Redirect";
}
//
?>



<style>
.white-box{
  padding:15px !important;
  border-radius:10px;
}
</style>



<section class="content">
<div class="row">
<div class="col-lg-12">


<div class="row bg-title fontweigh">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <h3><center><span style="color:blue">#<?= $uniqueuid ?>&ensp;<?= ucwords($nameonly) ?></span>
      _Employee Access Permissions</center></h3>
  </div>
</div>

    <div class="col-md-12">
    <div class="col-md-12">

<form method="post">
<!--  -->
<!-- Main Service -->
<div class="col-md-12 white-box fontweighlight">
<h4 class="text-center">
    <label><b>Sidebar Menu Permissions</label>
</h4>
<div class="col-md-6">
<?php
if($allorders){
?>
    <label><b>
        <input type="checkbox" name="allorders1" value="1" checked=""> All Orders 
    </b></label>
<?php
}else{
?>
    <label><b>
        <input type="checkbox" name="allorders1" value="1"> All Orders 
    </b></label>
<?php
}
?>
</div>
<div class="col-md-6">
<?php
if($pickupaddress){
?>
    <label><b>
        <input type="checkbox" name="pickupaddress1" value="1" checked=""> Pickup Address 
    </b></label>
<?php
}else{
?>
    <label><b>
        <input type="checkbox" name="pickupaddress1" value="1"> Pickup Address 
    </b></label>
<?php
}
?>
</div>
<div class="col-md-6">
<?php
if($pincodeservice){
?>
    <label><b>
        <input type="checkbox" name="pincodeservice1" value="1" checked=""> Pincode 
    </b></label>
<?php
}else{
?>
    <label><b>
        <input type="checkbox" name="pincodeservice1" value="1"> Pincode 
    </b></label>
<?php
}
?>
</div>
<div class="col-md-6">
<?php
if($row['emp_tracking']){
?>
    <label><b>
        <input type="checkbox" name="tracking" value="1" checked=""> Tracking
    </b></label>
<?php
}else{
?>
    <label><b>
        <input type="checkbox" name="tracking" value="1"> Tracking
    </b></label>
<?php
}
?>
</div>
</div>
<!-- //Main Service -->
<!-- Reports -->
<div class="col-md-12 white-box fontweighlight">
<div class="col-md-12">
<h4 class="text-center">
<?php
if($reports){
?>
    <label><b><input type="checkbox" name="reportshow1" value="1" checked=""> Reports Section</b></label>
<?php
}else{
?>
    <label><b><input type="checkbox" name="reportshow1" value="1"> Reports Section</b></label>
<?php
}
?>
</h4>
<div class="col-md-6">
<?php
if($misshow){
?>
    <label><b>
        <input type="checkbox" name="misreportshow1" value="1" checked=""> MIS Reports 
    </b></label>
<?php
}else{
?>
    <label><b>
        <input type="checkbox" name="misreportshow1" value="1"> MIS Reports 
    </b></label>
<?php
}
?>
</div>
<div class="col-md-6">
<?php
if($podshow){
?>
    <label><b>
        <input type="checkbox" name="podreportshow1" value="1" checked=""> POD Reports 
    </b></label>
<?php
}else{
?>
    <label><b>
        <input type="checkbox" name="podreportshow1" value="1"> POD Reports 
    </b></label>
<?php
}
?>
</div>
</div>
<div class="col-md-12">
<div class="col-md-6">
<?php
if($codshow){
?>
    <label><b>
        <input type="checkbox" name="codreportshow1" value="1" checked=""> COD Reports 
    </b></label>
<?php
}else{
?>
    <label><b>
        <input type="checkbox" name="codreportshow1" value="1"> COD Reports 
    </b></label>
<?php
}
?>
</div>
<div class="col-md-6">
<?php
if($codremitiesshow){
?>
    <label><b>
        <input type="checkbox" name="codremitiesshow1" value="1" checked=""> COD Remities 
    </b></label>
<?php
}else{
?>
    <label><b>
        <input type="checkbox" name="codremitiesshow1" value="1"> COD Remities 
    </b></label>
<?php
}
?>
</div>
</div>
</div>
<!-- //Reports -->
<!-- Clients -->
<div class="col-md-12 white-box fontweighlight">
<div class="col-md-12">
<h4 class="text-center">
<?php
if($client){
?>
<label><b><input type="checkbox" name="client1" value="1" checked=""> Client Section</b></label>
<?php
}else{
?>
<label><b><input type="checkbox" name="client1" value="1"> Client Section</b></label>
<?php
}
?>
</h4>
<div class="col-md-6">
<?php
if($clientreg){
?>
    <label><b>
        <input type="checkbox" name="clientreg1" value="1" checked=""> Client Registration
    </b></label>
<?php
}else{
?>
    <label><b>
        <input type="checkbox" name="clientreg1" value="1"> Client Registration
    </b></label>
<?php
}
?>
</div>
<div class="col-md-6">
<?php
if($clientall){
?>
    <label><b>
        <input type="checkbox" name="allclients1" value="1" checked=""> All Clients Show
    </b></label>
<?php
}else{
?>
    <label><b>
        <input type="checkbox" name="allclients1" value="1"> All Clients Show
    </b></label>
<?php
}
?>
</div>
<div class="col-md-6">
<?php
if($row['emp_websiterequest']){
?>
    <label><b>
        <input type="checkbox" name="websiterequest" value="1" checked=""> Website Request
    </b></label>
<?php
}else{
?>
    <label><b>
        <input type="checkbox" name="websiterequest" value="1"> Website Request
    </b></label>
<?php
}
?>
</div>
</div>
</div>
<!-- //Clients -->
<!-- MIS Reports Section -->
<div class="col-md-12 white-box fontweighlight">
<div class="col-md-12">
<h4 class="text-center">
<label><b> MIS Section</b></label>
</h4>
<!-- <div class="col-md-6">
<?php
if($row['emp_mis_upload']){
?>
    <label><b>
        <input type="checkbox" name="misuploadopt" value="1" checked=""> Upload Option
    </b></label>
<?php
}else{
?>
    <label><b>
        <input type="checkbox" name="misuploadopt" value="1"> Upload Option
    </b></label>
<?php
}
?>
</div> -->
            <div class="col-md-6">

<?php
if($row['emp_mis_delete']){
?>
    <label><b>
        <input type="checkbox" name="misdeleteopt" value="1" checked=""> Delete Option
    </b></label>
<?php
}else{
?>
    <label><b>
        <input type="checkbox" name="misdeleteopt" value="1"> Delete Option
    </b></label>
<?php
}
?>
</div>
</div>
</div>
<!-- MIS Reports Section -->
        <div class="col-md-12 text-center"><br>
            <input type="hidden" name="clientid1" value="<?= $useridis ?>">
            <input type="submit" name="updateaccessgranted" value="Update Access Granted" class="btn btn-success" style="background-color:green;border-color:green">
            <hr>
        </div>
</form>
<!--  -->
        &ensp;<br>
    </div>
    </div>

</div>
</div>
</section>




</div>
<!-- ./wrapper -->
<!-- global js -->

<!-- end of page level js -->
<?php
  // include "Layout_Header.php";
  include "Layout_Footer.php";
?>

<?php

if(isset($updateaccessgranted))
{

// echo $pickupaddress1;
// echo $serviceablepincodeshow1;
// echo $ndrmanagementshow1;
// echo $printshippinglabelshow1;
// echo $reportshow1;
// echo $misreportshow1;
// echo $podreportshow1;
// echo $codreportshow1;
// echo $codremitiesreportshow1;
// echo $billing1;
// echo $invoiceshow1;
// echo $remitiesshow1;
// echo $walletshow1;
// echo $addbalance1;
// echo $transactionhistory1;


$querypermission="UPDATE `asitfa_user_access` SET 
`emp_client`='$client1',`emp_client_reg`='$clientreg1',`emp_client_all`='$allclients1',
`emp_all_orders`='$allorders1',`emp_pickupaddress`='$pickupaddress1',`emp_reports`='$reportshow1',
`emp_mis_show`='$misreportshow1',`emp_pod_show`='$podreportshow1',`emp_cod_show`='$codreportshow1',
`emp_codremities_show`='$codremitiesshow1',`emp_pincodeservice`='$pincodeservice1',
`emp_tracking`='$tracking',`emp_mis_upload`='$misuploadopt',`emp_mis_delete`='$misdeleteopt',
`emp_websiterequest`='$websiterequest'
WHERE `loginuser_id`='$clientid1'";

    if(mysqli_query($conn,$querypermission))
    {
        echo "<script>window.location.assign('Employee_Permissions.php?m=$clientid1&msg=y')</script>";
    }else
    {
        echo "<script>window.location.assign('Employee_Permissions.php?m=$clientid1&msg=y')</script>";
    }

}

?>
