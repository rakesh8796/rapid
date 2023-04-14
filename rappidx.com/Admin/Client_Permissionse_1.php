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

    $pickup = $row['pickup_show'];
    $servicablepincode = $row['serviceablepincode_show'];
    $ndrshow = $row['ndr_show'];
    $printshipping = $row['printshipping_show'];
    $reportshow = $row['reports_show'];
    $misshow = $row['mis_show'];
    $podshow = $row['pod_show'];
    $codshow = $row['cod_show'];
    $codremities = $row['codremities_show'];

    $billing = $row['billing_show'];
    $invoiceshow = $row['invoice_show'];
    $remitiesshow = $row['remities_show'];

    $walletshow = $row['wallet_show'];
    $addbalanceshow = $row['addbalance_show'];
    $histroyshow = $row['transactionhistroy_show'];

    $xpressbee = $row['api_xpressbee'];
    $delhivery = $row['api_delhivery'];
    $ekart = $row['api_ekart'];
    $shadowfax = $row['api_shadowfax'];
    $dtdc = $row['api_dtdc'];

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


<?php
    include "Layout_Header.php";
    // include "Layout_Footer.php";
?>



<div class="bg-title">
    <div class="col-md-12">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h4 class="page-title">Client Permissions</h4>
        </div>
    </div>
</div>



<section class="content">
<div class="col-md-12">
    <!--5th tab bank application starting-->
    <div class="col-md-12 white-box filterable">

    <div class="col-md-12" style="border:1px solid black">
    <div class="row">
        <h3><center>
            <span style="color:blue">#<?= $uniqueuid ?>&ensp;<?= ucwords($nameonly) ?></span>_Client Access Permissions</center></h3><hr style="border-color:black">
<form method="post">
<!--  -->
<h2 class="text-center">
  <?php
  if(@$_GET['msg']=="y")
  {
      echo "<span style='color:green'>Details Updated</span>";
  }elseif(@$_GET['msg']=="n")
  {
      echo "<span style='color:red'>Details Not Updated</span>";
  }else
  {
      echo "Edit/Update Details";
  }
  ?>
</h2>

<!-- Main Service -->
<div class="col-md-12" style="background-color:lavender;border-radius:100px">
<h4 class="text-center"><b>Courier Priority</b></h4>
<div class="col-md-12">



<!--  -->
<!--     <div class="col-md-6">



<style type="text/css">
    .multiselect {
  width: 200px;
}

.selectBox {
  position: relative;
}

.selectBox select {
  width: 100%;
  font-weight: bold;
}

.overSelect {
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
}

#checkboxes {
  display: none;
  border: 1px #dadada solid;
}

#checkboxes label {
  display: block;
}

#checkboxes label:hover {
  background-color: #1e90ff;
}
</style>

<script type="text/javascript">
var expanded = false;

function showCheckboxes() {
  var checkboxes = document.getElementById("checkboxes");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}
</script>

  <div class="multiselect">
    <div class="selectBox" onclick="showCheckboxes()">
      <select>
        <option>Select an option</option>
      </select>
      <div class="overSelect"></div>
    </div>
    <div id="checkboxes">
      <label for="XpressBee">
        <input type="checkbox" name="courierpriority1[]" value="XpressBee"> XpressBee</label>
      <label for="Delhivery">
        <input type="checkbox" name="courierpriority1[]" value="Delhivery"> Delhivery</label>
      <label for="Ekart">
        <input type="checkbox" name="courierpriority1[]" value="Ekart"> Ekart</label>
      <label for="ShadowFax">
        <input type="checkbox" name="courierpriority1[]" value="ShadowFax"> ShadowFax</label>
      <label for="DTDC">
        <input type="checkbox" name="courierpriority1[]" value="DTDC"> DTDC</label>
    </div>
  </div>


    </div> -->
<!--  -->



<!-- Testing -->
<!-- <div class="col-md-6">
  <select multiple="multiple" size="2" id="myMulti">
    <option>CSS</option>
    <option>SCRIPT</option>
    <option>COM</option>
    <option>jQuery</option>
    <option>HTML5</option>
  </select>
</div> -->
<!-- Testing -->





    <div class="col-md-6">
            <select class="form-control" name="xpressbeeapino" style="float:right;">
                <option value="0">XpressBee Priority (Not In Service) </option>
<?php
    for ($i=1;$i<6;$i++){
        if($xpressbee==$i){
            echo "<option value='$i' selected>XpressBee Priority $i</option>";
        }else{
            echo "<option value='$i'>XpressBee Priority $i</option>";
        }
    }
?>
            </select>
    </div>
    <div class="col-md-6">
            <select class="form-control" name="delhiveryapino" style="float:right;">
                <option value="0">Delhivery Priority (Not In Service)</option>
<?php
    for ($i=1;$i<6;$i++){
        if($delhivery ==$i){
            echo "<option value='$i' selected>Delhivery Priority $i</option>";
        }else{
            echo "<option value='$i'>Delhivery Priority $i</option>";
        }
    }
?>
            </select>
    </div>
</div>
<div class="col-md-12"><br>
    <div class="col-md-6">
            <select class="form-control" name="ekartapino" style="float:right;">
                <option value="0">Ekart Priority (Not In Service)</option>
<?php
    for ($i=1;$i<6;$i++){
        if($ekart ==$i){
            echo "<option value='$i' selected>Ekart Priority $i</option>";
        }else{
            echo "<option value='$i'>Ekart Priority $i</option>";
        }
    }
?>
            </select>
    </div>
    <div class="col-md-6">
            <select class="form-control" name="shadowfaxno" style="float:right;">
                <option value="0">ShadowFax Priority (Not In Service)</option>
<?php
    for ($i=1;$i<6;$i++){
        if($shadowfax==$i){
            echo "<option value='$i' selected>ShadowFax Priority $i</option>";
        }else{
            echo "<option value='$i'>ShadowFax Priority $i</option>";
        }
    }
?>
            </select>
    </div>
</div>
<div class="col-md-12"><br>
    <div class="col-md-6">
            <select class="form-control" name="DTDCapino" style="float:right;">
                <option value="0">DTDC Priority (Not In Service)</option>
<?php
    for ($i=1;$i<6;$i++){
        if($dtdc==$i){
            echo "<option value='$i' selected>DTDC Priority $i</option>";
        }else{
            echo "<option value='$i'>DTDC Priority $i</option>";
        }
    }
?>
            </select>
    </div>
</div> &ensp;
</div>

        <div class="col-md-12">
            <h3 class="text-center">Client Show Field Permission</h3><br>
            <div class="col-md-6">
<?php
if($pickup){
?>
    <label><b>
        <input type="checkbox" name="pickupaddress1" value="1" checked=""> Pickup Address Added By Client
    </b></label>
<?php
}else{
?>
    <label><b>
        <input type="checkbox" name="pickupaddress1" value="1"> Pickup Address Added By Client
    </b></label>
<?php
}
?>

            </div>
            <div class="col-md-6">

<?php
if($servicablepincode){
?>
    <label><b>
        <input type="checkbox" name="serviceablepincodeshow1" value="1" checked=""> Serviceable Pincode Show
    </b></label>
<?php
}else{
?>
    <label><b>
        <input type="checkbox" name="serviceablepincodeshow1" value="1"> Serviceable Pincode Show
    </b></label>
<?php
}
?>
            </div>
            <div class="col-md-6">

<?php
if($ndrshow){
?>
    <label><b>
        <input type="checkbox" name="ndrmanagementshow1" value="1" checked=""> NDR Management Show
    </b></label>
<?php
}else{
?>
    <label><b>
        <input type="checkbox" name="ndrmanagementshow1" value="1"> NDR Management Show
    </b></label>
<?php
}
?>
            </div>
            <div class="col-md-6">

<?php
if($printshipping){
?>
    <label><b>
        <input type="checkbox" name="printshippinglabelshow1" value="1" checked=""> Print Shipping Labels Show
    </b></label>
<?php
}else{
?>
    <label><b>
        <input type="checkbox" name="printshippinglabelshow1" value="1"> Print Shipping Labels Show
    </b></label>
<?php
}
?>
            </div>
        </div>
<!-- //Main Service -->
<!-- Reports -->
        <div class="col-md-12"><br>
<h4 class="text-center">
<?php
if($reportshow){
?>
    <label><b><input type="checkbox" name="reportshow1" value="1" checked=""> Reports</b></label>
<?php
}else{
?>
    <label><b><input type="checkbox" name="reportshow1" value="1"> Reports</b></label>
<?php
}
?>
</h4><hr>
            <div class="col-md-6">

<?php
if($misshow){
?>
    <label><b>
        <input type="checkbox" name="misreportshow1" value="1" checked=""> MIS Reports Show
    </b></label>
<?php
}else{
?>
    <label><b>
        <input type="checkbox" name="misreportshow1" value="1"> MIS Reports Show
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
        <input type="checkbox" name="podreportshow1" value="1" checked=""> POD Reports Show
    </b></label>
<?php
}else{
?>
    <label><b>
        <input type="checkbox" name="podreportshow1" value="1"> POD Reports Show
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
        <input type="checkbox" name="codreportshow1" value="1" checked=""> COD Reports Show
    </b></label>
<?php
}else{
?>
    <label><b>
        <input type="checkbox" name="codreportshow1" value="1"> COD Reports Show
    </b></label>
<?php
}
?>
            </div>
            <div class="col-md-6">

<?php
if($codremities){
?>
    <label><b>
        <input type="checkbox" name="codremitiesreportshow1" value="1" checked=""> COD Remities Reports Show
    </b></label>
<?php
}else{
?>
    <label><b>
        <input type="checkbox" name="codremitiesreportshow1" value="1"> COD Remities Reports Show
    </b></label>
<?php
}
?>
            </div>
        </div>
<!-- //Reports -->
<!-- Billing -->
        <div class="col-md-12"><br>
<h4 class="text-center">

<?php
if($billing){
?>
<label><b><input type="checkbox" name="billing1" value="1" checked=""> Billing</b></label>
<?php
}else{
?>
<label><b><input type="checkbox" name="billing1" value="1"> Billing</b></label>
<?php
}
?>
</h4><hr>
            <div class="col-md-6">

<?php
if($invoiceshow){
?>
    <label><b>
        <input type="checkbox" name="invoiceshow1" value="1" checked=""> Invoice Show
    </b></label>
<?php
}else{
?>
    <label><b>
        <input type="checkbox" name="invoiceshow1" value="1"> Invoice Show
    </b></label>
<?php
}
?>
            </div>
            <div class="col-md-6">

<?php
if($remitiesshow){
?>
    <label><b>
        <input type="checkbox" name="remitiesshow1" value="1" checked=""> Remities Show
    </b></label>
<?php
}else{
?>
    <label><b>
        <input type="checkbox" name="remitiesshow1" value="1"> Remities Show
    </b></label>
<?php
}
?>
            </div>
        </div>
<!-- //Billing -->
<!-- Wallet -->
        <div class="col-md-12"><br>
<h4 class="text-center">

<?php
if($walletshow){
?>
<label><b><input type="checkbox" name="walletshow1" value="1" checked=""> Wallet</b></label>
<?php
}else{
?>
<label><b><input type="checkbox" name="walletshow1" value="1"> Wallet</b></label>
<?php
}
?>
</h4><hr>
            <div class="col-md-6">

<?php
if($addbalanceshow){
?>
    <label><b>
        <input type="checkbox" name="addbalance1" value="1" checked=""> Add Balance
    </b></label>
<?php
}else{
?>
    <label><b>
        <input type="checkbox" name="addbalance1" value="1"> Add Balance
    </b></label>
<?php
}
?>
            </div>
            <div class="col-md-6">

<?php
if($histroyshow){
?>
    <label><b>
        <input type="checkbox" name="transactionhistory1" value="1" checked=""> Transactions Show
    </b></label>
<?php
}else{
?>
    <label><b>
        <input type="checkbox" name="transactionhistory1" value="1"> Transactions Show
    </b></label>
<?php
}
?>
            </div>
        </div>
<!-- //Wallet -->

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

// echo $DTDCapino;
// echo $shadowfaxno;
// echo $ekartapino;
// echo $delhiveryapino;
// echo $xpressbeeapino;


// echo "<br>";
// print_r($courierpriority1);
// echo "<br>";

$querypermission="UPDATE `asitfa_user_access` SET `pickup_show`='$pickupaddress1',`serviceablepincode_show`='$serviceablepincodeshow1',`ndr_show`='$ndrmanagementshow1',`printshipping_show`='$printshippinglabelshow1',`reports_show`='$reportshow1',`mis_show`='$misreportshow1',`pod_show`='$podreportshow1',`cod_show`='$codreportshow1',`codremities_show`='$codremitiesreportshow1',`billing_show`='$billing1',`invoice_show`='$invoiceshow1',`remities_show`='$remitiesshow1',`wallet_show`='$walletshow1',`addbalance_show`='$addbalance1',`transactionhistroy_show`='$transactionhistory1',`api_xpressbee`='$xpressbeeapino',`api_delhivery`='$delhiveryapino',`api_ekart`='$ekartapino',`api_shadowfax`='$shadowfaxno',`api_dtdc`='$DTDCapino' WHERE `loginuser_id`='$clientid1'";

    if(mysqli_query($conn,$querypermission))
    {
        echo "<script>window.location.assign('Client_Permissionse.php?m=$clientid1&msg=y')</script>";
    }else
    {
        echo "<script>window.location.assign('Client_Permissionse.php?m=$clientid1&msg=y')</script>";
    }

}

?>
